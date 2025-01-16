<?php

namespace App\Http\Controllers;

use App\Models\Thesis;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\ThesisResource;

class ThesisController extends Controller
{
    public function index()
    {
        $data = Thesis::where('nim', Auth::user()->mNim)->get();
        return response()->json([
            'success' => true,
            'message' => 'User recent retrived successfully',
            'data' => ThesisResource::collection($data)->first()
        ], Response::HTTP_OK);
    }
}
