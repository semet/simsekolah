<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\File;

class GuruCreateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->guard('admin')->check() ? true : false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'departemenId' => 'required',
            'tingkatId' => 'required',
            'mapelId' => 'required',
            'nip' => 'required',
            'nuptk' => 'required',
            'nama' => 'required',
            'email' => 'required|email|unique:gurus,email',
            'telepon' => 'required|unique:gurus,telepon',
            'jenisKelamin' => 'required',
            'foto' => File::types(['jpg', 'png'])
                ->max(12 * 1024)
        ];
    }
}
