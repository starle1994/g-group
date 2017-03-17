<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Redirect;
use Schema;
use App\Movies;
use App\Http\Requests\CreateMoviesRequest;
use App\Http\Requests\UpdateMoviesRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Traits\FileUploadTrait;


class MoviesController extends Controller {

	/**
	 * Display a listing of movies
	 *
     * @param Request $request
     *
     * @return \Illuminate\View\View
	 */
	public function index(Request $request)
    {
        $movies = Movies::all();

		return view('admin.movies.index', compact('movies'));
	}

	/**
	 * Show the form for creating a new movies
	 *
     * @return \Illuminate\View\View
	 */
	public function create()
	{
	    
	    
	    return view('admin.movies.create');
	}

	/**
	 * Store a newly created movies in storage.
	 *
     * @param CreateMoviesRequest|Request $request
	 */
	public function store(CreateMoviesRequest $request)
	{
	    $request = $this->saveFiles($request);
		Movies::create($request->all());

		return redirect()->route(config('quickadmin.route').'.movies.index');
	}

	/**
	 * Show the form for editing the specified movies.
	 *
	 * @param  int  $id
     * @return \Illuminate\View\View
	 */
	public function edit($id)
	{
		$movies = Movies::find($id);
	    
	    
		return view('admin.movies.edit', compact('movies'));
	}

	/**
	 * Update the specified movies in storage.
     * @param UpdateMoviesRequest|Request $request
     *
	 * @param  int  $id
	 */
	public function update($id, UpdateMoviesRequest $request)
	{
		$movies = Movies::findOrFail($id);

        $request = $this->saveFiles($request);

		$movies->update($request->all());

		return redirect()->route(config('quickadmin.route').'.movies.index');
	}

	/**
	 * Remove the specified movies from storage.
	 *
	 * @param  int  $id
	 */
	public function destroy($id)
	{
		Movies::destroy($id);

		return redirect()->route(config('quickadmin.route').'.movies.index');
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
            Movies::destroy($toDelete);
        } else {
            Movies::whereNotNull('id')->delete();
        }

        return redirect()->route(config('quickadmin.route').'.movies.index');
    }

}
