<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Redirect;
use Schema;
use App\EventsFeature;
use App\Http\Requests\CreateEventsFeatureRequest;
use App\Http\Requests\UpdateEventsFeatureRequest;
use Illuminate\Http\Request;
use App\Schedule;


class EventsFeatureController extends Controller {

	/**
	 * Display a listing of eventsfeature
	 *
     * @param Request $request
     *
     * @return \Illuminate\View\View
	 */
	public function index(Request $request)
    {
        $eventsfeature = EventsFeature::all();

		return view('admin.eventsfeature.index', compact('eventsfeature'));
	}

	/**
	 * Show the form for creating a new eventsfeature
	 *
     * @return \Illuminate\View\View
	 */
	public function create()
	{
	    $schedule = Schedule::pluck("name_event", "id")->prepend('Please select', null);
	    
	    return view('admin.eventsfeature.create',compact('schedule'));
	}

	/**
	 * Store a newly created eventsfeature in storage.
	 *
     * @param CreateEventsFeatureRequest|Request $request
	 */
	public function store(CreateEventsFeatureRequest $request)
	{
	    $event = EventsFeature::orderBy('id','desc')->first();
		
		$input = $request->all();
		dd($event->alias);
	    if ($event == null && $event->alias != null) {
	    	$number = 1;
	    }else{
	    	$alias = explode($event->alias,'-');
	    	if(isset($alias[2])){
	    		$number = $alias[2]+1;
	    	}else{
	    		$number =1;
	    	}
	    }
	    
	    $input['alias'] = 'list-event-'.$number;

		EventsFeature::create($input);

		return redirect()->route(config('quickadmin.route').'.eventsfeature.index');
	}

	/**
	 * Show the form for editing the specified eventsfeature.
	 *
	 * @param  int  $id
     * @return \Illuminate\View\View
	 */
	public function edit($id)
	{
		$eventsfeature = EventsFeature::find($id);
	    
	    
		return view('admin.eventsfeature.edit', compact('eventsfeature'));
	}

	/**
	 * Update the specified eventsfeature in storage.
     * @param UpdateEventsFeatureRequest|Request $request
     *
	 * @param  int  $id
	 */
	public function update($id, UpdateEventsFeatureRequest $request)
	{
		$eventsfeature = EventsFeature::findOrFail($id);

        

		$eventsfeature->update($request->all());

		return redirect()->route(config('quickadmin.route').'.eventsfeature.index');
	}

	/**
	 * Remove the specified eventsfeature from storage.
	 *
	 * @param  int  $id
	 */
	public function destroy($id)
	{
		EventsFeature::destroy($id);

		return redirect()->route(config('quickadmin.route').'.eventsfeature.index');
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
            EventsFeature::destroy($toDelete);
        } else {
            EventsFeature::whereNotNull('id')->delete();
        }

        return redirect()->route(config('quickadmin.route').'.eventsfeature.index');
    }

}
