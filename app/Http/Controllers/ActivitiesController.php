<?php

namespace App\Http\Controllers;

use App\Activities;
use App\Event;
use App\ZoomHost;
use Aws\Credentials\Credentials;
use Aws\S3\MultipartUploader;
use Aws\S3\S3Client;
use Aws\S3\Transfer;
use Carbon\Carbon;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Spatie\ResponseCache\Facades\ResponseCache;
use App\evaLib\Services\FilterQuery;

/**
 * @group Activity
 *
 * The activities within an event are **sessions, talks, lessons or conferences** in which specific topics are discussed.
 *
 * Each activity has its **date , time and duration**.
 *
 * These activities, according to the organizer, can be carried out either in person or virtually.
 */
class ActivitiesController extends Controller
{
    /**
     *
     *  _index:_ Listing of all activities
     *
     *
     * @urlParam event_id required
     *
     *
     * @response{
     *  "access_restriction_rol_ids": [],
     *  "access_restriction_roles": [],
     *  "access_restriction_type": "OPEN",
     *  "access_restriction_types_available": null,
     *  "activity_categories": [],
     *  "activity_categories_ids": [[]],
     *  "bigmaker_meeting_id": null,
     *  "capacity": 30,
     *  "created_at": "2020-11-05 19:15:55",
     *  "datetime_end": "2020-10-14 14:11",
     *  "datetime_start": "2020-10-14 14:11",
     *  "description": "<p>Descripción de la actividad</p>",
     *  "event_id": "5fa423eee086ea2d1163343e",
     *  "has_date": null,
     *  "host_ids": [[]],
     *  "hosts": [],
     *  "image": "https://storage.googleapis.com/herba-images/evius/events/6pJmozfel7e1gr4ra4vnsvrY03VHHEBpRAhhqKWB.jpeg",
     *  "meeting_id": null,
     *  "name": "Segunda actividad del evento",
     *  "registration_message": "<p>Su registro a la segunda actividad ha sido exitoso</p>",
     *  "role_attendee_ids": [[]],
     *  "0": [],
     *  "selected_document": [],
     *  "space": null,
     *  "space_id": null,
     *  "subtitle": "Subtitulo de la segunda actividad",
     *  "type_id": "5dbb3211d74d5c542150ccc3",
     *  "updated_at": "2020-11-05 19:15:55",
     *  "vimeo_id": null,
     *  "_id": "5fa44f6ba8bf7449e65dae32"
     * }
     *
     *
     *
     */
    public function index(Request $request, $event_id, FilterQuery $filterQuery)
    {
        $input = $request->all();
        $query  = Activities::where("event_id", $event_id);

        //por defecto lo ordenamos por fecha de inicio descentente
        if (!isset($input['orderBy'])){
            $input['orderBy'] = '[{"field":"datetime_start","order":"asc"}]';
        }
        $results = $filterQuery::addDynamicQueryFiltersFromUrl($query, $input);
        return JsonResource::collection($results);
    }

    /**
     * _indexByHost_: list activities by host
     *
     * @urlParam event_id required id of the event to which the activities belong.
     * @urlParam host_id required id of the host for which you want to filter the activities.
     *
     * @param string $event_id
     * @param string $host_id
     * @return void
     */
    public function indexByHost($event_id, $host_id)
    {
        return JsonResource::collection(
            Activities::where("event_id", $event_id)->where('host_ids', $host_id)->paginate(config('app.page_size'))
        );
    }

