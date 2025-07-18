<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <style>
        .error-feedback {
            color: red;
            font-size: 0.8em;
            margin-top: 5px;
        }
        .form-group {
            margin-bottom: 15px;
        }
        .input-field {
            width: 100%;
            padding: 8px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }
        .btn {
            padding: 8px 15px;
            background: #4CAF50;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        .btn:hover {
            background: #45a049;
        }
    </style>
</head>
<body>
    <div style="max-width: 400px; margin: 50px auto; padding: 20px; box-shadow: 0 0 10px rgba(0,0,0,0.1);">
        <h1 style="text-align: center; color: #333;">Register</h1>

        @if($errors->any())
            <div style="color: red; margin-bottom: 20px; padding: 10px; background: #fff5f5; border-radius: 4px;">
                <ul style="margin: 0; padding-left: 20px;">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('auth.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" value="{{ old('name') }}" 
                       class="input-field" required>
                @error('name')
                    <div class="error-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" value="{{ old('email') }}" 
                       class="input-field" required>
                @error('email')
                    <div class="error-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" 
                       class="input-field" required>
                @error('password')
                    <div class="error-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="password_confirmation">Confirm Password:</label>
                <input type="password" id="password_confirmation" name="password_confirmation" 
                       class="input-field" required>
            </div>

            <div style="text-align: center;">
                <button type="submit" class="btn">Register</button>
                <div style="margin-top: 10px;">
                    <a href="{{ route('login') }}" style="color: #666; text-decoration: none;">
                        Already have an account? Login here
                    </a>
                </div>
            </div>
        </form>
    </div>
</body>
</html>