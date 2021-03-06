<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laraveldaily\Quickadmin\Observers\UserActionsObserver;


use Illuminate\Database\Eloquent\SoftDeletes;

class StaffMovies extends Model {

    use SoftDeletes;

    /**
    * The attributes that should be mutated to dates.
    *
    * @var array
    */
    protected $dates = ['deleted_at'];

    protected $table    = 'staffmovies';
    
    protected $fillable = [
          'staffs_id',
          'link'
    ];
    

    public static function boot()
    {
        parent::boot();

        StaffMovies::observe(new UserActionsObserver);
    }
    
    public function staffs()
    {
        return $this->hasOne('App\godstaffs', 'id', 'staffs_id');
    }


    
    
    
}