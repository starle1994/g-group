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
use App\Blogs;
use App\FeatureEvent;
use App\CastFeature;
use App\SelfTaken;

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
		$gigoloRankingStaff 	= GigoloRankingStaff::orderBy('ranking_id','asc')->get();
		$gigoloPageContents 	= GigoloPageContents::all();
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
		$events = FeatureEvent::orderBy('id','desc')->paginate(20);
		return view('event',compact('events'));
	}

	public function showEventDetail($alias)
	{
		$event = FeatureEvent::where('alias',$alias)->with('schedule')->with('eventsfeature')->first();
		return view('event_detail',compact('event'));
	}

	public function showDialog()
	{
		return view('dialogue');
	}

	public function showCastFeature()
	{
		$cast_feature = CastFeature::orderBy('id','desc')->paginate(20);
		return view('cast_feature',compact('cast_feature'));
	}

	public function showDetailCastFeature($alias)
	{
		$cast_feature = CastFeature::where('alias',$alias)->first();
		return view('cash-feature-item',compact('cast_feature'));
	}

	public function showMovie()
	{
		return view('movie');
	}

	public function showRookie()
	{
		$rookie_feature = RookieFeature::orderBy('id','desc')->paginate(20);
		return view('rookie-feature',compact('rookie_feature'));
	}

	public function showRookieDetail($alias)
	{
		$rookie_feature = RookieFeature::where('alias',$alias)->first();

		return view('rookie-feature-item',compact('rookie_feature'));
	}

	public function showBlog()
	{
		$blogs = Blogs::orderBy('id','desc')->paginate(20);
		return view('blog', compact('blogs'));
	}
	
	public function showBlogDetail($alias)
	{
		$blog = Blogs::where('alias',$alias)->with('shopslist')->first();
		return view('blog_detail',compact('blog'));
	}

	public function showSelfFeature()
	{
		$self_taken = SelfTaken::orderBy('id','desc')->paginate(20);
		return view('self_taken',compact('self_taken'));
	}

	public function showWorkFeature()
	{
		return view('office_work_freature');
	}

	public function showWorkFeatureDetail($alias)
	{
		return view('office_work_freature');
	}

	public function showCoupon()
	{
		return view('coupon');
	}
}