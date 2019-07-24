@can($gateKey.'edit')
    <a href="{{ route($routeKey.'_process_one', $row->row_id) }}" class="btn btn-xs btn-info">Process</a>
@endcan
@can($gateKey.'view')
    <a href="{{ route($routeKey.'.show', $row->row_id) }}"
       class="btn btn-xs btn-primary">@lang('quickadmin.qa_view')</a>
@endcan
@can($gateKey.'edit')
    <a href="{{ route($routeKey.'.edit', $row->row_id) }}" class="btn btn-xs btn-info">@lang('quickadmin.qa_edit')</a>
@endcan
@can($gateKey.'delete')
    {!! Form::open(array(
        'style' => 'display: inline-block;',
        'method' => 'DELETE',
        'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
        'route' => [$routeKey.'.destroy', $row->row_id])) !!}
    {!! Form::submit(trans('quickadmin.qa_delete'), array('class' => 'btn btn-xs btn-danger')) !!}
    {!! Form::close() !!}
@endcan
