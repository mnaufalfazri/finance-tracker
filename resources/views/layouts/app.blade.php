<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'Finance Tracker') }} - @yield('title', 'Dashboard')</title>
    @vite('resources/css/app.css') {{-- Jika menggunakan Vite --}}
</head>
<body class="bg-gray-100 text-gray-800 min-h-screen flex flex-col">

    {{-- Navbar --}}
    <header class="bg-white shadow">
        <div class="max-w-7xl mx-auto px-4 py-4 flex justify-between items-center">
            <h1 class="text-xl font-semibold">
                <a href="{{ url('/') }}">{{ config('app.name', 'Finance Tracker') }}</a>
            </h1>
            <nav class="space-x-4">
                <a href="{{ route('transactions.index') }}" class="text-gray-700 hover:text-blue-600">Transaksi</a>
                {{-- Tambahkan link lainnya jika perlu --}}
                @auth
                    <span class="text-gray-500">Halo, {{ Auth::user()->name }}</span>
                    <form action="{{ route('logout') }}" method="POST" class="inline">
                        @csrf
                        <button type="submit" class="text-red-500 hover:underline ml-2">Keluar</button>
                    </form>
                @else
                    <a href="{{ route('login') }}" class="text-blue-600">Masuk</a>
                @endauth
            </nav>
        </div>
    </header>

    {{-- Konten Utama --}}
    <main class="flex-1">
        @yield('content')
    </main>

    {{-- Footer --}}
    <footer class="bg-white text-center py-4 shadow mt-10">
        <p class="text-sm text-gray-500">&copy; {{ date('Y') }} Finance Tracker. All rights reserved.</p>
    </footer>

</body>
</html>
