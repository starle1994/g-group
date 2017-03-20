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
	    $godstaffs = GodStaffs::pluck("name", "id")->prepend('Please select', null);
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
	    $godstaffs = GodStaffs::pluck("name", "id")->prepend('Please select', null);
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
