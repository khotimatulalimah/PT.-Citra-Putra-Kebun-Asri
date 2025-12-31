@extends('dashboard_min')

@section('title', 'Unit Mesin')

@section('content')
@php
    $units = [
        "DECANTER 01", "DECANTER 02", "SEPARATOR 01", "SEPARATOR 02", "SEPARATOR 03",
        "GENSET 02", "TURBINE 01", "TURBINE 02", "PRESS KAP 20 ( 01 )", "PRESS 02",
        "PRESS 03", "PRESS 04", "PRESS 05", "PRESS 06", "HYDROCYCLONE 01",
        "RIPPLE MILL 01", "RIPPLE MILL 03", "EMPTY BUNCH PRESS", "ID FAN BOILER"
    ];
    $leftColumn = array_slice($units, 0, 10);
    $rightColumn = array_slice($units, 10);
@endphp

<!-- Header -->
<div class="bg-gradient-to-r from-yellow-500 to-orange-500 shadow-md border border-orange-600 py-4 mb-6 w-full max-w-5xl flex items-center justify-between px-6 rounded-lg">
    <a href="{{ url('/dashboard') }}" class="text-xl font-bold text-white hover:text-gray-100 transition">←</a>
    <h2 class="text-2xl font-bold text-white tracking-wide">Riwayat Mesin</h2>
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
                    @if (trim($unit) === "DECANTER 01")
                    <a href="{{ url('/riwayatmesindecanter01') }}" class="text-orange-700 font-semibold hover:underline transition">{{ $unit }}</a>
                    @elseif (trim($unit) === "DECANTER 02")
                    <a href="{{ url('/riwayatHMdecanter02') }}" class="text-orange-700 font-semibold hover:underline transition">{{ $unit }}</a>
                    @elseif (trim($unit) === "SEPARATOR 01")
                    <a href="{{ url('/riwayatHMseparator01') }}" class="text-orange-700 font-semibold hover:underline transition">{{ $unit }}</a>
                    @elseif (trim($unit) === "SEPARATOR 02")
                    <a href="{{ url('/riwayatHMseparator02') }}" class="text-orange-700 font-semibold hover:underline transition">{{ $unit }}</a>
                    @elseif (trim($unit) === "SEPARATOR 03")
                    <a href="{{ url('/riwayatHMseparator03') }}" class="text-orange-700 font-semibold hover:underline transition">{{ $unit }}</a>
                    @elseif (trim($unit) === "GENSET 02")
                    <a href="{{ url('/riwayatHMgenset02') }}" class="text-orange-700 font-semibold hover:underline transition">{{ $unit }}</a>
                    @elseif (trim($unit) === "TURBINE 01")
                    <a href="{{ url('/riwayatHMturbine01') }}" class="text-orange-700 font-semibold hover:underline transition">{{ $unit }}</a>
                    @elseif (trim($unit) === "TURBINE 02")
                    <a href="{{ url('/riwayatHMturbine02') }}" class="text-orange-700 font-semibold hover:underline transition">{{ $unit }}</a>
                    @elseif (trim($unit) === "PRESS KAP 20 ( 01 )")
                    <a href="{{ url('/riwayatHMpresskap20_01') }}" class="text-orange-700 font-semibold hover:underline transition">{{ $unit }}</a>
                    @elseif (trim($unit) === "PRESS 02")
                    <a href="{{ url('/riwayatHMpress02') }}" class="text-orange-700 font-semibold hover:underline transition">{{ $unit }}</a>
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
                    @if (trim($unit) === "PRESS 03")
                    <a href="{{ url('/riwayatHMpress03') }}" class="text-orange-700 font-semibold hover:underline transition">{{ $unit }}</a>
                    @elseif (trim($unit) === "PRESS 04")
                    <a href="{{ url('/riwayatHMpress04') }}" class="text-orange-700 font-semibold hover:underline transition">{{ $unit }}</a>
                    @elseif (trim($unit) === "PRESS 05")
                    <a href="{{ url('/riwayatHMpress05') }}" class="text-orange-700 font-semibold hover:underline transition">{{ $unit }}</a>
                    @elseif (trim($unit) === "PRESS 06")
                    <a href="{{ url('/riwayatHMpress06') }}" class="text-orange-700 font-semibold hover:underline transition">{{ $unit }}</a>
                    @elseif (trim($unit) === "HYDROCYCLONE 01")
                    <a href="{{ url('/riwayatHMhydrocyclone01') }}" class="text-orange-700 font-semibold hover:underline transition">{{ $unit }}</a>
                    @elseif (trim($unit) === "RIPPLE MILL 01")
                    <a href="{{ url('/riwayatHMripplemill01') }}" class="text-orange-700 font-semibold hover:underline transition">{{ $unit }}</a>
                    @elseif (trim($unit) === "RIPPLE MILL 03")
                    <a href="{{ url('/riwayatHMripplemill03') }}" class="text-orange-700 font-semibold hover:underline transition">{{ $unit }}</a>
                    @elseif (trim($unit) === "EMPTY BUNCH PRESS")
                    <a href="{{ url('/riwayatHMemptybunchpress') }}" class="text-orange-700 font-semibold hover:underline transition">{{ $unit }}</a>
                    @elseif (trim($unit) === "ID FAN BOILER")
                    <a href="{{ url('/riwayatHMidfanboiler') }}" class="text-orange-700 font-semibold hover:underline transition">{{ $unit }}</a>
                    @else
                    <span class="text-gray-800 font-semibold">{{ $unit }}</span>
                    @endif
                </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
