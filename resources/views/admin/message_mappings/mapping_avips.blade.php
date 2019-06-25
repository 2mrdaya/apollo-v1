{!! Form::model(['method' => 'POST', 'route' => ['admin.sms_imports.avip_list']]) !!}
<input type="hidden" name="id" value=""/>
<div class="panel panel-default">
    <div class="panel-heading">
        Find AVIP
    </div>
    <div class="panel-body">
        <div class="row">
            <div class="col-xs-8 form-group">
                {!! Form::label('AVIP Name SMS', 'AVIP Name SMS'.'*', ['class' => 'control-label']) !!}
                {!! Form::text('avip_name_sms', $avip_name, ['class' => 'form-control', 'id' => 'avip_name_sms']) !!}
            </div>
            <!--<div class="col-xs-2 form-group">
                {!! Form::label('From Date', 'From Date'.'*', ['class' => 'control-label']) !!}
                {!! Form::text('from_date', $from_date, ['class' => 'form-control datetime', 'id' => 'from_date']) !!}
            </div>
            <div class="col-xs-2 form-group">
                {!! Form::label('To Date', 'To Date'.'*', ['class' => 'control-label']) !!}
                {!! Form::text('to_date', $to_date, ['class' => 'form-control datetime', 'id' => 'to_date']) !!}
            </div>-->
            <div class="col-xs-4 form-group">
                    {!! Form::button('Search', ['onClick'=>'getAvipsList()', 'class' => 'btn btn-danger']) !!}
            </div>
        </div>
    </div>
    <div class="panel-body table-responsive">
        <table class="table table-bordered table-striped ajaxTable ajaxTableAvips">
            <thead>
                <tr>
                    <th>@lang('quickadmin.avip.fields.name')</th>
                    <th>@lang('quickadmin.avip.fields.address-1')</th>
                    <th>@lang('quickadmin.avip.fields.address-2')</th>
                    <th>@lang('quickadmin.avip.fields.bank-name')</th>
                    <th>@lang('quickadmin.avip.fields.bank-address')</th>
                    <th>@lang('quickadmin.avip.fields.account-no')</th>
                    <th>@lang('quickadmin.avip.fields.swift-code')</th>
                    <th>@lang('quickadmin.avip.fields.iban-number')</th>
                    <th>@lang('quickadmin.avip.fields.bank-code')</th>
                    <th>@lang('quickadmin.avip.fields.correspondence-bank-name')</th>
                    <th>@lang('quickadmin.avip.fields.correspondence-ac-no')</th>
                    <th>@lang('quickadmin.avip.fields.corp-swift-code')</th>
                    <th>@lang('quickadmin.avip.fields.ifsc-code')</th>
                    <th>@lang('quickadmin.avip.fields.pan-number')</th>
                    <th>@lang('quickadmin.avip.fields.oracle-code')</th>
                    <th>@lang('quickadmin.avip.fields.rate-details')</th>
                    <th>@lang('quickadmin.avip.fields.state')</th>
                    <th>@lang('quickadmin.avip.fields.pin-code')</th>
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
