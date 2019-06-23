@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.message-mapping.title')</h3>

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_view')
        </div>

        <div class="panel-body table-responsive">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>@lang('quickadmin.message-mapping.fields.channel')</th>
                            <td field-key='channel'>{{ $message_mapping->channel }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.message-mapping.fields.message')</th>
                            <td field-key='message'>{{ $message_mapping->message }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.message-mapping.fields.source')</th>
                            <td field-key='source'>{{ $message_mapping->source }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.message-mapping.fields.patient-name')</th>
                            <td field-key='patient_name'>{{ $message_mapping->patient_name }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.message-mapping.fields.referrer-name')</th>
                            <td field-key='referrer_name'>{{ $message_mapping->referrer_name }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.message-mapping.fields.intimation-date-time')</th>
                            <td field-key='intimation_date_time'>{{ $message_mapping->intimation_date_time }}</td>
                        </tr>
                    </table>
                </div>
            </div>

            <p>&nbsp;</p>

            <a href="{{ route('admin.message_mappings.index') }}" class="btn btn-default">@lang('quickadmin.qa_back_to_list')</a>
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
