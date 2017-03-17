<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Redirect;
use Schema;
use App\GigoloPageContents;
use App\Http\Requests\CreateGigoloPageContentsRequest;
use App\Http\Requests\UpdateGigoloPageContentsRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Traits\FileUploadTrait;


class GigoloPageContentsController extends Controller {

	/**
	 * Display a listing of gigolopagecontents
	 *
     * @param Request $request
     *
     * @return \Illuminate\View\View
	 */
	public function index(Request $request)
    {
        $gigolopagecontents = GigoloPageContents::all();

		return view('admin.gigolopagecontents.index', compact('gigolopagecontents'));
	}

	/**
	 * Show the form for creating a new gigolopagecontents
	 *
     * @return \Illuminate\View\View
	 */
	public function create()
	{
	    
	    
	    return view('admin.gigolopagecontents.create');
	}

	/**
	 * Store a newly created gigolopagecontents in storage.
	 *
     * @param CreateGigoloPageContentsRequest|Request $request
	 */
	public function store(CreateGigoloPageContentsRequest $request)
	{
	    $request = $this->saveFiles($request);
		GigoloPageContents::create($request->all());

		return redirect()->route(config('quickadmin.route').'.gigolopagecontents.index');
	}

	/**
	 * Show the form for editing the specified gigolopagecontents.
	 *
	 * @param  int  $id
     * @return \Illuminate\View\View
	 */
	public function edit($id)
	{
		$gigolopagecontents = GigoloPageContents::find($id);
	    
	    
		return view('admin.gigolopagecontents.edit', compact('gigolopagecontents'));
	}

	/**
	 * Update the specified gigolopagecontents in storage.
     * @param UpdateGigoloPageContentsRequest|Request $request
     *
	 * @param  int  $id
	 */
	public function update($id, UpdateGigoloPageContentsRequest $request)
	{
		$gigolopagecontents = GigoloPageContents::findOrFail($id);

        $request = $this->saveFiles($request);

		$gigolopagecontents->update($request->all());

		return redirect()->route(config('quickadmin.route').'.gigolopagecontents.index');
	}

	/**
	 * Remove the specified gigolopagecontents from storage.
	 *
	 * @param  int  $id
	 */
	public function destroy($id)
	{
		GigoloPageContents::destroy($id);

		return redirect()->route(config('quickadmin.route').'.gigolopagecontents.index');
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
            GigoloPageContents::destroy($toDelete);
        } else {
            GigoloPageContents::whereNotNull('id')->delete();
        }

        return redirect()->route(config('quickadmin.route').'.gigolopagecontents.index');
    }

}
