@extends('dashboard_min')

@section('title', 'Unit Mesin')

@section('content')
<div class="min-h-screen bg-gray-100 flex flex-col items-center justify-start py-8 px-4">
    <!-- Header -->
    <div class="bg-gradient-to-r from-yellow-500 to-orange-500 shadow-md border border-orange-600 py-4 mb-8 w-full max-w-5xl flex items-center justify-between px-6 rounded-lg">
        <a href="{{ url('/riwayatSERVICEdecanter01') }}" class="text-xl font-bold text-white hover:text-gray-100 transition">←</a>
        <h2 class="text-2xl font-bold text-white tracking-wide">Service</h2>
        <div class="w-6"></div>
    </div>

    <!-- Form Card -->
    <div class="bg-white p-8 rounded-xl shadow-lg w-full max-w-5xl border border-gray-300">
        <h3 class="text-2xl font-bold mb-2 text-center text-orange-700">Decanter 01</h3>
        <p class="text-center text-sm text-gray-600 mb-6">Paten HM 4000 (paten)</p>

        <form method="POST" action="{{ url('/servicedecanter01') }}">
            @csrf

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                <!-- Tanggal -->
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-1">Tanggal</label>
                    <input type="date" name="tanggal" value="{{ $data['tanggal'] ?? old('tanggal') }}"
                           class="w-full border px-4 py-2 rounded-lg focus:outline-none focus:ring-2 focus:ring-orange-300" required />
                </div>

                <!-- Paten HM -->
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-1">Paten HM</label>
                    <input type="number" name="paten_hm" value="{{ $data['paten_hm'] ?? 4000 }}"
                           class="w-full border px-4 py-2 rounded-lg bg-gray-100 text-gray-600" readonly />
                </div>

                <!-- HM Hari Ini -->
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-1">HM Hari Ini</label>
                    <input type="number" name="hm_hari_ini" id="hm_hari_ini" value="{{ $data['hm_hari_ini'] ?? old('hm_hari_ini') }}"
                           class="w-full border px-4 py-2 rounded-lg focus:outline-none focus:ring-2 focus:ring-orange-300" required />
                </div>

                <!-- Last Service -->
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-1">Last Service (otomatis)</label>
                    <input type="number" name="last_service" id="last_service" value="{{ $data['last_service'] ?? old('last_service') }}"
                           class="w-full border px-4 py-2 rounded-lg bg-gray-100 text-gray-600" readonly />
                </div>

                <!-- Next Service -->
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-1">Next Service (otomatis)</label>
                    <input type="number" name="next_service" id="next_service" value="{{ $data['next_service'] ?? old('next_service') }}"
                           class="w-full border px-4 py-2 rounded-lg bg-gray-100 text-gray-600" readonly />
                </div>

                <!-- Nama Barang -->
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-1">Nama Barang</label>
                    <input type="text" name="nama_barang" value="{{ $data['nama_barang'] ?? old('nama_barang') }}"
                           class="w-full border px-4 py-2 rounded-lg focus:outline-none focus:ring-2 focus:ring-orange-300" required />
                </div>

                <!-- Jumlah Barang -->
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-1">Jumlah Barang</label>
                    <input type="number" name="jumlah_barang" value="{{ $data['jumlah_barang'] ?? old('jumlah_barang') }}"
                           class="w-full border px-4 py-2 rounded-lg focus:outline-none focus:ring-2 focus:ring-orange-300" required />
                </div>

                <!-- Harga -->
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-1">Harga</label>
                    <input type="number" name="harga" value="{{ $data['harga'] ?? old('harga') }}"
                           class="w-full border px-4 py-2 rounded-lg focus:outline-none focus:ring-2 focus:ring-orange-300" required />
                </div>

                <!-- Nama Petugas -->
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-1">Nama Petugas</label>
                    <input type="text" name="nama_petugas" value="{{ $data['nama_petugas'] ?? old('nama_petugas') }}"
                           class="w-full border px-4 py-2 rounded-lg focus:outline-none focus:ring-2 focus:ring-orange-300" required />
                </div>

                <!-- Alat Kerja -->
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-1">Alat Kerja</label>
                    <input type="text" name="alat_kerja" value="{{ $data['alat_kerja'] ?? old('alat_kerja') }}"
                           class="w-full border px-4 py-2 rounded-lg focus:outline-none focus:ring-2 focus:ring-orange-300" required />
                </div>

                <!-- Waktu Mulai -->
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-1">Waktu Mulai</label>
                    <input type="time" name="waktu_mulai" id="waktu_mulai" value="{{ $data['waktu_mulai'] ?? old('waktu_mulai') }}"
                           class="w-full border px-4 py-2 rounded-lg focus:outline-none focus:ring-2 focus:ring-orange-300" required />
                </div>

                <!-- Waktu Selesai -->
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-1">Waktu Selesai</label>
                    <input type="time" name="waktu_selesai" id="waktu_selesai" value="{{ $data['waktu_selesai'] ?? old('waktu_selesai') }}"
                           class="w-full border px-4 py-2 rounded-lg focus:outline-none focus:ring-2 focus:ring-orange-300" required />
                </div>

                <!-- Lama Penggantian -->
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-1">Lama Penggantian (menit)</label>
                    <input type="number" name="lama_penggantian" id="lama_penggantian" value="{{ $data['lama_penggantian'] ?? old('lama_penggantian') }}"
                           class="w-full border px-4 py-2 rounded-lg bg-gray-100 text-gray-600" readonly />
                </div>
            </div>

            <div class="flex justify-end gap-4 mt-6">
                <button type="button" class="bg-yellow-400 px-6 py-2 rounded-lg text-black font-semibold hover:bg-yellow-500 transition">Edit</button>
                <button type="submit" class="bg-blue-600 px-6 py-2 rounded-lg text-white font-semibold hover:bg-blue-700 transition">Simpan</button>
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
        const waktuMulai = document.getElementById('waktu_mulai');
        const waktuSelesai = document.getElementById('waktu_selesai');
        const lamaPenggantian = document.getElementById('lama_penggantian');

        function updateNextService() {
            const hm = parseInt(hmHariIni.value) || 0;
            const last = parseInt(lastService.value) || 0;
            const result = last - hm;
            nextService.value = isFinite(result) ? result : '';

            if (!isNaN(result)) {
                if (result < 500) {
                    nextService.style.backgroundColor = '#fee2e2';
                    nextService.style.color = '#b91c1c';
                    nextService.style.fontWeight = 'bold';
                } else {
                    nextService.style.backgroundColor = '#f3f4f6';
                    nextService.style.color = '#111827';
                    nextService.style.fontWeight = 'normal';
                }
            } else {
                nextService.style.backgroundColor = '#f3f4f6';
                nextService.style.color = '#111827';
                nextService.style.fontWeight = 'normal';
            }
        }

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

        // Inisialisasi saat halaman pertama kali dimuat
        updateNextService();
        updateLamaPenggantian();

        // Event listener untuk input dinamis
        hmHariIni.addEventListener('input', updateNextService);
        waktuMulai.addEventListener('change', updateLamaPenggantian);
        waktuSelesai.addEventListener('change', updateLamaPenggantian);
    });
</script>
@endsection
