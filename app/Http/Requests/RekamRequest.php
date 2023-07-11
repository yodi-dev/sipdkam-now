<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RekamRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'no_rm' => [
                'required', 'numeric',
            ],
            'no_bpjs' => [
                'nullable', 'numeric'
            ],
            'prolanis' => [
                'nullable'
            ],
            'nama' => [
                'required', 'max:100'
            ],
            'kelamin' => [
                'required'
            ],
            'tgl_lahir' => [
                'required', 'date'
            ],
            'dusun' => [
                'required', 'max:100'
            ],
            'rt' => [
                'required', 'numeric'
            ],
            'rw' => [
                'required', 'numeric'
            ],
            'desa' => [
                'required', 'max:100'
            ],
            'kecamatan' => [
                'required', 'max:100'
            ],
            'kota_kab' => [
                'required', 'max:100'
            ],
            'no_telp' => [
                'nullable', 'numeric'
            ],
            'pemilik_no_telp' => [
                'nullable'
            ],
            'ppk_umum' => [
                'nullable'
            ],
            'jenis_peserta_bpjs' => [
                'nullable'
            ],
            'tgl_mutasi_bpjs' => [
                'nullable', 'date'
            ],
            'no_kk' => [
                'nullable', 'numeric'
            ],
        ];
    }
}
