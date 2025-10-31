<?php
session_start();

// Generate token jika belum ada
if (empty($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}

// Simulasi data awal
$tanggal = "2025-10-27";
$hm = "1500";
$nextService = "1500";

// Tangkap data jika form disubmit
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Validasi token
    if (!isset($_POST['csrf_token']) || $_POST['csrf_token'] !== $_SESSION['csrf_token']) {
        die("CSRF token tidak valid.");
    }

    $tanggal = $_POST['tanggal'];
    $hm = $_POST['hm'];
    $nextService = $_POST['next_service'];

    // Simpan ke session (atau file/database jika mau)
    $_SESSION['riwayat'][] = [
        'tanggal' => $tanggal,
        'hm' => $hm
    ];

    // Hapus token agar tidak bisa reuse
    unset($_SESSION['csrf_token']);

    // Redirect ke halaman RiwayatHM
    header('Location: RiwayatHM.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>HM - Decanter 01</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 font-sans">
    <div class="min-h-screen p-6">
        <!-- Header -->
        <div class="bg-gray-200 py-4 mb-6 flex items-center justify-between px-4">
            <a href="Dashboard.php" class="text-xl font-bold text-gray-700 hover:text-black">←</a>
            <h2 class="text-xl font-semibold text-center flex-grow -ml-6">HM</h2>
        </div>

        <!-- Form Decanter 01 -->
        <div class="bg-white p-6 rounded shadow-md max-w-md mx-auto">
            <h3 class="text-lg font-semibold mb-4 text-center">Decanter 01</h3>
            <form method="post" action="">
                <!-- CSRF Token -->
                <input type="hidden" name="csrf_token" value="<?= $_SESSION['csrf_token'] ?>">

                <div class="mb-4">
                    <label class="block text-sm font-medium mb-1">Tanggal</label>
                    <input type="date" name="tanggal" value="<?= $tanggal ?>" class="w-full border px-4 py-2 rounded" required />
                </div>
                <div class="mb-4">
                    <label class="block text-sm font-medium mb-1">HM</label>
                    <input type="text" name="hm" value="<?= $hm ?>" class="w-full border px-4 py-2 rounded" required />
                </div>
                <div class="mb-4 flex items-center justify-between">
                    <div class="w-full">
                        <label class="block text-sm font-medium mb-1">Next Service</label>
                        <input type="text" name="next_service" value="<?= $nextService ?>" class="w-full border px-4 py-2 rounded" required />
                    </div>
                    <div class="ml-4 mt-6 w-4 h-4 bg-green-500 rounded-full"></div>
                </div>
                <div class="flex justify-between mt-6">
                    <button type="button" class="bg-yellow-400 px-4 py-2 rounded text-black font-semibold">Edit</button>
                    <button type="submit" class="bg-blue-500 px-4 py-2 rounded text-white font-semibold">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
