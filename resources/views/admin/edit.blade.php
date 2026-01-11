<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-bold text-2xl text-gray-900 leading-tight">
                {{ __('Edit Komponen: ') }} <span class="text-blue-600">{{ $post->judul }}</span>
            </h2>
        </div>
    </x-slot>

    <div class="py-12 bg-gray-50 min-h-screen">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-2xl sm:rounded-3xl border border-gray-100">
                <div class="p-8">
                    <form method="POST" action="{{ route('admin.update', $post->id) }}" class="space-y-6">
                        @csrf
                        @method('PUT')

                        <div>
                            <label for="judul" class="block text-sm font-bold text-gray-900 mb-2">Judul Komponen</label>
                            <input type="text" name="judul" id="judul" 
                                class="w-full px-4 py-3 rounded-xl border-gray-200 focus:border-blue-500 focus:ring-blue-500 shadow-sm text-gray-900 font-medium" 
                                value="{{ old('judul', $post->judul) }}" required>
                            @error('judul') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                        </div>

                        <div>
                            <label for="penulis" class="block text-sm font-bold text-gray-900 mb-2">Penulis / Sumber</label>
                            <input type="text" name="penulis" id="penulis" 
                                class="w-full px-4 py-3 rounded-xl border-gray-200 focus:border-blue-500 focus:ring-blue-500 shadow-sm text-gray-900 font-medium" 
                                value="{{ old('penulis', $post->penulis) }}" required>
                            @error('penulis') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                        </div>

                        <div>
                            <label class="block text-sm font-bold text-gray-900 mb-2">Isi Penjelasan (Mendukung Gambar)</label>
                            <div class="text-black">
                                <textarea name="isi" id="editor">{{ old('isi', $post->isi) }}</textarea>
                            </div>
                            @error('isi') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                        </div>

                        <div class="flex items-center justify-end space-x-6 pt-6 border-t border-gray-100">
                            <a href="{{ route('dashboard') }}" class="text-sm font-bold text-gray-500 hover:text-gray-900 transition duration-150">
                                Batal
                            </a>
                            <button type="submit" 
                                class="inline-flex items-center px-8 py-3 bg-amber-500 border border-transparent rounded-xl font-bold text-xs text-black uppercase tracking-widest hover:bg-amber-600 shadow-lg transition ease-in-out duration-150">
                                Update Komponen
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
                    // Route upload gambar yang sudah kita buat di web.php
                    uploadUrl: '{{ route('admin.upload').'?_token='.csrf_token() }}',
                }
            })
            .catch( error => {
                console.error( error );
            } );
    </script>

    <style>
        .ck-editor__editable {
            min-height: 300px;
            color: #000000 !important; /* Memastikan teks editor tetap hitam */
        }
        .ck.ck-editor__main>.ck-editor__editable:not(.ck-focused) {
            border-color: #e5e7eb;
            border-radius: 0 0 0.75rem 0.75rem;
        }
    </style>
</x-app-layout>