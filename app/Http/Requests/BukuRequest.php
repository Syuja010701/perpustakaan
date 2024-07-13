<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BukuRequest extends FormRequest
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
            'kategori_id' => 'required',
            'judul' => 'required|string|max:255',
            'stok_buku' => 'required|numeric|min:0',
            'rating' => 'required|numeric|min:1|max:5',
            'penulis_id' => 'required',
            'sinopsis' => 'required|string',
            'penerbit' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'jumlah_halaman' => 'required|numeric|min:1',
            'tanggal_terbit' => 'required|date',
            'isbn' => 'required|string|max:255',
            'bahasa' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'kategori_id.required' => 'Kategori buku wajib diisi.',
            'judul.required' => 'Judul buku wajib diisi.',
            'stok_buku.required' => 'Stok buku wajib diisi.',
            'stok_buku.numeric' => 'Stok buku harus berupa angka.',
            'stok_buku.min' => 'Stok buku minimal 0.',
            'rating.required' => 'Rating buku wajib diisi.',
            'rating.numeric' => 'Rating buku harus berupa angka.',
            'rating.min' => 'Rating buku minimal 1.',
            'rating.max' => 'Rating buku maksimal 5.',
            'penulis_id.required' => 'Penulis buku wajib diisi.',
            'sinopsis.required' => 'Sinopsis buku wajib diisi.',
            'penerbit.required' => 'Penerbit buku wajib diisi.',
            'image.required' => 'Gambar buku wajib diunggah.',
            'image.image' => 'File yang diunggah harus berupa gambar.',
            'image.mimes' => 'Format gambar yang diperbolehkan: jpeg, png, jpg, gif, svg.',
            'image.max' => 'Ukuran gambar tidak boleh melebihi 2MB.',
            'jumlah_halaman.required' => 'Jumlah halaman buku wajib diisi.',
            'jumlah_halaman.numeric' => 'Jumlah halaman buku harus berupa angka.',
            'jumlah_halaman.min' => 'Jumlah halaman buku minimal 1.',
            'tanggal_terbit.required' => 'Tanggal terbit buku wajib diisi.',
            'tanggal_terbit.date' => 'Tanggal terbit buku harus dalam format tanggal yang valid.',
            'isbn.required' => 'ISBN buku wajib diisi.',
            'bahasa.required' => 'Bahasa buku wajib diisi.',
        ];
    }
}
