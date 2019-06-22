<?php
namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePatientRegistrationsRequest extends FormRequest
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
            
            'uhid' => 'required',
            'patient_name' => 'required',
            'registration_date' => 'required|date_format:'.config('app.date_format').' H:i:s',
            'message_mappings.*.message' => 'required',
            'message_mappings.*.source' => 'required',
        ];
    }
}
