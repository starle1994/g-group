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
use App\DialogueTopic;
use App\Movies;
use App\Coupon;
use App\Restaurant;
use App\ImageRestaurant;
use App\System;
use App\RecomentCate;
use App\Link;
use App\Banner;
use App\OfficeWorkFeature;
use App\PhotoList;
use App\SongRating;
use App\LastSongVerTwo;
use App\Ranking;
use App\Schedule;
use App\ImagesEventFeature;
	
class HomeController extends Controller
{

	public function index()
	{	
		$contents				= GroupTopPageConten::all();
		$million_ranking_staff 	= MillionGodRankingStaff::limit(3)->orderBy('ranking_id','asc')->get();
		$gigolo_ranking_staff 	= GigoloRankingStaff::limit(3)->orderBy('ranking_id','asc')->get();	
		$secrect_contents 		= SecrectContents::all();
		$rookies_feature 		= RookieFeature::all();
		$shop_list 				= ShopsList::where('is_active',1)->get();
		$banner					= Banner::where('page','1')->first();
		$blogs 					= Blogs::take(10)->select('name','image_1','image','created_at','alias')->orderBy('created_at','desc')->get();
		$blogs1					= Blogs::where('shopslist_id','1')->select('name','image_1','image','created_at','alias')->orderBy('created_at','desc')->take(10)->get();
		$blogs2					= Blogs::where('shopslist_id','2')->select('name','image_1','image','created_at','alias')->orderBy('created_at','desc')->take(10)->get();
		 return view('welcome', compact('contents','million_ranking_staff', 'gigolo_ranking_staff','secrect_contents','rookies_feature','shop_list','banner','blogs','blogs1','blogs2'));

	}

	public function showSchedule($year = '', $month = '')
	{
		$banner					= Banner::where('page','1')->first();
		return view('schedule',compact('year','month','banner'));																		
	}

	public function postSchedule()
	{
		if(isset($_GET['func']) && !empty($_GET['func'])){
			switch($_GET['func']){
				case 'getCalender':
					$year = $_GET['year'];
					$month = $_GET['month'];
					$banner					= Banner::where('page','1')->first();
					return view('schedule',compact('year','month','banner'));	
					break;
			}
		}																		
	}

	public function showShopList()
	{
		$banner					= Banner::where('page','1')->first();
		$shop_list 				= ShopsList::where('is_active',1)->get();
		return view('shop_list',compact('shop_list','banner'));
	}

	public function showGroupRanking()
	{
		$best_rankings 			= BestRanking::orderBy('ranking_id','asc')->with('godstaffs')->limit(5)->get();
		$ranking = Ranking::take(5)->get();
		foreach ($ranking as  $ran) {
			$best_ranking[$ran->number] = [];
		}
		foreach ($ranking as $value_ran) {
			foreach ($best_rankings as $value) {
					if ($value_ran->number == $value->ranking_id) {
						$best_ranking[$value_ran->number] = $value;
					}
				}
		}
		$group_ranking 			= RankingAll::orderBy('ranking_id','asc')->where('grouprankingtype_id',1)->with('godstaffs')->limit(10)->get();
		
		$group_ranking_type2 	= RankingAll::orderBy('ranking_id','asc')->where('grouprankingtype_id',2)->with('godstaffs')->limit(10)->get();
		$banner					= Banner::where('page','1')->first();
		return view('group_ranking',compact('best_ranking','group_ranking','group_ranking_type2','banner'));
	}

	public function showMillionGod()
	{
		$schedules 			= Schedule::take(20)->orderBy('start_time','desc')->where('shopslist_id','1')->get();
		$blogs				= Blogs::where('shopslist_id','1')
								->select('name','image','created_at','alias')
								->orderBy('created_at','desc')
								->take(10)
								->get();
		$millionGodRankingStaff = MillionGodRankingStaff::orderBy('ranking_id','asc')->get();
		$godPageContent 		= GodPageContent::all();
		$secrect_contents 		= SecrectContents::all();
		$rookies_feature 		= RookieFeature::all();
		$shop_list 				= ShopsList::where('is_active',1)->get();
		$recoments 				= RecomentCate::where('shopslist_id',1)->get();
		$banner					= Banner::where('page','2')->first();
		return view('million_god',compact('millionGodRankingStaff','godPageContent','secrect_contents','rookies_feature','shop_list','recoments','banner','schedules','blogs'));
	}

	public function showGigoro()
	{
		$schedules 				= Schedule::take(20)->orderBy('start_time','desc')->where('shopslist_id','2')->get();
		$blogs					= Blogs::where('shopslist_id','2')
										->select('name','image','created_at','alias')
										->take(10)
										->get();
		$gigoloRankingStaff 	= GigoloRankingStaff::orderBy('ranking_id','asc')->get();
		$gigoloPageContents 	= GigoloPageContents::all();
		$secrect_contents 		= SecrectContents::all();
		$rookies_feature 		= RookieFeature::all();
		$shop_list 				= ShopsList::where('is_active',1)->get();
		$recoments 				= RecomentCate::where('shopslist_id',2)->get();
		$banner					= Banner::where('page','3')->first();
		return view('gigolo',compact('gigoloRankingStaff',
										'gigoloPageContents',
										'secrect_contents',
										'rookies_feature',
										'shop_list',
										'recoments',
										'banner',
										'blogs',
										'schedules'));
	}

