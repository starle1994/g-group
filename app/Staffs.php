<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laraveldaily\Quickadmin\Observers\UserActionsObserver;


use Illuminate\Database\Eloquent\SoftDeletes;

class Staffs extends Model {

    use SoftDeletes;

    /**
    * The attributes that should be mutated to dates.
    *
    * @var array
    */
    protected $dates = ['deleted_at'];

    protected $table    = 'staffs';
    
    protected $fillable = [
          'shopslist_id',
          'name',
          'romajiname',
          'position',
          'description'
    ];
    

    public static function boot()
    {
        parent::boot();

        Staffs::observe(new UserActionsObserver);
    }
    
    public function shopslist()
    {
        return $this->hasOne('App\ShopsList', 'id', 'shopslist_id');
    }


    
    
    
}