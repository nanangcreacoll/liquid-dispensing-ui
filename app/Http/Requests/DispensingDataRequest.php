<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DispensingDataRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'volume' => ['required', 'integer', 'max:50'],
            'capsuleQty' => ['required', 'integer', 'max:5']
        ];
    }

    public function messages(): array
    {
        return [
            'volume.required' => 'Volume wajib diisi.',
            'volume.integer' => 'Volume harus bilangan bulat.',
            'volume.max' => 'Volume maksimal 50.',
            'capsuleQty.required' => 'Jumlah kapsul wajib diisi.',
            'capsuleQty.integer' => 'Jumlah kapsul harus bilangan bulat.',
            'capsuleQty.max' => 'Jumlah kapsul maksimal 5.'
        ];
    }
}
