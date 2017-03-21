<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laraveldaily\Quickadmin\Observers\UserActionsObserver;


use Illuminate\Database\Eloquent\SoftDeletes;

class GodStaffs extends Model {

    use SoftDeletes;

    /**
    * The attributes that should be mutated to dates.
    *
    * @var array
    */
    protected $dates = ['deleted_at'];

    protected $table    = 'godstaffs';
    
    protected $fillable = [
          'shopslist_id',
          'name',
          'romajiname',
          'position',
          'image',
          'description'
    ];
    

    public static function boot()
    {
        parent::boot();

        GodStaffs::observe(new UserActionsObserver);
    }
    
    public function shopslist()
    {
        return $this->hasOne('App\ShopsList', 'id', 'shopslist_id');
    }
    
    public function staffphotos()
    {
        return $this->hasMany('App\StaffPhotos', 'staffs_id', 'id');
    }

    public function staffmovies()
    {
        return $this->hasMany('App\StaffMovies', 'staffs_id', 'id');
    }

    public function logRanking()
    {
        return $this->hasMany('App\LogGroupRanking', 'staffs_id', 'id');
    }
}