<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Redirect;
use Schema;
use App\ImageRestaurant;
use App\Http\Requests\CreateImageRestaurantRequest;
use App\Http\Requests\UpdateImageRestaurantRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Traits\FileUploadTrait;
use App\Restaurant;


class ImageRestaurantController extends Controller {

	/**
	 * Display a listing of imagerestaurant
	 *
     * @param Request $request
     *
     * @return \Illuminate\View\View
	 */
	public function index(Request $request)
    {
        $imagerestaurant = ImageRestaurant::with("restaurant")->orderBy('id','desc')->get();

		return view('admin.imagerestaurant.index', compact('imagerestaurant'));
	}

	/**
	 * Show the form for creating a new imagerestaurant
	 *
     * @return \Illuminate\View\View
	 */
	public function create()
	{
	    $restaurant = Restaurant::pluck("name", "id")->prepend('Please select', null);

	    
	    return view('admin.imagerestaurant.create', compact("restaurant"));
	}

	/**
	 * Store a newly created imagerestaurant in storage.
	 *
     * @param CreateImageRestaurantRequest|Request $request
	 */
	public function store(CreateImageRestaurantRequest $request)
	{
	    $request = $this->saveFiles($request);
		ImageRestaurant::create($request->all());

		return redirect()->route(config('quickadmin.route').'.imagerestaurant.index');
	}

	/**
	 * Show the form for editing the specified imagerestaurant.
	 *
	 * @param  int  $id
     * @return \Illuminate\View\View
	 */
	public function edit($id)
	{
		$imagerestaurant = ImageRestaurant::find($id);
	    $restaurant = Restaurant::pluck("name", "id")->prepend('Please select', null);

	    
		return view('admin.imagerestaurant.edit', compact('imagerestaurant', "restaurant"));
	}

	/**
	 * Update the specified imagerestaurant in storage.
     * @param UpdateImageRestaurantRequest|Request $request
     *
	 * @param  int  $id
	 */
	public function update($id, UpdateImageRestaurantRequest $request)
	{
		$imagerestaurant = ImageRestaurant::findOrFail($id);

        $request = $this->saveFiles($request);

		$imagerestaurant->update($request->all());

		return redirect()->route(config('quickadmin.route').'.imagerestaurant.index');
	}

	/**
	 * Remove the specified imagerestaurant from storage.
	 *
	 * @param  int  $id
	 */
	public function destroy($id)
	{
		ImageRestaurant::destroy($id);

		return redirect()->route(config('quickadmin.route').'.imagerestaurant.index');
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
            ImageRestaurant::destroy($toDelete);
        } else {
            ImageRestaurant::whereNotNull('id')->delete();
        }

        return redirect()->route(config('quickadmin.route').'.imagerestaurant.index');
    }

}
