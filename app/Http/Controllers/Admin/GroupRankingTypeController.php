<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Redirect;
use Schema;
use App\GroupRankingType;
use App\Http\Requests\CreateGroupRankingTypeRequest;
use App\Http\Requests\UpdateGroupRankingTypeRequest;
use Illuminate\Http\Request;



class GroupRankingTypeController extends Controller {

	/**
	 * Display a listing of grouprankingtype
	 *
     * @param Request $request
     *
     * @return \Illuminate\View\View
	 */
	public function index(Request $request)
    {
        $grouprankingtype = GroupRankingType::all();

		return view('admin.grouprankingtype.index', compact('grouprankingtype'));
	}

	/**
	 * Show the form for creating a new grouprankingtype
	 *
     * @return \Illuminate\View\View
	 */
	public function create()
	{
	    
	    
	    return view('admin.grouprankingtype.create');
	}

	/**
	 * Store a newly created grouprankingtype in storage.
	 *
     * @param CreateGroupRankingTypeRequest|Request $request
	 */
	public function store(CreateGroupRankingTypeRequest $request)
	{
	    
		GroupRankingType::create($request->all());

		return redirect()->route(config('quickadmin.route').'.grouprankingtype.index');
	}

	/**
	 * Show the form for editing the specified grouprankingtype.
	 *
	 * @param  int  $id
     * @return \Illuminate\View\View
	 */
	public function edit($id)
	{
		$grouprankingtype = GroupRankingType::find($id);
	    
	    
		return view('admin.grouprankingtype.edit', compact('grouprankingtype'));
	}

	/**
	 * Update the specified grouprankingtype in storage.
     * @param UpdateGroupRankingTypeRequest|Request $request
     *
	 * @param  int  $id
	 */
	public function update($id, UpdateGroupRankingTypeRequest $request)
	{
		$grouprankingtype = GroupRankingType::findOrFail($id);

        

		$grouprankingtype->update($request->all());

		return redirect()->route(config('quickadmin.route').'.grouprankingtype.index');
	}

	/**
	 * Remove the specified grouprankingtype from storage.
	 *
	 * @param  int  $id
	 */
	public function destroy($id)
	{
		GroupRankingType::destroy($id);

		return redirect()->route(config('quickadmin.route').'.grouprankingtype.index');
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
            GroupRankingType::destroy($toDelete);
        } else {
            GroupRankingType::whereNotNull('id')->delete();
        }

        return redirect()->route(config('quickadmin.route').'.grouprankingtype.index');
    }

}
