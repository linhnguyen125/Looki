<?php

namespace App\Http\Requests\Admin\News;

use Illuminate\Foundation\Http\FormRequest;

class NewsRequest extends FormRequest
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
            'description' => ['required', 'min:10'],
            'detail' => ['required', 'min:10'],
            'thumbnail' => ['required', 'regex: /^(http[s]?:\/\/.*\.(?:png|jpg|gif|svg|jpeg))$/'],
            'news_category_id' => ['required', 'integer'],
            'meta_description' => ['required', 'min:5'],
            'meta_keywords' => ['required', 'string', 'min:3'],
        ];
    }
}
