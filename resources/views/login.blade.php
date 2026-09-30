<x-layouts.app 
    title="Masuk - PagiBagi"
    description="Masuk ke portal sekretaris dan guru PagiBagi untuk pencatatan infaq rombel dan verifikasi penyaluran dana."
    class="bg-[#FAF7F2] text-[#132521] font-sans antialiased selection:bg-[#153F36] selection:text-white min-h-screen flex items-center justify-center relative overflow-x-hidden p-4 sm:p-6 lg:p-8"
>
    <!-- Background Ambient Lighting & Glow Gradients -->
    <div class="fixed inset-0 pointer-events-none -z-10 overflow-hidden" aria-hidden="true">
        <!-- Top-Left Mint Glow -->
        <div class="absolute -top-32 -left-32 w-96 sm:w-[500px] h-96 sm:h-[500px] bg-gradient-to-br from-[#D7E8DC]/80 via-[#E4EFE8]/50 to-transparent rounded-full blur-3xl opacity-80"></div>
        <!-- Center-Right Warm Glow -->
        <div class="absolute top-1/3 -right-24 w-80 sm:w-[450px] h-80 sm:h-[450px] bg-gradient-to-bl from-[#F6E9D6]/80 via-[#FDF5EB]/50 to-transparent rounded-full blur-3xl opacity-75"></div>
        <!-- Bottom-Left Soft Peach/Sage Glow -->
        <div class="absolute -bottom-28 left-1/4 w-80 sm:w-[400px] h-80 sm:h-[400px] bg-[#E9EFE8]/60 rounded-full blur-3xl opacity-60"></div>
    </div>

    <!-- Main Dual-Column Card Container -->
    <div class="w-full max-w-5xl bg-white rounded-[2rem] sm:rounded-[2.5rem] shadow-[0_20px_50px_-12px_rgba(21,63,54,0.08)] border border-[#ECE5D9] overflow-hidden my-auto">
        <div class="grid grid-cols-1 lg:grid-cols-12 min-h-[620px]">
            
            <!-- Left Column: Branding, Context & Feature Highlights (Desktop/Tablet) -->
            <div class="hidden lg:flex lg:col-span-6 bg-[#F5EFE7] p-10 xl:p-12 flex-col justify-between border-r border-[#ECE5D9]/80 relative">
                <div>
                    <!-- Brand Header -->
                    <x-brand-logo 
                        :href="route('home')"
                        size="md" 
                        :with-text="true" 
                        tagline="Infaq & Pagi Berbagi" 
                    />

                    <!-- Hero Slogan -->
                    <h1 class="mt-6 text-3xl xl:text-[34px] font-extrabold text-[#11231F] tracking-tight leading-[1.2]">
                        Satu Langkah Kecil,<br>
                        Dampak Besar.
                    </h1>

                    <!-- Slogan Subtext -->
                    <p class="mt-3.5 text-sm text-[#576963] leading-relaxed max-w-sm">
                        Kelola pencatatan infaq harian per rombel dan rayon dengan transparan dan terukur tanpa repot.
                    </p>

                    <!-- Feature Cards -->
                    <div class="mt-8 space-y-3.5 max-w-md">
                        <!-- Feature 1: Rekap Otomatis -->
                        <div class="bg-white/90 backdrop-blur-xs rounded-2xl p-4 border border-[#ECE5D9] shadow-xs flex items-start gap-3.5 transition-all hover:bg-white">
                            <div class="w-10 h-10 rounded-full bg-[#EBE5DA] text-[#153F36] flex items-center justify-center shrink-0 mt-0.5">
                                <i data-lucide="trending-up" class="w-4 h-4 text-[#153F36]"></i>
                            </div>
                            <div>
                                <h3 class="font-bold text-[#11231F] text-sm">Rekap otomatis tanpa spreadsheet</h3>
                                <p class="text-xs text-[#5D6F69] mt-1 leading-normal">
                                    Penghitungan otomatis saldo masuk, riwayat rombel harian, dan grafik kepatuhan waktu nyata.
                                </p>
                            </div>
                        </div>

                        <!-- Feature 2: Arsip Digital -->
                        <div class="bg-white/90 backdrop-blur-xs rounded-2xl p-4 border border-[#ECE5D9] shadow-xs flex items-start gap-3.5 transition-all hover:bg-white">
                            <div class="w-10 h-10 rounded-full bg-[#EBE5DA] text-[#153F36] flex items-center justify-center shrink-0 mt-0.5">
                                <i data-lucide="receipt" class="w-4 h-4 text-[#153F36]"></i>
                            </div>
                            <div>
                                <h3 class="font-bold text-[#11231F] text-sm">Arsip digital bukti nota penyaluran</h3>
                                <p class="text-xs text-[#5D6F69] mt-1 leading-normal">
                                    Dokumentasi kuitansi dan foto logistik bantuan tersimpan aman dan siap diaudit oleh komite.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Left Footer Note -->
                <div class="mt-10 pt-4 border-t border-[#E8E0D1]/60">
                    <p class="text-[11px] text-[#7E8F89] leading-relaxed">
                        &copy; 2025 PagiBagi Initiative. Inisiatif oleh Manu Caimpiyana Bhimasena.
                    </p>
                </div>
            </div>

            <!-- Right Column: Login Form -->
            <div class="col-span-1 lg:col-span-6 bg-white p-8 sm:p-10 xl:p-14 flex flex-col justify-center">
                
                <!-- Mobile Only Brand Header (shown when left panel is hidden on mobile) -->
                <div class="lg:hidden mb-6 pb-6 border-b border-[#ECE5D9]">
                    <x-brand-logo 
                        :href="route('home')"
                        size="md" 
                        :with-text="true" 
                        tagline="Infaq & Pagi Berbagi" 
                    />
                </div>

                <!-- Form Header -->
                <div>
                    <h2 class="text-2xl sm:text-3xl font-extrabold text-[#11231F] tracking-tight">
                        Selamat Datang
                    </h2>
                    <p class="mt-2 text-sm text-[#5D6F69] leading-relaxed">
                        Masuk untuk mencatat infaq rombel atau verifikasi penyaluran dana.
                    </p>
                </div>

                <!-- Inline Alert Notice (When Login or Validation Fails) -->
                @if (session('error') || $errors->any())
                    <div class="mt-6 p-4 rounded-2xl bg-rose-50/90 border border-rose-200/90 text-rose-800 text-sm flex items-start gap-3 shadow-2xs animate-in fade-in slide-in-from-top-2 duration-200" role="alert">
                        <div class="w-7 h-7 rounded-full bg-rose-100 text-rose-600 flex items-center justify-center shrink-0 mt-0.5">
                            <svg class="w-4 h-4 stroke-[2.5]" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round">
                                <circle cx="12" cy="12" r="10" class="opacity-15" fill="currentColor"></circle>
                                <line x1="15" y1="9" x2="9" y2="15"></line>
                                <line x1="9" y1="9" x2="15" y2="15"></line>
                            </svg>
                        </div>
                        <div class="flex-1">
                            <p class="font-bold text-rose-900 text-xs sm:text-sm">Login failed</p>
                            <p class="text-xs text-rose-700 mt-0.5 leading-relaxed">
                                {{ session('error') ?? $errors->first() }}
                            </p>
                        </div>
                    </div>
                @endif

                <!-- Login Form -->
                <form method="POST" action="{{ route('login.store') }}" class="mt-6 space-y-5">
                    @csrf

                    <!-- Username Field -->
                    <div>
                        <label for="username" class="block text-xs font-semibold text-[#1F332E] mb-2">
                            Username
                        </label>
                        <div class="relative flex items-center">
                            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none text-[#7D8F89]">
                                <i data-lucide="user" class="w-4 h-4"></i>
                            </div>
                            <input 
                                type="text" 
                                id="username" 
                                name="username" 
                                value="{{ old('username') }}"
                                placeholder="Contoh: 1220xxxx"
                                autocomplete="username"
                                required
                                class="w-full bg-[#F7F4EE] hover:bg-[#F9F7F2] focus:bg-white border {{ (session('failed') || session('error') || $errors->has('username')) ? 'border-rose-400 focus:border-rose-500 focus:ring-4 focus:ring-rose-500/10' : 'border-[#E5DFD4] focus:border-[#153F36] focus:ring-4 focus:ring-[#153F36]/10' }} rounded-2xl pl-11 pr-4 py-3.5 text-sm text-[#11231F] placeholder-[#9EAEA8] transition-all outline-hidden shadow-2xs font-normal"
                            >
                        </div>
                    </div>

                    <!-- Password Field -->
                    <div>
                        <label for="password" class="block text-xs font-semibold text-[#1F332E] mb-2">
                            Kata Sandi
                        </label>
                        <div class="relative flex items-center">
                            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none text-[#7D8F89]">
                                <i data-lucide="lock" class="w-4 h-4"></i>
                            </div>
                            <input 
                                type="password" 
                                id="password" 
                                name="password" 
                                placeholder="••••••••"
                                autocomplete="current-password"
                                required
                                class="w-full bg-[#F7F4EE] hover:bg-[#F9F7F2] focus:bg-white border {{ (session('failed') || session('error') || $errors->has('password')) ? 'border-rose-400 focus:border-rose-500 focus:ring-4 focus:ring-rose-500/10' : 'border-[#E5DFD4] focus:border-[#153F36] focus:ring-4 focus:ring-[#153F36]/10' }} rounded-2xl pl-11 pr-12 py-3.5 text-sm text-[#11231F] placeholder-[#9EAEA8] transition-all outline-hidden shadow-2xs font-normal tracking-wider"
                            >
                            <button 
                                type="button" 
                                id="togglePasswordBtn" 
                                class="absolute inset-y-0 right-0 pr-4 flex items-center text-[#7D8F89] hover:text-[#11231F] transition-colors focus:outline-hidden cursor-pointer"
                                aria-label="Tampilkan atau sembunyikan kata sandi"
                                title="Tampilkan sandi"
                            >
                                <i data-lucide="eye" id="togglePasswordIcon" class="w-4 h-4"></i>
                            </button>
                        </div>
                    </div>

                    <!-- Remember Me & Forgot Password Link -->
                    <div class="flex items-center justify-between text-xs pt-1">
                        <label class="inline-flex items-center gap-2.5 cursor-pointer select-none">
                            <input 
                                type="checkbox" 
                                name="remember" 
                                id="remember"
                                class="w-4 h-4 rounded border-[#D4CBBF] text-[#153F36] focus:ring-[#153F36]/30 accent-[#153F36] transition cursor-pointer"
                            >
                            <span class="text-[#556761] font-medium">Ingat saya</span>
                        </label>
                    </div>

                    <!-- Submit Button -->
                    <div class="pt-2">
                        <button 
                            type="submit" 
                            class="w-full group inline-flex items-center justify-center gap-2 px-6 py-3.5 rounded-full bg-[#153F36] hover:bg-[#0E2E27] active:scale-[0.99] text-white text-sm font-semibold shadow-md shadow-[#153F36]/25 hover:shadow-lg hover:shadow-[#153F36]/30 transition-all duration-200 cursor-pointer"
                        >
                            <span>Masuk ke Dashboard</span>
                            <i data-lucide="arrow-right" class="w-4 h-4 transition-transform duration-200 group-hover:translate-x-1"></i>
                        </button>
                    </div>

                    <!-- Back to Home Link -->
                    <div class="text-center pt-2">
                        <a 
                            href="{{ route('home') }}" 
                            class="group inline-flex items-center justify-center gap-2 text-xs font-semibold text-[#5D6F69] hover:text-[#11231F] transition-colors"
                        >
                            <i data-lucide="arrow-left" class="w-3.5 h-3.5 transition-transform duration-200 group-hover:-translate-x-1"></i>
                            <span>Kembali ke Halaman Utama</span>
                        </a>
                    </div>
                </form>

                <!-- Mobile Only Footer Note -->
                <div class="lg:hidden mt-8 pt-4 border-t border-[#ECE5D9] text-center">
                    <p class="text-[11px] text-[#7E8F89]">
                        &copy; 2025 PagiBagi Initiative.
                    </p>
                </div>
            </div>

        </div>
    </div>

    <!-- Toggle Password Script -->
    @push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const togglePasswordBtn = document.getElementById('togglePasswordBtn');
            const passwordInput = document.getElementById('password');
            const togglePasswordIcon = document.getElementById('togglePasswordIcon');

            if (togglePasswordBtn && passwordInput && togglePasswordIcon) {
                togglePasswordBtn.addEventListener('click', () => {
                    const isPassword = passwordInput.getAttribute('type') === 'password';
                    passwordInput.setAttribute('type', isPassword ? 'text' : 'password');
                    
                    // Update lucide icon attribute
                    togglePasswordIcon.setAttribute('data-lucide', isPassword ? 'eye-off' : 'eye');
                    togglePasswordBtn.setAttribute('title', isPassword ? 'Sembunyikan sandi' : 'Tampilkan sandi');
                    
                    // Re-render lucide icon
                    if (window.lucide && typeof window.lucide.createIcons === 'function') {
                        window.lucide.createIcons();
                    }
                });
            }
        });
    </script>
    @endpush
</x-layouts.app>
