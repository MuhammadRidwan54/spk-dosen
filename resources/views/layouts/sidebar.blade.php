<!-- Sidebar -->
<div id="sidebar" class="bg-white border-r border-gray-100 w-64 min-h-screen fixed transform -translate-x-full md:translate-x-0 transition-transform duration-300 ease-in-out z-40 shadow-lg md:shadow-none sidebar-mobile-closed">

    <!-- Close button for mobile -->
    <div class="md:hidden flex justify-end p-4 border-b border-gray-50">
        <button id="closeSidebarBtn" class="p-2 rounded-lg text-gray-400 hover:text-gray-600 hover:bg-gray-50 transition-colors duration-200">
            <i class="fas fa-times text-lg"></i>
        </button>
    </div>
    
    <!-- Sidebar Header -->
    <div class="p-6 border-b border-gray-50">
        <div class="flex items-center space-x-3">
            <div class="w-8 h-8 bg-primary-600 rounded-lg flex items-center justify-center">
                <i class="fas fa-user-graduate text-white text-sm"></i>
            </div>
            <div>
                <h1 class="text-lg font-semibold text-gray-900 tracking-tight">SPK Dosen</h1>
                <p class="text-xs text-gray-500 font-medium">Dashboard Admin</p>
            </div>
        </div>
    </div>
    
    <!-- Navigation Menu -->
    <nav class="p-4 space-y-1">
        <a href="{{ route('dashboard') }}"
            class="group flex items-center space-x-3 px-3 py-2.5 rounded-xl text-sm font-medium transition-all duration-200
            {{ request()->routeIs('dashboard') ? 'bg-primary-600 text-white shadow-sm' : 'text-gray-600 hover:bg-gray-50 hover:text-gray-900' }}">
            <i class="fas fa-home text-sm {{ request()->routeIs('dashboard') ? 'text-white' : 'text-gray-400 group-hover:text-gray-600' }}"></i>
            <span>Dashboard</span>
        </a>
        
        <a href="{{ route('dosen.index') }}"
            class="group flex items-center space-x-3 px-3 py-2.5 rounded-xl text-sm font-medium transition-all duration-200
            {{ request()->routeIs('dosen.*') ? 'bg-primary-600 text-white shadow-sm' : 'text-gray-600 hover:bg-gray-50 hover:text-gray-900' }}">
            <i class="fas fa-users text-sm {{ request()->routeIs('dosen.*') ? 'text-white' : 'text-gray-400 group-hover:text-gray-600' }}"></i>
            <span>Data Dosen</span>
        </a>
        
        <a href="{{ route('bidang-keahlian.index') }}"
            class="group flex items-center space-x-3 px-3 py-2.5 rounded-xl text-sm font-medium transition-all duration-200
            {{ request()->routeIs('bidang-keahlian.*') ? 'bg-primary-600 text-white shadow-sm' : 'text-gray-600 hover:bg-gray-50 hover:text-gray-900' }}">
            <i class="fas fa-book text-sm {{ request()->routeIs('bidang-keahlian.*') ? 'text-white' : 'text-gray-400 group-hover:text-gray-600' }}"></i>
            <span>Bidang Keahlian</span>
        </a>
        
        <a href="{{ route('jabatan-fungsional.index') }}"
            class="group flex items-center space-x-3 px-3 py-2.5 rounded-xl text-sm font-medium transition-all duration-200
            {{ request()->routeIs('jabatan-fungsional.*') ? 'bg-primary-600 text-white shadow-sm' : 'text-gray-600 hover:bg-gray-50 hover:text-gray-900' }}">
            <i class="fas fa-briefcase text-sm {{ request()->routeIs('jabatan-fungsional.*') ? 'text-white' : 'text-gray-400 group-hover:text-gray-600' }}"></i>
            <span>Jabatan Fungsional</span>
        </a>
        
        <a href="{{ route('pendidikan-terakhir.index') }}"
            class="group flex items-center space-x-3 px-3 py-2.5 rounded-xl text-sm font-medium transition-all duration-200
            {{ request()->routeIs('pendidikan-terakhir.*') ? 'bg-primary-600 text-white shadow-sm' : 'text-gray-600 hover:bg-gray-50 hover:text-gray-900' }}">
            <i class="fas fa-graduation-cap text-sm {{ request()->routeIs('pendidikan-terakhir.*') ? 'text-white' : 'text-gray-400 group-hover:text-gray-600' }}"></i>
            <span>Pendidikan Terakhir</span>
        </a>
        
        <a href="{{ route('kuota-bimbingan.index') }}"
            class="group flex items-center space-x-3 px-3 py-2.5 rounded-xl text-sm font-medium transition-all duration-200
            {{ request()->routeIs('kuota-bimbingan.*') ? 'bg-primary-600 text-white shadow-sm' : 'text-gray-600 hover:bg-gray-50 hover:text-gray-900' }}">
            <i class="fas fa-chalkboard-teacher text-sm {{ request()->routeIs('kuota-bimbingan.*') ? 'text-white' : 'text-gray-400 group-hover:text-gray-600' }}"></i>
            <span>Kuota Bimbingan</span>
        </a>
        
        <a href="{{ route('minat.index') }}"
            class="group flex items-center space-x-3 px-3 py-2.5 rounded-xl text-sm font-medium transition-all duration-200
            {{ request()->routeIs('minat.*') ? 'bg-primary-600 text-white shadow-sm' : 'text-gray-600 hover:bg-gray-50 hover:text-gray-900' }}">
            <i class="fas fa-flask text-sm {{ request()->routeIs('minat.*') ? 'text-white' : 'text-gray-400 group-hover:text-gray-600' }}"></i>
            <span>Minat Penelitian</span>
        </a>
    </nav>
</div>

<!-- Overlay for mobile -->
<div id="overlay" class="fixed inset-0 bg-black bg-opacity-50 z-30 md:hidden hidden"></div>