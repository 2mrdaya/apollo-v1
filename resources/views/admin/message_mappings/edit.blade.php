@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.message-mapping.title')</h3>

    {!! Form::model($message_mapping, ['method' => 'PUT', 'route' => ['admin.message_mappings.update', $message_mapping->id]]) !!}

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_edit')
        </div>

        <div class="panel-body">
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('channel', trans('quickadmin.message-mapping.fields.channel').'', ['class' => 'control-label']) !!}
                    {!! Form::select('channel', $enum_channel, old('channel'), ['class' => 'form-control select2']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('channel'))
                        <p class="help-block">
                            {{ $errors->first('channel') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('message', trans('quickadmin.message-mapping.fields.message').'*', ['class' => 'control-label']) !!}
                    {!! Form::text('message', old('message'), ['class' => 'form-control', 'placeholder' => 'Enter Message', 'required' => '']) !!}
                    <p class="help-block">Enter Message</p>
                    @if($errors->has('message'))
                        <p class="help-block">
                            {{ $errors->first('message') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('source', trans('quickadmin.message-mapping.fields.source').'*', ['class' => 'control-label']) !!}
                    {!! Form::text('source', old('source'), ['class' => 'form-control', 'placeholder' => 'Enter Message Source', 'required' => '']) !!}
                    <p class="help-block">Enter Message Source</p>
                    @if($errors->has('source'))
                        <p class="help-block">
                            {{ $errors->first('source') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('patient_name', trans('quickadmin.message-mapping.fields.patient-name').'', ['class' => 'control-label']) !!}
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
                    {!! Form::label('referrer_name', trans('quickadmin.message-mapping.fields.referrer-name').'', ['class' => 'control-label']) !!}
                    {!! Form::text('referrer_name', old('referrer_name'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('referrer_name'))
                        <p class="help-block">
                            {{ $errors->first('referrer_name') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('intimation_date_time', trans('quickadmin.message-mapping.fields.intimation-date-time').'*', ['class' => 'control-label']) !!}
                    {!! Form::text('intimation_date_time', old('intimation_date_time'), ['class' => 'form-control datetime', 'placeholder' => 'Enter Intimation Date Time', 'required' => '']) !!}
                    <p class="help-block">Enter Intimation Date Time</p>
                    @if($errors->has('intimation_date_time'))
                        <p class="help-block">
                            {{ $errors->first('intimation_date_time') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('uhid_id', trans('quickadmin.message-mapping.fields.uhid').'', ['class' => 'control-label']) !!}
                    {!! Form::select('uhid_id', $uhids, old('uhid_id'), ['class' => 'form-control select2']) !!}
                    <p class="help-block">Enter Patient Id</p>
                    @if($errors->has('uhid_id'))
                        <p class="help-block">
                            {{ $errors->first('uhid_id') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('avip_id', trans('quickadmin.message-mapping.fields.avip').'', ['class' => 'control-label']) !!}
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

    {!! Form::submit(trans('quickadmin.qa_update'), ['class' => 'btn btn-danger']) !!}
    {!! Form::close() !!}
    <div id="ajaxPatient">
        @include('admin.message_mappings.mapping_patients')
    </div>
    <div id="ajaxAvips">
        @include('admin.message_mappings.mapping_avips')
    </div>
@stop

@section('javascript')
    @parent

    <script src="{{ url('adminlte/plugins/datetimepicker/moment-with-locales.min.js') }}"></script>
    <script src="{{ url('adminlte/plugins/datetimepicker/bootstrap-datetimepicker.min.js') }}"></script>
    <script>
        $(function(){
            getPatientsList();
            getAvipsList();
            moment.updateLocale('{{ App::getLocale() }}', {
                week: { dow: 1 } // Monday is the first day of the week
            });

            $('.datetime').datetimepicker({
                format: "{{ config('app.datetime_format_moment') }}",
                locale: "{{ App::getLocale() }}",
                sideBySide: true,
            });

        });

        function getPatientsList() {
            window.dtDefaultOptions = {};
            if ($.fn.DataTable.isDataTable('.ajaxTablePatient')) {
                $('.ajaxTablePatient').DataTable().clear().destroy();
            }
            $('.ajaxTablePatient tbody').empty();
            ajaxUrl = '{!! route('admin.patient_registrations.search') !!}';
            ajaxUrl = ajaxUrl + '?patient_name=' + $('#patient_name_sms').val();
            ajaxUrl = ajaxUrl + '&from_date=' + $('#from_date').val();
            ajaxUrl = ajaxUrl + '&to_date=' + $('#to_date').val();
            window.dtDefaultOptions.ajax = ajaxUrl;
            window.dtDefaultOptions.stateSave = false;
            window.dtDefaultOptions.columns = [
                {data: 'uhid', name: 'uhid'},
                {data: 'patient_name', name: 'patient_name'},
                {data: 'registration_date', name: 'registration_date'},
                {data: 'country', name: 'country'},
                {data: 'city', name: 'city'},
                {data: 'address', name: 'address'},
                {data: 'mobile', name: 'mobile'},
                {data: 'email_id', name: 'email_id'},
                {data: 'operator_name', name: 'operator_name'},
                {data: 'match_score', name: 'match_score'}
            ];
            window.dtDefaultOptions.buttons = [];
            window.dtDefaultOptions.paging = true;
            window.dtDefaultOptions.searching = false;
            window.dtDefaultOptions.order = [[ 9, "desc" ]];
            window.dtDefaultOptions.select = {style: 'single'};
            //$.fn.dataTable.ext.errMode = 'throw';
            $.fn.dataTable.ext.errMode = function ( settings, helpPage, message ) {
                console.log(message, helpPage);
            };
            table = processAjaxTables($('.ajaxTablePatient'));
            table.on( 'select', function ( e, dt, type, indexes ) {
                if ( type === 'row' ) {
                    var data = table.rows( indexes ).data().pluck( 'id' );
                    var uhid = table.rows( indexes ).data().pluck( 'uhid' );
                    $("#uhid_id").val(data[0]);
                    $("#select2-uhid_id-container").text(uhid[0]);
                }
            } );
            table.on( 'deselect', function ( e, dt, type, indexes ) {
                if ( type === 'row' ) {
                    var data = table.rows( indexes ).data().pluck( 'id' );
                    $("#uhid_id").val(null).trigger('change');
                }
            } );
        }

        function getAvipsList() {
            window.dtDefaultOptions = {};
            if ($.fn.DataTable.isDataTable('.ajaxTableAvips')) {
                $('.ajaxTableAvips').DataTable().clear().destroy();
            }
            ajaxUrl = '{!! route('admin.avips.search') !!}';
            ajaxUrl = ajaxUrl + '?avip_name=' + $('#avip_name_sms').val();
            ajaxUrl = ajaxUrl + '&from_date=' + $('#from_date').val();
            ajaxUrl = ajaxUrl + '&to_date=' + $('#to_date').val();
            window.dtDefaultOptions.ajax = ajaxUrl;
            window.dtDefaultOptions.stateSave = false;
            window.dtDefaultOptions.columns = [
                {data: 'name', name: 'name'},
                {data: 'address_1', name: 'address_1'},
                {data: 'address_2', name: 'address_2'},
                {data: 'bank_name', name: 'bank_name'},
                {data: 'bank_address', name: 'bank_address'},
                {data: 'account_no', name: 'account_no'},
                {data: 'swift_code', name: 'swift_code'},
                {data: 'iban_number', name: 'iban_number'},
                {data: 'bank_code', name: 'bank_code'},
                {data: 'correspondence_bank_name', name: 'correspondence_bank_name'},
                {data: 'correspondence_ac_no', name: 'correspondence_ac_no'},
                {data: 'corp_swift_code', name: 'corp_swift_code'},
                {data: 'ifsc_code', name: 'ifsc_code'},
                {data: 'pan_number', name: 'pan_number'},
                {data: 'oracle_code', name: 'oracle_code'},
                {data: 'rate_details', name: 'rate_details'},
                {data: 'state', name: 'state'},
                {data: 'pin_code', name: 'pin_code'},
                {data: 'match_score', name: 'match_score'}
            ];
            window.dtDefaultOptions.buttons = [];
            window.dtDefaultOptions.paging = true;
            window.dtDefaultOptions.searching = false;
            window.dtDefaultOptions.order = [[ 18, "desc" ]];
            window.dtDefaultOptions.select = {style: 'single'};
            //$.fn.dataTable.ext.errMode = 'throw';
            $.fn.dataTable.ext.errMode = function ( settings, helpPage, message ) {
                console.log(message, helpPage);
            };
            tableAvips = processAjaxTables($('.ajaxTableAvips'));
            tableAvips.on( 'select', function ( e, dt, type, indexes ) {
                if ( type === 'row' ) {
                    var data = tableAvips.rows( indexes ).data().pluck( 'id' );
                    var avip = tableAvips.rows( indexes ).data().pluck( 'name' );
                    $("#avip_id").val(data[0]);
                    $("#select2-avip_id-container").text(avip[0]);
                }
            } );
            tableAvips.on( 'deselect', function ( e, dt, type, indexes ) {
                if ( type === 'row' ) {
                    var data = tableAvips.rows( indexes ).data().pluck( 'id' );
                    $("#avip_id").val(null).trigger('change');
                }
            } );
        }
    </script>

@stop
