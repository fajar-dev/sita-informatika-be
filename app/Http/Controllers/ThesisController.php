<?php

namespace App\Http\Controllers;

use App\Http\Resources\ThesisResource;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;

class ThesisController extends Controller
{
    public function Index()
    {
        $data = DB::table('mahasiswa')
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
            'message' => 'Thesis retrived successfully',
            'data' => ThesisResource::collection($data)
        ], Response::HTTP_OK);
    }

    public function show($nim)
    {
        $data = DB::table('mahasiswa')
        ->where('mahasiswa.mNim', $nim)
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
            'message' => 'Thesis retrived successfully',
            'data' => ThesisResource::collection($data)
        ], Response::HTTP_OK);
    }
}
