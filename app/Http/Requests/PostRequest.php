<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
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

            'title' => 'required',
            'slug' => 'required|unique:posts',
            'excerpt' => 'required',
            'body' => 'required',
            'published_at' => 'date_format:"Y-m-d H:i:s"',
            'category_id' => 'required',
            'image' => 'mimes:jpg,jpeg,png,bmp',

        ];

        switch($this->method()){
            case 'PUT':
            case 'PATCH':
                // the 'blog' parameter represent the value of the GET Method of the edit route {mostly ID}
                $rules['slug'] = 'required|unique:posts,slug,' .$this->route('blog');
                return $rules;
        }

        return $rules;
    }
}
