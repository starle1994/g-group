<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Redirect;
use Schema;
use App\GroupPhotos;
use App\Http\Requests\CreateGroupPhotosRequest;
use App\Http\Requests\UpdateGroupPhotosRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Traits\FileUploadTrait;
use App\Groups;


class GroupPhotosController extends Controller {

	/**
	 * Display a listing of groupphotos
	 *
     * @param Request $request
     *
     * @return \Illuminate\View\View
	 */
	public function index(Request $request)
    {
        $groupphotos = GroupPhotos::with("groups")->get();

		return view('admin.groupphotos.index', compact('groupphotos'));
	}

	/**
	 * Show the form for creating a new groupphotos
	 *
     * @return \Illuminate\View\View
	 */
	public function create()
	{
	    $groups = Groups::pluck("name", "id")->prepend('Please select', null);

	    
	    return view('admin.groupphotos.create', compact("groups"));
	}

	/**
	 * Store a newly created groupphotos in storage.
	 *
     * @param CreateGroupPhotosRequest|Request $request
	 */
	public function store(CreateGroupPhotosRequest $request)
	{
	    $request = $this->saveFiles($request);
		GroupPhotos::create($request->all());

		return redirect()->route(config('quickadmin.route').'.groupphotos.index');
	}

	/**
	 * Show the form for editing the specified groupphotos.
	 *
	 * @param  int  $id
     * @return \Illuminate\View\View
	 */
	public function edit($id)
	{
		$groupphotos = GroupPhotos::find($id);
	    $groups = Groups::pluck("name", "id")->prepend('Please select', null);

	    
		return view('admin.groupphotos.edit', compact('groupphotos', "groups"));
	}

	/**
	 * Update the specified groupphotos in storage.
     * @param UpdateGroupPhotosRequest|Request $request
     *
	 * @param  int  $id
	 */
	public function update($id, UpdateGroupPhotosRequest $request)
	{
		$groupphotos = GroupPhotos::findOrFail($id);

        $request = $this->saveFiles($request);

		$groupphotos->update($request->all());

		return redirect()->route(config('quickadmin.route').'.groupphotos.index');
	}

	/**
	 * Remove the specified groupphotos from storage.
	 *
	 * @param  int  $id
	 */
	public function destroy($id)
	{
		GroupPhotos::destroy($id);

		return redirect()->route(config('quickadmin.route').'.groupphotos.index');
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
            GroupPhotos::destroy($toDelete);
        } else {
            GroupPhotos::whereNotNull('id')->delete();
        }

        return redirect()->route(config('quickadmin.route').'.groupphotos.index');
    }

}
