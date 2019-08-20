@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.ip.title')</h3>
    {!! Form::open(['method' => 'POST', 'route' => ['admin.ips.store']]) !!}

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_create')
        </div>
        
        <div class="panel-body">
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('uhid', trans('quickadmin.ip.fields.uhid').'', ['class' => 'control-label']) !!}
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
                    {!! Form::label('bill_date', trans('quickadmin.ip.fields.bill-date').'', ['class' => 'control-label']) !!}
                    {!! Form::text('bill_date', old('bill_date'), ['class' => 'form-control date', 'placeholder' => '']) !!}
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
                    {!! Form::label('ip_no', trans('quickadmin.ip.fields.ip-no').'', ['class' => 'control-label']) !!}
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
                    {!! Form::label('patient_name', trans('quickadmin.ip.fields.patient-name').'', ['class' => 'control-label']) !!}
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
                    {!! Form::label('country', trans('quickadmin.ip.fields.country').'', ['class' => 'control-label']) !!}
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
                    {!! Form::label('state', trans('quickadmin.ip.fields.state').'', ['class' => 'control-label']) !!}
                    {!! Form::text('state', old('state'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('state'))
                        <p class="help-block">
                            {{ $errors->first('state') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('city', trans('quickadmin.ip.fields.city').'', ['class' => 'control-label']) !!}
                    {!! Form::text('city', old('city'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('city'))
                        <p class="help-block">
                            {{ $errors->first('city') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('bill_no', trans('quickadmin.ip.fields.bill-no').'', ['class' => 'control-label']) !!}
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
                    {!! Form::label('customer_name', trans('quickadmin.ip.fields.customer-name').'', ['class' => 'control-label']) !!}
                    {!! Form::text('customer_name', old('customer_name'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('customer_name'))
                        <p class="help-block">
                            {{ $errors->first('customer_name') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('total_service_amount', trans('quickadmin.ip.fields.total-service-amount').'', ['class' => 'control-label']) !!}
                    {!! Form::text('total_service_amount', old('total_service_amount'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('total_service_amount'))
                        <p class="help-block">
                            {{ $errors->first('total_service_amount') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('tax_amount', trans('quickadmin.ip.fields.tax-amount').'', ['class' => 'control-label']) !!}
                    {!! Form::text('tax_amount', old('tax_amount'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('tax_amount'))
                        <p class="help-block">
                            {{ $errors->first('tax_amount') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('total_bill_amount', trans('quickadmin.ip.fields.total-bill-amount').'', ['class' => 'control-label']) !!}
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
                    {!! Form::label('tcs_tax', trans('quickadmin.ip.fields.tcs-tax').'', ['class' => 'control-label']) !!}
                    {!! Form::text('tcs_tax', old('tcs_tax'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('tcs_tax'))
                        <p class="help-block">
                            {{ $errors->first('tcs_tax') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('discount_amount', trans('quickadmin.ip.fields.discount-amount').'', ['class' => 'control-label']) !!}
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
                    {!! Form::label('doctor_name', trans('quickadmin.ip.fields.doctor-name').'', ['class' => 'control-label']) !!}
                    {!! Form::text('doctor_name', old('doctor_name'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('doctor_name'))
                        <p class="help-block">
                            {{ $errors->first('doctor_name') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('speciality', trans('quickadmin.ip.fields.speciality').'', ['class' => 'control-label']) !!}
                    {!! Form::text('speciality', old('speciality'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('speciality'))
                        <p class="help-block">
                            {{ $errors->first('speciality') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('surgical_package_name', trans('quickadmin.ip.fields.surgical-package-name').'', ['class' => 'control-label']) !!}
                    {!! Form::text('surgical_package_name', old('surgical_package_name'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('surgical_package_name'))
                        <p class="help-block">
                            {{ $errors->first('surgical_package_name') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('total_pharmacy_amount', trans('quickadmin.ip.fields.total-pharmacy-amount').'', ['class' => 'control-label']) !!}
                    {!! Form::text('total_pharmacy_amount', old('total_pharmacy_amount'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('total_pharmacy_amount'))
                        <p class="help-block">
                            {{ $errors->first('total_pharmacy_amount') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('pharmacy_amt', trans('quickadmin.ip.fields.pharmacy-amt').'', ['class' => 'control-label']) !!}
                    {!! Form::text('pharmacy_amt', old('pharmacy_amt'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('pharmacy_amt'))
                        <p class="help-block">
                            {{ $errors->first('pharmacy_amt') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('total_consumables', trans('quickadmin.ip.fields.total-consumables').'', ['class' => 'control-label']) !!}
                    {!! Form::text('total_consumables', old('total_consumables'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('total_consumables'))
                        <p class="help-block">
                            {{ $errors->first('total_consumables') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('bill_to', trans('quickadmin.ip.fields.bill-to').'', ['class' => 'control-label']) !!}
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
                    {!! Form::label('admission_date', trans('quickadmin.ip.fields.admission-date').'', ['class' => 'control-label']) !!}
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
                    {!! Form::label('discharge_date', trans('quickadmin.ip.fields.discharge-date').'', ['class' => 'control-label']) !!}
                    {!! Form::text('discharge_date', old('discharge_date'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('discharge_date'))
                        <p class="help-block">
                            {{ $errors->first('discharge_date') }}
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
            
            $('.date').datetimepicker({
                format: "{{ config('app.date_format_moment') }}",
                locale: "{{ App::getLocale() }}",
            });
            
            $('.datetime').datetimepicker({
                format: "{{ config('app.datetime_format_moment') }}",
                locale: "{{ App::getLocale() }}",
                sideBySide: true,
            });
            
        });
    </script>
            
@stop