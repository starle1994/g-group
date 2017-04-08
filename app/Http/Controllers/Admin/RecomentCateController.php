<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Redirect;
use Schema;
use App\RecomentCate;
use App\Http\Requests\CreateRecomentCateRequest;
use App\Http\Requests\UpdateRecomentCateRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Traits\FileUploadTrait;
use App\ShopsList;


class RecomentCateController extends Controller {

	/**
	 * Display a listing of recomentcate
	 *
     * @param Request $request
     *
     * @return \Illuminate\View\View
	 */
	public function index(Request $request)
    {
        $recomentcate = RecomentCate::with("shopslist")->where("shopslist_id",1)->get();
        $shopslist_id = 1;
		return view('admin.recomentcate.index', compact('recomentcate', 'shopslist_id'));
	}

	public function recommentGigolo(Request $request)
    {
        $recomentcate = RecomentCate::with("shopslist")->where("shopslist_id",2)->get();
        $shopslist_id =2;
		return view('admin.recomentcate.index', compact('recomentcate', 'shopslist_id'));
	}

	/**
	 * Show the form for creating a new recomentcate
	 *
     * @return \Illuminate\View\View
	 */
	public function create()
	{
	    $shopslist = ShopsList::pluck("name", "id")->prepend('Please select', null);

	    
	    return view('admin.recomentcate.create', compact("shopslist"));
	}

	/**
	 * Store a newly created recomentcate in storage.
	 *
     * @param CreateRecomentCateRequest|Request $request
	 */
	public function store(CreateRecomentCateRequest $request)
	{
	    $request = $this->saveFiles($request);
		RecomentCate::create($request->all());

		return redirect()->route(config('quickadmin.route').'.recomentcate.index');
	}

	/**
	 * Show the form for editing the specified recomentcate.
	 *
	 * @param  int  $id
     * @return \Illuminate\View\View
	 */
	public function edit($id)
	{
		$recomentcate = RecomentCate::find($id);
	    $shopslist = ShopsList::pluck("name", "id")->prepend('Please select', null);

	    
		return view('admin.recomentcate.edit', compact('recomentcate', "shopslist"));
	}

	/**
	 * Update the specified recomentcate in storage.
     * @param UpdateRecomentCateRequest|Request $request
     *
	 * @param  int  $id
	 */
	public function update($id, UpdateRecomentCateRequest $request)
	{
		$recomentcate = RecomentCate::findOrFail($id);

        $request = $this->saveFiles($request);
        $input = [];
        if ($request->image != null) {
        	$input['image'] = $request->image;
        }
        if ($request->name != null) {
        	$input['name'] = $request->name;
        }
        if ($request->alias != null) {
        	$input['alias'] = $request->alias;
        }
        
		$recomentcate->update($input);
		if ($recomentcate->shopslist_id == 1) {
			return redirect()->route(config('quickadmin.route').'.recomentcate.index');
		}else{
			return redirect()->route(config('quickadmin.route').'.recomentcate.gigolo');
		}
		
	}

	/**
	 * Remove the specified recomentcate from storage.
	 *
	 * @param  int  $id
	 */
	public function destroy($id)
	{
		RecomentCate::destroy($id);

		return redirect()->route(config('quickadmin.route').'.recomentcate.index');
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
            RecomentCate::destroy($toDelete);
        } else {
            RecomentCate::whereNotNull('id')->delete();
        }

        return redirect()->route(config('quickadmin.route').'.recomentcate.index');
    }

}
