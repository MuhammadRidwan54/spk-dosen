<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'SPK Dosen')</title>
    {{-- Pastikan Anda telah mengimpor Tailwind CSS di sini, misalnya melalui Vite atau CDN --}}
    {{-- Contoh untuk Vite: @vite(['resources/css/app.css', 'resources/js/app.js']) --}}
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
        /* Gaya kustom untuk transisi sidebar mobile */
        .sidebar-mobile-open {
            transform: translateX(0);
        }
        .sidebar-mobile-closed {
            transform: translateX(-100%);
        }
        @media (min-width: 768px) {
            .sidebar-mobile-closed {
                transform: translateX(0); /* Sidebar selalu terlihat di desktop */
            }
        }
    </style>
</head>
<body class="font-sans antialiased bg-gray-100 min-h-screen flex">
    {{-- Sidebar --}}
    @include('layout.sidebar')

    <div class="flex-1 flex flex-col md:ml-64"> {{-- md:ml-64 untuk mengimbangi lebar sidebar di desktop --}}
        {{-- Navbar --}}
        @include('layout.navbar')

        <main class="flex-1 p-6">
            <div class="max-w-7xl mx-auto">
                @yield('content')
            </div>
        </main>
    </div>

    @if(session('success'))
        <div id="success-toast" class="fixed bottom-6 right-6 bg-green-500 text-white px-6 py-3 rounded-lg shadow-lg z-50 transition-opacity duration-300 ease-out opacity-100">
            {{ session('success') }}
        </div>
        <script>
            // Auto-hide the toast after 3 seconds
            setTimeout(() => {
                const toast = document.getElementById('success-toast');
                if (toast) {
                    toast.classList.remove('opacity-100');
                    toast.classList.add('opacity-0');
                    setTimeout(() => toast.remove(), 300); // Remove from DOM after fade out
                }
            }, 3000);
        </script>
    @endif

    <script>
        // JavaScript untuk toggle sidebar di mobile
        document.addEventListener('DOMContentLoaded', () => {
            const sidebar = document.querySelector('.sidebar');
            const sidebarToggle = document.getElementById('sidebar-toggle');

            if (sidebar && sidebarToggle) {
                sidebarToggle.addEventListener('click', () => {
                    sidebar.classList.toggle('sidebar-mobile-closed');
                    sidebar.classList.toggle('sidebar-mobile-open');
                });
            }
        });
    </script>
</body>
</html>