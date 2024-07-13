<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class kontakRequest extends FormRequest
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
            'name' => 'required|string|max:255',
            'email' => 'required|string|email', // Validasi email dan memastikan email unik
            'pesan' => 'required|string|max:255',
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'Kolom nama harus diisi.',
            'name.max' => 'Nama terlalu panjang.',
            'email.required' => 'Kolom email harus diisi.',
            'email.email' => 'Email harus berformat email yang valid.',
            'pesan.required' => 'pesan harus diisi',
            'pesan.max' => 'pesan .?',
        ];
    }
}
