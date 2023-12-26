<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SkorPertandingan;
use App\Models\Klasemen;
use App\Models\Klub;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class PertandinganController extends Controller
{
    public function store(){
        $klubs = Klub::all();
        return view('landing.dataskor.inputskor',compact('klubs'));
    }

public function insertScoreData(Request $request)
{
      
    $validator = Validator::make($request->all(), [
        'tim_a' => 'required',
        'tim_b' => 'required|different:tim_a',
    ], [
        'tim_b.different' => 'Tim B harus berbeda dengan Tim A.',
    ]);

    if ($validator->fails()) {
        return redirect()->back()->withErrors($validator)->withInput();
    }
    $data = [
        'tim_a' => $request->input('tim_a'),
        'skor_a' => $request->input('skor_a'),
        'skor_b' => $request->input('skor_b'),
        'tim_b' => $request->input('tim_b'),
        'tanggal' => now()
    ];

    
    DB::table('skor_pertandingan')->insert($data);

    
    $this->updateKlasemen();

    return redirect()->route('klasemen.index');
}



public function klasmenData()
{
    $klasemen = DB::table('klasemen')
        ->join('klub', 'klasemen.tim', '=', 'klub.id') // Sesuaikan kolom yang digunakan untuk bergabung
        ->select('klasemen.*', 'klub.nama as nama_tim') // Sesuaikan kolom yang ingin Anda ambil
        ->orderBy('poin', 'desc')
        ->get();

    return response()->json([
        'message' => 'Data skor pertandingan berhasil disimpan dan klasemen diupdate',
        'klasemen' => $klasemen
    ]);
}



private function updateKlasemen()
{
    // Menghitung klasemen
    DB::statement('
        CREATE TEMPORARY TABLE temp_klasemen AS
        SELECT
            tim_a,
            COUNT(*) AS main,
            SUM(CASE WHEN skor_a > skor_b THEN 1 ELSE 0 END) AS menang,
            SUM(CASE WHEN skor_a = skor_b THEN 1 ELSE 0 END) AS seri,
            SUM(CASE WHEN skor_a < skor_b THEN 1 ELSE 0 END) AS kalah,
            SUM(skor_a) AS gol_masuk,
            SUM(skor_b) AS gol_kebobolan,
            ABS(SUM(skor_a) - SUM(skor_b)) AS selisih_gol,
            SUM(CASE WHEN skor_a > skor_b THEN 3 WHEN skor_a = skor_b THEN 1 ELSE 0 END) AS poin
        FROM skor_pertandingan
        GROUP BY tim_a
        
        UNION ALL
        
        SELECT
            tim_b,
            COUNT(*) AS main,
            SUM(CASE WHEN skor_b > skor_a THEN 1 ELSE 0 END) AS menang,
            SUM(CASE WHEN skor_b = skor_a THEN 1 ELSE 0 END) AS seri,
            SUM(CASE WHEN skor_b < skor_a THEN 1 ELSE 0 END) AS kalah,
            SUM(skor_b) AS gol_masuk,
            SUM(skor_a) AS gol_kebobolan,
            ABS(SUM(skor_b) - SUM(skor_a)) AS selisih_gol,
            SUM(CASE WHEN skor_b > skor_a THEN 3 WHEN skor_b = skor_a THEN 1 ELSE 0 END) AS poin
        FROM skor_pertandingan
        GROUP BY tim_b
    ');
    
    // Update existing klasemen
    DB::statement('
        UPDATE klasemen
        JOIN temp_klasemen ON klasemen.tim = temp_klasemen.tim_a
        SET
            klasemen.main = temp_klasemen.main,
            klasemen.menang = temp_klasemen.menang,
            klasemen.seri = temp_klasemen.seri,
            klasemen.kalah = temp_klasemen.kalah,
            klasemen.gol_masuk = temp_klasemen.gol_masuk,
            klasemen.gol_kebobolan = temp_klasemen.gol_kebobolan,
            klasemen.selisih_gol = temp_klasemen.selisih_gol,
            klasemen.poin = temp_klasemen.poin
    ');
    
    // Insert new klasemen
    DB::statement('
        INSERT INTO klasemen (tim, main, menang, seri, kalah, gol_masuk, gol_kebobolan, selisih_gol, poin)
        SELECT
            tim_a,
            main,
            menang,
            seri,
            kalah,
            gol_masuk,
            gol_kebobolan,
            selisih_gol,
            poin
        FROM temp_klasemen
        WHERE temp_klasemen.tim_a NOT IN (SELECT tim FROM klasemen)
    ');
    
    // Menghapus tabel temporer
    DB::statement('DROP TEMPORARY TABLE IF EXISTS temp_klasemen');
}




    
}    