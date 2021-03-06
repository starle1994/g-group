<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Redirect;
use Schema;
use App\GodStaffs;
use App\Http\Requests\CreateGodStaffsRequest;
use App\Http\Requests\UpdateGodStaffsRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Traits\FileUploadTrait;
use App\ShopsList;


class GodStaffsController extends Controller {

	/**
	 * Display a listing of godstaffs
	 *
     * @param Request $request
     *
     * @return \Illuminate\View\View
	 */
	public function index(Request $request)
    {
        $godstaffs = GodStaffs::with("shopslist")->orderBy('important','desc')->where('shopslist_id',1)->get();
        $shopslist_id =1;
		return view('admin.godstaffs.index', compact('godstaffs','shopslist_id'));
	}

	public function gigolo(Request $request)
    {
        $godstaffs = GodStaffs::with("shopslist")->orderBy('id','desc')->where('shopslist_id',2)->get();
         $shopslist_id =2;
		return view('admin.godstaffs.index', compact('godstaffs','shopslist_id'));
	}

	public function gGroup(Request $request)
    {
        $godstaffs = GodStaffs::with("shopslist")->orderBy('id','desc')->where('shopslist_id',3)->get();
         $shopslist_id =3;
		return view('admin.godstaffs.index', compact('godstaffs','shopslist_id'));
	}

	/**
	 * Show the form for creating a new godstaffs
	 *
     * @return \Illuminate\View\View
	 */
	public function create()
	{
	    $shopslist = ShopsList::pluck("name", "id")->prepend('Please select', null);

	    
	    return view('admin.godstaffs.create', compact("shopslist"));
	}

	/**
	 * Store a newly created godstaffs in storage.
	 *
     * @param CreateGodStaffsRequest|Request $request
	 */
	public function store(CreateGodStaffsRequest $request)
	{
	    $request = $this->saveFiles($request);
		GodStaffs::create($request->all());
		if ($request->shopslist_id ==1) {
			return redirect()->route(config('quickadmin.route').'.godstaffs.index');
		}else{
			if ($request->shopslist_id == 2) {
				return redirect()->route('admin.godstaffs.gigolo');
			}else{
				return redirect()->route('admin.godstaffs.g5');
			}
		}
		
	}

	/**
	 * Show the form for editing the specified godstaffs.
	 *
	 * @param  int  $id
     * @return \Illuminate\View\View
	 */
	public function edit($id)
	{
		$godstaffs = GodStaffs::find($id);
	    $shopslist = ShopsList::pluck("name", "id")->prepend('Please select', null);

	    
		return view('admin.godstaffs.edit', compact('godstaffs', "shopslist"));
	}

	/**
	 * Update the specified godstaffs in storage.
     * @param UpdateGodStaffsRequest|Request $request
     *
	 * @param  int  $id
	 */
	public function update($id, UpdateGodStaffsRequest $request)
	{
		$godstaffs = GodStaffs::findOrFail($id);

        $request = $this->saveFiles($request);

		$a =$godstaffs->update($request->all());
		if ($request->shopslist_id ==1) {
			return redirect()->route(config('quickadmin.route').'.godstaffs.index');
		}else{
			if ($request->shopslist_id == 2) {
				return redirect()->route('admin.godstaffs.gigolo');
			}else{
				return redirect()->route('admin.godstaffs.g5');
			}
		}
	}

	/**
	 * Remove the specified godstaffs from storage.
	 *
	 * @param  int  $id
	 */
	public function destroy($id)
	{
		GodStaffs::destroy($id);

		return redirect()->route(config('quickadmin.route').'.godstaffs.index');
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
            GodStaffs::destroy($toDelete);
        } else {
            GodStaffs::whereNotNull('id')->delete();
        }

        return redirect()->route(config('quickadmin.route').'.godstaffs.index');
    }

}
