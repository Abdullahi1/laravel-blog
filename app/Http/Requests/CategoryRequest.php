<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
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

        $rules =  [
            //

            'title' => 'required|unique:categories|max:225',
            'slug' => 'required|unique:categories|max:225',

        ];

        switch($this->method()){
            case 'PUT':
            case 'PATCH':
                // the 'blog' parameter represent the value of the GET Method of the edit route {mostly ID}
                $rules['title'] = 'required|unique:categories|max:225,title,' .$this->route('category');
                $rules['slug'] = 'required|unique:categories|max:225,slug,' .$this->route('category');
                return $rules;
        }

        return $rules;
    }
}
