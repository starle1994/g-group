<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Redirect;
use Schema;
use App\SongRating;
use App\Http\Requests\CreateSongRatingRequest;
use App\Http\Requests\UpdateSongRatingRequest;
use Illuminate\Http\Request;

use App\Song;


class SongRatingController extends Controller {

	/**
	 * Display a listing of songrating
	 *
     * @param Request $request
     *
     * @return \Illuminate\View\View
	 */
	public function index(Request $request)
    {
        $songrating = SongRating::with("song")->get();

		return view('admin.songrating.index', compact('songrating'));
	}

	/**
	 * Show the form for creating a new songrating
	 *
     * @return \Illuminate\View\View
	 */
	public function create()
	{
	    $song = Song::pluck("name", "id")->prepend('Please select', null);

	    
	    return view('admin.songrating.create', compact("song"));
	}

	/**
	 * Store a newly created songrating in storage.
	 *
     * @param CreateSongRatingRequest|Request $request
	 */
	public function store(CreateSongRatingRequest $request)
	{
	    
		SongRating::create($request->all());

		return redirect()->route(config('quickadmin.route').'.songrating.index');
	}

	/**
	 * Show the form for editing the specified songrating.
	 *
	 * @param  int  $id
     * @return \Illuminate\View\View
	 */
	public function edit($id)
	{
		$songrating = SongRating::find($id);
	    $song = Song::pluck("name", "id")->prepend('Please select', null);

	    
		return view('admin.songrating.edit', compact('songrating', "song"));
	}

	/**
	 * Update the specified songrating in storage.
     * @param UpdateSongRatingRequest|Request $request
     *
	 * @param  int  $id
	 */
	public function update($id, UpdateSongRatingRequest $request)
	{
		$songrating = SongRating::findOrFail($id);

        

		$songrating->update($request->all());

		return redirect()->route(config('quickadmin.route').'.songrating.index');
	}

	/**
	 * Remove the specified songrating from storage.
	 *
	 * @param  int  $id
	 */
	public function destroy($id)
	{
		SongRating::destroy($id);

		return redirect()->route(config('quickadmin.route').'.songrating.index');
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
            SongRating::destroy($toDelete);
        } else {
            SongRating::whereNotNull('id')->delete();
        }

        return redirect()->route(config('quickadmin.route').'.songrating.index');
    }

}
