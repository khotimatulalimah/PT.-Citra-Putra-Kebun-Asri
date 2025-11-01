<?php
// Simulasi daftar unit
$units = [
    "Decanter 01",
    "Decanter 02",
    "Separator 01",
    "Separator 02",
    "Separator 03",
    "Genset 02",
    "Turbine 01",
    "Turbine 02",
    "PRESS KAP 20 ( 01 )",
    "PRESS 02",
    "PRESS 03",
    "PRESS 04",
    " PRESS 05",
    " PRESS 06",
    "HYDROCYCLONE 01",
    "RIPPLE MILL 01",
    " RIPPLE MILL 03",
    "EMPTY BUNCH PRESS",
    "ID FAN BOILER"
];


// Pisahkan ke dua kolom: 1–11 dan 12–21
$leftColumn = array_slice($units, 0, 11);
$rightColumn = array_slice($units, 11);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>HM - Daftar Unit</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 font-sans">
    <div class="min-h-screen flex flex-col items-center justify-center p-6">
       <!-- Header -->
<div class="bg-gray-200 py-4 mb-6 w-full max-w-xl flex items-center justify-between px-4 rounded">
    <div class="w-1/6">
        <a href="Dashboard" class="text-xl font-bold text-gray-700 hover:text-black">←</a>
    </div>
    <div class="w-4/6 text-center">
        <h2 class="text-xl font-semibold">Unit Mesin</h2>
    </div>
    <div class="w-1/6"></div>
</div>



        <!-- Daftar Unit -->
        <div class="bg-white p-6 rounded shadow-md w-full max-w-xl">
            <h3 class="text-lg font-semibold mb-4 text-center">Daftar Unit</h3>
            <div class="grid grid-cols-2 gap-x-12 justify-center text-sm">
                <!-- Kolom kiri -->
                <div class="flex flex-col items-end space-y-2">
                    <?php foreach ($leftColumn as $index => $unit): ?>
    <div>
        <?php
        $number = $index + 1;
        if ($unit === "Decanter 01") {
            echo "<a href='RiwayatHM' class='text-blue-600 hover:underline'>{$number}. {$unit}</a>";
        } else {
            echo "{$number}. " . ($unit ?: "");
        }
        ?>
    </div>
<?php endforeach; ?>
                </div>

                <!-- Kolom kanan -->
                <div class="flex flex-col items-start space-y-2">
                    <?php foreach ($rightColumn as $index => $unit): ?>
                        <div><?= ($index + 12) . ". " . ($unit ?: "") ?></div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
