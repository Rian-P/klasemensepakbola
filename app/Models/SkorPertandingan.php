<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SkorPertandingan extends Model
{
    use HasFactory;
    protected $table = 'skor_pertandingan';
    protected $fillable = ['tim_a', 'skor_a', 'skor_b', 'tim_b', 'tanggal'];
}
