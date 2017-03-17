<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Redirect;
use Schema;
use App\GroupTopPageConten;
use App\Http\Requests\CreateGroupTopPageContenRequest;
use App\Http\Requests\UpdateGroupTopPageContenRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Traits\FileUploadTrait;


class GroupTopPageContenController extends Controller {

	/**
	 * Display a listing of grouptoppageconten
	 *
     * @param Request $request
     *
     * @return \Illuminate\View\View
	 */
	public function index(Request $request)
    {
        $grouptoppageconten = GroupTopPageConten::all();

		return view('admin.grouptoppageconten.index', compact('grouptoppageconten'));
	}

	/**
	 * Show the form for creating a new grouptoppageconten
	 *
     * @return \Illuminate\View\View
	 */
	public function create()
	{
	    
	    
	    return view('admin.grouptoppageconten.create');
	}

	/**
	 * Store a newly created grouptoppageconten in storage.
	 *
     * @param CreateGroupTopPageContenRequest|Request $request
	 */
	public function store(CreateGroupTopPageContenRequest $request)
	{
	    $request = $this->saveFiles($request);
		GroupTopPageConten::create($request->all());

		return redirect()->route(config('quickadmin.route').'.grouptoppageconten.index');
	}

	/**
	 * Show the form for editing the specified grouptoppageconten.
	 *
	 * @param  int  $id
     * @return \Illuminate\View\View
	 */
	public function edit($id)
	{
		$grouptoppageconten = GroupTopPageConten::find($id);
	    
	    
		return view('admin.grouptoppageconten.edit', compact('grouptoppageconten'));
	}

	/**
	 * Update the specified grouptoppageconten in storage.
     * @param UpdateGroupTopPageContenRequest|Request $request
     *
	 * @param  int  $id
	 */
	public function update($id, UpdateGroupTopPageContenRequest $request)
	{
		$grouptoppageconten = GroupTopPageConten::findOrFail($id);

        $request = $this->saveFiles($request);

		$grouptoppageconten->update($request->all());

		return redirect()->route(config('quickadmin.route').'.grouptoppageconten.index');
	}

	/**
	 * Remove the specified grouptoppageconten from storage.
	 *
	 * @param  int  $id
	 */
	public function destroy($id)
	{
		GroupTopPageConten::destroy($id);

		return redirect()->route(config('quickadmin.route').'.grouptoppageconten.index');
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
            GroupTopPageConten::destroy($toDelete);
        } else {
            GroupTopPageConten::whereNotNull('id')->delete();
        }

        return redirect()->route(config('quickadmin.route').'.grouptoppageconten.index');
    }

}
