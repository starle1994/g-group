<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laraveldaily\Quickadmin\Observers\UserActionsObserver;


use Illuminate\Database\Eloquent\SoftDeletes;

class ShopsList extends Model {

    use SoftDeletes;

    /**
    * The attributes that should be mutated to dates.
    *
    * @var array
    */
    protected $dates = ['deleted_at'];

    protected $table    = 'shopslist';
    
    protected $fillable = [
          'name',
          'image',
          'image_intro',
          'description',
          'apply_method',
    ];
    

    public static function boot()
    {
        parent::boot();

        ShopsList::observe(new UserActionsObserver);
    }
    
    
    
    
}