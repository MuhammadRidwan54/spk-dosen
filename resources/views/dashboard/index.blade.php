@extends('layout.app')

@section('title', 'Dashboard - SPK Dosen')

@section('content')
    <div class="menu-grid">
        <!-- Welcome Card -->
        <div class="menu-item" style="grid-column: span 3; text-align: center;">
            <h1>Selamat Datang, {{ $user->name }}</h1>
            <p>Sistem Pendukung Keputusan Pemilihan Dosen Pembimbing</p>
        </div>

        <!-- Quick Links Section -->
        <div class="menu-item" style="grid-column: span 3; text-align: center;">
            <h3>Quick Actions</h3>
            <div style="display: flex; justify-content: center; gap: 20px; margin-top: 15px;">
                <a href="{{ route('dosen.index') }}" class="quick-action-btn" style="background: #3498db;">
                    Data Dosen
                </a>
                <a href="{{ route('bidang-keahlian.index') }}" class="quick-action-btn" style="background: #2ecc71;">
                    Bidang Keahlian
                </a>
                <a href="{{ route('jabatan-fungsional.index') }}" class="quick-action-btn" style="background: #9b59b6;">
                    Jabatan Fungsional
                </a>
            </div>
            <div style="display: flex; justify-content: center; gap: 20px; margin-top: 15px;">
                <a href="{{ route('pendidikan-terakhir.index') }}" class="quick-action-btn" style="background: #e67e22;">
                    Pendidikan Terakhir
                </a>
                <a href="{{ route('kuota-bimbingan.index') }}" class="quick-action-btn" style="background: #1abc9c;">
                    Kuota Bimbingan
                </a>
                <a href="{{ route('minat.index') }}" class="quick-action-btn" style="background: #e74c3c;">
                    Minat Penelitian
                </a>
            </div>
        </div>
    </div>
@endsection