<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laraveldaily\Quickadmin\Observers\UserActionsObserver;


use Illuminate\Database\Eloquent\SoftDeletes;

class GroupRankingType extends Model {

    use SoftDeletes;

    /**
    * The attributes that should be mutated to dates.
    *
    * @var array
    */
    protected $dates = ['deleted_at'];

    protected $table    = 'grouprankingtype';
    
    protected $fillable = [
          'name',
          'alias'
    ];
    

    public static function boot()
    {
        parent::boot();

        GroupRankingType::observe(new UserActionsObserver);
    }
    
    
    
    
}