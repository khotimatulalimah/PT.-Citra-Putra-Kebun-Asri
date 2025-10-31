<?php
// Simulasi data riwayat HM
$riwayat = [
    ['tanggal' => 'Senin 27 Oktober 2025', 'hm' => 1500],
    ['tanggal' => 'Senin 20 Oktober 2025', 'hm' => 1500]
];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Unit Mesin HM</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 font-sans">
    <div class="min-h-screen p-6">
        <!-- Header -->
        <div class="bg-gray-200 py-4 mb-6 flex items-center justify-between px-4">
            <a href="HM" class="text-xl font-bold text-gray-700 hover:text-black"> < </a>
            <h2 class="text-xl font-semibold text-center flex-grow -ml-6">HM</h2>
            <a href="Decanter01" class="bg-green-500 text-white px-4 py-2 rounded font-semibold hover:bg-green-600">Tambah</a>

        </div>

        <!-- Tabel Riwayat HM -->
        <div class="bg-white p-6 rounded shadow-md max-w-xl mx-auto">
            <table class="w-full text-sm border">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="border px-4 py-2 text-left">Tanggal</th>
                        <th class="border px-4 py-2 text-left">HM</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($riwayat as $item): ?>
                        <tr class="border-t">
                            <td class="border px-4 py-2"><?= $item['tanggal'] ?></td>
                            <td class="border px-4 py-2"><?= $item['hm'] ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>
