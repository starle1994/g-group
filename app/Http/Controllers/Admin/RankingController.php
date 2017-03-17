<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Redirect;
use Schema;
use App\Ranking;
use App\Http\Requests\CreateRankingRequest;
use App\Http\Requests\UpdateRankingRequest;
use Illuminate\Http\Request;



class RankingController extends Controller {

	/**
	 * Display a listing of ranking
	 *
     * @param Request $request
     *
     * @return \Illuminate\View\View
	 */
	public function index(Request $request)
    {
        $ranking = Ranking::all();

		return view('admin.ranking.index', compact('ranking'));
	}

	/**
	 * Show the form for creating a new ranking
	 *
     * @return \Illuminate\View\View
	 */
	public function create()
	{
	    
	    
	    return view('admin.ranking.create');
	}

	/**
	 * Store a newly created ranking in storage.
	 *
     * @param CreateRankingRequest|Request $request
	 */
	public function store(CreateRankingRequest $request)
	{
	    
		Ranking::create($request->all());

		return redirect()->route(config('quickadmin.route').'.ranking.index');
	}

	/**
	 * Show the form for editing the specified ranking.
	 *
	 * @param  int  $id
     * @return \Illuminate\View\View
	 */
	public function edit($id)
	{
		$ranking = Ranking::find($id);
	    
	    
		return view('admin.ranking.edit', compact('ranking'));
	}

	/**
	 * Update the specified ranking in storage.
     * @param UpdateRankingRequest|Request $request
     *
	 * @param  int  $id
	 */
	public function update($id, UpdateRankingRequest $request)
	{
		$ranking = Ranking::findOrFail($id);

        

		$ranking->update($request->all());

		return redirect()->route(config('quickadmin.route').'.ranking.index');
	}

	/**
	 * Remove the specified ranking from storage.
	 *
	 * @param  int  $id
	 */
	public function destroy($id)
	{
		Ranking::destroy($id);

		return redirect()->route(config('quickadmin.route').'.ranking.index');
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
            Ranking::destroy($toDelete);
        } else {
            Ranking::whereNotNull('id')->delete();
        }

        return redirect()->route(config('quickadmin.route').'.ranking.index');
    }

}
