<?php

namespace App\evaLib\Services;

use Mail;
//Models
use App\Plan;
use App\Payment;
// Google cloud
use Google\Client;
use Google\Service\Sheets;
use Google\Service\Sheets\ValueRange;

/**
 * Undocumented class
 */
class AdministratorService
{
    public static function notificationAdmin($rol, $email, $event, $names)
    {
      if ($rol === "5c1a59b2f33bd40bb67f2322") {
        Mail::to($email)
            ->queue(
                new \App\Mail\AdministratorMail($email, $event, $names)
            );
      }
      return;
    }
}
