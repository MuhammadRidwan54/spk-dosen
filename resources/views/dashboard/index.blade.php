@extends('layouts.app')

@section('title', 'Dashboard - SPK Dosen')

@section('content')
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <!-- Welcome Card -->
        <div class="bg-white p-8 rounded-lg shadow-md text-center col-span-full md:col-span-3">
            <h1 class="text-3xl font-bold text-gray-800 mb-2">Selamat Datang, {{ $user->name }}</h1>
            <p class="text-gray-600 text-lg">Sistem Pendukung Keputusan Pemilihan Dosen Pembimbing</p>
        </div>

        <!-- Quick Links Section -->
        <div class="bg-white p-8 rounded-lg shadow-md text-center col-span-full md:col-span-3">
            <h3 class="text-2xl font-semibold text-gray-800 mb-6">Quick Actions</h3>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
                <a href="{{ route('dosen.index') }}" class="block w-full py-3 px-4 rounded-md text-white font-semibold transition-all duration-300 hover:scale-105 hover:shadow-lg bg-blue-500 hover:bg-blue-600">
                    Data Dosen
                </a>
                <a href="{{ route('bidang-keahlian.index') }}" class="block w-full py-3 px-4 rounded-md text-white font-semibold transition-all duration-300 hover:scale-105 hover:shadow-lg bg-green-500 hover:bg-green-600">
                    Bidang Keahlian
                </a>
                <a href="{{ route('jabatan-fungsional.index') }}" class="block w-full py-3 px-4 rounded-md text-white font-semibold transition-all duration-300 hover:scale-105 hover:shadow-lg bg-purple-500 hover:bg-purple-600">
                    Jabatan Fungsional
                </a>
                <a href="{{ route('pendidikan-terakhir.index') }}" class="block w-full py-3 px-4 rounded-md text-white font-semibold transition-all duration-300 hover:scale-105 hover:shadow-lg bg-orange-500 hover:bg-orange-600">
                    Pendidikan Terakhir
                </a>
                <a href="{{ route('kuota-bimbingan.index') }}" class="block w-full py-3 px-4 rounded-md text-white font-semibold transition-all duration-300 hover:scale-105 hover:shadow-lg bg-teal-500 hover:bg-teal-600">
                    Kuota Bimbingan
                </a>
                <a href="{{ route('minat.index') }}" class="block w-full py-3 px-4 rounded-md text-white font-semibold transition-all duration-300 hover:scale-105 hover:shadow-lg bg-red-500 hover:bg-red-600">
                    Minat Penelitian
                </a>
            </div>
        </div>
    </div>
@endsection