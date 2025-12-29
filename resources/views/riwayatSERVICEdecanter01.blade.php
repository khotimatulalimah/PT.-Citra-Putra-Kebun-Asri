@extends('dashboard_min')

@section('title', 'Riwayat Service')

@section('content')
<div class="min-h-screen flex flex-col items-center justify-start p-6">
    <!-- Header -->
    <div class="bg-gradient-to-r from-yellow-500 to-orange-500 shadow-md border border-orange-600 py-4 mb-6 w-full max-w-7xl flex items-center justify-between px-6 rounded-lg">
        <a href="{{ url('/dataservice') }}" class="text-xl font-bold text-white hover:text-gray-100 transition">←</a>
        <h2 class="text-2xl font-bold text-white tracking-wide">Riwayat Service</h2>
        <a href="{{ url('/servicedecanter01') }}" class="bg-green-600 text-white px-4 py-2 rounded-md hover:bg-green-700 text-sm shadow transition">Tambah</a>
    </div>

    <!-- Tabel Riwayat Service -->
    <div class="bg-white p-6 rounded-xl shadow-lg w-full max-w-7xl border border-gray-300">
        @if (count($riwayat) > 0)
            <div class="overflow-x-auto">
                <table class="min-w-full text-sm border border-collapse">
                    <thead class="bg-yellow-100 text-orange-800">
                        <tr>
                            <th class="border px-6 py-3 text-left font-semibold">Tanggal</th>
                            <th class="border px-6 py-3 text-left font-semibold">HM Hari Ini</th>
                            <th class="border px-6 py-3 text-left font-semibold">Last Service</th>
                            <th class="border px-6 py-3 text-left font-semibold">Next Service</th>
                            <th class="border px-6 py-3 text-left font-semibold">Nama Petugas</th>
                            <th class="border px-6 py-3 text-left font-semibold">Alat Kerja</th>
                            <th class="border px-6 py-3 text-left font-semibold">Waktu Mulai</th>
                            <th class="border px-6 py-3 text-left font-semibold">Waktu Selesai</th>
                            <th class="border px-6 py-3 text-left font-semibold">Lama Penggantian (menit)</th>
                            <th class="border px-6 py-3 text-center font-semibold">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white">
                        @foreach ($riwayat as $item)
                            <tr class="hover:bg-orange-50 transition duration-150">
                                <td class="border px-6 py-3 text-gray-700">{{ $item->tanggal }}</td>
                                <td class="border px-6 py-3 text-gray-700">{{ $item->hm_hari_ini }}</td>
                                <td class="border px-6 py-3 text-gray-700">{{ $item->last_service }}</td>
                                <td class="border px-6 py-3 text-gray-700">{{ $item->next_service }}</td>
                                <td class="border px-6 py-3 text-gray-700">{{ $item->nama_petugas }}</td>
                                <td class="border px-6 py-3 text-gray-700">{{ $item->alat_kerja }}</td>
                                <td class="border px-6 py-3 text-gray-700">{{ $item->waktu_mulai }}</td>
                                <td class="border px-6 py-3 text-gray-700">{{ $item->waktu_selesai }}</td>
                                <td class="border px-6 py-3 text-gray-700">{{ $item->lama_penggantian }}</td>
                                <td class="border px-6 py-3 text-center">
                                    <div class="flex justify-center gap-2">
                                        <!-- Tombol Edit -->
                                        <a href="{{ route('service.edit', $item->id) }}">
                                            <button type="submit"
                                           class="bg-yellow-400 text-black px-3 py-1 rounded hover:bg-yellow-500 text-xs font-semibold transition">
                                           Edit
                                           </button>
                                        </a>

                                        <!-- Tombol Hapus -->
                                        <form action="{{ route('service.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Yakin hapus data ini?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                    class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600 text-xs font-semibold transition">
                                                Hapus
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @else
            <p class="text-center text-gray-500">Belum ada data service yang ditambahkan.</p>
        @endif
    </div>
</div>
@endsection
