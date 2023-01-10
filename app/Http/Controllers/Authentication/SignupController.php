<?php

namespace App\Http\Controllers\Authentication;

use App\Http\Controllers\ApiController;
use App\Http\Requests\Authentication\SignupRequest;
use App\Models\User;

class SignupController extends ApiController
{
    public function signup(SignupRequest $request)
    {
        $data = $request->validated();
        $data['password'] = bcrypt($data['password']);
        $user = new User($data);
        $user->save();
        return $user;
    }
}
