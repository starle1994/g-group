<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laraveldaily\Quickadmin\Observers\UserActionsObserver;


use Illuminate\Database\Eloquent\SoftDeletes;

class Ranking extends Model {

    use SoftDeletes;

    /**
    * The attributes that should be mutated to dates.
    *
    * @var array
    */
    protected $dates = ['deleted_at'];

    protected $table    = 'ranking';
    
    protected $fillable = [
          'number',
          'description'
    ];
    

    public static function boot()
    {
        parent::boot();

        Ranking::observe(new UserActionsObserver);
    }
    
    
    
    
}