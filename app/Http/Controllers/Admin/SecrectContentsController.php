<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Redirect;
use Schema;
use App\SecrectContents;
use App\Http\Requests\CreateSecrectContentsRequest;
use App\Http\Requests\UpdateSecrectContentsRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Traits\FileUploadTrait;


class SecrectContentsController extends Controller {

	/**
	 * Display a listing of secrectcontents
	 *
     * @param Request $request
     *
     * @return \Illuminate\View\View
	 */
	public function index(Request $request)
    {
        $secrectcontents = SecrectContents::all();

		return view('admin.secrectcontents.index', compact('secrectcontents'));
	}

	/**
	 * Show the form for creating a new secrectcontents
	 *
     * @return \Illuminate\View\View
	 */
	public function create()
	{
	    
	    
	    return view('admin.secrectcontents.create');
	}

	/**
	 * Store a newly created secrectcontents in storage.
	 *
     * @param CreateSecrectContentsRequest|Request $request
	 */
	public function store(CreateSecrectContentsRequest $request)
	{
	    $request = $this->saveFiles($request);
		SecrectContents::create($request->all());

		return redirect()->route(config('quickadmin.route').'.secrectcontents.index');
	}

	/**
	 * Show the form for editing the specified secrectcontents.
	 *
	 * @param  int  $id
     * @return \Illuminate\View\View
	 */
	public function edit($id)
	{
		$secrectcontents = SecrectContents::find($id);
	    
	    
		return view('admin.secrectcontents.edit', compact('secrectcontents'));
	}

	/**
	 * Update the specified secrectcontents in storage.
     * @param UpdateSecrectContentsRequest|Request $request
     *
	 * @param  int  $id
	 */
	public function update($id, UpdateSecrectContentsRequest $request)
	{
		$secrectcontents = SecrectContents::findOrFail($id);

        $request = $this->saveFiles($request);

		$secrectcontents->update($request->all());

		return redirect()->route(config('quickadmin.route').'.secrectcontents.index');
	}

	/**
	 * Remove the specified secrectcontents from storage.
	 *
	 * @param  int  $id
	 */
	public function destroy($id)
	{
		SecrectContents::destroy($id);

		return redirect()->route(config('quickadmin.route').'.secrectcontents.index');
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
            SecrectContents::destroy($toDelete);
        } else {
            SecrectContents::whereNotNull('id')->delete();
        }

        return redirect()->route(config('quickadmin.route').'.secrectcontents.index');
    }

}
