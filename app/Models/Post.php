<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    // Pastikan semua kolom ini ada agar data bisa masuk ke database
    protected $fillable = [
        'judul',
        'penulis',
        'isi',
        'tanggal_publikasi'
    ];
}