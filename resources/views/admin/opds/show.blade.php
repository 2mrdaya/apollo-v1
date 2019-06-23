@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.opd.title')</h3>

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_view')
        </div>

        <div class="panel-body table-responsive">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>@lang('quickadmin.opd.fields.bill-date')</th>
                            <td field-key='bill_date'>{{ $opd->bill_date }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.opd.fields.bill-no')</th>
                            <td field-key='bill_no'>{{ $opd->bill_no }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.opd.fields.uhid')</th>
                            <td field-key='uhid'>{{ $opd->uhid }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.opd.fields.patient-number')</th>
                            <td field-key='patient_number'>{{ $opd->patient_number }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.opd.fields.pname')</th>
                            <td field-key='pname'>{{ $opd->pname }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.opd.fields.bill-type')</th>
                            <td field-key='bill_type'>{{ $opd->bill_type }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.opd.fields.bill-amount')</th>
                            <td field-key='bill_amount'>{{ $opd->bill_amount }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.opd.fields.discount-amount')</th>
                            <td field-key='discount_amount'>{{ $opd->discount_amount }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.opd.fields.net-amount')</th>
                            <td field-key='net_amount'>{{ $opd->net_amount }}</td>
                        </tr>
                    </table>
                </div>
            </div>

            <p>&nbsp;</p>

            <a href="{{ route('admin.opds.index') }}" class="btn btn-default">@lang('quickadmin.qa_back_to_list')</a>
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
