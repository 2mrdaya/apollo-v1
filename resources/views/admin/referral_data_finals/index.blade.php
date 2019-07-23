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
                        <th>@lang('quickadmin.referral-data-final.fields.vendor')</th>
                        <th>@lang('quickadmin.referral-data-final.fields.msg-desc')</th>
                        <th>@lang('quickadmin.referral-data-final.fields.doi-as-per-whats-app')</th>
                        <th>@lang('quickadmin.referral-data-final.fields.doi-as-per-sw')</th>
                        <th>@lang('quickadmin.message-mapping.fields.intimation-date-time')</th>
                        <th>@lang('quickadmin.patient-registration.fields.registration-date')</th>
                        <th>@lang('quickadmin.referral-data-final.fields.area')</th>
                        <th>@lang('quickadmin.referral-data-final.fields.uhid')</th>
                        <th>@lang('quickadmin.patient-registration.fields.patient-name')</th>
                        <th>@lang('quickadmin.referral-data-final.fields.pateint-name-msg')</th>
                        <th>@lang('quickadmin.referral-data-final.fields.dr-name-aic')</th>
                        <th>@lang('quickadmin.referral-data-final.fields.avip-name-msg')</th>
                        <th>@lang('quickadmin.referral-data-final.fields.ip-no')</th>
                        <th>@lang('quickadmin.referral-data-final.fields.pan-no')</th>
                        {{--<th>@lang('quickadmin.referral-data-final.fields.ip')</th>--}}
                        {{--<th>@lang('quickadmin.ip.fields.uhid')</th>--}}
                        <th>@lang('quickadmin.ip.fields.bill-date')</th>
                        {{--<th>@lang('quickadmin.ip.fields.patient-name')</th>--}}
                        {{--<th>@lang('quickadmin.ip.fields.country')</th>--}}
                        {{--<th>@lang('quickadmin.ip.fields.state')</th>--}}
                        {{--<th>@lang('quickadmin.ip.fields.city')</th>--}}
                        <th>@lang('quickadmin.ip.fields.bill-no')</th>
                        {{--<th>@lang('quickadmin.ip.fields.customer-name')</th>--}}
                        {{--<th>@lang('quickadmin.ip.fields.total-service-amount')</th>--}}
                        {{--<th>@lang('quickadmin.ip.fields.tax-amount')</th>--}}
                        <th>@lang('quickadmin.ip.fields.total-bill-amount')</th>
                        {{--<th>@lang('quickadmin.ip.fields.tcs-tax')</th>--}}
                        <th>@lang('quickadmin.ip.fields.discount-amount')</th>
                        {{--<th>@lang('quickadmin.ip.fields.doctor-name')</th>--}}
                        {{--<th>@lang('quickadmin.ip.fields.speciality')</th>--}}
                        <th>@lang('quickadmin.ip.fields.surgical-package-name')</th>
                        <th>@lang('quickadmin.ip.fields.total-pharmacy-amount')</th>
                        {{--<th>@lang('quickadmin.ip.fields.pharmacy-amt')</th>--}}
                        <th>@lang('quickadmin.ip.fields.total-consumables')</th>
                        <th>@lang('quickadmin.referral-data-final.fields.fee-percent')</th>
                        <th>@lang('quickadmin.referral-data-final.fields.aic-fee')</th>
                        <th>@lang('quickadmin.ip.fields.bill-to')</th>
                        {{--<th>@lang('quickadmin.referral-data-final.fields.message')</th>--}}
                        <th>@lang('quickadmin.message-mapping.fields.channel')</th>
                        <th>@lang('quickadmin.message-mapping.fields.message')</th>
                        {{--<th>@lang('quickadmin.message-mapping.fields.patient-name')</th>
                        <th>@lang('quickadmin.message-mapping.fields.referrer-name')</th>--}}
                        {{--<th>@lang('quickadmin.referral-data-final.fields.patient')</th>--}}
                        <th>@lang('quickadmin.patient-registration.fields.city')</th>
                        <th>@lang('quickadmin.patient-registration.fields.country')</th>
                        <th>@lang('quickadmin.patient-registration.fields.address')</th>
                        {{--<th>@lang('quickadmin.patient-registration.fields.mobile')</th>
                        <th>@lang('quickadmin.patient-registration.fields.email-id')</th>
                        <th>@lang('quickadmin.patient-registration.fields.operator-name')</th>--}}
                        <th>@lang('quickadmin.referral-data-final.fields.avip')</th>
                        <th>@lang('quickadmin.avip.fields.address-1')</th>
                        {{--<th>@lang('quickadmin.avip.fields.address-2')</th>
                        <th>@lang('quickadmin.avip.fields.bank-name')</th>
                        <th>@lang('quickadmin.avip.fields.bank-address')</th>
                        <th>@lang('quickadmin.avip.fields.account-no')</th>
                        <th>@lang('quickadmin.avip.fields.swift-code')</th>
                        <th>@lang('quickadmin.avip.fields.iban-number')</th>
                        <th>@lang('quickadmin.avip.fields.bank-code')</th>
                        <th>@lang('quickadmin.avip.fields.correspondence-bank-name')</th>
                        <th>@lang('quickadmin.avip.fields.correspondence-ac-no')</th>
                        <th>@lang('quickadmin.avip.fields.corp-swift-code')</th>
                        <th>@lang('quickadmin.avip.fields.ifsc-code')</th>--}}
                        <th>@lang('quickadmin.avip.fields.pan-number')</th>
                        <th>@lang('quickadmin.avip.fields.oracle-code')</th>
                        <th>@lang('quickadmin.avip.fields.rate-details')</th>
                        <th>@lang('quickadmin.avip.fields.state')</th>
                        {{--<th>@lang('quickadmin.avip.fields.pin-code')</th>--}}
                        <th>Patient_Match</th>
                        <th>Avip_Match</th>
                        <th>@lang('quickadmin.referral-data-final.fields.remarks')</th>
                        <th>@lang('quickadmin.referral-data-final.fields.status')</th>
                        <th>@lang('quickadmin.referral-data-final.fields.approve')</th>
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
                {data: 'vendor', name: 'vendor'},
                {data: 'msg_desc', name: 'msg_desc'},
                {data: 'doi_as_per_whats_app', name: 'doi_as_per_whats_app'},
                {data: 'doi_as_per_sw', name: 'doi_as_per_sw'},
                {data: 'intimation_date_time', name: 'intimation_date_time'},
                {data: 'registration_date', name: 'registration_date'},
                {data: 'area', name: 'area'},
                {data: 'referral_uhid', name: 'uhid'},
                {data: 'patient_name_org', name: 'patient_name'},
                {data: 'pateint_name_msg', name: 'pateint_name_msg'},
                {data: 'dr_name_aic', name: 'dr_name_aic'},
                {data: 'avip_name_msg', name: 'avip_name_msg'},
                {data: 'ip_no', name: 'ip_no'},
                {data: 'pan_no', name: 'pan_no'},
                //{data: 'ip_no', name: 'ip_no'},
                //{data: 'uhid', name: 'uhid'},
                {data: 'bill_date', name: 'bill_date'},
                //{data: 'patient_name_org', name: 'patient_name'},
                //{data: 'country', name: 'country'},
                //{data: 'state', name: 'state'},
                //{data: 'city', name: 'city'},
                {data: 'bill_no', name: 'bill_no'},
                //{data: 'customer_name', name: 'customer_name'},
                //{data: 'total_service_amount', name: 'total_service_amount'},
                //{data: 'tax_amount', name: 'tax_amount'},
                {data: 'total_bill_amount', name: 'total_bill_amount'},
                //{data: 'tcs_tax', name: 'tcs_tax'},
                {data: 'discount_amount', name: 'discount_amount'},
                //{data: 'doctor_name', name: 'doctor_name'},
                //{data: 'speciality', name: 'speciality'},
                {data: 'surgical_package_name', name: 'surgical_package_name'},
                {data: 'total_pharmacy_amount', name: 'total_pharmacy_amount'},
                //{data: 'pharmacy_amt', name: 'pharmacy_amt'},
                {data: 'total_consumables', name: 'total_consumables'},
                {data: 'fee_percent', name: 'fee_percent'},
                {data: 'aic_fee', name: 'aic_fee'},
                {data: 'bill_to', name: 'bill_to'},
                //{data: 'source', name: 'source'},
                {data: 'channel', name: 'channel'},
                {data: 'message', name: 'message'},
                //{data: 'patient_name', name: 'patient_name'},
                //{data: 'referrer_name', name: 'referrer_name'},
                //{data: 'uhid', name: 'uhid'},
                {data: 'city', name: 'city'},
                {data: 'country', name: 'country'},
                {data: 'address', name: 'address'},
                //{data: 'mobile', name: 'mobile'},
                //{data: 'email_id', name: 'email_id'},
                //{data: 'operator_name', name: 'operator_name'},
                {data: 'name', name: 'name'},
                {data: 'address_1', name: 'address_1'},
                //{data: 'address_2', name: 'address_2'},
                //{data: 'bank_name', name: 'bank_name'},
                //{data: 'bank_address', name: 'bank_address'},
                //{data: 'account_no', name: 'account_no'},
                //{data: 'swift_code', name: 'swift_code'},
                //{data: 'iban_number', name: 'iban_number'},
                //{data: 'bank_code', name: 'bank_code'},
                //{data: 'correspondence_bank_name', name: 'correspondence_bank_name'},
                //{data: 'correspondence_ac_no', name: 'correspondence_ac_no'},
                //{data: 'corp_swift_code', name: 'corp_swift_code'},
                //{data: 'ifsc_code', name: 'ifsc_code'},
                {data: 'pan_number', name: 'pan_number'},
                {data: 'oracle_code', name: 'oracle_code'},
                {data: 'rate_details', name: 'rate_details'},
                {data: 'state', name: 'state'},
                //{data: 'pin_code', name: 'pin_code'},
                {data: 'patient_match', name: 'patient_match'},
                {data: 'avip_match', name: 'avip_match'},
                {data: 'remarks', name: 'remarks'},
                {data: 'status', name: 'status'},
                {data: 'approve', name: 'approve'},
                {data: 'actions', name: 'actions', searchable: false, sortable: false}
            ];
            processAjaxTables();
        });
    </script>
@endsection
