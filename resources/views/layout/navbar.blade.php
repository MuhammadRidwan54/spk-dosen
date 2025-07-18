<div class="header">
    <h1>@yield('header-title', 'Dashboard SPK Dosen')</h1>
    <div class="user-info">
        <span>Welcome, {{ Auth::user()->name }}</span>
        <form action="{{ route('logout') }}" method="POST" class="logout-form">
            @csrf
            <button type="submit" class="btn btn-danger">Logout</button>
        </form>
    </div>
</div>