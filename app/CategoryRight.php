<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laraveldaily\Quickadmin\Observers\UserActionsObserver;


use Illuminate\Database\Eloquent\SoftDeletes;

class CategoryRight extends Model {

    use SoftDeletes;

    /**
    * The attributes that should be mutated to dates.
    *
    * @var array
    */
    protected $dates = ['deleted_at'];

    protected $table    = 'categoryright';
    
    protected $fillable = [
          'image',
          'name',
          'alias'
    ];
    

    public static function boot()
    {
        parent::boot();

        CategoryRight::observe(new UserActionsObserver);
    }
    
    
    
    
}