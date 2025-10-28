<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Pengaduan Siswa SMK Informatika Pesat</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600,700" rel="stylesheet" />

    <style>
        /* Animasi fade-in */
        @keyframes fadeUp {
            0% { opacity: 0; transform: translateY(40px); }
            100% { opacity: 1; transform: translateY(0); }
        }

        .fade-up {
            opacity: 0;
            transform: translateY(40px);
            transition: all 0.8s ease-out;
        }

        .fade-up.visible {
            opacity: 1;
            transform: translateY(0);
        }
    </style>
</head>
<body class="bg-gradient-to-br from-[#0a1633] to-[#10224d] text-white font-[Instrument Sans]">

    <!-- Navbar -->
    <nav class="fixed top-0 left-0 w-full z-50">
        <div class="max-w-7xl mx-auto px-6 py-4 flex justify-between items-center bg-white/5 backdrop-blur-md border border-white/10 rounded-2xl mt-4 shadow-lg transition">
            <div class="flex items-center gap-2">
              <div class="flex items-center gap-2">
                <img src="img/logo-smk.png" alt="Logo SMK" class="h-10 w-auto object-contain" />
              </div>
            </div>

            <ul class="hidden md:flex gap-8 font-medium">
                <li><a href="#home" class="hover:text-blue-300 transition">Beranda</a></li>
                <li><a href="#tentang" class="hover:text-blue-300 transition">Tentang</a></li>
                <li><a href="#fitur" class="hover:text-blue-300 transition">Fitur</a></li>
                <li><a href="#kontak" class="hover:text-blue-300 transition">Kontak</a></li>
            </ul>

            <div class="flex gap-3">
                <a href="{{ route('login') }}" class="px-5 py-2 rounded-full border border-white/30 bg-white/10 backdrop-blur-md hover:bg-white/20 transition font-medium">
                    Login
                </a>
                <a href="{{ route('register') }}" class="px-5 py-2 rounded-full border border-white/30 bg-white/10 backdrop-blur-md hover:bg-white/20 transition font-medium">
                    Register
                </a>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section id="home" class="pt-40 pb-24 text-center md:text-left relative overflow-hidden">
        <div class="max-w-7xl mx-auto flex flex-col md:flex-row items-center justify-between px-6">
            <!-- Left Text -->
            <div class="w-full md:w-1/2 space-y-6 fade-up">
                <h1 class="text-5xl md:text-6xl font-extrabold leading-tight">
                    Pengaduan <br>
                    <span class="text-blue-300">Siswa</span> <br>
                    SMK Informatika Pesat
                </h1>
                <p class="text-lg text-gray-300">
                    Sampaikan laporan atau keluhanmu secara mudah, cepat, dan aman.
                    Bersama kita wujudkan lingkungan sekolah yang lebih baik.
                </p>
                <div class="flex gap-4 pt-4 justify-center md:justify-start">
                    <a href="{{ url('dashboard  ') }}" class="bg-blue-500/30 backdrop-blur-md text-white border border-blue-300 px-6 py-3 rounded-full font-semibold hover:bg-blue-400/40 hover:border-white transition">
                        Buat Laporan
                    </a>
                    <a href="#tentang" class="bg-transparent border border-white/30 px-6 py-3 rounded-full font-semibold hover:bg-white/20 transition">
                        Pelajari Lebih Lanjut
                    </a>
                </div>
            </div>

            <!-- Right Image -->
            <div class="w-full md:w-1/2 flex justify-center mt-10 md:mt-0 relative fade-up">
                <div class="absolute bg-blue-400/30 rounded-full w-80 h-80 md:w-96 md:h-96 top-10 right-10 blur-3xl opacity-30"></div>
                <img src="{{ asset('/img/rasya.png') }}" alt="Siswa" class="relative z-10 w-80 md:w-[420px] drop-shadow-2xl">
            </div>
        </div>

        <!-- Counter -->
        <div class="mt-20 text-center fade-up">
            <h3 class="text-xl font-medium text-blue-200">Jumlah Laporan Masuk</h3>
            <h2 id="laporanCounter" class="text-5xl font-extrabold mt-3 text-blue-300">0</h2>
            <p class="text-gray-300">dan terus bertambah setiap hari!</p>
        </div>
    </section>

    <!-- Tentang -->
    <section id="tentang" class="py-24 bg-white text-gray-800 fade-up">
        <div class="max-w-5xl mx-auto text-center space-y-6 px-6">
            <h2 class="text-3xl font-bold text-blue-900">Tentang Website</h2>
            <p class="text-lg text-gray-700 leading-relaxed">
                Website ini membantu siswa SMK Informatika Pesat untuk menyampaikan pengaduan atau laporan terkait kegiatan sekolah.
                Semua laporan diterima dengan aman dan ditindaklanjuti oleh pihak sekolah demi kenyamanan bersama.
            </p>
        </div>
    </section>

    <!-- Fitur -->
    <section id="fitur" class="py-24 bg-gradient-to-br from-[#0a1633] to-[#10224d] text-white fade-up">
        <div class="max-w-6xl mx-auto px-6 text-center space-y-12">
            <h2 class="text-3xl font-bold text-blue-200">Fitur Unggulan</h2>
            <div class="grid md:grid-cols-3 gap-10 mt-10">
                <div class="p-6 bg-white/10 border border-white/10 backdrop-blur-md rounded-xl shadow-lg hover:scale-105 transition-transform duration-500">
                    <h3 class="text-xl font-semibold text-blue-300 mb-2">Laporan Cepat</h3>
                    <p class="text-gray-300">Kirim laporan hanya dalam hitungan menit dengan form sederhana.</p>
                </div>
                <div class="p-6 bg-white/10 border border-white/10 backdrop-blur-md rounded-xl shadow-lg hover:scale-105 transition-transform duration-500">
                    <h3 class="text-xl font-semibold text-blue-300 mb-2">Data Aman</h3>
                    <p class="text-gray-300">Privasi laporan dijaga dengan sistem keamanan modern.</p>
                </div>
                <div class="p-6 bg-white/10 border border-white/10 backdrop-blur-md rounded-xl shadow-lg hover:scale-105 transition-transform duration-500">
                    <h3 class="text-xl font-semibold text-blue-300 mb-2">Perkembangan Status</h3>
                    <p class="text-gray-300">Lihat perkembangan laporanmu secara real-time melalui dashboard.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Kontak -->
    <section id="kontak" class="py-24 bg-white text-gray-800 fade-up">
        <div class="max-w-6xl mx-auto px-6 text-center space-y-6">
            <h2 class="text-3xl font-bold text-blue-900">Kontak Kami</h2>
            <p class="text-lg text-gray-700">Hubungi kami untuk pertanyaan atau bantuan lebih lanjut.</p>
            <div class="mt-8">
                <p class="text-gray-700">info@smkpesat.sch.id</p>
                <p class="text-gray-700">+62 812-3456-7890</p>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-[#0a1633] text-center py-6 text-gray-400 border-t border-white/10">
        © {{ date('Y') }} Kelompok Rafka.
    </footer>

    <!-- Scripts -->
    <script>
        // Counter animation
        let counter = document.getElementById('laporanCounter');
        let count = 0;
        const target = 1342;

        const interval = setInterval(() => {
            if (count < target) {
                count += Math.floor(Math.random() * 10) + 5;
                if (count > target) count = target;
                counter.textContent = count.toLocaleString();
            } else {
                clearInterval(interval);
            }
        }, 50);

        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener("click", function (e) {
                e.preventDefault();
                document.querySelector(this.getAttribute("href")).scrollIntoView({
                    behavior: "smooth"
                });
            });
        });

        const faders = document.querySelectorAll('.fade-up');
        const appearOptions = { threshold: 0.2 };
        const appearOnScroll = new IntersectionObserver(function(entries, observer) {
            entries.forEach(entry => {
                if (!entry.isIntersecting) return;
                entry.target.classList.add('visible');
                observer.unobserve(entry.target);
            });
        }, appearOptions);

        faders.forEach(fader => {
            appearOnScroll.observe(fader);
        });
    </script>
</body>
</html>
