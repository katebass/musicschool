<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SignupRequest extends FormRequest
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
            'email'=> 'required|email|unique:users|max:191',
            'password' => 'required|min:6|max:191|confirmed',
            'name' => 'required|min:3',
            'experience' => 'required_without:grade',
            'grade' => 'required_without:experience'
        ];
    }
}
