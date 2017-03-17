<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Redirect;
use Schema;
use App\RookieFeature;
use App\Http\Requests\CreateRookieFeatureRequest;
use App\Http\Requests\UpdateRookieFeatureRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Traits\FileUploadTrait;


class RookieFeatureController extends Controller {

	/**
	 * Display a listing of rookiefeature
	 *
     * @param Request $request
     *
     * @return \Illuminate\View\View
	 */
	public function index(Request $request)
    {
        $rookiefeature = RookieFeature::all();

		return view('admin.rookiefeature.index', compact('rookiefeature'));
	}

	/**
	 * Show the form for creating a new rookiefeature
	 *
     * @return \Illuminate\View\View
	 */
	public function create()
	{
	    
	    
	    return view('admin.rookiefeature.create');
	}

	/**
	 * Store a newly created rookiefeature in storage.
	 *
     * @param CreateRookieFeatureRequest|Request $request
	 */
	public function store(CreateRookieFeatureRequest $request)
	{
	    $request = $this->saveFiles($request);
		RookieFeature::create($request->all());

		return redirect()->route(config('quickadmin.route').'.rookiefeature.index');
	}

	/**
	 * Show the form for editing the specified rookiefeature.
	 *
	 * @param  int  $id
     * @return \Illuminate\View\View
	 */
	public function edit($id)
	{
		$rookiefeature = RookieFeature::find($id);
	    
	    
		return view('admin.rookiefeature.edit', compact('rookiefeature'));
	}

	/**
	 * Update the specified rookiefeature in storage.
     * @param UpdateRookieFeatureRequest|Request $request
     *
	 * @param  int  $id
	 */
	public function update($id, UpdateRookieFeatureRequest $request)
	{
		$rookiefeature = RookieFeature::findOrFail($id);

        $request = $this->saveFiles($request);

		$rookiefeature->update($request->all());

		return redirect()->route(config('quickadmin.route').'.rookiefeature.index');
	}

	/**
	 * Remove the specified rookiefeature from storage.
	 *
	 * @param  int  $id
	 */
	public function destroy($id)
	{
		RookieFeature::destroy($id);

		return redirect()->route(config('quickadmin.route').'.rookiefeature.index');
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
            RookieFeature::destroy($toDelete);
        } else {
            RookieFeature::whereNotNull('id')->delete();
        }

        return redirect()->route(config('quickadmin.route').'.rookiefeature.index');
    }

}
