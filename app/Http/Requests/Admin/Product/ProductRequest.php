<?php

namespace App\Http\Requests\Admin\Product;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => ['required', 'string', 'min:5'],
            'price' => ['required', 'integer'],
            'description' => ['required', 'string', 'min:10'],
            'detail' => ['required', 'string', 'min:10'],
            'thumbnail' => ['required', 'image'],
            'category_id' => ['required', 'integer'],
            'meta_description' => ['required', 'string', 'min:5'],
            'meta_keywords' => ['required', 'string', 'min:3'],
        ];
    }
}
