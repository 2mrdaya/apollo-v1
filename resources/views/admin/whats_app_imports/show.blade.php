@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.whats-app-import.title')</h3>

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_view')
        </div>

        <div class="panel-body table-responsive">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>@lang('quickadmin.whats-app-import.fields.source')</th>
                            <td field-key='source'>{{ $whats_app_import->source }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.whats-app-import.fields.message')</th>
                            <td field-key='message'>{{ $whats_app_import->message }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.whats-app-import.fields.intimation-date-time')</th>
                            <td field-key='intimation_date_time'>{{ $whats_app_import->intimation_date_time }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.whats-app-import.fields.patient-name')</th>
                            <td field-key='patient_name'>{{ $whats_app_import->patient_name }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.whats-app-import.fields.referrer-name')</th>
                            <td field-key='referrer_name'>{{ $whats_app_import->referrer_name }}</td>
                        </tr>
                    </table>
                </div>
            </div>

            <p>&nbsp;</p>

            <a href="{{ route('admin.whats_app_imports.index') }}" class="btn btn-default">@lang('quickadmin.qa_back_to_list')</a>
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
