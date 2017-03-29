<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Redirect;
use Schema;
use App\Song;
use App\Http\Requests\CreateSongRequest;
use App\Http\Requests\UpdateSongRequest;
use Illuminate\Http\Request;



class SongController extends Controller {

	/**
	 * Display a listing of song
	 *
     * @param Request $request
     *
     * @return \Illuminate\View\View
	 */
	public function index(Request $request)
    {
        $song = Song::all();

		return view('admin.song.index', compact('song'));
	}

	/**
	 * Show the form for creating a new song
	 *
     * @return \Illuminate\View\View
	 */
	public function create()
	{
	    
	    
	    return view('admin.song.create');
	}

	/**
	 * Store a newly created song in storage.
	 *
     * @param CreateSongRequest|Request $request
	 */
	public function store(CreateSongRequest $request)
	{
	    
		Song::create($request->all());

		return redirect()->route(config('quickadmin.route').'.song.index');
	}

	/**
	 * Show the form for editing the specified song.
	 *
	 * @param  int  $id
     * @return \Illuminate\View\View
	 */
	public function edit($id)
	{
		$song = Song::find($id);
	    
	    
		return view('admin.song.edit', compact('song'));
	}

	/**
	 * Update the specified song in storage.
     * @param UpdateSongRequest|Request $request
     *
	 * @param  int  $id
	 */
	public function update($id, UpdateSongRequest $request)
	{
		$song = Song::findOrFail($id);

        

		$song->update($request->all());

		return redirect()->route(config('quickadmin.route').'.song.index');
	}

	/**
	 * Remove the specified song from storage.
	 *
	 * @param  int  $id
	 */
	public function destroy($id)
	{
		Song::destroy($id);

		return redirect()->route(config('quickadmin.route').'.song.index');
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
            Song::destroy($toDelete);
        } else {
            Song::whereNotNull('id')->delete();
        }

        return redirect()->route(config('quickadmin.route').'.song.index');
    }

}
