<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-blue-900 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white/80 backdrop-blur-md overflow-hidden shadow-xl sm:rounded-2xl border border-blue-200/30">
                <div class="p-8 text-gray-900">
                    <h3 class="text-2xl font-bold mb-6 text-blue-900">Data Pengaduan Anda</h3>
                    <div class="mb-6">
                        <a href="{{ route('siswa.pengaduan.create') }}" class="inline-block px-6 py-3 rounded-xl bg-gradient-to-r from-blue-500 to-indigo-600 text-white font-bold hover:from-blue-600 hover:to-indigo-700 transition-all duration-200 transform hover:scale-105 shadow-lg">
                            + Tambah Laporan
                        </a>
                    </div>
                    
                    <!-- Table Container -->
                    <div class="overflow-x-auto rounded-xl border border-blue-200/30">
                        <table class="min-w-full divide-y divide-blue-200/30">
                            <thead class="bg-blue-50/60">
                                <tr>
                                    <th class="px-6 py-4 text-left text-sm font-semibold text-blue-900">No</th>
                                    <th class="px-6 py-4 text-left text-sm font-semibold text-blue-900">Nama Pelapor</th>
                                    <th class="px-6 py-4 text-left text-sm font-semibold text-blue-900">Terlapor</th>
                                    <th class="px-6 py-4 text-left text-sm font-semibold text-blue-900">Kejadian</th>
                                    <th class="px-6 py-4 text-left text-sm font-semibold text-blue-900">Deskripsi</th>
                                    <th class="px-6 py-4 text-left text-sm font-semibold text-blue-900">Tempat</th>
                                    <th class="px-6 py-4 text-left text-sm font-semibold text-blue-900">Gambar</th>
                                    <th class="px-6 py-4 text-left text-sm font-semibold text-blue-900">Status</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-blue-200/30">
                                @forelse($pengaduan as $item)
                                <tr class="hover:bg-blue-50/40 transition-colors">
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">{{ $loop->iteration }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">{{ $item->nama_pelapor }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">{{ $item->terlapor }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">{{ $item->kejadian }}</td>
                                    <td class="px-6 py-4 text-sm text-gray-700">{{ Str::limit($item->deskripsi, 50) }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">{{ $item->tempat_kejadian }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm">
                                        @if($item->gambar)
                                          <img 
                                              src="{{ asset('storage/' . $item->gambar) }}" 
                                              alt="Gambar" 
                                              class="w-12 h-12 rounded-lg object-cover border border-blue-200/30 cursor-pointer hover:scale-105 transition-transform duration-200"
                                              onclick="showPopup(this.src)">
                                        @else
                                            <span class="text-gray-400 italic">-</span>
                                        @endif
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm">
                                        <span class="px-3 py-1 rounded-full text-xs font-semibold
                                            @if($item->status == 'pending') bg-yellow-100 text-yellow-800 border border-yellow-300
                                            @elseif($item->status == 'diproses') bg-blue-100 text-blue-800 border border-blue-300
                                            @elseif($item->status == 'diterima') bg-purple-100 text-purple-800 border border-purple-300
                                            @elseif($item->status == 'selesai') bg-green-100 text-green-800 border border-green-300
                                            @endif">
                                            {{ ucfirst($item->status) }}
                                        </span>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="7" class="px-6 py-8 text-center text-gray-500">
                                        <p class="text-lg">Belum ada laporan. 
                                            <a href="{{ route('siswa.pengaduan.create') }}" class="text-blue-600 hover:text-blue-800 underline">Buat laporan sekarang</a>
                                        </p>
                                    </td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- 🔍 Popup Gambar -->
    <div id="imagePopup" onclick="closePopup()" class="hidden fixed inset-0 bg-black/70 backdrop-blur-sm z-50 flex justify-center items-center">
        <img id="popupImg" src="" class="max-w-[90%] max-h-[85%] rounded-2xl shadow-2xl border border-white/20 transition-transform duration-300 scale-100 hover:scale-105" alt="Preview Gambar">
    </div>

    <script>
        function showPopup(src) {
            const popup = document.getElementById("imagePopup");
            const popupImg = document.getElementById("popupImg");
            popupImg.src = src;
            popup.classList.remove("hidden");
        }
        function closePopup() {
            document.getElementById("imagePopup").classList.add("hidden");
        }
    </script>
</x-app-layout>
