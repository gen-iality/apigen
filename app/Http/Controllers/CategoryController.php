<?php

namespace App\Http\Controllers;

use App\Event;
use App\Category;
use App\Http\Resources\CategoryResource;
use Illuminate\Http\Request;
use Storage;
use Validator;

/**
 * @resource Event
 *
 *
 */
class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        return Category::all();
                
        // CategoryResource::collection(
        //     Category::paginate(12)
        //     //EventUser::where("event_id", $event_id)->paginate(50)
        // );

        //$events = Event::where('visibility', $request->input('name'))->get();
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }
    public function delete(Category $id)
    {
        $res = $id->delete();
        if ($res == true) {
            return 'True';
        } else {
            return 'Error';
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    
    /**
     * Display the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(String $id)
    {
        $category = Category::find($id);
        CategoryResource::withoutWrapping();
        $response = new CategoryResource($category);
        return $response;
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $id)
    {
        $data = $request->all();

        $id->fill($data);
        $id->save();
        return $data;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function destroy(Event $event)
    {
        //
    }
}
