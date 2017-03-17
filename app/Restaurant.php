<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laraveldaily\Quickadmin\Observers\UserActionsObserver;


use Illuminate\Database\Eloquent\SoftDeletes;

class Restaurant extends Model {

    use SoftDeletes;

    /**
    * The attributes that should be mutated to dates.
    *
    * @var array
    */
    protected $dates = ['deleted_at'];

    protected $table    = 'restaurant';
    
    protected $fillable = [
          'name',
          'image'
    ];
    

    public static function boot()
    {
        parent::boot();

        Restaurant::observe(new UserActionsObserver);
    }
    
    
    
    
}