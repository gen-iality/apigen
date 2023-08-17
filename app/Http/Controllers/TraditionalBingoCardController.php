<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// models
use App\BingoCard;
use App\Attendee;
use App\evaLib\Services\UserEventService;
use App\TraditionalBingo;

/**
 * @group BingoCard
 */

class TraditionalBingoCardController extends Controller
{
    /**
     * _index_: Get all bingo cards by bingo
     * @urlParam bingo required The id of the bingo to retrive all bingo cards.
    */
    public function index(Request $request, TraditionalBingo $bingo)
    {
	$numberItems = $request->query('numberItems') ?
	    $request->query('numberItems') : 10;

	$bingoCards = TraditionalBingo::where('bingo_id', $bingo->_id)
				->where('type', 'traditional')
		    		->paginate($numberItems);

	return response()->json($bingoCards, 200);
    }

    /**
     * _show_: Get a event user with bingo card
     * @urlParam bingocard required The id of the bingo card to retrive this and the owner's data.
    */
    public function show(string $code)
    {
	$bingo_card = BingoCard::where('code', $code)
			    ->where('type', 'traditional')
			    ->first();
        $eventUser = Attendee::findOrFail($bingo_card->event_user_id);

        return ["bingo_card" => $bingo_card, "name_owner"=> $eventUser["properties"]["names"]];
    }

    public function store(Request $request, TraditionalBingo $bingo, Attendee $eventuser)
    {
    }

    /**
     * _destroy_: Delete a attendee's bingo card
     * @urlParam bingocard required The id of the bingo card to find this.
     *
     * @return 204 No Content
    */

    public function destroy(string $event, BingoCard $bingocard)
    {
        $bingocard->delete();
        return response()->json([], 204);
    }
}
