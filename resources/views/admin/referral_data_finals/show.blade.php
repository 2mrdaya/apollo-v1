@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.referral-data-final.title')</h3>

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_view')
        </div>

        <div class="panel-body table-responsive">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>@lang('quickadmin.referral-data-final.fields.month')</th>
                            <td field-key='month'>{{ $referral_data_final->month }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.referral-data-final.fields.msg-desc')</th>
                            <td field-key='msg_desc'>{{ $referral_data_final->msg_desc }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.referral-data-final.fields.doi-as-per-whats-app')</th>
                            <td field-key='doi_as_per_whats_app'>{{ $referral_data_final->doi_as_per_whats_app }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.referral-data-final.fields.doi-as-per-sw')</th>
                            <td field-key='doi_as_per_sw'>{{ $referral_data_final->doi_as_per_sw }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.referral-data-final.fields.area')</th>
                            <td field-key='area'>{{ $referral_data_final->area }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.referral-data-final.fields.uhid')</th>
                            <td field-key='uhid'>{{ $referral_data_final->uhid }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.referral-data-final.fields.ip-no')</th>
                            <td field-key='ip_no'>{{ $referral_data_final->ip_no }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.referral-data-final.fields.dr-name-aic')</th>
                            <td field-key='dr_name_aic'>{{ $referral_data_final->dr_name_aic }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.referral-data-final.fields.fee-percent')</th>
                            <td field-key='fee_percent'>{{ $referral_data_final->fee_percent }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.referral-data-final.fields.aic-fee')</th>
                            <td field-key='aic_fee'>{{ $referral_data_final->aic_fee }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.referral-data-final.fields.pan-no')</th>
                            <td field-key='pan_no'>{{ $referral_data_final->pan_no }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.referral-data-final.fields.pateint-name-msg')</th>
                            <td field-key='pateint_name_msg'>{{ $referral_data_final->pateint_name_msg }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.referral-data-final.fields.avip-name-msg')</th>
                            <td field-key='avip_name_msg'>{{ $referral_data_final->avip_name_msg }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.referral-data-final.fields.remarks')</th>
                            <td field-key='remarks'>{{ $referral_data_final->remarks }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.referral-data-final.fields.approve')</th>
                            <td field-key='approve'>{{ Form::checkbox("approve", 1, $referral_data_final->approve == 1 ? true : false, ["disabled"]) }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.referral-data-final.fields.status')</th>
                            <td field-key='status'>{{ $referral_data_final->status }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.referral-data-final.fields.ip')</th>
                            <td field-key='ip'>{{ $referral_data_final->ip->ip_no ?? '' }}</td>
<td field-key='uhid'>{{ isset($referral_data_final->ip) ? $referral_data_final->ip->uhid : '' }}</td>
<td field-key='bill_date'>{{ isset($referral_data_final->ip) ? $referral_data_final->ip->bill_date : '' }}</td>
<td field-key='patient_name'>{{ isset($referral_data_final->ip) ? $referral_data_final->ip->patient_name : '' }}</td>
<td field-key='country'>{{ isset($referral_data_final->ip) ? $referral_data_final->ip->country : '' }}</td>
<td field-key='state'>{{ isset($referral_data_final->ip) ? $referral_data_final->ip->state : '' }}</td>
<td field-key='city'>{{ isset($referral_data_final->ip) ? $referral_data_final->ip->city : '' }}</td>
<td field-key='bill_no'>{{ isset($referral_data_final->ip) ? $referral_data_final->ip->bill_no : '' }}</td>
<td field-key='customer_name'>{{ isset($referral_data_final->ip) ? $referral_data_final->ip->customer_name : '' }}</td>
<td field-key='total_service_amount'>{{ isset($referral_data_final->ip) ? $referral_data_final->ip->total_service_amount : '' }}</td>
<td field-key='tax_amount'>{{ isset($referral_data_final->ip) ? $referral_data_final->ip->tax_amount : '' }}</td>
<td field-key='total_bill_amount'>{{ isset($referral_data_final->ip) ? $referral_data_final->ip->total_bill_amount : '' }}</td>
<td field-key='tcs_tax'>{{ isset($referral_data_final->ip) ? $referral_data_final->ip->tcs_tax : '' }}</td>
<td field-key='discount_amount'>{{ isset($referral_data_final->ip) ? $referral_data_final->ip->discount_amount : '' }}</td>
<td field-key='doctor_name'>{{ isset($referral_data_final->ip) ? $referral_data_final->ip->doctor_name : '' }}</td>
<td field-key='speciality'>{{ isset($referral_data_final->ip) ? $referral_data_final->ip->speciality : '' }}</td>
<td field-key='surgical_package_name'>{{ isset($referral_data_final->ip) ? $referral_data_final->ip->surgical_package_name : '' }}</td>
<td field-key='total_pharmacy_amount'>{{ isset($referral_data_final->ip) ? $referral_data_final->ip->total_pharmacy_amount : '' }}</td>
<td field-key='pharmacy_amt'>{{ isset($referral_data_final->ip) ? $referral_data_final->ip->pharmacy_amt : '' }}</td>
<td field-key='total_consumables'>{{ isset($referral_data_final->ip) ? $referral_data_final->ip->total_consumables : '' }}</td>
<td field-key='bill_to'>{{ isset($referral_data_final->ip) ? $referral_data_final->ip->bill_to : '' }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.referral-data-final.fields.message')</th>
                            <td field-key='message'>{{ $referral_data_final->message->source ?? '' }}</td>
<td field-key='channel'>{{ isset($referral_data_final->message) ? $referral_data_final->message->channel : '' }}</td>
<td field-key='message'>{{ isset($referral_data_final->message) ? $referral_data_final->message->message : '' }}</td>
<td field-key='patient_name'>{{ isset($referral_data_final->message) ? $referral_data_final->message->patient_name : '' }}</td>
<td field-key='referrer_name'>{{ isset($referral_data_final->message) ? $referral_data_final->message->referrer_name : '' }}</td>
<td field-key='intimation_date_time'>{{ isset($referral_data_final->message) ? $referral_data_final->message->intimation_date_time : '' }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.referral-data-final.fields.patient')</th>
                            <td field-key='patient'>{{ $referral_data_final->patient->uhid ?? '' }}</td>
<td field-key='patient_name'>{{ isset($referral_data_final->patient) ? $referral_data_final->patient->patient_name : '' }}</td>
<td field-key='registration_date'>{{ isset($referral_data_final->patient) ? $referral_data_final->patient->registration_date : '' }}</td>
<td field-key='city'>{{ isset($referral_data_final->patient) ? $referral_data_final->patient->city : '' }}</td>
<td field-key='country'>{{ isset($referral_data_final->patient) ? $referral_data_final->patient->country : '' }}</td>
<td field-key='address'>{{ isset($referral_data_final->patient) ? $referral_data_final->patient->address : '' }}</td>
<td field-key='mobile'>{{ isset($referral_data_final->patient) ? $referral_data_final->patient->mobile : '' }}</td>
<td field-key='email_id'>{{ isset($referral_data_final->patient) ? $referral_data_final->patient->email_id : '' }}</td>
<td field-key='operator_name'>{{ isset($referral_data_final->patient) ? $referral_data_final->patient->operator_name : '' }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.referral-data-final.fields.avip')</th>
                            <td field-key='avip'>{{ $referral_data_final->avip->name ?? '' }}</td>
<td field-key='address_1'>{{ isset($referral_data_final->avip) ? $referral_data_final->avip->address_1 : '' }}</td>
<td field-key='address_2'>{{ isset($referral_data_final->avip) ? $referral_data_final->avip->address_2 : '' }}</td>
<td field-key='bank_name'>{{ isset($referral_data_final->avip) ? $referral_data_final->avip->bank_name : '' }}</td>
<td field-key='bank_address'>{{ isset($referral_data_final->avip) ? $referral_data_final->avip->bank_address : '' }}</td>
<td field-key='account_no'>{{ isset($referral_data_final->avip) ? $referral_data_final->avip->account_no : '' }}</td>
<td field-key='swift_code'>{{ isset($referral_data_final->avip) ? $referral_data_final->avip->swift_code : '' }}</td>
<td field-key='iban_number'>{{ isset($referral_data_final->avip) ? $referral_data_final->avip->iban_number : '' }}</td>
<td field-key='bank_code'>{{ isset($referral_data_final->avip) ? $referral_data_final->avip->bank_code : '' }}</td>
<td field-key='correspondence_bank_name'>{{ isset($referral_data_final->avip) ? $referral_data_final->avip->correspondence_bank_name : '' }}</td>
<td field-key='correspondence_ac_no'>{{ isset($referral_data_final->avip) ? $referral_data_final->avip->correspondence_ac_no : '' }}</td>
<td field-key='corp_swift_code'>{{ isset($referral_data_final->avip) ? $referral_data_final->avip->corp_swift_code : '' }}</td>
<td field-key='ifsc_code'>{{ isset($referral_data_final->avip) ? $referral_data_final->avip->ifsc_code : '' }}</td>
<td field-key='pan_number'>{{ isset($referral_data_final->avip) ? $referral_data_final->avip->pan_number : '' }}</td>
<td field-key='oracle_code'>{{ isset($referral_data_final->avip) ? $referral_data_final->avip->oracle_code : '' }}</td>
<td field-key='rate_details'>{{ isset($referral_data_final->avip) ? $referral_data_final->avip->rate_details : '' }}</td>
<td field-key='state'>{{ isset($referral_data_final->avip) ? $referral_data_final->avip->state : '' }}</td>
<td field-key='pin_code'>{{ isset($referral_data_final->avip) ? $referral_data_final->avip->pin_code : '' }}</td>
                        </tr>
                    </table>
                </div>
            </div>

            <p>&nbsp;</p>

            <a href="{{ route('admin.referral_data_finals.index') }}" class="btn btn-default">@lang('quickadmin.qa_back_to_list')</a>
        </div>
    </div>
@stop

@section('javascript')
    @parent

    <script src="{{ url('adminlte/plugins/datetimepicker/moment-with-locales.min.js') }}"></script>
    <script src="{{ url('adminlte/plugins/datetimepicker/bootstrap-datetimepicker.min.js') }}"></script>
    <script>
        $(function(){
            moment.updateLocale('{{ App::getLocale() }}', {
                week: { dow: 1 } // Monday is the first day of the week
            });
            
            $('.datetime').datetimepicker({
                format: "{{ config('app.datetime_format_moment') }}",
                locale: "{{ App::getLocale() }}",
                sideBySide: true,
            });
            
        });
    </script>
            
@stop
