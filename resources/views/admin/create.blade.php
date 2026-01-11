<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-bold text-2xl text-gray-900 leading-tight">
                {{ __('Tambah Komponen Baru') }}
            </h2>
        </div>
    </x-slot>

    <div class="py-12 bg-gray-50 min-h-screen">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-2xl sm:rounded-3xl border border-gray-100">
                <div class="p-8">
                    <form method="POST" action="{{ route('admin.store') }}" enctype="multipart/form-data" class="space-y-6">
                        @csrf

                        <div>
                            <label for="judul" class="block text-sm font-bold text-gray-900 mb-2">Judul Artikel</label>
                            <input type="text" name="judul" id="judul" 
                                class="w-full px-4 py-3 rounded-xl border-gray-200 focus:border-blue-500 focus:ring-blue-500 shadow-sm text-gray-900 font-medium" 
                                placeholder="Contoh: Mengenal Arsitektur GPU" value="{{ old('judul') }}" required>
                            @error('judul') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                        </div>

                        <div>
                            <label for="penulis" class="block text-sm font-bold text-gray-900 mb-2">Penulis</label>
                            <input type="text" name="penulis" id="penulis" 
                                class="w-full px-4 py-3 rounded-xl border-gray-200 bg-gray-50 text-gray-600 font-medium cursor-not-allowed" 
                                value="{{ Auth::user()->name }}" readonly>
                            <p class="text-xs text-gray-400 mt-1">*Nama penulis diambil otomatis dari akun login Anda.</p>
                        </div>

                        <div>
                            <label class="block text-sm font-bold text-gray-900 mb-2">Isi Penjelasan (Bisa Masukkan Gambar)</label>
                            <div class="text-black">
                                <textarea name="isi" id="editor">{{ old('isi') }}</textarea>
                            </div>
                            @error('isi') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                        </div>

                        <div class="flex items-center justify-end space-x-3 pt-6 border-t border-gray-100">
                            <a href="{{ route('dashboard') }}" class="text-sm font-bold text-gray-500 hover:text-gray-900 transition duration-150">
                                Batal
                            </a>
                            <button type="submit" 
                                class="inline-flex items-center px-10 py-3 bg-blue-600 border border-transparent rounded-xl font-bold text-xs text-white uppercase tracking-widest hover:bg-blue-700 shadow-lg active:bg-blue-900 transition ease-in-out duration-150">
                                UPLOAD
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.ckeditor.com/ckeditor5/39.0.1/classic/ckeditor.js"></script>
    <script>
        ClassicEditor
            .create( document.querySelector( '#editor' ), {
                ckfinder: {
                    // Pastikan route admin.upload sudah benar di web.php
                    uploadUrl: '{{ route('admin.upload').'?_token='.csrf_token() }}',
                }
            })
            .then( editor => {
                console.log( 'Editor was initialized' );
            } )
            .catch( error => {
                console.error( error );
            } );
    </script>

    <style>
        /* Menyesuaikan tinggi editor dan warna teks */
        .ck-editor__editable {
            min-height: 350px;
            color: black !important;
        }
        /* Membuat sudut editor lebih halus sesuai tema Dashboard */
        .ck.ck-editor__main>.ck-editor__editable:not(.ck-focused) {
            border-bottom-left-radius: 0.75rem !important;
            border-bottom-right-radius: 0.75rem !important;
            border-color: #e5e7eb;
        }
        .ck.ck-toolbar {
            border-top-left-radius: 0.75rem !important;
            border-top-right-radius: 0.75rem !important;
            border-color: #e5e7eb;
            background: #f9fafb !important;
        }
    </style>
</x-app-layout>