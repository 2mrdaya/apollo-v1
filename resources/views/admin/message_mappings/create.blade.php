@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.message-mapping.title')</h3>
    {!! Form::open(['method' => 'POST', 'route' => ['admin.message_mappings.store']]) !!}

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_create')
        </div>
        
        <div class="panel-body">
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('channel', trans('quickadmin.message-mapping.fields.channel').'', ['class' => 'control-label']) !!}
                    {!! Form::select('channel', $enum_channel, old('channel'), ['class' => 'form-control select2']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('channel'))
                        <p class="help-block">
                            {{ $errors->first('channel') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('message', trans('quickadmin.message-mapping.fields.message').'*', ['class' => 'control-label']) !!}
                    {!! Form::text('message', old('message'), ['class' => 'form-control', 'placeholder' => 'Enter Message', 'required' => '']) !!}
                    <p class="help-block">Enter Message</p>
                    @if($errors->has('message'))
                        <p class="help-block">
                            {{ $errors->first('message') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('source', trans('quickadmin.message-mapping.fields.source').'*', ['class' => 'control-label']) !!}
                    {!! Form::text('source', old('source'), ['class' => 'form-control', 'placeholder' => 'Enter Message Source', 'required' => '']) !!}
                    <p class="help-block">Enter Message Source</p>
                    @if($errors->has('source'))
                        <p class="help-block">
                            {{ $errors->first('source') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('patient_name', trans('quickadmin.message-mapping.fields.patient-name').'', ['class' => 'control-label']) !!}
                    {!! Form::text('patient_name', old('patient_name'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('patient_name'))
                        <p class="help-block">
                            {{ $errors->first('patient_name') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('referrer_name', trans('quickadmin.message-mapping.fields.referrer-name').'', ['class' => 'control-label']) !!}
                    {!! Form::text('referrer_name', old('referrer_name'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('referrer_name'))
                        <p class="help-block">
                            {{ $errors->first('referrer_name') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('intimation_date_time', trans('quickadmin.message-mapping.fields.intimation-date-time').'*', ['class' => 'control-label']) !!}
                    {!! Form::text('intimation_date_time', old('intimation_date_time'), ['class' => 'form-control datetime', 'placeholder' => 'Enter Intimation Date Time', 'required' => '']) !!}
                    <p class="help-block">Enter Intimation Date Time</p>
                    @if($errors->has('intimation_date_time'))
                        <p class="help-block">
                            {{ $errors->first('intimation_date_time') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('uhid_id', trans('quickadmin.message-mapping.fields.uhid').'', ['class' => 'control-label']) !!}
                    {!! Form::select('uhid_id', $uhids, old('uhid_id'), ['class' => 'form-control select2']) !!}
                    <p class="help-block">Enter Patient Id</p>
                    @if($errors->has('uhid_id'))
                        <p class="help-block">
                            {{ $errors->first('uhid_id') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('avip_id', trans('quickadmin.message-mapping.fields.avip').'', ['class' => 'control-label']) !!}
                    {!! Form::select('avip_id', $avips, old('avip_id'), ['class' => 'form-control select2']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('avip_id'))
                        <p class="help-block">
                            {{ $errors->first('avip_id') }}
                        </p>
                    @endif
                </div>
            </div>
            
        </div>
    </div>

    {!! Form::submit(trans('quickadmin.qa_save'), ['class' => 'btn btn-danger']) !!}
    {!! Form::close() !!}
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