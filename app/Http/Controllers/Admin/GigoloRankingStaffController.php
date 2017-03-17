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
        $gigolorankingstaff = GigoloRankingStaff::with("ranking")->get();

		return view('admin.gigolorankingstaff.index', compact('gigolorankingstaff'));
	}

	/**
	 * Show the form for creating a new gigolorankingstaff
	 *
     * @return \Illuminate\View\View
	 */
	public function create()
	{
	    $ranking = Ranking::pluck("description", "id")->prepend('Please select', null);

	    
	    return view('admin.gigolorankingstaff.create', compact("ranking"));
	}

	/**
	 * Store a newly created gigolorankingstaff in storage.
	 *
     * @param CreateGigoloRankingStaffRequest|Request $request
	 */
	public function store(CreateGigoloRankingStaffRequest $request)
	{
	    $request = $this->saveFiles($request);
		GigoloRankingStaff::create($request->all());

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
		$gigolorankingstaff = GigoloRankingStaff::find($id);
	    $ranking = Ranking::pluck("description", "id")->prepend('Please select', null);

	    
		return view('admin.gigolorankingstaff.edit', compact('gigolorankingstaff', "ranking"));
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

        $request = $this->saveFiles($request);

		$gigolorankingstaff->update($request->all());

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
