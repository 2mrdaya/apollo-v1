<tr data-index="{{ $index }}">
    <td>{!! Form::text('message_mappings['.$index.'][message]', old('message_mappings['.$index.'][message]', isset($field) ? $field->message: ''), ['class' => 'form-control']) !!}</td>
<td>{!! Form::text('message_mappings['.$index.'][source]', old('message_mappings['.$index.'][source]', isset($field) ? $field->source: ''), ['class' => 'form-control']) !!}</td>
<td>{!! Form::text('message_mappings['.$index.'][patient_name]', old('message_mappings['.$index.'][patient_name]', isset($field) ? $field->patient_name: ''), ['class' => 'form-control']) !!}</td>
<td>{!! Form::text('message_mappings['.$index.'][referrer_name]', old('message_mappings['.$index.'][referrer_name]', isset($field) ? $field->referrer_name: ''), ['class' => 'form-control']) !!}</td>

    <td>
        <a href="#" class="remove btn btn-xs btn-danger">@lang('quickadmin.qa_delete')</a>
    </td>
</tr>