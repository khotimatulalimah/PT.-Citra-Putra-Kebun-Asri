@extends('dashboard_min')

@section('title', 'Unit Mesin')

@section('content')
@php
    $units = [
        "Decanter 01", "Decanter 02", "Separator 01", "Separator 02", "Separator 03",
        "Genset 02", "Turbine 01", "Turbine 02", "PRESS KAP 20 ( 01 )", "PRESS 02",
        "PRESS 03", "PRESS 04", "PRESS 05", "PRESS 06", "HYDROCYCLONE 01",
        "RIPPLE MILL 01", "RIPPLE MILL 03", "EMPTY BUNCH PRESS", "ID FAN BOILER"
    ];
    $leftColumn = array_slice($units, 0, 10);
    $rightColumn = array_slice($units, 10);
@endphp

<!-- Header -->
<div class="bg-gradient-to-r from-yellow-500 to-orange-500 shadow-md border border-orange-600 py-4 mb-6 w-full max-w-5xl flex items-center justify-between px-6 rounded-lg">
    <a href="{{ url('/dashboard') }}" class="text-xl font-bold text-white hover:text-gray-100 transition">←</a>
    <h2 class="text-2xl font-bold text-white tracking-wide">HM</h2>
    <div class="w-6"></div>
</div>

<!-- Daftar Unit Mesin -->
<div class="bg-white p-8 rounded-xl shadow-lg w-full max-w-5xl border border-gray-300">
    <h2 class="text-2xl font-bold mb-8 text-center text-orange-700 tracking-wide">🛠️ Daftar Unit Mesin</h2>
    <div class="grid grid-cols-2 gap-6 text-sm">
        <!-- Kolom kiri -->
        <div class="flex flex-col space-y-4">
            @foreach ($leftColumn as $index => $unit)
                @php $number = $index + 1; @endphp
                <div class="flex items-center gap-4 bg-yellow-100 hover:bg-orange-100 px-5 py-3 rounded-lg shadow-sm transition duration-200">
                    <div class="w-7 h-7 bg-orange-600 text-white text-xs font-bold flex items-center justify-center rounded-full shadow">{{ $number }}</div>
                    @if (trim($unit) === "Decanter 01")
                        <a href="{{ url('/riwayatHMdecanter01') }}" class="text-orange-700 font-semibold hover:underline transition">{{ $unit }}</a>
                    @else
                        <span class="text-gray-800 font-semibold">{{ $unit }}</span>
                    @endif
                </div>
            @endforeach
        </div>

        <!-- Kolom kanan -->
        <div class="flex flex-col space-y-4">
            @foreach ($rightColumn as $index => $unit)
                <div class="flex items-center gap-4 bg-yellow-100 hover:bg-orange-100 px-5 py-3 rounded-lg shadow-sm transition duration-200">
                    <div class="w-7 h-7 bg-orange-600 text-white text-xs font-bold flex items-center justify-center rounded-full shadow">{{ $index + 11 }}</div>
                    <span class="text-gray-800 font-semibold">{{ $unit }}</span>
                </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
