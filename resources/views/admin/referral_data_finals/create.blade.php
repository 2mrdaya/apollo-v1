@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.referral-data-final.title')</h3>
    {!! Form::open(['method' => 'POST', 'route' => ['admin.referral_data_finals.store']]) !!}

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_create')
        </div>
        
        <div class="panel-body">
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('vendor', trans('quickadmin.referral-data-final.fields.vendor').'', ['class' => 'control-label']) !!}
                    {!! Form::select('vendor', $enum_vendor, old('vendor'), ['class' => 'form-control select2']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('vendor'))
                        <p class="help-block">
                            {{ $errors->first('vendor') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('month', trans('quickadmin.referral-data-final.fields.month').'', ['class' => 'control-label']) !!}
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
                    {!! Form::label('msg_desc', trans('quickadmin.referral-data-final.fields.msg-desc').'', ['class' => 'control-label']) !!}
                    {!! Form::text('msg_desc', old('msg_desc'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('msg_desc'))
                        <p class="help-block">
                            {{ $errors->first('msg_desc') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('doi_as_per_whats_app', trans('quickadmin.referral-data-final.fields.doi-as-per-whats-app').'', ['class' => 'control-label']) !!}
                    {!! Form::text('doi_as_per_whats_app', old('doi_as_per_whats_app'), ['class' => 'form-control datetime', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('doi_as_per_whats_app'))
                        <p class="help-block">
                            {{ $errors->first('doi_as_per_whats_app') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('doi_as_per_sw', trans('quickadmin.referral-data-final.fields.doi-as-per-sw').'', ['class' => 'control-label']) !!}
                    {!! Form::text('doi_as_per_sw', old('doi_as_per_sw'), ['class' => 'form-control datetime', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('doi_as_per_sw'))
                        <p class="help-block">
                            {{ $errors->first('doi_as_per_sw') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('area', trans('quickadmin.referral-data-final.fields.area').'', ['class' => 'control-label']) !!}
                    {!! Form::text('area', old('area'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('area'))
                        <p class="help-block">
                            {{ $errors->first('area') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('uhid', trans('quickadmin.referral-data-final.fields.uhid').'', ['class' => 'control-label']) !!}
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
                    {!! Form::label('bill_no', trans('quickadmin.referral-data-final.fields.ip-no').'', ['class' => 'control-label']) !!}
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
                    {!! Form::label('dr_name_aic', trans('quickadmin.referral-data-final.fields.dr-name-aic').'', ['class' => 'control-label']) !!}
                    {!! Form::text('dr_name_aic', old('dr_name_aic'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('dr_name_aic'))
                        <p class="help-block">
                            {{ $errors->first('dr_name_aic') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('fee_percent', trans('quickadmin.referral-data-final.fields.fee-percent').'', ['class' => 'control-label']) !!}
                    {!! Form::text('fee_percent', old('fee_percent'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('fee_percent'))
                        <p class="help-block">
                            {{ $errors->first('fee_percent') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('aic_fee', trans('quickadmin.referral-data-final.fields.aic-fee').'', ['class' => 'control-label']) !!}
                    {!! Form::text('aic_fee', old('aic_fee'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('aic_fee'))
                        <p class="help-block">
                            {{ $errors->first('aic_fee') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('oracle_code', trans('quickadmin.referral-data-final.fields.pan-no').'', ['class' => 'control-label']) !!}
                    {!! Form::text('oracle_code', old('oracle_code'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('oracle_code'))
                        <p class="help-block">
                            {{ $errors->first('oracle_code') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('pateint_name_msg', trans('quickadmin.referral-data-final.fields.pateint-name-msg').'', ['class' => 'control-label']) !!}
                    {!! Form::text('pateint_name_msg', old('pateint_name_msg'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('pateint_name_msg'))
                        <p class="help-block">
                            {{ $errors->first('pateint_name_msg') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('avip_name_msg', trans('quickadmin.referral-data-final.fields.avip-name-msg').'', ['class' => 'control-label']) !!}
                    {!! Form::text('avip_name_msg', old('avip_name_msg'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('avip_name_msg'))
                        <p class="help-block">
                            {{ $errors->first('avip_name_msg') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('remarks', trans('quickadmin.referral-data-final.fields.remarks').'', ['class' => 'control-label']) !!}
                    {!! Form::text('remarks', old('remarks'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('remarks'))
                        <p class="help-block">
                            {{ $errors->first('remarks') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('approve', trans('quickadmin.referral-data-final.fields.approve').'', ['class' => 'control-label']) !!}
                    {!! Form::hidden('approve', 0) !!}
                    {!! Form::checkbox('approve', 1, old('approve', true), []) !!}
                    <p class="help-block"></p>
                    @if($errors->has('approve'))
                        <p class="help-block">
                            {{ $errors->first('approve') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('status', trans('quickadmin.referral-data-final.fields.status').'', ['class' => 'control-label']) !!}
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
                    {!! Form::label('ip_id', trans('quickadmin.referral-data-final.fields.ip').'', ['class' => 'control-label']) !!}
                    {!! Form::select('ip_id', $ips, old('ip_id'), ['class' => 'form-control select2']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('ip_id'))
                        <p class="help-block">
                            {{ $errors->first('ip_id') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('message_id', trans('quickadmin.referral-data-final.fields.message').'', ['class' => 'control-label']) !!}
                    {!! Form::select('message_id', $messages, old('message_id'), ['class' => 'form-control select2']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('message_id'))
                        <p class="help-block">
                            {{ $errors->first('message_id') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('patient_id', trans('quickadmin.referral-data-final.fields.patient').'', ['class' => 'control-label']) !!}
                    {!! Form::select('patient_id', $patients, old('patient_id'), ['class' => 'form-control select2']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('patient_id'))
                        <p class="help-block">
                            {{ $errors->first('patient_id') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('avip_id', trans('quickadmin.referral-data-final.fields.avip').'', ['class' => 'control-label']) !!}
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