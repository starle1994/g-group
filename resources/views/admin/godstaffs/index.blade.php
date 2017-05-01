@extends('admin.layouts.master')

@section('content')

<p>{!! link_to_route(config('quickadmin.route').'.godstaffs.create', trans('quickadmin::templates.templates-view_index-add_new') , null, array('class' => 'btn btn-success')) !!}</p>
<br>
<span>{!! link_to_route(config('quickadmin.route').'.godstaffs.index', ' Million GOD（ミリオンゴッド）' , null, array('class' => ($shopslist_id==1) ? 'btn btn-primary' : 'btn btn-success')) !!}</span>
<span>{!! link_to_route(config('quickadmin.route').'.godstaffs.gigolo', ' "Gigolo（"ジゴロ.）' , null, array('class' => ($shopslist_id==2) ? 'btn btn-primary' : 'btn btn-success')) !!}</span>
<span>{!! link_to_route(config('quickadmin.route').'.godstaffs.g5', ' "G5' , null, array('class' => ($shopslist_id==3) ? 'btn btn-primary' : 'btn btn-success')) !!}</span>
<br>
<br>

@if ($godstaffs->count())
    <div class="portlet box green">
        <div class="portlet-title">
            <div class="caption">{{ trans('quickadmin::templates.templates-view_index-list') }}</div>
        </div>
        <div class="portlet-body">
            <table class="table table-striped table-hover table-responsive datatable" id="datatable">
                <thead>
                    <tr>
                        <th>
                            {!! Form::checkbox('delete_all',1,false,['class' => 'mass']) !!}
                        </th>
                        <th>name</th>
                        <th>position</th>
                        <th>comment</th>
                        <th></th>
                        @if($shopslist_id != 3)
                            <th>ranking</th>
                        @else
                            <th>G5 </th>
                            <th>グループ売上ランキング </th>
                            <th>グループ指名本数ランキング</th>
                        @endif
                        
                        <th>image</th>
                        <th>&nbsp;</th>
                    </tr>
                </thead>

                <tbody>
               
                    @foreach ($godstaffs as $row)
                        <tr>
                            <td>
                                {!! Form::checkbox('del-'.$row->id,1,false,['class' => 'single','data-id'=> $row->id]) !!}
                            </td>
                            <td>{{ $row->name }}</td>
                            <td>{{ $row->position }}</td>
                            <td>{{$row->comment}}</td>
                            <td>{{isset(position()[$row->important]) ? position()[$row->important] : '-'}}</td>
                            <?php 
                                if ($shopslist_id == 1) {
                                    $ran = App\MillionGodRankingStaff::where('godstaffs_id',$row->id)->with('ranking')->first();
                                
                                }else{
                                   if ($shopslist_id == 2) {
                                        $ran = App\GigoloRankingStaff::where('godstaffs_id',$row->id)->with('ranking')->first();
                                    
                                    }else{
                                        $best = App\BestRanking::where('godstaffs_id',$row->id)->with('ranking')->first();
                                        $g1 = App\RankingAll::where('godstaffs_id',$row->id)->where('grouprankingtype_id', 1)->with('ranking')->first();
                                         $g2 = App\RankingAll::where('godstaffs_id',$row->id)->where('grouprankingtype_id', 2)->with('ranking')->first();
                                    } 
                                }
                             ?>
                             @if($shopslist_id != 3)
                                <td>{{ isset($ran->ranking) ? $ran->ranking->number : ''}}</td>
                            @else
                                <td>{{ isset($best->ranking) ? $best->ranking->number : ''}}</td>
                                <td>{{ isset($g1->ranking) ? $g1->ranking->number : ''}}</td>
                                <td>{{ isset($g2->ranking) ? $g2->ranking->number : ''}}</td>
                            @endif
                            <td>@if($row->image != '')<img src="{{ asset('uploads/thumb') . '/'.  $row->image }}">@endif</td>
                            <td>
                                {!! link_to_route(config('quickadmin.route').'.godstaffs.edit', trans('quickadmin::templates.templates-view_index-edit'), array($row->id), array('class' => 'btn btn-xs btn-info')) !!}
                                {!! Form::open(array('style' => 'display: inline-block;', 'method' => 'DELETE', 'onsubmit' => "return confirm('".trans("quickadmin::templates.templates-view_index-are_you_sure")."');",  'route' => array(config('quickadmin.route').'.godstaffs.destroy', $row->id))) !!}
                                {!! Form::submit(trans('quickadmin::templates.templates-view_index-delete'), array('class' => 'btn btn-xs btn-danger')) !!}
                                {!! Form::close() !!}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="row">
                <div class="col-xs-12">
                    <button class="btn btn-danger" id="delete">
                        {{ trans('quickadmin::templates.templates-view_index-delete_checked') }}
                    </button>
                </div>
            </div>
            {!! Form::open(['route' => config('quickadmin.route').'.godstaffs.massDelete', 'method' => 'post', 'id' => 'massDelete']) !!}
                <input type="hidden" id="send" name="toDelete">
            {!! Form::close() !!}
        </div>
	</div>
@else
    {{ trans('quickadmin::templates.templates-view_index-no_entries_found') }}
@endif

@endsection

@section('javascript')
    <script>
        $(document).ready(function () {
            $('#delete').click(function () {
                if (window.confirm('{{ trans('quickadmin::templates.templates-view_index-are_you_sure') }}')) {
                    var send = $('#send');
                    var mass = $('.mass').is(":checked");
                    if (mass == true) {
                        send.val('mass');
                    } else {
                        var toDelete = [];
                        $('.single').each(function () {
                            if ($(this).is(":checked")) {
                                toDelete.push($(this).data('id'));
                            }
                        });
                        send.val(JSON.stringify(toDelete));
                    }
                    $('#massDelete').submit();
                }
            });
        });
    </script>
@stop