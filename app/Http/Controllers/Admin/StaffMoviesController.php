<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Redirect;
use Schema;
use App\StaffMovies;
use App\Http\Requests\CreateStaffMoviesRequest;
use App\Http\Requests\UpdateStaffMoviesRequest;
use Illuminate\Http\Request;

use App\GodStaffs;


class StaffMoviesController extends Controller {

	/**
	 * Display a listing of staffmovies
	 *
     * @param Request $request
     *
     * @return \Illuminate\View\View
	 */
	public function index(Request $request)
    {
        $staffmovies = StaffMovies::with("staffs")->get();

		return view('admin.staffmovies.index', compact('staffmovies'));
	}

	/**
	 * Show the form for creating a new staffmovies
	 *
     * @return \Illuminate\View\View
	 */
	public function create()
	{
	    $staffs = GodStaffs::pluck("name", "id")->prepend('Please select', null);

	    
	    return view('admin.staffmovies.create', compact("staffs"));
	}

	/**
	 * Store a newly created staffmovies in storage.
	 *
     * @param CreateStaffMoviesRequest|Request $request
	 */
	public function store(CreateStaffMoviesRequest $request)
	{
	    
		StaffMovies::create($request->all());

		return redirect()->route(config('quickadmin.route').'.staffmovies.index');
	}

	/**
	 * Show the form for editing the specified staffmovies.
	 *
	 * @param  int  $id
     * @return \Illuminate\View\View
	 */
	public function edit($id)
	{
		$staffmovies = StaffMovies::find($id);
	    $staffs = GodStaffs::pluck("name", "id")->prepend('Please select', null);

	    
		return view('admin.staffmovies.edit', compact('staffmovies', "staffs"));
	}

	/**
	 * Update the specified staffmovies in storage.
     * @param UpdateStaffMoviesRequest|Request $request
     *
	 * @param  int  $id
	 */
	public function update($id, UpdateStaffMoviesRequest $request)
	{
		$staffmovies = StaffMovies::findOrFail($id);

        

		$staffmovies->update($request->all());

		return redirect()->route(config('quickadmin.route').'.staffmovies.index');
	}

	/**
	 * Remove the specified staffmovies from storage.
	 *
	 * @param  int  $id
	 */
	public function destroy($id)
	{
		StaffMovies::destroy($id);

		return redirect()->route(config('quickadmin.route').'.staffmovies.index');
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
            StaffMovies::destroy($toDelete);
        } else {
            StaffMovies::whereNotNull('id')->delete();
        }

        return redirect()->route(config('quickadmin.route').'.staffmovies.index');
    }

}
