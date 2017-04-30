<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Redirect;
use Schema;
use App\Schedule;
use App\Http\Requests\CreateScheduleRequest;
use App\Http\Requests\UpdateScheduleRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Traits\FileUploadTrait;
use App\ShopsList;

class ScheduleController extends Controller {

	/**
	 * Display a listing of schedule
	 *
     * @param Request $request
     *
     * @return \Illuminate\View\View
	 */
	public function index(Request $request)
    {
        $schedule = Schedule::with("shopslist")->orderBy('start_time')->get();

		return view('admin.schedule.index', compact('schedule'));
	}

	/**
	 * Show the form for creating a new schedule
	 *
     * @return \Illuminate\View\View
	 */
	public function create()
	{
	    $shopslists = ShopsList::where('is_active',1)->get();
	    $shopslist['']= 'Please select';
	    foreach ($shopslists as $value) {
	    	$shopslist[$value->id]=$value->name;
	    }
	    
	    return view('admin.schedule.create',compact('shopslist'));
	}

	/**
	 * Store a newly created schedule in storage.
	 *
     * @param CreateScheduleRequest|Request $request
	 */
	public function store(CreateScheduleRequest $request)
	{
		$end_time = ($request->end_time != '') ?  $request->end_time : NULL;
		$input = ['name_event'=>$request->name_event,
          'description'=>$request->description,
          'start_time'=>$request->start_time,
          'end_time'=>$end_time,
          'event_type'=>$request->event_type,
          'shopslist_id'=>$request->shopslist_id
        ];

		if ($request->image != null) {
	    	$data = $this->uploadAvatarAgent($request->image, $request['image-data']);
	    	$input['image']= $data['url'];
	    }

	  	Schedule::create($input);

		return redirect()->route(config('quickadmin.route').'.schedule.index');
	}


	public function uploadAvatarAgent($file,$content)
	{
	//Check request Avata
		$explode[1] = null;
		$explode = explode('.', $file->getClientOriginalName());
		$arr_ext = array('jpg', 'jpeg', 'png', 'PNG', 'JPG');
		$result['status'] = 0; 
		if(!empty($explode) && in_array($explode[1], $arr_ext)) {
		list($type, $content) = explode(';', $content);
		list(, $data) = explode(',', $content);
		$data = base64_decode($data);
		$setNewFileName = time() . "_" . rand(000000, 999999).'.'.$explode[1];
		$fileUrl = public_path() . '/uploads/' . $setNewFileName;
		file_put_contents($fileUrl, $data);
		$result['status'] = 1;
		$result['url'] = $setNewFileName; 
		} else{
		$result['status'] = 0;
		$result['url'] = '';
		}
		return $result;
	}
	/**
	 * Show the form for editing the specified schedule.
	 *
	 * @param  int  $id
     * @return \Illuminate\View\View
	 */
	public function edit($id)
	{
		$schedule = Schedule::find($id);
	    $shopslists = ShopsList::where('is_active',1)->get();
	    $shopslist['']= 'Please select';
	    foreach ($shopslists as $value) {
	    	$shopslist[$value->id]=$value->name;
	    }
	    
		return view('admin.schedule.edit', compact('schedule','shopslist'));
	}

	/**
	 * Update the specified schedule in storage.
     * @param UpdateScheduleRequest|Request $request
     *
	 * @param  int  $id
	 */
	public function update($id, UpdateScheduleRequest $request)
	{
		$schedule = Schedule::findOrFail($id);
		$end_time = ($request->end_time != '') ?  $request->end_time : NULL;
		$input = ['name_event'=>$request->name_event,
          'description'=>$request->description,
          'start_time'=>$request->start_time,
          'end_time'=>$end_time,
          'event_type'=>$request->event_type,
          'shopslist_id'=>$request->shopslist_id
        ];

		if ($request->image != null) {
	    	$data = $this->uploadAvatarAgent($request->image, $request['image-data']);
	    	$input['image']= $data['url'];
	    }

		$schedule->update($input);

		return redirect()->route(config('quickadmin.route').'.schedule.index');
	}

	/**
	 * Remove the specified schedule from storage.
	 *
	 * @param  int  $id
	 */
	public function destroy($id)
	{
		Schedule::destroy($id);

		return redirect()->route(config('quickadmin.route').'.schedule.index');
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
            Schedule::destroy($toDelete);
        } else {
            Schedule::whereNotNull('id')->delete();
        }

        return redirect()->route(config('quickadmin.route').'.schedule.index');
    }

}
