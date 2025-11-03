<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>HM - Decanter 01</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 font-sans">
    <div class="min-h-screen flex flex-col items-center justify-center p-6">
        <!-- Header -->
<div class="bg-gray-200 py-4 mb-6 w-full max-w-xl flex items-center justify-between px-4 rounded">
    <div class="w-1/6">
        <a href="RiwayatHM" class="text-xl font-bold text-gray-700 hover:text-black">←</a>
    </div>
    <div class="w-4/6 text-center">
        <h2 class="text-xl font-semibold">HM</h2>
    </div>
    <div class="w-1/6"></div>
</div>

        <!-- Form Decanter 01 -->
        <div class="bg-white p-6 rounded shadow-md w-full max-w-md">
            <h3 class="text-lg font-semibold mb-4 text-center">Decanter 01</h3>
            <form method="POST" action="{{ url('/Decanter01') }}">
    @csrf


                <div class="mb-4">
                    <label class="block text-sm font-medium mb-1">Tanggal</label>
                    <input type="date" name="tanggal" value="{{ old('tanggal', $data['tanggal'] ?? '') }}" class="w-full border px-4 py-2 rounded" required />
                </div>
                <div class="mb-4">
                    <label class="block text-sm font-medium mb-1">HM</label>
                    <input type="text" name="hm" value="{{ old('hm', $data['hm'] ?? '') }}" class="w-full border px-4 py-2 rounded" required />
                </div>
                <div class="mb-4 flex items-center justify-between">
                    <div class="w-full">
                        <label class="block text-sm font-medium mb-1">Next Service</label>
                        <input type="text" name="next_service" value="{{ old('next_service', $data['next_service'] ?? '') }}" class="w-full border px-4 py-2 rounded" required />
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
