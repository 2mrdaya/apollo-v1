@inject('request', 'Illuminate\Http\Request')
@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.ip.title')</h3>
    @can('ip_create')
    <p>
        <a href="{{ route('admin.ips.create') }}" class="btn btn-success">@lang('quickadmin.qa_add_new')</a>
        <a href="#" class="btn btn-warning" style="margin-left:5px;" data-toggle="modal" data-target="#myModal">@lang('quickadmin.qa_csvImport')</a>
        @include('csvImport.modal', ['model' => 'Ip'])

    </p>
    @endcan

    @can('ip_delete')
    <p>
        <ul class="list-inline">
            <li><a href="{{ route('admin.ips.index') }}" style="{{ request('show_deleted') == 1 ? '' : 'font-weight: 700' }}">@lang('quickadmin.qa_all')</a></li> |
            <li><a href="{{ route('admin.ips.index') }}?show_deleted=1" style="{{ request('show_deleted') == 1 ? 'font-weight: 700' : '' }}">@lang('quickadmin.qa_trash')</a></li>
        </ul>
    </p>
    @endcan


    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_list')
        </div>

        <div class="panel-body table-responsive">
            <table class="table table-bordered table-striped ajaxTable @can('ip_delete') @if ( request('show_deleted') != 1 ) dt-select @endif @endcan">
                <thead>
                    <tr>
                        @can('ip_delete')
                            @if ( request('show_deleted') != 1 )<th style="text-align:center;"><input type="checkbox" id="select-all" /></th>@endif
                        @endcan

                        <th>@lang('quickadmin.ip.fields.uhid')</th>
                        <th>@lang('quickadmin.ip.fields.bill-date')</th>
                        <th>@lang('quickadmin.ip.fields.bill-no')</th>
                        <th>@lang('quickadmin.ip.fields.ip-no')</th>
                        <th>@lang('quickadmin.ip.fields.patient-name')</th>
                        <th>@lang('quickadmin.ip.fields.country')</th>
                        <th>@lang('quickadmin.ip.fields.state')</th>
                        <th>@lang('quickadmin.ip.fields.city')</th>
                        <th>@lang('quickadmin.ip.fields.customer-name')</th>
                        <th>@lang('quickadmin.ip.fields.total-service-amount')</th>
                        <th>@lang('quickadmin.ip.fields.tax-amount')</th>
                        <th>@lang('quickadmin.ip.fields.total-bill-amount')</th>
                        <th>@lang('quickadmin.ip.fields.tcs-tax')</th>
                        <th>@lang('quickadmin.ip.fields.discount-amount')</th>
                        <th>@lang('quickadmin.ip.fields.doctor-name')</th>
                        <th>@lang('quickadmin.ip.fields.speciality')</th>
                        <th>@lang('quickadmin.ip.fields.surgical-package-name')</th>
                        <th>@lang('quickadmin.ip.fields.total-pharmacy-amount')</th>
                        <th>@lang('quickadmin.ip.fields.total-consumables')</th>
                        <th>@lang('quickadmin.ip.fields.bill-to')</th>
                        <th>@lang('quickadmin.ip.fields.admission-date')</th>
                        <th>@lang('quickadmin.ip.fields.discharge-date')</th>
                        @if( request('show_deleted') == 1 )
                        <th>&nbsp;</th>
                        @else
                        <th>&nbsp;</th>
                        @endif
                    </tr>
                </thead>
            </table>
        </div>
    </div>
@stop

@section('javascript')
    <script>
        @can('ip_delete')
            @if ( request('show_deleted') != 1 ) window.route_mass_crud_entries_destroy = '{{ route('admin.ips.mass_destroy') }}'; @endif
        @endcan
        $(document).ready(function () {
            window.dtDefaultOptions.ajax = '{!! route('admin.ips.index') !!}?show_deleted={{ request('show_deleted') }}';
            window.dtDefaultOptions.columns = [@can('ip_delete')
                @if ( request('show_deleted') != 1 )
                    {data: 'massDelete', name: 'id', searchable: false, sortable: false},
                @endif
                @endcan{data: 'uhid', name: 'uhid'},
                {data: 'bill_date', name: 'bill_date'},
                {data: 'bill_no', name: 'bill_no'},
                {data: 'ip_no', name: 'ip_no'},
                {data: 'patient_name', name: 'patient_name'},
                {data: 'country', name: 'country'},
                {data: 'state', name: 'state'},
                {data: 'city', name: 'city'},
                {data: 'customer_name', name: 'customer_name'},
                {data: 'total_service_amount', name: 'total_service_amount'},
                {data: 'tax_amount', name: 'tax_amount'},
                {data: 'total_bill_amount', name: 'total_bill_amount'},
                {data: 'tcs_tax', name: 'tcs_tax'},
                {data: 'discount_amount', name: 'discount_amount'},
                {data: 'doctor_name', name: 'doctor_name'},
                {data: 'speciality', name: 'speciality'},
                {data: 'surgical_package_name', name: 'surgical_package_name'},
                {data: 'total_pharmacy_amount', name: 'total_pharmacy_amount'},
                {data: 'total_consumables', name: 'total_consumables'},
                {data: 'bill_to', name: 'bill_to'},
                {data: 'admission_date', name: 'admission_date'},
                {data: 'discharge_date', name: 'discharge_date'},

                {data: 'actions', name: 'actions', searchable: false, sortable: false}
            ];
            processAjaxTables();
        });
    </script>
@endsection
