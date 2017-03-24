<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Redirect;
use Schema;
use App\CastFeature;
use App\Http\Requests\CreateCastFeatureRequest;
use App\Http\Requests\UpdateCastFeatureRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Traits\FileUploadTrait;


class CastFeatureController extends Controller {

	/**
	 * Display a listing of castfeature
	 *
     * @param Request $request
     *
     * @return \Illuminate\View\View
	 */
	public function index(Request $request)
    {
        $castfeature = CastFeature::all();

		return view('admin.castfeature.index', compact('castfeature'));
	}

	/**
	 * Show the form for creating a new castfeature
	 *
     * @return \Illuminate\View\View
	 */
	public function create()
	{
	    
	    
	    return view('admin.castfeature.create');
	}

	/**
	 * Store a newly created castfeature in storage.
	 *
     * @param CreateCastFeatureRequest|Request $request
	 */
	public function store(CreateCastFeatureRequest $request)
	{
		$cast = CastFeature::orderBy('id','desc')->first();

	    $request = $this->saveFiles($request);
	    $input = $request->all();
	    if ($cast == null) {
	    	$number = 1;
	    }else{
	    	$alias = explode('-',$cast->alias);

	    	$number = $alias[3]+1;
	    }
	    
	    $input['alias'] = 'list-cast-feature-'.$number;
		CastFeature::create($input);

		return redirect()->route(config('quickadmin.route').'.castfeature.index');
	}

	/**
	 * Show the form for editing the specified castfeature.
	 *
	 * @param  int  $id
     * @return \Illuminate\View\View
	 */
	public function edit($id)
	{
		$castfeature = CastFeature::find($id);
	    
	    
		return view('admin.castfeature.edit', compact('castfeature'));
	}

	/**
	 * Update the specified castfeature in storage.
     * @param UpdateCastFeatureRequest|Request $request
     *
	 * @param  int  $id
	 */
	public function update($id, UpdateCastFeatureRequest $request)
	{
		$castfeature = CastFeature::findOrFail($id);

        $request = $this->saveFiles($request);

		$castfeature->update($request->all());

		return redirect()->route(config('quickadmin.route').'.castfeature.index');
	}

	/**
	 * Remove the specified castfeature from storage.
	 *
	 * @param  int  $id
	 */
	public function destroy($id)
	{
		CastFeature::destroy($id);

		return redirect()->route(config('quickadmin.route').'.castfeature.index');
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
            CastFeature::destroy($toDelete);
        } else {
            CastFeature::whereNotNull('id')->delete();
        }

        return redirect()->route(config('quickadmin.route').'.castfeature.index');
    }

}
