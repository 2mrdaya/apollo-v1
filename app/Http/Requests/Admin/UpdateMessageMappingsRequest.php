<?php
namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class UpdateMessageMappingsRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [

            'message' => 'required',
            'source' => 'required',
            /*'intimation_date_time' => 'required|date_format:'.config('app.date_format').' H:i:s|unique:message_mappings,intimation_date_time,'.$this->route('message_mapping'),*/
        ];
    }
}
