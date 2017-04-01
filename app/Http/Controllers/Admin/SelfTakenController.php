<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Redirect;
use Schema;
use App\SelfTaken;
use App\Http\Requests\CreateSelfTakenRequest;
use App\Http\Requests\UpdateSelfTakenRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Traits\FileUploadTrait;
use Image;
use DateTime;

class SelfTakenController extends Controller {

	/**
	 * Display a listing of selftaken
	 *
     * @param Request $request
     *
     * @return \Illuminate\View\View
	 */
	public function index(Request $request)
    {
        $selftaken = SelfTaken::all();

		return view('admin.selftaken.index', compact('selftaken'));
	}

	/**
	 * Show the form for creating a new selftaken
	 *
     * @return \Illuminate\View\View
	 */
	public function create()
	{
	    
	    
	    return view('admin.selftaken.create');
	}

	/**
	 * Store a newly created selftaken in storage.
	 *
     * @param CreateSelfTakenRequest|Request $request
	 */
	public function store(CreateSelfTakenRequest $request)
	{
	    $length =3;
		$image = $request->file('file');
        $description = $request->get('description');
        $chars = 'ABCDEFGHJKMNPQRSTUVWXYZabcdefghjkmnpqrstuvwxyz23456789';
	    $chars_length = (strlen($chars) - 1);
	    $string = $chars{rand(0, $chars_length)};

	    for ($i = 1; $i < $length; $i = strlen($string))
	    {
	        $r = $chars{rand(0, $chars_length)};
	        if ($r != $string{$i - 1}) $string .=  $r;
	    }

        $input['imagename'] = time().'-'.$string.'.'.$image->getClientOriginalExtension();
        $destinationPath = public_path('uploads/thumb');
        $img = Image::make($image->getRealPath());

        $img->resize(50, 50, function ($constraint) {
            $constraint->aspectRatio();
        })->save($destinationPath.'/'.$input['imagename']);

        $destinationPath = public_path('uploads');
            $image->move($destinationPath, $input['imagename']);

        $datetime = new DateTime(); 
        $time = $datetime->format('Y:m:d');

        SelfTaken::create(['image'=>$input['imagename'],
        					'name'=>$request->name,
        					'time'=>$time
        				]);

		return redirect()->route(config('quickadmin.route').'.selftaken.index');
	}

	/**
	 * Show the form for editing the specified selftaken.
	 *
	 * @param  int  $id
     * @return \Illuminate\View\View
	 */
	public function edit($id)
	{
		$selftaken = SelfTaken::find($id);
	    
	    
		return view('admin.selftaken.edit', compact('selftaken'));
	}

	/**
	 * Update the specified selftaken in storage.
     * @param UpdateSelfTakenRequest|Request $request
     *
	 * @param  int  $id
	 */
	public function update($id, UpdateSelfTakenRequest $request)
	{
		$selftaken = SelfTaken::findOrFail($id);

        $request = $this->saveFiles($request);

		$selftaken->update($request->all());

		return redirect()->route(config('quickadmin.route').'.selftaken.index');
	}

	/**
	 * Remove the specified selftaken from storage.
	 *
	 * @param  int  $id
	 */
	public function destroy($id)
	{
		SelfTaken::destroy($id);

		return redirect()->route(config('quickadmin.route').'.selftaken.index');
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
            SelfTaken::destroy($toDelete);
        } else {
            SelfTaken::whereNotNull('id')->delete();
        }

        return redirect()->route(config('quickadmin.route').'.selftaken.index');
    }

}
