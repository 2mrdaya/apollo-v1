@inject('request', 'Illuminate\Http\Request')
@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.message-mapping.title')</h3>
    @can('message_mapping_create')
    <p>
        <a href="{{ route('admin.message_mappings.create') }}" class="btn btn-success">@lang('quickadmin.qa_add_new')</a>
        <a href="#" class="btn btn-warning" style="margin-left:5px;" data-toggle="modal" data-target="#myModal">@lang('quickadmin.qa_csvImport')</a>
        @include('csvImport.modal', ['model' => 'MessageMapping'])
        
    </p>
    @endcan

    @can('message_mapping_delete')
    <p>
        <ul class="list-inline">
            <li><a href="{{ route('admin.message_mappings.index') }}" style="{{ request('show_deleted') == 1 ? '' : 'font-weight: 700' }}">@lang('quickadmin.qa_all')</a></li> |
            <li><a href="{{ route('admin.message_mappings.index') }}?show_deleted=1" style="{{ request('show_deleted') == 1 ? 'font-weight: 700' : '' }}">@lang('quickadmin.qa_trash')</a></li>
        </ul>
    </p>
    @endcan


    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_list')
        </div>

        <div class="panel-body table-responsive">
            <table class="table table-bordered table-striped ajaxTable @can('message_mapping_delete') @if ( request('show_deleted') != 1 ) dt-select @endif @endcan">
                <thead>
                    <tr>
                        @can('message_mapping_delete')
                            @if ( request('show_deleted') != 1 )<th style="text-align:center;"><input type="checkbox" id="select-all" /></th>@endif
                        @endcan

                        <th>@lang('quickadmin.message-mapping.fields.channel')</th>
                        <th>@lang('quickadmin.message-mapping.fields.message')</th>
                        <th>@lang('quickadmin.message-mapping.fields.source')</th>
                        <th>@lang('quickadmin.message-mapping.fields.patient-name')</th>
                        <th>@lang('quickadmin.message-mapping.fields.referrer-name')</th>
                        <th>@lang('quickadmin.message-mapping.fields.intimation-date-time')</th>
                        <th>@lang('quickadmin.message-mapping.fields.uhid')</th>
                        <th>@lang('quickadmin.patient-registration.fields.patient-name')</th>
                        <th>@lang('quickadmin.patient-registration.fields.registration-date')</th>
                        <th>@lang('quickadmin.patient-registration.fields.city')</th>
                        <th>@lang('quickadmin.patient-registration.fields.address')</th>
                        <th>@lang('quickadmin.patient-registration.fields.mobile')</th>
                        <th>@lang('quickadmin.patient-registration.fields.email-id')</th>
                        <th>@lang('quickadmin.patient-registration.fields.operator-name')</th>
                        <th>@lang('quickadmin.message-mapping.fields.avip')</th>
                        <th>@lang('quickadmin.avip.fields.address-1')</th>
                        <th>@lang('quickadmin.avip.fields.address-2')</th>
                        <th>@lang('quickadmin.avip.fields.pan-number')</th>
                        <th>@lang('quickadmin.avip.fields.oracle-code')</th>
                        <th>@lang('quickadmin.avip.fields.state')</th>
                        @if( request('show_deleted') == 1 )
                        <th>&nbsp;</th>
                        @else
                        <th>&nbsp;</th>
                        @endif
                    </tr>
                </thead>
            </table>
        </div>
    </div>
@stop

@section('javascript') 
    <script>
        @can('message_mapping_delete')
            @if ( request('show_deleted') != 1 ) window.route_mass_crud_entries_destroy = '{{ route('admin.message_mappings.mass_destroy') }}'; @endif
        @endcan
        $(document).ready(function () {
            window.dtDefaultOptions.ajax = '{!! route('admin.message_mappings.index') !!}?show_deleted={{ request('show_deleted') }}';
            window.dtDefaultOptions.columns = [@can('message_mapping_delete')
                @if ( request('show_deleted') != 1 )
                    {data: 'massDelete', name: 'id', searchable: false, sortable: false},
                @endif
                @endcan{data: 'channel', name: 'channel'},
                {data: 'message', name: 'message'},
                {data: 'source', name: 'source'},
                {data: 'patient_name', name: 'patient_name'},
                {data: 'referrer_name', name: 'referrer_name'},
                {data: 'intimation_date_time', name: 'intimation_date_time'},
                {data: 'uhid.uhid', name: 'uhid.uhid'},
                {data: 'uhid.patient_name', name: 'uhid.patient_name'},
                {data: 'uhid.registration_date', name: 'uhid.registration_date'},
                {data: 'uhid.city', name: 'uhid.city'},
                {data: 'uhid.address', name: 'uhid.address'},
                {data: 'uhid.mobile', name: 'uhid.mobile'},
                {data: 'uhid.email_id', name: 'uhid.email_id'},
                {data: 'uhid.operator_name', name: 'uhid.operator_name'},
                {data: 'avip.name', name: 'avip.name'},
                {data: 'avip.address_1', name: 'avip.address_1'},
                {data: 'avip.address_2', name: 'avip.address_2'},
                {data: 'avip.pan_number', name: 'avip.pan_number'},
                {data: 'avip.oracle_code', name: 'avip.oracle_code'},
                {data: 'avip.state', name: 'avip.state'},
                
                {data: 'actions', name: 'actions', searchable: false, sortable: false}
            ];
            processAjaxTables();
        });
    </script>
@endsection