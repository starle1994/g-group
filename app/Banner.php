<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laraveldaily\Quickadmin\Observers\UserActionsObserver;


use Illuminate\Database\Eloquent\SoftDeletes;

class Banner extends Model {

    use SoftDeletes;

    /**
    * The attributes that should be mutated to dates.
    *
    * @var array
    */
    protected $dates = ['deleted_at'];

    protected $table    = 'banner';
    
    protected $fillable = [
          'page',
          'image'
    ];
    

    public static function boot()
    {
        parent::boot();

        Banner::observe(new UserActionsObserver);
    }
    
    
    
    
}