@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.email-import.title')</h3>
    {!! Form::open(['method' => 'POST', 'route' => ['admin.email_imports.store']]) !!}

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_create')
        </div>
        
        <div class="panel-body">
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('source', trans('quickadmin.email-import.fields.source').'', ['class' => 'control-label']) !!}
                    {!! Form::text('source', old('source'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('source'))
                        <p class="help-block">
                            {{ $errors->first('source') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('message', trans('quickadmin.email-import.fields.message').'', ['class' => 'control-label']) !!}
                    {!! Form::text('message', old('message'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('message'))
                        <p class="help-block">
                            {{ $errors->first('message') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('intimation_date_time', trans('quickadmin.email-import.fields.intimation-date-time').'', ['class' => 'control-label']) !!}
                    {!! Form::text('intimation_date_time', old('intimation_date_time'), ['class' => 'form-control datetime', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('intimation_date_time'))
                        <p class="help-block">
                            {{ $errors->first('intimation_date_time') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('patient_name', trans('quickadmin.email-import.fields.patient-name').'', ['class' => 'control-label']) !!}
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
                    {!! Form::label('referrer_name', trans('quickadmin.email-import.fields.referrer-name').'', ['class' => 'control-label']) !!}
                    {!! Form::text('referrer_name', old('referrer_name'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('referrer_name'))
                        <p class="help-block">
                            {{ $errors->first('referrer_name') }}
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