<?php


namespace App\Modules\Users\Controllers;


use App\Helpers\Response;
use App\Models\User;
use App\Modules\Users\Requests\ChangePasswordRequest;
use App\Modules\Users\Requests\LoginUserRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController
{

    public function login(LoginUserRequest $request)
    {
        $data = $request->validated();

        $user = User::query()->where('username', '=', $data['username'])->first();

        if (Hash::check($data['password'], $user->password)){
            $token = $user->createToken('access-token');
            $user->setAttribute('access_token', $token->plainTextToken);
            return response()->json(Response::success($user));
        }

        return response()->json(Response::error('invalid credentials', 401),401);
    }

    public function change_password(ChangePasswordRequest $request)
    {
        $data = $request->validated();

        $user = Auth::user();

        if (Hash::check($data['old_password'], $user->password)){
            $user->password = Hash::make($data['new_password']);
            $user->save();
            return response()->json(Response::success($user));
        }

        return response()->json(Response::error('invalid credentials', 401),401);
    }
}
