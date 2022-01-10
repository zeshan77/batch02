<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserCreateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'min:3|max:50',
            'email' => 'required|email',
            'password' => 'required|min:3|max:8|alpha',
        ];
    }
}
