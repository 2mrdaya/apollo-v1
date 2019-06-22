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
                            <th>@lang('quickadmin.referral-data-final.fields.date-time-of-int')</th>
                            <td field-key='date_time_of_int'>{{ $referral_data_final->date_time_of_int }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.referral-data-final.fields.executive')</th>
                            <td field-key='executive'>{{ $referral_data_final->executive }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.referral-data-final.fields.area')</th>
                            <td field-key='area'>{{ $referral_data_final->area }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.referral-data-final.fields.patient-name')</th>
                            <td field-key='patient_name'>{{ $referral_data_final->patient_name }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.referral-data-final.fields.uhid')</th>
                            <td field-key='uhid'>{{ $referral_data_final->uhid }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.referral-data-final.fields.date-time-of-reg')</th>
                            <td field-key='date_time_of_reg'>{{ $referral_data_final->date_time_of_reg }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.referral-data-final.fields.ip-no')</th>
                            <td field-key='ip_no'>{{ $referral_data_final->ip_no }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.referral-data-final.fields.bill-no')</th>
                            <td field-key='bill_no'>{{ $referral_data_final->bill_no }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.referral-data-final.fields.admission-time')</th>
                            <td field-key='admission_time'>{{ $referral_data_final->admission_time }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.referral-data-final.fields.date-of-discharged')</th>
                            <td field-key='date_of_discharged'>{{ $referral_data_final->date_of_discharged }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.referral-data-final.fields.procedure-name')</th>
                            <td field-key='procedure_name'>{{ $referral_data_final->procedure_name }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.referral-data-final.fields.dr-name-aic')</th>
                            <td field-key='dr_name_aic'>{{ $referral_data_final->dr_name_aic }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.referral-data-final.fields.total-bill-amount')</th>
                            <td field-key='total_bill_amount'>{{ $referral_data_final->total_bill_amount }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.referral-data-final.fields.net-amount')</th>
                            <td field-key='net_amount'>{{ $referral_data_final->net_amount }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.referral-data-final.fields.aic-fee')</th>
                            <td field-key='aic_fee'>{{ $referral_data_final->aic_fee }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.referral-data-final.fields.fee-percent')</th>
                            <td field-key='fee_percent'>{{ $referral_data_final->fee_percent }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.referral-data-final.fields.treating-consultant')</th>
                            <td field-key='treating_consultant'>{{ $referral_data_final->treating_consultant }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.referral-data-final.fields.department')</th>
                            <td field-key='department'>{{ $referral_data_final->department }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.referral-data-final.fields.pan-no')</th>
                            <td field-key='pan_no'>{{ $referral_data_final->pan_no }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.referral-data-final.fields.remarks')</th>
                            <td field-key='remarks'>{{ $referral_data_final->remarks }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.referral-data-final.fields.message')</th>
                            <td field-key='message'>{{ $referral_data_final->message }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.referral-data-final.fields.msg-date-time')</th>
                            <td field-key='msg_date_time'>{{ $referral_data_final->msg_date_time }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.referral-data-final.fields.consumable')</th>
                            <td field-key='consumable'>{{ $referral_data_final->consumable }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.referral-data-final.fields.ward-pharmacy')</th>
                            <td field-key='ward_pharmacy'>{{ $referral_data_final->ward_pharmacy }}</td>
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
