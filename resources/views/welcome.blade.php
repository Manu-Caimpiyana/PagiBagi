<x-layouts.app 
    title="PagiBagi - Berbagi dari Pagi, Peduli Sesama | SMK Wikrama Bogor"
    description="Sistem transparansi pencatatan infaq dan sedekah subuh bagi seluruh murid dan guru di lingkungan sekolah SMK Taruna Bhakti."
    class="bg-[#FAF7F2] text-[#132521] font-sans antialiased selection:bg-[#153F36] selection:text-white min-h-screen flex flex-col justify-between"
>

    <!-- Top Navigation Bar -->
    <header class="sticky top-0 z-40 bg-[#FAF7F2]/90 backdrop-blur-md border-b border-[#EAE4D9]/80 transition-all">
        <!-- SVG Gooey Liquid Filter Definition -->
        <svg class="absolute w-0 h-0 pointer-events-none opacity-0 -z-50" aria-hidden="true">
            <defs>
                <filter id="navbar-gooey-filter">
                    <feGaussianBlur in="SourceGraphic" stdDeviation="5" result="blur" />
                    <feColorMatrix in="blur" mode="matrix" values="1 0 0 0 0  0 1 0 0 0  0 0 1 0 0  0 0 0 19 -7" result="goo" />
                    <feComposite in="SourceGraphic" in2="goo" operator="atop" />
                </filter>
            </defs>
        </svg>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 h-20 flex items-center justify-between">
            <!-- Brand Logo -->
            <x-brand-logo 
                :href="route('home')" 
                size="md" 
                :with-text="true" 
                tagline="Berbagi Dari Pagi" 
            />

            <!-- Desktop Navigation Links with Sticky Gooey Liquid Pill -->
            <nav class="relative hidden md:flex items-center gap-3 text-sm" id="navbarMenu">
                <!-- Gooey Liquid Filter Layer -->
                <div class="absolute inset-0 pointer-events-none rounded-full overflow-visible" style="filter: url(#navbar-gooey-filter);">
                    <!-- Anchor Blob (Trails behind to stretch liquid bridge) -->
                    <span id="gooeyBlobAnchor" class="absolute rounded-full bg-[#153F36] transition-all duration-500 ease-[cubic-bezier(0.2,1,0.3,1)] opacity-0 scale-75 pointer-events-none"></span>
                    <!-- Leader Blob (Moves first to target link) -->
                    <span id="gooeyBlobLeader" class="absolute rounded-full bg-[#153F36] transition-all duration-300 ease-[cubic-bezier(0.2,1,0.3,1)] opacity-0 scale-75 pointer-events-none"></span>
                </div>

                <a href="#latar-belakang" class="nav-spy-link relative z-10 px-7 py-3.5 rounded-full transition-colors duration-200 text-[#536560] font-medium" data-target="latar-belakang">Latar Belakang</a>
                <a href="#manfaat" class="nav-spy-link relative z-10 px-7 py-3.5 rounded-full transition-colors duration-200 text-[#536560] font-medium" data-target="manfaat">Manfaat</a>
                <a href="#statistik" class="nav-spy-link relative z-10 px-7 py-3.5 rounded-full transition-colors duration-200 text-[#536560] font-medium" data-target="statistik">Statistik</a>
            </nav>

            <!-- Actions (Login & Profile) -->

            @if (Auth::check())
                <div class="flex items-center gap-3">
                    <a href="{{ url('/logout') }}" class="inline-flex items-center gap-2 px-4 py-2 text-sm font-semibold text-[#11231F] bg-white hover:bg-[#F2ECE1] border border-[#DDD7CD] hover:border-[#153F36]/40 rounded-full shadow-xs transition-colors duration-200">
                        <i data-lucide="log-out" class="w-4 h-4 text-[#153F36]"></i>
                        <span>Logout</span>
                    </a>
                </div>
            @else
                <div class="flex items-center gap-3">
                    <a href="{{ url('/login') }}" class="inline-flex items-center gap-2 px-4 py-2 text-sm font-semibold text-[#11231F] bg-white hover:bg-[#F2ECE1] border border-[#DDD7CD] hover:border-[#153F36]/40 rounded-full shadow-xs transition-colors duration-200">
                        <i data-lucide="log-in" class="w-4 h-4 text-[#153F36]"></i>
                        <span>Login</span>
                    </a>
                </div>
            @endif
        </div>
    </header>

    <main class="flex-1">
        <!-- Hero Section -->
        <section class="relative pt-10 pb-16 lg:pt-16 lg:pb-24 overflow-hidden">
            <!-- Subtle background ambient glows -->
            <div class="absolute top-10 left-1/2 -translate-x-1/2 w-full max-w-7xl h-96 bg-gradient-to-r from-[#E2EBE5]/50 via-[#F3ECE0]/60 to-[#E8F1EC]/40 blur-3xl -z-10 rounded-full pointer-events-none"></div>

            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="grid lg:grid-cols-12 gap-12 lg:gap-8 items-center">
                    
                    <!-- Left Hero Content -->
                    <div class="lg:col-span-7 flex flex-col items-start">

                        <!-- Main Headline -->
                        <h1 class="text-4xl sm:text-5xl lg:text-6xl font-extrabold text-[#11231F] tracking-tight leading-[1.12]">
                            PagiBagi: Berbagi dari Pagi, Peduli Sesama.
                        </h1>

                        <!-- Subtitle -->
                        <p class="mt-6 text-base sm:text-lg text-[#53625E] leading-relaxed max-w-2xl font-normal">
                            Membiasakan sedekah subuh & infaq pagi di lingkungan sekolah / SMK Wikrama Bogor. Transparan untuk kebaikan bersama.
                        </p>

                        <!-- CTA Action Buttons -->
                        <div class="mt-8 flex flex-wrap items-center gap-4">
                            @if (Auth::check() && Auth::user()->role == 'sekretaris')
                                <a href="{{ route('sekretaris.data-infaq') }}" class="group inline-flex items-center gap-2.5 px-7 py-3.5 rounded-full bg-[#153F36] hover:bg-[#0E2E27] active:scale-[0.99] text-white text-sm font-semibold shadow-md shadow-[#153F36]/20 transition-all duration-200">
                                    <span>Kelola Data</span>
                                    <i data-lucide="arrow-right" class="w-4 h-4 transition-transform duration-200 group-hover:translate-x-1"></i>
                                </a>
                            @elseif (Auth::check() && Auth::user()->role == 'admin')
                                <a href="{{ route('admin.overview') }}" class="group inline-flex items-center gap-2.5 px-7 py-3.5 rounded-full bg-[#153F36] hover:bg-[#0E2E27] active:scale-[0.99] text-white text-sm font-semibold shadow-md shadow-[#153F36]/20 transition-all duration-200">
                                    <span>Kelola Data</span>
                                    <i data-lucide="arrow-right" class="w-4 h-4 transition-transform duration-200 group-hover:translate-x-1"></i>
                                </a>
                            @else
                                <a href="{{ url('/login') }}" class="group inline-flex items-center gap-2.5 px-7 py-3.5 rounded-full bg-[#153F36] hover:bg-[#0E2E27] active:scale-[0.99] text-white text-sm font-semibold shadow-md shadow-[#153F36]/20 transition-all duration-200">
                                    <span>Kelola Data</span>
                                    <i data-lucide="arrow-right" class="w-4 h-4 transition-transform duration-200 group-hover:translate-x-1"></i>
                                </a>
                            @endif

                            <a href="#statistik" class="inline-flex items-center gap-2.5 px-6 py-3.5 rounded-full bg-white hover:bg-[#F6F1E8] text-[#11231F] border border-[#DDD7CD] hover:border-[#153F36]/40 text-sm font-semibold shadow-xs transition-all duration-200">
                                <span>Lihat Rekap Partisipasi</span>
                                <i data-lucide="bar-chart-2" class="w-4 h-4 text-[#153F36]"></i>
                            </a>
                        </div>
                    </div>

                    <!-- Right Hero Card (Image Element with Zoom & Darkening on Hover) -->
                    <div class="lg:col-span-5 relative">
                        <div class="relative mx-auto max-w-md lg:max-w-none rounded-3xl overflow-hidden shadow-xl border border-[#E5DFD4] bg-[#1A3831] aspect-[4/3] sm:aspect-square flex items-center justify-center group cursor-pointer">
                            
                            <!-- Scalable Visual/Illustration Content Container -->
                            <div class="absolute inset-0 w-full h-full bg-gradient-to-b from-[#2B4B43] via-[#1D3B33] to-[#122722] p-2 flex items-center justify-center transition-transform duration-500 ease-out group-hover:scale-105">
                                
                                <!-- Ambient glowing effects inside the card -->
                                <div class="absolute inset-0 bg-[radial-gradient(circle_at_50%_45%,rgba(255,200,80,0.35),transparent_60%)]"></div>
                                <div class="absolute inset-0 bg-[radial-gradient(circle_at_50%_50%,rgba(163,230,53,0.15),transparent_70%)]"></div>

                                <!-- Styled SVG / Illustration of Hands Holding Radiant Crystal Ball of Giving -->
                                <div class="relative z-10 w-full h-full flex flex-col items-center justify-center pb-12">
                                    <!-- Glowing Crystal Orb (Static, elegant, calm) -->
                                    <div class="relative flex items-center justify-center">
                                        <div class="w-40 h-40 sm:w-48 sm:h-48 rounded-full bg-gradient-to-tr from-[#FFAF38] via-[#FFE382] to-[#FFFFFF] shadow-[0_0_80px_25px_rgba(255,190,60,0.35)] flex items-center justify-center">
                                            <div class="w-32 h-32 sm:w-40 sm:h-40 rounded-full bg-gradient-to-b from-white/80 via-amber-100/40 to-transparent backdrop-blur-xs flex items-center justify-center border border-white/60">
                                                <i data-lucide="sparkle" class="w-10 h-10 text-amber-500"></i>
                                            </div>
                                        </div>

                                        <!-- Soft Hands Silhouette holding the orb -->
                                        <svg class="absolute -bottom-8 w-64 h-32 text-emerald-950/70 drop-shadow-md" viewBox="0 0 200 100" fill="currentColor">
                                            <path d="M20,95 C45,70 65,55 90,65 C100,69 110,69 120,65 C145,55 165,70 190,95 C170,105 40,105 20,95 Z" opacity="0.6"/>
                                            <path d="M40,90 C60,65 80,50 100,50 C120,50 140,65 160,90 Z" opacity="0.4"/>
                                        </svg>
                                    </div>

                                    <div class="mt-4 text-center">
                                        <span class="text-xs uppercase tracking-widest text-emerald-200/80 font-bold">Sedekah Pagi & Infaq Subuh</span>
                                    </div>
                                </div>
                            </div>

                            <!-- Subtle Darkening Overlay on Hover -->
                            <div class="absolute inset-0 bg-black/0 group-hover:bg-black/25 transition-colors duration-500 pointer-events-none z-15"></div>

                        </div>
                    </div>

                </div>
            </div>
        </section>

        <!-- Section 2: Latar Belakang & Tujuan Program -->
        <section id="latar-belakang" class="py-16 lg:py-24 bg-white/60 border-y border-[#ECE6DB]/80 scroll-mt-20">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                
                <!-- Section Header -->
                <div class="max-w-3xl">
                    <span class="text-xs font-bold tracking-widest uppercase text-[#687C76]">Latar Belakang & Tujuan Program</span>
                    <h2 class="text-3xl sm:text-4xl font-extrabold text-[#11231F] tracking-tight mt-2.5">
                        Apa Itu Pagi Berbagi ?
                    </h2>
                    <p class="mt-4 text-base sm:text-lg text-[#51645F] leading-relaxed">
                        Pagi Berbagi adalah inisiatif dan gerakan kepedulian sosial untuk membantu rekan-rekan atau siswa SMK Wikrama Bogor yang membutuhkan bantuan ekonomi mendesak, seragam/alat sekolah, uang saku harian, dan bantuan mendesak lainnya. Gerakan yang dilakukan secara rutin setiap pagi di lingkungan SMK Wikrama Bogor.
                    </p>
                </div>

                <!-- 2 Feature Cards Grid -->
                <div class="mt-12 grid md:grid-cols-2 gap-8">
                    
                    <!-- Card 1 -->
                    <div class="bg-white rounded-3xl p-8 border border-[#E8E1D5] hover:border-[#153F36]/30 shadow-xs transition-colors duration-200 flex flex-col justify-between">
                        <div>
                            <div class="w-12 h-12 rounded-2xl bg-[#E8F1EC] text-[#153F36] flex items-center justify-center mb-6">
                                <i data-lucide="graduation-cap" class="w-6 h-6"></i>
                            </div>
                            <h3 class="text-lg font-bold uppercase tracking-wide text-[#11231F]">
                                Bantu Kebutuhan Siswa Membutuhkan
                            </h3>
                            <p class="mt-3.5 text-sm sm:text-base text-[#566863] leading-relaxed">
                                Banyak di antara teman sekolah kita harus berjuang lebih keras untuk biaya transportasi harian, perlengkapan belajar, seragam hingga tanggungan sekolah lainnya. Menghadapi kesulitan ekonomi mendadak untuk kebutuhan pendidikan dan kesehatan.
                            </p>
                        </div>
                        <div class="mt-6 pt-5 border-t border-[#F0EAE0] flex items-center gap-2.5 text-xs sm:text-sm font-semibold text-[#1F5448]">
                            <i data-lucide="check-circle-2" class="w-4 h-4 text-[#153F36] shrink-0"></i>
                            <span>Gerakan ini langsung membantu kebutuhan teman sekelas/sekolah yang sangat membutuhkan</span>
                        </div>
                    </div>

                    <!-- Card 2 -->
                    <div class="bg-white rounded-3xl p-8 border border-[#E8E1D5] hover:border-[#153F36]/30 shadow-xs transition-colors duration-200 flex flex-col justify-between">
                        <div>
                            <div class="w-12 h-12 rounded-2xl bg-[#E8F1EC] text-[#153F36] flex items-center justify-center mb-6">
                                <i data-lucide="heart-handshake" class="w-6 h-6"></i>
                            </div>
                            <h3 class="text-lg font-bold uppercase tracking-wide text-[#11231F]">
                                Kekuatan Gotong Royong Setiap Pagi
                            </h3>
                            <p class="mt-3.5 text-sm sm:text-base text-[#566863] leading-relaxed">
                                Melalui donasi kecil Rp 1.000 hingga Rp 5.000 yang disisihkan sebelum jam pelajaran dimulai, terhimpun dana bermanfaat untuk meringankan beban sesama. Menjadi tabungan bersama yang diikhlaskan untuk menolong sesama rekan di saat darurat.
                            </p>
                        </div>
                        <div class="mt-6 pt-5 border-t border-[#F0EAE0] flex items-center gap-2.5 text-xs sm:text-sm font-semibold text-[#1F5448]">
                            <i data-lucide="check-circle-2" class="w-4 h-4 text-[#153F36] shrink-0"></i>
                            <span>Kontribusi sekecil apa pun sangat berarti bila dilakukan serentak oleh ribuan siswa & siswi sekolah</span>
                        </div>
                    </div>

                </div>
            </div>
        </section>

        <!-- Section 3: Manfaat dan Dampak -->
        <section id="manfaat" class="py-16 lg:py-24 scroll-mt-20">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="grid lg:grid-cols-12 gap-12 lg:gap-16 items-start">
                    
                    <!-- Left Column -->
                    <div class="lg:col-span-5">
                        <span class="text-xs font-bold tracking-widest uppercase text-[#687C76]">Manfaat dan Dampak</span>
                        <h2 class="text-3xl sm:text-4xl font-extrabold text-[#11231F] tracking-tight mt-2.5 leading-snug">
                            Tiga Pilar Kebaikan Setiap Pagi
                        </h2>
                        <p class="mt-5 text-base sm:text-lg text-[#51645F] leading-relaxed">
                            Setiap rupiah yang disisihkan secara konsisten langsung bertransformasi menjadi bantuan riil—menopang kebutuhan di lingkungan pendidikan dan kenyamanan fasilitas ibadah bersama di sekolah.
                        </p>

                    </div>

                    <!-- Right Column (3 Pillar Items) -->
                    <div class="lg:col-span-7 flex flex-col gap-8">
                        
                        <!-- Pillar 1 -->
                        <div class="flex items-start gap-5 p-6 rounded-3xl bg-white border border-[#E9E2D6] hover:border-[#153F36]/30 shadow-2xs transition-colors duration-200">
                            <div class="w-8 h-8 rounded-lg rotate-45 bg-[#153F36] text-white flex items-center justify-center shrink-0 mt-1 shadow-sm">
                                <i data-lucide="utensils" class="w-4 h-4 -rotate-45 text-[#C8DCC4]"></i>
                            </div>
                            <div class="flex-1">
                                <h3 class="text-lg font-bold text-[#11231F]">Nutrisi & Sarapan Pagi Siswa</h3>
                                <p class="mt-2 text-sm sm:text-base text-[#566863] leading-relaxed">
                                    Penyaluran sarapan gratis / makanan bergizi sebelum jam pelajaran dimulai bagi teman kita yang sering datang ke sekolah tanpa sempat sarapan atau menahan lapar seharian akibat ketiadaan uang saku harian. Menjaga fokus belajar dan kondisi fisik rekan-rekan kita.
                                </p>
                            </div>
                        </div>

                        <!-- Pillar 2 -->
                        <div class="flex items-start gap-5 p-6 rounded-3xl bg-white border border-[#E9E2D6] hover:border-[#153F36]/30 shadow-2xs transition-colors duration-200">
                            <div class="w-8 h-8 rounded-lg rotate-45 bg-[#153F36] text-white flex items-center justify-center shrink-0 mt-1 shadow-sm">
                                <i data-lucide="shield-alert" class="w-4 h-4 -rotate-45 text-[#C8DCC4]"></i>
                            </div>
                            <div class="flex-1">
                                <h3 class="text-lg font-bold text-[#11231F]">Bantuan Pendidikan & Tanggap Cepat</h3>
                                <p class="mt-2 text-sm sm:text-base text-[#566863] leading-relaxed">
                                    Dari nominal kecil Rp 1.000 hingga Rp 5.000 yang disisihkan sebelum jam pelajaran dimulai, terhimpun dana bermanfaat untuk meringankan beban sesama siswa yang mengalami musibah mendadak, seperti seragam rusak, kacamata patah, perlengkapan sekolah yang hilang, atau kebutuhan kesehatan mendesak.
                                </p>
                            </div>
                        </div>

                        <!-- Pillar 3 -->
                        <div class="flex items-start gap-5 p-6 rounded-3xl bg-white border border-[#E9E2D6] hover:border-[#153F36]/30 shadow-2xs transition-colors duration-200">
                            <div class="w-8 h-8 rounded-lg rotate-45 bg-[#153F36] text-white flex items-center justify-center shrink-0 mt-1 shadow-sm">
                                <i data-lucide="landmark" class="w-4 h-4 -rotate-45 text-[#C8DCC4]"></i>
                            </div>
                            <div class="flex-1">
                                <h3 class="text-lg font-bold text-[#11231F]">Kemakmuran Masjid & Fasilitas Bersama</h3>
                                <p class="mt-2 text-sm sm:text-base text-[#566863] leading-relaxed">
                                    Menjaga kebersihan dan kenyamanan tempat ibadah sekolah bersama (Masjid Sekolah), merawat sound system, sajadah tempat sujud, serta meremajakan fasilitas bersama demi kenyamanan beribadah ribuan jamaah siswa dan bapak/ibu guru setiap harinya.
                                </p>
                            </div>
                        </div>

                    </div>

                </div>
            </div>
        </section>

        <!-- Section 4: Transparansi & Statistik Real-Time -->
        <section id="statistik" class="py-16 lg:py-24 bg-white/70 border-t border-[#ECE5DA] scroll-mt-20">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                
                <!-- Section Header -->
                <div class="max-w-3xl">
                    <span class="text-xs font-bold tracking-widest uppercase text-[#687C76]">Transparansi & Statistik Real-Time</span>
                    <h2 class="text-3xl sm:text-4xl font-extrabold text-[#11231F] tracking-tight mt-2.5">
                        Rekapitulasi Partisipasi & Pengeluaran Infaq
                    </h2>
                    <p class="mt-3 text-base text-[#51645F]">
                        Informasi transparan mengenai pergerakan dana terkumpul, tingkat partisipasi kelas, dan rekapitulasi penyaluran infaq.
                    </p>
                </div>

                <!-- 2 Metric Cards Grid with Chart.js -->
                <div class="mt-10 grid md:grid-cols-2 gap-8">
                    
                    <!-- Card 1: Total Infaq Dana Terkumpul -->
                    <div class="bg-white rounded-3xl p-6 sm:p-8 border border-[#E8E1D5] hover:border-[#153F36]/30 shadow-xs transition-colors duration-200 flex flex-col justify-between">
                        <div>
                            <div class="flex items-center justify-between">
                                <span class="text-xs font-bold uppercase tracking-wider text-[#697B75]">Total Infaq Dana Terkumpul</span>
                                <span class="inline-flex items-center gap-1 px-2.5 py-0.5 rounded-full text-xs font-bold bg-[#E8F5E9] text-[#1E7E34] border border-[#C8E6C9]">
                                    <i data-lucide="trending-up" class="w-3 h-3"></i>
                                    <span>{{ $statistik['pertumbuhan_infaq'] }}</span>
                                </span>
                            </div>

                            <div class="mt-4">
                                <span class="text-3xl sm:text-4xl font-extrabold text-[#11231F] tracking-tight">
                                    {{ $statistik['total_infaq_formatted'] }}
                                </span>
                            </div>

                            <!-- Area Line Chart Canvas -->
                            <div class="mt-6 h-48 w-full relative">
                                <canvas id="chartInfaqDana"></canvas>
                            </div>
                        </div>

                        <div class="mt-6 pt-4 border-t border-[#F0EAE0] flex items-center gap-2.5 text-xs text-[#5D6F69]">
                            <i data-lucide="building-2" class="w-4 h-4 text-[#153F36] shrink-0"></i>
                            <span>{{ $statistik['info_akumulasi'] }}</span>
                        </div>
                    </div>

                    <!-- Card 2: Persentase Partisipasi Siswa -->
                    <div class="bg-white rounded-3xl p-6 sm:p-8 border border-[#E8E1D5] hover:border-[#153F36]/30 shadow-xs transition-colors duration-200 flex flex-col justify-between">
                        <div>
                            <div class="flex items-center justify-between">
                                <span class="text-xs font-bold uppercase tracking-wider text-[#697B75]">Persentase Partisipasi Siswa Minggu Ini</span>
                                <span class="inline-flex items-center gap-1 px-2.5 py-0.5 rounded-full text-xs font-bold bg-[#E3ECE8] text-[#153F36] border border-[#C6D8D0]">
                                    <span>TARGET {{ number_format($statistik['target_partisipasi'], 0) }}%</span>
                                </span>
                            </div>

                            <div class="mt-4 flex items-baseline gap-3">
                                <span class="text-3xl sm:text-4xl font-extrabold text-[#11231F] tracking-tight">
                                    {{ $statistik['persentase_partisipasi'] }}%
                                </span>
                                <span class="text-xs sm:text-sm font-medium text-[#657872]">
                                    vs {{ $statistik['partisipasi_minggu_lalu'] }}% minggu lalu
                                </span>
                            </div>

                            <!-- Trend Chart Canvas -->
                            <div class="mt-6 h-48 w-full relative">
                                <canvas id="chartPartisipasi"></canvas>
                            </div>
                        </div>

                        <div class="mt-6 pt-4 border-t border-[#F0EAE0] flex items-center gap-2.5 text-xs text-[#5D6F69]">
                            <i data-lucide="check-circle" class="w-4 h-4 text-[#153F36] shrink-0"></i>
                            <span>{{ $statistik['info_partisipasi'] }}</span>
                        </div>
                    </div>

                </div>

                <!-- Table Card: Tabel Pengeluaran & Penyaluran Infaq -->
                <div class="mt-10 bg-white rounded-3xl border border-[#E8E1D5] shadow-sm overflow-hidden">
                    
                    <!-- Table Header Controls (Search & Filter) -->
                    <div class="p-6 sm:p-8 border-b border-[#EAE3D6] flex flex-col md:flex-row md:items-center md:justify-between gap-4">
                        <div>
                            <h3 class="text-xl font-bold text-[#11231F]">Tabel Pengeluaran & Penyaluran Infaq</h3>
                            <p class="text-xs sm:text-sm text-[#5D6F69] mt-1">
                                Bukti dokumentasi pengeluaran dana infaq secara terbuka, transparan, dan akuntabel.
                            </p>
                        </div>

                        <!-- Controls -->
                        <div class="flex items-center gap-3 flex-wrap">
                            <!-- Search Input -->
                            <div class="relative min-w-[240px]">
                                <i data-lucide="search" class="w-4 h-4 text-[#7A8C86] absolute left-3.5 top-1/2 -translate-y-1/2 pointer-events-none"></i>
                                <input
                                    type="text"
                                    id="searchPengeluaran"
                                    placeholder="Cari kegiatan penyaluran infaq..."
                                    class="w-full pl-10 pr-4 py-2 text-xs sm:text-sm rounded-full bg-[#FAF7F2] border border-[#DDD5C8] focus:outline-none focus:border-[#153F36] focus:ring-1 focus:ring-[#153F36] text-[#11231F] placeholder:text-[#84958F] transition-all duration-200"
                                >
                            </div>

                            <!-- Filter Dropdown Button -->
                            <div class="relative">
                                <select id="filterPeriode" class="appearance-none pl-9 pr-8 py-2 text-xs sm:text-sm font-semibold rounded-full bg-[#FAF7F2] border border-[#DDD5C8] text-[#11231F] hover:bg-[#F2ECE1] cursor-pointer focus:outline-none focus:border-[#153F36] transition-colors duration-200">
                                    <option value="all">Semua Periode</option>
                                    <option value="oktober">Oktober 2024</option>
                                    <option value="september">September 2024</option>
                                </select>
                                <i data-lucide="sliders-horizontal" class="w-3.5 h-3.5 text-[#153F36] absolute left-3.5 top-1/2 -translate-y-1/2 pointer-events-none"></i>
                                <i data-lucide="chevron-down" class="w-3.5 h-3.5 text-[#6B7E78] absolute right-3 top-1/2 -translate-y-1/2 pointer-events-none"></i>
                            </div>
                        </div>
                    </div>

                    <!-- Responsive Table -->
                    <div class="overflow-x-auto">
                        <table class="w-full text-left text-sm" id="tablePengeluaran">
                            <thead class="bg-[#FAF7F2] text-[11px] uppercase font-bold tracking-wider text-[#637670] border-b border-[#EAE3D6]">
                                <tr>
                                    <th scope="col" class="py-4 px-6">Nama Kegiatan Penyaluran</th>
                                    <th scope="col" class="py-4 px-6">Nominal</th>
                                    <th scope="col" class="py-4 px-6">Tanggal</th>
                                    <th scope="col" class="py-4 px-6">Deskripsi & Sasaran</th>
                                    <th scope="col" class="py-4 px-6 text-center">Status / Bukti Nota</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-[#EFE8DD] text-[#223631]">
                                @forelse ($pengeluarans as $item)
                                    <tr class="hover:bg-[#F6F1E8]/70 transition-colors duration-150 pengeluaran-row"
                                        data-nama="{{ strtolower($item['nama']) }}"
                                        data-sasaran="{{ strtolower($item['sasaran']) }}"
                                        data-nominal="{{ $item['nominal'] }}"
                                        data-tanggal="{{ $item['tanggal_raw'] }}">
                                        
                                        <!-- Nama Kegiatan -->
                                        <td class="py-4 px-6">
                                            <div class="flex items-center gap-3">
                                                <div class="w-9 h-9 rounded-xl bg-[#E8F1EC] text-[#153F36] flex items-center justify-center shrink-0">
                                                    <i data-lucide="receipt-text" class="w-4 h-4"></i>
                                                </div>
                                                <span class="font-bold text-[#11231F] leading-snug">
                                                    {{ $item['nama'] }}
                                                </span>
                                            </div>
                                        </td>

                                        <!-- Nominal -->
                                        <td class="py-4 px-6 whitespace-nowrap font-bold text-[#11231F]">
                                            {{ $item['nominal_formatted'] }}
                                        </td>

                                        <!-- Tanggal -->
                                        <td class="py-4 px-6 whitespace-nowrap text-[#51645F] font-medium text-xs sm:text-sm">
                                            {{ $item['tanggal'] }}
                                        </td>

                                        <!-- Deskripsi & Sasaran -->
                                        <td class="py-4 px-6 text-xs sm:text-sm text-[#556963] max-w-xs">
                                            {{ $item['sasaran'] }}
                                        </td>

                                        <!-- Action: Lihat Bukti Button -->
                                        <td class="py-4 px-6 text-center whitespace-nowrap">
                                            <button
                                                type="button"
                                                class="btn-lihat-bukti inline-flex items-center gap-1.5 px-3.5 py-1.5 rounded-full text-xs font-semibold bg-[#FAF7F2] hover:bg-[#153F36] text-[#11231F] hover:text-white border border-[#D8D1C4] hover:border-[#153F36] active:scale-95 transition-all duration-200 shadow-2xs"
                                                data-no-nota="{{ $item['no_nota'] }}"
                                                data-nama="{{ $item['nama'] }}"
                                                data-nominal="{{ $item['nominal_formatted'] }}"
                                                data-tanggal="{{ $item['tanggal'] }}"
                                                data-sasaran="{{ $item['sasaran'] }}"
                                                data-penerima="{{ $item['penerima'] }}"
                                                data-penanggung-jawab="{{ $item['penanggung_jawab'] }}"
                                                data-image-url="{{ $item['image_url'] ?? '' }}"
                                            >
                                                <i data-lucide="eye" class="w-3.5 h-3.5"></i>
                                                <span>Lihat / Cek Terbit</span>
                                            </button>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" class="py-12 text-center text-[#6A7C76]">
                                            <div class="flex flex-col items-center justify-center">
                                                <i data-lucide="inbox" class="w-8 h-8 text-[#A0B0AA] mb-2"></i>
                                                <p class="font-medium">Belum ada data pengeluaran terbit.</p>
                                            </div>
                                        </td>
                                    </tr>
                                @endforelse
                                
                                <tr id="noResultsRow" class="hidden">
                                    <td colspan="5" class="py-12 text-center text-[#6A7C76]">
                                        <div class="flex flex-col items-center justify-center">
                                            <i data-lucide="search-x" class="w-8 h-8 text-[#A0B0AA] mb-2"></i>
                                            <p class="font-medium">Tidak ada kegiatan pengeluaran yang sesuai kata kunci pencarian.</p>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <!-- Table Footer Note -->
                    <div class="p-4 sm:px-8 bg-[#FAF7F2] border-t border-[#EAE3D6] text-xs text-[#6A7C76] flex items-center justify-between">
                        <span>Menampilkan rekapitulasi riil & terverifikasi oleh bendahara sekolah.</span>
                    </div>

                </div>

            </div>
        </section>
    </main>

    <!-- Interactive Bukti Nota Modal -->
    <div id="modalBuktiNota" class="fixed inset-0 z-50 hidden flex items-center justify-center p-4 bg-black/60 backdrop-blur-xs transition-opacity duration-200" role="dialog" aria-modal="true">
        <div class="relative w-full max-w-xl bg-white rounded-3xl shadow-2xl border border-[#DDD5C8] overflow-hidden transform transition-all animate-in fade-in zoom-in-95 duration-200">
            
            <!-- Modal Header -->
            <div class="px-6 py-4 bg-[#153F36] text-white flex items-center justify-between">
                <div class="flex items-center gap-2.5">
                    <div class="w-8 h-8 rounded-lg bg-[#27594E] flex items-center justify-center text-[#A3E635]">
                        <i data-lucide="file-check-2" class="w-4 h-4"></i>
                    </div>
                    <div>
                        <h4 class="text-sm font-bold leading-tight">Bukti Digital Penyaluran Infaq</h4>
                        <span class="text-[10px] text-emerald-200 uppercase tracking-widest font-semibold">Tervalidasi & Diaudit Resmi</span>
                    </div>
                </div>
                <button type="button" id="btnTutupModalX" class="w-8 h-8 rounded-full bg-white/10 hover:bg-white/20 text-white flex items-center justify-center transition-colors duration-200">
                    <i data-lucide="x" class="w-4 h-4"></i>
                </button>
            </div>

            <!-- Modal Body (The Digital Nota/Receipt Card) -->
            <div class="p-6 sm:p-8 bg-[#FAF7F2] space-y-6">
                
                <div class="bg-white rounded-2xl p-6 border border-[#E5DFD4] shadow-xs relative overflow-hidden">
                    <!-- Background Watermark -->
                    <div class="absolute -right-4 -bottom-6 w-48 h-48 opacity-[0.08] grayscale pointer-events-none select-none">
                        <img src="{{ asset('images/PagiBagi-logo-mark.png') }}" alt="" class="w-full h-full object-contain">
                    </div>

                    <!-- Receipt Top Bar -->
                    <div class="flex items-start justify-between border-b border-[#F0EAE0] pb-4">
                        <div>
                            <span class="text-xs uppercase font-bold text-[#6D7F79]">Nomor Bukti Nota</span>
                            <p class="font-mono text-sm font-bold text-[#11231F] mt-0.5" id="modalNoNota">PB-EXP-20241018-001</p>
                        </div>
                        <div class="text-right">
                            <span class="text-xs uppercase font-bold text-[#6D7F79]">Tanggal Penyaluran</span>
                            <p class="text-sm font-semibold text-[#11231F] mt-0.5" id="modalTanggal">18 Okt 2024</p>
                        </div>
                    </div>

                    <!-- Nominal Highlight -->
                    <div class="py-5 text-center border-b border-[#F0EAE0]">
                        <span class="text-xs uppercase font-bold tracking-wider text-[#6D7F79]">Nominal Disalurkan</span>
                        <div class="text-3xl font-extrabold text-[#153F36] mt-1" id="modalNominal">Rp 4.250.000</div>
                        <span class="inline-flex items-center gap-1 mt-1 text-[11px] font-semibold text-emerald-700 bg-emerald-50 px-2 py-0.5 rounded-full border border-emerald-200">
                            <i data-lucide="check" class="w-3 h-3"></i> Lunas & Tersalurkan
                        </span>
                    </div>

                    <!-- Details Fields -->
                    <div class="pt-4 space-y-3 text-xs sm:text-sm">
                        <div>
                            <span class="text-xs uppercase font-bold text-[#72857E] block">Peruntukan / Kegiatan:</span>
                            <span class="font-bold text-[#11231F]" id="modalNama">Renovasi Sarana Wudhu Masjid Sekolah</span>
                        </div>
                        <div>
                            <span class="text-xs uppercase font-bold text-[#72857E] block">Deskripsi & Sasaran:</span>
                            <span class="text-[#51645F]" id="modalSasaran">Peremajaan kran wudhu & saluran pembuangan air area masjid sekolah</span>
                        </div>
                        <div class="grid grid-cols-2 gap-4 pt-2">
                            <div>
                                <span class="text-xs uppercase font-bold text-[#72857E] block">Penerima Manfaat:</span>
                                <span class="font-semibold text-[#11231F]" id="modalPenerima">Pengurus DKM Al-Ikhlas TB</span>
                            </div>
                            <div>
                                <span class="text-xs uppercase font-bold text-[#72857E] block">Penanggung Jawab:</span>
                                <span class="font-semibold text-[#11231F]" id="modalPenanggungJawab">Pak Joko Sutrisno (Koord. Sarpras DKM)</span>
                            </div>
                        </div>
                    </div>

                    <!-- Stamp Verification -->
                    <div class="mt-6 pt-4 border-t border-dashed border-[#DDD5C8] flex items-center justify-between">
                        <div class="flex items-center gap-2 text-xs font-semibold text-[#153F36]">
                            <i data-lucide="award" class="w-4 h-4 text-[#A3E635]"></i>
                            <span>Sistem Verifikasi PagiBagi TB</span>
                        </div>
                        <div class="px-2.5 py-1 rounded border border-emerald-600 text-[10px] font-mono font-bold tracking-widest text-emerald-800 uppercase transform -rotate-2 bg-emerald-50/80">
                            VALIDATED & AUDITED
                        </div>
                    </div>
                </div>

            </div>

            <!-- Modal Footer -->
            <div class="px-6 py-4 bg-white border-t border-[#EAE3D6] flex items-center justify-end gap-3">
                <button type="button" id="btnCetakNota" class="inline-flex items-center gap-2 px-4 py-2 text-xs font-semibold text-[#11231F] bg-[#FAF7F2] hover:bg-[#F2ECE1] border border-[#DDD5C8] rounded-full transition-all duration-200">
                    <i data-lucide="printer" class="w-3.5 h-3.5"></i>
                    <span>Cetak Nota</span>
                </button>
                <button type="button" id="btnTutupModal" class="px-5 py-2 text-xs font-semibold text-white bg-[#153F36] hover:bg-[#0E2E27] rounded-full transition-all duration-200 shadow-xs">
                    Tutup
                </button>
            </div>

        </div>
    </div>

    @if (session('error'))
        <!-- Error Notification Modal (Dark Spotlight Overlay) -->
        <div id="errorNotificationModal" class="fixed inset-0 z-50 flex items-center justify-center p-4 bg-black/60 backdrop-blur-xs transition-opacity duration-300" role="alertdialog" aria-modal="true" aria-labelledby="modalErrorTitle">
            <div id="errorModalCard" class="relative w-full max-w-sm bg-white rounded-3xl p-6 sm:p-8 shadow-2xl border border-[#ECE5D9] text-center transform transition-all duration-300 scale-100 animate-in fade-in zoom-in-95">
                
                <!-- SVG Silang Icon (Error / Rejection) -->
                <div class="w-16 h-16 shrink-0 rounded-full bg-[#E8F1EC] border-4 border-[#C6D8D0] text-[#153F36] flex items-center justify-center mx-auto mb-4 shadow-xs" style="width: 64px; height: 64px; min-width: 64px; min-height: 64px;">
                    <svg class="w-8 h-8" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="#153F36" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                        <line x1="18" y1="6" x2="6" y2="18"></line>
                        <line x1="6" y1="6" x2="18" y2="18"></line>
                    </svg>
                </div>

                <!-- Modal Title -->
                <h3 id="modalErrorTitle" class="text-xl font-bold text-[#11231F] tracking-tight">
                    Akses Ditolak
                </h3>

                <!-- Modal Message -->
                <p class="mt-2 text-sm text-[#5D6F69] leading-relaxed">
                    {{ session('error') }}
                </p>

                <!-- Action Button OK -->
                <div class="mt-5">
                    <button 
                        type="button" 
                        id="btnDismissErrorModal"
                        class="w-full py-3.5 sm:py-3 px-3 rounded-full bg-[#FAF7F2] border-2 border-[#153F36] text-[#153F36] hover:bg-[#153F36] hover:text-white hover:shadow-md hover:shadow-[#153F36]/20 active:scale-[0.98] text-sm sm:text-base font-semibold transition-all duration-200 cursor-pointer flex items-center justify-center tracking-wide"
                    >
                        OK
                    </button>
                </div>
            </div>
        </div>

        <script>
            document.addEventListener('DOMContentLoaded', () => {
                const modal = document.getElementById('errorNotificationModal');
                const btnOk = document.getElementById('btnDismissErrorModal');
                const card = document.getElementById('errorModalCard');

                function closeModal() {
                    if (!modal) return;
                    modal.classList.add('opacity-0', 'pointer-events-none');
                    if (card) {
                        card.classList.add('scale-95');
                    }
                    setTimeout(() => {
                        modal.remove();
                    }, 300);
                }

                if (btnOk) {
                    btnOk.addEventListener('click', closeModal);
                }

                if (modal) {
                    modal.addEventListener('click', (e) => {
                        if (e.target === modal) {
                            closeModal();
                        }
                    });
                }

                document.addEventListener('keydown', (e) => {
                    if (e.key === 'Escape') {
                        closeModal();
                    }
                });
            });
        </script>
    @endif

    <!-- Main Footer -->
    <footer class="bg-[#F3EDE2] border-t border-[#E5DFD4] pt-14 pb-8 text-[#536560]">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-12 gap-10 pb-12 border-b border-[#DDD5C8]">
                
                <!-- Left Column: Brand & Mission -->
                <div class="md:col-span-5 flex flex-col items-start">
                    <x-brand-logo 
                        size="sm" 
                        :with-text="true" 
                        tagline="Berbagi Dari Pagi" 
                    />
                    <p class="mt-4 text-xs sm:text-sm text-[#5D6F69] leading-relaxed max-w-sm">
                        Sistem transparansi pencatatan infaq dan pagi berbagi seluruh murid dan guru di lingkungan sekolah SMK Wikrama Bogor.
                    </p>
                    <div class="mt-4 text-xs text-[#70847E]">
                        Jl. Raya Wangun, RT.01/RW.06, Kelurahan Sindangsari, Kecamatan Bogor Timur, Kota Bogor, Jawa Barat 16146.
                    </div>
                </div>

                <!-- Middle Column: Navigasi Links -->
                <div class="md:col-span-3">
                    <h5 class="text-xs font-bold uppercase tracking-wider text-[#11231F] mb-4">Navigasi</h5>
                    <ul class="space-y-2.5 text-xs sm:text-sm">
                        <li><a href="#latar-belakang" class="hover:text-[#153F36] transition-colors duration-200">Latar Belakang</a></li>
                        <li><a href="#manfaat" class="hover:text-[#153F36] transition-colors duration-200">Manfaat</a></li>
                        <li><a href="#statistik" class="hover:text-[#153F36] transition-colors duration-200">Statistik</a></li>
                        <li><a href="{{ url('/login') }}" class="hover:text-[#153F36] transition-colors duration-200 font-semibold">Portal Login Siswa & Guru</a></li>
                    </ul>
                </div>

                <!-- Right Column: Governance & Integrity -->
                <div class="md:col-span-4">
                    <h5 class="text-xs font-bold uppercase tracking-wider text-[#11231F] mb-4">Tata Kelola & Integritas</h5>
                    <p class="text-xs sm:text-sm text-[#5D6F69] leading-relaxed">
                        Penyaluran infaq tepat sasaran, didampingi pihak sekolah demi menjaga akuntabilitas secara menyeluruh.
                    </p>

                    <div class="mt-5 flex items-center gap-3">
                        <div class="w-8 h-8 rounded-lg bg-white border border-[#DDD5C8] flex items-center justify-center text-[#153F36]" title="Keamanan Terjamin">
                            <i data-lucide="shield-check" class="w-4 h-4"></i>
                        </div>
                        <div class="w-8 h-8 rounded-lg bg-white border border-[#DDD5C8] flex items-center justify-center text-[#153F36]" title="Audit Akuntansi">
                            <i data-lucide="file-spreadsheet" class="w-4 h-4"></i>
                        </div>
                        <div class="w-8 h-8 rounded-lg bg-white border border-[#DDD5C8] flex items-center justify-center text-[#153F36]" title="Peduli Sesama">
                            <i data-lucide="heart" class="w-4 h-4"></i>
                        </div>
                        <div class="w-8 h-8 rounded-lg bg-white border border-[#DDD5C8] flex items-center justify-center text-[#153F36]" title="Komunitas Sekolah">
                            <i data-lucide="users" class="w-4 h-4"></i>
                        </div>
                    </div>
                </div>

            </div>

            <!-- Bottom Copyright Bar -->
            <div class="pt-8 flex flex-col sm:flex-row items-center justify-between gap-4 text-xs text-[#70847E]">
                <p>&copy; {{ date('Y') }} PagiBagi: Berbagi Dari Pagi. SMK Wikrama Bogor. Hak Cipta Dilindungi.</p>
                <div class="flex items-center gap-2">
                    <span class="w-2 h-2 rounded-full bg-emerald-600"></span>
                    <span>Transparansi Infaq Pagi Siswa Real & Terbuka Tiap Pekan</span>
                </div>
            </div>
        </div>
    </footer>

    <!-- Client-side Scripts for Chart.js, Search/Filter, & Bukti Nota Modal -->
    @push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // 1. Initialize Chart.js: Chart 1 (Total Infaq Dana Terkumpul)
            const ctxInfaq = document.getElementById('chartInfaqDana');
            if (ctxInfaq && window.Chart) {
                const infaqLabels = @json($statistik['chart_infaq_labels']);
                const infaqData = @json($statistik['chart_infaq_data']);

                new window.Chart(ctxInfaq, {
                    type: 'line',
                    data: {
                        labels: infaqLabels,
                        datasets: [{
                            label: 'Total Dana Terkumpul (Rp)',
                            data: infaqData,
                            borderColor: '#153F36',
                            borderWidth: 3,
                            fill: true,
                            backgroundColor: (context) => {
                                const ctx = context.chart.ctx;
                                const gradient = ctx.createLinearGradient(0, 0, 0, 190);
                                gradient.addColorStop(0, 'rgba(21, 63, 54, 0.28)');
                                gradient.addColorStop(1, 'rgba(21, 63, 54, 0.01)');
                                return gradient;
                            },
                            tension: 0.4,
                            pointBackgroundColor: '#153F36',
                            pointBorderColor: '#ffffff',
                            pointBorderWidth: 2,
                            pointRadius: 4,
                            pointHoverRadius: 6,
                        }]
                    },
                    options: {
                        responsive: true,
                        maintainAspectRatio: false,
                        plugins: {
                            legend: { display: false },
                            tooltip: {
                                callbacks: {
                                    label: function(context) {
                                        return ' Rp ' + context.parsed.y.toLocaleString('id-ID');
                                    }
                                }
                            }
                        },
                        scales: {
                            x: {
                                grid: { display: false },
                                ticks: { font: { size: 11, family: 'Instrument Sans' }, color: '#798E87' }
                            },
                            y: {
                                display: false,
                                beginAtZero: true
                            }
                        }
                    }
                });
            }

            // 2. Initialize Chart.js: Chart 2 (Persentase Partisipasi Siswa)
            const ctxPartisipasi = document.getElementById('chartPartisipasi');
            if (ctxPartisipasi && window.Chart) {
                const partLabels = @json($statistik['chart_partisipasi_labels']);
                const partData = @json($statistik['chart_partisipasi_data']);

                new window.Chart(ctxPartisipasi, {
                    type: 'line',
                    data: {
                        labels: partLabels,
                        datasets: [{
                            label: 'Tingkat Partisipasi (%)',
                            data: partData,
                            borderColor: '#1E6F5C',
                            borderWidth: 3,
                            fill: true,
                            backgroundColor: (context) => {
                                const ctx = context.chart.ctx;
                                const gradient = ctx.createLinearGradient(0, 0, 0, 190);
                                gradient.addColorStop(0, 'rgba(30, 111, 92, 0.20)');
                                gradient.addColorStop(1, 'rgba(30, 111, 92, 0.01)');
                                return gradient;
                            },
                            tension: 0.35,
                            pointBackgroundColor: '#1E6F5C',
                            pointBorderColor: '#ffffff',
                            pointBorderWidth: 2,
                            pointRadius: 4,
                            pointHoverRadius: 6,
                        }]
                    },
                    options: {
                        responsive: true,
                        maintainAspectRatio: false,
                        plugins: {
                            legend: { display: false },
                            tooltip: {
                                callbacks: {
                                    label: function(context) {
                                        return ' ' + context.parsed.y + '% Partisipasi Siswa';
                                    }
                                }
                            }
                        },
                        scales: {
                            x: {
                                grid: { display: false },
                                ticks: { font: { size: 11, family: 'Instrument Sans' }, color: '#798E87' }
                            },
                            y: {
                                min: 50,
                                max: 100,
                                display: false
                            }
                        }
                    }
                });
            }

            // 3. Client-side Search and Period Filter for Tabel Pengeluaran
            const searchInput = document.getElementById('searchPengeluaran');
            const filterPeriode = document.getElementById('filterPeriode');
            const rows = document.querySelectorAll('.pengeluaran-row');
            const noResultsRow = document.getElementById('noResultsRow');

            function applyTableFilter() {
                const searchTerm = (searchInput?.value || '').toLowerCase().trim();
                const selectedPeriode = filterPeriode?.value || 'all';
                let visibleCount = 0;

                rows.forEach(row => {
                    const nama = row.getAttribute('data-nama') || '';
                    const sasaran = row.getAttribute('data-sasaran') || '';
                    const tanggal = row.getAttribute('data-tanggal') || '';

                    const matchesSearch = !searchTerm || nama.includes(searchTerm) || sasaran.includes(searchTerm);
                    let matchesPeriode = true;

                    if (selectedPeriode === 'oktober') {
                        matchesPeriode = tanggal.startsWith('2024-10');
                    } else if (selectedPeriode === 'september') {
                        matchesPeriode = tanggal.startsWith('2024-09');
                    }

                    if (matchesSearch && matchesPeriode) {
                        row.classList.remove('hidden');
                        visibleCount++;
                    } else {
                        row.classList.add('hidden');
                    }
                });

                if (noResultsRow) {
                    if (visibleCount === 0 && rows.length > 0) {
                        noResultsRow.classList.remove('hidden');
                    } else {
                        noResultsRow.classList.add('hidden');
                    }
                }
            }

            searchInput?.addEventListener('input', applyTableFilter);
            filterPeriode?.addEventListener('change', applyTableFilter);

            // 4. Modal Bukti Nota Preview Interaction
            const modal = document.getElementById('modalBuktiNota');
            const btnTutupX = document.getElementById('btnTutupModalX');
            const btnTutup = document.getElementById('btnTutupModal');
            const btnCetak = document.getElementById('btnCetakNota');

            const modalNoNota = document.getElementById('modalNoNota');
            const modalTanggal = document.getElementById('modalTanggal');
            const modalNominal = document.getElementById('modalNominal');
            const modalNama = document.getElementById('modalNama');
            const modalSasaran = document.getElementById('modalSasaran');
            const modalPenerima = document.getElementById('modalPenerima');
            const modalPenanggungJawab = document.getElementById('modalPenanggungJawab');

            function openModal(data) {
                if (modalNoNota) modalNoNota.textContent = data.noNota;
                if (modalTanggal) modalTanggal.textContent = data.tanggal;
                if (modalNominal) modalNominal.textContent = data.nominal;
                if (modalNama) modalNama.textContent = data.nama;
                if (modalSasaran) modalSasaran.textContent = data.sasaran;
                if (modalPenerima) modalPenerima.textContent = data.penerima;
                if (modalPenanggungJawab) modalPenanggungJawab.textContent = data.penanggungJawab;

                modal.classList.remove('hidden');
                document.body.classList.add('overflow-hidden');
            }

            function closeModal() {
                modal.classList.add('hidden');
                document.body.classList.remove('overflow-hidden');
            }

            document.querySelectorAll('.btn-lihat-bukti').forEach(button => {
                button.addEventListener('click', function () {
                    openModal({
                        noNota: this.getAttribute('data-no-nota'),
                        nama: this.getAttribute('data-nama'),
                        nominal: this.getAttribute('data-nominal'),
                        tanggal: this.getAttribute('data-tanggal'),
                        sasaran: this.getAttribute('data-sasaran'),
                        penerima: this.getAttribute('data-penerima'),
                        penanggungJawab: this.getAttribute('data-penanggung-jawab'),
                    });
                });
            });

            btnTutupX?.addEventListener('click', closeModal);
            btnTutup?.addEventListener('click', closeModal);
            btnCetak?.addEventListener('click', () => {
                window.print();
            });

            modal?.addEventListener('click', function (e) {
                if (e.target === modal) {
                    closeModal();
                }
            });

            document.addEventListener('keydown', function (e) {
                if (e.key === 'Escape' && !modal?.classList.contains('hidden')) {
                    closeModal();
                }
            });

            // 5. Sticky Gooey Liquid Scroll Spy & Hover Controller
            const navbarMenu = document.getElementById('navbarMenu');
            const spyLinks = document.querySelectorAll('.nav-spy-link');
            const gooeyLeader = document.getElementById('gooeyBlobLeader');
            const gooeyAnchor = document.getElementById('gooeyBlobAnchor');

            const trackedSections = [
                { id: 'latar-belakang', el: document.getElementById('latar-belakang') },
                { id: 'manfaat', el: document.getElementById('manfaat') },
                { id: 'statistik', el: document.getElementById('statistik') }
            ];

            let activeSectionId = null;

            function moveGooeyPill(targetLink) {
                if (!targetLink || !navbarMenu || !gooeyLeader || !gooeyAnchor) {
                    // Hero section: Fade out and gently shrink gooey liquid pill
                    gooeyLeader.style.opacity = '0';
                    gooeyLeader.style.transform = 'scale(0.75)';
                    gooeyAnchor.style.opacity = '0';
                    gooeyAnchor.style.transform = 'scale(0.75)';

                    spyLinks.forEach(l => {
                        l.style.color = '';
                        l.classList.remove('!text-white', 'text-white', 'font-semibold');
                        l.classList.add('text-[#536560]', 'font-medium');
                    });
                    return;
                }

                const menuRect = navbarMenu.getBoundingClientRect();
                const linkRect = targetLink.getBoundingClientRect();

                const left = linkRect.left - menuRect.left;
                const top = linkRect.top - menuRect.top;
                const width = linkRect.width;
                const height = linkRect.height;

                // Leader moves quickly towards target matching exact dimensions
                gooeyLeader.style.left = `${left}px`;
                gooeyLeader.style.top = `${top}px`;
                gooeyLeader.style.width = `${width}px`;
                gooeyLeader.style.height = `${height}px`;
                gooeyLeader.style.opacity = '1';
                gooeyLeader.style.transform = 'scale(1)';

                // Anchor trails slightly behind, producing the viscous liquid stretch through the SVG filter
                gooeyAnchor.style.left = `${left}px`;
                gooeyAnchor.style.top = `${top}px`;
                gooeyAnchor.style.width = `${width}px`;
                gooeyAnchor.style.height = `${height}px`;
                gooeyAnchor.style.opacity = '1';
                gooeyAnchor.style.transform = 'scale(1)';

                spyLinks.forEach(l => {
                    if (l === targetLink) {
                        l.style.color = '#ffffff';
                        l.classList.add('!text-white', 'font-semibold');
                        l.classList.remove('text-[#536560]', 'font-medium');
                    } else {
                        l.style.color = '';
                        l.classList.remove('!text-white', 'text-white', 'font-semibold');
                        l.classList.add('text-[#536560]', 'font-medium');
                    }
                });
            }

            function updateScrollSpy() {
                const scrollPosition = window.scrollY;
                const navbarOffset = 160;
                let detectedId = null;

                const atBottom = (window.innerHeight + window.scrollY) >= (document.body.offsetHeight - 80);

                if (atBottom) {
                    detectedId = 'statistik';
                } else {
                    trackedSections.forEach(({ id, el }) => {
                        if (el) {
                            const sectionTop = el.offsetTop - navbarOffset;
                            const sectionHeight = el.offsetHeight;
                            if (scrollPosition >= sectionTop && scrollPosition < sectionTop + sectionHeight) {
                                detectedId = id;
                            }
                        }
                    });
                }

                activeSectionId = detectedId;
                const currentActiveLink = activeSectionId ? document.querySelector(`.nav-spy-link[data-target="${activeSectionId}"]`) : null;
                moveGooeyPill(currentActiveLink);
            }

            // Hover interactivity: stretch gooey liquid to hovered link, snap back on mouseleave
            spyLinks.forEach(link => {
                link.addEventListener('mouseenter', () => {
                    moveGooeyPill(link);
                });
            });

            navbarMenu?.addEventListener('mouseleave', () => {
                const currentActiveLink = activeSectionId ? document.querySelector(`.nav-spy-link[data-target="${activeSectionId}"]`) : null;
                moveGooeyPill(currentActiveLink);
            });

            // Reposition on window resize
            window.addEventListener('resize', () => {
                const currentActiveLink = activeSectionId ? document.querySelector(`.nav-spy-link[data-target="${activeSectionId}"]`) : null;
                if (currentActiveLink) {
                    moveGooeyPill(currentActiveLink);
                }
            });

            let ticking = false;
            window.addEventListener('scroll', () => {
                if (!ticking) {
                    window.requestAnimationFrame(() => {
                        updateScrollSpy();
                        ticking = false;
                    });
                    ticking = true;
                }
            }, { passive: true });

            updateScrollSpy();

            // Re-render Lucide icons if available
            if (window.lucide && typeof window.lucide.createIcons === 'function') {
                window.lucide.createIcons();
            }
        });
    </script>
    @endpush
</x-layouts.app>