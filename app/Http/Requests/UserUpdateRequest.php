<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UserUpdateRequest extends FormRequest
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
            'username' => ['string', 'min:5', 'max:15', 'unique:'.User::class, 'regex: /^[A-Za-z_]+$/'],
            'email' => ['email', 'max:255', Rule::unique(User::class)->ignore($this->user()->id)],
            'password' => ['string','min:6', 'max:20', 'confirmed', 'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*(_|[^\w])).+$/'],
            'current_password' => ['required_with:password', 'current_password'],
        ];
    }

    public function messages(){
        return [
            'username.regex' => 'Username can only contain uppercase, lowercase and \'_\'',
            'password.regex' => 'Password must contain at least 1 uppercase, 1 lowercase and 1 special character',
            'current_password.required_with' => 'Please enter your current password'
        ];
    }
}
