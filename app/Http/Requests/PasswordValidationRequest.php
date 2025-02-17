<?php

namespace App\Http\Requests;

use App\Rules\OldPasswordMatchRule;
use Illuminate\Foundation\Http\FormRequest;

class PasswordValidationRequest extends FormRequest
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
            'old_password' => ['bail', 'required', 'string', new OldPasswordMatchRule],
            'new_password' => 'bail|required|string|min:8|confirmed',
        ];
    }

}
