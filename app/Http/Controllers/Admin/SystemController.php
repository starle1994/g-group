<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Redirect;
use Schema;
use App\System;
use App\Http\Requests\CreateSystemRequest;
use App\Http\Requests\UpdateSystemRequest;
use Illuminate\Http\Request;



class SystemController extends Controller {

	/**
	 * Display a listing of system
	 *
     * @param Request $request
     *
     * @return \Illuminate\View\View
	 */
	public function index(Request $request)
    {
        $system = System::all();

		return view('admin.system.index', compact('system'));
	}

	/**
	 * Show the form for creating a new system
	 *
     * @return \Illuminate\View\View
	 */
	public function create()
	{
	    
	    
	    return view('admin.system.create');
	}

	/**
	 * Store a newly created system in storage.
	 *
     * @param CreateSystemRequest|Request $request
	 */
	public function store(CreateSystemRequest $request)
	{
	    
		System::create($request->all());

		return redirect()->route(config('quickadmin.route').'.system.index');
	}

	/**
	 * Show the form for editing the specified system.
	 *
	 * @param  int  $id
     * @return \Illuminate\View\View
	 */
	public function edit($id)
	{
		$system = System::find($id);
	    
	    
		return view('admin.system.edit', compact('system'));
	}

	/**
	 * Update the specified system in storage.
     * @param UpdateSystemRequest|Request $request
     *
	 * @param  int  $id
	 */
	public function update($id, UpdateSystemRequest $request)
	{
		$system = System::findOrFail($id);

        

		$system->update($request->all());

		return redirect()->route(config('quickadmin.route').'.system.index');
	}

	/**
	 * Remove the specified system from storage.
	 *
	 * @param  int  $id
	 */
	public function destroy($id)
	{
		System::destroy($id);

		return redirect()->route(config('quickadmin.route').'.system.index');
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
            System::destroy($toDelete);
        } else {
            System::whereNotNull('id')->delete();
        }

        return redirect()->route(config('quickadmin.route').'.system.index');
    }

}
