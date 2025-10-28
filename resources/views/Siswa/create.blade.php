
<x-app-layout>
    <div class="min-h-screen bg-gradient-to-br from-blue-50 to-indigo-100 py-12 px-4 sm:px-6 animate-fadeIn pt-[150px]">
        <div class="max-w-4xl mx-auto animate-fadeIn">
            <div class="text-center mb-10 animate-fadeIn">
                <h1 class="text-4xl font-extrabold text-gray-800 mb-3 tracking-tight animate-fadeIn">Formulir Laporan Kejadian</h1>
                <p class="text-gray-600 max-w-md mx-auto animate-fadeIn">Laporkan kejadian yang terjadi untuk ditindaklanjuti</p>
            </div>
            
            <div class="animate-fadeIn">
                <div class="bg-white/90 backdrop-blur-sm rounded-2xl shadow-xl border border-gray-200 p-8">
                    <form action="{{ route('siswa.pengaduan.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                        @csrf
                        
                        <!-- Nama Pelapor -->
                        <div>
                            <label class="block mb-2 text-gray-700 font-semibold" for="nama_pelapor">Nama Pelapor</label>
                            <input 
                                type="text" 
                                name="nama_pelapor" 
                                id="nama_pelapor" 
                                value="{{ Auth::user()->name ?? old('nama_pelapor') }}"
                                class="w-full px-4 py-3 rounded-xl border border-gray-300 bg-white text-gray-800 focus:ring-2 focus:ring-blue-500 focus:border-transparent focus:outline-none transition duration-200" 
                                placeholder="Nama lengkap Anda"/>
                            @error('nama_pelapor')
                                <p class="mt-1 text-red-500 text-sm">{{ $message }}</p>
                            @enderror
                        </div>
                        
                        <!-- Terlapor -->
                        <div>
                            <label class="block mb-2 text-gray-700 font-semibold" for="terlapor">Terlapor</label>
                            <input 
                                type="text" 
                                name="terlapor" 
                                id="terlapor" 
                                value="{{ old('terlapor') }}"
                                class="w-full px-4 py-3 rounded-xl border border-gray-300 bg-white text-gray-800 focus:ring-2 focus:ring-blue-500 focus:border-transparent focus:outline-none transition duration-200" 
                                placeholder="Nama terlapor"/>
                            @error('terlapor')
                                <p class="mt-1 text-red-500 text-sm">{{ $message }}</p>
                            @enderror
                        </div>
                        
                        <!-- Kejadian -->
                        <div>
                            <label class="block mb-2 text-gray-700 font-semibold" for="kejadian">Kejadian</label>
                            <input 
                                type="text" 
                                name="kejadian" 
                                id="kejadian" 
                                value="{{ old('kejadian') }}"
                                class="w-full px-4 py-3 rounded-xl border border-gray-300 bg-white text-gray-800 focus:ring-2 focus:ring-blue-500 focus:border-transparent focus:outline-none transition duration-200" 
                                placeholder="Jenis kejadian"/>
                            @error('kejadian')
                                <p class="mt-1 text-red-500 text-sm">{{ $message }}</p>
                            @enderror
                        </div>
                        
                        <!-- Deskripsi -->
                        <div>
                            <label class="block mb-2 text-gray-700 font-semibold" for="deskripsi">Deskripsi Kejadian</label>
                            <textarea 
                                name="deskripsi" 
                                id="deskripsi" 
                                rows="5" 
                                class="w-full px-4 py-3 rounded-xl border border-gray-300 bg-white text-gray-800 focus:ring-2 focus:ring-blue-500 focus:border-transparent focus:outline-none transition duration-200" 
                                placeholder="Jelaskan secara detail kejadian yang terjadi">{{ old('deskripsi') }}</textarea>
                            @error('deskripsi')
                                <p class="mt-1 text-red-500 text-sm">{{ $message }}</p>
                            @enderror
                        </div>
                        
                        <!-- Tempat Kejadian -->
                        <div>
                            <label class="block mb-2 text-gray-700 font-semibold" for="tempat_kejadian">Tempat Kejadian</label>
                            <input 
                                type="text" 
                                name="tempat_kejadian" 
                                id="tempat_kejadian" 
                                value="{{ old('tempat_kejadian') }}"
                                class="w-full px-4 py-3 rounded-xl border border-gray-300 bg-white text-gray-800 focus:ring-2 focus:ring-blue-500 focus:border-transparent focus:outline-none transition duration-200" 
                                placeholder="Lokasi kejadian terjadi"/>
                            @error('tempat_kejadian')
                                <p class="mt-1 text-red-500 text-sm">{{ $message }}</p>
                            @enderror
                        </div>
                        
                        <!-- Gambar Bukti -->
                        <div>
                            <label class="block mb-2 text-gray-700 font-semibold" for="gambar">Gambar Bukti (Opsional)</label>
                            <div class="relative">
                                <input 
                                    type="file" 
                                    name="gambar" 
                                    id="gambar" 
                                    accept="image/*"
                                    class="w-full px-4 py-3 rounded-xl border border-gray-300 bg-white text-gray-800 focus:ring-2 focus:ring-blue-500 focus:border-transparent focus:outline-none transition duration-200">
                            </div>
                            @error('gambar')
                                <p class="mt-1 text-red-500 text-sm">{{ $message }}</p>
                            @enderror
                        </div>
                        
                        <!-- Status (Default to 'pending') -->
                        <input type="hidden" name="status" value="pending">
                        
                        <!-- Tombol Submit -->
                        <div class="pt-6">
                            <button type="submit" 
                                    class="w-full px-8 py-4 rounded-xl bg-gradient-to-r from-blue-500 to-indigo-600 text-white font-bold text-lg shadow-lg hover:from-blue-600 hover:to-indigo-700 transition-all duration-200 transform hover:scale-105 focus:outline-none focus:ring-2 focus:ring-blue-300 focus:ring-opacity-50">
                                <span class="flex items-center justify-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                    </svg>
                                    Kirim Laporan
                                </span>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
