<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laraveldaily\Quickadmin\Observers\UserActionsObserver;


use Illuminate\Database\Eloquent\SoftDeletes;

class GigoloPageContents extends Model {

    use SoftDeletes;

    /**
    * The attributes that should be mutated to dates.
    *
    * @var array
    */
    protected $dates = ['deleted_at'];

    protected $table    = 'gigolopagecontents';
    
    protected $fillable = [
          'name',
          'image',
          'alias'
    ];
    

    public static function boot()
    {
        parent::boot();

        GigoloPageContents::observe(new UserActionsObserver);
    }
    
    
    
    
}