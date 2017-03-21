<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Redirect;
use Schema;
use App\ShopsList;
use App\Http\Requests\CreateShopsListRequest;
use App\Http\Requests\UpdateShopsListRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Traits\FileUploadTrait;


class ShopsListController extends Controller {

	/**
	 * Display a listing of shopslist
	 *
     * @param Request $request
     *
     * @return \Illuminate\View\View
	 */
	public function index(Request $request)
    {
        $shopslist = ShopsList::all();

		return view('admin.shopslist.index', compact('shopslist'));
	}

	/**
	 * Show the form for creating a new shopslist
	 *
     * @return \Illuminate\View\View
	 */
	public function create()
	{
	    
	    
	    return view('admin.shopslist.create');
	}

	/**
	 * Store a newly created shopslist in storage.
	 *
     * @param CreateShopsListRequest|Request $request
	 */
	public function store(CreateShopsListRequest $request)
	{
	    $request = $this->saveFiles($request);
		ShopsList::create($request->all());

		return redirect()->route(config('quickadmin.route').'.shopslist.index');
	}

	/**
	 * Show the form for editing the specified shopslist.
	 *
	 * @param  int  $id
     * @return \Illuminate\View\View
	 */
	public function edit($id)
	{
		$shopslist = ShopsList::find($id);
	    
	    
		return view('admin.shopslist.edit', compact('shopslist'));
	}

	/**
	 * Update the specified shopslist in storage.
     * @param UpdateShopsListRequest|Request $request
     *
	 * @param  int  $id
	 */
	public function update($id, Request $request)
	{
		$shopslist = ShopsList::findOrFail($id);

        $request = $this->saveFiles($request);
      
		$shopslist->update($request->all());

		return redirect()->route(config('quickadmin.route').'.shopslist.index');
	}

	/**
	 * Remove the specified shopslist from storage.
	 *
	 * @param  int  $id
	 */
	public function destroy($id)
	{
		ShopsList::destroy($id);

		return redirect()->route(config('quickadmin.route').'.shopslist.index');
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
            ShopsList::destroy($toDelete);
        } else {
            ShopsList::whereNotNull('id')->delete();
        }

        return redirect()->route(config('quickadmin.route').'.shopslist.index');
    }

}
