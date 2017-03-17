<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Redirect;
use Schema;
use App\PhotoList;
use App\Http\Requests\CreatePhotoListRequest;
use App\Http\Requests\UpdatePhotoListRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Traits\FileUploadTrait;


class PhotoListController extends Controller {

	/**
	 * Display a listing of photolist
	 *
     * @param Request $request
     *
     * @return \Illuminate\View\View
	 */
	public function index(Request $request)
    {
        $photolist = PhotoList::all();

		return view('admin.photolist.index', compact('photolist'));
	}

	/**
	 * Show the form for creating a new photolist
	 *
     * @return \Illuminate\View\View
	 */
	public function create()
	{
	    
	    
	    return view('admin.photolist.create');
	}

	/**
	 * Store a newly created photolist in storage.
	 *
     * @param CreatePhotoListRequest|Request $request
	 */
	public function store(CreatePhotoListRequest $request)
	{
	    $request = $this->saveFiles($request);
		PhotoList::create($request->all());

		return redirect()->route(config('quickadmin.route').'.photolist.index');
	}

	/**
	 * Show the form for editing the specified photolist.
	 *
	 * @param  int  $id
     * @return \Illuminate\View\View
	 */
	public function edit($id)
	{
		$photolist = PhotoList::find($id);
	    
	    
		return view('admin.photolist.edit', compact('photolist'));
	}

	/**
	 * Update the specified photolist in storage.
     * @param UpdatePhotoListRequest|Request $request
     *
	 * @param  int  $id
	 */
	public function update($id, UpdatePhotoListRequest $request)
	{
		$photolist = PhotoList::findOrFail($id);

        $request = $this->saveFiles($request);

		$photolist->update($request->all());

		return redirect()->route(config('quickadmin.route').'.photolist.index');
	}

	/**
	 * Remove the specified photolist from storage.
	 *
	 * @param  int  $id
	 */
	public function destroy($id)
	{
		PhotoList::destroy($id);

		return redirect()->route(config('quickadmin.route').'.photolist.index');
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
            PhotoList::destroy($toDelete);
        } else {
            PhotoList::whereNotNull('id')->delete();
        }

        return redirect()->route(config('quickadmin.route').'.photolist.index');
    }

}
