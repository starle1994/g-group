<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laraveldaily\Quickadmin\Observers\UserActionsObserver;


use Illuminate\Database\Eloquent\SoftDeletes;

class SecrectContents extends Model {

    use SoftDeletes;

    /**
    * The attributes that should be mutated to dates.
    *
    * @var array
    */
    protected $dates = ['deleted_at'];

    protected $table    = 'secrectcontents';
    
    protected $fillable = [
          'name',
          'image',
          'alias'
    ];
    

    public static function boot()
    {
        parent::boot();

        SecrectContents::observe(new UserActionsObserver);
    }
    
    
    
    
}