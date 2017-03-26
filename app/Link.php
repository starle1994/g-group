<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laraveldaily\Quickadmin\Observers\UserActionsObserver;


use Illuminate\Database\Eloquent\SoftDeletes;

class Link extends Model {

    use SoftDeletes;

    /**
    * The attributes that should be mutated to dates.
    *
    * @var array
    */
    protected $dates = ['deleted_at'];

    protected $table    = 'link';
    
    protected $fillable = [
          'name_english',
          'name_japanese',
          'image',
          'alias'
    ];
    

    public static function boot()
    {
        parent::boot();

        Link::observe(new UserActionsObserver);
    }
    
    
    
    
}