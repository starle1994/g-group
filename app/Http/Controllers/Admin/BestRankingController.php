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
	    $godstaffs[0]= 'Please select';
	    foreach ($godstaff as $value) {
	    	$godstaffs[$value->id]=$value->name;
	    }
		$ranking = Ranking::pluck("number", "id")->prepend('Please select', null);

	    
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
	    $godstaffs[0]= 'Please select';
	    foreach ($godstaff as $value) {
	    	$godstaffs[$value->id]=$value->name;
	    }
		$ranking = Ranking::pluck("number", "id")->prepend('Please select', null);

	    
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
