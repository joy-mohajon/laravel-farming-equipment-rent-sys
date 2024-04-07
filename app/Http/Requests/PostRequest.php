<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0.01',
            'rent' => 'required|numeric|min:0.01',
            'quantity' => 'required|integer|min:1',
            'imageUrl' => 'required|mimes:jpg,jpeg,png,gif,gif,webp,jfif|max:10000',
        ];
    }
}
