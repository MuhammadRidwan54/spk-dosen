<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Pendidikan Terakhir</title>
</head>
<body>
    <h1>Edit Pendidikan Terakhir</h1>

    @if($errors->any())
        <div style="color: red; margin-bottom: 10px;">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('pendidikan-terakhir.update', $pendidikanTerakhir->id) }}" method="POST">
        @csrf
        @method('PUT')
        
        <div style="margin-bottom: 10px;">
            <label for="pendidikan">Pendidikan:</label><br>
            <input type="text" id="pendidikan" name="pendidikan" value="{{ old('pendidikan', $pendidikanTerakhir->pendidikan) }}" required>
        </div>

        <div style="margin-bottom: 10px;">
            <label for="score">Score:</label><br>
            <input type="number" id="score" name="score" value="{{ old('score', $pendidikanTerakhir->score) }}" min="1" max="2" required>
            <small>Score: 1 = S2, 2 = S3</small>
        </div>
        
        <div>
            <button type="submit">Update</button>
            <a href="{{ route('pendidikan-terakhir.index') }}">Kembali</a>
        </div>
    </form>
</body>
</html>