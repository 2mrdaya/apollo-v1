@inject('request', 'Illuminate\Http\Request')
@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.avip.title')</h3>
    @can('avip_create')
    <p>
        <a href="{{ route('admin.avips.create') }}" class="btn btn-success">@lang('quickadmin.qa_add_new')</a>
        <a href="#" class="btn btn-warning" style="margin-left:5px;" data-toggle="modal" data-target="#myModal">@lang('quickadmin.qa_csvImport')</a>
        @include('csvImport.modal', ['model' => 'Avip'])

    </p>
    @endcan

    @can('avip_delete')
    <p>
        <ul class="list-inline">
            <li><a href="{{ route('admin.avips.index') }}" style="{{ request('show_deleted') == 1 ? '' : 'font-weight: 700' }}">@lang('quickadmin.qa_all')</a></li> |
            <li><a href="{{ route('admin.avips.index') }}?show_deleted=1" style="{{ request('show_deleted') == 1 ? 'font-weight: 700' : '' }}">@lang('quickadmin.qa_trash')</a></li>
        </ul>
    </p>
    @endcan


    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_list')
        </div>

        <div class="panel-body table-responsive">
            <table class="table table-bordered table-striped ajaxTable @can('avip_delete') @if ( request('show_deleted') != 1 ) dt-select @endif @endcan">
                <thead>
                    <tr>
                        @can('avip_delete')
                            @if ( request('show_deleted') != 1 )<th style="text-align:center;"><input type="checkbox" id="select-all" /></th>@endif
                        @endcan
                        <th>@lang('quickadmin.avip.fields.oracle-code')</th>
                        <th>@lang('quickadmin.avip.fields.name')</th>
                        <th>@lang('quickadmin.avip.fields.pan-number')</th>
                        <th>@lang('quickadmin.avip.fields.address-1')</th>
                        <th>@lang('quickadmin.avip.fields.address-2')</th>
                        <th>@lang('quickadmin.avip.fields.bank-name')</th>
                        <th>@lang('quickadmin.avip.fields.bank-address')</th>
                        <th>@lang('quickadmin.avip.fields.account-no')</th>
                        <th>@lang('quickadmin.avip.fields.swift-code')</th>
                        <th>@lang('quickadmin.avip.fields.iban-number')</th>
                        <th>@lang('quickadmin.avip.fields.bank-code')</th>
                        <th>@lang('quickadmin.avip.fields.correspondence-bank-name')</th>
                        <th>@lang('quickadmin.avip.fields.correspondence-ac-no')</th>
                        <th>@lang('quickadmin.avip.fields.corp-swift-code')</th>
                        <th>@lang('quickadmin.avip.fields.ifsc-code')</th>
                        <th>@lang('quickadmin.avip.fields.rate-details')</th>
                        <th>@lang('quickadmin.avip.fields.state')</th>
                        <th>@lang('quickadmin.avip.fields.pin-code')</th>
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
        @can('avip_delete')
            @if ( request('show_deleted') != 1 ) window.route_mass_crud_entries_destroy = '{{ route('admin.avips.mass_destroy') }}'; @endif
        @endcan
        $(document).ready(function () {
            window.dtDefaultOptions.ajax = '{!! route('admin.avips.index') !!}?show_deleted={{ request('show_deleted') }}';
            window.dtDefaultOptions.columns = [@can('avip_delete')
                @if ( request('show_deleted') != 1 )
                    {data: 'massDelete', name: 'id', searchable: false, sortable: false},
                @endif
                @endcan
                {data: 'oracle_code', name: 'oracle_code'},
                {data: 'name', name: 'name'},
                {data: 'address_1', name: 'address_1'},
                {data: 'address_2', name: 'address_2'},
                {data: 'bank_name', name: 'bank_name'},
                {data: 'bank_address', name: 'bank_address'},
                {data: 'account_no', name: 'account_no'},
                {data: 'swift_code', name: 'swift_code'},
                {data: 'iban_number', name: 'iban_number'},
                {data: 'bank_code', name: 'bank_code'},
                {data: 'correspondence_bank_name', name: 'correspondence_bank_name'},
                {data: 'correspondence_ac_no', name: 'correspondence_ac_no'},
                {data: 'corp_swift_code', name: 'corp_swift_code'},
                {data: 'ifsc_code', name: 'ifsc_code'},
                {data: 'pan_number', name: 'pan_number'},
                {data: 'rate_details', name: 'rate_details'},
                {data: 'state', name: 'state'},
                {data: 'pin_code', name: 'pin_code'},

                {data: 'actions', name: 'actions', searchable: false, sortable: false}
            ];
            processAjaxTables();
        });
    </script>
@endsection
