@inject('request', 'Illuminate\Http\Request')
@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.opd.title')</h3>
    @can('opd_create')
    <p>
        <a href="{{ route('admin.opds.create') }}" class="btn btn-success">@lang('quickadmin.qa_add_new')</a>
        <a href="#" class="btn btn-warning" style="margin-left:5px;" data-toggle="modal" data-target="#myModal">@lang('quickadmin.qa_csvImport')</a>
        @include('csvImport.modal', ['model' => 'Opd'])
        
    </p>
    @endcan

    @can('opd_delete')
    <p>
        <ul class="list-inline">
            <li><a href="{{ route('admin.opds.index') }}" style="{{ request('show_deleted') == 1 ? '' : 'font-weight: 700' }}">@lang('quickadmin.qa_all')</a></li> |
            <li><a href="{{ route('admin.opds.index') }}?show_deleted=1" style="{{ request('show_deleted') == 1 ? 'font-weight: 700' : '' }}">@lang('quickadmin.qa_trash')</a></li>
        </ul>
    </p>
    @endcan


    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_list')
        </div>

        <div class="panel-body table-responsive">
            <table class="table table-bordered table-striped ajaxTable @can('opd_delete') @if ( request('show_deleted') != 1 ) dt-select @endif @endcan">
                <thead>
                    <tr>
                        @can('opd_delete')
                            @if ( request('show_deleted') != 1 )<th style="text-align:center;"><input type="checkbox" id="select-all" /></th>@endif
                        @endcan

                        <th>@lang('quickadmin.opd.fields.bill-date')</th>
                        <th>@lang('quickadmin.opd.fields.bill-no')</th>
                        <th>@lang('quickadmin.opd.fields.uhid')</th>
                        <th>@lang('quickadmin.opd.fields.patient-number')</th>
                        <th>@lang('quickadmin.opd.fields.pname')</th>
                        <th>@lang('quickadmin.opd.fields.bill-type')</th>
                        <th>@lang('quickadmin.opd.fields.bill-amount')</th>
                        <th>@lang('quickadmin.opd.fields.discount-amount')</th>
                        <th>@lang('quickadmin.opd.fields.net-amount')</th>
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
        @can('opd_delete')
            @if ( request('show_deleted') != 1 ) window.route_mass_crud_entries_destroy = '{{ route('admin.opds.mass_destroy') }}'; @endif
        @endcan
        $(document).ready(function () {
            window.dtDefaultOptions.ajax = '{!! route('admin.opds.index') !!}?show_deleted={{ request('show_deleted') }}';
            window.dtDefaultOptions.columns = [@can('opd_delete')
                @if ( request('show_deleted') != 1 )
                    {data: 'massDelete', name: 'id', searchable: false, sortable: false},
                @endif
                @endcan{data: 'bill_date', name: 'bill_date'},
                {data: 'bill_no', name: 'bill_no'},
                {data: 'uhid', name: 'uhid'},
                {data: 'patient_number', name: 'patient_number'},
                {data: 'pname', name: 'pname'},
                {data: 'bill_type', name: 'bill_type'},
                {data: 'bill_amount', name: 'bill_amount'},
                {data: 'discount_amount', name: 'discount_amount'},
                {data: 'net_amount', name: 'net_amount'},
                
                {data: 'actions', name: 'actions', searchable: false, sortable: false}
            ];
            processAjaxTables();
        });
    </script>
@endsection