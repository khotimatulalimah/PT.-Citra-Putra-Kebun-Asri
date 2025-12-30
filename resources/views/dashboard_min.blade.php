<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Dashboard')</title>
    <script src="https://cdn.tailwindcss.com"></script>

    <script>
        function toggleSubmenu() {
            const submenu = document.getElementById('submenu');
            submenu.classList.toggle('hidden');
        }
    </script>
</head>

<body class="bg-gray-100 font-sans">

<div class="flex h-screen">

    <!-- Sidebar -->
    <aside class="w-1/5 bg-white border-r p-6 relative">
        <!-- Logo dan Nama Perusahaan -->
        <div class="flex items-center space-x-3 mb-6">
            <img src="https://asset.loker.id/img/2017/07/cpka-logo-150x150.jpg" alt="Logo PT Citra Putra Kebun Asri" class="w-10 h-10 rounded-full">
            <h1 class="text-sm font-semibold text-gray-700 whitespace-nowrap">PT. Citra Putra Kebun Asri</h1>
        </div>

        <!-- Menu Navigasi -->
        <nav class="space-y-4 text-sm">
            <a href="{{ url('/dashboard') }}" class="flex items-center space-x-2 text-green-600 font-semibold hover:text-green-800">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M13 5v6h6" />
                </svg>
                <span>Dashboard</span>
            </a>

            <div>
                <button onclick="toggleSubmenu()" class="flex items-center space-x-2 text-gray-700 hover:text-black w-full text-left font-semibold">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                    </svg>
                    <span>Mesin</span>
                </button>
                <div id="submenu" class="mt-2 space-y-2 hidden ml-6">
                    <a href="{{ url('/hm') }}" class="flex items-center space-x-2 text-gray-600 hover:text-black">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7h18M3 12h18M3 17h18" />
                        </svg>
                        <span>Unit Mesin</span>
                    </a>
                    <a href="{{ url('/dataservice') }}" class="flex items-center space-x-2 text-gray-600 hover:text-black">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17v-6h6v6m2 0a2 2 0 002-2v-6a2 2 0 00-2-2H7a2 2 0 00-2 2v6a2 2 0 002 2h10z" />
                        </svg>
                        <span>Service</span>
                    </a>
                    <a href="riwayatmesin" class="flex items-center space-x-2 text-gray-600 hover:text-black">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                        </svg>
                        <span>Riwayat Mesin</span>
                    </a>
                </div>
            </div>
        </nav>

        <!-- Logout di bawah -->
        <div class="absolute bottom-6 left-6">
            <a href="{{ url('/logout') }}" class="flex items-center space-x-2 text-red-600 hover:text-red-800">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7" />
                </svg>
                <span>Logout</span>
            </a>
        </div>
    </aside>

    <!-- Main Content -->
    <main class="w-4/5 p-8 overflow-y-auto">
        @yield('content')
    </main>

</div>

</body>
</html>
