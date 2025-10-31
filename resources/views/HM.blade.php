<?php
// Simulasi daftar unit
$units = [
    "Decanter 01",
    "Decanter 02"
];
for ($i = 3; $i <= 21; $i++) {
    $units[] = ""; // Kosongkan label unit 3–21
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>HM - Daftar Unit</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 font-sans">
    <div class="min-h-screen p-6">
        <!-- Header -->
        <div class="bg-gray-200 py-4 mb-6 flex items-center justify-between px-4">
            <!-- Tombol kembali -->
            <a href="{{ url('/RiwayatHM') }}" class="text-xl font-bold text-gray-700 hover:text-black">
            <h2 class="text-xl font-semibold text-center flex-grow -ml-6"><</h2>
        </div>

        <!-- Daftar Unit -->
        <div class="bg-white p-6 rounded shadow-md">
            <h3 class="text-lg font-semibold mb-4 text-center">Daftar Unit</h3>
            <div class="grid grid-cols-2 gap-y-2 px-12 text-sm">
                <?php foreach ($units as $index => $unit): ?>
                    <div><?= ($index + 1) . ". " . ($unit ?: "") ?></div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</body>
</html>
