<?php

namespace App\Http\Controllers;
use App\Models\Klub;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;

class InputKlubController extends Controller
{
    public function index(){
        $klubs = Klub::all();
        return view('landing.dataklub', compact('klubs'));
    }
    public function create()
    {
        return view('landing.inputklub');
    }
   

    public function store(Request $request)
    {
        $request->validate([
            'Nama_Klub' => [
                'required',
                'string',
                'max:255',
                Rule::unique('Klub', 'Nama_Klub'),
            ],
            'Kota_Klub' => 'required|string|max:255|regex:/^[^0-9\s]+$/',
            
        ]);
    
        $klubs = new Klub();
        $klubs->Nama_Klub = $request->input('Nama_Klub');
        $klubs->Kota_Klub = $request->input('Kota_Klub');
    
       
    
      
        $klubs->save();
    
        return redirect()->route('dataklub.index')->with('success', 'Klub berhasil ditambahkan!');
    }
    
    
    


    public function show($id)
    {
        $klub = Klub::findOrFail($id);
        return view('landing.updatedataklub', compact('klub'));
    }

    public function edit($id)
    {
        $klub = Klub::findOrFail($id);
        return view('landing.updatedataklub', compact('klub'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'Nama_Klub' => 'required|string|max:255',
            'Kota_Klub' => 'required|string|max:255',
        ]);

        $klub = Klub::findOrFail($id);
        $klub->update($request->all());

        return redirect()->route('dataklub.index')->with('success', 'Klub berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $klub = Klub::findOrFail($id);
        $klub->delete();

        return redirect()->route('dataklub.index')->with('success', 'Klub berhasil dihapus!');
    }

}