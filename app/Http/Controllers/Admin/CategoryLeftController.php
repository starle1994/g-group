<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Redirect;
use Schema;
use App\CategoryLeft;
use App\Http\Requests\CreateCategoryLeftRequest;
use App\Http\Requests\UpdateCategoryLeftRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Traits\FileUploadTrait;


class CategoryLeftController extends Controller {

	/**
	 * Display a listing of categoryleft
	 *
     * @param Request $request
     *
     * @return \Illuminate\View\View
	 */
	public function index(Request $request)
    {
        $categoryleft = CategoryLeft::all();

		return view('admin.categoryleft.index', compact('categoryleft'));
	}

	/**
	 * Show the form for creating a new categoryleft
	 *
     * @return \Illuminate\View\View
	 */
	public function create()
	{
	    
	    
	    return view('admin.categoryleft.create');
	}

	/**
	 * Store a newly created categoryleft in storage.
	 *
     * @param CreateCategoryLeftRequest|Request $request
	 */
	public function store(CreateCategoryLeftRequest $request)
	{
	    $request = $this->saveFiles($request);
		CategoryLeft::create($request->all());

		return redirect()->route(config('quickadmin.route').'.categoryleft.index');
	}

	/**
	 * Show the form for editing the specified categoryleft.
	 *
	 * @param  int  $id
     * @return \Illuminate\View\View
	 */
	public function edit($id)
	{
		$categoryleft = CategoryLeft::find($id);
	    
	    
		return view('admin.categoryleft.edit', compact('categoryleft'));
	}

	/**
	 * Update the specified categoryleft in storage.
     * @param UpdateCategoryLeftRequest|Request $request
     *
	 * @param  int  $id
	 */
	public function update($id, UpdateCategoryLeftRequest $request)
	{
		$categoryleft = CategoryLeft::findOrFail($id);

        $request = $this->saveFiles($request);

		$categoryleft->update($request->all());

		return redirect()->route(config('quickadmin.route').'.categoryleft.index');
	}

	/**
	 * Remove the specified categoryleft from storage.
	 *
	 * @param  int  $id
	 */
	public function destroy($id)
	{
		CategoryLeft::destroy($id);

		return redirect()->route(config('quickadmin.route').'.categoryleft.index');
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
            CategoryLeft::destroy($toDelete);
        } else {
            CategoryLeft::whereNotNull('id')->delete();
        }

        return redirect()->route(config('quickadmin.route').'.categoryleft.index');
    }

}
