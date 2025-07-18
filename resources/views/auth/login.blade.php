<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        .success-message {
            color: green;
            background: #e8f5e9;
            padding: 10px;
            border-radius: 4px;
            margin-bottom: 15px;
        }
    </style>
</head>
<body>
    <div style="max-width: 400px; margin: 50px auto; padding: 20px;">
        <h1>Login</h1>

        @if(session('success'))
            <div class="success-message">
                {{ session('success') }}
            </div>
        @endif

        @if($errors->any())
            <div style="color: red; margin-bottom: 10px;">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('login.post') }}" method="POST">
            @csrf
            <div style="margin-bottom: 15px;">
                <label for="email">Email:</label><br>
                <input type="email" id="email" name="email" value="{{ old('email') }}" required 
                       style="width: 100%; padding: 8px;">
            </div>

            <div style="margin-bottom: 15px;">
                <label for="password">Password:</label><br>
                <input type="password" id="password" name="password" required 
                       style="width: 100%; padding: 8px;">
            </div>

            <div style="margin-bottom: 15px;">
                <input type="checkbox" id="remember" name="remember">
                <label for="remember">Remember me</label>
            </div>

            <div>
                <button type="submit" style="padding: 8px 15px;">Login</button>
            </div>
        </form>
    </div>
</body>
</html>