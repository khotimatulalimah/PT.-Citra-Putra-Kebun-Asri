<?php
$status = [
    'critical' => 3,
    'warning' => 1,
    'normal' => 2
];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Maintenance Controlling</title>
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
            <h1 class="text-sm text-gray-400 mb-4">Dashboard</h1>
            <div class="space-y-2">
                <button onclick="toggleSubmenu()" class="w-full bg-white border text-left px-4 py-2 relative">Unit Mesin</button>

                <!-- Submenu ke kanan -->
                <div id="submenu" class="absolute top-16 left-[170px] bg-gray-100 border rounded shadow-md p-2 space-y-2 hidden z-10">
                    <a href="{{ url('/HM') }}" class="w-full block bg-white border text-left px-4 py-2 hover:bg-gray-200">HM</a>
                    <button class="w-full bg-white border text-left px-4 py-2">Service</button>
                    <button class="w-full bg-white border text-left px-4 py-2">Riwayat Mesin</button>
                </div>

                <button class="w-full bg-white border text-left px-4 py-2">Untitled 1</button>
                <button class="w-full bg-white border text-left px-4 py-2">Untitled 2</button>
            </div>
        </aside>

        <!-- Main Content -->
        <main class="w-4/5 p-6">
            <!-- Header -->
            <div class="bg-gray-200 py-4 mb-6">
                <h2 class="text-center text-xl font-semibold">MAINTANCE CONTROLLING</h2>
            </div>

            <!-- Status Unit -->
            <section class="flex justify-end">
                <div class="flex items-center space-x-6 bg-gray-200 p-4 rounded">
                    <div class="flex items-center space-x-2">
                        <div class="w-6 h-6 bg-red-500 rounded-full"></div>
                        <span class="text-lg font-bold"><?= $status['critical'] ?></span>
                    </div>
                    <div class="flex items-center space-x-2">
                        <div class="w-6 h-6 bg-yellow-400 rounded-full"></div>
                        <span class="text-lg font-bold"><?= $status['warning'] ?></span>
                    </div>
                    <div class="flex items-center space-x-2">
                        <div class="w-6 h-6 bg-green-500 rounded-full"></div>
                        <span class="text-lg font-bold"><?= $status['normal'] ?></span>
                    </div>
                </div>
            </section>
        </main>
    </div>
</body>
</html>
