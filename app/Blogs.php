<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laraveldaily\Quickadmin\Observers\UserActionsObserver;


use Illuminate\Database\Eloquent\SoftDeletes;

class Blogs extends Model {

    use SoftDeletes;

    /**
    * The attributes that should be mutated to dates.
    *
    * @var array
    */
    protected $dates = ['deleted_at'];

    protected $table    = 'blogs';
    
    protected $fillable = [
          'name',
          'text',
          'description',
          'content',
          'image',
          'shopslist_id',
          'alias',
    ];
    

    public static function boot()
    {
        parent::boot();

        Blogs::observe(new UserActionsObserver);
    }
    
    public function shopslist()
    {
        return $this->hasOne('App\ShopsList', 'id', 'shopslist_id');
    }


    
    
    
}