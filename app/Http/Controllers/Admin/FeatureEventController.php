<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Redirect;
use Schema;
use App\FeatureEvent;
use App\Http\Requests\CreateFeatureEventRequest;
use App\Http\Requests\UpdateFeatureEventRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Traits\FileUploadTrait;


class FeatureEventController extends Controller {

	/**
	 * Display a listing of featureevent
	 *
     * @param Request $request
     *
     * @return \Illuminate\View\View
	 */
	public function index(Request $request)
    {
        $featureevent = FeatureEvent::all();

		return view('admin.featureevent.index', compact('featureevent'));
	}

	/**
	 * Show the form for creating a new featureevent
	 *
     * @return \Illuminate\View\View
	 */
	public function create()
	{
	    
	    
	    return view('admin.featureevent.create');
	}

	/**
	 * Store a newly created featureevent in storage.
	 *
     * @param CreateFeatureEventRequest|Request $request
	 */
	public function store(CreateFeatureEventRequest $request)
	{
	    $request = $this->saveFiles($request);
		FeatureEvent::create($request->all());

		return redirect()->route(config('quickadmin.route').'.featureevent.index');
	}

	/**
	 * Show the form for editing the specified featureevent.
	 *
	 * @param  int  $id
     * @return \Illuminate\View\View
	 */
	public function edit($id)
	{
		$featureevent = FeatureEvent::find($id);
	    
	    
		return view('admin.featureevent.edit', compact('featureevent'));
	}

	/**
	 * Update the specified featureevent in storage.
     * @param UpdateFeatureEventRequest|Request $request
     *
	 * @param  int  $id
	 */
	public function update($id, UpdateFeatureEventRequest $request)
	{
		$featureevent = FeatureEvent::findOrFail($id);

        $request = $this->saveFiles($request);

		$featureevent->update($request->all());

		return redirect()->route(config('quickadmin.route').'.featureevent.index');
	}

	/**
	 * Remove the specified featureevent from storage.
	 *
	 * @param  int  $id
	 */
	public function destroy($id)
	{
		FeatureEvent::destroy($id);

		return redirect()->route(config('quickadmin.route').'.featureevent.index');
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
            FeatureEvent::destroy($toDelete);
        } else {
            FeatureEvent::whereNotNull('id')->delete();
        }

        return redirect()->route(config('quickadmin.route').'.featureevent.index');
    }

}
