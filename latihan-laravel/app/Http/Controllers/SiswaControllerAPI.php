<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use App\Models\Siswa;
use App\Http\Resources\SiswaResource;

class SiswaControllerAPI extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function index()
    {
        $data = Siswa::all()->sortBy(['absen','asc']);
        return response()->json([SiswaResource::collection($data), 'Seluruh program telah terfecth.']);
    }
    function show($id)
    {
        $target = Siswa::firstWhere('absen',$id);
        if (is_null($target)) {
            return response()->json('Data Tak Ditemukan', 404); 
        }
        return response()->json([new SiswaResource($target)]);
    }
}