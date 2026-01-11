<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-bold text-2xl text-gray-900 leading-tight">
                💻 Admin <span class="text-blue-600">Put's Blogspot</span>
            </h2>
            <a href="{{ route('admin.create') }}" class="inline-flex items-center px-6 py-2.5 bg-blue-600 text-white font-bold text-xs uppercase tracking-widest hover:bg-blue-700 rounded-xl shadow-lg transition duration-150">
                + Tambah Komponen
            </a>
        </div>
    </x-slot>

    <div class="py-12 bg-gray-50 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            @if(session('success'))
                <div class="mb-4 p-4 bg-green-100 border-l-4 border-green-500 text-green-700 rounded-r-lg shadow-sm">
                    {{ session('success') }}
                </div>
            @endif

            <div class="bg-white overflow-hidden shadow-2xl sm:rounded-3xl border border-gray-100">
                <div class="p-8">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead>
                            <tr>
                                <th class="px-6 py-4 text-left text-xs font-black text-gray-900 uppercase tracking-widest">Daftar Komponen</th>
                                <th class="px-6 py-4 text-left text-xs font-black text-gray-900 uppercase tracking-widest">Penulis</th>
                                <th class="px-6 py-4 text-center text-xs font-black text-gray-900 uppercase tracking-widest">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-100">
                            {{-- Mengambil data langsung untuk memastikan variabel tersedia --}}
                            @php $admin_posts = \App\Models\Post::all(); @endphp
                            
                            @forelse($admin_posts as $post)
                            <tr class="hover:bg-blue-50/50 transition duration-200">
                                <td class="px-6 py-5 whitespace-nowrap">
                                    <div class="text-sm font-bold text-gray-900">{{ $post->judul ?? 'Tanpa Judul' }}</div>
                                    <div class="text-xs text-gray-500">
                                        Update: {{ $post->updated_at ? $post->updated_at->format('d M Y') : '-' }}
                                    </div>
                                </td>
                                <td class="px-6 py-5 whitespace-nowrap text-sm text-gray-600 font-medium">
                                    {{ $post->penulis ?? 'Admin' }}
                                </td>
                                <td class="px-6 py-5 whitespace-nowrap text-center text-sm font-medium">
                                    <div class="flex justify-center space-x-3">
                                        <a href="{{ route('admin.edit', $post->id) }}" class="px-4 py-2 bg-amber-50 text-amber-700 rounded-xl hover:bg-amber-100 border border-amber-200 transition">
                                            Edit
                                        </a>
                                        <form action="{{ route('admin.destroy', $post->id) }}" method="POST" onsubmit="return confirm('Hapus data ini?')">
                                            @csrf @method('DELETE')
                                            <button type="submit" class="px-4 py-2 bg-rose-50 text-rose-700 rounded-xl hover:bg-rose-100 border border-rose-200 transition">
                                                Hapus
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="3" class="px-6 py-10 text-center text-gray-500 italic">
                                    Belum ada data komponen. Klik "+ Tambah Komponen" untuk memulai.
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>