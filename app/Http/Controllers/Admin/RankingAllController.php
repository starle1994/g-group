<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Redirect;
use Schema;
use App\RankingAll;
use App\Http\Requests\CreateRankingAllRequest;
use App\Http\Requests\UpdateRankingAllRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Traits\FileUploadTrait;
use App\GroupRankingType;
use App\GodStaffs;
use App\Ranking;
use App\LogGroupRanking;
use DateTime;

class RankingAllController extends Controller {

	/**
	 * Display a listing of rankingall
	 *
     * @param Request $request
     *
     * @return \Illuminate\View\View
	 */
	public function index($id = 1)
    {
        $rankingall = RankingAll::with("grouprankingtype")->with("godstaffs")->with("ranking")->where('grouprankingtype_id',1)->get();
		return view('admin.rankingall.index', compact('rankingall','id'));
	}

	public function type2($id)
	{
		$rankingall = RankingAll::with("grouprankingtype")->with("godstaffs")->with("ranking")->where('grouprankingtype_id',2)->get();

		return view('admin.rankingall.index', compact('rankingall','id'));
	}
	/**
	 * Show the form for creating a new rankingall
	 *
     * @return \Illuminate\View\View
	 */
	public function create()
	{
	    $grouprankingtypes = GroupRankingType::all();
	    $grouprankingtype['']= 'Please select';
	    foreach ($grouprankingtypes as $value_ty) {
	    	$grouprankingtype[$value_ty->id]=$value_ty->name;
	    }
		$rankings = Ranking::all();
	    $ranking['']= 'Please select';
	    foreach ($rankings as $value_ran) {
	    	$ranking[$value_ran->id]=$value_ran->number;
	    }
	    $godstaff = GodStaffs::where('shopslist_id',3)->get();
	    $godstaffs['']= 'Please select';
	    foreach ($godstaff as $value) {
	    	$godstaffs[$value->id]=$value->name;
	    }
	    
	    return view('admin.rankingall.create', compact("grouprankingtype", "godstaffs", "ranking"));
	}

	/**
	 * Store a newly created rankingall in storage.
	 *
     * @param CreateRankingAllRequest|Request $request
	 */
	public function store(CreateRankingAllRequest $request)
	{
	    $request = $this->saveFiles($request);
		RankingAll::create($request->all());
		$now = new DateTime();
        $prevDateTime = $now->modify("last day of previous month");
        $month = $prevDateTime->format('m');
        $year  = $prevDateTime->format('Y');
		LogGroupRanking::create([
			'id_ranking'	=> $request->ranking_id,
			'id_staff'=> $request->godstaffs_id,
			'type' =>$request->grouprankingtype_id,
			'month'=>$month,
			'year'=>$year,
		]);
		if ($request->grouprankingtype_id == 1) {
			return redirect()->route(config('quickadmin.route').'.rankingall.index');
		} else {
			return redirect()->route(config('quickadmin.route').'.rankingall.type2',$request->grouprankingtype_id);
		}
		
	}

	/**
	 * Show the form for editing the specified rankingall.
	 *
	 * @param  int  $id
     * @return \Illuminate\View\View
	 */
	public function edit($id)
	{
		$rankingall = RankingAll::find($id);
	    $grouprankingtypes = GroupRankingType::all();
	    $grouprankingtype['']= 'Please select';
	    foreach ($grouprankingtypes as $value_ty) {
	    	$grouprankingtype[$value_ty->id]=$value_ty->name;
	    }
		$rankings = Ranking::all();
	    $ranking['']= 'Please select';
	    foreach ($rankings as $value_ran) {
	    	$ranking[$value_ran->id]=$value_ran->number;
	    }
	    $godstaff = GodStaffs::where('shopslist_id',3)->get();
	    $godstaffs['']= 'Please select';
	    foreach ($godstaff as $value) {
	    	$godstaffs[$value->id]=$value->name;
	    }

		return view('admin.rankingall.edit', compact('rankingall', "grouprankingtype", "godstaffs", "ranking"));
	}

	/**
	 * Update the specified rankingall in storage.
     * @param UpdateRankingAllRequest|Request $request
     *
	 * @param  int  $id
	 */
	public function update($id, UpdateRankingAllRequest $request)
	{
		$rankingall = RankingAll::findOrFail($id);

		$now = new DateTime();
        $prevDateTime = $now->modify("last day of previous month");
        $month = $prevDateTime->format('m');
        $year  = $prevDateTime->format('Y');
        $log = LogGroupRanking::where('id_staff',$rankingall->godstaffs_id)->where('type',$rankingall->grouprankingtype_id)->where('month',$month)->where('year',$year)->first();

		
        $request = $this->saveFiles($request);
        $input = [];
	    if ($request->grouprankingtype_id != null) {
	    	$input['grouprankingtype_id'] = $request->grouprankingtype_id;
	    	$input['type'] = $request->grouprankingtype_id;
	    }
	    if ($request->godstaffs_id != null) {
	    	$input['godstaffs_id'] = $request->godstaffs_id;
	    	$input['id_staff'] = $request->godstaffs_id;
	    }
	    if ($request->image != null) {
	    	$input['image'] = $request->image;
	    }
	    if ($request->ranking_id != null) {
	    	$input['ranking_id'] = $request->ranking_id;
	    	$input['id_ranking'] = $request->ranking_id;
	    }

		$rankingall->update($input);
		$input['month'] =$month;
		$input['year']	=$year;
		$input['type'] 	=$request->grouprankingtype_id;

		if ($log == null) {
			LogGroupRanking::create($input);
		}else{
			$log->update($input);
		}

		if ($request->grouprankingtype_id == 1) {
			return redirect()->route(config('quickadmin.route').'.rankingall.index');
		} else {
			return redirect()->route(config('quickadmin.route').'.rankingall.type2',$request->grouprankingtype_id);
		}
	}

	/**
	 * Remove the specified rankingall from storage.
	 *
	 * @param  int  $id
	 */
	public function destroy($id)
	{
		RankingAll::destroy($id);

		return redirect()->route(config('quickadmin.route').'.rankingall.index');
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
            RankingAll::destroy($toDelete);
        } else {
            RankingAll::whereNotNull('id')->delete();
        }

        return redirect()->route(config('quickadmin.route').'.rankingall.index');
    }

}
