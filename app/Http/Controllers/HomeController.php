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
use App\GodStaffs;
use App\LogGroupRanking;
use App\ShopsList;
use App\GodPageContent;
use App\GigoloPageContents;

class HomeController extends Controller
{

	public function index()
	{	
		$contents				= GroupTopPageConten::all();
		$million_ranking_staff 	= MillionGodRankingStaff::limit(3)->orderBy('ranking_id','asc')->get();
		$gigolo_ranking_staff 	= GigoloRankingStaff::limit(3)->orderBy('ranking_id','asc')->get();	
		$secrect_contents 		= SecrectContents::all();
		$rookies_feature 		= RookieFeature::all();
		$shop_list 				= ShopsList::all();
		 return view('welcome', compact('contents','million_ranking_staff', 'gigolo_ranking_staff','secrect_contents','rookies_feature','shop_list'));
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
		$shop_list 				= ShopsList::all();
		return view('shop_list',compact('shop_list'));
	}

	public function showGroupRanking()
	{
		$best_ranking 			= BestRanking::orderBy('ranking_id','asc')->with('godstaffs')->limit(5)->get();
		$group_ranking 			= RankingAll::orderBy('ranking_id','asc')->where('grouprankingtype_id',1)->with('godstaffs')->limit(10)->get();
		$group_ranking_type2 	= RankingAll::orderBy('ranking_id','asc')->where('grouprankingtype_id',2)->with('godstaffs')->limit(10)->get();
		return view('group_ranking',compact('best_ranking','group_ranking','group_ranking_type2'));
	}

	public function showMillionGod()
	{
		
$millionGodRankingStaff = MillionGodRankingStaff::orderBy('ranking_id','asc')->get();
		$godPageContent = GodPageContent::all();
		$secrect_contents 		= SecrectContents::all();
		$rookies_feature 		= RookieFeature::all();
		$shop_list 				= ShopsList::all();
		return view('million_god',compact('millionGodRankingStaff','godPageContent','secrect_contents','rookies_feature','shop_list'));
	}

	public function showGigoro()
	{
		$gigoloRankingStaff = GigoloRankingStaff::orderBy('ranking_id','asc')->get();
		$gigoloPageContents = GigoloPageContents::all();
		$secrect_contents 		= SecrectContents::all();
		$rookies_feature 		= RookieFeature::all();
		$shop_list 				= ShopsList::all();
		return view('gigolo',compact('gigoloRankingStaff','gigoloPageContents','secrect_contents','rookies_feature','shop_list'));
		return view('gigolo');
	}

	public function showSystem()
	{
		return view('system');
	}

	public function staffDetail($id)
	{
		$id = base64_decode($id);
		$staff = GodStaffs::where('id',$id)->with('staffphotos')->first();
		$logs = LogGroupRanking::where('id_staff', $staff->id)->get();
		return view('staff_detail',compact('staff','logs'));
	}

	public function rankingMillionStaff()
	{
		$group_ranking 	= RankingAll::orderBy('ranking_id','asc')->where('grouprankingtype_id',1)->with('godstaffs')->limit(10)->get();
		$million_god_staff = GodStaffs::where('shopslist_id',1)->get();

		return view('million_ranking_staff', compact('group_ranking','million_god_staff'));
	}

	public function showEvent()
	{
		return view('event');
	}

	public function showDialog()
	{
		return view('dialogue');
	}

	public function showCastFeature()
	{
		return view('cast_feature');
	}

	public function showDetailCastFeature()
	{
		return view('cash-feature-item');
	}

	public function showMovie()
	{
		return view('movie');
	}

	public function showRookie()
	{
		return view('movie');
	}

	public function showBlog()
	{
		return 'coming soon';
	}
	
}