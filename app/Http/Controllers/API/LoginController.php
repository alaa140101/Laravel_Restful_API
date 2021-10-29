<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\User as UserResource;

class LoginController extends Controller
{
    /**
     * Instantiate a new controller instance.
     * 
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth.basic.once');
    }

    public function login()
    {
        // $tokenObj = Auth::user()->createToken('Access Token');
        $Accesstoken = Auth::user()->createToken('Access Token')->accessToken;
        // $Accesstoken = $tokenObj->accessToken;

        return Response(['User' => new UserResource(Auth::user()), 'Access Token' => $Accesstoken->token]);
    }


}
