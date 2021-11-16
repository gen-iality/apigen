<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
// models
use App\DocumentUser;
use App\Models\Event;
use App\Attendee;

use Auth; 
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
     * @urlParam event required event_id
     * 
     */
    public function index($event)
    {
        $documents_user = DocumentUser::where('event_id', $event)->latest()->paginate(config('app.page_size'));

        return response()->json([$documents_user]);
    }

    /**
     * _store_: create a new document for user in a event
     * 
     * @autheticathed
     * 
     * @urlParam event required event id
     * @bodyParam name string required Document name.
     * @bodyParam url string required Document url.
     * @bodyParam assign boolean required This indicate if the document is assigned to a user.
     * 
     */
    public function store($event, Request $request)
    {   
        $request->validate([
            'name' => 'required',
            'url' => 'required',
            'assign' => 'required|boolean',
        ]);

        $data = $request->json()->all();
        $data['event_id'] = $event;
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

        return response()->json($document_user);
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

        return response()->json($document_user);
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

    /**
     * _documentsUserByEvent_: list the documents of a logged in user.
     * 
     * @autheticated
     * 
     */
    public function documentsUserByUser($event)
    {    
        $user = Auth::user()->_id;
        $event_user = Attendee::where('event_id', $event)->where('account_id' , $user)->first();
        $documents_user = DocumentUser::where('event_id', $event)->where('eventuser_id', $event_user->_id)->latest()->paginate(config('app.page_size'));        

        return response()->json([$documents_user]);
    }
}
