<?php

namespace App\Http\Controllers;

use App\Http\Resources\ProposalResource;
use App\Models\Proposal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class ProposalController extends Controller
{
    public function index()
    {
        $data = Proposal::where('nim', Auth::user()->mNim)->get();
        return response()->json([
            'success' => true,
            'message' => 'Proposal retrived successfully',
            'data' => ProposalResource::collection($data)->first()
        ], Response::HTTP_OK);
    }
}
