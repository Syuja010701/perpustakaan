<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class KategoriRequest extends FormRequest
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
            'nama_kategori' => 'required',
            'deskripsi' => 'required|max:255',
          ];
    }
    public function messages()
    {
        return [
            'nama_kategori.required' => 'Nama Kategori Wajib Diisi!',
            'deskripsi' => 'Deskripsi Wajib di Isi Maksimal 255 Karakter!',
            'keterangan.max' => 'Kode Prodi Maksimal 255',
        ];
    }
}