	public function showSystem()
	{
		$banner					= Banner::where('page','1')->first();
		$system = System::first();
		return view('system',compact('system','banner'));
	}

	public function staffDetail($id)
	{
		$id = base64_decode($id);
		$staff = GodStaffs::where('id',$id)->with('staffphotos')->first();
		$logs = LogGroupRanking::where('id_staff', $staff->id)->with('ranking')->get();
		$banner					= Banner::where('page','1')->first();
		return view('staff_detail',compact('staff','logs','banner'));
	}

	public function rankingMillionStaff()
	{
		$group_rankings 	= MillionGodRankingStaff::orderBy('ranking_id','asc')->with('godstaffs')->limit(10)->get();
		$ranking = Ranking::all();
		foreach ($ranking as  $ran) {
			$group_ranking[$ran->number] = [];
		}
		foreach ($ranking as $value_ran) {
			foreach ($group_rankings as $value) {
					if ($value_ran->number == $value->ranking_id) {
						$group_ranking[$value_ran->number] = $value;
					}
				}
		}

		$million_god_staff = GodStaffs::where('shopslist_id',1)->get();
		$banner					= Banner::where('page','1')->first();
		return view('million_ranking_staff', compact('group_ranking','million_god_staff','banner'));
	}

	public function rankingGigoloStaff()
	{
		$group_rankings 	= GigoloRankingStaff::orderBy('ranking_id','asc')->with('godstaffs')->limit(10)->get();
		$ranking = Ranking::all();
		foreach ($ranking as  $ran) {
			$group_ranking[$ran->number] = [];
		}
		foreach ($ranking as $value_ran) {
			foreach ($group_rankings as $value) {
					if ($value_ran->number == $value->ranking_id) {
						$group_ranking[$value_ran->number] = $value;
					}
				}
		}

		$million_god_staff = GodStaffs::where('shopslist_id',2)->get();
		$banner					= Banner::where('page','1')->first();
		return view('gigolo_ranking_staff', compact('group_ranking','million_god_staff','banner'));
	}

	public function showEvent()
	{
		$banner					= Banner::where('page','1')->first();
		$events = FeatureEvent::orderBy('id','desc')->paginate(20);
		return view('event',compact('events','banner'));
	}

	public function showEventDetail($alias)
	{
		$event = FeatureEvent::where('alias',$alias)->with('schedule')->first();
		$imgs = ImagesEventFeature::where('eventsfeature_id', $event->id)->get();
		$banner					= Banner::where('page','1')->first();
		return view('event_detail',compact('event','event','banner','imgs'));
	}

	public function showDialog()
	{
		$dialog_topic=DialogueTopic::orderBy('id','desc')->first();
	    $dialogs=Dialogue::orderBy('id','desc')->where('dialogue_topic_id',$dialog_topic->id)->paginate(20);
	    $banner					= Banner::where('page','1')->first();
		return view('dialogue', compact('dialogs','banner','dialog_topic'));
	}
    public function showDialogDetail($alias)
    {
        $dialog = Dialogue::where('alias',$alias)->first();
        $banner					= Banner::where('page','1')->first();
        return view('dialogue_detaril',compact('dialog','banner'));
    }

	public function showCastFeature()
	{
		$cast_feature = CastFeature::orderBy('id','desc')->paginate(20);
		$banner					= Banner::where('page','1')->first();
		return view('cast_feature',compact('cast_feature','banner'));
	}

	public function showDetailCastFeature($alias)
	{
		$cast_feature = CastFeature::where('alias',$alias)->first();
		$banner					= Banner::where('page','1')->first();
		return view('cash-feature-item',compact('cast_feature','banner'));
	}

	public function showMovie()
	{
		$movies = Movies::orderBy('id','desc')->paginate(20);
		$banner					= Banner::where('page','1')->first();
		return view('movie',compact('movies','banner'));
	}

	public function showRookie()
	{
		$rookie_feature = RookieFeature::orderBy('id','desc')->paginate(20);
		$banner					= Banner::where('page','1')->first();
		return view('rookie-feature',compact('rookie_feature','banner'));
	}

	public function showRookieDetail($alias)
	{
		$rookie_feature = RookieFeature::where('alias',$alias)->first();
		$banner					= Banner::where('page','1')->first();
		return view('rookie-feature-item',compact('rookie_feature','banner'));
	}

	public function showBlog()
	{
		$blogs = Blogs::orderBy('id','desc')->paginate(20);
		$banner					= Banner::where('page','1')->first();
		return view('blog', compact('blogs','banner'));
	}
	
	public function showBlogDetail($alias)
	{
		$blog = Blogs::where('alias',$alias)->with('shopslist')->first();
		$banner					= Banner::where('page','1')->first();
		return view('blog_detail',compact('blog','banner'));
	}

