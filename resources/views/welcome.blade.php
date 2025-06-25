<!DOCTYPE html>
<html>
<head>
    <title>Data Mahasiswa</title>
</head>
<body>
    <h1>Input Data Mahasiswa</h1>
    <form method="POST" action="/mahasiswa">
        @csrf
        <label>NIM:</label><br>
        <input type="text" name="nim" required><br><br>

        <label>Nama:</label><br>
        <input type="text" name="nama" required><br><br>

        <label>Prodi:</label><br>
        <input type="text" name="prodi" required><br><br>

        <label>Semester:</label><br>
        <input type="number" name="semester" required><br><br>

        <label>Email:</label><br>
        <input type="email" name="email" required><br><br>

        <button type="submit">Tambah Data</button>
    </form>

    <hr>

    <h2>Daftar Mahasiswa</h2>
    @if(count($mahasiswa) > 0)
        <table border="1" cellpadding="10">
            <tr>
                <th>NIM</th>
                <th>Nama</th>
                <th>Prodi</th>
                <th>Semester</th>
                <th>Email</th>
            </tr>
            @foreach($mahasiswa as $m)
            <tr>
                <td>{{ $m['nim'] }}</td>
                <td>{{ $m['nama'] }}</td>
                <td>{{ $m['prodi'] }}</td>
                <td>{{ $m['semester'] }}</td>
                <td>{{ $m['email'] }}</td>
            </tr>
            @endforeach
        </table>
    @else
        <p><i>Data kosong. Silakan tambahkan data di atas.</i></p>
    @endif

    <p><b>Note:</b> Data akan hilang saat halaman direfresh karena hanya disimpan dalam session sementara.</p>
</body>
</html>
