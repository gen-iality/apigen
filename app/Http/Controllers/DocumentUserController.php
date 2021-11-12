<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
// models
use App\DocumentUser;
use App\Models\Event;
use App\Attendee;

/**
 * @group Document User
 * 
 * This model works to manage the documents to assign to the attendees.
 */
class DocumentUserController extends Controller
{
    /**
     * _index_: list all documents to user by event.
     * 
     * @autheticathed
     * @urlParam event required event_id
     * 
     */
    public function index($event)
    {
        $documents_user = DocumentUser::where('event_id', $event)->latest()->paginate(config('app.page_size'));

        return response()->json([$documents_user], 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->json()->all();
        $created_document_user = new DocumentUser($data);
        $created_document_user->save();

        return response()->json($created_document_user, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($event, $document_user)
    {
        $document_user  = DocumentUser::findOrFail($document_user);
        if ($document_user->event_id !== $event) {
            return response()->json(['msg' => 'Documento no pertenece al evento'], 400);
        }

        return response()->json($document_user, 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $event, $document_user)
    {
        $data = $request->json()->all();
        $document_user  = DocumentUser::findOrFail($document_user);
        if ($document_user->event_id !== $event) {
            return response()->json(['msg' => 'Documento no pertenece al evento'], 400);
        }
        $document_user->fill($data);
        $document_user->save();

        return response()->json($document_user, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($event, $document_user)
    {
        $document_user = DocumentUser::findOrFail($document_user);
        if ($document_user->event_id !== $event) {
            return response()->json(['msg' => 'Documento no pertenece al evento'], 400);
        }
        $document_user->delete();

        return response()->json([], 204);
    }

    // retorna todos los documentos de un usuario de un evento
    public function documentsUserByEvent($event, $event_user)
    {
        $documents_user = DocumentUser::where('event_id', $event)->where('eventuser_id', $event_user)->latest()->paginate(config('app.page_size'));

        return response()->json([$documents_user], 200);
    }

    // esto deberia ir mejor en el controlador de evento
    public function addDocumentUserToEvent(Request $request, $event_id)
    {
        $data = $request->json()->all();
        $event = Event::findOrFail($event_id);
        $event->extra_config->document_user = $data;
        $event->save();

        return $event;
    }

    // SERVICIO
    public function addDocumentUserToEventUserByEvent($event_id, $event_user_id)
    {
        $event = Event::findOrFail($event_id);
        $event_user = Attendee::findOrFail($event_user_id);
        if (empty($event->document_user)) { // validar la configuracion de ese evento
            return response()->json(['msg' => 'Evento no valido']);
        }
        $documents_user = DocumentUser::where('assign', false)
            ->where('event_id', $event_id)
            ->where('eventuser_id', $event_user_id)
            ->get();
        $properties = $event_user['properties'];
        $documents_user_id = [];
        foreach ($documents_user as $doc) {
            array_push($documents_user_id, $doc['image']);
        }
        $properties_merge = array_merge($properties, ['documents_user' => $documents_user_id]);
        $event_user['properties'] = $properties_merge;
        $event_user->save();

        return $event_user;
    }
}
