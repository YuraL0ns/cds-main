<?php

namespace App\Http\Requests\Image;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
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
        $imageId = $this->route('image');

        return [
            'original_name' => 'required|string|max:255',
            'custom_name' => 'nullable|string|max:255',
            'path' => 'required|string|max:255',
            'extension' => 'required|string|max:10',
            'size' => 'required|integer',
        ];
    }
}
