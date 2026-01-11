@extends('layouts.main')

@section('content')
<div class="container mt-5 mb-5">
    <div class="row justify-content-center">
        <div class="col-md-10 col-lg-8">
            
            <!-- Tombol Kembali yang Minimalis -->
            <div class="mb-4">
                <a href="{{ route('posts.index') }}" class="text-decoration-none text-muted fw-bold hover-back">
                    <i class="bi bi-arrow-left-circle-fill fs-4 me-2"></i> Kembali ke Beranda
                </a>
            </div>

            <!-- Kontainer Utama Artikel -->
            <article class="card shadow-2xl border-0 rounded-4 overflow-hidden">
                <div class="card-body p-4 p-md-5">
                    
                    <!-- Judul Artikel -->
                    <h1 class="display-5 fw-extrabold text-dark mb-3" style="letter-spacing: -1px; line-height: 1.2;">
                        {{ $post->judul }}
                    </h1>
                    
                    <!-- Informasi Penulis & Tanggal dengan Foto Profil -->
                    <div class="d-flex align-items-center mb-4 pb-4 border-bottom">
                        <!-- Bagian Foto Profil -->
                        <div class="profile-container me-3">
                            @if(Auth::check() && Auth::user()->profile_photo_path)
                                <img src="{{ asset('storage/' . Auth::user()->profile_photo_path) }}" alt="{{ $post->penulis }}" class="profile-img shadow-sm">
                            @else
                                <div class="avatar-circle shadow-sm">
                                    {{ substr($post->penulis, 0, 1) }}
                                </div>
                            @endif
                        </div>
                        
                        <div>
                            <p class="mb-0 fw-bold text-dark">{{ $post->penulis }}</p>
                            <small class="text-muted">
                                <i class="bi bi-calendar3 me-1"></i> Diterbitkan pada {{ $post->created_at->format('d M Y') }}
                            </small>
                        </div>
                    </div>

                    <!-- Isi Artikel (Render HTML CKEditor) -->
                    <div class="content-body text-dark">
                        {!! $post->isi !!}
                    </div>

                    <!-- Bagian Footer Artikel -->
                    <div class="mt-5 pt-4 border-top">
                        <p class="text-muted small italic">Terima kasih telah membaca artikel di <strong>EduKomputer</strong>. Semoga informasi mengenai {{ $post->judul }} bermanfaat bagi Anda.</p>
                        
                        <div class="d-flex gap-2">
                            <span class="badge rounded-pill bg-light text-primary px-3 py-2 border">#Hardware</span>
                            <span class="badge rounded-pill bg-light text-primary px-3 py-2 border">#Edukasi</span>
                            <span class="badge rounded-pill bg-light text-primary px-3 py-2 border">#Komputer</span>
                        </div>
                    </div>

                </div>
            </article>

        </div>
    </div>
</div>

<!-- CSS Modern untuk Artikel -->
<style>
    /* Tipografi & Layout Utama */
    .fw-extrabold { font-weight: 800; }
    
    .content-body {
        line-height: 1.9;
        font-size: 1.15rem;
        color: #2d3436;
        font-family: 'Segoe UI', Roboto, Helvetica, Arial, sans-serif;
    }

    /* Foto Profil & Avatar */
    .profile-container {
        position: relative;
    }

    .profile-img {
        width: 50px;
        height: 50px;
        object-fit: cover;
        border-radius: 50%;
        border: 2px solid #fff;
        outline: 2px solid #667eea;
    }

    .avatar-circle {
        width: 50px;
        height: 50px;
        background: linear-gradient(45deg, #667eea, #764ba2);
        color: white;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: bold;
        font-size: 1.2rem;
        text-transform: uppercase;
        border: 2px solid #fff;
    }

    /* Penanganan Gambar agar Menarik */
    .content-body img {
        max-width: 100% !important;
        height: auto !important;
        border-radius: 20px;
        margin: 35px 0;
        display: block;
        box-shadow: 0 20px 40px rgba(0,0,0,0.1); 
        border: 1px solid #eee;
    }

    /* Styling Teks Penjelasan (CKEditor) */
    .content-body p {
        margin-bottom: 1.5rem;
    }

    .content-body h2, .content-body h3 {
        margin-top: 2.5rem;
        margin-bottom: 1rem;
        font-weight: 700;
        color: #1a1a1a;
    }

    /* List yang lebih rapi */
    .content-body ul, .content-body ol {
        margin-bottom: 2rem;
        padding-left: 1.5rem;
    }

    .content-body li {
        margin-bottom: 0.5rem;
    }

    /* Efek Hover tombol kembali */
    .hover-back {
        transition: all 0.3s ease;
        display: inline-block;
    }

    .hover-back:hover {
        color: #667eea !important;
        transform: translateX(-5px);
    }

    /* Shadow custom yang lebih dalam */
    .shadow-2xl {
        box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.08);
    }
</style>
@endsection