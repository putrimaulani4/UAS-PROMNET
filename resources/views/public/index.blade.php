@extends('layouts.main')

@section('content')
<!-- Header Section -->
<div class="bg-primary text-white py-5 mb-5 shadow" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); border-radius: 0 0 50px 50px;">
    <div class="container text-center">
        <!-- Container Foto Bulat & Berbingkai -->
        <div class="mb-4 d-inline-block position-relative">
            <img src="{{ asset('img/komputer.jpg') }}" 
                 alt="Logo EduKomputer" 
                 class="rounded-circle img-thumbnail shadow-lg"
                 style="width: 150px; height: 150px; object-fit: cover; border: 5px solid rgba(255, 255, 255, 0.3); padding: 5px; background: transparent;">
        </div>
        
        <h1 class="display-4 fw-bold">EduKomputer</h1>
        <p class="lead opacity-75">Belajar mengenal komponen utama komputer secara mendalam.</p>
    </div>
</div>

<style>
    /* Tambahan agar bingkai terlihat lebih halus */
    .img-thumbnail {
        background-color: rgba(255, 255, 255, 0.2) !important;
        border: 4px solid #ffffff !important;
        transition: transform 0.3s ease;
    }

    .img-thumbnail:hover {
        transform: scale(1.05); 
    }

       .rounded-circle {
        aspect-ratio: 1 / 1;
    }
</style>

<div class="container mb-5">
    <div class="row g-4">
        @forelse($posts as $post)
        <div class="col-md-4">
            <div class="card h-100 border-0 shadow-sm rounded-4 overflow-hidden transition-hover">
                <div class="card-body p-4 d-flex flex-column">
                    <div>
                        <span class="badge bg-soft-blue text-primary mb-3 px-3 py-2 rounded-pill">Teknologi</span>
                    </div>
                    
                    <h4 class="card-title fw-bold text-dark mb-3">{{ $post->judul }}</h4>
                    
                    <div class="text-muted mb-4" style="font-size: 0.95rem; line-height: 1.6;">
                        {{-- 
                           strip_tags: membuang tag HTML (gambar/format) agar hanya teks yang muncul.
                           Str::limit: membatasi panjang karakter agar kotak tetap rapi.
                        --}}
                        {{ Str::limit(strip_tags($post->isi), 130, '...') }}
                    </div>
                    
                    <div class="d-flex justify-content-between align-items-center mt-auto pt-3 border-top">
                        <small class="text-secondary">By: <strong>{{ $post->penulis }}</strong></small>
                        <a href="{{ route('posts.show', $post->id) }}" class="btn btn-primary rounded-pill px-4 shadow-sm">Baca</a>
                    </div>
                </div>
            </div>
        </div>
        @empty
        <div class="col-12 text-center py-5">
            <h3 class="text-muted">Belum ada artikel tersedia.</h3>
        </div>
        @endforelse
    </div>
</div>

<style>
    .transition-hover:hover {
        transform: translateY(-10px);
        transition: all 0.3s ease;
    }
    .bg-soft-blue {
        background-color: #eef2ff;
    }
    /* Memastikan tinggi card seragam */
    .card {
        min-height: 300px;
    }
</style>
@endsection