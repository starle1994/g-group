<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Redirect;
use Schema;
use App\GigoloRankingStaff;
use App\Http\Requests\CreateGigoloRankingStaffRequest;
use App\Http\Requests\UpdateGigoloRankingStaffRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Traits\FileUploadTrait;
use App\Ranking;
use App\GodStaffs;
use Image;

class GigoloRankingStaffController extends Controller {

	/**
	 * Display a listing of gigolorankingstaff
	 *
     * @param Request $request
     *
     * @return \Illuminate\View\View
	 */
	public function index(Request $request)
    {
        $gigolorankingstaff = GigoloRankingStaff::with("ranking")->with("godstaffs")->get();

		return view('admin.gigolorankingstaff.index', compact('gigolorankingstaff'));
	}

	/**
	 * Show the form for creating a new gigolorankingstaff
	 *
     * @return \Illuminate\View\View
	 */
	public function create()
	{
	    $ranking = Ranking::pluck("number", "id")->prepend('Please select', null);
	    $godstaffs = GodStaffs::pluck("name", "id")->prepend('Please select', null);
	    
	    return view('admin.gigolorankingstaff.create', compact("ranking","godstaffs"));
	}

	/**
	 * Store a newly created gigolorankingstaff in storage.
	 *
     * @param CreateGigoloRankingStaffRequest|Request $request
	 */
	public function store(CreateGigoloRankingStaffRequest $request)
	{
	    $length =3;
		$image = $request->file('image');

        $chars = 'ABCDEFGHJKMNPQRSTUVWXYZabcdefghjkmnpqrstuvwxyz23456789';
	    $chars_length = (strlen($chars) - 1);
	    $string = $chars{rand(0, $chars_length)};

	    for ($i = 1; $i < $length; $i = strlen($string))
	    {
	        $r = $chars{rand(0, $chars_length)};
	        if ($r != $string{$i - 1}) $string .=  $r;
	    }
	    $input['imagename'] = '';
	    if ($image != null) {
	    	$input['imagename'] = time().'-'.$string.'.'.$image->getClientOriginalExtension();
	        $destinationPath = public_path('uploads/thumb');
	        $img = Image::make($image->getRealPath());
	        $img->resize(50, 50, function ($constraint) {
	            $constraint->aspectRatio();
	        })->save($destinationPath.'/'.$input['imagename']);
	        $destinationPath = public_path('uploads');
	            $image->move($destinationPath, $input['imagename']);
	    }

	    $image2 = $request->file('banner');
        $input['imagename1']= '';
	    if ($image2 != null) {
		        $string = $chars{rand(0, $chars_length)};
		        $input['imagename1'] = time().'-'.$string.'.'.$image2->getClientOriginalExtension();
		        $destinationPath = public_path('uploads/thumb');
		        $img = Image::make($image2->getRealPath());
		        $img->resize(50, 50, function ($constraint) {
		            $constraint->aspectRatio();
		        })->save($destinationPath.'/'.$input['imagename1']);
		        $destinationPath = public_path('uploads');
		        $image2->move($destinationPath, $input['imagename1']);
	    }

		GigoloRankingStaff::create(['ranking_id'=>$request->ranking_id,
          'godstaffs_id'=>$request->godstaffs_id,
          'image'=>$input['imagename'],
          'banner'=>$input['imagename1']]);

		return redirect()->route(config('quickadmin.route').'.gigolorankingstaff.index');
	}

	/**
	 * Show the form for editing the specified gigolorankingstaff.
	 *
	 * @param  int  $id
     * @return \Illuminate\View\View
	 */
	public function edit($id)
	{
		$gigolorankingstaff = GigoloRankingStaff::with("godstaffs")->where('id',$id)->first();
	    $ranking = Ranking::pluck("description", "id")->prepend('Please select', null);
	     $godstaffs = GodStaffs::pluck("name", "id")->prepend('Please select', null);
	    
		return view('admin.gigolorankingstaff.edit', compact('gigolorankingstaff', "ranking","godstaffs"));
	}

	/**
	 * Update the specified gigolorankingstaff in storage.
     * @param UpdateGigoloRankingStaffRequest|Request $request
     *
	 * @param  int  $id
	 */
	public function update($id, UpdateGigoloRankingStaffRequest $request)
	{

		$gigolorankingstaff = GigoloRankingStaff::findOrFail($id);

        $length =3;
		$image = $request->file('image');

        $chars = 'ABCDEFGHJKMNPQRSTUVWXYZabcdefghjkmnpqrstuvwxyz23456789';
	    $chars_length = (strlen($chars) - 1);
	    $string = $chars{rand(0, $chars_length)};

	    for ($i = 1; $i < $length; $i = strlen($string))
	    {
	        $r = $chars{rand(0, $chars_length)};
	        if ($r != $string{$i - 1}) $string .=  $r;
	    }

	     $input['imagename'] = '';
	    if ($image != null) {
	        $input['imagename'] = time().'-'.$string.'.'.$image->getClientOriginalExtension();
	        $destinationPath = public_path('uploads/thumb');
	        $img = Image::make($image->getRealPath());
	        $img->resize(50, 50, function ($constraint) {
	            $constraint->aspectRatio();
	        })->save($destinationPath.'/'.$input['imagename']);
	        $destinationPath = public_path('uploads');
	            $image->move($destinationPath, $input['imagename']);
	    }

	    $image2 = $request->file('banner');

	    $input['imagename1'] = '';
	    if ($image2 != null) {
	    	$input['imagename1'] = time().'-'.$string.'.'.$image2->getClientOriginalExtension();
	        $destinationPath = public_path('uploads/thumb');
	        $img = Image::make($image2->getRealPath());
	        $img->resize(50, 50, function ($constraint) {
	            $constraint->aspectRatio();
	        })->save($destinationPath.'/'.$input['imagename1']);
	        $destinationPath = public_path('uploads');
	            $image2->move($destinationPath, $input['imagename1']);
	    }
        $ranking_id = ($request->ranking_id == '') ? $gigolorankingstaff->ranking_id : $request->ranking_id;
        $godstaffs_id = ($request->godstaffs_id == '') ? $gigolorankingstaff->godstaffs_id : $request->ranking_id;
         $imagename = ($input['imagename'] == '') ? $gigolorankingstaff->image : $input['imagename'];
        $imagename1 = ($input['imagename1'] == '') ? $gigolorankingstaff->banner : $input['imagename1'];

		$gigolorankingstaff->update(['ranking_id'=>$ranking_id,
          'godstaffs_id'=>$godstaffs_id,
          'image'=>$imagename,
          'banner'=>$imagename1]);

		return redirect()->route(config('quickadmin.route').'.gigolorankingstaff.index');
	}

	/**
	 * Remove the specified gigolorankingstaff from storage.
	 *
	 * @param  int  $id
	 */
	public function destroy($id)
	{
		GigoloRankingStaff::destroy($id);

		return redirect()->route(config('quickadmin.route').'.gigolorankingstaff.index');
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
            GigoloRankingStaff::destroy($toDelete);
        } else {
            GigoloRankingStaff::whereNotNull('id')->delete();
        }

        return redirect()->route(config('quickadmin.route').'.gigolorankingstaff.index');
    }

}
