<?php

        Route::post('paymentCompleted', [
            'as'   => 'completeOrder',
            'uses' => 'EventCheckoutController@paymentCompleted',
        ]);

