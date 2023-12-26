<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Klasemen extends Model
{
    use HasFactory;
    protected $fillable = [
        'tim',
        'main',
        'menang',
        'seri',
        'kalah',
        'gol_masuk',
        'gol_kebobolan',
        'selisih_gol',
        'poin',
    ];
}
