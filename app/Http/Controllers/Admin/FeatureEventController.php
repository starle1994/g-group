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
use App\Schedule;
use App\ImagesEventFeature;
use Image;

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
	    $schedule = Schedule::pluck("name_event", "id")->prepend('Please select', null);
	    
	    return view('admin.featureevent.create',compact('schedule'));
	}

	/**
	 * Store a newly created featureevent in storage.
	 *
     * @param CreateFeatureEventRequest|Request $request
	 */
	public function store(CreateFeatureEventRequest $request)
	{
	    $request = $this->saveFiles($request);
	    
	    $event = FeatureEvent::orderBy('id','desc')->first();
		
		$input = $request->all();
	    if ($event == null && $event->alias == null) {
	    	$number = 1;
	    }else{
	    	$alias = explode('-',$event->alias);
	    	if(isset($alias[2])){
	    		$number = $alias[2]+1;
	    	}else{
	    		$number =1;
	    	}
	    	
	    }
	    
	    $input['alias'] = 'list-event-'.$number;

		$event = FeatureEvent::create($input);

		return redirect()->route('admin.featureevent.image',$event->id);
	}

	public function showUloadImage($id)
	{
		return view('admin.featureevent.image',compact('id'));
	}

	public function postUloadImage(Request $request)
	{
		$length =3;
		$image = $request->file('file');
        $description = $request->get('description');
        $chars = 'ABCDEFGHJKMNPQRSTUVWXYZabcdefghjkmnpqrstuvwxyz23456789';
	    $chars_length = (strlen($chars) - 1);
	    $string = $chars{rand(0, $chars_length)};

	    for ($i = 1; $i < $length; $i = strlen($string))
	    {
	        $r = $chars{rand(0, $chars_length)};
	        if ($r != $string{$i - 1}) $string .=  $r;
	    }
        $input['imagename'] = time().'-'.$string.'.'.$image->getClientOriginalExtension();
        $destinationPath = public_path('uploads/thumb');
        $img = Image::make($image->getRealPath());
        $img->resize(50, 50, function ($constraint) {
            $constraint->aspectRatio();
        })->save($destinationPath.'/'.$input['imagename']);

        $destinationPath = public_path('uploads');
        $image->move($destinationPath, $input['imagename']);

        ImagesEventFeature::create(['image'=>$input['imagename'],
        						 'eventsfeature_id'=>$request->id,
                                'description' =>$request->description]);

		return response()->json(['success'=>$input['imagename']]);
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
