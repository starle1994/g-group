<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laraveldaily\Quickadmin\Observers\UserActionsObserver;

use Carbon\Carbon; 

use Illuminate\Database\Eloquent\SoftDeletes;

class SelfTaken extends Model {

    use SoftDeletes;

    /**
    * The attributes that should be mutated to dates.
    *
    * @var array
    */
    protected $dates = ['deleted_at'];

    protected $table    = 'selftaken';
    
    protected $fillable = [
          'name',
          'image',
          'time'
    ];
    

    public static function boot()
    {
        parent::boot();

        SelfTaken::observe(new UserActionsObserver);
    }
    
    
    /**
     * Set attribute to date format
     * @param $input
     */
   

    /**
     * Get attribute from date format
     * @param $input
     *
     * @return string
     */
    

    
}