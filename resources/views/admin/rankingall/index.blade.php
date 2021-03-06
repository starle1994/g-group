@extends('admin.layouts.master')

@section('content')

<p>{!! link_to_route(config('quickadmin.route').'.rankingall.create', trans('quickadmin::templates.templates-view_index-add_new') , null, array('class' => 'btn btn-success')) !!}</p>

<span>{!! link_to_route(config('quickadmin.route').'.rankingall.index', ' グループ売上ランキング' , null, array('class' => ($id==1) ? 'btn btn-primary' : 'btn btn-success')) !!}</span>
<span>{!! link_to_route(config('quickadmin.route').'.rankingall.type2', 'グループ指名本数ランキング' , $id, array('class' => ($id==2) ? 'btn btn-primary' : 'btn btn-success')) !!}</span>
<span>{!! link_to_route(config('quickadmin.route').'.bestranking.index', 'G5' , null, array('class' => (!isset($id)) ? 'btn btn-primary' : 'btn btn-success')) !!}</span>
<br>
<br>
@if ($rankingall->count())
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
                        <th>Position</th>
                        <th>comment</th>
                
                        <th>image</th>
                        <th>Ranking</th>

                        <th>&nbsp;</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($rankingall as $row)
                        <tr>
                            <td>
                                {!! Form::checkbox('del-'.$row->id,1,false,['class' => 'single','data-id'=> $row->id]) !!}
                            </td>
                        
                            <td>{{ isset($row->godstaffs->name) ? $row->godstaffs->name : '' }}</td>
                            <td>{{ isset($row->godstaffs->position) ? $row->godstaffs->position : '' }}</td>
                            <td>{{ isset($row->godstaffs->comment) ? $row->godstaffs->comment : '' }}</td>
                    
                            <td>@if(isset($row->godstaffs->image))<img src="{{ asset('uploads/thumb') . '/'.  $row->godstaffs->image }}">@endif</td>
                            <td>{{ isset($row->ranking->number) ? $row->ranking->number : '' }}</td>

                            <td>
                                {!! link_to_route(config('quickadmin.route').'.rankingall.edit', trans('quickadmin::templates.templates-view_index-edit'), array($row->id), array('class' => 'btn btn-xs btn-info')) !!}
                                {!! Form::open(array('style' => 'display: inline-block;', 'method' => 'DELETE', 'onsubmit' => "return confirm('".trans("quickadmin::templates.templates-view_index-are_you_sure")."');",  'route' => array(config('quickadmin.route').'.rankingall.destroy', $row->id))) !!}
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
            {!! Form::open(['route' => config('quickadmin.route').'.rankingall.massDelete', 'method' => 'post', 'id' => 'massDelete']) !!}
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