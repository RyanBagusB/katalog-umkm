<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>@yield('title', 'Karangpoh - UMKM & Properti')</title>
  <link rel="icon" href="{{ asset('images/logo.png') }}" type="image/x-icon">

  <meta name="description" content="@yield('meta_description', 'Temukan informasi UMKM dan properti terbaik di Karangpoh. Dukungan lokal, layanan terpercaya.')">
  <meta name="keywords" content="Karangpoh, UMKM, properti, bisnis lokal, desa digital">
  <meta name="author" content="Karangpoh Team">
  <meta name="robots" content="index, follow">

  <link rel="canonical" href="{{ url()->current() }}">
  <link rel="icon" type="image/png" href="{{ asset('images/logo.png') }}"/>

  <!-- Vite -->
  @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="min-h-[100dvh] flex flex-col bg-white text-[#2C2C2C] antialiased leading-relaxed selection:bg-gray-200">

  {{-- Header --}}
  @include('partials.header')

  {{-- Mobile Navigation --}}
  @include('partials.mobile-nav')

  <main class="flex-1" role="main">
    @yield('content')
  </main>

  {{-- Footer --}}
  @include('partials.footer')

  <script>
    // Toggle mobile nav
    document.getElementById('mobileMenuButton')?.addEventListener('click', () => {
      const menu = document.getElementById('mobileMenu');
      menu.classList.toggle('hidden');
    });
  </script>

</body>
</html>
