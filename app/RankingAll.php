<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laraveldaily\Quickadmin\Observers\UserActionsObserver;


use Illuminate\Database\Eloquent\SoftDeletes;

class RankingAll extends Model {

    use SoftDeletes;

    /**
    * The attributes that should be mutated to dates.
    *
    * @var array
    */
    protected $dates = ['deleted_at'];

    protected $table    = 'rankingall';
    
    protected $fillable = [
          'grouprankingtype_id',
          'godstaffs_id',
          'image',
          'ranking_id'
    ];
    

    public static function boot()
    {
        parent::boot();

        RankingAll::observe(new UserActionsObserver);
    }
    
    public function grouprankingtype()
    {
        return $this->hasOne('App\GroupRankingType', 'id', 'grouprankingtype_id');
    }


    public function godstaffs()
    {
        return $this->hasOne('App\GodStaffs', 'id', 'godstaffs_id');
    }


    public function ranking()
    {
        return $this->hasOne('App\Ranking', 'id', 'ranking_id');
    }


    
    
    
}