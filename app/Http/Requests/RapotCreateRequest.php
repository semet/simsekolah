<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RapotCreateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->guard('guru')->check() ? true : false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'kelasId' => 'required',
            'nilai' => 'required'
        ];
    }
}
