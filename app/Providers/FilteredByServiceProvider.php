<?php

namespace App\Providers;

use App\EventUser;
use App\Mail\BookingConfirmed;
use App\Observers\EventUserObserver;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\ServiceProvider;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Resources\Json\Resource;


