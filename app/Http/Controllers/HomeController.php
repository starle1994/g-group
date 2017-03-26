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
use App\Dialogue;
use App\Movies;
use App\Coupon;
use App\Restaurant;
use App\ImageRestaurant;
use App\System;
use App\RecomentCate;

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
		$recoments 				= RecomentCate::where('shopslist_id',1)->get();
		return view('million_god',compact('millionGodRankingStaff','godPageContent','secrect_contents','rookies_feature','shop_list','recoments'));
	}

	public function showGigoro()
	{
		$gigoloRankingStaff 	= GigoloRankingStaff::orderBy('ranking_id','asc')->get();
		$gigoloPageContents 	= GigoloPageContents::all();
		$secrect_contents 		= SecrectContents::all();
		$rookies_feature 		= RookieFeature::all();
		$shop_list 				= ShopsList::all();
		$recoments 				= RecomentCate::where('shopslist_id',2)->get();
		return view('gigolo',compact('gigoloRankingStaff','gigoloPageContents','secrect_contents','rookies_feature','shop_list','recoments'));
		return view('gigolo');
	}

	public function showSystem()
	{
		$system = System::first();
		return view('system',compact('system'));
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
		$event = FeatureEvent::where('alias',$alias)->with('schedule')->with('eventsfeatureimage')->first();

		return view('event_detail',compact('event'));
	}

	public function showDialog()
	{
	    $dialogs=Dialogue::orderBy('id','desc')->paginate(20);
		return view('dialogue', compact('dialogs'));
	}
    public function showDialogDetail($alias)
    {
        $dialog = Dialogue::where('alias',$alias)->first();
        return view('dialogue_detail',compact('dialog'));
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
		$movies = Movies::orderBy('id','desc')->paginate(20);
		return view('movie',compact('movies'));
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
		$self_taken = SelfTaken::orderBy('time','desc')->paginate(20);
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
        $coupons=Coupon::orderBy('id','desc')->paginate(20);
		return view('coupon-list', compact('coupons'));
	}

	public function showGroupGod()
    {
        $groupgods = Restaurant::where('cate_id',5)->get();
        return view('gravute-list', compact('groupgods'));
    }

    public function showRecruit()
    {
    	return view('recruit');
    }

    public function showGravuteDetail($alias)
    {
        $restaurant= Restaurant::where('alias',$alias)->first();
        $imagerestaurant = ImageRestaurant::where('restaurant_id', $restaurant->id)->get();
        return view('gravute_detail', compact('imagerestaurant','restaurant'));
    }

     public function showRestaurant()
    {
        $restaurants = Restaurant::where('cate_id',1)->get();
        return view('restaurant', compact('restaurants'));
    }

    public function showRestaurantDetail($alias)
    {
        $restaurant= Restaurant::where('alias',$alias)->first();
        $imagerestaurant = ImageRestaurant::where('restaurant_id', $restaurant->id)->get();
        return view('restaurant_detail', compact('imagerestaurant','restaurant'));
    }

    public function showSport()
    {
        $sports = Restaurant::where('cate_id',2)->get();
        return view('sport', compact('sports'));
    }

    public function showSportDetail($alias)
    {
        $sport= Restaurant::where('alias',$alias)->first();
        $imagerestaurant = ImageRestaurant::where('restaurant_id', $sport->id)->get();
        return view('sport_detail', compact('imagerestaurant','sport'));
    }

     public function showFashion()
    {
        $fashions = Restaurant::where('cate_id',2)->get();
        return view('fashion', compact('fashions'));
    }

    public function showFashionDetail($alias)
    {
        $fashion= Restaurant::where('alias',$alias)->first();
        $imagerestaurant = ImageRestaurant::where('restaurant_id', $fashion->id)->get();
        return view('fashion_detail', compact('imagerestaurant','fashion'));
    }


 	public function showHolyday()
    {
        $holydays = Restaurant::where('cate_id',2)->get();
        return view('holyday', compact('holydays'));
    }

    public function showHolydayDetail($alias)
    {
        $holyday= Restaurant::where('alias',$alias)->first();
        $imagerestaurant = ImageRestaurant::where('restaurant_id', $holyday->id)->get();
        return view('holyday_detail', compact('imagerestaurant','holyday'));
    }

    public function showmillionGodSystem()
    {
    	$system = System::first();
    	return view('millon_god_system',compact('system'));
    }

    public function showGigiloGodSystem()
    {
    	$system = System::first();
    	return view('gigolo_system',compact('system'));
    }
}