<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laraveldaily\Quickadmin\Observers\UserActionsObserver;

use Carbon\Carbon; 

use Illuminate\Database\Eloquent\SoftDeletes;

class LastSongVerTwo extends Model {

    use SoftDeletes;

    /**
    * The attributes that should be mutated to dates.
    *
    * @var array
    */
    protected $dates = ['deleted_at'];

    protected $table    = 'lastsongvertwo';
    
    protected $fillable = [
          'image',
          'date',
          'title',
          'description'
    ];
    

    public static function boot()
    {
        parent::boot();

        LastSongVerTwo::observe(new UserActionsObserver);
    }
    
    
}