    /**
     * _store_: create a new activity
     *
     * @urlParam event_id id of the event in which a new activity is to be created Example: 5fa423eee086ea2d1163343e
     *
     * @bodyParam name string required name Example: PRIMERA ACTIVIDAD
     * @bodyParam subtitle string optional Example: Subtitulo primera actividad
     * @bodyParam image string Example: https://storage.googleapis.com/herba-images/evius/events/6pJmozfel7e1gr4ra4vnsvrY03VHHEBpRAhhqKWB.jpeg
     * @bodyParam description string  Example: Primera actividad del evento
     * @bodyParam capacity integer  number of people who can enter the activity. Example: 50
     * @bodyParam event_id string required event with which the activity is associated Example: 5fa423eee086ea2d1163343e
     * @bodyParam datetime_end datetime required Example: 2020-10-14 14:11
     * @bodyParam datetime_start datetime required  Example: 2020-10-14 14:50
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $event_id)
    {
        $data = $request->json()->all();
        $data["event_id"] = $event_id;

        $activity = new Activities($data);
        $activity->save();

        if (isset($data["activity_categories_ids"])) {
            $activity_categories_ids = $data["activity_categories_ids"];
            $activity->activity_categories()->attach($activity_categories_ids);
        }
        if (isset($data["host_ids"])) {
            $host_ids = $data["host_ids"];
            $activity->hosts()->attach($host_ids);
        }
        if (isset($data["type_id"])) {
            $type_id = isset($data["type_id"]);
            $activity->type()->push($type_id);
        }
        if (isset($data["space_id"])) {
            $space_id = $data["space_id"];
            $activity->space()->push($space_id);
        }
        if (isset($data["access_restriction_rol_ids"])) {
            $ids = $data["access_restriction_rol_ids"];
            $activity->access_restriction_roles()->attach($ids);
        }
        //Cargamos de nuevo para traer la info de las categorias
        $activity = Activities::find($activity->id);
        ResponseCache::clear();

        return $activity;
    }

    public function createMeeting(Request $request, $event_id, $activity_id)
    {

        $data = $request->json()->all();

        $datetime_start_activity = date_format(Carbon::parse($data["activity_datetime_start"]), 'Y-m-d');

        $where_date_exist = Activities::where('datetime_start', 'like', '%' . $datetime_start_activity . '%')->where("zoom_host_id", "!=", null)->pluck("zoom_host_id");

        $available_host = ZoomHost::whereNotIn("id", $where_date_exist)->first();
        if ($available_host == null) {
            return "No available host for this day :(";
        }

        $client = new Client();
        $url = config('app.zoom_server') . "/crearroom";
        $headers = ['Content-Type' => 'application/json'];

        $request = $client->post($url,
            ['json' => [
                "activity_name" => $data["activity_name"],
                "agenda" => $data["activity_description"],
                "activity_id" => $activity_id,
                "event_id" => $event_id,
                "host_id" => $available_host->id,
            ],
            ],
            ['headers' => $headers,
            ]);

        $activity = Activities::find($activity_id);

        return $request;
    }

    /**
     * _storeMeetingRecording_: endpoint receiving the zoom webhook saves the info on mongo and transfers it to aws s3
     *
     * @param Request $request
     * @return void
     */
    public function storeMeetingRecording(Request $request)
    {
        $data = $request->json()->all();
        $meeting_id = $data["payload"]["object"]["id"];
        $token = $data["download_token"];
        echo "id reunion" . $meeting_id . "<br>";
        $zoom_array = $data["payload"]["object"]["recording_files"];
        foreach ($zoom_array as $key => $value) {
            echo "tipo archivo" . $value["file_type"] . "<br>";
            if ($value["file_type"] == "MP4") {
                $zoom_url = $value["download_url"];
                echo $zoom_url;

                break;
            }
        }
        $values["meeting_video"] = $zoom_url;
        $activity = Activities::where("meeting_id", $meeting_id)->first();

        echo "actividad" . $activity->_id . "<br>";
        $activity->fill($values);
        $activity->save();

        $client = new \GuzzleHttp\Client();
        $headers = [
            'Authorization' => 'Bearer ' . $token,
        ];
        $request = $client->get($zoom_url . "?access_token=" . $token, ['allow_redirects' => false], [
            'headers' => $headers,
        ]);

        $cookies = $request->getHeaderLine('Set-Cookie');
        $source = $request->getHeaderLine('Location');

        $key = $meeting_id . Carbon::now() . ".mp4";

        $credentials = new Credentials(config('app.aws_key'), config('app.aws_secret'));

        $s3 = new S3Client([
            'version' => 'latest',
            'region' => 'sa-east-1',
            'credentials' => $credentials,
        ]);

        $uploader = new MultipartUploader($s3, $source, [
            'cookies' => $cookies,
            'bucket' => 'meetingsrecorded',
            'key' => $key,
            'ACL' => 'public-read',
        ]);

        $result = $uploader->upload();
        $values["zoom_meeting_video"] = $result["Location"];
        str_replace('//', '/', $values["meeting_video"]);
        $activity->fill($values);
        $activity->save();
        return $activity;

    }
    /**
     * _indexConferences_ :endpoint for indexing aws s3 conferences
     *
     * @param Request $request
     * @return void
     */
    public function indexConferences(Request $request)
    {
        $credentials = new Credentials(config('app.aws_key'), config('app.aws_secret'));
        $s3 = new S3Client([
            'version' => 'latest',
            'region' => 'sa-east-1',
            'credentials' => $credentials,
        ]);

        return $s3->getPaginator('ListObjects', [
            'Bucket' => 'meetingsrecorded',
        ]);
    }

