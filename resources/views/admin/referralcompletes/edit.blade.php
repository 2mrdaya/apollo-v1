@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.referralcomplete.title')</h3>
    
    {!! Form::model($referralcomplete, ['method' => 'PUT', 'route' => ['admin.referralcompletes.update', $referralcomplete->id]]) !!}

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_edit')
        </div>

        <div class="panel-body">
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('vendor', trans('quickadmin.referralcomplete.fields.vendor').'', ['class' => 'control-label']) !!}
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
                    {!! Form::label('month', trans('quickadmin.referralcomplete.fields.month').'', ['class' => 'control-label']) !!}
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
                    {!! Form::label('msg_desc', trans('quickadmin.referralcomplete.fields.msg-desc').'', ['class' => 'control-label']) !!}
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
                    {!! Form::label('doi_as_per_whats_app', trans('quickadmin.referralcomplete.fields.doi-as-per-whats-app').'', ['class' => 'control-label']) !!}
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
                    {!! Form::label('doi_as_per_sw', trans('quickadmin.referralcomplete.fields.doi-as-per-sw').'', ['class' => 'control-label']) !!}
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
                    {!! Form::label('area', trans('quickadmin.referralcomplete.fields.area').'', ['class' => 'control-label']) !!}
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
                    {!! Form::label('uhid', trans('quickadmin.referralcomplete.fields.uhid').'', ['class' => 'control-label']) !!}
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
                    {!! Form::label('oracle_code', trans('quickadmin.referralcomplete.fields.oracle-code').'', ['class' => 'control-label']) !!}
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
                    {!! Form::label('ip_no', trans('quickadmin.referralcomplete.fields.ip-no').'', ['class' => 'control-label']) !!}
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
                    {!! Form::label('bill_no', trans('quickadmin.referralcomplete.fields.bill-no').'', ['class' => 'control-label']) !!}
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
                    {!! Form::label('dr_name_aic', trans('quickadmin.referralcomplete.fields.dr-name-aic').'', ['class' => 'control-label']) !!}
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
                    {!! Form::label('pan_no', trans('quickadmin.referralcomplete.fields.pan-no').'', ['class' => 'control-label']) !!}
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
                    {!! Form::label('admission_date', trans('quickadmin.referralcomplete.fields.admission-date').'', ['class' => 'control-label']) !!}
                    {!! Form::text('admission_date', old('admission_date'), ['class' => 'form-control datetime', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('admission_date'))
                        <p class="help-block">
                            {{ $errors->first('admission_date') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('discharge_date', trans('quickadmin.referralcomplete.fields.discharge-date').'', ['class' => 'control-label']) !!}
                    {!! Form::text('discharge_date', old('discharge_date'), ['class' => 'form-control datetime', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('discharge_date'))
                        <p class="help-block">
                            {{ $errors->first('discharge_date') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('registration_date', trans('quickadmin.referralcomplete.fields.registration-date').'', ['class' => 'control-label']) !!}
                    {!! Form::text('registration_date', old('registration_date'), ['class' => 'form-control datetime', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('registration_date'))
                        <p class="help-block">
                            {{ $errors->first('registration_date') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('company', trans('quickadmin.referralcomplete.fields.company').'', ['class' => 'control-label']) !!}
                    {!! Form::text('company', old('company'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('company'))
                        <p class="help-block">
                            {{ $errors->first('company') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('country', trans('quickadmin.referralcomplete.fields.country').'', ['class' => 'control-label']) !!}
                    {!! Form::text('country', old('country'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('country'))
                        <p class="help-block">
                            {{ $errors->first('country') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('treating_consultant', trans('quickadmin.referralcomplete.fields.treating-consultant').'', ['class' => 'control-label']) !!}
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
                    {!! Form::label('specialty', trans('quickadmin.referralcomplete.fields.specialty').'', ['class' => 'control-label']) !!}
                    {!! Form::text('specialty', old('specialty'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('specialty'))
                        <p class="help-block">
                            {{ $errors->first('specialty') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('bill_to', trans('quickadmin.referralcomplete.fields.bill-to').'', ['class' => 'control-label']) !!}
                    {!! Form::text('bill_to', old('bill_to'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('bill_to'))
                        <p class="help-block">
                            {{ $errors->first('bill_to') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('bill_amount', trans('quickadmin.referralcomplete.fields.bill-amount').'', ['class' => 'control-label']) !!}
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
                    {!! Form::label('pharmacy', trans('quickadmin.referralcomplete.fields.pharmacy').'', ['class' => 'control-label']) !!}
                    {!! Form::text('pharmacy', old('pharmacy'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('pharmacy'))
                        <p class="help-block">
                            {{ $errors->first('pharmacy') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('consumable', trans('quickadmin.referralcomplete.fields.consumable').'', ['class' => 'control-label']) !!}
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
                    {!! Form::label('bonus_percent', trans('quickadmin.referralcomplete.fields.bonus-percent').'', ['class' => 'control-label']) !!}
                    {!! Form::text('bonus_percent', old('bonus_percent'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('bonus_percent'))
                        <p class="help-block">
                            {{ $errors->first('bonus_percent') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('bonus', trans('quickadmin.referralcomplete.fields.bonus').'', ['class' => 'control-label']) !!}
                    {!! Form::text('bonus', old('bonus'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('bonus'))
                        <p class="help-block">
                            {{ $errors->first('bonus') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('gst', trans('quickadmin.referralcomplete.fields.gst').'', ['class' => 'control-label']) !!}
                    {!! Form::text('gst', old('gst'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('gst'))
                        <p class="help-block">
                            {{ $errors->first('gst') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('fee_percent', trans('quickadmin.referralcomplete.fields.fee-percent').'', ['class' => 'control-label']) !!}
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
                    {!! Form::label('aic_fee', trans('quickadmin.referralcomplete.fields.aic-fee').'', ['class' => 'control-label']) !!}
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
                    {!! Form::label('remarks', trans('quickadmin.referralcomplete.fields.remarks').'', ['class' => 'control-label']) !!}
                    {!! Form::text('remarks', old('remarks'), ['class' => 'form-control', 'placeholder' => '']) !!}
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