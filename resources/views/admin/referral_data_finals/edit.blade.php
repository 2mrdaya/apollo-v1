@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.referral-data-final.title')</h3>
    
    {!! Form::model($referral_data_final, ['method' => 'PUT', 'route' => ['admin.referral_data_finals.update', $referral_data_final->id]]) !!}

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_edit')
        </div>

        <div class="panel-body">
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
                    {!! Form::label('date_time_of_int', trans('quickadmin.referral-data-final.fields.date-time-of-int').'', ['class' => 'control-label']) !!}
                    {!! Form::text('date_time_of_int', old('date_time_of_int'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('date_time_of_int'))
                        <p class="help-block">
                            {{ $errors->first('date_time_of_int') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('executive', trans('quickadmin.referral-data-final.fields.executive').'', ['class' => 'control-label']) !!}
                    {!! Form::text('executive', old('executive'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('executive'))
                        <p class="help-block">
                            {{ $errors->first('executive') }}
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
                    {!! Form::label('patient_name', trans('quickadmin.referral-data-final.fields.patient-name').'', ['class' => 'control-label']) !!}
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
                    {!! Form::label('date_time_of_reg', trans('quickadmin.referral-data-final.fields.date-time-of-reg').'', ['class' => 'control-label']) !!}
                    {!! Form::text('date_time_of_reg', old('date_time_of_reg'), ['class' => 'form-control datetime', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('date_time_of_reg'))
                        <p class="help-block">
                            {{ $errors->first('date_time_of_reg') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('ip_no', trans('quickadmin.referral-data-final.fields.ip-no').'', ['class' => 'control-label']) !!}
                    {!! Form::text('ip_no', old('ip_no'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('ip_no'))
                        <p class="help-block">
                            {{ $errors->first('ip_no') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('bill_no', trans('quickadmin.referral-data-final.fields.bill-no').'', ['class' => 'control-label']) !!}
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
                    {!! Form::label('admission_time', trans('quickadmin.referral-data-final.fields.admission-time').'', ['class' => 'control-label']) !!}
                    {!! Form::text('admission_time', old('admission_time'), ['class' => 'form-control datetime', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('admission_time'))
                        <p class="help-block">
                            {{ $errors->first('admission_time') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('date_of_discharged', trans('quickadmin.referral-data-final.fields.date-of-discharged').'', ['class' => 'control-label']) !!}
                    {!! Form::text('date_of_discharged', old('date_of_discharged'), ['class' => 'form-control datetime', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('date_of_discharged'))
                        <p class="help-block">
                            {{ $errors->first('date_of_discharged') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('procedure_name', trans('quickadmin.referral-data-final.fields.procedure-name').'', ['class' => 'control-label']) !!}
                    {!! Form::text('procedure_name', old('procedure_name'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('procedure_name'))
                        <p class="help-block">
                            {{ $errors->first('procedure_name') }}
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
                    {!! Form::label('total_bill_amount', trans('quickadmin.referral-data-final.fields.total-bill-amount').'', ['class' => 'control-label']) !!}
                    {!! Form::text('total_bill_amount', old('total_bill_amount'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('total_bill_amount'))
                        <p class="help-block">
                            {{ $errors->first('total_bill_amount') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('net_amount', trans('quickadmin.referral-data-final.fields.net-amount').'', ['class' => 'control-label']) !!}
                    {!! Form::text('net_amount', old('net_amount'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('net_amount'))
                        <p class="help-block">
                            {{ $errors->first('net_amount') }}
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
                    {!! Form::label('treating_consultant', trans('quickadmin.referral-data-final.fields.treating-consultant').'', ['class' => 'control-label']) !!}
                    {!! Form::text('treating_consultant', old('treating_consultant'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('treating_consultant'))
                        <p class="help-block">
                            {{ $errors->first('treating_consultant') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('department', trans('quickadmin.referral-data-final.fields.department').'', ['class' => 'control-label']) !!}
                    {!! Form::text('department', old('department'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('department'))
                        <p class="help-block">
                            {{ $errors->first('department') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('pan_no', trans('quickadmin.referral-data-final.fields.pan-no').'', ['class' => 'control-label']) !!}
                    {!! Form::text('pan_no', old('pan_no'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('pan_no'))
                        <p class="help-block">
                            {{ $errors->first('pan_no') }}
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
                    {!! Form::label('message', trans('quickadmin.referral-data-final.fields.message').'', ['class' => 'control-label']) !!}
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
                    {!! Form::label('msg_date_time', trans('quickadmin.referral-data-final.fields.msg-date-time').'', ['class' => 'control-label']) !!}
                    {!! Form::text('msg_date_time', old('msg_date_time'), ['class' => 'form-control datetime', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('msg_date_time'))
                        <p class="help-block">
                            {{ $errors->first('msg_date_time') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('consumable', trans('quickadmin.referral-data-final.fields.consumable').'', ['class' => 'control-label']) !!}
                    {!! Form::text('consumable', old('consumable'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('consumable'))
                        <p class="help-block">
                            {{ $errors->first('consumable') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('ward_pharmacy', trans('quickadmin.referral-data-final.fields.ward-pharmacy').'', ['class' => 'control-label']) !!}
                    {!! Form::text('ward_pharmacy', old('ward_pharmacy'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('ward_pharmacy'))
                        <p class="help-block">
                            {{ $errors->first('ward_pharmacy') }}
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