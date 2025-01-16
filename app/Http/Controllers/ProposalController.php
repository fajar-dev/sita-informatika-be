<?php

namespace App\Http\Controllers;

use App\Models\Proposal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class ProposalController extends Controller
{
    public function index()
    {
        $data = Proposal::where('nim', Auth::user()->mNim)->first();
        return response()->json([
            'success' => true,
            'message' => 'User recent retrived successfully',
            'data' => $data
        ], Response::HTTP_OK);
    }
}
