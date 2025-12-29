@extends('dashboard_min')

@section('title', 'Edit Service')

@section('content')
<div class="min-h-screen bg-gray-100 flex flex-col items-center justify-start py-8 px-4">
    <!-- Header -->
    <div class="bg-gradient-to-r from-yellow-500 to-orange-500 shadow-md border border-orange-600 py-4 mb-8 w-full max-w-5xl flex items-center justify-between px-6 rounded-lg">
        <a href="{{ route('servicedecanter01.riwayat') }}" class="text-xl font-bold text-white hover:text-gray-100 transition">←</a>
        <h2 class="text-2xl font-bold text-white tracking-wide">Edit Service</h2>
        <div class="w-6"></div>
    </div>

    <!-- Form Card -->
    <div class="bg-white p-8 rounded-xl shadow-lg w-full max-w-5xl border border-gray-300">
        <h3 class="text-2xl font-bold mb-2 text-center text-orange-700">Decanter 01</h3>
        <p class="text-center text-sm text-gray-600 mb-6">Paten HM 4000 (paten)</p>

        <form method="POST" action="{{ route('service.update', $data->id) }}">
            @csrf
            @method('PUT')

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                <!-- Tanggal -->
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-1">Tanggal</label>
                    <input type="date" name="tanggal" value="{{ $data->tanggal }}"
                           class="w-full border px-4 py-2 rounded-lg focus:outline-none focus:ring-2 focus:ring-orange-300" required />
                </div>

                <!-- Paten HM -->
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-1">Paten HM</label>
                    <input type="number" name="paten_hm" value="4000"
                           class="w-full border px-4 py-2 rounded-lg bg-gray-100 text-gray-600" readonly />
                </div>

                <!-- HM Hari Ini -->
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-1">HM Hari Ini</label>
                    <input type="number" name="hm_hari_ini" id="hm_hari_ini" value="{{ $data->hm_hari_ini }}"
                           class="w-full border px-4 py-2 rounded-lg focus:outline-none focus:ring-2 focus:ring-orange-300" required />
                </div>

                <!-- Last Service -->
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-1">Last Service</label>
                    <input type="number" name="last_service" id="last_service" value="{{ $data->last_service }}"
                           class="w-full border px-4 py-2 rounded-lg focus:outline-none focus:ring-2 focus:ring-orange-300" required />
                </div>

                <!-- Next Service -->
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-1">Next Service</label>
                    <input type="number" name="next_service" id="next_service" value="{{ $data->next_service }}"
                           class="w-full border px-4 py-2 rounded-lg focus:outline-none focus:ring-2 focus:ring-orange-300" required />
                </div>

                <!-- Nama Petugas -->
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-1">Nama Petugas</label>
                    <input type="text" name="nama_petugas" value="{{ $data->nama_petugas }}"
                           class="w-full border px-4 py-2 rounded-lg focus:outline-none focus:ring-2 focus:ring-orange-300" required />
                </div>

                <!-- Alat Kerja -->
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-1">Alat Kerja</label>
                    <input type="text" name="alat_kerja" value="{{ $data->alat_kerja }}"
                           class="w-full border px-4 py-2 rounded-lg focus:outline-none focus:ring-2 focus:ring-orange-300" required />
                </div>

                <!-- Waktu Mulai -->
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-1">Waktu Mulai</label>
                    <input type="time" name="waktu_mulai" id="waktu_mulai" value="{{ $data->waktu_mulai }}"
                           class="w-full border px-4 py-2 rounded-lg focus:outline-none focus:ring-2 focus:ring-orange-300" required />
                </div>

                <!-- Waktu Selesai -->
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-1">Waktu Selesai</label>
                    <input type="time" name="waktu_selesai" id="waktu_selesai" value="{{ $data->waktu_selesai }}"
                           class="w-full border px-4 py-2 rounded-lg focus:outline-none focus:ring-2 focus:ring-orange-300" required />
                </div>

                <!-- Lama Penggantian -->
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-1">Lama Penggantian (menit)</label>
                    <input type="number" name="lama_penggantian" id="lama_penggantian" value="{{ $data->lama_penggantian }}"
                           class="w-full border px-4 py-2 rounded-lg bg-gray-100 text-gray-600" readonly />
                </div>
            </div>

            <div class="flex justify-end gap-4 mt-6">
                <a href="{{ route('servicedecanter01.riwayat') }}" class="bg-gray-300 px-6 py-2 rounded-lg text-black font-semibold hover:bg-gray-400 transition">Batal</a>
                <button type="submit" class="bg-blue-600 px-6 py-2 rounded-lg text-white font-semibold hover:bg-blue-700 transition">Simpan Perubahan</button>
            </div>
        </form>
    </div>
</div>

<!-- Script untuk hitung lama penggantian -->
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const waktuMulai = document.getElementById('waktu_mulai');
        const waktuSelesai = document.getElementById('waktu_selesai');
        const lamaPenggantian = document.getElementById('lama_penggantian');

        function updateLamaPenggantian() {
            if (waktuMulai.value && waktuSelesai.value) {
                const mulai = new Date(`1970-01-01T${waktuMulai.value}:00`);
                const selesai = new Date(`1970-01-01T${waktuSelesai.value}:00`);
                const diffMinutes = Math.round((selesai - mulai) / 60000);
                lamaPenggantian.value = isFinite(diffMinutes) ? diffMinutes : '';
            } else {
                lamaPenggantian.value = '';
            }
        }

        updateLamaPenggantian();
        waktuMulai.addEventListener('change', updateLamaPenggantian);
        waktuSelesai.addEventListener('change', updateLamaPenggantian);
    });
</script>
@endsection
