<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateUserRequest extends FormRequest
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
        $user_type =  $this->request->all();
        return [
            'name' => 'required',
            'email' => 'required|string|email|unique:users,email,except,id',
            'address' => $user_type['user_type'] == 'shopOwner' ? 'required' : '',
            'mobile' =>  'required|unique:users,mobile,except,id',
            'password' => 'required|confirmed|min:6',
        ];
    }
}
