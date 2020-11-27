<?php

namespace App\Http\Controllers;

use App\Category;
use App\Event;
use App\Http\Resources\CategoryResource;
use Illuminate\Http\Request;
use Storage;
use Spatie\ResponseCache\Facades\ResponseCache;
use \Exception;

/**
 * @resource Event
 *
 *
 */
class CategoryController extends Controller
{

    /* por defecto el modelo es en singular y el nombre de la tabla en prural
    //protected $table = 'categories';
    $a = new Category();
    var_dump($a->getTable());
     */

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return CategoryResource::collection(
            Category::paginate(config('app.page_size'))
        );

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
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->json()->all();
        $result = new Category($data);
        $result->save();
        ResponseCache::clear();

        return $result;

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
    public function update(Request $request, string $id)
    {
        $data = $request->json()->all();
        $category = Category::find($id);
        $category->fill($data);
        $category->save();
        ResponseCache::clear();
        return $data;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {   
        $category = Category::findOrFail($id);
        $events = Event::where('category_ids' , $category->_id)->first();

        if($events){
            abort(400,'Las categorías asociadas a un evento no se pueden eliminar');
        }

        return  (string) $category->delete();

    }
}