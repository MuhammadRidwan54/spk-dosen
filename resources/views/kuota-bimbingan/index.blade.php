<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kuota Bimbingan</title>
</head>
<body>
    <h1>Daftar Kuota Bimbingan</h1>

    @if(session('success'))
        <div style="color: green; margin-bottom: 10px;">
            {{ session('success') }}
        </div>
    @endif

    <a href="{{ route('kuota-bimbingan.create') }}" style="margin-bottom: 10px; display: inline-block;">
        Tambah Kuota Bimbingan
    </a>

    <table border="1" cellpadding="10" cellspacing="0">
        <thead>
            <tr>
                <th>No</th>
                <th>Kategori</th>
                <th>Range</th>
                <th>Score</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($kuota as $index => $k)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $k->kategori }}</td>
                    <td>{{ $k->range }}</td>
                    <td>{{ $k->score }}</td>
                    <td>
                        <a href="{{ route('kuota-bimbingan.edit', $k->id) }}">Edit</a>
                        <form action="{{ route('kuota-bimbingan.destroy', $k->id) }}" 
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
                    <td colspan="5" align="center">Tidak ada data</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</body>
</html>