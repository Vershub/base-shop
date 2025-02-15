<?php

namespace App\Http\Requests\Admin\Category;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateCategoryRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        $appLocale = config('app.locale', 'en');
        assert(is_string($appLocale));

        return [
            'locales.*.name' => ['string', 'max:191'],
            'locales.*.description' => ['string'],

            "locales.$appLocale.name" => ['required', 'string', 'max:191'],
            "locales.$appLocale.description" => ['required', 'string'],

            'static.slug' => [
                'required',
                'string',
                'max:191',
                Rule::unique('categories', 'slug')->ignore($this->route('category'))
            ],
        ];
    }
}
