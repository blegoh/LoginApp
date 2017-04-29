<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class AuthController extends Controller
{

    public function login(Request $request)
    {
        $credential = [
            'email' => $request->email,
            'password' => $request->password
        ];
        $auth = Auth::attempt($credential);
        if ($auth){
            $data = [
                'error' => false,
                'data' => Auth::user()
            ];
            return response()->json($data,200);
        }else{
            $data = [
                'error' => true,
                'data' => 'invalid credential'
            ];
            return response()->json($data,501);
        }
    }

}
