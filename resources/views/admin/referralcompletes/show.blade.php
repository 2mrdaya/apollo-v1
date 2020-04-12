@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.referralcomplete.title')</h3>

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_view')
        </div>

        <div class="panel-body table-responsive">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>@lang('quickadmin.referralcomplete.fields.vendor')</th>
                            <td field-key='vendor'>{{ $referralcomplete->vendor }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.referralcomplete.fields.month')</th>
                            <td field-key='month'>{{ $referralcomplete->month }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.referralcomplete.fields.msg-desc')</th>
                            <td field-key='msg_desc'>{{ $referralcomplete->msg_desc }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.referralcomplete.fields.doi-as-per-whats-app')</th>
                            <td field-key='doi_as_per_whats_app'>{{ $referralcomplete->doi_as_per_whats_app }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.referralcomplete.fields.doi-as-per-sw')</th>
                            <td field-key='doi_as_per_sw'>{{ $referralcomplete->doi_as_per_sw }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.referralcomplete.fields.area')</th>
                            <td field-key='area'>{{ $referralcomplete->area }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.referralcomplete.fields.uhid')</th>
                            <td field-key='uhid'>{{ $referralcomplete->uhid }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.referralcomplete.fields.oracle-code')</th>
                            <td field-key='oracle_code'>{{ $referralcomplete->oracle_code }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.referralcomplete.fields.ip-no')</th>
                            <td field-key='ip_no'>{{ $referralcomplete->ip_no }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.referralcomplete.fields.bill-no')</th>
                            <td field-key='bill_no'>{{ $referralcomplete->bill_no }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.referralcomplete.fields.dr-name-aic')</th>
                            <td field-key='dr_name_aic'>{{ $referralcomplete->dr_name_aic }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.referralcomplete.fields.pan-no')</th>
                            <td field-key='pan_no'>{{ $referralcomplete->pan_no }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.referralcomplete.fields.admission-date')</th>
                            <td field-key='admission_date'>{{ $referralcomplete->admission_date }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.referralcomplete.fields.discharge-date')</th>
                            <td field-key='discharge_date'>{{ $referralcomplete->discharge_date }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.referralcomplete.fields.registration-date')</th>
                            <td field-key='registration_date'>{{ $referralcomplete->registration_date }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.referralcomplete.fields.patient-name')</th>
                            <td field-key='patient_name'>{{ $referralcomplete->patient_name }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.referralcomplete.fields.company')</th>
                            <td field-key='company'>{{ $referralcomplete->company }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.referralcomplete.fields.country')</th>
                            <td field-key='country'>{{ $referralcomplete->country }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.referralcomplete.fields.treating-consultant')</th>
                            <td field-key='treating_consultant'>{{ $referralcomplete->treating_consultant }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.referralcomplete.fields.specialty')</th>
                            <td field-key='specialty'>{{ $referralcomplete->specialty }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.referralcomplete.fields.bill-to')</th>
                            <td field-key='bill_to'>{{ $referralcomplete->bill_to }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.referralcomplete.fields.bill-amount')</th>
                            <td field-key='bill_amount'>{{ $referralcomplete->bill_amount }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.referralcomplete.fields.pharmacy')</th>
                            <td field-key='pharmacy'>{{ $referralcomplete->pharmacy }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.referralcomplete.fields.consumable')</th>
                            <td field-key='consumable'>{{ $referralcomplete->consumable }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.referralcomplete.fields.bonus-percent')</th>
                            <td field-key='bonus_percent'>{{ $referralcomplete->bonus_percent }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.referralcomplete.fields.bonus')</th>
                            <td field-key='bonus'>{{ $referralcomplete->bonus }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.referralcomplete.fields.gst')</th>
                            <td field-key='gst'>{{ $referralcomplete->gst }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.referralcomplete.fields.fee-percent')</th>
                            <td field-key='fee_percent'>{{ $referralcomplete->fee_percent }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.referralcomplete.fields.aic-fee')</th>
                            <td field-key='aic_fee'>{{ $referralcomplete->aic_fee }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.referralcomplete.fields.remarks')</th>
                            <td field-key='remarks'>{{ $referralcomplete->remarks }}</td>
                        </tr>
                    </table>
                </div>
            </div>

            <p>&nbsp;</p>

            <a href="{{ route('admin.referralcompletes.index') }}" class="btn btn-default">@lang('quickadmin.qa_back_to_list')</a>
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
