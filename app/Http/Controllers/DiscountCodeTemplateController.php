<?php

namespace App\Http\Controllers;


use App\DiscountCodeTemplate;
use App\DiscountCode;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Request;
use Storage;
use Validator;
use Log;


/**
 * @group DiscountCodeTemplate
 * 
 * The discount template is used to generate the discount codes, along with their percentage and the limit of uses for each code. 
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
     * _index_: list all Discount Code Templates
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {   
        return JsonResource::collection(
            DiscountCodeTemplate::get()
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
     * _store_:create new discount code template
     * 
     * @bodyParam name string required Example: Curso de regalo
     * @bodyParam use_limit number required the number of uses for each code Example: 1
     * @bodyParam discount number required discount percentage Example: 100
     * @bodyParam event_id string  event with which the template will be associated Example: 5ea23acbd74d5c4b360ddde2
     * @bodyParam organization_id string  eorganization_id if you want the discount template to be applicable to any course Example: 5e9caaa1d74d5c2f6a02a3c3
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
        
        if(!isset($data['event_id']) && !isset($data['organization_id']))
        {
            return response()->json(['errors' => "Debe ingresar organization_id o event_id "], 400);
        }
        else if(isset($data['event_id']) && isset($data['organization_id']))
        {
            return response()->json(['errors' => "Solo debe ingresar uno de los campos, organization_id o event_id "], 400);
        }

        $result->save();

        $group_id = $result->_id;   
        
        // self::createCodes($group_id , $event_id, $quantity);        

        return $result;

    }


    /**
     * _show_ : information from a specific template
     * 
     * @urlParam discountcodetemplate id Example: 5fc80b2a31be4a3ca2419dc4
     * 
     * @param  \App\DiscountCodeTemplate  $codegroup
     * @return \Illuminate\Http\Response
     */
    public function show(String $id)
    {
        $codegroup = DiscountCodeTemplate::findOrFail($id);
        $response = new JsonResource($codegroup);
        //if ($Inscription["event_id"] = $event_id) {
        return $response;
    }

    /**
     * _update_: update information from a specific template
     * 
     * @bodyParam name string  Example: Curso de regalo
     * @bodyParam use_limit number  the number of uses for each code Example: 1
     * @bodyParam discount number discount percentage Example: 100
     * 
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, string $id)
    {
        $data = $request->json()->all();
        $category = DiscountCodeTemplate::find($id);
        $category->fill($data);
        $category->save();
        return $data;
    }

    /**
     * _destroy_: delete the specified docunt code template
     * 
     * @urlParam id discount template id 
     * 
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {   
        $codegroup = DiscountCodeTemplate::findOrFail($id);
        $codes = DiscountCode::where('discount_code_template_id' , $codegroup->_id)->first();

        if($codes){
            abort(400,'El grupo no se puede eliminar si está asociado a un código de descuento');
        }

        return  (string) $codegroup->delete();

    }


    public function importCodes(Request $request){
        $input1 = $request->all();

        $data = $request->json()->all();
        Log::info('data from etiqueta blanca normal: '.json_encode($input1));
        Log::info('data from etiqueta blanca json    '.json_encode($data));
        return $data;
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
    //         $dataCode['discount_code_template_id'] = $group_id;
    //         $dataCode['event_id'] = $event_id;

    //         $resultCode = new DiscountCode($dataCode); 
    //         // var_dump($resultCode);die;
    //         $resultCode->save();   
            
                   
    //     }
    //     return  $resultCode;

        
    // }
    
}   