	public function showSelfFeature()
	{
		$self_taken = SelfTaken::orderBy('time','desc')->paginate(20);
		$banner					= Banner::where('page','1')->first();
		return view('self_taken',compact('self_taken','banner'));
	}

	public function showWorkFeature()
	{
		$officeWorkFreature = OfficeWorkFeature::orderBy('id','desc')->paginate(20);
		$banner					= Banner::where('page','1')->first();
		return view('office_work_freature',compact('officeWorkFreature','banner'));
	}

	public function showWorkFeatureDetail($alias)
	{
		$officeWorkFreature = OfficeWorkFeature::where('alias',$alias)->first();
		$banner					= Banner::where('page','1')->first();
		return view('office_work_freature_item',compact('officeWorkFreature','banner'));
	}

	

	public function showCoupon()
	{
        $coupons=Coupon::orderBy('id','desc')->paginate(20);
        $banner					= Banner::where('page','1')->first();
		return view('coupon-list', compact('coupons','banner'));
	}

	public function showGroupGod()
    {
        $groupgods = Restaurant::where('cate_id',5)->get();
        $banner					= Banner::where('page','1')->first();
        return view('gravute-list', compact('groupgods','banner'));
    }

    public function showRecruit()
    {
    	$banner					= Banner::where('page','1')->first();
    	$shopslist 		= ShopsList::select('id','apply_method')->where('is_active',1)->get();
    	return view('recruit',compact('banner','shopslist'));
    }

    public function showGravuteDetail($alias)
    {
        $restaurant= Restaurant::where('alias',$alias)->first();
        $imagerestaurant = ImageRestaurant::where('restaurant_id', $restaurant->id)->get();
        $banner					= Banner::where('page','1')->first();
        return view('gravute_detail', compact('imagerestaurant','restaurant','banner'));
    }

     public function showRestaurant()
    {
        $restaurants = Restaurant::where('cate_id',1)->get();
        $banner					= Banner::where('page','1')->first();
        return view('restaurant', compact('restaurants','banner'));
    }

    public function showRestaurantDetail($alias)
    {
        $restaurant= Restaurant::where('alias',$alias)->first();
        $imagerestaurant = ImageRestaurant::where('restaurant_id', $restaurant->id)->get();
        $banner					= Banner::where('page','1')->first();
        return view('restaurant_detail', compact('imagerestaurant','restaurant','banner'));
    }

    public function showSport()
    {

        $sports = Restaurant::where('cate_id',2)->get();
        $banner					= Banner::where('page','1')->first();
        return view('sport', compact('sports','banner'));
    }

    public function showSportDetail($alias)
    {
        $sport= Restaurant::where('alias',$alias)->first();
        $imagerestaurant = ImageRestaurant::where('restaurant_id', $sport->id)->get();
        $banner					= Banner::where('page','1')->first();
        return view('sport_detail', compact('imagerestaurant','sport','banner'));
    }

     public function showFashion()
    {
        $fashions = Restaurant::where('cate_id',3)->get();
        $banner					= Banner::where('page','1')->first();
        return view('fashion', compact('fashions','banner'));
    }

    public function showFashionDetail($alias)
    {
        $fashion= Restaurant::where('alias',$alias)->first();
        $imagerestaurant = ImageRestaurant::where('restaurant_id', $fashion->id)->get();
        $banner					= Banner::where('page','1')->first();
        return view('fashion_detail', compact('imagerestaurant','fashion','banner'));
    }


 	public function showHolyday()
    {
        $holydays = Restaurant::where('cate_id',2)->get();
        $banner					= Banner::where('page','1')->first();
        return view('holyday', compact('holydays','banner'));
    }

    public function showHolydayDetail($alias)
    {
        $holyday= Restaurant::where('alias',$alias)->first();
        $imagerestaurant = ImageRestaurant::where('restaurant_id', $holyday->id)->get();
        $banner					= Banner::where('page','1')->first();
        return view('holyday_detail', compact('imagerestaurant','holyday','banner'));
    }

    public function showmillionGodSystem()
    {
    	$system = System::first();
    	$shopslist 		= ShopsList::where('is_active',1)->where('id',1)->first();
    	$banner					= Banner::where('page','1')->first();
    	
    	return view('millon_god_system',compact('system','banner','shopslist'));
    }

    public function showGigiloGodSystem()
    {
    	$system = System::first();
    	$shopslist 		= ShopsList::where('is_active',1)->where('id',2)->first();
    	$banner					= Banner::where('page','1')->first();
    	return view('gigolo_system',compact('system','banner','shopslist'));
    }

   	public function showLink()
   	{
   		$links = Link::all();
   		$banner					= Banner::where('page','1')->first();
   		return view('link', compact('links','banner'));
   	}

   	public function showPhotolist()
    {
        $fashions = PhotoList::orderBy('time','desc')->paginate(20);
        $banner					= Banner::where('page','1')->first();
        return view('photo_list', compact('fashions','banner'));
    }

    public function showLastSong()
    {
    	$banner					= Banner::where('page','1')->first();
    	$last_song 		= LastSongVerTwo::paginate(10);
    	return view('last_song',compact('banner','last_song'));
    }
}