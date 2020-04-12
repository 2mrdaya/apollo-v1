<?php
namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class UpdateReferralcompletesRequest extends FormRequest
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
            
            'doi_as_per_whats_app' => 'nullable|date_format:'.config('app.date_format').' H:i:s',
            'doi_as_per_sw' => 'nullable|date_format:'.config('app.date_format').' H:i:s',
            'oracle_code' => 'max:10',
            'bill_no' => 'max:15',
            'admission_date' => 'nullable|date_format:'.config('app.date_format').' H:i:s',
            'discharge_date' => 'nullable|date_format:'.config('app.date_format').' H:i:s',
            'registration_date' => 'nullable|date_format:'.config('app.date_format').' H:i:s',
        ];
    }
}
