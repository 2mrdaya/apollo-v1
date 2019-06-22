@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.patient-registration.title')</h3>

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_view')
        </div>

        <div class="panel-body table-responsive">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>@lang('quickadmin.patient-registration.fields.uhid')</th>
                            <td field-key='uhid'>{{ $patient_registration->uhid }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.patient-registration.fields.patient-name')</th>
                            <td field-key='patient_name'>{{ $patient_registration->patient_name }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.patient-registration.fields.registration-date')</th>
                            <td field-key='registration_date'>{{ $patient_registration->registration_date }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.patient-registration.fields.city')</th>
                            <td field-key='city'>{{ $patient_registration->city }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.patient-registration.fields.country')</th>
                            <td field-key='country'>{{ $patient_registration->country }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.patient-registration.fields.address')</th>
                            <td field-key='address'>{{ $patient_registration->address }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.patient-registration.fields.mobile')</th>
                            <td field-key='mobile'>{{ $patient_registration->mobile }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.patient-registration.fields.email-id')</th>
                            <td field-key='email_id'>{{ $patient_registration->email_id }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.patient-registration.fields.operator-name')</th>
                            <td field-key='operator_name'>{{ $patient_registration->operator_name }}</td>
                        </tr>
                    </table>
                </div>
            </div><!-- Nav tabs -->
<ul class="nav nav-tabs" role="tablist">
    
<li role="presentation" class="active"><a href="#message_mapping" aria-controls="message_mapping" role="tab" data-toggle="tab">Message Mapping</a></li>
</ul>

<!-- Tab panes -->
<div class="tab-content">
    
<div role="tabpanel" class="tab-pane active" id="message_mapping">
<table class="table table-bordered table-striped {{ count($message_mappings) > 0 ? 'datatable' : '' }}">
    <thead>
        <tr>
            <th>@lang('quickadmin.message-mapping.fields.channel')</th>
                        <th>@lang('quickadmin.message-mapping.fields.message')</th>
                        <th>@lang('quickadmin.message-mapping.fields.source')</th>
                        <th>@lang('quickadmin.message-mapping.fields.patient-name')</th>
                        <th>@lang('quickadmin.message-mapping.fields.referrer-name')</th>
                        <th>@lang('quickadmin.message-mapping.fields.intimation-date-time')</th>
                        @if( request('show_deleted') == 1 )
                        <th>&nbsp;</th>
                        @else
                        <th>&nbsp;</th>
                        @endif
        </tr>
    </thead>

    <tbody>
        @if (count($message_mappings) > 0)
            @foreach ($message_mappings as $message_mapping)
                <tr data-entry-id="{{ $message_mapping->id }}">
                    <td field-key='channel'>{{ $message_mapping->channel }}</td>
                                <td field-key='message'>{{ $message_mapping->message }}</td>
                                <td field-key='source'>{{ $message_mapping->source }}</td>
                                <td field-key='patient_name'>{{ $message_mapping->patient_name }}</td>
                                <td field-key='referrer_name'>{{ $message_mapping->referrer_name }}</td>
                                <td field-key='intimation_date_time'>{{ $message_mapping->intimation_date_time }}</td>
                                @if( request('show_deleted') == 1 )
                                <td>
                                    @can('message_mapping_delete')
                                                                        {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'POST',
                                        'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
                                        'route' => ['admin.message_mappings.restore', $message_mapping->id])) !!}
                                    {!! Form::submit(trans('quickadmin.qa_restore'), array('class' => 'btn btn-xs btn-success')) !!}
                                    {!! Form::close() !!}
                                @endcan
                                    @can('message_mapping_delete')
                                                                        {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
                                        'route' => ['admin.message_mappings.perma_del', $message_mapping->id])) !!}
                                    {!! Form::submit(trans('quickadmin.qa_permadel'), array('class' => 'btn btn-xs btn-danger')) !!}
                                    {!! Form::close() !!}
                                @endcan
                                </td>
                                @else
                                <td>
                                    @can('message_mapping_view')
                                    <a href="{{ route('admin.message_mappings.show',[$message_mapping->id]) }}" class="btn btn-xs btn-primary">@lang('quickadmin.qa_view')</a>
                                    @endcan
                                    @can('message_mapping_edit')
                                    <a href="{{ route('admin.message_mappings.edit',[$message_mapping->id]) }}" class="btn btn-xs btn-info">@lang('quickadmin.qa_edit')</a>
                                    @endcan
                                    @can('message_mapping_delete')
{!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
                                        'route' => ['admin.message_mappings.destroy', $message_mapping->id])) !!}
                                    {!! Form::submit(trans('quickadmin.qa_delete'), array('class' => 'btn btn-xs btn-danger')) !!}
                                    {!! Form::close() !!}
                                    @endcan
                                </td>
                                @endif
                </tr>
            @endforeach
        @else
            <tr>
                <td colspan="13">@lang('quickadmin.qa_no_entries_in_table')</td>
            </tr>
        @endif
    </tbody>
</table>
</div>
</div>

            <p>&nbsp;</p>

            <a href="{{ route('admin.patient_registrations.index') }}" class="btn btn-default">@lang('quickadmin.qa_back_to_list')</a>
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
