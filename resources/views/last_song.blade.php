@extends('layouts.master')

@section('content')
<div class="row group-god">
    <div class="col-sm-3 left">
        
        @include('include.categories_left2')
        
    </div>

    <div class="col-sm-9 right">
        <div class="title">
            <img src="{{ asset('css/css/images/movie/h1.jpg')}}" alt="">
        </div>
        
        <div class="content">
            <div class="row">
               <script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>

<div id="container" style="min-width: 310px; max-width: 800px; height: 400px; margin: 0 auto"></div>

                
            </div>
            
        </div>

    </div>
   
</div>
<?php 
  $arrName = array();
  $arrRating = array();
  foreach ($rating as $song) {
    array_push($arrName,$song->name);
    array_push($arrRating, $song->raiting);
  }
  ?>
<script type="text/javascript">
    var arrName = <?php echo json_encode($arrName); ?>;
    var arrRating = <?php echo json_encode($arrRating); ?>;
    var month = <?php echo  ($rating->isEmpty() == false) ? $rating[0]->month : ''; ?>;
    Highcharts.chart('container', {
    chart: {
        type: 'bar'
    },
    title: {
        text: 'LAST SONG'
    },
    xAxis: {
        categories: arrName,
        title: {
            text: null
        }
    },
    yAxis: {
        min: 0,
        max: 31,
        title: {
            text: 'Number (times)',
            align: 'high'
        },
        labels: {
            overflow: 'justify'
        }
    },
    tooltip: {
        valueSuffix: ' times'
    },
    plotOptions: {
        bar: {
            dataLabels: {
                enabled: true
            }
        }
    },
    legend: {
        layout: 'vertical',
        align: 'right',
        verticalAlign: 'top',
        x: -40,
        y: 80,
        floating: true,
        borderWidth: 1,
        backgroundColor: ((Highcharts.theme && Highcharts.theme.legendBackgroundColor) || '#FFFFFF'),
        shadow: true
    },
    credits: {
        enabled: false
    },
    series: [{
        name: month,
        data: arrRating
    }]
});
</script>
@endsection