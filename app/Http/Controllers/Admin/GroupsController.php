<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Redirect;
use Schema;
use App\Groups;
use App\Http\Requests\CreateGroupsRequest;
use App\Http\Requests\UpdateGroupsRequest;
use Illuminate\Http\Request;

use App\Ranking;


class GroupsController extends Controller {

	/**
	 * Display a listing of groups
	 *
     * @param Request $request
     *
     * @return \Illuminate\View\View
	 */
	public function index(Request $request)
    {
        $groups = Groups::with("ranking")->get();

		return view('admin.groups.index', compact('groups'));
	}

	/**
	 * Show the form for creating a new groups
	 *
     * @return \Illuminate\View\View
	 */
	public function create()
	{
	    $ranking = Ranking::pluck("description", "id")->prepend('Please select', null);

	    
	    return view('admin.groups.create', compact("ranking"));
	}

	/**
	 * Store a newly created groups in storage.
	 *
     * @param CreateGroupsRequest|Request $request
	 */
	public function store(CreateGroupsRequest $request)
	{
	    
		Groups::create($request->all());

		return redirect()->route(config('quickadmin.route').'.groups.index');
	}

	/**
	 * Show the form for editing the specified groups.
	 *
	 * @param  int  $id
     * @return \Illuminate\View\View
	 */
	public function edit($id)
	{
		$groups = Groups::find($id);
	    $ranking = Ranking::pluck("description", "id")->prepend('Please select', null);

	    
		return view('admin.groups.edit', compact('groups', "ranking"));
	}

	/**
	 * Update the specified groups in storage.
     * @param UpdateGroupsRequest|Request $request
     *
	 * @param  int  $id
	 */
	public function update($id, UpdateGroupsRequest $request)
	{
		$groups = Groups::findOrFail($id);

        

		$groups->update($request->all());

		return redirect()->route(config('quickadmin.route').'.groups.index');
	}

	/**
	 * Remove the specified groups from storage.
	 *
	 * @param  int  $id
	 */
	public function destroy($id)
	{
		Groups::destroy($id);

		return redirect()->route(config('quickadmin.route').'.groups.index');
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
            Groups::destroy($toDelete);
        } else {
            Groups::whereNotNull('id')->delete();
        }

        return redirect()->route(config('quickadmin.route').'.groups.index');
    }

}
