<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

Route::get('/', function () {
    return redirect('/mahasiswa');
});

// GET: tampilkan form dan data, tapi hanya hapus session jika tidak ada data POST sebelumnya
Route::get('/mahasiswa', function () {
    // Hilangkan data saat user pertama kali datang
    if (!session()->has('sudah_input')) {
        session()->forget('mahasiswa');
    }

    session()->forget('sudah_input'); // reset flag
    $mahasiswa = session('mahasiswa', []);
    return view('mahasiswa.index', compact('mahasiswa'));
});

// POST: tambah data
Route::post('/mahasiswa', function (Request $request) {
    $mahasiswa = session('mahasiswa', []);

    $mahasiswa[] = [
        'nim' => $request->nim,
        'nama' => $request->nama,
        'prodi' => $request->prodi,
        'semester' => $request->semester,
        'email' => $request->email,
    ];

    session(['mahasiswa' => $mahasiswa]);
    session(['sudah_input' => true]); // beri tanda agar tidak langsung dihapus saat redirect

    return redirect('/mahasiswa');
});
