@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.ppn-payments.title')</h3>

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_view')
        </div>

        <div class="panel-body table-responsive">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>@lang('quickadmin.ppn-payments.fields.month')</th>
                            <td field-key='month'>{{ $ppn_payment->month }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.ppn-payments.fields.patientid')</th>
                            <td field-key='patientid'>{{ $ppn_payment->patientid->uhid ?? '' }}</td>
<td field-key='bill_date'>{{ isset($ppn_payment->patientid) ? $ppn_payment->patientid->bill_date : '' }}</td>
<td field-key='ip_no'>{{ isset($ppn_payment->patientid) ? $ppn_payment->patientid->ip_no : '' }}</td>
<td field-key='patient_name'>{{ isset($ppn_payment->patientid) ? $ppn_payment->patientid->patient_name : '' }}</td>
<td field-key='country'>{{ isset($ppn_payment->patientid) ? $ppn_payment->patientid->country : '' }}</td>
<td field-key='state'>{{ isset($ppn_payment->patientid) ? $ppn_payment->patientid->state : '' }}</td>
<td field-key='city'>{{ isset($ppn_payment->patientid) ? $ppn_payment->patientid->city : '' }}</td>
<td field-key='bill_no'>{{ isset($ppn_payment->patientid) ? $ppn_payment->patientid->bill_no : '' }}</td>
<td field-key='customer_name'>{{ isset($ppn_payment->patientid) ? $ppn_payment->patientid->customer_name : '' }}</td>
<td field-key='total_service_amount'>{{ isset($ppn_payment->patientid) ? $ppn_payment->patientid->total_service_amount : '' }}</td>
<td field-key='tax_amount'>{{ isset($ppn_payment->patientid) ? $ppn_payment->patientid->tax_amount : '' }}</td>
<td field-key='total_bill_amount'>{{ isset($ppn_payment->patientid) ? $ppn_payment->patientid->total_bill_amount : '' }}</td>
<td field-key='tcs_tax'>{{ isset($ppn_payment->patientid) ? $ppn_payment->patientid->tcs_tax : '' }}</td>
<td field-key='discount_amount'>{{ isset($ppn_payment->patientid) ? $ppn_payment->patientid->discount_amount : '' }}</td>
<td field-key='doctor_name'>{{ isset($ppn_payment->patientid) ? $ppn_payment->patientid->doctor_name : '' }}</td>
<td field-key='speciality'>{{ isset($ppn_payment->patientid) ? $ppn_payment->patientid->speciality : '' }}</td>
<td field-key='surgical_package_name'>{{ isset($ppn_payment->patientid) ? $ppn_payment->patientid->surgical_package_name : '' }}</td>
<td field-key='total_pharmacy_amount'>{{ isset($ppn_payment->patientid) ? $ppn_payment->patientid->total_pharmacy_amount : '' }}</td>
<td field-key='pharmacy_amt'>{{ isset($ppn_payment->patientid) ? $ppn_payment->patientid->pharmacy_amt : '' }}</td>
<td field-key='total_consumables'>{{ isset($ppn_payment->patientid) ? $ppn_payment->patientid->total_consumables : '' }}</td>
<td field-key='bill_to'>{{ isset($ppn_payment->patientid) ? $ppn_payment->patientid->bill_to : '' }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.ppn-payments.fields.avipid')</th>
                            <td field-key='avipid'>{{ $ppn_payment->avipid->pan_number ?? '' }}</td>
<td field-key='name'>{{ isset($ppn_payment->avipid) ? $ppn_payment->avipid->name : '' }}</td>
<td field-key='address_1'>{{ isset($ppn_payment->avipid) ? $ppn_payment->avipid->address_1 : '' }}</td>
<td field-key='address_2'>{{ isset($ppn_payment->avipid) ? $ppn_payment->avipid->address_2 : '' }}</td>
<td field-key='bank_name'>{{ isset($ppn_payment->avipid) ? $ppn_payment->avipid->bank_name : '' }}</td>
<td field-key='bank_address'>{{ isset($ppn_payment->avipid) ? $ppn_payment->avipid->bank_address : '' }}</td>
<td field-key='account_no'>{{ isset($ppn_payment->avipid) ? $ppn_payment->avipid->account_no : '' }}</td>
<td field-key='swift_code'>{{ isset($ppn_payment->avipid) ? $ppn_payment->avipid->swift_code : '' }}</td>
<td field-key='iban_number'>{{ isset($ppn_payment->avipid) ? $ppn_payment->avipid->iban_number : '' }}</td>
<td field-key='bank_code'>{{ isset($ppn_payment->avipid) ? $ppn_payment->avipid->bank_code : '' }}</td>
<td field-key='correspondence_bank_name'>{{ isset($ppn_payment->avipid) ? $ppn_payment->avipid->correspondence_bank_name : '' }}</td>
<td field-key='correspondence_ac_no'>{{ isset($ppn_payment->avipid) ? $ppn_payment->avipid->correspondence_ac_no : '' }}</td>
<td field-key='corp_swift_code'>{{ isset($ppn_payment->avipid) ? $ppn_payment->avipid->corp_swift_code : '' }}</td>
<td field-key='ifsc_code'>{{ isset($ppn_payment->avipid) ? $ppn_payment->avipid->ifsc_code : '' }}</td>
<td field-key='oracle_code'>{{ isset($ppn_payment->avipid) ? $ppn_payment->avipid->oracle_code : '' }}</td>
<td field-key='rate_details'>{{ isset($ppn_payment->avipid) ? $ppn_payment->avipid->rate_details : '' }}</td>
<td field-key='state'>{{ isset($ppn_payment->avipid) ? $ppn_payment->avipid->state : '' }}</td>
<td field-key='pin_code'>{{ isset($ppn_payment->avipid) ? $ppn_payment->avipid->pin_code : '' }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.ppn-payments.fields.mapping')</th>
                            <td field-key='mapping'>{{ $ppn_payment->mapping->patient_name ?? '' }}</td>
<td field-key='channel'>{{ isset($ppn_payment->mapping) ? $ppn_payment->mapping->channel : '' }}</td>
<td field-key='message'>{{ isset($ppn_payment->mapping) ? $ppn_payment->mapping->message : '' }}</td>
<td field-key='source'>{{ isset($ppn_payment->mapping) ? $ppn_payment->mapping->source : '' }}</td>
<td field-key='referrer_name'>{{ isset($ppn_payment->mapping) ? $ppn_payment->mapping->referrer_name : '' }}</td>
<td field-key='intimation_date_time'>{{ isset($ppn_payment->mapping) ? $ppn_payment->mapping->intimation_date_time : '' }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.ppn-payments.fields.total-bill')</th>
                            <td field-key='total_bill'>{{ $ppn_payment->total_bill }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.ppn-payments.fields.total-pharmacy')</th>
                            <td field-key='total_pharmacy'>{{ $ppn_payment->total_pharmacy }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.ppn-payments.fields.total-consumable')</th>
                            <td field-key='total_consumable'>{{ $ppn_payment->total_consumable }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.ppn-payments.fields.rate-details')</th>
                            <td field-key='rate_details'>{{ $ppn_payment->rate_details }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.ppn-payments.fields.on-total-bill')</th>
                            <td field-key='on_total_bill'>{{ $ppn_payment->on_total_bill }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.ppn-payments.fields.type')</th>
                            <td field-key='type'>{{ $ppn_payment->type }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.ppn-payments.fields.eligible-bill-amount')</th>
                            <td field-key='eligible_bill_amount'>{{ $ppn_payment->eligible_bill_amount }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.ppn-payments.fields.percentage')</th>
                            <td field-key='percentage'>{{ $ppn_payment->percentage }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.ppn-payments.fields.amount')</th>
                            <td field-key='amount'>{{ $ppn_payment->amount }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.ppn-payments.fields.status')</th>
                            <td field-key='status'>{{ $ppn_payment->status }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.ppn-payments.fields.remarks')</th>
                            <td field-key='remarks'>{!! $ppn_payment->remarks !!}</td>
                        </tr>
                    </table>
                </div>
            </div>

            <p>&nbsp;</p>

            <a href="{{ route('admin.ppn_payments.index') }}" class="btn btn-default">@lang('quickadmin.qa_back_to_list')</a>
        </div>
    </div>
@stop


