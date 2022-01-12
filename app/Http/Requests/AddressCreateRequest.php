<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddressCreateRequest extends FormRequest
{


    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'uc' => 'min:3|max:50',
            'city' => 'min:3|max:50',
            'district' => 'min:3|max:50',
        ];
    }
}
