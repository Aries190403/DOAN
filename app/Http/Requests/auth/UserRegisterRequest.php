<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

class UserRegisterRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
{
    return [
        'username' => 'required|unique:users,username|max:100',
        'password' => 'required|min:6|confirmed',
        'email' => 'required|email|unique:users,email',
        'fullName' => 'required|max:100',
        'phoneNumber' => 'nullable|numeric',
        'address' => 'nullable|max:255',
    ];
}


    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
{
    return [
        'username.required' => 'The username field is required.',
        'username.unique' => 'The username has already been taken.',
        'username.max' => 'The username may not be greater than 100 characters.',
        'password.required' => 'The password field is required.',
        'password.min' => 'The password must be at least 6 characters.',
        'password.confirmed' => 'The password confirmation does not match.',
        'email.required' => 'The email field is required.',
        'email.email' => 'Please enter a valid email address.',
        'email.unique' => 'The email has already been taken.',
        'email.max' => 'The email may not be greater than 30 characters.',
        'fullName.required' => 'The full name field is required.',
        'fullName.max' => 'The full name may not be greater than 100 characters.',
        'phoneNumber.numeric' => 'The phone number must be a number.',
        'address.max' => 'The address may not be greater than 255 characters.',
    ];
}

}
