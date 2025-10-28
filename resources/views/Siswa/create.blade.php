
<x-app-layout>
    <div class="min-h-screen bg-gradient-to-br from-[#0a1633] to-[#10224d] py-12 px-4 sm:px-6">
        <div class="max-w-2xl mx-auto">
            <div class="text-center mb-8">
                <h1 class="text-3xl font-bold text-white mb-2">Formulir Laporan Kejadian</h1>
                <p class="text-gray-300">Laporkan kejadian yang terjadi untuk ditindaklanjuti</p>
            </div>

            <div class="bg-white/90 backdrop-blur-sm rounded-2xl shadow-xl border border-gray-200 p-8">
                <form method="POST" action="{{ route('siswa.pengaduan.store') }}" enctype="multipart/form-data" class="space-y-6">
                    @csrf

                    <div>
                        <label for="nama_pelapor" class="block text-sm font-semibold text-gray-700 mb-1">Nama Pelapor</label>
                        <input type="text" id="nama_pelapor" name="nama_pelapor" value="{{ Auth::user()->name ?? old('nama_pelapor') }}" required class="w-full px-4 py-3 rounded-lg border border-gray-300 bg-white text-gray-800 focus:ring-2 focus:ring-blue-500 focus:border-transparent focus:outline-none" placeholder="Nama lengkap Anda" />
                        @error('nama_pelapor')
                            <p class="mt-1 text-red-500 text-sm">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="terlapor" class="block text-sm font-semibold text-gray-700 mb-1">Terlapor</label>
                        <input type="text" id="terlapor" name="terlapor" value="{{ old('terlapor') }}" required class="w-full px-4 py-3 rounded-lg border border-gray-300 bg-white text-gray-800 focus:ring-2 focus:ring-blue-500 focus:border-transparent focus:outline-none" placeholder="Nama terlapor" />
                        @error('terlapor')
                            <p class="mt-1 text-red-500 text-sm">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="kejadian" class="block text-sm font-semibold text-gray-700 mb-1">Kejadian</label>
                        <input type="text" id="kejadian" name="kejadian" value="{{ old('kejadian') }}" required class="w-full px-4 py-3 rounded-lg border border-gray-300 bg-white text-gray-800 focus:ring-2 focus:ring-blue-500 focus:border-transparent focus:outline-none" placeholder="Jenis kejadian" />
                        @error('kejadian')
                            <p class="mt-1 text-red-500 text-sm">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="tempat_kejadian" class="block text-sm font-semibold text-gray-700 mb-1">Tempat Kejadian</label>
                        <input type="text" id="tempat_kejadian" name="tempat_kejadian" value="{{ old('tempat_kejadian') }}" required class="w-full px-4 py-3 rounded-lg border border-gray-300 bg-white text-gray-800 focus:ring-2 focus:ring-blue-500 focus:border-transparent focus:outline-none" placeholder="Lokasi kejadian terjadi" />
                        @error('tempat_kejadian')
                            <p class="mt-1 text-red-500 text-sm">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="gambar" class="block text-sm font-semibold text-gray-700 mb-1">Gambar Bukti (Opsional)</label>
                        <input type="file" id="gambar" name="gambar" accept="image/*" class="w-full px-4 py-3 rounded-lg border border-gray-300 bg-white text-gray-800 focus:ring-2 focus:ring-blue-500 focus:outline-none" />
                        @error('gambar')
                            <p class="mt-1 text-red-500 text-sm">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="deskripsi" class="block text-sm font-semibold text-gray-700 mb-1">Deskripsi Kejadian</label>
                        <textarea id="deskripsi" name="deskripsi" rows="4" class="w-full px-4 py-3 rounded-lg border border-gray-300 bg-white text-gray-800 focus:ring-2 focus:ring-blue-500 focus:border-transparent focus:outline-none" placeholder="Jelaskan secara detail kejadian yang terjadi">{{ old('deskripsi') }}</textarea>
                        @error('deskripsi')
                            <p class="mt-1 text-red-500 text-sm">{{ $message }}</p>
                        @enderror
                    </div>

                    <input type="hidden" name="status" value="Diproses">

                    <div class="flex gap-4 pt-4">
                        <button type="submit" class="flex-1 bg-[#0a1633] hover:bg-[#10224d] text-white font-semibold py-3 px-4 rounded-lg transition">
                            Kirim Laporan
                        </button>
                        <a href="{{ route('dashboard') }}" class="flex-1 bg-gray-200 hover:bg-gray-300 text-gray-800 font-semibold py-3 px-4 rounded-lg text-center transition">
                            Batal
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
