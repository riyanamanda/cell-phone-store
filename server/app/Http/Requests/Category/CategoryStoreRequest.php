<?php

namespace App\Http\Requests\Category;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class CategoryStoreRequest extends FormRequest
{
    protected $stopOnFirstFailure = true;

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
                'nullable'.
                'numeric',
            ],
            'name' => [
                'required',
                'string',
                'unique:categories,name',
                'max:10',
            ],
            'slug' => [
                'required',
                'string',
            ],
        ];
    }
}
