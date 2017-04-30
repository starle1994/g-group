<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laraveldaily\Quickadmin\Observers\UserActionsObserver;


use Illuminate\Database\Eloquent\SoftDeletes;

class BestRanking extends Model {

    use SoftDeletes;

    /**
    * The attributes that should be mutated to dates.
    *
    * @var array
    */
    protected $dates = ['deleted_at'];

    protected $table    = 'bestranking';
    
    protected $fillable = [
          'godstaffs_id',
          'image',
          'ranking_id',
          'url',
    ];
    

    public static function boot()
    {
        parent::boot();

        BestRanking::observe(new UserActionsObserver);
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