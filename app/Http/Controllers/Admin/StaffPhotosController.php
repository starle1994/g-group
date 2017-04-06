<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Redirect;
use Schema;
use App\StaffPhotos;
use App\Http\Requests\CreateStaffPhotosRequest;
use App\Http\Requests\UpdateStaffPhotosRequest;
use Illuminate\Http\Request;
use App\GodStaffs;
use Image;
use App\Http\Controllers\Traits\FileUploadTrait;

class StaffPhotosController extends Controller {

	/**
	 * Display a listing of staffphotos
	 *
     * @param Request $request
     *
     * @return \Illuminate\View\View
	 */
	public function index(Request $request)
    {
        $staffphotos = StaffPhotos::with("staffs")->orderBy('id','desc')->get();

		return view('admin.staffphotos.index', compact('staffphotos'));
	}

	/**
	 * Show the form for creating a new staffphotos
	 *
     * @return \Illuminate\View\View
	 */
	public function create()
	{
	    $staffs = GodStaffs::pluck("name", "id")->prepend('Please select', null);

	    
	    return view('admin.staffphotos.create', compact("staffs"));
	}

	/**
	 * Store a newly created staffphotos in storage.
	 *
     * @param CreateStaffPhotosRequest|Request $request
	 */
	public function store(CreateStaffPhotosRequest $request)
	{
	    $length =3;
		$image = $request->file('file');
      
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

		StaffPhotos::create([
		'staffs_id'=>$request->staffs_id,
          'photo'=>$input['imagename']
          ]);

		return response()->json(['success'=>$input['imagename']]);
	}

	/**
	 * Show the form for editing the specified staffphotos.
	 *
	 * @param  int  $id
     * @return \Illuminate\View\View
	 */
	public function edit($id)
	{
		$staffphotos = StaffPhotos::find($id);
	    $staffs = GodStaffs::pluck("name", "id")->prepend('Please select', null);

	    
		return view('admin.staffphotos.edit', compact('staffphotos', "staffs"));
	}

	/**
	 * Update the specified staffphotos in storage.
     * @param UpdateStaffPhotosRequest|Request $request
     *
	 * @param  int  $id
	 */
	public function update($id, UpdateStaffPhotosRequest $request)
	{
		$staffphotos = StaffPhotos::findOrFail($id);

        $request = $this->saveFiles($request);
        
		$staffphotos->update($request->all());

		return redirect()->route(config('quickadmin.route').'.staffphotos.index');
	}

	/**
	 * Remove the specified staffphotos from storage.
	 *
	 * @param  int  $id
	 */
	public function destroy($id)
	{
		StaffPhotos::destroy($id);

		return redirect()->route(config('quickadmin.route').'.staffphotos.index');
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
            StaffPhotos::destroy($toDelete);
        } else {
            StaffPhotos::whereNotNull('id')->delete();
        }

        return redirect()->route(config('quickadmin.route').'.staffphotos.index');
    }

}
