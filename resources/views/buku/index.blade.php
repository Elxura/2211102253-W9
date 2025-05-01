<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Daftar Buku</title>
</head>
<body>
    <h2>Nama : M Masyud Alam</h2>
    <h2>NIM  : 2211102253</h2>

    <h3>Form Buku</h3>
    @if (isset($buku))
        <form action="{{ route('buku.update', $buku->id) }}" method="POST">
        @method('PUT')
    @else
        <form action="{{ route('buku.store') }}" method="POST">
    @endif
        @csrf
        <input type="text" name="judul" placeholder="Judul Buku"
               value="{{ old('judul', $buku->judul ?? '') }}">
        <br>
        <input type="text" name="pengarang" placeholder="Pengarang"
               value="{{ old('pengarang', $buku->pengarang ?? '') }}">
        <br>
        <button type="submit">Simpan</button>
    </form>

    <h3>Daftar Buku</h3>
    <table border="1" cellpadding="5">
        <thead>
            <tr>
                <th>Judul</th>
                <th>Pengarang</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
        @foreach ($bukus as $item)
            <tr>
                <td>{{ $item->judul }}</td>
                <td>{{ $item->pengarang }}</td>
                <td>
                    <a href="{{ route('buku.edit', $item->id) }}">Edit</a>
                    <form action="{{ route('buku.destroy', $item->id) }}"
                          method="POST" style="display:inline">
                        @method('DELETE')
                        @csrf
                        <button type="submit">Hapus</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</body>
</html>
