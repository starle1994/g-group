<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laraveldaily\Quickadmin\Observers\UserActionsObserver;


use Illuminate\Database\Eloquent\SoftDeletes;

class GigoloRankingStaff extends Model {

    use SoftDeletes;

    /**
    * The attributes that should be mutated to dates.
    *
    * @var array
    */
    protected $dates = ['deleted_at'];

    protected $table    = 'gigolorankingstaff';
    
    protected $fillable = [
          'ranking_id',
          'name',
          'image',
          'Executive_layer'
    ];
    

    public static function boot()
    {
        parent::boot();

        GigoloRankingStaff::observe(new UserActionsObserver);
    }
    
    public function ranking()
    {
        return $this->hasOne('App\Ranking', 'id', 'ranking_id');
    }


    
    
    
}