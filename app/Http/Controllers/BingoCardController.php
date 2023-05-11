<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;
// models
use App\BingoCard;
use App\Attendee;
use App\Bingo;
use App\evaLib\Services\UserEventService;

/**
 * @group BingoCard
 */

class BingoCardController extends Controller
{
    /**
     * _index_: Get all bingo cards by bingo
     * @urlParam bingo required The id of the bingo to retrive all bingo cards.
    */
    public function index(Request $request, Bingo $bingo)
    {
	$numberItems = $request->query('numberItems') ? $request->query('numberItems'): 10;
	$bingoCards = BingoCard::where('bingo_id', $bingo->_id)->paginate($numberItems);

	return response()->json($bingoCards, 200);
    }

    /**
     * _show_: Get a event user with bingo card
     * @urlParam bingocard required The id of the bingo card to retrive this and the owner's data.
    */
    public function show(string $code)
    {
        $bingo_card = BingoCard::where('code', $code)->first();
        $eventUser = Attendee::findOrFail($bingo_card->event_user_id);
        return ["bingo_card" => $bingo_card, "name_owner"=> $eventUser["properties"]["names"]];
    }

    public function createBingoCardsWithoutAtteendes(Request $request, Bingo $bingo)
    {
      $request->validate([
	'qty_bingo_cards' => 'required|numeric'
      ]);

      $qtyBingoCards  = $request->json('qty_bingo_cards');
      $bingoCardCreated = [];

      for($i = 0; $i < $qtyBingoCards; $i++) {
	$bingoCard = UserEventService::generateBingoCardForAttendee($bingo->event_id, $event_user_id=null);
	array_push($bingoCardCreated, $bingoCard);
      }

      return response()->json($bingoCardCreated, 201);
    }

    /**
     * _destroy_: Delete a attendee's bingo card
     * @urlParam bingocard required The id of the bingo card to find this.
     *
     * @return 204 No Content
    */

    public function destroy(string $bingo_card)
    {
        $bingo_card = BingoCard::findOrFail($bingo_card);
        $bingo_card->delete();
        return response()->json([], 204);
    }

    //public function downloadBingoCard(BingoCard $bingocard)
    //{
        //$pdf = PDF::loadview('BingoCard', compact('bingocard'));

        //return $pdf->download('carton-bingo.pdf');
    //}
}
