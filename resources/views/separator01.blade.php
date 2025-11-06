@extends('dashboard_min')

@section('title', 'Unit Mesin')

@section('content')
<div class="min-h-screen flex flex-col items-center justify-start p-6">
    <!-- Header -->
    <div class="bg-gradient-to-r from-yellow-500 to-orange-500 shadow-md border border-orange-600 py-4 mb-6 w-full max-w-5xl flex items-center justify-between px-6 rounded-lg">
        <a href="{{ url('/riwayatHMseparator01') }}" class="text-xl font-bold text-white hover:text-gray-100 transition">←</a>
        <h2 class="text-2xl font-bold text-white tracking-wide">HM</h2>
        <div class="w-6"></div>
    </div>

    <!-- Form Decanter 01 -->
    <div class="bg-white p-8 rounded-xl shadow-lg w-full max-w-5xl border border-gray-300">
        <h3 class="text-xl font-bold mb-6 text-center text-orange-700">Decanter 02</h3>
        <form method="POST" action="{{ url('/separator01') }}">
            @csrf

            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mb-6">
                <div>
                    <label class="block text-sm font-medium mb-1 text-gray-700">Tanggal</label>
                    <input type="date" name="tanggal" value="{{ old('tanggal', $data['tanggal'] ?? '') }}" class="w-full border px-4 py-2 rounded focus:outline-none focus:ring-2 focus:ring-orange-300" required />
                </div>

                <div>
                    <label class="block text-sm font-medium mb-1 text-gray-700">HM</label>
                    <input type="text" name="hm" value="{{ old('hm', $data['hm'] ?? '') }}" class="w-full border px-4 py-2 rounded focus:outline-none focus:ring-2 focus:ring-orange-300" required />
                </div>
            </div>

            <div class="mb-6">
                <label class="block text-sm font-medium mb-1 text-gray-700">Next Service</label>
                <div class="flex items-center gap-4">
                    <input type="text" name="next_service" value="{{ old('next_service', $data['next_service'] ?? '') }}" class="w-full border px-4 py-2 rounded focus:outline-none focus:ring-2 focus:ring-orange-300" required />
                    <div class="w-5 h-5 bg-green-500 rounded-full"></div>
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
