<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Redirect;
use Schema;
use App\MillionGodRankingStaff;
use App\Http\Requests\CreateMillionGodRankingStaffRequest;
use App\Http\Requests\UpdateMillionGodRankingStaffRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Traits\FileUploadTrait;
use App\Ranking;
use App\GodStaffs;
use Image;
use App\LogGroupRanking;
use DateTime;

class MillionGodRankingStaffController extends Controller {

	/**
	 * Display a listing of milliongodrankingstaff
	 *
     * @param Request $request
     *
     * @return \Illuminate\View\View
	 */
	public function index(Request $request)
    {
        $milliongodrankingstaff = MillionGodRankingStaff::with("ranking")->with("godstaffs")->get();

		return view('admin.milliongodrankingstaff.index', compact('milliongodrankingstaff'));
	}

	/**
	 * Show the form for creating a new milliongodrankingstaff
	 *
     * @return \Illuminate\View\View
	 */
	public function create()
	{
	    $ranking = Ranking::pluck("number", "id")->prepend('Please select', null);
	    $godstaffs = GodStaffs::pluck("name", "id")->prepend('Please select', null);
	    
	    return view('admin.milliongodrankingstaff.create', compact("ranking","godstaffs"));
	}

	/**
	 * Store a newly created milliongodrankingstaff in storage.
	 *
     * @param CreateMillionGodRankingStaffRequest|Request $request
	 */
	public function store(CreateMillionGodRankingStaffRequest $request)
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

		MillionGodRankingStaff::create(['ranking_id'=>$request->ranking_id,
          'godstaffs_id'=>$request->godstaffs_id,
          'image'=>$input['imagename'],
          'banner'=>$input['imagename1']]);

		$now = new DateTime();
        $prevDateTime = $now->modify("last day of previous month");
        $month = $prevDateTime->format('m');
        $year  = $prevDateTime->format('Y');
		LogGroupRanking::create([
			'id_ranking'	=> $request->ranking_id,
			'id_staff'=> $request->godstaffs_id,
			'type' =>3,
			'month'=>$month,
			'year'=>$year,
		]);

		return redirect()->route(config('quickadmin.route').'.milliongodrankingstaff.index');
	}

	/**
	 * Show the form for editing the specified milliongodrankingstaff.
	 *
	 * @param  int  $id
     * @return \Illuminate\View\View
	 */
	public function edit($id)
	{
		$milliongodrankingstaff = MillionGodRankingStaff::find($id);
	    $ranking = Ranking::pluck("number", "id")->prepend('Please select', null);
	     $godstaffs = GodStaffs::pluck("name", "id")->prepend('Please select', null);
	    
		return view('admin.milliongodrankingstaff.edit', compact('milliongodrankingstaff', "ranking","godstaffs"));
	}

	/**
	 * Update the specified milliongodrankingstaff in storage.
     * @param UpdateMillionGodRankingStaffRequest|Request $request
     *
	 * @param  int  $id
	 */
	public function update($id, UpdateMillionGodRankingStaffRequest $request)
	{
		$milliongodrankingstaff = MillionGodRankingStaff::findOrFail($id);

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

	    $now = new DateTime();
        $prevDateTime = $now->modify("last day of previous month");
        $month 	= $prevDateTime->format('m');
        $year  	= $prevDateTime->format('Y');
        $log 	= LogGroupRanking::where('id_staff',$milliongodrankingstaff->godstaffs_id)
        			->where('type',3)
        			->where('month',$month)
        			->where('year',$year)
        			->first();

        $input1 = [];

        if ($request->ranking_id != null) {
        	$input1['ranking_id']= $request->ranking_id;
        	$input1['id_ranking'] = $request->ranking_id;
        }
        if ($request->godstaffs_id != null) {
        	$input1['godstaffs_id']= $request->godstaffs_id;
        	$input1['id_staff'] = $request->godstaffs_id;
        }
        if ($request->image != null) {
        	$input1['image']= $input['imagename'];
        }
        if ($request->banner != null) {
        	$input1['banner']= $input['imagename1'];
        }

		$milliongodrankingstaff->update($input1);
		$input1['month'] =$month;
		$input1['year']	=$year;
		$log->update($input1);
		return redirect()->route(config('quickadmin.route').'.milliongodrankingstaff.index');
	}

	/**
	 * Remove the specified milliongodrankingstaff from storage.
	 *
	 * @param  int  $id
	 */
	public function destroy($id)
	{
		MillionGodRankingStaff::destroy($id);

		return redirect()->route(config('quickadmin.route').'.milliongodrankingstaff.index');
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
            MillionGodRankingStaff::destroy($toDelete);
        } else {
            MillionGodRankingStaff::whereNotNull('id')->delete();
        }

        return redirect()->route(config('quickadmin.route').'.milliongodrankingstaff.index');
    }

}
