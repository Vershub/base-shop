<?php

namespace App\Http\Requests\Admin\Category;

use App\Traits\AppLocale;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreCategoryRequest extends FormRequest
{
    use AppLocale;

    /*
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
        $appLocale = $this->getAppLocale();

        return [
            'locales.*.name' => ['string', 'max:255'],
            'locales.*.description' => ['string', 'max:1000'],

            "locales.$appLocale.name" => ['required', 'string', 'max:255'],
            "locales.$appLocale.description" => ['required', 'string', 'max:255'],

            'static.slug' => [
                'required',
                'string',
                'max:255',
                Rule::unique('categories', 'slug')->ignore($this->route('category')),
            ],
            'static.image' => ['image'],
        ];
    }
}
