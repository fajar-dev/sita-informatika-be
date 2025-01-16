<?php

namespace App\Http\Controllers;

use App\Http\Resources\ThesisResource;
use App\Models\Research;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class ResearchController extends Controller
{
    public function index()
    {
        $data = Research::where('nim', Auth::user()->mNim)->get();
        return response()->json([
            'success' => true,
            'message' => 'User recent retrived successfully',
            'data' => ThesisResource::collection($data)->first()
        ], Response::HTTP_OK);
    }
}
