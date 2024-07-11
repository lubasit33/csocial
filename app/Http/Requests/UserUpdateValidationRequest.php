<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserUpdateValidationRequest extends FormRequest
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
        $user_id = $this->route('id');

        return [
            'name' => 'bail|required|string|min:3|max:255',
            'email' => 'bail|required|string|email|unique:users,email,'. $user_id,
            'photo' => 'bail|nullable|file|mimes:jpg,jpeg,png|max:1024',
        ];
    }

}
