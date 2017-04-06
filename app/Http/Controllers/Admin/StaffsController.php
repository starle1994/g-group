<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Redirect;
use Schema;
use App\Staffs;
use App\Http\Requests\CreateStaffsRequest;
use App\Http\Requests\UpdateStaffsRequest;
use Illuminate\Http\Request;

use App\ShopsList;


class StaffsController extends Controller {

	/**
	 * Display a listing of staffs
	 *
     * @param Request $request
     *
     * @return \Illuminate\View\View
	 */
	public function index(Request $request)
    {
        $staffs = Staffs::with("shopslist")->orderBy('id','desc')->get();

		return view('admin.staffs.index', compact('staffs'));
	}

	/**
	 * Show the form for creating a new staffs
	 *
     * @return \Illuminate\View\View
	 */
	public function create()
	{
	    $shopslist = ShopsList::pluck("name", "id")->prepend('Please select', null);

	    
	    return view('admin.staffs.create', compact("shopslist"));
	}

	/**
	 * Store a newly created staffs in storage.
	 *
     * @param CreateStaffsRequest|Request $request
	 */
	public function store(CreateStaffsRequest $request)
	{
	    
		Staffs::create($request->all());

		return redirect()->route(config('quickadmin.route').'.staffs.index');
	}

	/**
	 * Show the form for editing the specified staffs.
	 *
	 * @param  int  $id
     * @return \Illuminate\View\View
	 */
	public function edit($id)
	{
		$staffs = Staffs::find($id);
	    $shopslist = ShopsList::pluck("name", "id")->prepend('Please select', null);

	    
		return view('admin.staffs.edit', compact('staffs', "shopslist"));
	}

	/**
	 * Update the specified staffs in storage.
     * @param UpdateStaffsRequest|Request $request
     *
	 * @param  int  $id
	 */
	public function update($id, UpdateStaffsRequest $request)
	{
		$staffs = Staffs::findOrFail($id);

        

		$staffs->update($request->all());

		return redirect()->route(config('quickadmin.route').'.staffs.index');
	}

	/**
	 * Remove the specified staffs from storage.
	 *
	 * @param  int  $id
	 */
	public function destroy($id)
	{
		Staffs::destroy($id);

		return redirect()->route(config('quickadmin.route').'.staffs.index');
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
            Staffs::destroy($toDelete);
        } else {
            Staffs::whereNotNull('id')->delete();
        }

        return redirect()->route(config('quickadmin.route').'.staffs.index');
    }

}
