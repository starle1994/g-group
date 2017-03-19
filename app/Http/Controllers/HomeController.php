<?php

namespace App\Http\Controllers;

use App\Categories;
use App\CategoryLeft;
use App\CategoryRight;
use App\GroupTopPageConten;
use App\MillionGodRankingStaff;
use App\GigoloRankingStaff;
use App\SecrectContents;
use App\RookieFeature;
use App\RankingAll;

class HomeController extends Controller
{

	public function index()
	{
		
		$contents				= GroupTopPageConten::all();
		$million_ranking_staff 	= MillionGodRankingStaff::limit(3)->orderBy('ranking_id','asc')->get();
		$gigolo_ranking_staff 	= GigoloRankingStaff::limit(3)->orderBy('ranking_id','asc')->get();	
		$secrect_contents 		= SecrectContents::all();
		$rookies_feature 		= RookieFeature::all();
		 return view('welcome', compact('contents','million_ranking_staff', 'gigolo_ranking_staff','secrect_contents','rookies_feature'));
	}

	public function showSchedule($year = '', $month = '')
	{
		return view('schedule',compact('year','month'));																		
	}

	public function postSchedule()
	{
		if(isset($_GET['func']) && !empty($_GET['func'])){
			switch($_GET['func']){
				case 'getCalender':
					$year = $_GET['year'];
					$month = $_GET['month'];
				
					return view('schedule',compact('year','month'));	
					break;
			}
		}																		
	}

	public function showShopList()
	{
		return view('shop_list');
	}

	public function showGroupRanking()
	{
		$group_ranking = RankingAll::orderBy('ranking_id','asc')->with('godstaffs')->get();
		return view('group_ranking',compact('group_ranking'));
	}
}