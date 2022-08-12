<?php
namespace App\Http\Controllers;


// use App\Http\Controllers\antol;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/authen/logout', [AuthController::class, 'logout'])->name('logout');

// Route Demografi
Route::get('/wv/demografi/kesiswaan', [DemografiKesiswaan::class, 'kesiswaan'])->name('demo_kesiswaan');

// Demografi Guru
Route::get('/wv/demografi/guru/semua', [DemografiGuru::class, 'jumlahGuru'])->name('demoguru');
Route::get('/wv/demografi/guru/jeniskelamin', [DemografiGuru::class, 'jkGuru'])->name('demogurujk');
Route::get('/wv/demografi/guru/pegawai', [DemografiGuru::class, 'pegawaiGuru'])->name('demogurup');
Route::get('/wv/demografi/guru/sertifikasi', [DemografiGuru::class, 'sertifikasiGuru'])->name('demogurus');
Route::get('/wv/demografi/guru/pendidikan', [DemografiGuru::class, 'pendidikanGuru'])->name('demogurupd');
Route::get('/wv/demografi/guru/marital', [DemografiGuru::class, 'maritalGuru'])->name('demogurum');

// Demografi Kinerja Guru
Route::get('/wv/demografi/kinerja/presensi', [DemografiKinerjaGuruController::class, 'presensi'])->name('demo_kinerja');
Route::get('/wv/demografi/kinerja/materi', [DemografiKinerjaGuruController::class, 'materi'])->name('demo_kinerjam');
Route::get('/wv/demografi/kinerja/tugas', [DemografiKinerjaGuruController::class, 'tugas'])->name('demo_kinerjat');
Route::get('/wv/demografi/kinerja/quiz', [DemografiKinerjaGuruController::class, 'quiz'])->name('demo_kinerjaq');
Route::get('/wv/demografi/kinerja/banksoal', [DemografiKinerjaGuruController::class, 'banksoal'])->name('demo_kinerjabs');
Route::get('/wv/demografi/kinerja/bankmateri', [DemografiKinerjaGuruController::class, 'bankmateri'])->name('demo_kinerjabm');

// Demografi Pegawai
Route::get('/wv/demografi/pegawai/semua', [DemografiPegawai::class, 'jumlahPegawai'])->name('demopegawai');
Route::get('/wv/demografi/pegawai/jeniskelamin', [DemografiPegawai::class, 'jkPegawai'])->name('demopegawaijk');
Route::get('/wv/demografi/pegawai/statuskepegawaian', [DemografiPegawai::class, 'status'])->name('demopegawaip');
Route::get('/wv/demografi/pegawai/sertifikasi', [DemografiPegawai::class, 'sertifikasiPegawai'])->name('demopegawais');
Route::get('/wv/demografi/pegawai/pendidikan', [DemografiPegawai::class, 'pendidikanPegawai'])->name('demopegawaipd');
Route::get('/wv/demografi/pegawai/marital', [DemografiPegawai::class, 'maritalPegawai'])->name('demopegawaim');

// Demografi Siswa
Route::get('/wv/demografi/siswa/semua', [DemografiSiswa::class, 'semua'])->name('demosiswa');
Route::get('/wv/demografi/siswa/tingkatkelas', [DemografiSiswa::class, 'tingkatKelas'])->name('demosiswatk');
Route::get('/wv/demografi/siswa/tahunmasuk', [DemografiSiswa::class, 'tahunMasuk'])->name('demosiswatm');
Route::get('/wv/demografi/siswa/jeniskelamin', [DemografiSiswa::class, 'jenisKelamin'])->name('demosiswajk');
Route::get('/wv/demografi/siswa/agama', [DemografiSiswa::class, 'agama'])->name('demosiswaa');
Route::get('/wv/demografi/siswa/statussiswa', [DemografiSiswa::class, 'statusSiswa'])->name('demosiswass');



// Route::get('/cok', function (){return 'Not Found !';} )->name('cok');
/**
 * INFO: parameter pertama itu url routenya, sementara yang di dalam array adalah Controller yang
 * berada di folder App\Http\Controllers lalu diikuti dengan nama fungsi yang akan dipanggil.
 */
require __DIR__ . '/auth.php';
