<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\File;

class KepalaSekolahCreateRequest extends FormRequest
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
            'nip' => 'required',
            'nama' => 'required',
            'email' => 'required|email|unique:kepala_sekolahs',
            'telepon' => 'required',
            'jenisKelamin' => 'required',
            'alamat' => 'required',
            'tempatLahir' => 'required',
            'tanggalLahir' => 'required',
            'foto' => File::types(['jpg', 'png'])
                ->max(12 * 1024)
        ];
    }
}
