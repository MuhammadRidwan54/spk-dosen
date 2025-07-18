<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Bidang Keahlian</title>
</head>
<body>
    <h1>Edit Bidang Keahlian</h1>

    @if($errors->any())
        <div style="color: red; margin-bottom: 10px;">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('bidang-keahlian.update', $bidangKeahlian->id_bidang_keahlian) }}" method="POST">
        @csrf
        @method('PUT')
        <div>
            <label for="bidang">Bidang:</label><br>
            <input type="text" id="bidang" name="bidang" value="{{ old('bidang', $bidangKeahlian->bidang) }}" required>
        </div>
        
        <div style="margin-top: 10px;">
            <button type="submit">Update</button>
            <a href="{{ route('bidang-keahlian.index') }}">Kembali</a>
        </div>
    </form>
</body>
</html>