<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laraveldaily\Quickadmin\Observers\UserActionsObserver;


use Illuminate\Database\Eloquent\SoftDeletes;

class MillionGodRankingStaff extends Model {

    use SoftDeletes;

    /**
    * The attributes that should be mutated to dates.
    *
    * @var array
    */
    protected $dates = ['deleted_at'];

    protected $table    = 'milliongodrankingstaff';
    
    protected $fillable = [
          'ranking_id',
          'name',
          'image',
          'executive_layer'
    ];
    

    public static function boot()
    {
        parent::boot();

        MillionGodRankingStaff::observe(new UserActionsObserver);
    }
    
    public function ranking()
    {
        return $this->hasOne('App\Ranking', 'id', 'ranking_id');
    }


    
    
    
}