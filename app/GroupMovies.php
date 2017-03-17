<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laraveldaily\Quickadmin\Observers\UserActionsObserver;


use Illuminate\Database\Eloquent\SoftDeletes;

class GroupMovies extends Model {

    use SoftDeletes;

    /**
    * The attributes that should be mutated to dates.
    *
    * @var array
    */
    protected $dates = ['deleted_at'];

    protected $table    = 'groupmovies';
    
    protected $fillable = [
          'name',
          'link',
          'image'
    ];
    

    public static function boot()
    {
        parent::boot();

        GroupMovies::observe(new UserActionsObserver);
    }
    
    
    
    
}