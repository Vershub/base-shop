<?php

namespace App\Http\Requests\Admin\Category;

use Illuminate\Foundation\Http\FormRequest;

class StoreCategoryRequest extends FormRequest
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
        // dd($this->all());
        return [
            'locales.' . array_key_first($this->array('locales')) => ['required', 'array', 'min:1'],
            'locales.' . array_key_first($this->array('locales')) . '.name' => ['required'],
            'locales.' . array_key_first($this->array('locales')) . '.description' => ['required'],

            'data.slug' => [
                'required',
                'string',
                'max:255',
                'unique:categories,slug'
            ],

            'data.description' => 'nullable|string|max:1000',
            'data.active' => 'boolean',
            'data.meta_title' => 'nullable|string|max:255',
            'data.meta_description' => 'nullable|string|max:500',
        ];
    }
    /**
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'locales.' . array_key_first($this->array('locales')) => 'At least one locale is required',
            'locales.' . array_key_first($this->array('locales')) . '.name' => 'The name field is required.',
            'locales.' . array_key_first($this->array('locales')) . '.description' => 'The description field is required.',
        ];
    }
}
