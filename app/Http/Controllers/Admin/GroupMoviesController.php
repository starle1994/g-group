<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Redirect;
use Schema;
use App\GroupMovies;
use App\Http\Requests\CreateGroupMoviesRequest;
use App\Http\Requests\UpdateGroupMoviesRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Traits\FileUploadTrait;


class GroupMoviesController extends Controller {

	/**
	 * Display a listing of groupmovies
	 *
     * @param Request $request
     *
     * @return \Illuminate\View\View
	 */
	public function index(Request $request)
    {
        $groupmovies = GroupMovies::all();

		return view('admin.groupmovies.index', compact('groupmovies'));
	}

	/**
	 * Show the form for creating a new groupmovies
	 *
     * @return \Illuminate\View\View
	 */
	public function create()
	{
	    
	    
	    return view('admin.groupmovies.create');
	}

	/**
	 * Store a newly created groupmovies in storage.
	 *
     * @param CreateGroupMoviesRequest|Request $request
	 */
	public function store(CreateGroupMoviesRequest $request)
	{
	    $request = $this->saveFiles($request);
		GroupMovies::create($request->all());

		return redirect()->route(config('quickadmin.route').'.groupmovies.index');
	}

	/**
	 * Show the form for editing the specified groupmovies.
	 *
	 * @param  int  $id
     * @return \Illuminate\View\View
	 */
	public function edit($id)
	{
		$groupmovies = GroupMovies::find($id);
	    
	    
		return view('admin.groupmovies.edit', compact('groupmovies'));
	}

	/**
	 * Update the specified groupmovies in storage.
     * @param UpdateGroupMoviesRequest|Request $request
     *
	 * @param  int  $id
	 */
	public function update($id, UpdateGroupMoviesRequest $request)
	{
		$groupmovies = GroupMovies::findOrFail($id);

        $request = $this->saveFiles($request);

		$groupmovies->update($request->all());

		return redirect()->route(config('quickadmin.route').'.groupmovies.index');
	}

	/**
	 * Remove the specified groupmovies from storage.
	 *
	 * @param  int  $id
	 */
	public function destroy($id)
	{
		GroupMovies::destroy($id);

		return redirect()->route(config('quickadmin.route').'.groupmovies.index');
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
            GroupMovies::destroy($toDelete);
        } else {
            GroupMovies::whereNotNull('id')->delete();
        }

        return redirect()->route(config('quickadmin.route').'.groupmovies.index');
    }

}
