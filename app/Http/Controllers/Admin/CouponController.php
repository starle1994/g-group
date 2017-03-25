<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Redirect;
use Schema;
use App\Coupon;
use App\Http\Requests\CreateCouponRequest;
use App\Http\Requests\UpdateCouponRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Traits\FileUploadTrait;


class CouponController extends Controller {

	/**
	 * Display a listing of coupon
	 *
     * @param Request $request
     *
     * @return \Illuminate\View\View
	 */
	public function index(Request $request)
    {
        $coupon = Coupon::all();

		return view('admin.coupon.index', compact('coupon'));
	}

	/**
	 * Show the form for creating a new coupon
	 *
     * @return \Illuminate\View\View
	 */
	public function create()
	{
	    
	    
	    return view('admin.coupon.create');
	}

	/**
	 * Store a newly created coupon in storage.
	 *
     * @param CreateCouponRequest|Request $request
	 */
	public function store(CreateCouponRequest $request)
	{
	    $request = $this->saveFiles($request);
		Coupon::create($request->all());

		return redirect()->route(config('quickadmin.route').'.coupon.index');
	}

	/**
	 * Show the form for editing the specified coupon.
	 *
	 * @param  int  $id
     * @return \Illuminate\View\View
	 */
	public function edit($id)
	{
		$coupon = Coupon::find($id);
	    
	    
		return view('admin.coupon.edit', compact('coupon'));
	}

	/**
	 * Update the specified coupon in storage.
     * @param UpdateCouponRequest|Request $request
     *
	 * @param  int  $id
	 */
	public function update($id, UpdateCouponRequest $request)
	{
		$coupon = Coupon::findOrFail($id);

        $request = $this->saveFiles($request);

		$coupon->update($request->all());

		return redirect()->route(config('quickadmin.route').'.coupon.index');
	}

	/**
	 * Remove the specified coupon from storage.
	 *
	 * @param  int  $id
	 */
	public function destroy($id)
	{
		Coupon::destroy($id);

		return redirect()->route(config('quickadmin.route').'.coupon.index');
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
            Coupon::destroy($toDelete);
        } else {
            Coupon::whereNotNull('id')->delete();
        }

        return redirect()->route(config('quickadmin.route').'.coupon.index');
    }

}
