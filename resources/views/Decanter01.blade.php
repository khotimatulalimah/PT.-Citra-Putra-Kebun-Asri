@extends('dashboard_min')

@section('title', 'Unit Mesin')

@section('content')
<div class="min-h-screen flex flex-col items-center justify-start p-6">
    <!-- Header -->
    <div class="bg-gradient-to-r from-yellow-500 to-orange-500 shadow-md border border-orange-600 py-4 mb-6 w-full max-w-5xl flex items-center justify-between px-6 rounded-lg">
        <a href="{{ url('/riwayatHMdecanter01') }}" class="text-xl font-bold text-white hover:text-gray-100 transition">←</a>
        <h2 class="text-2xl font-bold text-white tracking-wide">HM</h2>
        <div class="w-6"></div>
    </div>

    <!-- Form Decanter 01 -->
    <div class="bg-white p-8 rounded-xl shadow-lg w-full max-w-5xl border border-gray-300">
        <h3 class="text-xl font-bold mb-2 text-center text-orange-700">Decanter 01</h3>
        <p class="text-center text-sm text-gray-600 mb-6">Paten HM 4000 (paten)</p>

        <form method="POST" action="{{ url('/decanter01') }}">
            @csrf

            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mb-6">
                <div>
                    <label class="block text-sm font-medium mb-1 text-gray-700">Tanggal</label>
                    <input type="date" name="tanggal" 
       value="{{ old('tanggal') }}" 
       class="w-full border px-4 py-2 rounded focus:outline-none focus:ring-2 focus:ring-orange-300" 
       required />

                </div>


                <div>
    <label class="block text-sm font-medium mb-1 text-gray-700">Paten HM</label>
    <input type="number" name="paten_hm" value="{{ $data['paten_hm'] }}" 
           class="w-full border px-4 py-2 rounded bg-gray-100 text-gray-600" readonly />
</div>


                <div>
                    <label class="block text-sm font-medium mb-1 text-gray-700">HM Hari Ini</label>
                    <input type="number" name="hm_hari_ini" id="hm_hari_ini" value="{{ old('hm_hari_ini') }}" class="w-full border px-4 py-2 rounded focus:outline-none focus:ring-2 focus:ring-orange-300" required />
                </div>

                <div>
    <div>
    <label class="block text-sm font-medium mb-1 text-gray-700">Last Service (otomatis)</label>
 <input type="number" name="last_service" id="last_service" 
       value="{{ old('last_service', $data['last_service']) }}" 
       class="w-full border px-4 py-2 rounded bg-gray-100 text-gray-600" readonly />

</div>




                <div>
                    <label class="block text-sm font-medium mb-1 text-gray-700">Next Service (otomatis)</label>
                    <input type="number" name="next_service" id="next_service" value="{{ old('next_service') }}" class="w-full border px-4 py-2 rounded bg-gray-100 focus:outline-none focus:ring-2 focus:ring-orange-300" readonly />
                </div>
            </div>

            <div class="flex justify-end gap-4 mt-8">
                <button type="button" class="bg-yellow-400 px-6 py-2 rounded text-black font-semibold hover:bg-yellow-500 transition">Edit</button>
                <button type="submit" class="bg-blue-600 px-6 py-2 rounded text-white font-semibold hover:bg-blue-700 transition">Simpan</button>
            </div>
        </form>
    </div>
</div>

<!-- Script untuk hitung otomatis -->

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const hmHariIni = document.getElementById('hm_hari_ini');
        const lastService = document.getElementById('last_service');
        const nextService = document.getElementById('next_service');

        function updateNextService() {
            const hm = parseInt(hmHariIni.value) || 0;
            const last = parseInt(lastService.value) || 0;
            const result = last - hm;
            nextService.value = result;

            // Tambahkan peringatan visual jika mendekati batas servis
            if (result < 500) {
                nextService.style.backgroundColor = '#fee2e2'; // merah muda
                nextService.style.color = '#b91c1c'; // merah
                nextService.style.fontWeight = 'bold';
            } else {
                nextService.style.backgroundColor = '#f3f4f6'; // abu default
                nextService.style.color = '#111827'; // abu gelap
                nextService.style.fontWeight = 'normal';
            }
        }

        hmHariIni.addEventListener('input', updateNextService);
    });
</script>




@endsection
