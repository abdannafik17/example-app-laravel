<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SiswaRequest extends FormRequest
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
        if($this->method() == 'PATCH'){
            $nisn = 'required|string|size:4|unique:siswa,nisn,'.$this->input('id');
        } else {
            $nisn = 'required|string|size:4|unique:siswa,nisn';
        }
        return [
            'nisn' => $nisn,
            'nama' => 'required|string|max:50', 
            'tempat_lahir' => 'required|string',
            'tanggal_lahir' => 'required|date',
            'jenis_kelamin' => 'required|in:L,P'
        ];
    }
}
