@inject('request', 'Illuminate\Http\Request')
@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.gstimport.title')</h3>
    @can('gstimport_create')
    <p>
        <a href="{{ route('admin.gstimports.create') }}" class="btn btn-success">@lang('quickadmin.qa_add_new')</a>
        <a href="#" class="btn btn-warning" style="margin-left:5px;" data-toggle="modal" data-target="#myModal">@lang('quickadmin.qa_csvImport')</a>
        @include('csvImport.modal', ['model' => 'Gstimport'])
        
    </p>
    @endcan

    

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_list')
        </div>

        <div class="panel-body table-responsive">
            <table class="table table-bordered table-striped ajaxTable @can('gstimport_delete') dt-select @endcan">
                <thead>
                    <tr>
                        @can('gstimport_delete')
                            <th style="text-align:center;"><input type="checkbox" id="select-all" /></th>
                        @endcan

                        <th>@lang('quickadmin.gstimport.fields.bill-no')</th>
                        <th>@lang('quickadmin.gstimport.fields.gst-amout')</th>
                        <th>@lang('quickadmin.gstimport.fields.booking-month')</th>
                        <th>@lang('quickadmin.gstimport.fields.payment-month')</th>
                                                <th>&nbsp;</th>

                    </tr>
                </thead>
            </table>
        </div>
    </div>
@stop

@section('javascript') 
    <script>
        @can('gstimport_delete')
            window.route_mass_crud_entries_destroy = '{{ route('admin.gstimports.mass_destroy') }}';
        @endcan
        $(document).ready(function () {
            window.dtDefaultOptions.ajax = '{!! route('admin.gstimports.index') !!}';
            window.dtDefaultOptions.columns = [@can('gstimport_delete')
                    {data: 'massDelete', name: 'id', searchable: false, sortable: false},
                @endcan{data: 'bill_no', name: 'bill_no'},
                {data: 'gst_amout', name: 'gst_amout'},
                {data: 'booking_month', name: 'booking_month'},
                {data: 'payment_month', name: 'payment_month'},
                
                {data: 'actions', name: 'actions', searchable: false, sortable: false}
            ];
            processAjaxTables();
        });
    </script>
@endsection