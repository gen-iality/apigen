<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EventUserRequest extends FormRequest
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

    public function messages()
    {
        return [
            'other_fields.sometimes' => 'any other params will be saved in user and eventUser'
        ];
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'email' => 'required',
            'name' => 'required',
            'other_fields' => 'sometimes',
        ];
    }
}
