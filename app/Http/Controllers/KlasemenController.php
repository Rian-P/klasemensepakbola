<?php

namespace App\Http\Controllers;
use App\Models\Klasemen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KlasemenController extends Controller
{
    public function index(){
        $klasemen = DB::table('klasemen')
        ->join('klub', 'klasemen.tim', '=', 'klub.id') 
        ->select('klasemen.*', 'klub.Nama_Klub as nama_tim') 
        ->orderBy('poin', 'desc')
        ->get();
        return view('landing.klasemen.klasemen', compact('klasemen'));
    }
}
