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
use File;

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
        return redirect()->back();
	}

	public function view($id)
    {
        $imagerestaurant = ImageRestaurant::with("restaurant")->orderBy('id','desc')->where('restaurant_id',$id)->get();
        $restaurants = Restaurant::where('id',$id)->first();
		return view('admin.imagerestaurant.index', compact('imagerestaurant','restaurants'));
	}

	/**
	 * Show the form for creating a new imagerestaurant
	 *
     * @return \Illuminate\View\View
	 */
	public function create()
	{
	    $restaurants = Restaurant::orderBy('id','desc')->take(20)->get();
	    $restaurant[''] = 'Please choose';
	    foreach($restaurants as $value) {
	    	$restaurant[$value->id] = $value->name;
	    }
	    
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

		return redirect()->back();
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
	    $restaurants = Restaurant::orderBy('id','desc')->take(20)->get();
	    $restaurant[''] = 'Please choose';
	    foreach($restaurants as $value) {
	    	$restaurant[$value->id] = $value->name;
	    }
	    
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

		return redirect()->back();
	}

	/**
	 * Remove the specified imagerestaurant from storage.
	 *
	 * @param  int  $id
	 */
	public function destroy($id)
	{
		$image = ImageRestaurant::where('id', $id)->first();
		File::Delete(public_path().'/uploads/'.$image->image);
		File::Delete(public_path().'/uploads/thumb/'.$image->image);

		ImageRestaurant::destroy($id);

		return redirect()->back();
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
