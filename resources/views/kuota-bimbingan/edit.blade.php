<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Kuota Bimbingan</title>
</head>
<body>
    <h1>Edit Kuota Bimbingan</h1>

    @if($errors->any())
        <div style="color: red; margin-bottom: 10px;">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('kuota-bimbingan.update', $kuotaBimbingan->id) }}" method="POST">
        @csrf
        @method('PUT')
        
        <div style="margin-bottom: 10px;">
            <label for="kategori">Kategori:</label><br>
            <input type="text" id="kategori" name="kategori" value="{{ old('kategori', $kuotaBimbingan->kategori) }}" required>
        </div>

        <div style="margin-bottom: 10px;">
            <label for="range">Range:</label><br>
            <input type="text" id="range" name="range" value="{{ old('range', $kuotaBimbingan->range) }}" required>
            <small>Contoh: 0-5, 6-10, >10</small>
        </div>

        <div style="margin-bottom: 10px;">
            <label for="score">Score:</label><br>
            <input type="number" id="score" name="score" value="{{ old('score', $kuotaBimbingan->score) }}" min="1" max="3" required>
            <small>Score: 1 = >10, 2 = 6-10, 3 = 0-5</small>
        </div>
        
        <div>
            <button type="submit">Update</button>
            <a href="{{ route('kuota-bimbingan.index') }}">Kembali</a>
        </div>
    </form>
</body>
</html>