    /**
     * _show_: View information on a specific activity
     *
     * @urlParam id required id of the activity you want to see.
     *
     * @param  \App\Activities  $Activities
     */
    public function show($event_id, $id)
    {
        $activity = Activities::findOrFail($id);
        return $activity;
    }

    /**
     * _duplicate_: endpoint destined to the duplication of an activity to english language
     *
     * @urlParam event_id required id of the event to which the activities belong.
     * @urlParam id required id of the activity you want to see.
     *
     * @param string $event_id
     * @param [string $id
     * @return void
     */
    public function duplicate($event_id, $id)
    {
        $activities_in_es = Activities::findOrFail($id);
        $Activities = Activities::findOrFail($id);
        $data['duplicate'] = true;
        $Activities->fill($data);
        $Activities->save();

        if (!empty($activities_in_es->duplicate)) {
            return "actividad ya duplicada";
        }
        $activities_in_es->get();
        $activities_in_en = json_decode(json_encode($activities_in_es), true);
        $activities_in_en["locale"] = "en";
        $activities_in_en["locale_original"] = $activities_in_en['_id'];
        $activity = new Activities($activities_in_en);
        $activity->save();
        return $activity;
    }
    /**
     * _update_:update an activity specific.
     *
     * @urlParam event_id required id of the event to which the activities belong.
     * @urlParam id required id of the activity you want to update.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Activities  $Activities
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $event_id, $id)
    {
        $data = $request->json()->all();
        $Activities = Activities::findOrFail($id);
        $Activities->fill($data);
        $Activities->save();
        if (isset($data["activity_categories_ids"])) {
            $activity_categories_ids = $data["activity_categories_ids"];
            $Activities->activity_categories()->detach();
            $Activities->activity_categories()->attach($activity_categories_ids);
        }
        if (isset($data["host_ids"])) {
            $host_ids = $data["host_ids"];
            $Activities->hosts()->detach();
            $Activities->hosts()->attach($host_ids);
        }
        if (isset($data["type_id"])) {
            $type_id = isset($data["type_id"]);
            $Activities->type()->pull($data["type_id"]);
            $Activities->type()->push($type_id);
        }
        if (isset($data["space_id"])) {
            $space_id = $data["space_id"];
            $Activities->space()->pull($data["space_id"]);
            $Activities->space()->push($space_id);
        }
        if (isset($data["access_restriction_rol_ids"])) {
            $ids = $data["access_restriction_rol_ids"];
            $Activities->access_restriction_roles()->detach();
            $Activities->access_restriction_roles()->attach($ids);
        }
        $activity = Activities::find($Activities->id);
        ResponseCache::clear();

        return $activity;
    }

    /**
     * _destroy_: Remove the specified activity
     *
     * @urlParam event_id required id of the event to which the activities belong 5dbc9c65d74d5c5853222222
     * @urlParam id required id of the activity you want to destroy 5dbc99bad74d5c5822691111
     *
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function destroy($event_id, $id)
    {
        $Activities = Activities::findOrFail($id);
        ResponseCache::clear();

        return (string) $Activities->delete();
    }
}
