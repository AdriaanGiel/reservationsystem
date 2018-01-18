<?php

namespace App\Http\Requests\Front;

use Illuminate\Foundation\Http\FormRequest;

class ProfileRequest extends FormRequest
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
            'firsname' => 'required',
            'lastname' => 'required',
            'email'    =>  'required|email',
            'phonenumber' => 'min:10'
        ];
    }

    public function messages()
    {
        return [

        ];
    }
}
