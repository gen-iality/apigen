<?php
/*
|--------------------------------------------------------------------------
| Traditional Bingo
|--------------------------------------------------------------------------
| This is where you can register API routes to manage traditional bingo in the different modules.
|
*/

/****************
 * Traditional Bingo
 ****************/

Route::get('events/{event}/traditional-bingos', 'TraditionalBingoController@traditionalBingobyEvent');
Route::post('events/{event}/traditional-bingos', 'TraditionalBingoController@store');
Route::put('events/{event}/traditional-bingos/{traditionalBingo}', 'TraditionalBingoController@update');
Route::delete('events/{event}/traditional-bingos/{traditionalBingo}', 'TraditionalBingoController@destroy');
