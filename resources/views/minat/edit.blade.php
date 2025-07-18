<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Minat</title>
</head>
<body>
    <h1>Edit Minat</h1>

    @if($errors->any())
        <div style="color: red; margin-bottom: 10px;">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('minat.update', $minat->id_minat) }}" method="POST">
        @csrf
        @method('PUT')
        
        <div style="margin-bottom: 10px;">
            <label for="nama">Nama Minat:</label><br>
            <input type="text" id="nama" name="nama" value="{{ old('nama', $minat->nama) }}" required>
        </div>
        
        <div>
            <button type="submit">Update</button>
            <a href="{{ route('minat.index') }}">Kembali</a>
        </div>
    </form>
</body>
</html>