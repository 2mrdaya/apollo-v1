@inject('request', 'Illuminate\Http\Request')
@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.referral-data-final.title')</h3>
    @can('referral_data_final_create')
    <p>
        <a href="{{ route('admin.referral_data_finals.create') }}" class="btn btn-success">@lang('quickadmin.qa_add_new')</a>
        <a href="#" class="btn btn-warning" style="margin-left:5px;" data-toggle="modal" data-target="#myModal">@lang('quickadmin.qa_csvImport')</a>
        @include('csvImport.modal', ['model' => 'ReferralDataFinal'])
        
    </p>
    @endcan

    @can('referral_data_final_delete')
    <p>
        <ul class="list-inline">
            <li><a href="{{ route('admin.referral_data_finals.index') }}" style="{{ request('show_deleted') == 1 ? '' : 'font-weight: 700' }}">@lang('quickadmin.qa_all')</a></li> |
            <li><a href="{{ route('admin.referral_data_finals.index') }}?show_deleted=1" style="{{ request('show_deleted') == 1 ? 'font-weight: 700' : '' }}">@lang('quickadmin.qa_trash')</a></li>
        </ul>
    </p>
    @endcan


    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_list')
        </div>

        <div class="panel-body table-responsive">
            <table class="table table-bordered table-striped ajaxTable @can('referral_data_final_delete') @if ( request('show_deleted') != 1 ) dt-select @endif @endcan">
                <thead>
                    <tr>
                        @can('referral_data_final_delete')
                            @if ( request('show_deleted') != 1 )<th style="text-align:center;"><input type="checkbox" id="select-all" /></th>@endif
                        @endcan

                        <th>@lang('quickadmin.referral-data-final.fields.month')</th>
                        <th>@lang('quickadmin.referral-data-final.fields.date-time-of-int')</th>
                        <th>@lang('quickadmin.referral-data-final.fields.executive')</th>
                        <th>@lang('quickadmin.referral-data-final.fields.area')</th>
                        <th>@lang('quickadmin.referral-data-final.fields.patient-name')</th>
                        <th>@lang('quickadmin.referral-data-final.fields.uhid')</th>
                        <th>@lang('quickadmin.referral-data-final.fields.date-time-of-reg')</th>
                        <th>@lang('quickadmin.referral-data-final.fields.ip-no')</th>
                        <th>@lang('quickadmin.referral-data-final.fields.bill-no')</th>
                        <th>@lang('quickadmin.referral-data-final.fields.admission-time')</th>
                        <th>@lang('quickadmin.referral-data-final.fields.date-of-discharged')</th>
                        <th>@lang('quickadmin.referral-data-final.fields.procedure-name')</th>
                        <th>@lang('quickadmin.referral-data-final.fields.dr-name-aic')</th>
                        <th>@lang('quickadmin.referral-data-final.fields.total-bill-amount')</th>
                        <th>@lang('quickadmin.referral-data-final.fields.net-amount')</th>
                        <th>@lang('quickadmin.referral-data-final.fields.aic-fee')</th>
                        <th>@lang('quickadmin.referral-data-final.fields.fee-percent')</th>
                        <th>@lang('quickadmin.referral-data-final.fields.treating-consultant')</th>
                        <th>@lang('quickadmin.referral-data-final.fields.department')</th>
                        <th>@lang('quickadmin.referral-data-final.fields.pan-no')</th>
                        <th>@lang('quickadmin.referral-data-final.fields.remarks')</th>
                        <th>@lang('quickadmin.referral-data-final.fields.message')</th>
                        <th>@lang('quickadmin.referral-data-final.fields.msg-date-time')</th>
                        <th>@lang('quickadmin.referral-data-final.fields.consumable')</th>
                        <th>@lang('quickadmin.referral-data-final.fields.ward-pharmacy')</th>
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
        @can('referral_data_final_delete')
            @if ( request('show_deleted') != 1 ) window.route_mass_crud_entries_destroy = '{{ route('admin.referral_data_finals.mass_destroy') }}'; @endif
        @endcan
        $(document).ready(function () {
            window.dtDefaultOptions.ajax = '{!! route('admin.referral_data_finals.index') !!}?show_deleted={{ request('show_deleted') }}';
            window.dtDefaultOptions.columns = [@can('referral_data_final_delete')
                @if ( request('show_deleted') != 1 )
                    {data: 'massDelete', name: 'id', searchable: false, sortable: false},
                @endif
                @endcan{data: 'month', name: 'month'},
                {data: 'date_time_of_int', name: 'date_time_of_int'},
                {data: 'executive', name: 'executive'},
                {data: 'area', name: 'area'},
                {data: 'patient_name', name: 'patient_name'},
                {data: 'uhid', name: 'uhid'},
                {data: 'date_time_of_reg', name: 'date_time_of_reg'},
                {data: 'ip_no', name: 'ip_no'},
                {data: 'bill_no', name: 'bill_no'},
                {data: 'admission_time', name: 'admission_time'},
                {data: 'date_of_discharged', name: 'date_of_discharged'},
                {data: 'procedure_name', name: 'procedure_name'},
                {data: 'dr_name_aic', name: 'dr_name_aic'},
                {data: 'total_bill_amount', name: 'total_bill_amount'},
                {data: 'net_amount', name: 'net_amount'},
                {data: 'aic_fee', name: 'aic_fee'},
                {data: 'fee_percent', name: 'fee_percent'},
                {data: 'treating_consultant', name: 'treating_consultant'},
                {data: 'department', name: 'department'},
                {data: 'pan_no', name: 'pan_no'},
                {data: 'remarks', name: 'remarks'},
                {data: 'message', name: 'message'},
                {data: 'msg_date_time', name: 'msg_date_time'},
                {data: 'consumable', name: 'consumable'},
                {data: 'ward_pharmacy', name: 'ward_pharmacy'},
                
                {data: 'actions', name: 'actions', searchable: false, sortable: false}
            ];
            processAjaxTables();
        });
    </script>
@endsection