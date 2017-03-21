<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laraveldaily\Quickadmin\Observers\UserActionsObserver;


use Illuminate\Database\Eloquent\SoftDeletes;

class StaffPhotos extends Model {

    use SoftDeletes;

    /**
    * The attributes that should be mutated to dates.
    *
    * @var array
    */
    protected $dates = ['deleted_at'];

    protected $table    = 'staffphotos';
    
    protected $fillable = [
          'staffs_id',
          'photo'
    ];
    

    public static function boot()
    {
        parent::boot();

        StaffPhotos::observe(new UserActionsObserver);
    }
    
    public function staffs()
    {
        return $this->hasOne('App\GodStaffs', 'id', 'staffs_id');
    }


    
    
    
}