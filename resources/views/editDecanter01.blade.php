@extends('dashboard_min')

@section('title', 'Edit HM')

@section('content')
<div class="min-h-screen flex flex-col items-center justify-start p-6">
    <!-- Header -->
    <div class="bg-gradient-to-r from-yellow-500 to-orange-500 shadow-md border border-orange-600 py-4 mb-6 w-full max-w-5xl flex items-center justify-between px-6 rounded-lg">
        <a href="{{ url('/riwayatHMdecanter01') }}" class="text-xl font-bold text-white hover:text-gray-100 transition">←</a>
        <h2 class="text-2xl font-bold text-white tracking-wide">Edit HM</h2>
        <div class="w-6"></div>
    </div>

    <!-- Form Edit -->
    <div class="bg-white p-8 rounded-xl shadow-lg w-full max-w-5xl border border-gray-300">
        <form method="POST" action="{{ url('/decanter01/update/' . $data->id) }}">
            @csrf
            @method('PUT')

            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mb-6">
                <!-- Tanggal -->
                <div>
                    <label class="block text-sm font-medium mb-1 text-gray-700">Tanggal</label>
                    <input type="date" name="tanggal"
                           value="{{ $data->tanggal }}"
                           class="w-full border px-4 py-2 rounded focus:outline-none focus:ring-2 focus:ring-orange-300"
                           required />
                </div>

                <!-- Paten HM -->
                <div>
                    <label class="block text-sm font-medium mb-1 text-gray-700">Paten HM</label>
                    <input type="number" name="paten_hm" id="paten_hm"
                           value="{{ $data->paten_hm }}"
                           class="w-full border px-4 py-2 rounded bg-gray-100 text-gray-600" readonly />
                </div>

                <!-- HM Hari Ini -->
                <div>
                    <label class="block text-sm font-medium mb-1 text-gray-700">HM Hari Ini</label>
                    <input type="number" name="hm_hari_ini" id="hm_hari_ini"
                           value="{{ $data->hm_hari_ini }}"
                           class="w-full border px-4 py-2 rounded focus:outline-none focus:ring-2 focus:ring-orange-300"
                           min="0" required />
                </div>

                <!-- Last Service -->
                <div>
                    <label class="block text-sm font-medium mb-1 text-gray-700">Last Service</label>
                    <input type="number" name="last_service" id="last_service"
                           value="{{ $data->last_service }}"
                           class="w-full border px-4 py-2 rounded focus:outline-none focus:ring-2 focus:ring-orange-300"
                           min="0" required />
                </div>

                <!-- Jam Operasional -->
                <div>
                    <label class="block text-sm font-medium mb-1 text-gray-700">Jam Operasional</label>
                    <input type="number" name="jam_operasional" id="jam_operasional"
                           value="{{ $data->jam_operasional }}"
                           class="w-full border px-4 py-2 rounded focus:outline-none focus:ring-2 focus:ring-orange-300"
                           min="0" required />
                </div>

                <!-- Sisa Waktu Service -->
                <div>
                    <label class="block text-sm font-medium mb-1 text-gray-700">Sisa Waktu Service</label>
                    <input type="number" name="sisa_waktu_service" id="sisa_waktu_service"
                           value="{{ $data->sisa_waktu_service }}"
                           class="w-full border px-4 py-2 rounded bg-gray-100 text-gray-600" readonly />
                </div>

                <!-- Next Service -->
                <div>
                    <label class="block text-sm font-medium mb-1 text-gray-700">Next Service</label>
                    <input type="number" name="next_service" id="next_service"
                           value="{{ $data->next_service }}"
                           class="w-full border px-4 py-2 rounded bg-gray-100 text-gray-600" readonly />
                </div>
            </div>

            <div class="flex justify-end gap-4 mt-8">
                <a href="{{ url('/riwayatHMdecanter01') }}" class="bg-gray-300 px-6 py-2 rounded text-black font-semibold hover:bg-gray-400 transition">Batal</a>
                <button type="submit" class="bg-blue-600 px-6 py-2 rounded text-white font-semibold hover:bg-blue-700 transition">Simpan Perubahan</button>
            </div>
        </form>
    </div>
</div>

<!-- Script perhitungan otomatis -->
<script>
document.addEventListener('DOMContentLoaded', function () {
    const patenHM = document.getElementById('paten_hm');
    const hmHariIni = document.getElementById('hm_hari_ini');
    const jamOperasional = document.getElementById('jam_operasional');
    const sisaWaktuService = document.getElementById('sisa_waktu_service');
    const nextService = document.getElementById('next_service');

    function toInt(el) {
        return parseInt(el.value, 10);
    }

    function updateComputedFields() {
        const paten = toInt(patenHM) || 4000;
        const hm = toInt(hmHariIni) || 0;
        const jamOp = toInt(jamOperasional) || 0;

        const sisa = paten - jamOp;
        sisaWaktuService.value = Number.isFinite(sisa) ? sisa : '';
        nextService.value = Number.isFinite(sisa) ? hm + sisa : '';
    }

    updateComputedFields();

    hmHariIni.addEventListener('input', updateComputedFields);
    jamOperasional.addEventListener('input', updateComputedFields);
});
</script>
@endsection
