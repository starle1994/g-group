<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Redirect;
use Schema;
use App\Blogs;
use App\Http\Requests\CreateBlogsRequest;
use App\Http\Requests\UpdateBlogsRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Traits\FileUploadTrait;
use App\ShopsList;


class BlogsController extends Controller {

	/**
	 * Display a listing of blogs
	 *
     * @param Request $request
     *
     * @return \Illuminate\View\View
	 */
	public function index(Request $request)
    {
        $blogs = Blogs::with("shopslist")->get();

		return view('admin.blogs.index', compact('blogs'));
	}

	/**
	 * Show the form for creating a new blogs
	 *
     * @return \Illuminate\View\View
	 */
	public function create()
	{
	    $shopslist = ShopsList::pluck("name", "id")->prepend('Please select', null);

	    
	    return view('admin.blogs.create', compact("shopslist"));
	}

	public function uploadAvatarAgent($file,$content)
	{
	//Check request Avata
		$explode[1] = null;
		$explode = explode('.', $file->getClientOriginalName());
		$arr_ext = array('jpg', 'jpeg', 'png', 'PNG', 'JPG');
		$result['status'] = 0; 
		if(!empty($explode) && in_array($explode[1], $arr_ext)) {
		list($type, $content) = explode(';', $content);
		list(, $data) = explode(',', $content);
		$data = base64_decode($data);
		$setNewFileName = time() . "_" . rand(000000, 999999).'.'.$explode[1];
		$fileUrl = public_path() . '/uploads/' . $setNewFileName;
		file_put_contents($fileUrl, $data);
		$result['status'] = 1;
		$result['url'] = $setNewFileName; 
		} else{
		$result['status'] = 0;
		$result['url'] = '';
		}
		return $result;
	}
	/**
	 * Store a newly created blogs in storage.
	 *
     * @param CreateBlogsRequest|Request $request
	 */
	public function store(CreateBlogsRequest $request)
	{
		$blogs = Blogs::orderBy('id','desc')->first();
	    $request = $this->saveFiles($request);
	    $input = $request->all();
	    if ($blogs == null) {
	    	$number = 1;
	    }else{
	    	$alias = explode('-',$blogs->alias);
	    	if(isset($alias[2])){
	    		$number = $alias[2]+1;
	    	}else{
	    		$number =1;
	    	}
	    }
	    
	    $input['alias'] = 'list-blog-'.$number;
	    if ($request->image_1 != null) {
	    	$data = $this->uploadAvatarAgent($request->image_1, $request['image-data']);
	    	$input['image_1']= $data['url'];
	    }
	
		Blogs::create($input);

		return redirect()->route(config('quickadmin.route').'.blogs.index');
	}

	/**
	 * Show the form for editing the specified blogs.
	 *
	 * @param  int  $id
     * @return \Illuminate\View\View
	 */
	public function edit($id)
	{
		$blogs = Blogs::find($id);
	    $shopslist = ShopsList::pluck("name", "id")->prepend('Please select', null);
		return view('admin.blogs.edit', compact('blogs', "shopslist"));
	}

	/**
	 * Update the specified blogs in storage.
     * @param UpdateBlogsRequest|Request $request
     *
	 * @param  int  $id
	 */
	public function update($id, UpdateBlogsRequest $request)
	{
		$blogs = Blogs::findOrFail($id);

        $request = $this->saveFiles($request);

		$blogs->update($request->all());

		return redirect()->route(config('quickadmin.route').'.blogs.index');
	}

	/**
	 * Remove the specified blogs from storage.
	 *
	 * @param  int  $id
	 */
	public function destroy($id)
	{
		Blogs::destroy($id);

		return redirect()->route(config('quickadmin.route').'.blogs.index');
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
            Blogs::destroy($toDelete);
        } else {
            Blogs::whereNotNull('id')->delete();
        }

        return redirect()->route(config('quickadmin.route').'.blogs.index');
    }

}
