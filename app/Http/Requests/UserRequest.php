<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            'name' => 'required',
            'slug' => 'required|unique:users',
            'email' => 'required|unique:users|email',
            'password' => 'required|confirmed'
        ];

        switch($this->method()){
            case 'PUT':
            case 'PATCH':
                $rules['slug'] = 'required|unique:users,slug,' .$this->route('user');
                $rules['email'] = 'email|required|unique:users,email,' .$this->route('user');
                $rules['password'] = 'required with:password_confirmation|confirmed';
                return $rules;

        }

        return $rules;
    }
}
