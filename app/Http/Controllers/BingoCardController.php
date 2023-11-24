<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use PDF;
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
        $numberItems = $request->query('numberItems') ?
            $request->query('numberItems') : 10;

        $freeCards = $request->query('free_cards') === 'true' ?
            true : false;

        // Cartones libre
        if ($freeCards) {
            $bingoCards = BingoCard::where('bingo_id', $bingo->_id)
                ->where('event_user_id', null)
                ->paginate($numberItems);

            return response()->json($bingoCards, 200);
        }

        // Cartones asignados
        $bingoCards = BingoCard::where('bingo_id', $bingo->_id)
            ->where('event_user_id', '!=', null)
            ->paginate($numberItems);

        return response()->json($bingoCards, 200);
    }

    /**
     * _show_: Get a event user with bingo card
     * @urlParam bingocard required The id of the bingo card to retrive this and the owner's data.
     */
    public function show(string $code)
    {
        $bingoCard = BingoCard::where('code', $code)->first();
        if (!$bingoCard) {
            return response()
                ->json(['message' => 'Bingo Card not found'], 404);
        }

        $eventUser = Attendee::find($bingoCard->event_user_id);

        // Carton sin asignacion de usuario
        if (!$eventUser) {
            return response()->json([
                "bingo_card" => $bingoCard,
                "name_owner" => "con código $code"
            ]);
        }

        return response()->json([
            "bingo_card" => $bingoCard,
            "name_owner" => $eventUser["properties"]["names"]
        ]);
    }

    public function createBingoCardsWithoutAtteendes(Request $request, Bingo $bingo)
    {
        $request->validate([
            'qty_bingo_cards' => 'required|numeric'
        ]);

        $qtyBingoCards  = $request->json('qty_bingo_cards');
        $bingoCardCreated = [];

        for ($i = 0; $i < $qtyBingoCards; $i++) {
            $bingoCard = UserEventService::generateBingoCardForAttendee($bingo->event_id, $event_user_id = null);
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

    public function destroy(string $event, BingoCard $bingocard)
    {
        $bingocard->delete();
        return response()->json([], 204);
    }

    //public function downloadBingoCard(BingoCard $bingocard)
    //{
    //$pdf = PDF::loadview('BingoCard', compact('bingocard'));

    //return $pdf->download('carton-bingo.pdf');
    //}
}
