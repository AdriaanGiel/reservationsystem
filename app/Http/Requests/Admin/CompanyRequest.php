<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class CompanyRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return \Auth::user()->isAdmin();
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
            'street' => 'required',
            'number' => 'required|numeric',
            'insertion' => 'max:5',
            'zipcode' => 'required|max:8',
            'city' => 'required',
            'company_status_id' => 'required|exists:mysql.statuses,id'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Je bent de bedrijfsnaam vergeten',
            'street.required' => 'Je bent de straat vergeten',
            'number.required' => 'Je bent de straatnummer vergeten',
            'number.numeric' => 'Straat nummer kan alleen een cijfer zijn',
            'insertion.max' => 'Toevoeging kan niet langer zijn dan 5 tekens',
            'zipcode.required' => 'Je bent de postcode vergeten',
            'zipcode.max' => 'Postcode kan niet langer zijn dan 7 tekens',
            'city.required' => 'Je bent de plaats vergeten',
            'company_status_id.required' => 'Je bent vergetem om een bedrijf status te selecteren',
            'company_status_id.exists' => 'De opgegeven status bestaat niet in het systeem',
        ];
    }
}
