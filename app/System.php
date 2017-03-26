<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laraveldaily\Quickadmin\Observers\UserActionsObserver;


use Illuminate\Database\Eloquent\SoftDeletes;

class System extends Model {

    use SoftDeletes;

    /**
    * The attributes that should be mutated to dates.
    *
    * @var array
    */
    protected $dates = ['deleted_at'];

    protected $table    = 'system';
    
    protected $fillable = [
          'cost',
          'before_visiting',
          'greeting',
          'address',
          'million_god',
          'gigolo',
    ];
    

    public static function boot()
    {
        parent::boot();

        System::observe(new UserActionsObserver);
    }
    
    
    
    
}