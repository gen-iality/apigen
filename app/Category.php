<?php

namespace App;

//use Jenssegers\Mongodb\Eloquent\Model as Eloquent;
//Importante usar moloquent!!!!!!
use Moloquent;

/**
 * Category Model
 *
 */
class Category extends Moloquent
{
    //protected $with = ['event'];
    //protected $table = 'category';
<<<<<<< HEAD
    protected $hidden = array('activities_ids');
=======
    protected $hidden = ['event_ids','activities_ids'];
>>>>>>> 41a12c515f578f1e547b762234332fccaab722d9
    /**
     * Category is owned by an event
     * @return void
     */
    public function event()
    {
        return $this->belongsToMany('App\Event');
    }

    protected $fillable = [
        'name', 'image','event_ids','created_at'
    ];
}
