<?php

namespace App\Http\Controllers;

use App\Http\Resources\ThesisResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
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
        // $data = User::where('id_mhs', Auth::user()->id_mhs)->get();
        $data = DB::table('mahasiswa')
        ->where('mahasiswa.id_mhs', Auth::user()->id_mhs)
        ->join('skripsi', 'mahasiswa.mNim', '=', 'skripsi.mNim')
        ->join('dosen as dosen1', 'skripsi.sPem1', '=', 'dosen1.id_dosen') 
        ->join('dosen as dosen2', 'skripsi.sPem2', '=', 'dosen2.id_dosen')
        ->select(
            'mahasiswa.*',
            'skripsi.sJudul', 'skripsi.sStatus', 'skripsi.sTgl', 'skripsi.sKomentar', 'skripsi.sId',
            'dosen1.id_dosen as pembimbing1id',
            'dosen1.nama_lengkap as pembimbing1',
            'dosen1.nip as nipPembimbing1',
            'dosen1.foto as fotoPembimbing1',
            'dosen2.id_dosen as pembimbing2id',
            'dosen2.nama_lengkap as pembimbing2',
            'dosen2.nip as nipPembimbing2',
            'dosen2.foto as fotoPembimbing2',
        )
        ->get();
        return response()->json([
            'success' => true,
            'message' => 'User retrived successfully',
            'data' => ThesisResource::collection($data)->first()
        ], Response::HTTP_OK);
    }
}
