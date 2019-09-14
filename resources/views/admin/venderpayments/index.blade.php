@inject('request', 'Illuminate\Http\Request')
@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.venderpayment.title')</h3>
    @can('venderpayment_create')
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
                        <th>@lang('Vendor')</th>
                        <th>@lang('Month')</th>
                        <th>@lang('quickadmin.venderpayment.fields.name')</th>
                        <th>@lang('quickadmin.venderpayment.fields.oracle-code')</th>
                        <th>@lang('quickadmin.venderpayment.fields.pan')</th>
                        <th>@lang('quickadmin.venderpayment.fields.bill-amount')</th>
                        <th>@lang('quickadmin.venderpayment.fields.total-pharmacy')</th>
                        <th>@lang('quickadmin.venderpayment.fields.total-consumables')</th>
                        <th>@lang('quickadmin.venderpayment.fields.gst-amount')</th>
                        <th>@lang('quickadmin.venderpayment.fields.tds-amount')</th>
                        <th>@lang('quickadmin.venderpayment.fields.payable-amount')</th>
                        <th>@lang('quickadmin.venderpayment.fields.net-bill-amount')</th>
                        <th>@lang('quickadmin.venderpayment.fields.account-no')</th>
                        <th>@lang('quickadmin.venderpayment.fields.ifsc-code')</th>
                        <th>@lang('quickadmin.venderpayment.fields.bank-name')</th>
                        <th>@lang('quickadmin.venderpayment.fields.address')</th>
                        <th>@lang('quickadmin.venderpayment.fields.iban-number')</th>
                        <th>@lang('quickadmin.venderpayment.fields.swift-code')</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
@stop

@section('javascript')
    <script>
                $(document).ready(function () {
            window.dtDefaultOptions.ajax = '{!! route('admin.venderpayments.index') !!}';
            window.dtDefaultOptions.columns = [
                {data: 'vendor', name: 'vendor'},
                {data: 'month', name: 'month'},
                {data: 'name', name: 'name'},
                {data: 'oracle_code', name: 'oracle_code'},
                {data: 'pan', name: 'pan'},
                {data: 'bill_amount', name: 'bill_amount'},
                {data: 'total_pharmacy', name: 'total_pharmacy'},
                {data: 'total_consumables', name: 'total_consumables'},
                {data: 'gst_amount', name: 'gst_amount'},
                {data: 'tds_amount', name: 'tds_amount'},
                {data: 'payable_amount', name: 'payable_amount'},
                {data: 'net_bill_amount', name: 'net_bill_amount'},
                {data: 'account_no', name: 'account_no'},
                {data: 'ifsc_code', name: 'ifsc_code'},
                {data: 'bank_name', name: 'bank_name'},
                {data: 'address', name: 'address'},
                {data: 'iban_number', name: 'iban_number'},
                {data: 'swift_code', name: 'swift_code'}
            ];
            processAjaxTables();
        });
    </script>
@endsection
