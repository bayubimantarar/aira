<?php

namespace App\Http\Requests;

use App\Rules\CheckNIK;
use App\Rules\CheckEmail;
use Illuminate\Foundation\Http\FormRequest;

class PelangganRequest extends FormRequest
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
        switch($this->method()){
            case 'POST': {
                return [
                    'nik' => [
                        'required',
                        new CheckNIK
                    ],
                    'nama' => [
                        'required'
                    ],
                    'alamat' => [
                        'required'
                    ],
                    'email' => [
                        'required',
                        'email',
                        new CheckEmail
                    ],
                    'nomor_telepon' => [
                        'required'
                    ],
                    'status' => [
                        'required'
                    ]
                ];
            }
            case 'PUT' : {
                return [
                    'nik' => [
                        'required'
                    ],
                    'nama' => [
                        'required'
                    ],
                    'alamat' => [
                        'required'
                    ],
                    'email' => [
                        'required',
                        'email'
                    ],
                    'nomor_telepon' => [
                        'required'
                    ],
                    'status' => [
                        'required'
                    ]
                ];
            }
            default:break;
        }
    }

    public function messages()
    {
        return [
            'nik.required' => 'NIK perlu diisi!',
            'nama.required' => 'Nama perlu diisi!',
            'alamat.required' => 'Alamat perlu diisi!',
            'email.required' => 'Email perlu diisi!',
            'email.email' => 'Format email tidak sesuai!',
            'nomor_telepon.required' => 'Nomor Telepon perlu diisi!'
        ];
    }
}
