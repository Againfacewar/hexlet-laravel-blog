<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ArticleRequest extends FormRequest
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
        $rules = [
            'name' => 'required',
            'body' => 'required|min:10',
        ];

        if ($this->isMethod('post')) {
            $rules['name'] .= '|unique:articles';
        }

        if ($this->isMethod('put') || $this->isMethod('patch')) {
            $articleId = $this->route('article')->id;
            $rules['name'] .= '|unique:articles,name,' . $articleId;
        }

        return $rules;
    }
}
