<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProjectGroupRequest extends FormRequest
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
            'description' => 'required|string|max:255',
        ];
    }

    /**
     * Custom messages for validation errors.
     *
     * @return array
     */
    public function messages(): array
    {
        return [
            'title.required' => 'The title is required.',
            'title.max' => 'The title cannot exceed 255 characters.',
            'description.required' => 'The description is required.',
            'description.max' => 'The description cannot exceed 255 characters.',
        ];
    }

    /**
     * Custom attribute names.
     *
     * @return array
     */
    public function attributes(): array
    {
        return [
            'title' => 'project group title',
            'description' => 'project group description',
        ];
    }
}
