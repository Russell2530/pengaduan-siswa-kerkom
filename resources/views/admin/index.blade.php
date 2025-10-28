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
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h1 class="text-2xl font-bold mb-4">Laporan</h1>
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    ID</th>
                                <th
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Nama Pelapor</th>
                                <th
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Terlapor</th>
                                <th
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Kejadian</th>
                                <th
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Tempat Kejadian</th>
                                <th
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Gambar</th>

                                <th
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Status</th>

                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach($admins as $admin)
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                        {{ $admin->id }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $admin->nama_pelapor }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $admin->terlapor }}
                                    </td>
                                    <td class="px-6 py-4 text-sm text-gray-500">{{ $admin->kejadian }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        {{ $admin->tempat_kejadian }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        @if($admin->gambar)
                                            <img src="{{ asset('storage/' . $admin->gambar) }}" alt="Gambar Bukti" class="w-16 h-16 object-cover rounded border border-gray-200">
                                        @else
                                            <span class="text-gray-500 italic">Tidak ada gambar</span>
                                        @endif
                                    </td>

                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        <form action="{{ route('admin.updateStatus', $admin->id) }}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <select name="status" class="border border-gray-300 rounded px-2 py-1">
                                                <option value="diproses" {{ $admin->status == 'diproses' ? 'selected' : '' }}>
                                                    Diproses</option>
                                                <option value="diterima" {{ $admin->status == 'diterima' ? 'selected' : '' }}>
                                                    Diterima</option>
                                                <option value="selesai" {{ $admin->status == 'selesai' ? 'selected' : '' }}>
                                                    Selesai</option>
                                            </select>
                                            <button type="submit" class="ml-2 bg-blue-500 hover:bg-blue-600 text-white px-2 py-1 rounded">
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
</x-app-layout>