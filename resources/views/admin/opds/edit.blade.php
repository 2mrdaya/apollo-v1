@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.opd.title')</h3>
    
    {!! Form::model($opd, ['method' => 'PUT', 'route' => ['admin.opds.update', $opd->id]]) !!}

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_edit')
        </div>

        <div class="panel-body">
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('bill_date', trans('quickadmin.opd.fields.bill-date').'', ['class' => 'control-label']) !!}
                    {!! Form::text('bill_date', old('bill_date'), ['class' => 'form-control datetime', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('bill_date'))
                        <p class="help-block">
                            {{ $errors->first('bill_date') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('bill_no', trans('quickadmin.opd.fields.bill-no').'', ['class' => 'control-label']) !!}
                    {!! Form::text('bill_no', old('bill_no'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('bill_no'))
                        <p class="help-block">
                            {{ $errors->first('bill_no') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('uhid', trans('quickadmin.opd.fields.uhid').'', ['class' => 'control-label']) !!}
                    {!! Form::text('uhid', old('uhid'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('uhid'))
                        <p class="help-block">
                            {{ $errors->first('uhid') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('patient_number', trans('quickadmin.opd.fields.patient-number').'', ['class' => 'control-label']) !!}
                    {!! Form::text('patient_number', old('patient_number'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('patient_number'))
                        <p class="help-block">
                            {{ $errors->first('patient_number') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('pname', trans('quickadmin.opd.fields.pname').'', ['class' => 'control-label']) !!}
                    {!! Form::text('pname', old('pname'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('pname'))
                        <p class="help-block">
                            {{ $errors->first('pname') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('bill_type', trans('quickadmin.opd.fields.bill-type').'', ['class' => 'control-label']) !!}
                    {!! Form::text('bill_type', old('bill_type'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('bill_type'))
                        <p class="help-block">
                            {{ $errors->first('bill_type') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('bill_amount', trans('quickadmin.opd.fields.bill-amount').'', ['class' => 'control-label']) !!}
                    {!! Form::text('bill_amount', old('bill_amount'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('bill_amount'))
                        <p class="help-block">
                            {{ $errors->first('bill_amount') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('discount_amount', trans('quickadmin.opd.fields.discount-amount').'', ['class' => 'control-label']) !!}
                    {!! Form::text('discount_amount', old('discount_amount'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('discount_amount'))
                        <p class="help-block">
                            {{ $errors->first('discount_amount') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('net_amount', trans('quickadmin.opd.fields.net-amount').'', ['class' => 'control-label']) !!}
                    {!! Form::text('net_amount', old('net_amount'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('net_amount'))
                        <p class="help-block">
                            {{ $errors->first('net_amount') }}
                        </p>
                    @endif
                </div>
            </div>
            
        </div>
    </div>

    {!! Form::submit(trans('quickadmin.qa_update'), ['class' => 'btn btn-danger']) !!}
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