<?php


namespace App\Http\Support;


use App\Models\User;

class ValidationRules
{
    public static function usernameRules(){
        return [
            'username' => ['required', 'string', 'min:5', 'max:15', 'unique:'.User::class, 'regex: /^[A-Za-z_]+$/']
        ];
    }
    public static function emailRules(){
        return [
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class]
        ];
    }
    public static function passwordRules(){
        return [
            'password' => ['required', 'string','min:6', 'max:20', 'confirmed', 'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*(_|[^\w])).+$/']
        ];
    }

    public static function messages(){
        return [
            'username.regex' => 'Username can only contain uppercase, lowercase and \'_\'',
            'password.regex' => 'Password must contain at least 1 uppercase, 1 lowercase and 1 special character'
        ];
    }
}
