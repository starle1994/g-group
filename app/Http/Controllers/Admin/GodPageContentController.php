<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Redirect;
use Schema;
use App\GodPageContent;
use App\Http\Requests\CreateGodPageContentRequest;
use App\Http\Requests\UpdateGodPageContentRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Traits\FileUploadTrait;


class GodPageContentController extends Controller {

	/**
	 * Display a listing of godpagecontent
	 *
     * @param Request $request
     *
     * @return \Illuminate\View\View
	 */
	public function index(Request $request)
    {
        $godpagecontent = GodPageContent::all();

		return view('admin.godpagecontent.index', compact('godpagecontent'));
	}

	/**
	 * Show the form for creating a new godpagecontent
	 *
     * @return \Illuminate\View\View
	 */
	public function create()
	{
	    
	    
	    return view('admin.godpagecontent.create');
	}

	/**
	 * Store a newly created godpagecontent in storage.
	 *
     * @param CreateGodPageContentRequest|Request $request
	 */
	public function store(CreateGodPageContentRequest $request)
	{
	    $request = $this->saveFiles($request);
		GodPageContent::create($request->all());

		return redirect()->route(config('quickadmin.route').'.godpagecontent.index');
	}

	/**
	 * Show the form for editing the specified godpagecontent.
	 *
	 * @param  int  $id
     * @return \Illuminate\View\View
	 */
	public function edit($id)
	{
		$godpagecontent = GodPageContent::find($id);
	    
	    
		return view('admin.godpagecontent.edit', compact('godpagecontent'));
	}

	/**
	 * Update the specified godpagecontent in storage.
     * @param UpdateGodPageContentRequest|Request $request
     *
	 * @param  int  $id
	 */
	public function update($id, UpdateGodPageContentRequest $request)
	{
		$godpagecontent = GodPageContent::findOrFail($id);

        $request = $this->saveFiles($request);

		$godpagecontent->update($request->all());

		return redirect()->route(config('quickadmin.route').'.godpagecontent.index');
	}

	/**
	 * Remove the specified godpagecontent from storage.
	 *
	 * @param  int  $id
	 */
	public function destroy($id)
	{
		GodPageContent::destroy($id);

		return redirect()->route(config('quickadmin.route').'.godpagecontent.index');
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
            GodPageContent::destroy($toDelete);
        } else {
            GodPageContent::whereNotNull('id')->delete();
        }

        return redirect()->route(config('quickadmin.route').'.godpagecontent.index');
    }

}
