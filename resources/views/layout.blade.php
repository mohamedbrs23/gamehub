<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>GameHub</title>
  <link href="/css/app.css" rel="stylesheet">
  @vite(['resources/css/app.css', 'resources/js/app.js'])

  <!-- Swiper CSS & JS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
  <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
</head>

<body class="bg-black text-white font-sans">
  {{-- ✅ Header moderne --}}
  <header class="bg-[#0f0f1b] border-b border-gray-800">
    <div class="max-w-7xl mx-auto flex justify-between items-center px-4 py-4">

      {{-- ✅ Logo --}}
      <a href="{{ route('home') }}" class="flex items-center gap-2">
        <img src="{{ asset('log.png') }}" alt="GameHub Logo" width="140">
      </a>

      {{-- ✅ Navigation --}}
      <nav class="flex gap-6 text-sm font-medium items-center">
        <a href="{{ route('home') }}" class="hover:text-purple-400 transition">🏠 Accueil</a>
        <a href="" class="hover:text-purple-400 transition">📬 Contact</a>

        {{-- 🎁 Mode sombre / clair toggle --}}
        <button onclick="document.documentElement.classList.toggle('dark');" class="ml-4 bg-gray-700 hover:bg-gray-600 px-3 py-1 rounded text-xs">
          🌓 Thème
        </button>
      </nav>
    </div>
  </header>

  {{-- ✅ Contenu --}}
  <main class="p-4">
    @yield('content')
  </main>

  {{-- ✅ Footer simple --}}
  <footer class="text-center

