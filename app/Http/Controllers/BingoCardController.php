<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// models
use App\BingoCard;

class BingoCardController extends Controller
{

    public function show(string $bingoCard)
    {
        $bingo_card = BingoCard::findOrFail($bingoCard);
        return $bingo_card;
    }

    public function destroy(BingoCard $bingoCard)
    {
        $bingo_card = BingoCard::findOrFail($bingoCard);
        $bingo_card->delete();

        return response()->json([], 204);
    }
}
