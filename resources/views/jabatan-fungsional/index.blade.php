<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jabatan Fungsional</title>
</head>
<body>
    <h1>Daftar Jabatan Fungsional</h1>

    @if(session('success'))
        <div style="color: green; margin-bottom: 10px;">
            {{ session('success') }}
        </div>
    @endif

    <a href="{{ route('jabatan-fungsional.create') }}" style="margin-bottom: 10px; display: inline-block;">
        Tambah Jabatan Fungsional
    </a>

    <table border="1" cellpadding="10" cellspacing="0">
        <thead>
            <tr>
                <th>No</th>
                <th>Jabatan</th>
                <th>Score</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($jabatan as $index => $j)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $j->jabatan }}</td>
                    <td>{{ $j->score }}</td>
                    <td>
                        <a href="{{ route('jabatan-fungsional.edit', $j->id) }}">Edit</a>
                        <form action="{{ route('jabatan-fungsional.destroy', $j->id) }}" 
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
                    <td colspan="4" align="center">Tidak ada data</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</body>
</html>