@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.referral-data.title')</h3>

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_view')
        </div>

        <div class="panel-body table-responsive">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>@lang('quickadmin.referral-data.fields.month')</th>
                            <td field-key='month'>{{ $referral_data->month }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.referral-data.fields.date-time-of-int')</th>
                            <td field-key='date_time_of_int'>{{ $referral_data->date_time_of_int }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.referral-data.fields.executive')</th>
                            <td field-key='executive'>{{ $referral_data->executive }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.referral-data.fields.area')</th>
                            <td field-key='area'>{{ $referral_data->area }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.referral-data.fields.patient-name')</th>
                            <td field-key='patient_name'>{{ $referral_data->patient_name }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.referral-data.fields.uhid')</th>
                            <td field-key='uhid'>{{ $referral_data->uhid }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.referral-data.fields.date-time-of-reg')</th>
                            <td field-key='date_time_of_reg'>{{ $referral_data->date_time_of_reg }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.referral-data.fields.ip-no')</th>
                            <td field-key='ip_no'>{{ $referral_data->ip_no }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.referral-data.fields.bill-no')</th>
                            <td field-key='bill_no'>{{ $referral_data->bill_no }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.referral-data.fields.admission-time')</th>
                            <td field-key='admission_time'>{{ $referral_data->admission_time }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.referral-data.fields.date-of-discharged')</th>
                            <td field-key='date_of_discharged'>{{ $referral_data->date_of_discharged }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.referral-data.fields.procedure-name')</th>
                            <td field-key='procedure_name'>{{ $referral_data->procedure_name }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.referral-data.fields.dr-name-aic')</th>
                            <td field-key='dr_name_aic'>{{ $referral_data->dr_name_aic }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.referral-data.fields.total-bill-amount')</th>
                            <td field-key='total_bill_amount'>{{ $referral_data->total_bill_amount }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.referral-data.fields.net-amount')</th>
                            <td field-key='net_amount'>{{ $referral_data->net_amount }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.referral-data.fields.aic-fee')</th>
                            <td field-key='aic_fee'>{{ $referral_data->aic_fee }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.referral-data.fields.fee-percent')</th>
                            <td field-key='fee_percent'>{{ $referral_data->fee_percent }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.referral-data.fields.treating-consultant')</th>
                            <td field-key='treating_consultant'>{{ $referral_data->treating_consultant }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.referral-data.fields.department')</th>
                            <td field-key='department'>{{ $referral_data->department }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.referral-data.fields.pan-no')</th>
                            <td field-key='pan_no'>{{ $referral_data->pan_no }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.referral-data.fields.remarks')</th>
                            <td field-key='remarks'>{{ $referral_data->remarks }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.referral-data.fields.message')</th>
                            <td field-key='message'>{{ $referral_data->message }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.referral-data.fields.msg-date-time')</th>
                            <td field-key='msg_date_time'>{{ $referral_data->msg_date_time }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.referral-data.fields.consumable')</th>
                            <td field-key='consumable'>{{ $referral_data->consumable }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.referral-data.fields.ward-pharmacy')</th>
                            <td field-key='ward_pharmacy'>{{ $referral_data->ward_pharmacy }}</td>
                        </tr>
                    </table>
                </div>
            </div>

            <p>&nbsp;</p>

            <a href="{{ route('admin.referral_datas.index') }}" class="btn btn-default">@lang('quickadmin.qa_back_to_list')</a>
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
