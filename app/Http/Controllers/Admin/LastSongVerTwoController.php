<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Redirect;
use Schema;
use App\LastSongVerTwo;
use App\Http\Requests\CreateLastSongVerTwoRequest;
use App\Http\Requests\UpdateLastSongVerTwoRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Traits\FileUploadTrait;
use DateTime;

class LastSongVerTwoController extends Controller {

	/**
	 * Display a listing of lastsongvertwo
	 *
     * @param Request $request
     *
     * @return \Illuminate\View\View
	 */
	public function index(Request $request)
    {
        $lastsongvertwo = LastSongVerTwo::all();

		return view('admin.lastsongvertwo.index', compact('lastsongvertwo'));
	}

	/**
	 * Show the form for creating a new lastsongvertwo
	 *
     * @return \Illuminate\View\View
	 */
	public function create()
	{
	    
	    
	    return view('admin.lastsongvertwo.create');
	}

	/**
	 * Store a newly created lastsongvertwo in storage.
	 *
     * @param CreateLastSongVerTwoRequest|Request $request
	 */
	public function store(CreateLastSongVerTwoRequest $request)
	{
	    $request = $this->saveFiles($request);
	    $input = $request->all();
	    $datetime = new DateTime(); 
        $time = $datetime->format('Y:m:d');
	    if ($input['date'] == null) {
	    	$input['date'] = $time;
	    }
		LastSongVerTwo::create($input);

		return redirect()->route(config('quickadmin.route').'.lastsongvertwo.index');
	}

	/**
	 * Show the form for editing the specified lastsongvertwo.
	 *
	 * @param  int  $id
     * @return \Illuminate\View\View
	 */
	public function edit($id)
	{
		$lastsongvertwo = LastSongVerTwo::find($id);
	    
	    
		return view('admin.lastsongvertwo.edit', compact('lastsongvertwo'));
	}

	/**
	 * Update the specified lastsongvertwo in storage.
     * @param UpdateLastSongVerTwoRequest|Request $request
     *
	 * @param  int  $id
	 */
	public function update($id, UpdateLastSongVerTwoRequest $request)
	{
		$lastsongvertwo = LastSongVerTwo::findOrFail($id);

        $request = $this->saveFiles($request);

		$lastsongvertwo->update($request->all());

		return redirect()->route(config('quickadmin.route').'.lastsongvertwo.index');
	}

	/**
	 * Remove the specified lastsongvertwo from storage.
	 *
	 * @param  int  $id
	 */
	public function destroy($id)
	{
		LastSongVerTwo::destroy($id);

		return redirect()->route(config('quickadmin.route').'.lastsongvertwo.index');
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
            LastSongVerTwo::destroy($toDelete);
        } else {
            LastSongVerTwo::whereNotNull('id')->delete();
        }

        return redirect()->route(config('quickadmin.route').'.lastsongvertwo.index');
    }

}
