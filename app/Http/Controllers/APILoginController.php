<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\User as UserResource;

class APILoginController extends Controller
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
        $Accesstoken = Auth::user()->createToken('Access Token')->accessToken;

        return Response(['User' => new UserResource(Auth::user()), 'Access Token' => $Accesstoken]);
    }
}
