<x-app-layout>
    <script>
        function updateStatus(id, status) {
            fetch(`/admin/${id}/status`, {
                method: 'PATCH',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                },
                body: JSON.stringify({ status: status })
            })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        alert('Status berhasil diperbarui');
                        location.reload();
                    } else {
                        alert('Gagal memperbarui status');
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert('Terjadi kesalahan');
                });
        }
    </script>
    
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-blue-900 leading-tight">
            {{ __('Laporan') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white/80 backdrop-blur-md overflow-hidden shadow-xl sm:rounded-2xl border border-blue-200/30">
                <div class="p-8 text-gray-900">
                    <h1 class="text-2xl font-bold mb-6 text-blue-900">Daftar Laporan</h1>
                    
                    <!-- Table Container with scroll -->
                    <div class="overflow-x-auto rounded-xl border border-blue-200/30">
                        <table class="min-w-full divide-y divide-blue-200/30">
                            <thead class="bg-blue-50/60">
                                <tr>
                                    <th class="px-6 py-4 text-left text-sm font-semibold text-blue-900">No</th>
                                    <th class="px-6 py-4 text-left text-sm font-semibold text-blue-900">Nama Pelapor</th>
                                    <th class="px-6 py-4 text-left text-sm font-semibold text-blue-900">Terlapor</th>
                                    <th class="px-6 py-4 text-left text-sm font-semibold text-blue-900">Kejadian</th>
                                    <th class="px-6 py-4 text-left text-sm font-semibold text-blue-900">Tempat Kejadian</th>
                                    <th class="px-6 py-4 text-left text-sm font-semibold text-blue-900">Gambar</th>
                                    <th class="px-6 py-4 text-left text-sm font-semibold text-blue-900">Status</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-blue-200/30">
                                @foreach($admins as $admin)
                                    <tr class="hover:bg-blue-50/40 transition-colors">
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">{{ $loop->iteration }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">{{ $admin->nama_pelapor }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">{{ $admin->terlapor }}</td>
                                        <td class="px-6 py-4 text-sm text-gray-700">{{ Str::limit($admin->kejadian, 30) }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">{{ $admin->tempat_kejadian }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm">
                                            @if($admin->gambar)
                                            <img 
                                                src="{{ asset('storage/' . $admin->gambar) }}" 
                                                alt="Gambar" 
                                                class="w-12 h-12 rounded-lg object-cover border border-blue-200/30 cursor-pointer hover:scale-105 transition-transform duration-200"
                                                onclick="showPopup(this.src)">
                                            @else
                                                <span class="text-gray-400 italic">-</span>
                                            @endif
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm">
                                            <form action="{{ route('admin.updateStatus', $admin->id) }}" method="POST" class="flex gap-2">
                                                @csrf
                                                @method('PUT')
                                                <select name="status" class="border border-blue-200/50 bg-white/70 text-gray-900 rounded-lg px-7 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
                                                    <option value="pending" {{ $admin->status == 'pending' ? 'selected' : '' }}>Pending</option>
                                                    <option value="diproses" {{ $admin->status == 'diproses' ? 'selected' : '' }}>Diproses</option>
                                                    <option value="diterima" {{ $admin->status == 'diterima' ? 'selected' : '' }}>Diterima</option>
                                                    <option value="selesai" {{ $admin->status == 'selesai' ? 'selected' : '' }}>Selesai</option>
                                                </select>
                                                <button type="submit" class="px-4 py-2 rounded-lg bg-gradient-to-r from-blue-500 to-indigo-600 text-white font-semibold hover:from-blue-600 hover:to-indigo-700 transition-all duration-200 text-sm">
                                                    Update
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

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
