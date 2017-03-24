<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laraveldaily\Quickadmin\Observers\UserActionsObserver;


use Illuminate\Database\Eloquent\SoftDeletes;

class EventsFeature extends Model {

    use SoftDeletes;

    /**
    * The attributes that should be mutated to dates.
    *
    * @var array
    */
    protected $dates = ['deleted_at'];

    protected $table    = 'eventsfeature';
    
    protected $fillable = [
          'name',
          'time',
          'image',
          'description',
          'alias',
    ];
    

    public static function boot()
    {
        parent::boot();

        EventsFeature::observe(new UserActionsObserver);
    }
    
    public function schedule()
    {
        return $this->hasOne('App\Schedule', 'schedule_id', 'id');
    }
    
    
}