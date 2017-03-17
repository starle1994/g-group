<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laraveldaily\Quickadmin\Observers\UserActionsObserver;


use Illuminate\Database\Eloquent\SoftDeletes;

class GroupTopPageConten extends Model {

    use SoftDeletes;

    /**
    * The attributes that should be mutated to dates.
    *
    * @var array
    */
    protected $dates = ['deleted_at'];

    protected $table    = 'grouptoppageconten';
    
    protected $fillable = [
          'name',
          'image',
          'alias'
    ];
    

    public static function boot()
    {
        parent::boot();

        GroupTopPageConten::observe(new UserActionsObserver);
    }
    
    
    
    
}