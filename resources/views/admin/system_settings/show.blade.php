@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.system-settings.title')</h3>

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_view')
        </div>

        <div class="panel-body table-responsive">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>@lang('quickadmin.system-settings.fields.code')</th>
                            <td field-key='code'>{{ $system_setting->code }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.system-settings.fields.description')</th>
                            <td field-key='description'>{{ $system_setting->description }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.system-settings.fields.value')</th>
                            <td field-key='value'>{!! $system_setting->value !!}</td>
                        </tr>
                    </table>
                </div>
            </div>

            <p>&nbsp;</p>

            <a href="{{ route('admin.system_settings.index') }}" class="btn btn-default">@lang('quickadmin.qa_back_to_list')</a>
        </div>
    </div>
@stop


