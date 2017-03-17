<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laraveldaily\Quickadmin\Observers\UserActionsObserver;


use Illuminate\Database\Eloquent\SoftDeletes;

class ImageRestaurant extends Model {

    use SoftDeletes;

    /**
    * The attributes that should be mutated to dates.
    *
    * @var array
    */
    protected $dates = ['deleted_at'];

    protected $table    = 'imagerestaurant';
    
    protected $fillable = [
          'name',
          'description',
          'image',
          'restaurant_id'
    ];
    

    public static function boot()
    {
        parent::boot();

        ImageRestaurant::observe(new UserActionsObserver);
    }
    
    public function restaurant()
    {
        return $this->hasOne('App\Restaurant', 'id', 'restaurant_id');
    }


    
    
    
}