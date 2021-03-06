@extends('admin.layouts.master')

@section('content')

<!-- <p>{!! link_to_route(config('quickadmin.route').'.recomentcate.create', trans('quickadmin::templates.templates-view_index-add_new') , null, array('class' => 'btn btn-success')) !!}</p> -->
<span>{!! link_to_route(config('quickadmin.route').'.recomentcate.index', ' Million GOD（ミリオンゴッド）' , null, array('class' => ($shopslist_id==1) ? 'btn btn-primary' : 'btn btn-success')) !!}</span>
<span>{!! link_to_route(config('quickadmin.route').'.recomentcate.gigolo', ' "Gigolo（"ジゴロ.）' , null, array('class' => ($shopslist_id==2) ? 'btn btn-primary' : 'btn btn-success')) !!}</span>
<br>
<br>
@if ($recomentcate->count())
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
                        <th>image</th>
                        <th>name</th>
                        <th>alias</th>
                        <th>Shop</th>

                        <th>&nbsp;</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($recomentcate as $row)
                        <tr>
                            <td>
                                {!! Form::checkbox('del-'.$row->id,1,false,['class' => 'single','data-id'=> $row->id]) !!}
                            </td>
                            <td>@if($row->image != '')<img src="{{ asset('uploads/thumb') . '/'.  $row->image }}">@endif</td>
                            <td>{{ $row->name }}</td>
                            <td>{{ alias()[$row->alias] }}</td>
                            <td>{{ isset($row->shopslist->name) ? $row->shopslist->name : '' }}</td>

                            <td>
                                {!! link_to_route(config('quickadmin.route').'.recomentcate.edit', trans('quickadmin::templates.templates-view_index-edit'), array($row->id), array('class' => 'btn btn-xs btn-info')) !!}
                                {!! Form::open(array('style' => 'display: inline-block;', 'method' => 'DELETE', 'onsubmit' => "return confirm('".trans("quickadmin::templates.templates-view_index-are_you_sure")."');",  'route' => array(config('quickadmin.route').'.recomentcate.destroy', $row->id))) !!}
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
            {!! Form::open(['route' => config('quickadmin.route').'.recomentcate.massDelete', 'method' => 'post', 'id' => 'massDelete']) !!}
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