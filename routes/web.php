<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', ['as' => 'user.home', function () {
    
    return redirect()->route('group-top');
   
}]);
Route::get('/home', ['as'=>'group-top','uses'=>'HomeController@index']);
Route::get('/schedule',['as'=>'schedule','uses'=>'HomeController@showSchedule']);
Route::get('/ajax-schedule',['as'=>'post.schedule','uses'=>'HomeController@postSchedule']);
Route::get('/shop-list',['as'=>'shop-list','uses'=>'HomeController@showShopList']);
Route::get('/group-ranking',['as'=>'group-ranking','uses'=>'HomeController@showGroupRanking']);

Route::get('/million-god',['as'=>'million-god','uses'=>'HomeController@showMillionGod']);
Route::get('/gigolo',['as'=>'gigoro','uses'=>'HomeController@showGigoro']);

Route::get('/system',['as'=>'system','uses'=>'HomeController@showSystem']);

Route::get('/staff-detail/{alias}',['as'=>'staff-detail','uses'=>'HomeController@staffDetail']);
Route::get('/ranking-staff',['as'=>'ranking-staff','uses'=>'HomeController@rankingMillionStaff']);

Route::get('/event',['as'=>'event','uses'=>'HomeController@showEvent']);
Route::get('/event-detail',['as'=>'event-detail','uses'=>'HomeController@showEventDetail']);

Route::get('/dialogue',['as'=>'dialogue','uses'=>'HomeController@showDialog']);

Route::get('/cast-feature',['as'=>'cast-feature','uses'=>'HomeController@showCastFeature']);
Route::get('/cast-feature-detail/{alias}',['as'=>'cast-feature-detail','uses'=>'HomeController@showDetailCastFeature']);

Route::get('/movie',['as'=>'movie','uses'=>'HomeController@showMovie']);

Route::get('/rookie-feature',['as'=>'rookie-feature','uses'=>'HomeController@showRookie']);
Route::get('/rookie-feature-detail/{alias}',['as'=>'rookie-feature-detail','uses'=>'HomeController@showRookieDetail']);

Route::get('/blog',['as'=>'Blog','uses'=>'HomeController@showBlog']);
Route::get('/blog-detail/{alias}',['as'=>'blog-detail','uses'=>'HomeController@showBlogDetail']);

Route::get('/self-feature',['as'=>'self-feature','uses'=>'HomeController@showSelfFeature']);

Route::get('/coupon',['as'=>'coupon','uses'=>'HomeController@showBlog']);
Route::get('/recruit',['as'=>'recruit','uses'=>'HomeController@showBlog']);

Route::group([ 'middleware' => 'auth'], function () {
    Route::get(config('quickadmin.homeRoute'), 'QuickadminController@index');
    Route::group([ 'middleware' => 'role'], function () {
        // Menu routing
        Route::get(config('quickadmin.route') . '/menu', [
            'as' => 'menu',
            'uses' => 'QuickadminMenuController@index'
        ]);
        Route::post(config('quickadmin.route') . '/menu', [
            'as' => 'menu',
            'uses' => 'QuickadminMenuController@rearrange'
        ]);

        Route::get(config('quickadmin.route') . '/menu/edit/{id}', [
            'as' => 'menu.edit',
            'uses' => 'QuickadminMenuController@edit'
        ]);
        Route::post(config('quickadmin.route') . '/menu/edit/{id}', [
            'as' => 'menu.edit',
            'uses' => 'QuickadminMenuController@update'
        ]);
  
            Route::get(config('quickadmin.route') . '/menu/crud', [
                'as' => 'menu.crud',
                'uses' => 'QuickadminMenuController@createCrud'
            ]);
            Route::post(config('quickadmin.route') . '/menu/crud', [
                'as' => 'menu.crud.insert',
                'uses' => 'QuickadminMenuController@insertCrud'
            ]);

            Route::get(config('quickadmin.route') . '/menu/parent', [
                'as' => 'menu.parent',
                'uses' => 'QuickadminMenuController@createParent'
            ]);
            Route::post(config('quickadmin.route') . '/menu/parent', [
                'as' => 'menu.parent.insert',
                'uses' => 'QuickadminMenuController@insertParent'
            ]);

            Route::get(config('quickadmin.route') . '/menu/custom', [
                'as' => 'menu.custom',
                'uses' => 'QuickadminMenuController@createCustom'
            ]);
            Route::post(config('quickadmin.route') . '/menu/custom', [
                'as' => 'menu.custom.insert',
                'uses' => 'QuickadminMenuController@insertCustom'
            ]);
  
        Route::get(config('quickadmin.route') . '/actions', [
            'as' => 'actions',
            'uses' => 'UserActionsController@index'
        ]);
        Route::get(config('quickadmin.route') . '/actions/ajax', [
            'as' => 'actions.ajax',
            'uses' => 'UserActionsController@table'
        ]);
    });
});


// @todo move to default routes.php
Route::group([
    'middleware' => ['web']
], function () {
    // Point to App\Http\Controllers\UsersController as a resource
    Route::group([
        'middleware' => 'role'
    ], function () {
        Route::resource('users', 'UsersController');
        Route::resource('roles', 'RolesController');
    });
    Route::auth();
});


use Illuminate\Support\Facades\View;
use Laraveldaily\Quickadmin\Models\Menu;

if (Schema::hasTable('menus')) {
    $menus = Menu::with('children')->where('menu_type', '!=', 0)->orderBy('position')->get();
    View::share('menus', $menus);
    if (! empty($menus)) {
        Route::group([
            'middleware' => ['web', 'auth', 'role'],
            'prefix'     => config('quickadmin.route'),
            'as'         => config('quickadmin.route') . '.',
        ], function () use ($menus) {
            foreach ($menus as $menu) {
                switch ($menu->menu_type) {
                    case 1:
                        Route::post(strtolower($menu->name) . '/massDelete', [
                            'as'   => strtolower($menu->name) . '.massDelete',
                            'uses' => 'Admin\\' . ucfirst(camel_case($menu->name)) . 'Controller@massDelete'
                        ]);
                        Route::resource(strtolower($menu->name),
                            'Admin\\' . ucfirst(camel_case($menu->name)) . 'Controller', ['except' => 'show']);
                        break;
                    case 3:
                        Route::get(strtolower($menu->name), [
                            'as'   => strtolower($menu->name) . '.index',
                            'uses' => 'Admin\\' . ucfirst(camel_case($menu->name)) . 'Controller@index',
                        ]);
                        break;
                }
            }
        });
    }
}
