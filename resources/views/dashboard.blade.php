<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h3 class="text-lg font-medium mb-4">Data Pengaduan</h3>
                    <div class="mb-4">
                        <button href="{{ route('Siswa.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                            Tambah Laporan
                        </button>
                    </div>
                    <table class="min-w-full bg-white border border-gray-300">
                        <thead>
                            <tr class="bg-gray-100">
                                <th class="px-4 py-2 border-b text-left">Nama Pelapor</th>
                                <th class="px-4 py-2 border-b text-left">Terlapor</th>
                                <th class="px-4 py-2 border-b text-left">Kejadian</th>
                                <th class="px-4 py-2 border-b text-left">Deskripsi</th>
                                <th class="px-4 py-2 border-b text-left">Tempat Kejadian</th>
                                <th class="px-4 py-2 border-b text-left">Gambar</th>
                                <th class="px-4 py-2 border-b text-left">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($pengaduan as $item)
                            <tr>
                                <td class="px-4 py-2 border-b">{{ $item->nama_pelapor }}</td>
                                <td class="px-4 py-2 border-b">{{ $item->terlapor }}</td>
                                <td class="px-4 py-2 border-b">{{ $item->kejadian }}</td>
                                <td class="px-4 py-2 border-b">{{ $item->deskripsi }}</td>
                                <td class="px-4 py-2 border-b">{{ $item->tempat_kejadian }}</td>
                                <td class="px-4 py-2 border-b">
                                    @if($item->gambar)
                                        <img src="{{ asset('storage/' . $item->gambar) }}" alt="Gambar" class="w-12 h-12 object-cover">
                                    @else
                                        <span>Tidak ada gambar</span>
                                    @endif
                                </td>
                                <td class="px-4 py-2 border-b">{{ $item->status }}</td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="6" class="px-4 py-2 border-b text-center">Tidak ada data tersedia</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
