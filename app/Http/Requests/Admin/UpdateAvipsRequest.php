<?php
namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class UpdateAvipsRequest extends FormRequest
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
            
            'name' => 'required',
            'account_no' => 'required',
            'ifsc_code' => 'min:11|max:11',
            'pan_number' => 'min:10|max:10',
            'pin_code' => 'min:6|max:6|nullable|numeric',
            'message_mappings.*.message' => 'required',
            'message_mappings.*.source' => 'required',
        ];
    }
}
