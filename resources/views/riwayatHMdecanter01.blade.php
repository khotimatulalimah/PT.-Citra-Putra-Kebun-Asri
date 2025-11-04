@extends('dashboard_min')

@section('title', 'Riwayat HM')

@section('content')
<div class="min-h-screen flex flex-col items-center justify-start p-6">
    <!-- Header -->
    <div class="bg-gradient-to-r from-yellow-500 to-orange-500 shadow-md border border-orange-600 py-4 mb-6 w-full max-w-5xl flex items-center justify-between px-6 rounded-lg">
        <a href="{{ url('/hm') }}" class="text-xl font-bold text-white hover:text-gray-100 transition">←</a>
        <h2 class="text-2xl font-bold text-white tracking-wide">Riwayat HM</h2>
        <a href="{{ url('/decanter01') }}" class="bg-green-600 text-white px-4 py-2 rounded-md hover:bg-green-700 text-sm shadow transition">Tambah</a>
    </div>

    <!-- Tabel Riwayat HM -->
    <div class="bg-white p-6 rounded-xl shadow-lg w-full max-w-5xl border border-gray-300">
        @if (count($riwayat) > 0)
            <div class="overflow-x-auto">
                <table class="min-w-full text-sm border border-collapse">
                    <thead class="bg-yellow-100 text-orange-800">
                        <tr>
                            <th class="border px-6 py-3 text-left font-semibold">Tanggal</th>
                            <th class="border px-6 py-3 text-left font-semibold">HM</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white">
                        @foreach ($riwayat as $item)
                            <tr class="hover:bg-orange-50 transition duration-150">
                                <td class="border px-6 py-3 text-gray-700">{{ $item['tanggal'] }}</td>
                                <td class="border px-6 py-3 text-gray-700">{{ $item['hm'] }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @else
            <p class="text-center text-gray-500">Belum ada data HM yang ditambahkan.</p>
        @endif
    </div>
</div>
@endsection
