<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laraveldaily\Quickadmin\Observers\UserActionsObserver;


use Illuminate\Database\Eloquent\SoftDeletes;

class RookieFeature extends Model {

    use SoftDeletes;

    /**
    * The attributes that should be mutated to dates.
    *
    * @var array
    */
    protected $dates = ['deleted_at'];

    protected $table    = 'rookiefeature';
    
    protected $fillable = [
          'image',
          'content',
          'description',
          'alias',
    ];
    

    public static function boot()
    {
        parent::boot();

        RookieFeature::observe(new UserActionsObserver);
    }
    
    
}