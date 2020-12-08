<?php

namespace App\Http\Controllers;


use App\DiscountCode;
use App\DiscountCodeTemplate;
use App\Mail\DiscountCodeMail;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Request;
use Storage;
use Validator;
use App\evaLib\Services\CodeServices;


/**
 * @group DiscountCode
 *
 *
 */
class DiscountCodeController extends Controller
{

    /* por defecto el modelo es en singular y el nombre de la tabla en prural
    //protected $table = 'categories';
    $a = new Category();
    var_dump($a->getTable());
     */

    /**
     * _index_: list of discount codes by template
     *
     * @return \Illuminate\Http\Response
     */
    public function index($template_id)
    {   
        $query = DiscountCode::where('discount_code_template_id', $template_id);
        return JsonResource::collection($query->get());
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
    public function store(Request $request , $group_id)
    {
        $data = $request->json()->all();

        $rules = [
            'quantity' => 'required'
        ];

        $validator = Validator::make($data, $rules);
        if (!$validator->passes()) {
            return response()->json(['errors' => $validator->errors()->all()], 400);
        }

        $resultCode = '';
        $x = 1;
        while($x <= $data['quantity']) {            
            $permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';

            $input_length = strlen($permitted_chars);
            $random_string = '';
            for ($j = 0; $j < 8; $j++) {
                $random_character = $permitted_chars[mt_rand(0, $input_length - 1)];
                $random_string .= $random_character;
            } 
            
            $data['code'] = $random_string;
            $data['discount_code_template_id'] = $group_id;
            $group  = DiscountCodeTemplate::find($group_id);
            $data['event_id'] = isset($data['event_id']) ? $data['event_id'] : $group->event_id;

            $resultCode = new DiscountCode($data);
            $repeated =  DiscountCode::where('code' , $random_string)->first();

            if(!isset($repeated))
            {                                             
                $resultCode->save();   
                $x++;
            }             
                   
        }
        return DiscountCode::where('discount_code_template_id', $group_id)->get();

    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show($event_id ,$id)
    {
        $code = DiscountCode::find($id);
        return $code;
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
        // $codegroup = DiscountCode::findOrFail($id);
        // $events = DiscountCode::where('discount_code_template_id' , $codegroup->_id)->first();

        // if($events){
        //     abort(400,'El grupo no se puede eliminar si está asociado a un código');
        // }

        // return  (string) $codegroup->delete();

    }


    /**
     * 
     */
    public function exchangeCode(Request $request)
    {   
        $data = $request->json()->all();
        $result = CodeServices::exchangeCode($data);
    }


    /**
     * _validateCode_ : valid if the code is redeemed, exists or is valid.
     * 
     */
    public function validateCode(Request $request)
    {   

        $data = $request->json()->all();
        $code = DiscountCode::where('event_id', $data['event_id'])->where("code" , $data['code'])->first();
        
        if($code){
            $group = DiscountCodeTemplate::where('_id',$code->discount_code_template_id)->first();
            
            
            if($code->number_uses < $group->use_limit  ){
                // $code->number_uses =$code->number_uses + 1; 
                // $code->save();
                return $code;
            }
            
            return abort(403 , 'El código ya se uso');
        }
        
        return abort(404 , 'El código no existe');
    }
}