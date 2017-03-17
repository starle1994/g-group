<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laraveldaily\Quickadmin\Observers\UserActionsObserver;


use Illuminate\Database\Eloquent\SoftDeletes;

class Movies extends Model {

    use SoftDeletes;

    /**
    * The attributes that should be mutated to dates.
    *
    * @var array
    */
    protected $dates = ['deleted_at'];

    protected $table    = 'movies';
    
    protected $fillable = [
          'name',
          'description',
          'link',
          'image'
    ];
    

    public static function boot()
    {
        parent::boot();

        Movies::observe(new UserActionsObserver);
    }
    
    
    
    
}