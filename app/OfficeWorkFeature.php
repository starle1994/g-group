<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laraveldaily\Quickadmin\Observers\UserActionsObserver;


use Illuminate\Database\Eloquent\SoftDeletes;

class OfficeWorkFeature extends Model {

    use SoftDeletes;

    /**
    * The attributes that should be mutated to dates.
    *
    * @var array
    */
    protected $dates = ['deleted_at'];

    protected $table    = 'officeworkfeature';
    
    protected $fillable = [
          'image',
          'backgroud_image',
          'description',
          'alias'
    ];
    

    public static function boot()
    {
        parent::boot();

        OfficeWorkFeature::observe(new UserActionsObserver);
    }
    
    
    
    
}