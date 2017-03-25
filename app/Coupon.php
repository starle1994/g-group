<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laraveldaily\Quickadmin\Observers\UserActionsObserver;


use Illuminate\Database\Eloquent\SoftDeletes;

class Coupon extends Model {

    use SoftDeletes;

    /**
    * The attributes that should be mutated to dates.
    *
    * @var array
    */
    protected $dates = ['deleted_at'];

    protected $table    = 'coupon';
    
    protected $fillable = [
          'name',
          'image',
          'description',
          'alias'
    ];
    

    public static function boot()
    {
        parent::boot();

        Coupon::observe(new UserActionsObserver);
    }
    
    
    
    
}