@props(['title' => null, 'description' => null])
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>{{ $title ?? config('app.name') }}</title>
        @if ($description)
            <meta name="description" content="{{ $description }}">
        @endif
        <link rel="icon" type="image/png" href="{{ asset('images/favicon.png') }}?v=2">
        <link rel="apple-touch-icon" href="{{ asset('images/PagiBagi-logo-mark.png') }}">

        @fonts

        @vite(['resources/css/app.css', 'resources/js/app.js'])

        @stack('styles')
    </head>
    <body {{ $attributes->merge(['class' => 'font-sans antialiased bg-[#FAF7F2] text-[#132521] selection:bg-[#153F36] selection:text-white min-h-screen flex flex-col justify-between']) }}>
        <x-toast-notification />

        {{ $slot }}

        @stack('scripts')
    </body>
</html>
