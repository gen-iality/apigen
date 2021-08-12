<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Product;
use App\ModelHasRole;
use App\Account;
use Auth;
use Mail;
/**
 * @group Product
 * Endpoint that manages event products.
 */
class ProductController extends Controller
{   
    /**
     * _index_: list product by event.
     * @urlParam event required
     */
    public function index($event_id)
    {   
        return JsonResource::collection(
            Product::where('event_id', $event_id)
                ->paginate(config('app.page_size'))
        );
    }

    /**
     * _store_: create new register for product.
     * @authenticated
     * 
     * @urlParam event required
     * 
     * @bodyParam name string required name of image. Example: Arbol
     * @bodyParam description string  description of image. Example: Esta pintura es de un arbol.
     * @bodyParam image string required route of image. Example: https://storage.googleapis.com/eviusauth.appspot.com/evius/events/87Pxr9PYNfBEDMbX19CeTU8wwTFHpb2XB3n2bnak.jpg
     * @bodyParam price number Example: 10000   
     *  
     */
    public function store(Request $request, $event_id)
    {
        $validated = $request->validate([
            'name' => 'required',
            'image' => 'required',            
        ]);

        $data = $request->json()->all();
        $data['event_id'] =  $event_id;
        $result = new Product($data);
        $result->save();
        return $result;
    }

    /**
     * _show_: consult information on a specific product
     *
     * @urlParam event required event Example: 5bb25243b6312771e92c8693
     * @urlParam product required product 
     * 
     */
    public function show($event_id ,  $id)
    {
        $product = Product::find($id);
        $response = new JsonResource($product);
        return $response;
    }

    /**
     * _update_: update image of product specific.
     * @authenticated
     * 
     * @urlParam event required
     * 
     * @bodyParam name string name of image. Example: Arbol
     * @bodyParam description string  description of image. Example: Esta pintura es de un arbol.
     * @bodyParam image string route of image. Example: https://storage.googleapis.com/eviusauth.appspot.com/evius/events/87Pxr9PYNfBEDMbX19CeTU8wwTFHpb2XB3n2bnak.jpg
     * @bodyParam price number Example: 10000  
     */
    public function update(Request $request, $event_id, $product_id)
    {
        $data = $request->json()->all();
        $product = Product::find($id);
        $product->fill($data);
        $product->save();
        return $data;
    }


    /**
     * _destroy_: delete image in the product.
     *
     * @urlParam event required Example: 5ea23acbd74d5c4b360ddde2
     * @urlParam product required id of the event to be eliminated
     */
    public function destroy($event_id ,  $id)
    {
        $product = Product::findOrFail($id);
        return (string) $product->delete();
    }

    /**
     * _createSilentAuction_: create a silent bid
     * @authenticated
     * 
     * @urlParam event required event id Example: 5ea23acbd74d5c4b360ddde2
     * @urlParam product required product id Example: 60e8cd558c421b004f2ff082
     * 
     * @bodyParam  valueOffered requires number value offered for an item Example: 100000
     * 
     */
    public function createSilentAuction(Request $request, $event_id, $product_id)
    {
        
        $user = Auth::user();
        $data = $request->json()->all();
        
        //Se obtienen los colaboradores o admins para enviar el correo de subasta silenciosa
        $contributors = ModelHasRole::where('event_id' , $event_id)->pluck('model_id');
        $admins = Account::whereIn('_id' , $contributors)->get(['email']);
        
        $product = Product::find($product_id);

        //Este Email informa a los administadores que usuarios han subastado
        foreach($admins as $admin)
        {   
            
            Mail::to($admin->email)
            ->queue(
                new \App\Mail\SilentAuctionMail($data, $event_id, $user, $product , true)
            );
        }  

        //Este es el correo de copnmfirmación para el usuario que realiza la puja
        Mail::to($user->email)
        ->queue(
            new \App\Mail\SilentAuctionMail($data, $event_id, $user, $product, false)
        );
        return 'Silent Auction';

    }

}
