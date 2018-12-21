<?php

namespace App;
//use Jenssegers\Mongodb\Eloquent\Model as Eloquent;
//Importante usar moloquent!!!!!!
use Moloquent;

    /*
      Attendize.com   - Event Management & Ticketing
     */

/**
 * Description of OrderItems.
 *
 * @author Dave
 */
class OrderItem extends Moloquent
{
    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool $timestamps
     */
    public $timestamps = false;
}
