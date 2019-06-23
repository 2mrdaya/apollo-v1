@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.avip.title')</h3>

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_view')
        </div>

        <div class="panel-body table-responsive">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>@lang('quickadmin.avip.fields.name')</th>
                            <td field-key='name'>{{ $avip->name }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.avip.fields.address-1')</th>
                            <td field-key='address_1'>{{ $avip->address_1 }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.avip.fields.address-2')</th>
                            <td field-key='address_2'>{{ $avip->address_2 }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.avip.fields.bank-name')</th>
                            <td field-key='bank_name'>{{ $avip->bank_name }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.avip.fields.bank-address')</th>
                            <td field-key='bank_address'>{{ $avip->bank_address }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.avip.fields.account-no')</th>
                            <td field-key='account_no'>{{ $avip->account_no }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.avip.fields.swift-code')</th>
                            <td field-key='swift_code'>{{ $avip->swift_code }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.avip.fields.iban-number')</th>
                            <td field-key='iban_number'>{{ $avip->iban_number }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.avip.fields.bank-code')</th>
                            <td field-key='bank_code'>{{ $avip->bank_code }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.avip.fields.correspondence-bank-name')</th>
                            <td field-key='correspondence_bank_name'>{{ $avip->correspondence_bank_name }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.avip.fields.correspondence-ac-no')</th>
                            <td field-key='correspondence_ac_no'>{{ $avip->correspondence_ac_no }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.avip.fields.corp-swift-code')</th>
                            <td field-key='corp_swift_code'>{{ $avip->corp_swift_code }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.avip.fields.ifsc-code')</th>
                            <td field-key='ifsc_code'>{{ $avip->ifsc_code }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.avip.fields.pan-number')</th>
                            <td field-key='pan_number'>{{ $avip->pan_number }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.avip.fields.oracle-code')</th>
                            <td field-key='oracle_code'>{{ $avip->oracle_code }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.avip.fields.rate-details')</th>
                            <td field-key='rate_details'>{{ $avip->rate_details }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.avip.fields.state')</th>
                            <td field-key='state'>{{ $avip->state }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.avip.fields.pin-code')</th>
                            <td field-key='pin_code'>{{ $avip->pin_code }}</td>
                        </tr>
                    </table>
                </div>
            </div><!-- Nav tabs -->
<ul class="nav nav-tabs" role="tablist">
    
<li role="presentation" class="active"><a href="#message_mapping" aria-controls="message_mapping" role="tab" data-toggle="tab">Message Mapping</a></li>
</ul>

<!-- Tab panes -->
<div class="tab-content">
    
<div role="tabpanel" class="tab-pane active" id="message_mapping">
<table class="table table-bordered table-striped {{ count($message_mappings) > 0 ? 'datatable' : '' }}">
    <thead>
        <tr>
            <th>@lang('quickadmin.message-mapping.fields.channel')</th>
                        <th>@lang('quickadmin.message-mapping.fields.message')</th>
                        <th>@lang('quickadmin.message-mapping.fields.source')</th>
                        <th>@lang('quickadmin.message-mapping.fields.patient-name')</th>
                        <th>@lang('quickadmin.message-mapping.fields.referrer-name')</th>
                        <th>@lang('quickadmin.message-mapping.fields.intimation-date-time')</th>
                        @if( request('show_deleted') == 1 )
                        <th>&nbsp;</th>
                        @else
                        <th>&nbsp;</th>
                        @endif
        </tr>
    </thead>

    <tbody>
        @if (count($message_mappings) > 0)
            @foreach ($message_mappings as $message_mapping)
                <tr data-entry-id="{{ $message_mapping->id }}">
                    <td field-key='channel'>{{ $message_mapping->channel }}</td>
                                <td field-key='message'>{{ $message_mapping->message }}</td>
                                <td field-key='source'>{{ $message_mapping->source }}</td>
                                <td field-key='patient_name'>{{ $message_mapping->patient_name }}</td>
                                <td field-key='referrer_name'>{{ $message_mapping->referrer_name }}</td>
                                <td field-key='intimation_date_time'>{{ $message_mapping->intimation_date_time }}</td>
                                @if( request('show_deleted') == 1 )
                                <td>
                                    @can('message_mapping_delete')
                                                                        {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'POST',
                                        'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
                                        'route' => ['admin.message_mappings.restore', $message_mapping->id])) !!}
                                    {!! Form::submit(trans('quickadmin.qa_restore'), array('class' => 'btn btn-xs btn-success')) !!}
                                    {!! Form::close() !!}
                                @endcan
                                    @can('message_mapping_delete')
                                                                        {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
                                        'route' => ['admin.message_mappings.perma_del', $message_mapping->id])) !!}
                                    {!! Form::submit(trans('quickadmin.qa_permadel'), array('class' => 'btn btn-xs btn-danger')) !!}
                                    {!! Form::close() !!}
                                @endcan
                                </td>
                                @else
                                <td>
                                    @can('message_mapping_view')
                                    <a href="{{ route('admin.message_mappings.show',[$message_mapping->id]) }}" class="btn btn-xs btn-primary">@lang('quickadmin.qa_view')</a>
                                    @endcan
                                    @can('message_mapping_edit')
                                    <a href="{{ route('admin.message_mappings.edit',[$message_mapping->id]) }}" class="btn btn-xs btn-info">@lang('quickadmin.qa_edit')</a>
                                    @endcan
                                    @can('message_mapping_delete')
{!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
                                        'route' => ['admin.message_mappings.destroy', $message_mapping->id])) !!}
                                    {!! Form::submit(trans('quickadmin.qa_delete'), array('class' => 'btn btn-xs btn-danger')) !!}
                                    {!! Form::close() !!}
                                    @endcan
                                </td>
                                @endif
                </tr>
            @endforeach
        @else
            <tr>
                <td colspan="13">@lang('quickadmin.qa_no_entries_in_table')</td>
            </tr>
        @endif
    </tbody>
</table>
</div>
</div>

            <p>&nbsp;</p>

            <a href="{{ route('admin.avips.index') }}" class="btn btn-default">@lang('quickadmin.qa_back_to_list')</a>
        </div>
    </div>
@stop


