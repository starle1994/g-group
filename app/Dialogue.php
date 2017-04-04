<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laraveldaily\Quickadmin\Observers\UserActionsObserver;


use Illuminate\Database\Eloquent\SoftDeletes;

class Dialogue extends Model {

    use SoftDeletes;

    /**
    * The attributes that should be mutated to dates.
    *
    * @var array
    */
    protected $dates = ['deleted_at'];

    protected $table    = 'dialogue';
    
    protected $fillable = [
          'image',
          'name',
          'description',
          'link',
          'alias'
    ];
    

    public static function boot()
    {
        parent::boot();

        Dialogue::observe(new UserActionsObserver);
    }
    
    
    
    
}