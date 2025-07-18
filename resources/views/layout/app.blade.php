<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'SPK Dosen')</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background: #f5f5f5;
            display: flex;
            min-height: 100vh;
        }
        .main-container {
            display: flex;
            width: 100%;
        }
        .content {
            flex: 1;
            padding: 20px;
        }
        .container {
            max-width: 1200px;
            margin: 0 auto;
        }
        .menu-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
        }
        .menu-item {
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
            text-decoration: none;
            color: #333;
            transition: transform 0.2s;
        }
        .menu-item:hover {
            transform: translateY(-5px);
        }
        .menu-item h3 {
            margin: 0 0 10px 0;
            color: #2c3e50;
        }
        .menu-item p {
            margin: 0;
            color: #666;
        }
        .btn {
            padding: 8px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        .btn-danger {
            background: #e74c3c;
            color: white;
        }
        .btn-danger:hover {
            background: #c0392b;
        }
        /* Add this new style */
        .quick-action-btn {
            padding: 10px 20px;
            color: white;
            text-decoration: none;
            border-radius: 4px;
            transition: all 0.3s;
        }
        .quick-action-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 2px 8px rgba(0,0,0,0.2);
        }
    </style>
</head>
<body>
    @include('layout.sidebar')
    
    <div class="main-container">
        <div class="content">
            @include('layout.navbar')
            
            <div class="container">
                @yield('content')
            </div>
        </div>
    </div>

    @if(session('success'))
        <div style="position: fixed; bottom: 20px; right: 20px; background: #2ecc71; color: white; 
                    padding: 15px; border-radius: 4px; box-shadow: 0 2px 4px rgba(0,0,0,0.2);">
            {{ session('success') }}
        </div>
    @endif
</body>
</html>