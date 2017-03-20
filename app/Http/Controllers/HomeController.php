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
use App\BestRanking;

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
		$best_ranking 			= BestRanking::orderBy('ranking_id','asc')->with('godstaffs')->limit(5)->get();
		$group_ranking 	= RankingAll::orderBy('ranking_id','asc')->where('grouprankingtype_id',1)->with('godstaffs')->limit(10)->get();
		$group_ranking_type2 	= RankingAll::orderBy('ranking_id','asc')->where('grouprankingtype_id',2)->with('godstaffs')->limit(10)->get();
		return view('group_ranking',compact('best_ranking','group_ranking','group_ranking_type2'));
	}

	public function showMillionGod()
	{
		return view('million_god');
	}

	public function showGigoro()
	{
		return view('million_god');
	}

	public function showSystem()
	{
		return view('system');
	}

	public function staffDetail($id)
	{
		$id = base64_decode($id);
		$staff = GodStaffs::where('id',$id)->get();
		return view('staff_detail','staff');
	}
}