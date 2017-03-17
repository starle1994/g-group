<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laraveldaily\Quickadmin\Observers\UserActionsObserver;


use Illuminate\Database\Eloquent\SoftDeletes;

class GodPageContent extends Model {

    use SoftDeletes;

    /**
    * The attributes that should be mutated to dates.
    *
    * @var array
    */
    protected $dates = ['deleted_at'];

    protected $table    = 'godpagecontent';
    
    protected $fillable = [
          'name',
          'image',
          'alias'
    ];
    

    public static function boot()
    {
        parent::boot();

        GodPageContent::observe(new UserActionsObserver);
    }
    
    
    
    
}