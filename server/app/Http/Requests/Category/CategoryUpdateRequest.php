<?php

namespace App\Http\Requests\Category;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CategoryUpdateRequest extends FormRequest
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
     * @return array<string, Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'parent_id' => [
                'nullable',
                'numeric',
            ],
            'name' => [
                'required',
                'string',
                'max:10',
                Rule::unique('categories', 'name')->ignore($this->category),
            ],
            'slug' => [
                'required',
                'string',
            ],
        ];
    }
}
