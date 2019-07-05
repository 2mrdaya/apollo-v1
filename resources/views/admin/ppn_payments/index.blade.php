@inject('request', 'Illuminate\Http\Request')
@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.ppn-payments.title')</h3>
    @can('ppn_payment_create')
    <p>
        <a href="{{ route('admin.ppn_payments.create') }}" class="btn btn-success">@lang('quickadmin.qa_add_new')</a>
        <a href="#" class="btn btn-warning" style="margin-left:5px;" data-toggle="modal" data-target="#myModal">@lang('quickadmin.qa_csvImport')</a>
        @include('csvImport.modal', ['model' => 'PpnPayment'])
        
    </p>
    @endcan

    @can('ppn_payment_delete')
    <p>
        <ul class="list-inline">
            <li><a href="{{ route('admin.ppn_payments.index') }}" style="{{ request('show_deleted') == 1 ? '' : 'font-weight: 700' }}">@lang('quickadmin.qa_all')</a></li> |
            <li><a href="{{ route('admin.ppn_payments.index') }}?show_deleted=1" style="{{ request('show_deleted') == 1 ? 'font-weight: 700' : '' }}">@lang('quickadmin.qa_trash')</a></li>
        </ul>
    </p>
    @endcan


    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_list')
        </div>

        <div class="panel-body table-responsive">
            <table class="table table-bordered table-striped ajaxTable @can('ppn_payment_delete') @if ( request('show_deleted') != 1 ) dt-select @endif @endcan">
                <thead>
                    <tr>
                        @can('ppn_payment_delete')
                            @if ( request('show_deleted') != 1 )<th style="text-align:center;"><input type="checkbox" id="select-all" /></th>@endif
                        @endcan

                        <th>@lang('quickadmin.ppn-payments.fields.month')</th>
                        <th>@lang('quickadmin.ppn-payments.fields.patientid')</th>
                        <th>@lang('quickadmin.ip.fields.bill-date')</th>
                        <th>@lang('quickadmin.ip.fields.ip-no')</th>
                        <th>@lang('quickadmin.ip.fields.patient-name')</th>
                        <th>@lang('quickadmin.ip.fields.country')</th>
                        <th>@lang('quickadmin.ip.fields.state')</th>
                        <th>@lang('quickadmin.ip.fields.city')</th>
                        <th>@lang('quickadmin.ip.fields.bill-no')</th>
                        <th>@lang('quickadmin.ip.fields.customer-name')</th>
                        <th>@lang('quickadmin.ip.fields.total-service-amount')</th>
                        <th>@lang('quickadmin.ip.fields.tax-amount')</th>
                        <th>@lang('quickadmin.ip.fields.total-bill-amount')</th>
                        <th>@lang('quickadmin.ip.fields.tcs-tax')</th>
                        <th>@lang('quickadmin.ip.fields.discount-amount')</th>
                        <th>@lang('quickadmin.ip.fields.doctor-name')</th>
                        <th>@lang('quickadmin.ip.fields.speciality')</th>
                        <th>@lang('quickadmin.ip.fields.surgical-package-name')</th>
                        <th>@lang('quickadmin.ip.fields.total-pharmacy-amount')</th>
                        <th>@lang('quickadmin.ip.fields.pharmacy-amt')</th>
                        <th>@lang('quickadmin.ip.fields.total-consumables')</th>
                        <th>@lang('quickadmin.ip.fields.bill-to')</th>
                        <th>@lang('quickadmin.ppn-payments.fields.avipid')</th>
                        <th>@lang('quickadmin.avip.fields.name')</th>
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
                        <th>@lang('quickadmin.avip.fields.oracle-code')</th>
                        <th>@lang('quickadmin.avip.fields.rate-details')</th>
                        <th>@lang('quickadmin.avip.fields.state')</th>
                        <th>@lang('quickadmin.avip.fields.pin-code')</th>
                        <th>@lang('quickadmin.ppn-payments.fields.mapping')</th>
                        <th>@lang('quickadmin.message-mapping.fields.channel')</th>
                        <th>@lang('quickadmin.message-mapping.fields.message')</th>
                        <th>@lang('quickadmin.message-mapping.fields.source')</th>
                        <th>@lang('quickadmin.message-mapping.fields.referrer-name')</th>
                        <th>@lang('quickadmin.message-mapping.fields.intimation-date-time')</th>
                        <th>@lang('quickadmin.ppn-payments.fields.total-bill')</th>
                        <th>@lang('quickadmin.ppn-payments.fields.total-pharmacy')</th>
                        <th>@lang('quickadmin.ppn-payments.fields.total-consumable')</th>
                        <th>@lang('quickadmin.ppn-payments.fields.rate-details')</th>
                        <th>@lang('quickadmin.ppn-payments.fields.on-total-bill')</th>
                        <th>@lang('quickadmin.ppn-payments.fields.type')</th>
                        <th>@lang('quickadmin.ppn-payments.fields.eligible-bill-amount')</th>
                        <th>@lang('quickadmin.ppn-payments.fields.percentage')</th>
                        <th>@lang('quickadmin.ppn-payments.fields.amount')</th>
                        <th>@lang('quickadmin.ppn-payments.fields.status')</th>
                        <th>@lang('quickadmin.ppn-payments.fields.remarks')</th>
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
        @can('ppn_payment_delete')
            @if ( request('show_deleted') != 1 ) window.route_mass_crud_entries_destroy = '{{ route('admin.ppn_payments.mass_destroy') }}'; @endif
        @endcan
        $(document).ready(function () {
            window.dtDefaultOptions.ajax = '{!! route('admin.ppn_payments.index') !!}?show_deleted={{ request('show_deleted') }}';
            window.dtDefaultOptions.columns = [@can('ppn_payment_delete')
                @if ( request('show_deleted') != 1 )
                    {data: 'massDelete', name: 'id', searchable: false, sortable: false},
                @endif
                @endcan{data: 'month', name: 'month'},
                {data: 'patientid.uhid', name: 'patientid.uhid'},
                {data: 'patientid.bill_date', name: 'patientid.bill_date'},
                {data: 'patientid.ip_no', name: 'patientid.ip_no'},
                {data: 'patientid.patient_name', name: 'patientid.patient_name'},
                {data: 'patientid.country', name: 'patientid.country'},
                {data: 'patientid.state', name: 'patientid.state'},
                {data: 'patientid.city', name: 'patientid.city'},
                {data: 'patientid.bill_no', name: 'patientid.bill_no'},
                {data: 'patientid.customer_name', name: 'patientid.customer_name'},
                {data: 'patientid.total_service_amount', name: 'patientid.total_service_amount'},
                {data: 'patientid.tax_amount', name: 'patientid.tax_amount'},
                {data: 'patientid.total_bill_amount', name: 'patientid.total_bill_amount'},
                {data: 'patientid.tcs_tax', name: 'patientid.tcs_tax'},
                {data: 'patientid.discount_amount', name: 'patientid.discount_amount'},
                {data: 'patientid.doctor_name', name: 'patientid.doctor_name'},
                {data: 'patientid.speciality', name: 'patientid.speciality'},
                {data: 'patientid.surgical_package_name', name: 'patientid.surgical_package_name'},
                {data: 'patientid.total_pharmacy_amount', name: 'patientid.total_pharmacy_amount'},
                {data: 'patientid.pharmacy_amt', name: 'patientid.pharmacy_amt'},
                {data: 'patientid.total_consumables', name: 'patientid.total_consumables'},
                {data: 'patientid.bill_to', name: 'patientid.bill_to'},
                {data: 'avipid.pan_number', name: 'avipid.pan_number'},
                {data: 'avipid.name', name: 'avipid.name'},
                {data: 'avipid.address_1', name: 'avipid.address_1'},
                {data: 'avipid.address_2', name: 'avipid.address_2'},
                {data: 'avipid.bank_name', name: 'avipid.bank_name'},
                {data: 'avipid.bank_address', name: 'avipid.bank_address'},
                {data: 'avipid.account_no', name: 'avipid.account_no'},
                {data: 'avipid.swift_code', name: 'avipid.swift_code'},
                {data: 'avipid.iban_number', name: 'avipid.iban_number'},
                {data: 'avipid.bank_code', name: 'avipid.bank_code'},
                {data: 'avipid.correspondence_bank_name', name: 'avipid.correspondence_bank_name'},
                {data: 'avipid.correspondence_ac_no', name: 'avipid.correspondence_ac_no'},
                {data: 'avipid.corp_swift_code', name: 'avipid.corp_swift_code'},
                {data: 'avipid.ifsc_code', name: 'avipid.ifsc_code'},
                {data: 'avipid.oracle_code', name: 'avipid.oracle_code'},
                {data: 'avipid.rate_details', name: 'avipid.rate_details'},
                {data: 'avipid.state', name: 'avipid.state'},
                {data: 'avipid.pin_code', name: 'avipid.pin_code'},
                {data: 'mapping.patient_name', name: 'mapping.patient_name'},
                {data: 'mapping.channel', name: 'mapping.channel'},
                {data: 'mapping.message', name: 'mapping.message'},
                {data: 'mapping.source', name: 'mapping.source'},
                {data: 'mapping.referrer_name', name: 'mapping.referrer_name'},
                {data: 'mapping.intimation_date_time', name: 'mapping.intimation_date_time'},
                {data: 'total_bill', name: 'total_bill'},
                {data: 'total_pharmacy', name: 'total_pharmacy'},
                {data: 'total_consumable', name: 'total_consumable'},
                {data: 'rate_details', name: 'rate_details'},
                {data: 'on_total_bill', name: 'on_total_bill'},
                {data: 'type', name: 'type'},
                {data: 'eligible_bill_amount', name: 'eligible_bill_amount'},
                {data: 'percentage', name: 'percentage'},
                {data: 'amount', name: 'amount'},
                {data: 'status', name: 'status'},
                {data: 'remarks', name: 'remarks'},
                
                {data: 'actions', name: 'actions', searchable: false, sortable: false}
            ];
            processAjaxTables();
        });
    </script>
@endsection