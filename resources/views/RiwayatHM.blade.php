

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Unit Mesin HM</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 font-sans">
    <div class="min-h-screen flex flex-col items-center justify-center p-6">
        <!-- Header -->
        <div class="bg-gray-200 py-4 mb-6 w-full max-w-xl flex items-center justify-between px-4 rounded">
            <a href="HM" class="text-xl font-bold text-gray-700 hover:text-black">←</a>
            <h2 class="text-xl font-semibold text-center">HM</h2>
            <a href="Decanter01" class="bg-green-600 text-white px-4 py-1 rounded hover:bg-green-700 text-sm">Tambah</a>
        </div>

        <!-- Tabel Riwayat HM -->
        <div class="bg-pink-50 p-6 rounded shadow-md w-full max-w-xl border border-pink-200">
            <?php if (count($riwayat) > 0): ?>
                <table class="w-full text-sm border border-collapse">
                    <thead class="bg-gray-100">
                        <tr>
                            <th class="border px-4 py-2 text-left">Tanggal</th>
                            <th class="border px-4 py-2 text-left">HM</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($riwayat as $item): ?>
                            <tr>
                                <td class="border px-4 py-2"><?= $item['tanggal'] ?></td>
                                <td class="border px-4 py-2"><?= $item['hm'] ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            <?php else: ?>
                <p class="text-center text-gray-500">Belum ada data HM yang ditambahkan.</p>
            <?php endif; ?>
        </div>
    </div>
</body>
</html>
