<?php

namespace App\Http\Requests\Admin\Category;

use App\Http\Requests\Traits\LocalizedValidationMessages;
use Illuminate\Foundation\Http\FormRequest;

class StoreCategoryRequest extends FormRequest
{
    use LocalizedValidationMessages;

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
        $defaultLocale = $this->getDefaultLocaleFromLocalesArray($this->array('locales'));

        return [
            "locales.{$defaultLocale}" => ['required', 'array', 'min:1'],
            "locales.{$defaultLocale}.name" => ['required'],
            "locales.{$defaultLocale}.description" => ['required'],

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
     * @return array<string, string>
     */
    public function messages(): array
    {
        return $this->getLocalizedMessages(
            $this->getDefaultLocaleFromLocalesArray($this->array('locales'))
        );
    }
}
