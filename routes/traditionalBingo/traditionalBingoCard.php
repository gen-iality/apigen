<?php
/*
|--------------------------------------------------------------------------
| Traditional Bingo Card
|--------------------------------------------------------------------------
| This is where you can register API routes to manage traditional bingo cards in the different modules.
|
*/

/****************
 * Traditional Bingo Card
 ****************/
Route::get('traditional-bingos/{bingo}/traditional-bingocards', 'TraditionalBingoCardController@index');
Route::post('traditional-bingos/{bingo}/event-users/{eventuser}/bingocards', 'TraditionalBingoCardController@createBingoCardToAttendee');
//Route::get('traditional-bingocards/{code}', 'BingoCardController@show');
//Route::get('bingocards/{bingocard}/download', 'BingoCardController@downloadBingoCard');
//Route::post('bingos/{bingo}/bingocards', 'BingoCardController@createBingoCardsWithoutAtteendes');
//Route::delete('bingos/{bingo}/bingocards/{bingocard}', 'BingoCardController@destroy');
//BINGO
//Route::get('events/{event}/eventusers/bingocards', 'EventUserController@ListEventUsersWithBingoCards');
//Route::post('events/{event}/eventusers/bingocards', 'EventUserController@createBingoCardToAllAttendees');
//Route::get('me/{eventuser}/bingocard', 'EventUserController@BingoCardbyEventUser');
