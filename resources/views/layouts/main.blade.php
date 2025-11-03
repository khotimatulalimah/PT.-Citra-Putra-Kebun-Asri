<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>@yield('title')</title>
    <script src="https://cdn.tailwindcss.com"></script>

    <script>
        function toggleSubmenu() {
            const submenu = document.getElementById('submenu');
            submenu.classList.toggle('hidden');
        }
    </script>
</head>

<body class="bg-gray-100 font-sans">

<div class="flex h-screen relative">

    <!-- Sidebar -->
    <aside class="w-1/5 bg-gray-200 p-4 relative">
        <h1 class="text-sm text-gray-400 mb-4">Menu</h1>
        <div class="space-y-2">

            <button onclick="toggleSubmenu()" class="w-full bg-white border text-left px-4 py-2 relative">
                Mesin
            </button>

            <div id="submenu" class="bg-gray-100 border rounded shadow-md p-2 space-y-2 hidden">
                <a href="{{ url('/HM') }}" class="w-full block bg-white border text-left px-4 py-2 hover:bg-gray-200">Unit Mesin</a>
                <a href="{{ url('/RiwayatHM') }}" class="w-full block bg-white border text-left px-4 py-2 hover:bg-gray-200">Riwayat Mesin</a>
            </div>

            <a href="{{ url('/Decanter01') }}" class="w-full block bg-white border text-left px-4 py-2 hover:bg-gray-200">Decanter 01</a>

            <a href="{{ url('/logout') }}" class="w-full block bg-white border text-left px-4 py-2 hover:bg-red-400 text-red-700">
                Logout
            </a>

        </div>
    </aside>

    <!-- Main Content -->
    <main class="w-4/5 p-6">
        @yield('content')
    </main>

</div>

</body>
</html>
