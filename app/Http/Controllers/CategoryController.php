<?php

namespace App\Http\Controllers;

use App\Category;
use App\Event;
use App\Http\Resources\CategoryResource;
use Illuminate\Http\Request;
use Storage;
// use Spatie\ResponseCache\Facades\ResponseCache;
use \Exception;

/**
 * @group Category
 * 
 * The categories are a facility for classification of events
 */
class CategoryController extends Controller
{

    /* por defecto el modelo es en singular y el nombre de la tabla en prural
    //protected $table = 'categories';
    $a = new Category();
    var_dump($a->getTable());
     */

    /**
     * _index_: List of categories
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
     * _store_: create new category
     * 
     * @authenticated
     * @bodyParam name string required name category Example: Animales
     * @bodyParam image string category image Example: https://firebasestorage.googleapis.com/v0/b/eviusauth.appspot.com/o/gato-atigrado-triste-redes.jpg?alt=media&token=2cd2161b-43f7-42a8-87e6-cf571e83e660
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->json()->all();
        $result = new Category($data);
        $result->save();
        // ResponseCache::clear();

        return $result;

    }

    /**
     * _delete_: delete category
     * 
     * @urlParam id category
     *
     * @param Category $id
     * @return void
     */
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
     * _show_: consult information on a specific category
     *
     * @urlParam category required category Example: 5fb6e8d76dbaeb3738258092
     * 
     */
    public function show(String $id)
    {
        $category = Category::find($id);
        $response = new CategoryResource($category);
        return $response;
    }
    /**
     * _update_: update a specific category
     * 
     * @authenticated
     * 
     * 
     * @urlParam category category Example: 5fb6e8d76dbaeb3738258092
     * @bodyParam name string name category
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
        // ResponseCache::clear();
        return $data;
    }

    /**
     * _destroy_: Remove the specified resource from storage.
     * 
     * @authenticated
     * 
     * @urlParam category category Example: 5fb6e8d76dbaeb3738258092
     * 
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

    /**
     * _indexByOrganization_ : list categories by organization
     * 
     * @urlParam organization_ids required  Example: 5f7e33ba3abc2119442e83e8
     * 
     */
    public function indexByOrganization($organization_id)
    {

        $categories = Category::where("organization_ids" , $organization_id)->get();

        return $categories;
    }
}