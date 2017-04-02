<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laraveldaily\Quickadmin\Observers\UserActionsObserver;


use Illuminate\Database\Eloquent\SoftDeletes;

class LogGroupRanking extends Model {

    use SoftDeletes;

    /**
    * The attributes that should be mutated to dates.
    *
    * @var array
    */
    protected $dates = ['deleted_at'];

    protected $table    = 'log_group_ranking';
    
    protected $fillable = [
          'id_ranking',
          'id_staff',
          'type',
          'month',
          'year'
    ];

    public function ranking()
    {
        return $this->hasOne('App\Ranking', 'id', 'id_ranking');
    }
}