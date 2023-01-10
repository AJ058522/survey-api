<?php

namespace App\Http\Controllers\Authentication;

use App\Http\Controllers\ApiController;
use Illuminate\Http\Request;

class LogoutController extends ApiController
{
  public function logout(Request $request)
  {
    $data = $request->user()->token()->revoke();
    return $this->successResponse($data, 200);
  }
}
