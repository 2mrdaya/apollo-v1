@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.gstimport.title')</h3>

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_view')
        </div>

        <div class="panel-body table-responsive">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>@lang('quickadmin.gstimport.fields.bill-no')</th>
                            <td field-key='bill_no'>{{ $gstimport->bill_no }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.gstimport.fields.gst-amout')</th>
                            <td field-key='gst_amout'>{{ $gstimport->gst_amout }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.gstimport.fields.booking-month')</th>
                            <td field-key='booking_month'>{{ $gstimport->booking_month }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.gstimport.fields.payment-month')</th>
                            <td field-key='payment_month'>{{ $gstimport->payment_month }}</td>
                        </tr>
                    </table>
                </div>
            </div>

            <p>&nbsp;</p>

            <a href="{{ route('admin.gstimports.index') }}" class="btn btn-default">@lang('quickadmin.qa_back_to_list')</a>
        </div>
    </div>
@stop


