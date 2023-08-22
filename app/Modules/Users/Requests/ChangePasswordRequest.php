<?php


namespace App\Modules\Users\Requests;


use App\Http\Requests\ApiFormRequest;

class ChangePasswordRequest extends ApiFormRequest
{
    public function rules()
    {
        return [
            'old_password' => ['required'],
            'new_password' => ['required']
        ];
    }
}
