<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laraveldaily\Quickadmin\Observers\UserActionsObserver;


use Illuminate\Database\Eloquent\SoftDeletes;

class Groups extends Model {

    use SoftDeletes;

    /**
    * The attributes that should be mutated to dates.
    *
    * @var array
    */
    protected $dates = ['deleted_at'];

    protected $table    = 'groups';
    
    protected $fillable = [
          'name',
          'romaji_name',
          'position',
          'description',
          'ranking_id'
    ];
    

    public static function boot()
    {
        parent::boot();

        Groups::observe(new UserActionsObserver);
    }
    
    public function ranking()
    {
        return $this->hasOne('App\Ranking', 'id', 'ranking_id');
    }


    
    
    
}