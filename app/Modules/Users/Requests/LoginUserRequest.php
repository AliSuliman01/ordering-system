<?php


namespace App\Modules\Users\Requests;


use App\Http\Requests\ApiFormRequest;

class LoginUserRequest extends ApiFormRequest
{
    public function rules()
    {
        return [
            'username' => ['required', 'exists:users,username'],
            'password' => ['required']
        ];
    }
}
