<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laraveldaily\Quickadmin\Observers\UserActionsObserver;


use Illuminate\Database\Eloquent\SoftDeletes;

class DialogueTopic extends Model {

    use SoftDeletes;

    /**
    * The attributes that should be mutated to dates.
    *
    * @var array
    */
    protected $dates = ['deleted_at'];

    protected $table    = 'dialoguetopic';
    
    protected $fillable = [
          'name',
          'description'
    ];
    

    public static function boot()
    {
        parent::boot();

        DialogueTopic::observe(new UserActionsObserver);
    }
    
    
    
    
}