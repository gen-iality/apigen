<?php

namespace App\Http\Controllers;


use App\DiscountCodeTemplate;
use App\DiscountCode;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Request;
use Storage;
use Validator;


/**
 * @group DiscountCodeTemplate
 *
 *
 */
class DiscountCodeTemplateController extends Controller
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
        return JsonResource::collection(
            DiscountCode::get()
        );
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
        $result = new DiscountCodeTemplate($data);

        $rules = [
            'name' => "required",
            'use_limit' => "required",
            'discount' => 'required',
        ];
        

        $validator = Validator::make($data, $rules);
        if (!$validator->passes()) {
            return response()->json(['errors' => $validator->errors()->all()], 400);
        }        

        $result->save();

        $group_id = $result->_id;   
        
        // self::createCodes($group_id , $event_id, $quantity);
        

        return $result;

    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(String $id)
    {
        $codegroup = DiscountCode::findOrFail($id);
        $response = new JsonResource($codegroup);
        //if ($Inscription["event_id"] = $event_id) {
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
        $category = DiscountCode::find($id);
        $category->fill($data);
        $category->save();
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
        $codegroup = DiscountCode::findOrFail($id);
        $codes = DiscountCode::where('discount_code_group_id' , $codegroup->_id)->first();

        if($codes){
            abort(400,'El grupo no se puede eliminar si está asociado a un código de descuento');
        }

        return  (string) $codegroup->delete();

    }


    /**
     * 
     */
    // public function createCodes($group_id , $event_id, $quantity){

    //     $resultCode = '';
    //     for ($i = 1; $i <= $quantity; $i++) {            
    //         $permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';

    //         $input_length = strlen($permitted_chars);
    //         $random_string = '';
    //         for ($i = 0; $i < 8; $i++) {
    //             $random_character = $permitted_chars[mt_rand(0, $input_length - 1)];
    //             $random_string .= $random_character;
    //         } 

    //         $dataCode['code'] = $random_string;
    //         $dataCode['discount_code_group_id'] = $group_id;
    //         $dataCode['event_id'] = $event_id;

    //         $resultCode = new DiscountCode($dataCode); 
    //         // var_dump($resultCode);die;
    //         $resultCode->save();   
            
                   
    //     }
    //     return  $resultCode;

        
    // }
    
}   