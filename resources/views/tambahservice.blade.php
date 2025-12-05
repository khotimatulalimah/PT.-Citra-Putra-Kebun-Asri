@extends('dashboard_min')

@section('title', 'SERVICE')

@section('content')
<div class="min-h-screen flex flex-col items-center justify-start p-6">
    <!-- Header -->
    <div class="bg-gradient-to-r from-yellow-500 to-orange-500 shadow-md border border-orange-600 py-4 mb-6 w-full max-w-5xl flex items-center justify-between px-6 rounded-lg">
        <a href="{{ url('/dataservice') }}" class="text-xl font-bold text-white hover:text-gray-100 transition">←</a>
        <h2 class="text-2xl font-bold text-white tracking-wide">Data Service</h2>
        <div class="w-6"></div>
    </div>

    <!-- Form Detail Service -->
    <div class="bg-white p-8 rounded-xl shadow-lg w-full max-w-5xl border border-gray-300">
        <form method="POST" action="{{ url('/tambahservice') }}">
            

            @csrf
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mb-6">

                <div>
                    <label class="block text-sm font-medium mb-1 text-gray-700">Nama Unit</label>
                    <input type="text" name="nama_unit" value="{{ old('nama_unit', $data['nama_unit'] ?? '') }}" 
                           class="w-full border px-4 py-2 rounded focus:outline-none focus:ring-2 focus:ring-orange-300" required />
                </div>

                <div>
                    <label class="block text-sm font-medium mb-1 text-gray-700">Tanggal</label>
                    <input type="date" name="tanggal" value="{{ old('tanggal', $data['tanggal'] ?? '') }}" class="w-full border px-4 py-2 rounded focus:outline-none focus:ring-2 focus:ring-orange-300" required />
                </div>

                <div>
                    <label class="block text-sm font-medium mb-1 text-gray-700">HM Waktu Pakai</label>
                    <input type="text" name="hm" value="{{ old('hm', $data['hm'] ?? '') }}" class="w-full border px-4 py-2 rounded focus:outline-none focus:ring-2 focus:ring-orange-300" required />
                </div>

                <div>
                    <label class="block text-sm font-medium mb-1 text-gray-700">Next Service</label>
                    <input type="text" name="next_service" value="{{ old('next_service', $data['next_service'] ?? '') }}" class="w-full border px-4 py-2 rounded focus:outline-none focus:ring-2 focus:ring-orange-300" required />
                </div>

                <div>
                    <label class="block text-sm font-medium mb-1 text-gray-700">Nama Petugas</label>
                    <input type="text" name="nama_petugas" value="{{ old('nama_petugas', $data['nama_petugas'] ?? '') }}" class="w-full border px-4 py-2 rounded focus:outline-none focus:ring-2 focus:ring-orange-300" required />
                </div>

                <div>
                    <label class="block text-sm font-medium mb-1 text-gray-700">Lama Penggantian</label>
                    <input type="text" name="lama_penggantian" value="{{ old('lama_penggantian', $data['lama_penggantian'] ?? '') }}" class="w-full border px-4 py-2 rounded focus:outline-none focus:ring-2 focus:ring-orange-300" required />
                </div>

                <div>
                    <label class="block text-sm font-medium mb-1 text-gray-700">Alat Kerja</label>
                    <input type="text" name="alat_kerja" value="{{ old('alat_kerja', $data['alat_kerja'] ?? '') }}" class="w-full border px-4 py-2 rounded focus:outline-none focus:ring-2 focus:ring-orange-300" required />
                </div>
            </div>

            <div class="flex justify-end gap-4 mt-8">
                <button type="button" class="bg-yellow-400 px-6 py-2 rounded text-black font-semibold hover:bg-yellow-500 transition">Edit</button>
                <button type="submit" class="bg-blue-600 px-6 py-2 rounded text-white font-semibold hover:bg-blue-700 transition">Simpan</button>
            </div>
        </form>
    </div>
</div>
@endsection
