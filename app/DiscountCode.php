<?php

namespace App;

//use Jenssegers\Mongodb\Eloquent\Model as Eloquent;
//Importante usar moloquent!!!!!!
use Moloquent;

/**
 * Category Model
 *
 */
class DiscountCode extends Moloquent
{
    //protected $with = ['event'];
    //protected $table = 'category';
    protected $fillable = [
        'code', 
        'number_uses',
        'discount_code_template_id', 
        'event_id'               
    ];
   
    public function discount_code_template()
    {
        return $this->hasOne('App\DiscountCodeTemplate');
    }

    public function event()
    {
        return $this->belongsTo('App\Event');
    }
    
}
