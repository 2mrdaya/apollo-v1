@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.ppn-payments.title')</h3>
    {!! Form::open(['method' => 'POST', 'route' => ['admin.ppn_payments.store']]) !!}

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_create')
        </div>
        
        <div class="panel-body">
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('month', trans('quickadmin.ppn-payments.fields.month').'', ['class' => 'control-label']) !!}
                    {!! Form::text('month', old('month'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('month'))
                        <p class="help-block">
                            {{ $errors->first('month') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('patientid_id', trans('quickadmin.ppn-payments.fields.patientid').'', ['class' => 'control-label']) !!}
                    {!! Form::select('patientid_id', $patientids, old('patientid_id'), ['class' => 'form-control select2']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('patientid_id'))
                        <p class="help-block">
                            {{ $errors->first('patientid_id') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('avipid_id', trans('quickadmin.ppn-payments.fields.avipid').'', ['class' => 'control-label']) !!}
                    {!! Form::select('avipid_id', $avipids, old('avipid_id'), ['class' => 'form-control select2']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('avipid_id'))
                        <p class="help-block">
                            {{ $errors->first('avipid_id') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('mapping_id', trans('quickadmin.ppn-payments.fields.mapping').'', ['class' => 'control-label']) !!}
                    {!! Form::select('mapping_id', $mappings, old('mapping_id'), ['class' => 'form-control select2']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('mapping_id'))
                        <p class="help-block">
                            {{ $errors->first('mapping_id') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('total_bill', trans('quickadmin.ppn-payments.fields.total-bill').'', ['class' => 'control-label']) !!}
                    {!! Form::text('total_bill', old('total_bill'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('total_bill'))
                        <p class="help-block">
                            {{ $errors->first('total_bill') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('total_pharmacy', trans('quickadmin.ppn-payments.fields.total-pharmacy').'', ['class' => 'control-label']) !!}
                    {!! Form::text('total_pharmacy', old('total_pharmacy'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('total_pharmacy'))
                        <p class="help-block">
                            {{ $errors->first('total_pharmacy') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('total_consumable', trans('quickadmin.ppn-payments.fields.total-consumable').'', ['class' => 'control-label']) !!}
                    {!! Form::text('total_consumable', old('total_consumable'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('total_consumable'))
                        <p class="help-block">
                            {{ $errors->first('total_consumable') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('rate_details', trans('quickadmin.ppn-payments.fields.rate-details').'', ['class' => 'control-label']) !!}
                    {!! Form::text('rate_details', old('rate_details'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('rate_details'))
                        <p class="help-block">
                            {{ $errors->first('rate_details') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('on_total_bill', trans('quickadmin.ppn-payments.fields.on-total-bill').'', ['class' => 'control-label']) !!}
                    {!! Form::select('on_total_bill', $enum_on_total_bill, old('on_total_bill'), ['class' => 'form-control select2']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('on_total_bill'))
                        <p class="help-block">
                            {{ $errors->first('on_total_bill') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('type', trans('quickadmin.ppn-payments.fields.type').'', ['class' => 'control-label']) !!}
                    {!! Form::select('type', $enum_type, old('type'), ['class' => 'form-control select2']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('type'))
                        <p class="help-block">
                            {{ $errors->first('type') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('eligible_bill_amount', trans('quickadmin.ppn-payments.fields.eligible-bill-amount').'', ['class' => 'control-label']) !!}
                    {!! Form::number('eligible_bill_amount', old('eligible_bill_amount'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('eligible_bill_amount'))
                        <p class="help-block">
                            {{ $errors->first('eligible_bill_amount') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('percentage', trans('quickadmin.ppn-payments.fields.percentage').'', ['class' => 'control-label']) !!}
                    {!! Form::text('percentage', old('percentage'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('percentage'))
                        <p class="help-block">
                            {{ $errors->first('percentage') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('amount', trans('quickadmin.ppn-payments.fields.amount').'', ['class' => 'control-label']) !!}
                    {!! Form::number('amount', old('amount'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('amount'))
                        <p class="help-block">
                            {{ $errors->first('amount') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('status', trans('quickadmin.ppn-payments.fields.status').'', ['class' => 'control-label']) !!}
                    {!! Form::select('status', $enum_status, old('status'), ['class' => 'form-control select2']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('status'))
                        <p class="help-block">
                            {{ $errors->first('status') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('remarks', trans('quickadmin.ppn-payments.fields.remarks').'', ['class' => 'control-label']) !!}
                    {!! Form::textarea('remarks', old('remarks'), ['class' => 'form-control ', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('remarks'))
                        <p class="help-block">
                            {{ $errors->first('remarks') }}
                        </p>
                    @endif
                </div>
            </div>
            
        </div>
    </div>

    {!! Form::submit(trans('quickadmin.qa_save'), ['class' => 'btn btn-danger']) !!}
    {!! Form::close() !!}
@stop

