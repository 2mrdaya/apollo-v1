@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.ip.title')</h3>

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_view')
        </div>

        <div class="panel-body table-responsive">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>@lang('quickadmin.ip.fields.uhid')</th>
                            <td field-key='uhid'>{{ $ip->uhid }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.ip.fields.bill-date')</th>
                            <td field-key='bill_date'>{{ $ip->bill_date }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.ip.fields.ip-no')</th>
                            <td field-key='ip_no'>{{ $ip->ip_no }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.ip.fields.patient-name')</th>
                            <td field-key='patient_name'>{{ $ip->patient_name }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.ip.fields.country')</th>
                            <td field-key='country'>{{ $ip->country }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.ip.fields.state')</th>
                            <td field-key='state'>{{ $ip->state }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.ip.fields.city')</th>
                            <td field-key='city'>{{ $ip->city }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.ip.fields.bill-no')</th>
                            <td field-key='bill_no'>{{ $ip->bill_no }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.ip.fields.customer-name')</th>
                            <td field-key='customer_name'>{{ $ip->customer_name }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.ip.fields.total-service-amount')</th>
                            <td field-key='total_service_amount'>{{ $ip->total_service_amount }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.ip.fields.tax-amount')</th>
                            <td field-key='tax_amount'>{{ $ip->tax_amount }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.ip.fields.total-bill-amount')</th>
                            <td field-key='total_bill_amount'>{{ $ip->total_bill_amount }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.ip.fields.tcs-tax')</th>
                            <td field-key='tcs_tax'>{{ $ip->tcs_tax }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.ip.fields.discount-amount')</th>
                            <td field-key='discount_amount'>{{ $ip->discount_amount }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.ip.fields.doctor-name')</th>
                            <td field-key='doctor_name'>{{ $ip->doctor_name }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.ip.fields.speciality')</th>
                            <td field-key='speciality'>{{ $ip->speciality }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.ip.fields.surgical-package-name')</th>
                            <td field-key='surgical_package_name'>{{ $ip->surgical_package_name }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.ip.fields.total-pharmacy-amount')</th>
                            <td field-key='total_pharmacy_amount'>{{ $ip->total_pharmacy_amount }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.ip.fields.pharmacy-amt')</th>
                            <td field-key='pharmacy_amt'>{{ $ip->pharmacy_amt }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.ip.fields.total-consumables')</th>
                            <td field-key='total_consumables'>{{ $ip->total_consumables }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.ip.fields.bill-to')</th>
                            <td field-key='bill_to'>{{ $ip->bill_to }}</td>
                        </tr>
                    </table>
                </div>
            </div>

            <p>&nbsp;</p>

            <a href="{{ route('admin.ips.index') }}" class="btn btn-default">@lang('quickadmin.qa_back_to_list')</a>
        </div>
    </div>
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
            
        });
    </script>
            
@stop
