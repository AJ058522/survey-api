<?php

namespace App\Http\Controllers\Authentication;

use App\Http\Controllers\ApiController;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Authentication\LoginRequest;

class LoginController extends ApiController
{
  public function login(LoginRequest $request)
  {
    $credentials = request(['email', 'password']);

    if (Auth::attempt($credentials)) {
      $user = $request->user();
      $user->token = $user->createToken('Personal Access');
      return $this->successResponse($user, 200);
    }
    return $this->errorResponse('Usuario o Contraseña erróneo.', 404);
  }
}
