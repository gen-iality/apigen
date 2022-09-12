<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;
// models
use App\BingoCard;
use App\Attendee;

class BingoCardController extends Controller
{

    public function show(string $bingo_card)
    {
        $bingo_card = BingoCard::findOrFail($bingo_card);
        $eventUser = Attendee::findOrFail($bingo_card->event_user_id);
        return ["bingo_card" => $bingo_card, "name_owner"=> $eventUser["properties"]["names"]];
    }

    public function destroy(string $bingo_card)
    {
        $bingo_card = BingoCard::findOrFail($bingo_card);
        $bingo_card->delete();
        return response()->json([], 204);
    }

    public function downloadBingoCard(BingoCard $bingocard)
    {
        $pdf = PDF::loadview('BingoCard', compact('bingocard'));

        return $pdf->download('carton-bingo.pdf');
    }
}
