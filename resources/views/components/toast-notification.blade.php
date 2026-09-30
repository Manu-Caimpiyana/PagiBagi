@if (session('success') || session('failed'))
    <!-- Floating Success Toast Notification -->
    <div 
        id="toastSuccessNotification" 
        class="fixed top-24 right-4 sm:right-6 z-50 flex items-center transition-all duration-300 ease-out translate-x-full opacity-0 pointer-events-auto"
        role="status"
        aria-live="polite"
    >
        <div 
            id="toastSuccessCard" 
            class="relative overflow-hidden bg-white/95 backdrop-blur-md border border-[#C8DBD2] shadow-[0_10px_30px_-5px_rgba(21,63,54,0.15)] rounded-2xl pl-3.5 pr-3 py-3 flex items-center gap-3 max-w-md select-none group"
        >
            <!-- Green Icon Badge -->
            <div class="w-8 h-8 rounded-xl bg-[#E8F1EC] border border-[#C6D8D0] text-[#153F36] flex items-center justify-center shrink-0 shadow-2xs">
                <i data-lucide="check-circle-2" class="w-4 h-4"></i>
            </div>

            <!-- Single Line Message from Controller -->
            <p class="text-sm font-semibold text-[#11231F] pr-1 leading-snug whitespace-nowrap">
                {{ session('success') ?? session('failed') }}
            </p>

            <!-- Close Button (X) -->
            <button 
                type="button" 
                id="btnDismissToastSuccess"
                class="w-7 h-7 rounded-lg text-[#738781] hover:text-[#11231F] hover:bg-[#F2ECE1] transition-colors flex items-center justify-center ml-1 cursor-pointer focus:outline-hidden"
                aria-label="Tutup notifikasi"
                title="Tutup"
            >
                <i data-lucide="x" class="w-3.5 h-3.5"></i>
            </button>

            <!-- Progress Bar Countdown (Auto-dismiss 4s) -->
            <div class="absolute bottom-0 left-0 right-0 h-[3px] bg-[#E3ECE8]">
                <div 
                    id="toastSuccessProgressBar" 
                    class="h-full bg-[#153F36] rounded-full transition-all ease-linear"
                    style="width: 100%;"
                ></div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const toast = document.getElementById('toastSuccessNotification');
            const card = document.getElementById('toastSuccessCard');
            const progressBar = document.getElementById('toastSuccessProgressBar');
            const btnClose = document.getElementById('btnDismissToastSuccess');

            if (!toast || !progressBar) return;

            // Trigger slide-in animation
            requestAnimationFrame(() => {
                toast.classList.remove('translate-x-full', 'opacity-0');
                toast.classList.add('translate-x-0', 'opacity-100');
            });

            // Ensure Lucide renders the icons in this toast
            if (window.lucide && typeof window.lucide.createIcons === 'function') {
                window.lucide.createIcons();
            }

            const totalDuration = 4000; // 4 seconds
            let remainingTime = totalDuration;
            let startTime = Date.now();
            let isPaused = false;
            let animationFrameId = null;

            function updateProgress() {
                if (!isPaused) {
                    const now = Date.now();
                    const elapsed = now - startTime;
                    remainingTime = Math.max(0, remainingTime - elapsed);
                    startTime = now;

                    const percentage = (remainingTime / totalDuration) * 100;
                    progressBar.style.width = percentage + '%';

                    if (remainingTime <= 0) {
                        dismissToast();
                        return;
                    }
                }
                animationFrameId = requestAnimationFrame(updateProgress);
            }

            function dismissToast() {
                if (animationFrameId) {
                    cancelAnimationFrame(animationFrameId);
                }
                toast.classList.remove('translate-x-0', 'opacity-100');
                toast.classList.add('translate-x-full', 'opacity-0');
                setTimeout(() => {
                    toast.remove();
                }, 300);
            }

            // Pause countdown on hover
            card?.addEventListener('mouseenter', () => {
                isPaused = true;
            });

            card?.addEventListener('mouseleave', () => {
                isPaused = false;
                startTime = Date.now();
            });

            btnClose?.addEventListener('click', dismissToast);

            // Start countdown loop
            startTime = Date.now();
            animationFrameId = requestAnimationFrame(updateProgress);
        });
    </script>
@endif
