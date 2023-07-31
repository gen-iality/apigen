<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Vimeo\Vimeo;
use Log;

class VimeoVideoController extends Controller
{
    private function createClientVimeo()
    {
        $client = new Vimeo(
	    config('app.vimeo_client'),
	    config('app.vimeo_secret'),
	    config('app.vimeo_access'),
        );

	return $client;
    }

    private function uploadVideoToVimeo($file, $file_name, $file_description) {
        $client = $this->createClientVimeo();
	// Folder donde se guardaran los videos
	$folderId = config('app.vimeo_folder');

        // $new_file = '/var/www/public/uploaded/uploaded_'.$file_name;
        // if (!copy($file, $new_file)) {
        //     Log::error("Cannot copy the file ".$file." to ".$new_file);
        //     return;
        // }

        $uri = $client->upload($file, array(
            "name" => $file_name,
            "description" => $file_description,
            "folder_uri" => "https://vimeo.com/manage/folders/$folderId",
        ));

        Log::debug("Your video URI is: " . $uri);

        $response = $client->request($uri . '?fields=link');
        Log::debug("Your video link is: " . $response['body']['link']);

        $response = $client->request($uri);
        $video = $response['body'];

        $embed_link = $video['embed']['html'];
        Log::debug("embeding link: ".$embed_link);

	$videoId = explode('/', $video['uri'] );

	$regex = '/src="(.*?)"/';
	$matches = array();
	if (preg_match($regex, $embed_link, $matches)) {
	    $src = $matches[1];
	    Log::debug('final url for embeding: '.$src);

	    return [
	        'uri' => str_replace('\/', '/', $src),
	        'video_id' => $videoId[2] // Id esta en este index
	    ];
	}

	return [
	    'uri' => str_replace('\/', '/', $video['player_embed_url']),
	    'video_id' => $videoId[2] // Id esta en este index
	];
    }


    public function show(Request $request, string $videoId)
    {
        $client = $this->createClientVimeo();

        //$uri = '/videos/'.$video_id.'?fields=uri,upload.status,transcode.status';
        $video = $client->request("/videos/$videoId");

	return response()->json(['video' => $video['body']], 200);
    }

    public function uploadVideo(Request $request)
    {
	$request->validate([
	    'video' => 'required|mimes:mp4,ogx,oga,ogv,ogg,webm',
	    'description' => 'string|max:500'
	]);

	$video = $request->video;
	$videoName = $video->getClientOriginalName();
	$videoDescription = isset($request->description) ?
	    $request->description : 'New video';

	try {
	    $video = $this->uploadVideoToVimeo($video->getPathname(), $videoName, $videoDescription);
	} catch(\Exception $error) {
	    return response()->json(compact('error'), 400);
	}

	return response()->json(compact('video'));
    }

    public function destroy(string $videoId)
    {
        $client = $this->createClientVimeo();

	try {
	    $client->request("/videos/$videoId", array(), 'DELETE');
	} catch (\Exception $error) {
	    return response()->json(compact('error'), 400);
	}

	return response()->json([], 204);
    }
}
