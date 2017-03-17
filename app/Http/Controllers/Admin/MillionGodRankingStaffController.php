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
        $milliongodrankingstaff = MillionGodRankingStaff::with("ranking")->get();

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

	    
	    return view('admin.milliongodrankingstaff.create', compact("ranking"));
	}

	/**
	 * Store a newly created milliongodrankingstaff in storage.
	 *
     * @param CreateMillionGodRankingStaffRequest|Request $request
	 */
	public function store(CreateMillionGodRankingStaffRequest $request)
	{
	    $request = $this->saveFiles($request);
		MillionGodRankingStaff::create($request->all());

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

	    
		return view('admin.milliongodrankingstaff.edit', compact('milliongodrankingstaff', "ranking"));
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

        $request = $this->saveFiles($request);

		$milliongodrankingstaff->update($request->all());

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
