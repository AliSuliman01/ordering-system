<?php


namespace App\Modules\Users\Controllers;


use App\Helpers\Response;
use App\Models\User;
use App\Modules\Users\Requests\LoginUserRequest;
use Illuminate\Support\Facades\Hash;

class UserController
{

    public function login(LoginUserRequest $request)
    {
        $data = $request->validated();

        $user = User::query()->where('username', '=', $data['username'])->first();

        if (Hash::check($data['password'], $user->password)){
            $token = $user->createToken('access-token');
            $user->setAttribute('access_token', $token->accessToken->token);
            return response()->json(Response::success($user));
        }

        return response()->json(Response::error('invalid credentials', 401),401);
    }
}
