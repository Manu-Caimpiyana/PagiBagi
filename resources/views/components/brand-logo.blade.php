@props([
    'size' => 'md',
    'withText' => false,
    'tagline' => null,
    'href' => null,
    'containerClass' => '',
])

@php
    $sizeClasses = match ($size) {
        'xs' => 'w-7 h-7',
        'sm' => 'w-9 h-9',
        'lg' => 'w-12 h-12',
        'xl' => 'w-14 h-14',
        default => 'w-10 h-10', // 'md'
    };

    $titleClasses = match ($size) {
        'xs' => 'text-sm font-bold',
        'sm' => 'text-lg font-bold tracking-tight',
        'lg' => 'text-2xl font-extrabold tracking-tight',
        'xl' => 'text-3xl font-extrabold tracking-tight',
        default => 'text-xl font-bold tracking-tight', // 'md'
    };

    $taglineClasses = match ($size) {
        'xs' => 'text-[9px]',
        'sm' => 'text-[10px] uppercase font-semibold tracking-wider text-[#637771] -mt-0.5',
        'lg' => 'text-xs text-[#576863] font-medium',
        'xl' => 'text-sm text-[#576863] font-medium',
        default => 'text-[10px] uppercase font-semibold tracking-wider text-[#576863] -mt-0.5',
    };
@endphp

@if ($href)
    <a href="{{ $href }}" {{ $attributes->merge(['class' => 'inline-flex items-center gap-3 group transition-opacity duration-200 hover:opacity-90']) }}>
@else
    <div {{ $attributes->merge(['class' => 'inline-flex items-center gap-3']) }}>
@endif

    <!-- Logo Mark Container -->
    <div class="{{ $sizeClasses }} bg-transparent flex items-center justify-center shrink-0 transition-transform group-hover:scale-105 duration-200 {{ $containerClass }}">
        <img 
            src="{{ asset('images/PagiBagi-logo-mark.png') }}" 
            alt="PagiBagi Logo" 
            class="w-full h-full object-contain select-none"
            loading="eager"
        >
    </div>

    @if ($withText)
        <div class="flex flex-col leading-tight">
            <span class="{{ $titleClasses }} text-[#11231F] leading-tight">PagiBagi</span>
            @if ($tagline)
                <span class="{{ $taglineClasses }}">{{ $tagline }}</span>
            @endif
        </div>
    @endif

@if ($href)
    </a>
@else
    </div>
@endif
