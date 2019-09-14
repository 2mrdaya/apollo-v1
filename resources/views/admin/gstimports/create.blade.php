@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.gstimport.title')</h3>
    {!! Form::open(['method' => 'POST', 'route' => ['admin.gstimports.store']]) !!}

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_create')
        </div>
        
        <div class="panel-body">
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('bill_no', trans('quickadmin.gstimport.fields.bill-no').'', ['class' => 'control-label']) !!}
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
                    {!! Form::label('gst_amout', trans('quickadmin.gstimport.fields.gst-amout').'', ['class' => 'control-label']) !!}
                    {!! Form::text('gst_amout', old('gst_amout'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('gst_amout'))
                        <p class="help-block">
                            {{ $errors->first('gst_amout') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('booking_month', trans('quickadmin.gstimport.fields.booking-month').'', ['class' => 'control-label']) !!}
                    {!! Form::text('booking_month', old('booking_month'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('booking_month'))
                        <p class="help-block">
                            {{ $errors->first('booking_month') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('payment_month', trans('quickadmin.gstimport.fields.payment-month').'', ['class' => 'control-label']) !!}
                    {!! Form::text('payment_month', old('payment_month'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('payment_month'))
                        <p class="help-block">
                            {{ $errors->first('payment_month') }}
                        </p>
                    @endif
                </div>
            </div>
            
        </div>
    </div>

    {!! Form::submit(trans('quickadmin.qa_save'), ['class' => 'btn btn-danger']) !!}
    {!! Form::close() !!}
@stop

