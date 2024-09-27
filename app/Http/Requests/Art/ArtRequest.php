<?php

namespace App\Http\Requests\Art;

use Illuminate\Foundation\Http\FormRequest;

class ArtRequest extends FormRequest
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
            'galleries' => 'sometimes|exists:galleries,id',
            'title' => 'required|string|max:255',
            'descriptions' => 'required|string|max:255',
            'price' => 'required|integer',
            'display' => 'sometimes|string|max:255',
            'watemark' => 'sometimes|boolean',
            'cover_image' => 'sometimes|image|mimes:jpg,jpeg,png,gif|max:10240',
            'preview_image' => 'required|image|mimes:jpg,jpeg,png,gif|max:10240',
        ];
    }
}
