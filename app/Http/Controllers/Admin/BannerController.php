<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Redirect;
use Schema;
use App\Banner;
use App\Http\Requests\CreateBannerRequest;
use App\Http\Requests\UpdateBannerRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Traits\FileUploadTrait;


class BannerController extends Controller {

	/**
	 * Display a listing of banner
	 *
     * @param Request $request
     *
     * @return \Illuminate\View\View
	 */
	public function index(Request $request)
    {
        $banner = Banner::all();

		return view('admin.banner.index', compact('banner'));
	}

	/**
	 * Show the form for creating a new banner
	 *
     * @return \Illuminate\View\View
	 */
	public function create()
	{
	    
	    
	    return view('admin.banner.create');
	}

	/**
	 * Store a newly created banner in storage.
	 *
     * @param CreateBannerRequest|Request $request
	 */
	public function store(CreateBannerRequest $request)
	{
	    $request = $this->saveFiles($request);
		Banner::create($request->all());

		return redirect()->route(config('quickadmin.route').'.banner.index');
	}

	/**
	 * Show the form for editing the specified banner.
	 *
	 * @param  int  $id
     * @return \Illuminate\View\View
	 */
	public function edit($id)
	{
		$banner = Banner::find($id);
	    
	    
		return view('admin.banner.edit', compact('banner'));
	}

	/**
	 * Update the specified banner in storage.
     * @param UpdateBannerRequest|Request $request
     *
	 * @param  int  $id
	 */
	public function update($id, UpdateBannerRequest $request)
	{
		$banner = Banner::findOrFail($id);

        $request = $this->saveFiles($request);

		$banner->update($request->all());

		return redirect()->route(config('quickadmin.route').'.banner.index');
	}

	/**
	 * Remove the specified banner from storage.
	 *
	 * @param  int  $id
	 */
	public function destroy($id)
	{
		Banner::destroy($id);

		return redirect()->route(config('quickadmin.route').'.banner.index');
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
            Banner::destroy($toDelete);
        } else {
            Banner::whereNotNull('id')->delete();
        }

        return redirect()->route(config('quickadmin.route').'.banner.index');
    }

}
