@extends('layouts.app')

@section('title', 'Dashboard - SPK Dosen')

@section('content')
<div class="space-y-6">
    <!-- Welcome Card -->
    <div class="bg-gradient-to-r from-blue-500 to-indigo-600 p-8 rounded-xl shadow-lg text-white">
        <div class="flex flex-col md:flex-row md:items-center md:justify-between">
            <div>
                <h1 class="text-3xl font-bold mb-2">Selamat Datang, {{ $user->name }}</h1>
                <p class="text-blue-100 text-lg">Sistem Pendukung Keputusan Pemilihan Dosen Pembimbing</p>
            </div>
            <div class="mt-4 md:mt-0">
                <div class="bg-white/10 backdrop-blur-sm p-4 rounded-lg inline-block">
                    <p class="text-sm font-medium">Hari ini: {{ now()->translatedFormat('l, d F Y') }}</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Statistics Cards -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
        <!-- Dosen Card -->
        <div class="bg-white p-6 rounded-xl shadow-md border-l-4 border-blue-500">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-gray-500 text-sm font-medium">Total Dosen</p>
                    <h3 class="text-2xl font-bold text-gray-800">{{ $totalDosen ?? 0 }}</h3>
                </div>
                <div class="bg-blue-100 p-3 rounded-full">
                    <i class="fas fa-chalkboard-teacher text-blue-500 text-xl"></i>
                </div>
            </div>
            <a href="{{ route('dosen.index') }}" class="mt-4 inline-block text-sm font-medium text-blue-500 hover:text-blue-700">
                Lihat detail →
            </a>
        </div>

        <!-- Bidang Keahlian Card -->
        <div class="bg-white p-6 rounded-xl shadow-md border-l-4 border-green-500">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-gray-500 text-sm font-medium">Bidang Keahlian</p>
                    <h3 class="text-2xl font-bold text-gray-800">{{ $totalBidangKeahlian ?? 0 }}</h3>
                </div>
                <div class="bg-green-100 p-3 rounded-full">
                    <i class="fas fa-atom text-green-500 text-xl"></i>
                </div>
            </div>
            <a href="{{ route('bidang-keahlian.index') }}" class="mt-4 inline-block text-sm font-medium text-green-500 hover:text-green-700">
                Lihat detail →
            </a>
        </div>

        <!-- Minat Penelitian Card -->
        <div class="bg-white p-6 rounded-xl shadow-md border-l-4 border-red-500">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-gray-500 text-sm font-medium">Minat Penelitian</p>
                    <h3 class="text-2xl font-bold text-gray-800">{{ $totalMinatPenelitian ?? 0 }}</h3>
                </div>
                <div class="bg-red-100 p-3 rounded-full">
                    <i class="fas fa-flask text-red-500 text-xl"></i>
                </div>
            </div>
            <a href="{{ route('minat.index') }}" class="mt-4 inline-block text-sm font-medium text-red-500 hover:text-red-700">
                Lihat detail →
            </a>
        </div>

        <!-- Kuota Bimbingan Card -->
        <div class="bg-white p-6 rounded-xl shadow-md border-l-4 border-teal-500">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-gray-500 text-sm font-medium">Kuota Bimbingan</p>
                    <h3 class="text-2xl font-bold text-gray-800">{{ $totalKuotaBimbingan ?? 0 }}</h3>
                </div>
                <div class="bg-teal-100 p-3 rounded-full">
                    <i class="fas fa-users text-teal-500 text-xl"></i>
                </div>
            </div>
            <a href="{{ route('kuota-bimbingan.index') }}" class="mt-4 inline-block text-sm font-medium text-teal-500 hover:text-teal-700">
                Lihat detail →
            </a>
        </div>
    </div>

    <!-- Quick Actions Section -->
    <div class="bg-white p-8 rounded-xl shadow-md">
        <h3 class="text-2xl font-semibold text-gray-800 mb-6">Menu Cepat</h3>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
            <!-- Data Dosen -->
            <a href="{{ route('dosen.index') }}" class="group flex items-center p-4 rounded-lg transition-all duration-300 hover:shadow-lg hover:bg-blue-50 hover:border-blue-200 border border-transparent">
                <div class="bg-blue-100 p-3 rounded-full mr-4 group-hover:bg-blue-200 transition-colors duration-300">
                    <i class="fas fa-chalkboard-teacher text-blue-500 text-xl"></i>
                </div>
                <div>
                    <h4 class="font-semibold text-gray-800">Data Dosen</h4>
                    <p class="text-sm text-gray-500">Kelola data dosen</p>
                </div>
            </a>

            <!-- Bidang Keahlian -->
            <a href="{{ route('bidang-keahlian.index') }}" class="group flex items-center p-4 rounded-lg transition-all duration-300 hover:shadow-lg hover:bg-green-50 hover:border-green-200 border border-transparent">
                <div class="bg-green-100 p-3 rounded-full mr-4 group-hover:bg-green-200 transition-colors duration-300">
                    <i class="fas fa-atom text-green-500 text-xl"></i>
                </div>
                <div>
                    <h4 class="font-semibold text-gray-800">Bidang Keahlian</h4>
                    <p class="text-sm text-gray-500">Kelola bidang keahlian</p>
                </div>
            </a>

            <!-- Jabatan Fungsional -->
            <a href="{{ route('jabatan-fungsional.index') }}" class="group flex items-center p-4 rounded-lg transition-all duration-300 hover:shadow-lg hover:bg-purple-50 hover:border-purple-200 border border-transparent">
                <div class="bg-purple-100 p-3 rounded-full mr-4 group-hover:bg-purple-200 transition-colors duration-300">
                    <i class="fas fa-user-tie text-purple-500 text-xl"></i>
                </div>
                <div>
                    <h4 class="font-semibold text-gray-800">Jabatan Fungsional</h4>
                    <p class="text-sm text-gray-500">Kelola jabatan fungsional</p>
                </div>
            </a>

            <!-- Pendidikan Terakhir -->
            <a href="{{ route('pendidikan-terakhir.index') }}" class="group flex items-center p-4 rounded-lg transition-all duration-300 hover:shadow-lg hover:bg-orange-50 hover:border-orange-200 border border-transparent">
                <div class="bg-orange-100 p-3 rounded-full mr-4 group-hover:bg-orange-200 transition-colors duration-300">
                    <i class="fas fa-graduation-cap text-orange-500 text-xl"></i>
                </div>
                <div>
                    <h4 class="font-semibold text-gray-800">Pendidikan Terakhir</h4>
                    <p class="text-sm text-gray-500">Kelola tingkat pendidikan</p>
                </div>
            </a>

            <!-- Kuota Bimbingan -->
            <a href="{{ route('kuota-bimbingan.index') }}" class="group flex items-center p-4 rounded-lg transition-all duration-300 hover:shadow-lg hover:bg-teal-50 hover:border-teal-200 border border-transparent">
                <div class="bg-teal-100 p-3 rounded-full mr-4 group-hover:bg-teal-200 transition-colors duration-300">
                    <i class="fas fa-users text-teal-500 text-xl"></i>
                </div>
                <div>
                    <h4 class="font-semibold text-gray-800">Kuota Bimbingan</h4>
                    <p class="text-sm text-gray-500">Kelola kuota bimbingan</p>
                </div>
            </a>

            <!-- Minat Penelitian -->
            <a href="{{ route('minat.index') }}" class="group flex items-center p-4 rounded-lg transition-all duration-300 hover:shadow-lg hover:bg-red-50 hover:border-red-200 border border-transparent">
                <div class="bg-red-100 p-3 rounded-full mr-4 group-hover:bg-red-200 transition-colors duration-300">
                    <i class="fas fa-flask text-red-500 text-xl"></i>
                </div>
                <div>
                    <h4 class="font-semibold text-gray-800">Minat Penelitian</h4>
                    <p class="text-sm text-gray-500">Kelola minat penelitian</p>
                </div>
            </a>
        </div>
    </div>

    <!-- Recent Activity Section -->
    <div class="bg-white p-8 rounded-xl shadow-md">
        <div class="flex items-center justify-between mb-6">
            <h3 class="text-2xl font-semibold text-gray-800">Aktivitas Terkini</h3>
            <a href="#" class="text-sm font-medium text-blue-500 hover:text-blue-700">Lihat Semua</a>
        </div>
        <div class="space-y-4">
            @forelse($recentActivities as $activity)
            <div class="flex items-start pb-4 border-b border-gray-100 last:border-0 last:pb-0">
                <div class="bg-blue-100 p-2 rounded-full mr-4">
                    <i class="fas {{ $activity['icon'] }} text-blue-500 text-sm"></i>
                </div>
                <div class="flex-1">
                    <p class="text-gray-800">{{ $activity['description'] }}</p>
                    <p class="text-xs text-gray-500 mt-1">{{ $activity['time'] }}</p>
                </div>
            </div>
            @empty
            <div class="text-center py-8">
                <i class="fas fa-info-circle text-gray-400 text-3xl mb-2"></i>
                <p class="text-gray-500">Tidak ada aktivitas terkini</p>
            </div>
            @endforelse
        </div>
    </div>
</div>
@endsection