<?php
/*
 * Function requested by Ajax
 */
function array_event()
{
	return	array('1' => 'Birthday', '2' => 'Event','3'=>'Holiday');
}

function pages()
{
	return	array('1' => 'Group top', '2' => 'Millon God','3'=>'Gigolo');
}
function position()
{
	$position = ['1'=>'スタッフ','2'=>'SPECIAL PERSON'];
	return $position;
}
function alias()
{
	$alias[''] = '---Please select----';
	$alias['million-god'] = 'Million-god';
	$alias['gigoro'] = 'Gigolo';
	$alias['million-ranking-staff']='スタッフ・ナンバー	';
	$alias['gigolo-ranking-staff']='Gigiloスタッフ・ナンバー';
	$alias['event']='イベント特集';
	$alias['dialogue']='対談';
	$alias['self-taken']='自撮り';
	$alias['Blog']='ブログ	';
	$alias['movie']='ムービ';
	$alias['schedule']='スケジュール';
	$alias['group-ranking']='group-ranking';
	$alias['cast-feature']='キャスト特集';
	$alias['rookie-feature']='新人特集';
	$alias['office-work-feature']				='内勤特集';
	$alias['self-taken']='自撮り';
	$alias['photo-list']='フォトリスト';
	$alias['system']='system';
	$alias['coupon']='割引・クーポン';
	$alias['recruit']='recruit';
	$alias['restaurant']="飲食店×G's group";
	$alias['sport']="名所×G's group";
	$alias['fashion']='ファッション';
	$alias['holiday']='ホストの休日';
	$alias['gravure']='グラビア';
	$alias['last-song']='月間人気ラスソン';
	$alias['link']='link';
	$alias['shop-list']='ショップリスト';
	return $alias;
}
/*
 * Get months options list.
 */
function getAllMonths($selected = ''){
	$options = '';
	for($i=1;$i<=12;$i++)
	{
		$value = ($i < 10)?'0'.$i:$i;
		$selectedOpt = ($value == $selected)?'selected':'';
		$options .= '<option value="'.$value.'" '.$selectedOpt.' >'.date("F", mktime(0, 0, 0, $i+1, 0, 0)).'</option>';
	}
	return $options;
}

function categories()
{
	return App\Categories::all();
}

function categories_2()
{
	return App\LeftCateVer2::all();
}

function categories_left()
{
	return App\CategoryLeft::all();
}

 function categories_right()
{
	return App\CategoryRight::all();
}
/*
 * Get years options list.
 */
function getYearList($selected = ''){
	$options = '';
	for($i=2015;$i<=2025;$i++)
	{
		$selectedOpt = ($i == $selected)?'selected':'';
		$options .= '<option value="'.$i.'" '.$selectedOpt.' >'.$i.'</option>';
	}
	return $options;
}

/*
 * Get events by date
 */
function getEvents($date = ''){
	//Include db configuration file
	include 'dbConfig.php';
	$eventListHTML = '';
	$date = $date?$date:date("Y-m-d");
	//Get events based on the current date
	$result = $db->query("SELECT title FROM events WHERE date = '".$date."' AND status = 1");
	if($result->num_rows > 0){
		$eventListHTML = '<h2>Events on '.date("l, d M Y",strtotime($date)).'</h2>';
		$eventListHTML .= '<ul>';
		while($row = $result->fetch_assoc()){ 
            $eventListHTML .= '<li>'.$row['title'].'</li>';
        }
		$eventListHTML .= '</ul>';
	}
	echo $eventListHTML;
}
?>