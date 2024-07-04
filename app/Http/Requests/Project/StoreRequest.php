<?php

namespace App\Http\Requests\Project;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
            'title' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:projects,slug',
            'published_at' => 'nullable|date',
            'description' => 'required|string',
            'thumb_path' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'author_id' => 'required|exists:users,id',
            'amount' => 'nullable|numeric',
        ];
    }
}
