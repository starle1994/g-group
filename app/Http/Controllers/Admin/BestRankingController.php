<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Redirect;
use Schema;
use App\BestRanking;
use App\Http\Requests\CreateBestRankingRequest;
use App\Http\Requests\UpdateBestRankingRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Traits\FileUploadTrait;
use App\GodStaffs;
use App\Ranking;
use App\LogGroupRanking;
use DateTime;

class BestRankingController extends Controller {

	/**
	 * Display a listing of bestranking
	 *
     * @param Request $request
     *
     * @return \Illuminate\View\View
	 */
	public function index(Request $request)
    {
        $bestranking = BestRanking::with("godstaffs")->with("ranking")->get();

		return view('admin.bestranking.index', compact('bestranking'));
	}

	/**
	 * Show the form for creating a new bestranking
	 *
     * @return \Illuminate\View\View
	 */
	public function create()
	{
	    $godstaff = GodStaffs::where('shopslist_id',3)->get();
	    $godstaffs['']= 'Please select';
	    foreach ($godstaff as $value) {
	    	$godstaffs[$value->id]=$value->name;
	    }
		$rankings = Ranking::all();
	    $ranking['']= 'Please select';
	    foreach ($rankings as $value_ran) {
	    	$ranking[$value_ran->id]=$value_ran->number;
	    }
	    
	    return view('admin.bestranking.create', compact("godstaffs", "ranking"));
	}

	/**
	 * Store a newly created bestranking in storage.
	 *
     * @param CreateBestRankingRequest|Request $request
	 */
	public function store(CreateBestRankingRequest $request)
	{
	    $request = $this->saveFiles($request);
		BestRanking::create($request->all());
		$now = new DateTime();
        $prevDateTime = $now->modify("last day of previous month");
        $month = $prevDateTime->format('m');
        $year  = $prevDateTime->format('Y');
		LogGroupRanking::create([
			'id_ranking'	=> $request->ranking_id,
			'id_staff'=> $request->godstaffs_id,
			'type' =>5,
			'month'=>$month,
			'year'=>$year,
		]);
		return redirect()->route(config('quickadmin.route').'.bestranking.index');
	}

	/**
	 * Show the form for editing the specified bestranking.
	 *
	 * @param  int  $id
     * @return \Illuminate\View\View
	 */
	public function edit($id)
	{
		$bestranking = BestRanking::find($id);
	    $godstaff = GodStaffs::where('shopslist_id',3)->get();
	    $godstaffs['']= 'Please select';
	    foreach ($godstaff as $value) {
	    	$godstaffs[$value->id]=$value->name;
	    }
		$rankings = Ranking::all();
	    $ranking['']= 'Please select';
	    foreach ($rankings as $value_ran) {
	    	$ranking[$value_ran->id]=$value_ran->number;

	    }
		return view('admin.bestranking.edit', compact('bestranking', "godstaffs", "ranking"));
	}

	/**
	 * Update the specified bestranking in storage.
     * @param UpdateBestRankingRequest|Request $request
     *
	 * @param  int  $id
	 */
	public function update($id, UpdateBestRankingRequest $request)
	{
		$bestranking = BestRanking::findOrFail($id);

        $request = $this->saveFiles($request);

		$bestranking->update($request->all());

		$now = new DateTime();
        $prevDateTime = $now->modify("last day of previous month");
        $month 	= $prevDateTime->format('m');
        $year  	= $prevDateTime->format('Y');
        $log 	= LogGroupRanking::where('id_staff',$bestranking->godstaffs_id)
        			->where('type',5)
        			->where('month',$month)
        			->where('year',$year)
        			->first();

        $input1['id_ranking'] = $request->ranking_id;
		$input1['id_staff'] = $request->godstaffs_id;
        $input1['month'] 	=$month;
		$input1['year']	=$year;
		$input1['type'] =5;

		if ($log == null) {
			LogGroupRanking::create($input1);
		}else{
			$log->update($input1);
		}
		return redirect()->route(config('quickadmin.route').'.bestranking.index');
	}

	/**
	 * Remove the specified bestranking from storage.
	 *
	 * @param  int  $id
	 */
	public function destroy($id)
	{
		BestRanking::destroy($id);

		return redirect()->route(config('quickadmin.route').'.bestranking.index');
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
            BestRanking::destroy($toDelete);
        } else {
            BestRanking::whereNotNull('id')->delete();
        }

        return redirect()->route(config('quickadmin.route').'.bestranking.index');
    }

}
