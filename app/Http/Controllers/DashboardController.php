<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Dosen;
use App\Models\Minat;
use Illuminate\Http\Request;
use App\Models\BidangKeahlian;
use App\Models\KuotaBimbingan;
use App\Models\MinatPenelitian;
use App\Models\JabatanFungsional;
use App\Models\PendidikanTerakhir;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    /**
     * Menampilkan dashboard utama
     */
    public function index()
    {
        // Ambil data user yang sedang login
        $user = Auth::user();
        
        // Hitung total data untuk statistik
        $stats = [
            'totalDosen' => Dosen::count(),
            'totalBidangKeahlian' => BidangKeahlian::count(),
            'totalJabatanFungsional' => JabatanFungsional::count(),
            'totalPendidikanTerakhir' => PendidikanTerakhir::count(),
            'totalKuotaBimbingan' => KuotaBimbingan::count(),
            'totalMinat' => Minat::count(),
        ];

        // Ambil aktivitas terkini
        $recentActivities = $this->getRecentActivities();

        // Data dosen terbaru (5 terbaru)
        $recentDosen = Dosen::with(['pendidikanTerakhir', 'jabatanFungsional'])
            ->latest()
            ->take(5)
            ->get();

        return view('dashboard.index', array_merge([
            'user' => $user,
            'title' => 'Dashboard',
            'recentActivities' => $recentActivities,
            'recentDosen' => $recentDosen,
        ], $stats));
    }

    /**
     * Mendapatkan data aktivitas terkini
     */
    protected function getRecentActivities()
    {
        $activities = [];
        $now = Carbon::now();

        // Contoh aktivitas - dalam aplikasi nyata ini bisa berasal dari Activity Log
        $activities[] = [
            'icon' => 'fa-user-plus',
            'description' => 'Admin menambahkan dosen baru: Dr. John Doe',
            'time' => $now->subMinutes(30)->diffForHumans()
        ];

        $activities[] = [
            'icon' => 'fa-edit',
            'description' => 'Anda memperbarui data bidang keahlian',
            'time' => $now->subHours(2)->diffForHumans()
        ];

        $activities[] = [
            'icon' => 'fa-trash',
            'description' => 'Data minat penelitian telah dihapus',
            'time' => $now->subDays(1)->diffForHumans()
        ];

        $activities[] = [
            'icon' => 'fa-graduation-cap',
            'description' => 'Pendidikan terakhir baru ditambahkan',
            'time' => $now->subDays(2)->diffForHumans()
        ];

        return $activities;
    }

    /**
     * Mendapatkan data statistik untuk chart
     */
    protected function getChartData()
    {
        // Ini contoh data - dalam aplikasi nyata bisa diambil dari database
        return [
            'labels' => ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun'],
            'data' => [12, 19, 3, 5, 2, 3],
        ];
    }
}