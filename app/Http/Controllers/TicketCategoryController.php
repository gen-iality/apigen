<?php

namespace App\Http\Controllers;

use App\Boleteria;
use App\TicketCategory;
use Illuminate\Http\Request;
use App\Http\Resources\TicketCategoryResource;
use Log;
/**
 * @group TicketCategory
 *
 */
class TicketCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Boleteria $boleteria)
    {
        return TicketCategoryResource::collection(
            TicketCategory::where('boleteria_id', $boleteria->_id)
                ->latest()
                ->paginate(config('app.page_size'))
        );
    }

    /**
     * _store_: Create new TicketCategory.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     * @bodyParam name string required name to ticketCategory Example: Category one
     * @bodyParam color string required color of ticketCategory Example: #FFFFFF
     * @bodyParam price double required price related to ticketCategory Example: 25.000
     * @bodyParam amount numeric required amount related to ticketCategory Example: 20
     * @bodyParam event_id string required event id related to ticketCategory Example: 628fdc698b89a10b9d464793
     */
    public function store(Request $request, Boleteria $boleteria)
    {
        $request->validate([
            'name' => 'required|string',
            'color' => 'required|string',
            'price' => 'required|numeric',
            'ticket_capacity' => 'required|numeric',
        ]);

        $data = $request->json()->all();
	$data = array_merge($data, [
	    'boleteria_id' => $boleteria->_id,
	    'event_id' => $boleteria->event_id
	]);
        $ticketCategory = TicketCategory::create($data);

        return response()->json(compact('ticketCategory'), 201);
    }

    /**
     * TicketCategorybyUser_: search of ticketCategories by event.
     * 
     * @urlParam event required  event_id
     *
     */
    //public function TicketCategorybyEvent(string $event_id)
    //{
        //return TicketCategoryResource::collection(
            //TicketCategory::where('event_id', $event_id)
                //->latest()
                //->paginate(config('app.page_size'))
        //);
    //}

    /**
     * _show_: display information about a specific ticketCategory.
     *
     * @authenticated
     * @urlParam ticketCategory required id of the ticketCategory you want to consult. Example: 6298cb08f8d427d2570e8382
     * @response{
     *   "_id": "6298cb08f8d427d2570e8382",
	 *   "name": "Test",
	 *   "color": "$FFFFFF",
	 *   "price": 25.000,
	 *   "amount": 20,
	 *   "event_id": "628fdc698b89a10b9d464793",
	 *   "updated_at": "2022-06-02 14:39:27",
	 *   "created_at": "2022-06-02 14:36:56"
     * }
     */
    public function show($boleteria, TicketCategory$ticketCategory)
    {
	return compact('ticketCategory');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\TicketCategory  $ticketCategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $boleteria_id, TicketCategory $ticketCategory)
    {
	$data = $request->json()->all();
	$ticketCategory->fill($data);
	$ticketCategory->save();

	return compact('ticketCategory');
    }

    /**
     * _destroy_: delete ticketCategory and related data.
     * @authenticated
     * @urlParam ticketCategory required id of the ticketCategory to be eliminated
     * 
     */
    public function destroy($boleteria_id, TicketCategory $ticketCategory)
    {
        $ticketCategory->delete();

        return response()->json([], 204);
    }
}
