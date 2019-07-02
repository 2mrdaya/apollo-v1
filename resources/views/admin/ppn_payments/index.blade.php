@inject('request', 'Illuminate\Http\Request')
@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.ppn-payments.title')</h3>
    @can('ppn_payment_create')
    <p>


    </p>
    @endcan



    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_list')
        </div>

        <div class="panel-body table-responsive">
            <table class="table table-bordered table-striped ajaxTable ">
                <thead>
                    <tr>

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
                        <th>pan_number</th>
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
                        <th>Message</th>
                        <th>Channel</th>
                        <th>Source</th>
                        <th>Message Time</th>
                        <th>Registration Time</th>
                        <th>Status</th>
                        <th>On Total Bill</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
@stop

@section('javascript')
    <script>
        $(document).ready(function () {
            window.dtDefaultOptions.ajax = '{!! route('admin.ppn_payments.index') !!}?show_deleted={{ request('show_deleted') }}';
            window.dtDefaultOptions.columns = [{data: 'month', name: 'month'},
                {data: 'uhid', name: 'uhid'},
                {data: 'bill_date', name: 'bill_date'},
                {data: 'ip_no', name: 'ip_no'},
                {data: 'patient_name', name: 'patient_name'},
                {data: 'country', name: 'country'},
                {data: 'state', name: 'state'},
                {data: 'city', name: 'city'},
                {data: 'bill_no', name: 'bill_no'},
                {data: 'customer_name', name: 'customer_name'},
                {data: 'total_service_amount', name: 'total_service_amount'},
                {data: 'tax_amount', name: 'tax_amount'},
                {data: 'total_bill_amount', name: 'total_bill_amount'},
                {data: 'tcs_tax', name: 'tcs_tax'},
                {data: 'discount_amount', name: 'discount_amount'},
                {data: 'doctor_name', name: 'doctor_name'},
                {data: 'speciality', name: 'speciality'},
                {data: 'surgical_package_name', name: 'surgical_package_name'},
                {data: 'total_pharmacy_amount', name: 'total_pharmacy_amount'},
                {data: 'pharmacy_amt', name: 'pharmacy_amt'},
                {data: 'total_consumables', name: 'total_consumables'},
                {data: 'bill_to', name: 'bill_to'},
                {data: 'pan_number', name: 'pan_number'},
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
                {data: 'oracle_code', name: 'oracle_code'},
                {data: 'rate_details', name: 'rate_details'},
                {data: 'avips.state', name: 'state'},
                {data: 'pin_code', name: 'pin_code'},
                {data: 'message', name: 'message'},
                {data: 'channel', name: 'channel'},
                {data: 'source', name: 'source'},
                {data: 'intimation_date_time', name: 'intimation_date_time'},
                {data: 'registration_date', name: 'registration_date'},
                {data: 'status', name: 'status'},
                {data: 'on_total_Bill', name: 'on_total_Bill',
                    render : function (data) {
                        htmlObj = '<select name="on_total_Bill" id ="on_total_Bill">';
                        htmlObj = htmlObj + '<option>Yes</option>';
                        htmlObj = htmlObj + '<option>No</option>';
                        htmlObj = htmlObj + '</select>';
                        return htmlObj;
                    }
                }
            ];
            processAjaxTables();
        });
    </script>
@endsection
