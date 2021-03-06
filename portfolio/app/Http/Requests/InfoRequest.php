<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class InfoRequest extends FormRequest
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
            'name' => 'required|max:255',
            'about' => 'required',
            'photo' => 'required_without:_method',
        ];
    }
    
    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'required' => 'Поле :attribute обов`язкове',
            'required_without' => 'Поле :attribute обов`язкове',
            'max' => 'Максимальна кількість символів для :attribute - :max',
        ];
    }
}
