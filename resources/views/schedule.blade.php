 @extends('layouts.master')

@section('content')
<?php $dateYear = ($year != '')?$year:date("Y");
	$dateMonth = ($month != '')?$month:date("m");
	$date = $dateYear.'-'.$dateMonth.'-01';
	$currentMonthFirstDay = date("N",strtotime($date));
	$totalDaysOfMonth = cal_days_in_month(CAL_GREGORIAN,$dateMonth,$dateYear);
	$totalDaysOfMonthDisplay = ($currentMonthFirstDay == 7)?($totalDaysOfMonth):($totalDaysOfMonth + $currentMonthFirstDay);
	$boxDisplay = ($totalDaysOfMonthDisplay <= 35)?35:42; ?>
{!! Form::open(array('route' =>'post.schedule', 'id' => 'form-with-validation', 'class' => 'form-horizontal')) !!}
 <div class="row schedule">
    <div class="col-xs-12 home-left">
      <div class="schedu">
          <div class="scheTitle" style="padding: 30px">
              
          </div>
      </div>
      <div class="contentSche" >
          <div class="month">
          	
                <a href="javascript:void(0);" onclick="getCalendar('calendar_div','<?php echo date("Y",strtotime($date.' - 1 Month')); ?>','<?php echo date("m",strtotime($date.' - 1 Month')); ?>');">
                  <span name="month_dropdown" class="month_dropdown mon1" >◁{{ date("Y",strtotime($date.' - 1 Month')) }}年{{date("m",strtotime($date.' - 1 Month'))}}月</span></a>

                  
                  <span class="mon2">{{ $dateMonth }}月</span>
                  
                  <a href="javascript:void(0);" onclick="getCalendar('calendar_div','<?php echo date("Y",strtotime($date.' + 1 Month')); ?>','<?php echo date("m",strtotime($date.' + 1 Month')); ?>');"><span class="mon1">{{ date("Y",strtotime($date.' + 1 Month')) }}年{{date("m",strtotime($date.' + 1 Month'))}}月▷</span></a>
              </div>
          <table class="table table-bordered tbSche">
              <thead>
                <tr>
                  <th class="sunText">SUN</th>
                  <th>MON</th>
                  <th>TUE</th>
                  <th>WEB</th>
                  <th>THU</th>
                  <th>FRI</th>
                  <th>SAT</th>
                </tr>
              </thead>
              <tbody>
              <?php 
						             $calendar = '';
										if($month == '' || $year == '') {
											$month = date('m');
											$year = date('Y');
										}
										$date = mktime(12, 0, 0, $month, 1, $year);
										$daysInMonth = date("t", $date);
                    
										$offset = date("w", $date);
										$rows = 1;
										$prev_month = $month - 1;
										$prev_year = $year;
										if ($month == 1) {
											$prev_month = 12;
											$prev_year = $year-1;
										}

										$next_month = $month + 1;
										$next_year = $year;
										if ($month == 12) {
											$next_month = 1;
											$next_year = $year + 1;
										}
                    
										echo "<tr>";
										for($i = 1; $i <= $offset; $i++) {
											echo "<td></td>";
										}
										for($day = 1; $day <= $daysInMonth; $day++) {
                      $date = $year.'-'.$month.'-'.$day;

                    $events = \App\Schedule::whereDate('start_time','<=',$date)->where('end_time','>=',$date)->get();
                    $class = [];
                    
                    if ($events->isEmpty() != true) {
                        foreach ($events as $event) {
                            if ($event->event_type ==1) {
                              $class[$event->id] = './css/css/images/schedule/contai.png';
                            }else{
                              if ($event->event_type ==2) {
                                $class[$event->id] = './css/css/images/schedule/music.png';
                              }else{
                                $class[$event->id] = './css/css/images/schedule/char.png';
                              }
                            }
                        } 
                      }
											if( ($day + $offset - 1) % 7 == 0 && $day != 1) {
												echo "</tr><tr>";
												$rows++;
											}

											if ($day == date("d") && $dateMonth == date('m')){
												echo "<td class ='light_sky' style='width:14%'>" . $day ."<br>";
                        foreach ($events as $event) {
                          echo "<img class='imgCol' src='".$class[$event->id]."'>";
                        }
                        echo "</td>";
											}else{
												echo "<td style='width:14%'>" . $day."<br>" ;
                        foreach ($events as $event) {
                          echo "<img class='imgCol' src='".$class[$event->id]."'>";
                        }
                        echo "</td>";
											}
									 		
										}
										while( ($day + $offset) <= $rows * 7)
										{
											echo "<td></td>";
											$day++;
										}
										echo "</tr>";

						            ?>
						            
                                    </tbody>
                              </table>
                                <div class="scheBox">
                                    <span>
                                        <img src="{{asset('css/css/images/schedule/contai.png')}}" alt="">
                                        Birthday
                                    </span>
                                    <span>
                                        <img src="{{asset('css/css/images/schedule/music.png')}}" alt="">
                                        イベント
                                    </span>
                                    <span>
                                        <img src="{{asset('css/css/images/schedule/char.png')}}" alt="">
                                        休業日
                                    </span>
                                </div>

                                <div class="colSche">
                                    <div class="titCol" >
                                        <h3>{{$dateYear}}年{{ $dateMonth }}月のスケジュール詳細</h3>
                                        <span class="bgTit" style="padding: 30px 100px;"></span>
                                    </div>
                                    <table class="table table-bordered colTab">
                                        <tbody>
                                          <?php 
                                       
                                              for($day = 1; $day <= $daysInMonth; $day++) {
                                              $date = $year.'-'.$month.'-'.$day;
                                              $dt = new Carbon\Carbon($date );
                                              $isWeekDay = $dt->isWeekend();
                                              $events = \App\Schedule::whereDate('start_time','<=',$date)->where('end_time','>=',$date)->get();
                                            
                                              $class = [];
                                           
                                            if ($events->isEmpty() != true) {
                                              foreach ($events as $event) {
                                                  if ($event->event_type ==1) {
                                                    $class[$event->id] = './css/css/images/schedule/contai.png';
                                                  }else{
                                                    if ($event->event_type ==2) {
                                                      $class[$event->id] = './css/css/images/schedule/music.png';
                                                    }else{
                                                      $class[$event->id] = './css/css/images/schedule/char.png';
                                                    }
                                                  }
                                                 
                                              }
                                                
                                            }
                                          
                                              if( ($day + $offset - 1) % 7 == 0 && $day != 1) {
                                                echo "</tr><tr>";
                                                $rows++;
                                              }
                                              if ($events->isEmpty() != true){
                                                echo "<tr>";
                                                if($isWeekDay == true)
                                                  echo "<td class='red'>".$day."日</td>";
                                                else
                                                   echo "<td >".$day."日</td>";
                                                echo "<td>";
                                                foreach ($events as $event) {
                                                  echo "<img class='imgCol' src='".$class[$event->id]."'>";
                                                  echo  $event['description'];
                                                  echo "</br>";
                                                }
                                                
                                                echo "</td>";
                                                echo "</tr>";
                                              }else{
                                                echo "<tr>";
                                                if($isWeekDay == true)
                                                  echo "<td class='red'>".$day."日</td>";
                                                else
                                                   echo "<td >".$day."日</td>";
                                                echo "<td>";
                                                
                                                echo "</td>";
                                                echo "</tr>";
                                              }
                                              
                                            }
                                            $day++;
                                            
                                          ?>
                                         
                                          
                                        </tbody>
                                    </table>
                                    <div class="month">
            
                <a href="javascript:void(0);" onclick="getCalendar('calendar_div','<?php echo date("Y",strtotime($date.' - 1 Month')); ?>','<?php echo date("m",strtotime($date.' - 1 Month')); ?>');">
                  <span name="month_dropdown" class="month_dropdown mon1" >◁{{ date("Y",strtotime($date.' - 1 Month')) }}年{{date("m",strtotime($date.' - 1 Month'))}}月</span></a>

                  
                  
                  
                  <a href="javascript:void(0);" onclick="getCalendar('calendar_div','<?php echo date("Y",strtotime($date.' + 1 Month')); ?>','<?php echo date("m",strtotime($date.' + 1 Month')); ?>');"><span class="mon1">{{ date("Y",strtotime($date.' + 1 Month')) }}年{{date("m",strtotime($date.' + 1 Month'))}}月▷</span></a>
              </div>
                                </div>
                                </div>
                            </div>
                       </div>
                   
 {!! Form::close() !!}
         <script type="text/javascript">
		function getCalendar(target_div,year,month){
			$.ajax({
				type:'GET',
				url:'ajax-schedule',
				data:'func=getCalender&year='+year+'&month='+month,
				success:function(html){
					$('#'+target_div).html(html);
				}
			});
		}
		
		function getEvents(date){
			$.ajax({
				type:'POST',
				url:'post.schedule',
				data:'func=getEvents&date='+date,
				success:function(html){
					$('#event_list').html(html);
					$('#event_list').slideDown('slow');
				}
			});
		}
		
		function addEvent(date){
			$.ajax({
				type:'POST',
				url:'post.schedule',
				data:'func=addEvent&date='+date,
				success:function(html){
					$('#event_list').html(html);
					$('#event_list').slideDown('slow');
				}
			});
		}
		
		$(document).ready(function(){
			$('.date_cell').mouseenter(function(){
				date = $(this).attr('date');
				$(".date_popup_wrap").fadeOut();
				$("#date_popup_"+date).fadeIn();	
			});
			$('.date_cell').mouseleave(function(){
				$(".date_popup_wrap").fadeOut();		
			});
			$('.month_dropdown').on('change',function(){
				getCalendar('calendar_div',$('.year_dropdown').val(),$('.month_dropdown').val());
			});
			$('.year_dropdown').on('change',function(){
				getCalendar('calendar_div',$('.year_dropdown').val(),$('.month_dropdown').val());
			});
			$(document).click(function(){
				$('#event_list').slideUp('slow');
			});
		});
	</script>

@endsection
