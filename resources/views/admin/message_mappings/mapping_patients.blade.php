{!! Form::model(['method' => 'POST', 'route' => ['admin.sms_imports.patient_list']]) !!}
<input type="hidden" name="id" value=""/>
<div class="panel panel-default">
    <div class="panel-heading">
        Find Patient
    </div>
    <div class="panel-body">
        <div class="row">
            <div class="col-xs-2 form-group">
                {!! Form::label('Patient Name SMS', 'Patient Name SMS'.'*', ['class' => 'control-label']) !!}
                {!! Form::text('patient_name_sms', $patient_name, ['class' => 'form-control', 'id' => 'patient_name_sms']) !!}
            </div>
            <div class="col-xs-2 form-group">
                {!! Form::label('From Date', 'From Date'.'*', ['class' => 'control-label']) !!}
                {!! Form::text('from_date', $from_date, ['class' => 'form-control datetime', 'id' => 'from_date']) !!}
            </div>
            <div class="col-xs-2 form-group">
                {!! Form::label('To Date', 'To Date'.'*', ['class' => 'control-label']) !!}
                {!! Form::text('to_date', $to_date, ['class' => 'form-control datetime', 'id' => 'to_date']) !!}
            </div>
            <div class="col-xs-2 form-group">
                    {!! Form::button('Search', ['onClick'=>'getPatientsList()', 'class' => 'btn btn-danger']) !!}
            </div>
        </div>
    </div>
    <div class="panel-body table-responsive">
        <table class="table table-bordered table-striped ajaxTable ajaxTablePatient">
            <thead>
                <tr>
                    <th>@lang('quickadmin.message-mapping.fields.uhid')</th>
                    <th>@lang('quickadmin.patient-registration.fields.patient-name')</th>
                    <th>@lang('quickadmin.patient-registration.fields.registration-date')</th>
                    <th>@lang('quickadmin.patient-registration.fields.country')</th>
                    <th>@lang('quickadmin.patient-registration.fields.city')</th>
                    <th>@lang('quickadmin.patient-registration.fields.address')</th>
                    <th>@lang('quickadmin.patient-registration.fields.mobile')</th>
                    <th>@lang('quickadmin.patient-registration.fields.email-id')</th>
                    <th>@lang('quickadmin.patient-registration.fields.operator-name')</th>
                    <th>Match Score</th>
                </tr>
            </thead>
        </table>
    </div>
</div>
{!! Form::close() !!}
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
@endsection
