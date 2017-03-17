<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laraveldaily\Quickadmin\Observers\UserActionsObserver;


use Illuminate\Database\Eloquent\SoftDeletes;

class CategoryLeft extends Model {

    use SoftDeletes;

    /**
    * The attributes that should be mutated to dates.
    *
    * @var array
    */
    protected $dates = ['deleted_at'];

    protected $table    = 'categoryleft';
    
    protected $fillable = [
          'image',
          'name',
          'alias'
    ];
    

    public static function boot()
    {
        parent::boot();

        CategoryLeft::observe(new UserActionsObserver);
    }
    
    
    
    
}