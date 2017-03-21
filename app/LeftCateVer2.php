<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laraveldaily\Quickadmin\Observers\UserActionsObserver;


use Illuminate\Database\Eloquent\SoftDeletes;

class LeftCateVer2 extends Model {

    use SoftDeletes;

    /**
    * The attributes that should be mutated to dates.
    *
    * @var array
    */
    protected $dates = ['deleted_at'];

    protected $table    = 'leftcatever2';
    
    protected $fillable = [
          'image',
          'name',
          'alias'
    ];
    

    public static function boot()
    {
        parent::boot();

        LeftCateVer2::observe(new UserActionsObserver);
    }
    
    
    
    
}