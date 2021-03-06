@inject('request', 'Illuminate\Http\Request')
@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.patient-registration.title')</h3>
    @can('patient_registration_create')
    <p>
        <a href="{{ route('admin.patient_registrations.create') }}" class="btn btn-success">@lang('quickadmin.qa_add_new')</a>
        <a href="#" class="btn btn-warning" style="margin-left:5px;" data-toggle="modal" data-target="#myModal">@lang('quickadmin.qa_csvImport')</a>
        @include('csvImport.modal', ['model' => 'PatientRegistration'])
        
    </p>
    @endcan

    @can('patient_registration_delete')
    <p>
        <ul class="list-inline">
            <li><a href="{{ route('admin.patient_registrations.index') }}" style="{{ request('show_deleted') == 1 ? '' : 'font-weight: 700' }}">@lang('quickadmin.qa_all')</a></li> |
            <li><a href="{{ route('admin.patient_registrations.index') }}?show_deleted=1" style="{{ request('show_deleted') == 1 ? 'font-weight: 700' : '' }}">@lang('quickadmin.qa_trash')</a></li>
        </ul>
    </p>
    @endcan


    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_list')
        </div>

        <div class="panel-body table-responsive">
            <table class="table table-bordered table-striped ajaxTable @can('patient_registration_delete') @if ( request('show_deleted') != 1 ) dt-select @endif @endcan">
                <thead>
                    <tr>
                        @can('patient_registration_delete')
                            @if ( request('show_deleted') != 1 )<th style="text-align:center;"><input type="checkbox" id="select-all" /></th>@endif
                        @endcan

                        <th>@lang('quickadmin.patient-registration.fields.uhid')</th>
                        <th>@lang('quickadmin.patient-registration.fields.patient-name')</th>
                        <th>@lang('quickadmin.patient-registration.fields.registration-date')</th>
                        <th>@lang('quickadmin.patient-registration.fields.city')</th>
                        <th>@lang('quickadmin.patient-registration.fields.country')</th>
                        <th>@lang('quickadmin.patient-registration.fields.address')</th>
                        <th>@lang('quickadmin.patient-registration.fields.mobile')</th>
                        <th>@lang('quickadmin.patient-registration.fields.email-id')</th>
                        <th>@lang('quickadmin.patient-registration.fields.operator-name')</th>
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
        @can('patient_registration_delete')
            @if ( request('show_deleted') != 1 ) window.route_mass_crud_entries_destroy = '{{ route('admin.patient_registrations.mass_destroy') }}'; @endif
        @endcan
        $(document).ready(function () {
            window.dtDefaultOptions.ajax = '{!! route('admin.patient_registrations.index') !!}?show_deleted={{ request('show_deleted') }}';
            window.dtDefaultOptions.columns = [@can('patient_registration_delete')
                @if ( request('show_deleted') != 1 )
                    {data: 'massDelete', name: 'id', searchable: false, sortable: false},
                @endif
                @endcan{data: 'uhid', name: 'uhid'},
                {data: 'patient_name', name: 'patient_name'},
                {data: 'registration_date', name: 'registration_date'},
                {data: 'city', name: 'city'},
                {data: 'country', name: 'country'},
                {data: 'address', name: 'address'},
                {data: 'mobile', name: 'mobile'},
                {data: 'email_id', name: 'email_id'},
                {data: 'operator_name', name: 'operator_name'},
                
                {data: 'actions', name: 'actions', searchable: false, sortable: false}
            ];
            processAjaxTables();
        });
    </script>
@endsection