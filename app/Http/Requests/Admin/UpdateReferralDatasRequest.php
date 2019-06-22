<?php
namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class UpdateReferralDatasRequest extends FormRequest
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
            
            'date_time_of_reg' => 'nullable|date_format:'.config('app.date_format').' H:i:s',
            'admission_time' => 'nullable|date_format:'.config('app.date_format').' H:i:s',
            'date_of_discharged' => 'nullable|date_format:'.config('app.date_format').' H:i:s',
            'msg_date_time' => 'nullable|date_format:'.config('app.date_format').' H:i:s',
        ];
    }
}
