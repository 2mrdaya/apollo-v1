@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.ip.title')</h3>

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_view')
        </div>

        <div class="panel-body table-responsive">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>@lang('quickadmin.ip.fields.uhid')</th>
                            <td field-key='uhid'>{{ $ip->uhid }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.ip.fields.bill-date')</th>
                            <td field-key='bill_date'>{{ $ip->bill_date }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.ip.fields.ip-no')</th>
                            <td field-key='ip_no'>{{ $ip->ip_no }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.ip.fields.patient-name')</th>
                            <td field-key='patient_name'>{{ $ip->patient_name }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.ip.fields.country')</th>
                            <td field-key='country'>{{ $ip->country }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.ip.fields.state')</th>
                            <td field-key='state'>{{ $ip->state }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.ip.fields.city')</th>
                            <td field-key='city'>{{ $ip->city }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.ip.fields.bill-no')</th>
                            <td field-key='bill_no'>{{ $ip->bill_no }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.ip.fields.customer-name')</th>
                            <td field-key='customer_name'>{{ $ip->customer_name }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.ip.fields.total-service-amount')</th>
                            <td field-key='total_service_amount'>{{ $ip->total_service_amount }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.ip.fields.tax-amount')</th>
                            <td field-key='tax_amount'>{{ $ip->tax_amount }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.ip.fields.total-bill-amount')</th>
                            <td field-key='total_bill_amount'>{{ $ip->total_bill_amount }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.ip.fields.tcs-tax')</th>
                            <td field-key='tcs_tax'>{{ $ip->tcs_tax }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.ip.fields.discount-amount')</th>
                            <td field-key='discount_amount'>{{ $ip->discount_amount }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.ip.fields.doctor-name')</th>
                            <td field-key='doctor_name'>{{ $ip->doctor_name }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.ip.fields.speciality')</th>
                            <td field-key='speciality'>{{ $ip->speciality }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.ip.fields.surgical-package-name')</th>
                            <td field-key='surgical_package_name'>{{ $ip->surgical_package_name }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.ip.fields.total-pharmacy-amount')</th>
                            <td field-key='total_pharmacy_amount'>{{ $ip->total_pharmacy_amount }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.ip.fields.pharmacy-amt')</th>
                            <td field-key='pharmacy_amt'>{{ $ip->pharmacy_amt }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.ip.fields.total-consumables')</th>
                            <td field-key='total_consumables'>{{ $ip->total_consumables }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.ip.fields.bill-to')</th>
                            <td field-key='bill_to'>{{ $ip->bill_to }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.ip.fields.admission-date')</th>
                            <td field-key='admission_date'>{{ $ip->admission_date }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.ip.fields.discharge-date')</th>
                            <td field-key='discharge_date'>{{ $ip->discharge_date }}</td>
                        </tr>
                    </table>
                </div>
            </div><!-- Nav tabs -->
<ul class="nav nav-tabs" role="tablist">
    
<li role="presentation" class="active"><a href="#referral_data_final" aria-controls="referral_data_final" role="tab" data-toggle="tab">Final Referral Data Import</a></li>
</ul>

<!-- Tab panes -->
<div class="tab-content">
    
<div role="tabpanel" class="tab-pane active" id="referral_data_final">
<table class="table table-bordered table-striped {{ count($referral_data_finals) > 0 ? 'datatable' : '' }}">
    <thead>
        <tr>
            <th>@lang('quickadmin.referral-data-final.fields.vendor')</th>
                        <th>@lang('quickadmin.referral-data-final.fields.month')</th>
                        <th>@lang('quickadmin.referral-data-final.fields.msg-desc')</th>
                        <th>@lang('quickadmin.referral-data-final.fields.doi-as-per-whats-app')</th>
                        <th>@lang('quickadmin.referral-data-final.fields.doi-as-per-sw')</th>
                        <th>@lang('quickadmin.referral-data-final.fields.area')</th>
                        <th>@lang('quickadmin.referral-data-final.fields.uhid')</th>
                        <th>@lang('quickadmin.referral-data-final.fields.ip-no')</th>
                        <th>@lang('quickadmin.referral-data-final.fields.dr-name-aic')</th>
                        <th>@lang('quickadmin.referral-data-final.fields.fee-percent')</th>
                        <th>@lang('quickadmin.referral-data-final.fields.aic-fee')</th>
                        <th>@lang('quickadmin.referral-data-final.fields.pan-no')</th>
                        <th>@lang('quickadmin.referral-data-final.fields.pateint-name-msg')</th>
                        <th>@lang('quickadmin.referral-data-final.fields.avip-name-msg')</th>
                        <th>@lang('quickadmin.referral-data-final.fields.remarks')</th>
                        <th>@lang('quickadmin.referral-data-final.fields.approve')</th>
                        <th>@lang('quickadmin.referral-data-final.fields.status')</th>
                        <th>@lang('quickadmin.referral-data-final.fields.ip')</th>
                        <th>@lang('quickadmin.referral-data-final.fields.message')</th>
                        <th>@lang('quickadmin.referral-data-final.fields.patient')</th>
                        <th>@lang('quickadmin.referral-data-final.fields.avip')</th>
                        @if( request('show_deleted') == 1 )
                        <th>&nbsp;</th>
                        @else
                        <th>&nbsp;</th>
                        @endif
        </tr>
    </thead>

    <tbody>
        @if (count($referral_data_finals) > 0)
            @foreach ($referral_data_finals as $referral_data_final)
                <tr data-entry-id="{{ $referral_data_final->id }}">
                    <td field-key='vendor'>{{ $referral_data_final->vendor }}</td>
                                <td field-key='month'>{{ $referral_data_final->month }}</td>
                                <td field-key='msg_desc'>{{ $referral_data_final->msg_desc }}</td>
                                <td field-key='doi_as_per_whats_app'>{{ $referral_data_final->doi_as_per_whats_app }}</td>
                                <td field-key='doi_as_per_sw'>{{ $referral_data_final->doi_as_per_sw }}</td>
                                <td field-key='area'>{{ $referral_data_final->area }}</td>
                                <td field-key='uhid'>{{ $referral_data_final->uhid }}</td>
                                <td field-key='ip_no'>{{ $referral_data_final->ip_no }}</td>
                                <td field-key='dr_name_aic'>{{ $referral_data_final->dr_name_aic }}</td>
                                <td field-key='fee_percent'>{{ $referral_data_final->fee_percent }}</td>
                                <td field-key='aic_fee'>{{ $referral_data_final->aic_fee }}</td>
                                <td field-key='pan_no'>{{ $referral_data_final->pan_no }}</td>
                                <td field-key='pateint_name_msg'>{{ $referral_data_final->pateint_name_msg }}</td>
                                <td field-key='avip_name_msg'>{{ $referral_data_final->avip_name_msg }}</td>
                                <td field-key='remarks'>{{ $referral_data_final->remarks }}</td>
                                <td field-key='approve'>{{ Form::checkbox("approve", 1, $referral_data_final->approve == 1 ? true : false, ["disabled"]) }}</td>
                                <td field-key='status'>{{ $referral_data_final->status }}</td>
                                <td field-key='ip'>{{ $referral_data_final->ip->ip_no ?? '' }}</td>
                                <td field-key='message'>{{ $referral_data_final->message->source ?? '' }}</td>
                                <td field-key='patient'>{{ $referral_data_final->patient->uhid ?? '' }}</td>
                                <td field-key='avip'>{{ $referral_data_final->avip->name ?? '' }}</td>
                                @if( request('show_deleted') == 1 )
                                <td>
                                    @can('referral_data_final_delete')
                                                                        {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'POST',
                                        'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
                                        'route' => ['admin.referral_data_finals.restore', $referral_data_final->id])) !!}
                                    {!! Form::submit(trans('quickadmin.qa_restore'), array('class' => 'btn btn-xs btn-success')) !!}
                                    {!! Form::close() !!}
                                @endcan
                                    @can('referral_data_final_delete')
                                                                        {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
                                        'route' => ['admin.referral_data_finals.perma_del', $referral_data_final->id])) !!}
                                    {!! Form::submit(trans('quickadmin.qa_permadel'), array('class' => 'btn btn-xs btn-danger')) !!}
                                    {!! Form::close() !!}
                                @endcan
                                </td>
                                @else
                                <td>
                                    @can('referral_data_final_view')
                                    <a href="{{ route('admin.referral_data_finals.show',[$referral_data_final->id]) }}" class="btn btn-xs btn-primary">@lang('quickadmin.qa_view')</a>
                                    @endcan
                                    @can('referral_data_final_edit')
                                    <a href="{{ route('admin.referral_data_finals.edit',[$referral_data_final->id]) }}" class="btn btn-xs btn-info">@lang('quickadmin.qa_edit')</a>
                                    @endcan
                                    @can('referral_data_final_delete')
{!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
                                        'route' => ['admin.referral_data_finals.destroy', $referral_data_final->id])) !!}
                                    {!! Form::submit(trans('quickadmin.qa_delete'), array('class' => 'btn btn-xs btn-danger')) !!}
                                    {!! Form::close() !!}
                                    @endcan
                                </td>
                                @endif
                </tr>
            @endforeach
        @else
            <tr>
                <td colspan="26">@lang('quickadmin.qa_no_entries_in_table')</td>
            </tr>
        @endif
    </tbody>
</table>
</div>
</div>

            <p>&nbsp;</p>

            <a href="{{ route('admin.ips.index') }}" class="btn btn-default">@lang('quickadmin.qa_back_to_list')</a>
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
            
            $('.date').datetimepicker({
                format: "{{ config('app.date_format_moment') }}",
                locale: "{{ App::getLocale() }}",
            });
            
            $('.datetime').datetimepicker({
                format: "{{ config('app.datetime_format_moment') }}",
                locale: "{{ App::getLocale() }}",
                sideBySide: true,
            });
            
        });
    </script>
            
@stop
