@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.venderpayment.title')</h3>

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_view')
        </div>

        <div class="panel-body table-responsive">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>@lang('quickadmin.venderpayment.fields.name')</th>
                            <td field-key='name'>{{ $venderpayment->name }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.venderpayment.fields.oracle-code')</th>
                            <td field-key='oracle_code'>{{ $venderpayment->oracle_code }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.venderpayment.fields.pan')</th>
                            <td field-key='pan'>{{ $venderpayment->pan }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.venderpayment.fields.bill-amount')</th>
                            <td field-key='bill_amount'>{{ $venderpayment->bill_amount }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.venderpayment.fields.total-pharmacy')</th>
                            <td field-key='total_pharmacy'>{{ $venderpayment->total_pharmacy }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.venderpayment.fields.total-consumables')</th>
                            <td field-key='total_consumables'>{{ $venderpayment->total_consumables }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.venderpayment.fields.gst-amount')</th>
                            <td field-key='gst_amount'>{{ $venderpayment->gst_amount }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.venderpayment.fields.tds-amount')</th>
                            <td field-key='tds_amount'>{{ $venderpayment->tds_amount }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.venderpayment.fields.payable-amount')</th>
                            <td field-key='payable_amount'>{{ $venderpayment->payable_amount }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.venderpayment.fields.net-bill-amount')</th>
                            <td field-key='net_bill_amount'>{{ $venderpayment->net_bill_amount }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.venderpayment.fields.account-no')</th>
                            <td field-key='account_no'>{{ $venderpayment->account_no }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.venderpayment.fields.ifsc-code')</th>
                            <td field-key='ifsc_code'>{{ $venderpayment->ifsc_code }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.venderpayment.fields.bank-name')</th>
                            <td field-key='bank_name'>{{ $venderpayment->bank_name }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.venderpayment.fields.address')</th>
                            <td field-key='address'>{{ $venderpayment->address }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.venderpayment.fields.iban-number')</th>
                            <td field-key='iban_number'>{{ $venderpayment->iban_number }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.venderpayment.fields.swift-code')</th>
                            <td field-key='swift_code'>{{ $venderpayment->swift_code }}</td>
                        </tr>
                    </table>
                </div>
            </div>

            <p>&nbsp;</p>

            <a href="{{ route('admin.venderpayments.index') }}" class="btn btn-default">@lang('quickadmin.qa_back_to_list')</a>
        </div>
    </div>
@stop


