<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PenulisRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'nama' => 'required|string|max:255',
            'alamat' => 'required|string|max:255',
            'tanggal_lahir' => 'required|date',
            'telphone' => 'required|string|numeric', // Menggunakan aturan validasi 'numeric' untuk memastikan input hanya berisi angka
            'domsili' => 'nullable|string',
            'agama' => 'nullable|string',
            'facebook' => 'nullable|string',
            'instagram' => 'nullable|string',
            'twitter' => 'nullable|string',
            'linked_in' => 'nullable|string',
            'blog' => 'nullable|string',
            'youtube' => 'nullable|string',
        ];
    }

    public function messages()
    {
        return [
            'nama.required' => 'Nama wajib diisi.',
            'nama.max' => 'Panjang teks untuk Nama maksimal :max karakter.',
            'alamat.required' => 'Alamat wajib diisi.',
            'alamat.max' => 'Panjang teks untuk Alamat maksimal :max karakter.',
            'tanggal_lahir.required' => 'Tanggal lahir wajib diisi.',
            'tanggal_lahir.date' => 'Tanggal lahir harus dalam format tanggal yang valid.',
            'telphone.required' => 'Nomor telepon wajib diisi.',
            'telphone.numeric' => 'Nomor telepon harus berupa angka.',

        ];
    }
}
