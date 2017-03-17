<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laraveldaily\Quickadmin\Observers\UserActionsObserver;


use Illuminate\Database\Eloquent\SoftDeletes;

class PhotoList extends Model {

    use SoftDeletes;

    /**
    * The attributes that should be mutated to dates.
    *
    * @var array
    */
    protected $dates = ['deleted_at'];

    protected $table    = 'photolist';
    
    protected $fillable = [
          'name',
          'image',
          'time'
    ];
    

    public static function boot()
    {
        parent::boot();

        PhotoList::observe(new UserActionsObserver);
    }
    
    
    
    
}