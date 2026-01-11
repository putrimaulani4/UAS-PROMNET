<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    /**
     * Menampilkan daftar artikel di halaman depan (Publik)
     */
    public function index()
    {
        $posts = Post::latest()->get();
        return view('public.index', compact('posts'));
    }

    /**
     * Menampilkan isi detail artikel (Publik)
     */
    public function show($id)
    {
        $post = Post::findOrFail($id);
        return view('public.show', compact('post'));
    }

    /**
     * Menampilkan daftar manajemen artikel di Dashboard (Admin)
     */
    public function adminIndex()
    {
        // Mengambil semua data untuk ditampilkan di tabel dashboard
        $posts = Post::all();
        return view('dashboard', compact('posts'));
    }

    /**
     * Menampilkan form tambah artikel
     */
    public function create()
    {
        return view('admin.create');
    }

    /**
     * Menyimpan artikel baru ke database
     */
    public function store(Request $request)
    {
        // 1. Validasi Input
        $request->validate([
            'judul'   => 'required|max:255',
            'penulis' => 'required',
            'isi'     => 'required',
        ]);

        // 2. Simpan ke Database
        // Menggunakan $request->all() karena field sudah diatur di $fillable pada Model Post
        Post::create([
            'judul'   => $request->judul,
            'penulis' => $request->penulis,
            'isi'     => $request->isi,
            'tanggal_publikasi' => now(), // Jika Anda menggunakan kolom manual
        ]);

        // 3. Alihkan kembali ke Dashboard dengan pesan sukses
        return redirect()->route('dashboard')->with('success', 'Artikel Berhasil Ditambah!');
    }

    /**
     * Menampilkan form edit artikel
     */
    public function edit($id)
    {
        $post = Post::findOrFail($id);
        return view('admin.edit', compact('post'));
    }

    /**
     * Memperbarui data artikel di database
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'judul'   => 'required',
            'penulis' => 'required',
            'isi'     => 'required',
        ]);

        $post = Post::findOrFail($id);
        $post->update($request->all());

        return redirect()->route('dashboard')->with('success', 'Artikel Berhasil Diperbarui!');
    }

    /**
     * Menghapus artikel
     */
    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        $post->delete();

        return redirect()->route('dashboard')->with('success', 'Artikel Berhasil Dihapus!');
    }

    /**
     * Fungsi khusus upload gambar dari CKEditor
     */
    public function uploadImage(Request $request)
    {
        if ($request->hasFile('upload')) {
            $originName = $request->file('upload')->getClientOriginalName();
            $fileName = pathinfo($originName, PATHINFO_FILENAME);
            $extension = $request->file('upload')->getClientOriginalExtension();
            $fileName = $fileName . '_' . time() . '.' . $extension;

            // Simpan gambar ke folder public/media
            $request->file('upload')->move(public_path('media'), $fileName);

            $url = asset('media/' . $fileName);
            return response()->json(['fileName' => $fileName, 'uploaded' => 1, 'url' => $url]);
        }
    }
}