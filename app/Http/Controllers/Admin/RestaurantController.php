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
use App\CategoryLeft;
use App\ImageRestaurant;
use Image;
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
	     $categories = CategoryLeft::where('is_restaurant',0)->pluck("name", "id")->prepend('Please select', null);
	    
	    return view('admin.restaurant.create',compact('categories'));
	}

	/**
	 * Store a newly created restaurant in storage.
	 *
     * @param CreateRestaurantRequest|Request $request
	 */
	public function store(CreateRestaurantRequest $request)
	{
	     $rookie = Restaurant::orderBy('id','desc')->first();
	    $request = $this->saveFiles($request);
		
		$input = $request->all();
		
	    if ($rookie == null) {
	    	$number = 1;
	    }else{
	    	$alias = explode('-',$rookie->alias);

	    	$number = $alias[1]+1;
	    }
	    
	    $input['alias'] = 'list-'.$number;
		$restaurant = Restaurant::create($input);

		return redirect()->route('admin.restaurant.image',$restaurant->id);
	}

	public function showUloadImage($id)
	{
		return view('admin.restaurant.image_restaurant',compact('id'));
	}

	public function postUloadImage(Request $request)
	{
		$length =3;
		$image = $request->file('file');
        $description = $request->get('description');
        $chars = 'ABCDEFGHJKMNPQRSTUVWXYZabcdefghjkmnpqrstuvwxyz23456789';
	    $chars_length = (strlen($chars) - 1);
	    $string = $chars{rand(0, $chars_length)};

	    for ($i = 1; $i < $length; $i = strlen($string))
	    {
	        $r = $chars{rand(0, $chars_length)};
	        if ($r != $string{$i - 1}) $string .=  $r;
	    }
        $input['imagename'] = time().'-'.$string.'.'.$image->getClientOriginalExtension();
        $destinationPath = public_path('uploads/thumb');
        $img = Image::make($image->getRealPath());
        $img->resize(50, 50, function ($constraint) {
            $constraint->aspectRatio();
        })->save($destinationPath.'/'.$input['imagename']);

        $destinationPath = public_path('uploads');
            $image->move($destinationPath, $input['imagename']);

        ImageRestaurant::create(['image'=>$input['imagename'],
        						 'restaurant_id'=>$request->id,
                                'description' =>$request->description]);

		return response()->json(['success'=>$input['imagename']]);
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
