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
use Image,File;
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
		
        $category = CategoryLeft::where('is_restaurant',0)->get();

        $restaurant = Restaurant::orderBy('id','desc')->where('cate_id',$category[0]->id)->get();
        $id = $category[0]->id;

		return view('admin.restaurant.index', compact('restaurant','category','id'));
	}

	public function view($id)
    {
        $restaurant = Restaurant::orderBy('id','desc')->where('cate_id',$id)->get();
       	$category = CategoryLeft::where('is_restaurant',0)->get();
		return view('admin.restaurant.index', compact('restaurant','category','id'));
	}

	/**
	 * Show the form for creating a new restaurant
	 *
     * @return \Illuminate\View\View
	 */
	public function create($id = null)
	{
		if ($id== null) {
			return redirect()->back();
		}
	    $category = CategoryLeft::where('is_restaurant',0)->get();
	    $categories[''] = 'Please choose';
	    foreach($category as $value) {
	    	$categories[$value->id] = $value->name;
	    }
	    return view('admin.restaurant.create',compact('categories','id'));
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
	    	if(isset($alias[1])){
	    		$number = $alias[1]+1;
	    	}else{
	    		$number =1;
	    	}
	    }
	    
	    $input['alias'] = 'list-'.$number;
		$restaurant = Restaurant::create($input);

		return redirect()->route('admin.restaurant.image',$restaurant->id);
	}

	public function showUloadImage($id)
	{
		$restaurant = Restaurant::where('id',$id)->with('CategoryLeft')->first();
		return view('admin.restaurant.image_restaurant',compact('id','restaurant'));
	}

	public function postUloadImage(Request $request)
	{
		$length =3;
		$image = $request->file('file');
        $description = $request->get('description');
        $restaurant_id = $request->get('restaurant_id');
        $name = $request->get('name');
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

        ImageRestaurant::create(['image'			=>$input['imagename'],
        						 'restaurant_id'	=>$restaurant_id,
                                'description' 		=>$description,
                                'name'				=>$name
                                ]);

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
	    $category = CategoryLeft::where('is_restaurant',0)->get();
	    $categories[''] = 'Please choose';
	    foreach($category as $value) {
	    	$categories[$value->id] = $value->name;
	    }
		return view('admin.restaurant.edit', compact('restaurant','categories'));
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
		$image_f = Restaurant::where('id', $id)->first();
		File::Delete(public_path().'/uploads/'.$image_f->image);
		File::Delete(public_path().'/uploads/thumb/'.$image_f->image);

		$images = ImageRestaurant::where('restaurant_id', $id)->get();
		foreach ($images as $img) {
			File::Delete(public_path().'/uploads/'.$img->image);
			File::Delete(public_path().'/uploads/thumb/'.$img->image);
			ImageRestaurant::destroy($img->id);
		}
		Restaurant::destroy($id);

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
            Restaurant::destroy($toDelete);
        } else {
            Restaurant::whereNotNull('id')->delete();
        }

        return redirect()->route(config('quickadmin.route').'.restaurant.index');
    }

}
