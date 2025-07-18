<header class="bg-white shadow-sm p-4 flex items-center justify-between sticky top-0 z-30">
    <div class="flex items-center">
        <button id="sidebar-toggle" class="md:hidden p-2 mr-4 text-gray-600 hover:text-gray-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 rounded-md">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path></svg>
        </button>
        <h1 class="text-2xl font-semibold text-gray-800">@yield('header-title', 'Dashboard SPK Dosen')</h1>
    </div>
    <div class="flex items-center space-x-4">
        <span class="text-gray-700 hidden sm:block">Selamat Datang, <span class="font-medium">{{ Auth::user()->name }}</span></span>
        <form action="{{ route('logout') }}" method="POST" class="logout-form">
            @csrf
            <button type="submit" class="px-4 py-2 bg-red-600 text-white rounded-md hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 transition-colors duration-200">
                Logout
            </button>
        </form>
    </div>
</header>