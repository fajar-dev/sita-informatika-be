<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function login(Request $request){
        $validator = Validator::make($request->all(), [
            'username' => 'required',
            'password' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validation error occurred',
                'error' => $validator->errors(),
            ], Response::HTTP_BAD_REQUEST);
        }

        $user = User::where('username', $request->username)->where('password', md5($request->password))->first();
        if (!$user) {
            return response()->json([
                'success' => false,
                'message' => 'Invalid username or password',
                'data' => null
            ], Response::HTTP_UNAUTHORIZED);
        }
        
        $token = $user->createToken('auth_token')->plainTextToken;
        return response()->json([
            'success' => true,
            'message' => 'User logged in successfully',
            'data' => [
                'access_token' => $token,
                'token_type' => 'Bearer'
            ]
        ], Response::HTTP_OK);
    }

    public function me()
    {
        $data = User::where('id_mhs', Auth::user()->id_mhs)->first();
        return response()->json([
            'success' => true,
            'message' => 'User recent retrived successfully',
            'data' => $data
        ], Response::HTTP_OK);
    }
}
