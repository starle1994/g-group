<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laraveldaily\Quickadmin\Observers\UserActionsObserver;


use Illuminate\Database\Eloquent\SoftDeletes;

class SongRating extends Model {

    use SoftDeletes;

    /**
    * The attributes that should be mutated to dates.
    *
    * @var array
    */
    protected $dates = ['deleted_at'];

    protected $table    = 'songrating';
    
    protected $fillable = [
          'month',
          'song_id',
          'raiting'
    ];
    

    public static function boot()
    {
        parent::boot();

        SongRating::observe(new UserActionsObserver);
    }
    
    public function song()
    {
        return $this->hasOne('App\Song', 'id', 'song_id');
    }


    
    
    
}