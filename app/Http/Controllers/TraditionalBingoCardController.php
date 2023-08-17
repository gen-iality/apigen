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

	$bingoCards = BingoCard::where('bingo_id', $bingo->_id)
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

    private function generateBingoValues($bingoValues)
    {
	// Modificar esta vaina
	$colums = [
	    'B', 'I', 'N', 'G', 'O',
	    'B', 'I', 'N', 'G', 'O',
	    'B', 'I', 'N', 'G', 'O',
	    'B', 'I', 'N', 'G', 'O',
	    'B', 'I', 'N', 'G', 'O'
	];

	$bingoCardValues = [];
	foreach($colums as $colum) {
	    $num = $bingoValues[$colum][rand(0, 4)];
	    while(in_array([$colum => $num], $bingoCardValues)) {
		$num = $bingoValues[$colum][rand(0, 4)];
	    }
	    array_push($bingoCardValues, [$colum => $num]);
	}

	$bingoCardValues[12]['N'] = 'comodin';

	return $bingoCardValues;
    }

    public function createBingoCardToAttendee(Request $request, TraditionalBingo $bingo, $eventuser)
    {
	$dataBingoCard = [
	    'code' => UserEventService::generateBingoCode(),
	    'event_id' => $bingo->event_id,
	    'event_user_id' => $eventuser,
	    'type' => 'traditional',
	    'values_bingo_card' => $this->generateBingoValues($bingo->bingo_values),
	];

	$bingoCard = BingoCard::create($dataBingoCard);

	return response()->json(compact('bingoCard'), 201);
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
