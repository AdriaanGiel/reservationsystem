<?php

namespace App\Http\Requests\Front;

use Illuminate\Foundation\Http\FormRequest;

class AssignmentRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return \Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'company' => 'required',
            'date' => 'required',
            'start_time' => 'required',
            'hours' => 'required|numeric',
            'description' => 'required',
            'assignment_type_id'=>'required'
        ];
    }

    public function messages()
    {
        return [
            'company.required' => 'Je bent vergeten een bedrijf te kiezen',
            'date.required' => 'Je bent vergeten een datum te selecteren',
            'start_time.required' => 'Je bent vergeten een tijd te selecteren',
            'hours.required' => 'Je bent vergeten de aantal uur in te vullen',
            'hours.numeric' => 'Uren mag alleen numeriek zijn',
            'description.required' => 'Je bent vergeten in te vullen wat je gaat doen',
            'assignment_type_id.required'=>'Je bent de reden van bezoek vergeten te selecteren'
        ];
    }
}
