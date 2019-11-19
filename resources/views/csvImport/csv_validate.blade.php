@extends('layouts.app')

@section('content')


    <div class='row'>
        <div class='col-md-12'>
            <div class="panel panel-default">
                <div class="panel-heading">
                    @lang('Import Error List')
                </div>

                <div class="panel-body table-responsive">
                    <form class="form-horizontal" method="POST" action="{{ route('admin.csv_process') }}">
                        {{ csrf_field() }}

                        <input type="hidden" name="modelName" value="{{ $modelName }}"/>
                        <input type="hidden" name="module" value="{{ $module }}"/>
                        <input type="hidden" name="redirect" value="{{ $redirect }}"/>
                        <input type="hidden" name="fileName" value="{{ $fileName }}"/>
                        <input type="hidden" name="error" value="{{ implode(',', $errorRowIndexes)}}">
                        <input type="hidden" name="fields" value="{{ implode(',', $fields_org)}}"/>
                        <table class="table">
                            @if (isset($headerRow))
                                <tr>
                                    @foreach ($headerRow as $field)
                                         @if($field!='status')
                                            <input type="hidden" name="field[]" value="{{ $field }}"/>
                                         @endif
                                        <th>{{ $field }}</th>
                                    @endforeach
                                </tr>
                            @endif
                            @php
                            $i=0 ;
                            $errorStatus   = true;
                            @endphp
                                @foreach ($tableData as $key => $data)

                                @if($data['status']!='Success')
                                @php($errorStatus   = false)
                                    <tr class="error">
                                @else
                                    <tr>
                                @endif
                                    @foreach ($headerRow as $field)
                                    <td>{{ $data[$field] }}</td>
                                    @endforeach
                                </tr>
                                  @php($i++)
                                @endforeach

                        </table>

                        <button type="submit" class="btn btn-primary">
                            @lang('quickadmin.qa_import_data')
                        </button>

                    </form>
                </div>
            </div>
        </div>
    </div>
<style type="text/css">

    .error{color:red;}
</style>
@endsection
