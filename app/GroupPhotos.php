<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laraveldaily\Quickadmin\Observers\UserActionsObserver;


use Illuminate\Database\Eloquent\SoftDeletes;

class GroupPhotos extends Model {

    use SoftDeletes;

    /**
    * The attributes that should be mutated to dates.
    *
    * @var array
    */
    protected $dates = ['deleted_at'];

    protected $table    = 'groupphotos';
    
    protected $fillable = [
          'groups_id',
          'image'
    ];
    

    public static function boot()
    {
        parent::boot();

        GroupPhotos::observe(new UserActionsObserver);
    }
    
    public function groups()
    {
        return $this->hasOne('App\Groups', 'id', 'groups_id');
    }


    
    
    
}