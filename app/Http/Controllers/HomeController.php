<?php

namespace App\Http\Controllers;

use App\Categories;
use App\CategoryLeft;
use App\CategoryRight;
use App\GroupTopPageConten;
class HomeController extends Controller
{

	public function index()
	{
		$categories = Categories::all();
		$categories_left = CategoryLeft::all();
		$categories_right = CategoryRight::all();
		$contents			= GroupTopPageConten::all();
		 return view('welcome', compact('categories','categories_left','categories_right','contents'));
	}
}