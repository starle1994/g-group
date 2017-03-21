<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Redirect;
use Schema;
use App\LeftCateVer2;
use App\Http\Requests\CreateLeftCateVer2Request;
use App\Http\Requests\UpdateLeftCateVer2Request;
use Illuminate\Http\Request;
use App\Http\Controllers\Traits\FileUploadTrait;


class LeftCateVer2Controller extends Controller {

	/**
	 * Display a listing of leftcatever2
	 *
     * @param Request $request
     *
     * @return \Illuminate\View\View
	 */
	public function index(Request $request)
    {
        $leftcatever2 = LeftCateVer2::all();

		return view('admin.leftcatever2.index', compact('leftcatever2'));
	}

	/**
	 * Show the form for creating a new leftcatever2
	 *
     * @return \Illuminate\View\View
	 */
	public function create()
	{
	    
	    
	    return view('admin.leftcatever2.create');
	}

	/**
	 * Store a newly created leftcatever2 in storage.
	 *
     * @param CreateLeftCateVer2Request|Request $request
	 */
	public function store(CreateLeftCateVer2Request $request)
	{
	    $request = $this->saveFiles($request);
		LeftCateVer2::create($request->all());

		return redirect()->route(config('quickadmin.route').'.leftcatever2.index');
	}

	/**
	 * Show the form for editing the specified leftcatever2.
	 *
	 * @param  int  $id
     * @return \Illuminate\View\View
	 */
	public function edit($id)
	{
		$leftcatever2 = LeftCateVer2::find($id);
	    
	    
		return view('admin.leftcatever2.edit', compact('leftcatever2'));
	}

	/**
	 * Update the specified leftcatever2 in storage.
     * @param UpdateLeftCateVer2Request|Request $request
     *
	 * @param  int  $id
	 */
	public function update($id, UpdateLeftCateVer2Request $request)
	{
		$leftcatever2 = LeftCateVer2::findOrFail($id);

        $request = $this->saveFiles($request);

		$leftcatever2->update($request->all());

		return redirect()->route(config('quickadmin.route').'.leftcatever2.index');
	}

	/**
	 * Remove the specified leftcatever2 from storage.
	 *
	 * @param  int  $id
	 */
	public function destroy($id)
	{
		LeftCateVer2::destroy($id);

		return redirect()->route(config('quickadmin.route').'.leftcatever2.index');
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
            LeftCateVer2::destroy($toDelete);
        } else {
            LeftCateVer2::whereNotNull('id')->delete();
        }

        return redirect()->route(config('quickadmin.route').'.leftcatever2.index');
    }

}
