<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Redirect;
use Schema;
use App\StaffPhotos;
use App\Http\Requests\CreateStaffPhotosRequest;
use App\Http\Requests\UpdateStaffPhotosRequest;
use Illuminate\Http\Request;

use App\Staffs;


class StaffPhotosController extends Controller {

	/**
	 * Display a listing of staffphotos
	 *
     * @param Request $request
     *
     * @return \Illuminate\View\View
	 */
	public function index(Request $request)
    {
        $staffphotos = StaffPhotos::with("staffs")->get();

		return view('admin.staffphotos.index', compact('staffphotos'));
	}

	/**
	 * Show the form for creating a new staffphotos
	 *
     * @return \Illuminate\View\View
	 */
	public function create()
	{
	    $staffs = Staffs::pluck("name", "id")->prepend('Please select', null);

	    
	    return view('admin.staffphotos.create', compact("staffs"));
	}

	/**
	 * Store a newly created staffphotos in storage.
	 *
     * @param CreateStaffPhotosRequest|Request $request
	 */
	public function store(CreateStaffPhotosRequest $request)
	{
	    
		StaffPhotos::create($request->all());

		return redirect()->route(config('quickadmin.route').'.staffphotos.index');
	}

	/**
	 * Show the form for editing the specified staffphotos.
	 *
	 * @param  int  $id
     * @return \Illuminate\View\View
	 */
	public function edit($id)
	{
		$staffphotos = StaffPhotos::find($id);
	    $staffs = Staffs::pluck("name", "id")->prepend('Please select', null);

	    
		return view('admin.staffphotos.edit', compact('staffphotos', "staffs"));
	}

	/**
	 * Update the specified staffphotos in storage.
     * @param UpdateStaffPhotosRequest|Request $request
     *
	 * @param  int  $id
	 */
	public function update($id, UpdateStaffPhotosRequest $request)
	{
		$staffphotos = StaffPhotos::findOrFail($id);

        

		$staffphotos->update($request->all());

		return redirect()->route(config('quickadmin.route').'.staffphotos.index');
	}

	/**
	 * Remove the specified staffphotos from storage.
	 *
	 * @param  int  $id
	 */
	public function destroy($id)
	{
		StaffPhotos::destroy($id);

		return redirect()->route(config('quickadmin.route').'.staffphotos.index');
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
            StaffPhotos::destroy($toDelete);
        } else {
            StaffPhotos::whereNotNull('id')->delete();
        }

        return redirect()->route(config('quickadmin.route').'.staffphotos.index');
    }

}
