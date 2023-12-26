<?php

namespace App\Http\Controllers;

use App\Models\SkorPertandingan;
use App\Models\Klub;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index(){
        $score = DB::table('skor_pertandingan')
        ->join('klub as klub_a', 'skor_pertandingan.tim_a', '=', 'klub_a.id')
        ->join('klub as klub_b', 'skor_pertandingan.tim_b', '=', 'klub_b.id')
        ->select(
            'skor_pertandingan.*',
            'klub_a.Nama_Klub as tim_a',
            'klub_b.Nama_Klub as tim_b',
            
        )
        ->get();
    

        $klubs = Klub::all();
        return view('landing.home', compact('score','klubs'));
    }
    
}