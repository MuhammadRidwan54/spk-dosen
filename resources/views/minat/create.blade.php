<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Minat</title>
</head>
<body>
    <h1>Tambah Minat</h1>

    @if($errors->any())
        <div style="color: red; margin-bottom: 10px;">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('minat.store') }}" method="POST">
        @csrf
        <div style="margin-bottom: 10px;">
            <label for="nama">Nama Minat:</label><br>
            <input type="text" id="nama" name="nama" value="{{ old('nama') }}" required>
        </div>
        
        <div>
            <button type="submit">Simpan</button>
            <a href="{{ route('minat.index') }}">Kembali</a>
        </div>
    </form>
</body>
</html>