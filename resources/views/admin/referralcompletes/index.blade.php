@inject('request', 'Illuminate\Http\Request')
@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.referralcomplete.title')</h3>
    @can('referralcomplete_create')
    <p>
        <a href="{{ route('admin.referralcompletes.create') }}" class="btn btn-success">@lang('quickadmin.qa_add_new')</a>
        <a href="#" class="btn btn-warning" style="margin-left:5px;" data-toggle="modal" data-target="#myModal">@lang('quickadmin.qa_csvImport')</a>
        @include('csvImport.modal', ['model' => 'Referralcomplete'])
        
    </p>
    @endcan

    @can('referralcomplete_delete')
    <p>
        <ul class="list-inline">
            <li><a href="{{ route('admin.referralcompletes.index') }}" style="{{ request('show_deleted') == 1 ? '' : 'font-weight: 700' }}">@lang('quickadmin.qa_all')</a></li> |
            <li><a href="{{ route('admin.referralcompletes.index') }}?show_deleted=1" style="{{ request('show_deleted') == 1 ? 'font-weight: 700' : '' }}">@lang('quickadmin.qa_trash')</a></li>
        </ul>
    </p>
    @endcan


    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_list')
        </div>

        <div class="panel-body table-responsive">
            <table class="table table-bordered table-striped ajaxTable @can('referralcomplete_delete') @if ( request('show_deleted') != 1 ) dt-select @endif @endcan">
                <thead>
                    <tr>
                        @can('referralcomplete_delete')
                            @if ( request('show_deleted') != 1 )<th style="text-align:center;"><input type="checkbox" id="select-all" /></th>@endif
                        @endcan

                        <th>@lang('quickadmin.referralcomplete.fields.vendor')</th>
                        <th>@lang('quickadmin.referralcomplete.fields.month')</th>
                        <th>@lang('quickadmin.referralcomplete.fields.msg-desc')</th>
                        <th>@lang('quickadmin.referralcomplete.fields.doi-as-per-whats-app')</th>
                        <th>@lang('quickadmin.referralcomplete.fields.doi-as-per-sw')</th>
                        <th>@lang('quickadmin.referralcomplete.fields.area')</th>
                        <th>@lang('quickadmin.referralcomplete.fields.uhid')</th>
                        <th>@lang('quickadmin.referralcomplete.fields.oracle-code')</th>
                        <th>@lang('quickadmin.referralcomplete.fields.ip-no')</th>
                        <th>@lang('quickadmin.referralcomplete.fields.bill-no')</th>
                        <th>@lang('quickadmin.referralcomplete.fields.dr-name-aic')</th>
                        <th>@lang('quickadmin.referralcomplete.fields.pan-no')</th>
                        <th>@lang('quickadmin.referralcomplete.fields.admission-date')</th>
                        <th>@lang('quickadmin.referralcomplete.fields.discharge-date')</th>
                        <th>@lang('quickadmin.referralcomplete.fields.registration-date')</th>
                        <th>@lang('quickadmin.referralcomplete.fields.patient-name')</th>
                        <th>@lang('quickadmin.referralcomplete.fields.company')</th>
                        <th>@lang('quickadmin.referralcomplete.fields.country')</th>
                        <th>@lang('quickadmin.referralcomplete.fields.treating-consultant')</th>
                        <th>@lang('quickadmin.referralcomplete.fields.specialty')</th>
                        <th>@lang('quickadmin.referralcomplete.fields.bill-to')</th>
                        <th>@lang('quickadmin.referralcomplete.fields.bill-amount')</th>
                        <th>@lang('quickadmin.referralcomplete.fields.pharmacy')</th>
                        <th>@lang('quickadmin.referralcomplete.fields.consumable')</th>
                        <th>@lang('quickadmin.referralcomplete.fields.bonus-percent')</th>
                        <th>@lang('quickadmin.referralcomplete.fields.bonus')</th>
                        <th>@lang('quickadmin.referralcomplete.fields.gst')</th>
                        <th>@lang('quickadmin.referralcomplete.fields.fee-percent')</th>
                        <th>@lang('quickadmin.referralcomplete.fields.aic-fee')</th>
                        <th>@lang('quickadmin.referralcomplete.fields.remarks')</th>
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
        @can('referralcomplete_delete')
            @if ( request('show_deleted') != 1 ) window.route_mass_crud_entries_destroy = '{{ route('admin.referralcompletes.mass_destroy') }}'; @endif
        @endcan
        $(document).ready(function () {
            window.dtDefaultOptions.ajax = '{!! route('admin.referralcompletes.index') !!}?show_deleted={{ request('show_deleted') }}';
            window.dtDefaultOptions.columns = [@can('referralcomplete_delete')
                @if ( request('show_deleted') != 1 )
                    {data: 'massDelete', name: 'id', searchable: false, sortable: false},
                @endif
                @endcan{data: 'vendor', name: 'vendor'},
                {data: 'month', name: 'month'},
                {data: 'msg_desc', name: 'msg_desc'},
                {data: 'doi_as_per_whats_app', name: 'doi_as_per_whats_app'},
                {data: 'doi_as_per_sw', name: 'doi_as_per_sw'},
                {data: 'area', name: 'area'},
                {data: 'uhid', name: 'uhid'},
                {data: 'oracle_code', name: 'oracle_code'},
                {data: 'ip_no', name: 'ip_no'},
                {data: 'bill_no', name: 'bill_no'},
                {data: 'dr_name_aic', name: 'dr_name_aic'},
                {data: 'pan_no', name: 'pan_no'},
                {data: 'admission_date', name: 'admission_date'},
                {data: 'discharge_date', name: 'discharge_date'},
                {data: 'registration_date', name: 'registration_date'},
                {data: 'patient_name', name: 'patient_name'},
                {data: 'company', name: 'company'},
                {data: 'country', name: 'country'},
                {data: 'treating_consultant', name: 'treating_consultant'},
                {data: 'specialty', name: 'specialty'},
                {data: 'bill_to', name: 'bill_to'},
                {data: 'bill_amount', name: 'bill_amount'},
                {data: 'pharmacy', name: 'pharmacy'},
                {data: 'consumable', name: 'consumable'},
                {data: 'bonus_percent', name: 'bonus_percent'},
                {data: 'bonus', name: 'bonus'},
                {data: 'gst', name: 'gst'},
                {data: 'fee_percent', name: 'fee_percent'},
                {data: 'aic_fee', name: 'aic_fee'},
                {data: 'remarks', name: 'remarks'},
                
                {data: 'actions', name: 'actions', searchable: false, sortable: false}
            ];
            processAjaxTables();
        });
    </script>
@endsection