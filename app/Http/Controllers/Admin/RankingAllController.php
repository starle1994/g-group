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


class RankingAllController extends Controller {

	/**
	 * Display a listing of rankingall
	 *
     * @param Request $request
     *
     * @return \Illuminate\View\View
	 */
	public function index(Request $request)
    {
        $rankingall = RankingAll::with("grouprankingtype")->with("godstaffs")->with("ranking")->get();

		return view('admin.rankingall.index', compact('rankingall'));
	}

	/**
	 * Show the form for creating a new rankingall
	 *
     * @return \Illuminate\View\View
	 */
	public function create()
	{
	    $grouprankingtype = GroupRankingType::pluck("name", "id")->prepend('Please select', null);
$godstaffs = GodStaffs::pluck("name", "id")->prepend('Please select', null);
$ranking = Ranking::pluck("number", "id")->prepend('Please select', null);

	    
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

		return redirect()->route(config('quickadmin.route').'.rankingall.index');
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
	    $grouprankingtype = GroupRankingType::pluck("name", "id")->prepend('Please select', null);
$godstaffs = GodStaffs::pluck("name", "id")->prepend('Please select', null);
$ranking = Ranking::pluck("number", "id")->prepend('Please select', null);

	    
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

        $request = $this->saveFiles($request);

		$rankingall->update($request->all());

		return redirect()->route(config('quickadmin.route').'.rankingall.index');
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
