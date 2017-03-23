<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laraveldaily\Quickadmin\Observers\UserActionsObserver;


use Illuminate\Database\Eloquent\SoftDeletes;

class FeatureEvent extends Model {

    use SoftDeletes;

    /**
    * The attributes that should be mutated to dates.
    *
    * @var array
    */
    protected $dates = ['deleted_at'];

    protected $table    = 'featureevent';
    
    protected $fillable = [
          'name',
          'image',
          'description'
    ];
    

    public static function boot()
    {
        parent::boot();

        FeatureEvent::observe(new UserActionsObserver);
    }
    
    
    
    
}