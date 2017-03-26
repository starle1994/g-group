<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Redirect;
use Schema;
use App\CategoryRight;
use App\Http\Requests\CreateCategoryRightRequest;
use App\Http\Requests\UpdateCategoryRightRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Traits\FileUploadTrait;


class CategoryRightController extends Controller {

	/**
	 * Display a listing of categoryright
	 *
     * @param Request $request
     *
     * @return \Illuminate\View\View
	 */
	public function index(Request $request)
    {
        $categoryright = CategoryRight::all();

		return view('admin.categoryright.index', compact('categoryright'));
	}

	/**
	 * Show the form for creating a new categoryright
	 *
     * @return \Illuminate\View\View
	 */
	public function create()
	{
	    
	    
	    return view('admin.categoryright.create');
	}

	/**
	 * Store a newly created categoryright in storage.
	 *
     * @param CreateCategoryRightRequest|Request $request
	 */
	public function store(CreateCategoryRightRequest $request)
	{
	    $request = $this->saveFiles($request);
		CategoryRight::create($request->all());

		return redirect()->route(config('quickadmin.route').'.categoryright.index');
	}

	/**
	 * Show the form for editing the specified categoryright.
	 *
	 * @param  int  $id
     * @return \Illuminate\View\View
	 */
	public function edit($id)
	{
		$categoryright = CategoryRight::find($id);
	    
	    
		return view('admin.categoryright.edit', compact('categoryright'));
	}

	/**
	 * Update the specified categoryright in storage.
     * @param UpdateCategoryRightRequest|Request $request
     *
	 * @param  int  $id
	 */
	public function update($id, UpdateCategoryRightRequest $request)
	{
		$categoryright = CategoryRight::findOrFail($id);
		if ($request->image != null) {
			$request = $this->saveFiles($request);
			$categoryright->update($request->all());
		}else{
			$input = [
				'name'	=> $request->name,
				'alias'	=> $request->alias
			];
			$categoryright->update($input);
		}

		return redirect()->route(config('quickadmin.route').'.categoryright.index');
	}

	/**
	 * Remove the specified categoryright from storage.
	 *
	 * @param  int  $id
	 */
	public function destroy($id)
	{
		CategoryRight::destroy($id);

		return redirect()->route(config('quickadmin.route').'.categoryright.index');
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
            CategoryRight::destroy($toDelete);
        } else {
            CategoryRight::whereNotNull('id')->delete();
        }

        return redirect()->route(config('quickadmin.route').'.categoryright.index');
    }

}
