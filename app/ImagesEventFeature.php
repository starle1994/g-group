<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laraveldaily\Quickadmin\Observers\UserActionsObserver;


use Illuminate\Database\Eloquent\SoftDeletes;

class ImagesEventFeature extends Model {

    use SoftDeletes;

    /**
    * The attributes that should be mutated to dates.
    *
    * @var array
    */
    protected $dates = ['deleted_at'];

    protected $table    = 'imageseventfeature';
    
    protected $fillable = [
          'image',
          'description',
          'eventsfeature_id'
    ];
    

    public static function boot()
    {
        parent::boot();

        ImagesEventFeature::observe(new UserActionsObserver);
    }
    
    public function eventsfeature()
    {
        return $this->hasOne('App\FeatureEvent', 'id', 'eventsfeature_id');
    }


    
    
    
}