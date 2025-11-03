@extends('layouts.main')

@section('title', 'Dashboard')

@section('content')

<!-- Header -->
<div class="bg-gray-200 py-4 mb-6">
    <h2 class="text-center text-xl font-semibold">MAINTENANCE CONTROLLING</h2>
</div>

<!-- Status Unit -->
<section class="flex justify-end">
    <div class="flex items-center space-x-6 bg-gray-200 p-4 rounded">

        <div class="flex items-center space-x-2">
            <div class="w-6 h-6 bg-red-500 rounded-full"></div>
            <span class="text-lg font-bold">{{ $status['critical'] }}</span>
        </div>

        <div class="flex items-center space-x-2">
            <div class="w-6 h-6 bg-yellow-400 rounded-full"></div>
            <span class="text-lg font-bold">{{ $status['warning'] }}</span>
        </div>

        <div class="flex items-center space-x-2">
            <div class="w-6 h-6 bg-green-500 rounded-full"></div>
            <span class="text-lg font-bold">{{ $status['normal'] }}</span>
        </div>

    </div>
</section>

@endsection
