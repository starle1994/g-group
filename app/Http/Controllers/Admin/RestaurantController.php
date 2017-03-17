<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Redirect;
use Schema;
use App\Restaurant;
use App\Http\Requests\CreateRestaurantRequest;
use App\Http\Requests\UpdateRestaurantRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Traits\FileUploadTrait;


class RestaurantController extends Controller {

	/**
	 * Display a listing of restaurant
	 *
     * @param Request $request
     *
     * @return \Illuminate\View\View
	 */
	public function index(Request $request)
    {
        $restaurant = Restaurant::all();

		return view('admin.restaurant.index', compact('restaurant'));
	}

	/**
	 * Show the form for creating a new restaurant
	 *
     * @return \Illuminate\View\View
	 */
	public function create()
	{
	    
	    
	    return view('admin.restaurant.create');
	}

	/**
	 * Store a newly created restaurant in storage.
	 *
     * @param CreateRestaurantRequest|Request $request
	 */
	public function store(CreateRestaurantRequest $request)
	{
	    $request = $this->saveFiles($request);
		Restaurant::create($request->all());

		return redirect()->route(config('quickadmin.route').'.restaurant.index');
	}

	/**
	 * Show the form for editing the specified restaurant.
	 *
	 * @param  int  $id
     * @return \Illuminate\View\View
	 */
	public function edit($id)
	{
		$restaurant = Restaurant::find($id);
	    
	    
		return view('admin.restaurant.edit', compact('restaurant'));
	}

	/**
	 * Update the specified restaurant in storage.
     * @param UpdateRestaurantRequest|Request $request
     *
	 * @param  int  $id
	 */
	public function update($id, UpdateRestaurantRequest $request)
	{
		$restaurant = Restaurant::findOrFail($id);

        $request = $this->saveFiles($request);

		$restaurant->update($request->all());

		return redirect()->route(config('quickadmin.route').'.restaurant.index');
	}

	/**
	 * Remove the specified restaurant from storage.
	 *
	 * @param  int  $id
	 */
	public function destroy($id)
	{
		Restaurant::destroy($id);

		return redirect()->route(config('quickadmin.route').'.restaurant.index');
	}

    /**
     * Mass delete function from index page
     * @param Request $request
     *
     * @return mixed
     */
    public function massDelete(Request $request)
    {
        if ($request->get('toDelete') != 'mass') {
            $toDelete = json_decode($request->get('toDelete'));
            Restaurant::destroy($toDelete);
        } else {
            Restaurant::whereNotNull('id')->delete();
        }

        return redirect()->route(config('quickadmin.route').'.restaurant.index');
    }

}
