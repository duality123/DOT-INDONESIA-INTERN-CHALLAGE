<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use App\Models\Kendaraan;
use App\Http\Resources\KendaraanResource;

class KendaraanControllerAPI extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function index()
    {
        $data = Kendaraan::all()->sortBy(['absen','asc']);
        return response()->json([KendaraanResource::collection($data), 'Seluruh program telah terfecth.']);
    }
    function show($id)
    {
        $target = Kendaraan::firstWhere('plat_nomor',$id);
        if (is_null($target)) {
            return response()->json('Data Tak Ditemukan', 404); 
        }
        return response()->json([new KendaraanResource($target)]);
    }
}