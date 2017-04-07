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
use App\LogGroupRanking;
use DateTime;


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
	    $rankings = Ranking::all();
	    $ranking['']= 'Please select';
	    foreach ($rankings as $value_ran) {
	    	$ranking[$value_ran->id]=$value_ran->number;
	    }
	    $godstaff = GodStaffs::where('shopslist_id',2)->get();
	    $godstaffs['']= 'Please select';
	    foreach ($godstaff as $value) {
	    	$godstaffs[$value->id]=$value->name;
	    }
	    
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

		$now = new DateTime();
        $prevDateTime = $now->modify("last day of previous month");
        $month = $prevDateTime->format('m');
        $year  = $prevDateTime->format('Y');
		LogGroupRanking::create([
			'id_ranking'	=> $request->ranking_id,
			'id_staff'=> $request->godstaffs_id,
			'type' =>4,
			'month'	=>$month,
			'year'	=>$year,
		]);
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
	    $rankings = Ranking::all();
	    $ranking['']= 'Please select';
	    foreach ($rankings as $value_ran) {
	    	$ranking[$value_ran->id]=$value_ran->number;
	    }
	    $godstaff = GodStaffs::where('shopslist_id',2)->get();
	    $godstaffs['']= 'Please select';
	    foreach ($godstaff as $value) {
	    	$godstaffs[$value->id]=$value->name;
	    }
	    
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

       $now = new DateTime();
        $prevDateTime = $now->modify("last day of previous month");
        $month 	= $prevDateTime->format('m');
        $year  	= $prevDateTime->format('Y');
        $log 	= LogGroupRanking::where('id_staff',$gigolorankingstaff->godstaffs_id)
        			->where('type',4)
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

		$gigolorankingstaff->update($input1);
		$input1['month'] =$month;
		$input1['year']	=$year;
		$input1['type'] =4;

		if ($log == null) {
			LogGroupRanking::create($input1);
		}else{
			$log->update($input1);
		}
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
