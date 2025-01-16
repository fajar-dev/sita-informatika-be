<?php

namespace App\Http\Controllers;

use App\Models\Thesis;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class ThesisController extends Controller
{
    public function index()
    {
        $data = Thesis::where('nim', Auth::user()->mNim)->first();
        return response()->json([
            'success' => true,
            'message' => 'User recent retrived successfully',
            'data' => $data
        ], Response::HTTP_OK);
    }
}
