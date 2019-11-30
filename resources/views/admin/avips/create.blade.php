@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.avip.title')</h3>
    {!! Form::open(['method' => 'POST', 'route' => ['admin.avips.store']]) !!}

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_create')
        </div>

        <div class="panel-body">
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('oracle_code', trans('quickadmin.avip.fields.oracle-code').'', ['class' => 'control-label']) !!}
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
                    {!! Form::label('name', trans('quickadmin.avip.fields.name').'*', ['class' => 'control-label']) !!}
                    {!! Form::text('name', old('name'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('name'))
                        <p class="help-block">
                            {{ $errors->first('name') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('address_1', trans('quickadmin.avip.fields.address-1').'', ['class' => 'control-label']) !!}
                    {!! Form::text('address_1', old('address_1'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('address_1'))
                        <p class="help-block">
                            {{ $errors->first('address_1') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('address_2', trans('quickadmin.avip.fields.address-2').'', ['class' => 'control-label']) !!}
                    {!! Form::text('address_2', old('address_2'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('address_2'))
                        <p class="help-block">
                            {{ $errors->first('address_2') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('bank_name', trans('quickadmin.avip.fields.bank-name').'', ['class' => 'control-label']) !!}
                    {!! Form::text('bank_name', old('bank_name'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('bank_name'))
                        <p class="help-block">
                            {{ $errors->first('bank_name') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('bank_address', trans('quickadmin.avip.fields.bank-address').'', ['class' => 'control-label']) !!}
                    {!! Form::text('bank_address', old('bank_address'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('bank_address'))
                        <p class="help-block">
                            {{ $errors->first('bank_address') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('account_no', trans('quickadmin.avip.fields.account-no').'*', ['class' => 'control-label']) !!}
                    {!! Form::text('account_no', old('account_no'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('account_no'))
                        <p class="help-block">
                            {{ $errors->first('account_no') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('swift_code', trans('quickadmin.avip.fields.swift-code').'', ['class' => 'control-label']) !!}
                    {!! Form::text('swift_code', old('swift_code'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('swift_code'))
                        <p class="help-block">
                            {{ $errors->first('swift_code') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('iban_number', trans('quickadmin.avip.fields.iban-number').'', ['class' => 'control-label']) !!}
                    {!! Form::text('iban_number', old('iban_number'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('iban_number'))
                        <p class="help-block">
                            {{ $errors->first('iban_number') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('bank_code', trans('quickadmin.avip.fields.bank-code').'', ['class' => 'control-label']) !!}
                    {!! Form::text('bank_code', old('bank_code'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('bank_code'))
                        <p class="help-block">
                            {{ $errors->first('bank_code') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('correspondence_bank_name', trans('quickadmin.avip.fields.correspondence-bank-name').'', ['class' => 'control-label']) !!}
                    {!! Form::text('correspondence_bank_name', old('correspondence_bank_name'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('correspondence_bank_name'))
                        <p class="help-block">
                            {{ $errors->first('correspondence_bank_name') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('correspondence_ac_no', trans('quickadmin.avip.fields.correspondence-ac-no').'', ['class' => 'control-label']) !!}
                    {!! Form::text('correspondence_ac_no', old('correspondence_ac_no'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('correspondence_ac_no'))
                        <p class="help-block">
                            {{ $errors->first('correspondence_ac_no') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('corp_swift_code', trans('quickadmin.avip.fields.corp-swift-code').'', ['class' => 'control-label']) !!}
                    {!! Form::text('corp_swift_code', old('corp_swift_code'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('corp_swift_code'))
                        <p class="help-block">
                            {{ $errors->first('corp_swift_code') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('ifsc_code', trans('quickadmin.avip.fields.ifsc-code').'', ['class' => 'control-label']) !!}
                    {!! Form::text('ifsc_code', old('ifsc_code'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('ifsc_code'))
                        <p class="help-block">
                            {{ $errors->first('ifsc_code') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('pan_number', trans('quickadmin.avip.fields.pan-number').'', ['class' => 'control-label']) !!}
                    {!! Form::text('pan_number', old('pan_number'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('pan_number'))
                        <p class="help-block">
                            {{ $errors->first('pan_number') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('rate_details', trans('quickadmin.avip.fields.rate-details').'', ['class' => 'control-label']) !!}
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
                    {!! Form::label('state', trans('quickadmin.avip.fields.state').'', ['class' => 'control-label']) !!}
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
                    {!! Form::label('pin_code', trans('quickadmin.avip.fields.pin-code').'', ['class' => 'control-label']) !!}
                    {!! Form::number('pin_code', old('pin_code'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('pin_code'))
                        <p class="help-block">
                            {{ $errors->first('pin_code') }}
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
                        @include('admin.avips.message_mappings_row', [
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
        @include('admin.avips.message_mappings_row',
                [
                    'index' => '_INDEX_',
                ])
               </script >

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
