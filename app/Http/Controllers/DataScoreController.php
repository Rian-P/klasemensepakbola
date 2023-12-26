<?php

namespace App\Http\Controllers;
use App\Models\Klub;
use Illuminate\Http\Request;

class DataScoreController extends Controller
{
    public function create()
    {   
       
        return view('landing.dataskor.inputskor');
    }
    
}
