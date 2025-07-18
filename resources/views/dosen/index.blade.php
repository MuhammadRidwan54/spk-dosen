<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Dosen</title>
</head>
<body>
    <h1>Daftar Dosen</h1>

    @if(session('success'))
        <div style="color: green; margin-bottom: 10px;">
            {{ session('success') }}
        </div>
    @endif

    <a href="{{ route('dosen.create') }}" style="margin-bottom: 10px; display: inline-block;">
        Tambah Dosen
    </a>

    <table border="1" cellpadding="10" cellspacing="0">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>NIK</th>
                <th>Pendidikan Terakhir</th>
                <th>Jabatan Fungsional</th>
                <th>Kuota Bimbingan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($dosen as $index => $d)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $d->nama }}</td>
                    <td>{{ $d->nik }}</td>
                    <td>{{ $d->pendidikanTerakhir->pendidikan }}</td>
                    <td>{{ $d->jabatanFungsional->jabatan }}</td>
                    <td>{{ $d->kuotaBimbingan->kategori }}</td>
                    <td>
                        <a href="{{ route('dosen.edit', $d->id_dosen) }}">Edit</a>
                        <form action="{{ route('dosen.destroy', $d->id_dosen) }}" 
                              method="POST" 
                              style="display: inline;"
                              onsubmit="return confirm('Yakin ingin menghapus data?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Hapus</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="7" align="center">Tidak ada data</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</body>
</html>