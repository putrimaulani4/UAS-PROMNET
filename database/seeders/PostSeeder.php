<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class PostSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('posts')->insert([
            [
                'judul' => 'Mengenal CPU: Otak dari Komputer',
                'isi' => 'Central Processing Unit (CPU) adalah komponen keras yang melaksanakan perintah dan mengolah data dari perangkat lunak.',
                'penulis' => 'Admin PTI',
                'tanggal_publikasi' => Carbon::now(),
            ],
            [
                'judul' => 'Pentingnya RAM untuk Multitasking',
                'isi' => 'RAM (Random Access Memory) berfungsi sebagai tempat penyimpanan data sementara yang sedang digunakan oleh sistem operasi.',
                'penulis' => 'Admin PTI',
                'tanggal_publikasi' => Carbon::now(),
            ],
            [
                'judul' => 'GPU: Komponen Utama untuk Grafis',
                'isi' => 'Graphics Processing Unit (GPU) bertanggung jawab untuk merender gambar, video, dan animasi untuk ditampilkan di layar.',
                'penulis' => 'Admin PTI',
                'tanggal_publikasi' => Carbon::now(),
            ],
        ]);
    }
}