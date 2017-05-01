<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Redirect;
use Schema;
use App\ImagesEventFeature;
use App\Http\Requests\CreateImagesEventFeatureRequest;
use App\Http\Requests\UpdateImagesEventFeatureRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Traits\FileUploadTrait;
use App\FeatureEvent;
use File;

class ImagesEventFeatureController extends Controller {

	/**
	 * Display a listing of imageseventfeature
	 *
     * @param Request $request
     *
     * @return \Illuminate\View\View
	 */
	public function index(Request $request)
    {
		return redirect()->back();
	}

	public function view($id)
	{
		$imageseventfeature = ImagesEventFeature::with("eventsfeature")->where('eventsfeature_id',$id)->get();
		$event = FeatureEvent::where('id',$id)->first();
		return view('admin.imageseventfeature.index', compact('imageseventfeature','event'));
	}
	/**
	 * Show the form for creating a new imageseventfeature
	 *
     * @return \Illuminate\View\View
	 */
	public function create()
	{
	    $eventsfeature = FeatureEvent::pluck("name", "id")->prepend('Please select', null);

	    
	    return view('admin.imageseventfeature.create', compact("eventsfeature"));
	}

	/**
	 * Store a newly created imageseventfeature in storage.
	 *
     * @param CreateImagesEventFeatureRequest|Request $request
	 */
	public function store(CreateImagesEventFeatureRequest $request)
	{
	    $request = $this->saveFiles($request);
		ImagesEventFeature::create($request->all());

		return redirect()->back();
	}

	/**
	 * Show the form for editing the specified imageseventfeature.
	 *
	 * @param  int  $id
     * @return \Illuminate\View\View
	 */
	public function edit($id)
	{
		$imageseventfeature = ImagesEventFeature::find($id);
	    $eventsfeature = FeatureEvent::pluck("name", "id")->prepend('Please select', null);

		return view('admin.imageseventfeature.edit', compact('imageseventfeature', "eventsfeature"));
	}

	/**
	 * Update the specified imageseventfeature in storage.
     * @param UpdateImagesEventFeatureRequest|Request $request
     *
	 * @param  int  $id
	 */
	public function update($id, Request $request)
	{
		$imageseventfeature = ImagesEventFeature::findOrFail($id);

        $request = $this->saveFiles($request);

        $input = [];
        if ($request->image != null) {
        	$input['image']	= $request->image;
        }
        if ($request->description != null) {
        	$input['description']	= $request->description;
        }
        if ($request->eventsfeature_id != null) {
        	$input['eventsfeature_id']	= $request->eventsfeature_id;
        }

		$imageseventfeature->update($input);

		return redirect()->back();
	}

	/**
	 * Remove the specified imageseventfeature from storage.
	 *
	 * @param  int  $id
	 */
	public function destroy($id)
	{
		$image = ImagesEventFeature::where('id', $id)->first();
		File::Delete(public_path().'/uploads/'.$image->image);
		File::Delete(public_path().'/uploads/thumb/'.$image->image);
		ImagesEventFeature::destroy($id);

		return redirect()->back();
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
        	dd('b');
            $toDelete = json_decode($request->get('toDelete'));
            ImagesEventFeature::destroy($toDelete);
        } else {
        	dd('a');
            ImagesEventFeature::whereNotNull('id')->delete();
        }

        return redirect()->route(config('quickadmin.route').'.imageseventfeature.index');
    }

}
