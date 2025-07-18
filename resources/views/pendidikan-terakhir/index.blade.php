<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pendidikan Terakhir</title>
</head>
<body>
    <h1>Daftar Pendidikan Terakhir</h1>

    @if(session('success'))
        <div style="color: green; margin-bottom: 10px;">
            {{ session('success') }}
        </div>
    @endif

    <a href="{{ route('pendidikan-terakhir.create') }}" style="margin-bottom: 10px; display: inline-block;">
        Tambah Pendidikan Terakhir
    </a>

    <table border="1" cellpadding="10" cellspacing="0">
        <thead>
            <tr>
                <th>No</th>
                <th>Pendidikan</th>
                <th>Score</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($pendidikan as $index => $p)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $p->pendidikan }}</td>
                    <td>{{ $p->score }}</td>
                    <td>
                        <a href="{{ route('pendidikan-terakhir.edit', $p->id) }}">Edit</a>
                        <form action="{{ route('pendidikan-terakhir.destroy', $p->id) }}" 
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