<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Jabatan Fungsional</title>
</head>
<body>
    <h1>Tambah Jabatan Fungsional</h1>

    @if($errors->any())
        <div style="color: red; margin-bottom: 10px;">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('jabatan-fungsional.store') }}" method="POST">
        @csrf
        <div style="margin-bottom: 10px;">
            <label for="jabatan">Jabatan:</label><br>
            <input type="text" id="jabatan" name="jabatan" value="{{ old('jabatan') }}" required>
        </div>

        <div style="margin-bottom: 10px;">
            <label for="score">Score:</label><br>
            <input type="number" id="score" name="score" value="{{ old('score') }}" min="1" max="3" required>
            <small>Score: 1 = Asisten Ahli, 2 = Lektor, 3 = Lektor Kepala</small>
        </div>
        
        <div>
            <button type="submit">Simpan</button>
            <a href="{{ route('jabatan-fungsional.index') }}">Kembali</a>
        </div>
    </form>
</body>
</html>