<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Redirect;
use Schema;
use App\Link;
use App\Http\Requests\CreateLinkRequest;
use App\Http\Requests\UpdateLinkRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Traits\FileUploadTrait;


class LinkController extends Controller {

	/**
	 * Display a listing of link
	 *
     * @param Request $request
     *
     * @return \Illuminate\View\View
	 */
	public function index(Request $request)
    {
        $link = Link::all();

		return view('admin.link.index', compact('link'));
	}

	/**
	 * Show the form for creating a new link
	 *
     * @return \Illuminate\View\View
	 */
	public function create()
	{
	    
	    
	    return view('admin.link.create');
	}

	/**
	 * Store a newly created link in storage.
	 *
     * @param CreateLinkRequest|Request $request
	 */
	public function store(CreateLinkRequest $request)
	{
	    $request = $this->saveFiles($request);
		Link::create($request->all());

		return redirect()->route(config('quickadmin.route').'.link.index');
	}

	/**
	 * Show the form for editing the specified link.
	 *
	 * @param  int  $id
     * @return \Illuminate\View\View
	 */
	public function edit($id)
	{
		$link = Link::find($id);
	    
	    
		return view('admin.link.edit', compact('link'));
	}

	/**
	 * Update the specified link in storage.
     * @param UpdateLinkRequest|Request $request
     *
	 * @param  int  $id
	 */
	public function update($id, UpdateLinkRequest $request)
	{
		$link = Link::findOrFail($id);

        $request = $this->saveFiles($request);

		$link->update($request->all());

		return redirect()->route(config('quickadmin.route').'.link.index');
	}

	/**
	 * Remove the specified link from storage.
	 *
	 * @param  int  $id
	 */
	public function destroy($id)
	{
		Link::destroy($id);

		return redirect()->route(config('quickadmin.route').'.link.index');
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
            Link::destroy($toDelete);
        } else {
            Link::whereNotNull('id')->delete();
        }

        return redirect()->route(config('quickadmin.route').'.link.index');
    }

}
