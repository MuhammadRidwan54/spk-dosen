<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Dosen</title>
</head>
<body>
    <h1>Tambah Dosen</h1>

    @if($errors->any())
        <div style="color: red; margin-bottom: 10px;">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('dosen.store') }}" method="POST">
        @csrf
        <div style="margin-bottom: 10px;">
            <label for="nama">Nama:</label><br>
            <input type="text" id="nama" name="nama" value="{{ old('nama') }}" required>
        </div>

        <div style="margin-bottom: 10px;">
            <label for="nik">NIK:</label><br>
            <input type="text" id="nik" name="nik" value="{{ old('nik') }}" required>
        </div>

        <div style="margin-bottom: 10px;">
            <label for="pendidikan_terakhir_id">Pendidikan Terakhir:</label><br>
            <select name="pendidikan_terakhir_id" id="pendidikan_terakhir_id" required>
                <option value="">Pilih Pendidikan</option>
                @foreach($pendidikan as $p)
                    <option value="{{ $p->id }}" {{ old('pendidikan_terakhir_id') == $p->id ? 'selected' : '' }}>
                        {{ $p->pendidikan }}
                    </option>
                @endforeach
            </select>
        </div>

        <div style="margin-bottom: 10px;">
            <label for="jabatan_fungsional_id">Jabatan Fungsional:</label><br>
            <select name="jabatan_fungsional_id" id="jabatan_fungsional_id" required>
                <option value="">Pilih Jabatan</option>
                @foreach($jabatan as $j)
                    <option value="{{ $j->id }}" {{ old('jabatan_fungsional_id') == $j->id ? 'selected' : '' }}>
                        {{ $j->jabatan }}
                    </option>
                @endforeach
            </select>
        </div>

        <div style="margin-bottom: 10px;">
            <label for="kuota_bimbingan_id">Kuota Bimbingan:</label><br>
            <select name="kuota_bimbingan_id" id="kuota_bimbingan_id" required>
                <option value="">Pilih Kuota</option>
                @foreach($kuota as $k)
                    <option value="{{ $k->id }}" {{ old('kuota_bimbingan_id') == $k->id ? 'selected' : '' }}>
                        {{ $k->kategori }}
                    </option>
                @endforeach
            </select>
        </div>
        
        <div>
            <button type="submit">Simpan</button>
            <a href="{{ route('dosen.index') }}">Kembali</a>
        </div>
    </form>
</body>
</html>