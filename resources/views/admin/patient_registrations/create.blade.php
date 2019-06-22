@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.patient-registration.title')</h3>
    {!! Form::open(['method' => 'POST', 'route' => ['admin.patient_registrations.store']]) !!}

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_create')
        </div>
        
        <div class="panel-body">
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('uhid', trans('quickadmin.patient-registration.fields.uhid').'*', ['class' => 'control-label']) !!}
                    {!! Form::text('uhid', old('uhid'), ['class' => 'form-control', 'placeholder' => 'Enter UHID', 'required' => '']) !!}
                    <p class="help-block">Enter UHID</p>
                    @if($errors->has('uhid'))
                        <p class="help-block">
                            {{ $errors->first('uhid') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('patient_name', trans('quickadmin.patient-registration.fields.patient-name').'*', ['class' => 'control-label']) !!}
                    {!! Form::text('patient_name', old('patient_name'), ['class' => 'form-control', 'placeholder' => 'Enter Patient Name', 'required' => '']) !!}
                    <p class="help-block">Enter Patient Name</p>
                    @if($errors->has('patient_name'))
                        <p class="help-block">
                            {{ $errors->first('patient_name') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('registration_date', trans('quickadmin.patient-registration.fields.registration-date').'*', ['class' => 'control-label']) !!}
                    {!! Form::text('registration_date', old('registration_date'), ['class' => 'form-control datetime', 'placeholder' => 'Enter Registration Date', 'required' => '']) !!}
                    <p class="help-block">Enter Registration Date</p>
                    @if($errors->has('registration_date'))
                        <p class="help-block">
                            {{ $errors->first('registration_date') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('city', trans('quickadmin.patient-registration.fields.city').'', ['class' => 'control-label']) !!}
                    {!! Form::text('city', old('city'), ['class' => 'form-control', 'placeholder' => 'Enter City Name']) !!}
                    <p class="help-block">Enter City Name</p>
                    @if($errors->has('city'))
                        <p class="help-block">
                            {{ $errors->first('city') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('country', trans('quickadmin.patient-registration.fields.country').'', ['class' => 'control-label']) !!}
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
                    {!! Form::label('address', trans('quickadmin.patient-registration.fields.address').'', ['class' => 'control-label']) !!}
                    {!! Form::text('address', old('address'), ['class' => 'form-control', 'placeholder' => 'Enter Address']) !!}
                    <p class="help-block">Enter Address</p>
                    @if($errors->has('address'))
                        <p class="help-block">
                            {{ $errors->first('address') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('mobile', trans('quickadmin.patient-registration.fields.mobile').'', ['class' => 'control-label']) !!}
                    {!! Form::text('mobile', old('mobile'), ['class' => 'form-control', 'placeholder' => 'Enter Mobile Number']) !!}
                    <p class="help-block">Enter Mobile Number</p>
                    @if($errors->has('mobile'))
                        <p class="help-block">
                            {{ $errors->first('mobile') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('email_id', trans('quickadmin.patient-registration.fields.email-id').'', ['class' => 'control-label']) !!}
                    {!! Form::text('email_id', old('email_id'), ['class' => 'form-control', 'placeholder' => 'Enter Email Id']) !!}
                    <p class="help-block">Enter Email Id</p>
                    @if($errors->has('email_id'))
                        <p class="help-block">
                            {{ $errors->first('email_id') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('operator_name', trans('quickadmin.patient-registration.fields.operator-name').'', ['class' => 'control-label']) !!}
                    {!! Form::text('operator_name', old('operator_name'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('operator_name'))
                        <p class="help-block">
                            {{ $errors->first('operator_name') }}
                        </p>
                    @endif
                </div>
            </div>
            
        </div>
    </div>
    <div class="panel panel-default">
        <div class="panel-heading">
            Message Mapping
        </div>
        <div class="panel-body">
            <table class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>@lang('quickadmin.message-mapping.fields.message')</th>
                        <th>@lang('quickadmin.message-mapping.fields.source')</th>
                        <th>@lang('quickadmin.message-mapping.fields.patient-name')</th>
                        <th>@lang('quickadmin.message-mapping.fields.referrer-name')</th>
                        
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody id="message-mapping">
                    @foreach(old('message_mappings', []) as $index => $data)
                        @include('admin.patient_registrations.message_mappings_row', [
                            'index' => $index
                        ])
                    @endforeach
                </tbody>
            </table>
            <a href="#" class="btn btn-success pull-right add-new">@lang('quickadmin.qa_add_new')</a>
        </div>
    </div>

    {!! Form::submit(trans('quickadmin.qa_save'), ['class' => 'btn btn-danger']) !!}
    {!! Form::close() !!}
@stop

@section('javascript')
    @parent

    <script type="text/html" id="message-mapping-template">
        @include('admin.patient_registrations.message_mappings_row',
                [
                    'index' => '_INDEX_',
                ])
               </script > 

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
            
            <script>
        $('.add-new').click(function () {
            var tableBody = $(this).parent().find('tbody');
            var template = $('#' + tableBody.attr('id') + '-template').html();
            var lastIndex = parseInt(tableBody.find('tr').last().data('index'));
            if (isNaN(lastIndex)) {
                lastIndex = 0;
            }
            tableBody.append(template.replace(/_INDEX_/g, lastIndex + 1));
            return false;
        });
        $(document).on('click', '.remove', function () {
            var row = $(this).parentsUntil('tr').parent();
            row.remove();
            return false;
        });
        </script>
@stop