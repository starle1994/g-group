<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Redirect;
use Schema;
use App\OfficeWorkFeature;
use App\Http\Requests\CreateOfficeWorkFeatureRequest;
use App\Http\Requests\UpdateOfficeWorkFeatureRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Traits\FileUploadTrait;


class OfficeWorkFeatureController extends Controller {

	/**
	 * Display a listing of officeworkfeature
	 *
     * @param Request $request
     *
     * @return \Illuminate\View\View
	 */
	public function index(Request $request)
    {
        $officeworkfeature = OfficeWorkFeature::all();

		return view('admin.officeworkfeature.index', compact('officeworkfeature'));
	}

	/**
	 * Show the form for creating a new officeworkfeature
	 *
     * @return \Illuminate\View\View
	 */
	public function create()
	{
	    
	    
	    return view('admin.officeworkfeature.create');
	}

	/**
	 * Store a newly created officeworkfeature in storage.
	 *
     * @param CreateOfficeWorkFeatureRequest|Request $request
	 */
	public function store(CreateOfficeWorkFeatureRequest $request)
	{
	    $cast = OfficeWorkFeature::orderBy('id','desc')->first();

	    $request = $this->saveFiles($request);
	    $input = $request->all();
	    if ($cast == null) {
	    	$number = 1;
	    }else{
	    	$alias = explode('-',$cast->alias);

	    	$number = $alias[3]+1;
	    }
	    
	    $input['alias'] = 'office-work-feature-'.$number;
		OfficeWorkFeature::create($input);

		return redirect()->route(config('quickadmin.route').'.officeworkfeature.index');
	}

	/**
	 * Show the form for editing the specified officeworkfeature.
	 *
	 * @param  int  $id
     * @return \Illuminate\View\View
	 */
	public function edit($id)
	{
		$officeworkfeature = OfficeWorkFeature::find($id);
	    
	    
		return view('admin.officeworkfeature.edit', compact('officeworkfeature'));
	}

	/**
	 * Update the specified officeworkfeature in storage.
     * @param UpdateOfficeWorkFeatureRequest|Request $request
     *
	 * @param  int  $id
	 */
	public function update($id, UpdateOfficeWorkFeatureRequest $request)
	{
		$officeworkfeature = OfficeWorkFeature::findOrFail($id);

        $request = $this->saveFiles($request);

		$officeworkfeature->update($request->all());

		return redirect()->route(config('quickadmin.route').'.officeworkfeature.index');
	}

	/**
	 * Remove the specified officeworkfeature from storage.
	 *
	 * @param  int  $id
	 */
	public function destroy($id)
	{
		OfficeWorkFeature::destroy($id);

		return redirect()->route(config('quickadmin.route').'.officeworkfeature.index');
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
            OfficeWorkFeature::destroy($toDelete);
        } else {
            OfficeWorkFeature::whereNotNull('id')->delete();
        }

        return redirect()->route(config('quickadmin.route').'.officeworkfeature.index');
    }

}
