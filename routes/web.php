<?php
namespace App\Http\Controllers;

use App\Http\Middleware\Admin;
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
Route::get('/demografi/kesiswaan', [DemografiKesiswaan::class, 'kesiswaan'])->name('demo_kesiswaan');

// Demografi Guru
Route::get('/demografi/guru/semua', [DemografiGuru::class, 'jumlahGuru'])->name('demoguru');
Route::get('/demografi/guru/jeniskelamin', [DemografiGuru::class, 'jkGuru'])->name('demogurujk');
Route::get('/demografi/guru/pegawai', [DemografiGuru::class, 'pegawaiGuru'])->name('demogurup');
Route::get('/demografi/guru/sertifikasi', [DemografiGuru::class, 'sertifikasiGuru'])->name('demogurus');
Route::get('/demografi/guru/pendidikan', [DemografiGuru::class, 'pendidikanGuru'])->name('demogurupd');
Route::get('/demografi/guru/marital', [DemografiGuru::class, 'maritalGuru'])->name('demogurum');

// Demografi Kinerja Guru
Route::get('/demografi/kinerja/presensi', [DemografiKinerjaGuruController::class, 'presensi'])->name('demo_kinerja');
Route::get('/demografi/kinerja/materi', [DemografiKinerjaGuruController::class, 'materi'])->name('demo_kinerjam');
Route::get('/demografi/kinerja/tugas', [DemografiKinerjaGuruController::class, 'tugas'])->name('demo_kinerjat');
Route::get('/demografi/kinerja/quiz', [DemografiKinerjaGuruController::class, 'quiz'])->name('demo_kinerjaq');
Route::get('/demografi/kinerja/banksoal', [DemografiKinerjaGuruController::class, 'banksoal'])->name('demo_kinerjabs');
Route::get('/demografi/kinerja/bankmateri', [DemografiKinerjaGuruController::class, 'bankmateri'])->name('demo_kinerjabm');

// Demografi Pegawai
Route::get('/demografi/pegawai/semua', [DemografiPegawai::class, 'jumlahPegawai'])->name('demopegawai');
Route::get('/demografi/pegawai/jeniskelamin', [DemografiPegawai::class, 'jkPegawai'])->name('demopegawaijk');
Route::get('/demografi/pegawai/statuskepegawaian', [DemografiPegawai::class, 'status'])->name('demopegawaip');
Route::get('/demografi/pegawai/sertifikasi', [DemografiPegawai::class, 'sertifikasiPegawai'])->name('demopegawais');
Route::get('/demografi/pegawai/pendidikan', [DemografiPegawai::class, 'pendidikanPegawai'])->name('demopegawaipd');
Route::get('/demografi/pegawai/marital', [DemografiPegawai::class, 'maritalPegawai'])->name('demopegawaim');

// Demografi Siswa
Route::get('/demografi/siswa/semua', [DemografiSiswa::class, 'semua'])->name('demosiswa');
Route::get('/demografi/siswa/tingkatkelas', [DemografiSiswa::class, 'tingkatKelas'])->name('demosiswatk');
Route::get('/demografi/siswa/tahunmasuk', [DemografiSiswa::class, 'tahunMasuk'])->name('demosiswatm');
Route::get('/demografi/siswa/jeniskelamin', [DemografiSiswa::class, 'jenisKelamin'])->name('demosiswajk');
Route::get('/demografi/siswa/agama', [DemografiSiswa::class, 'agama'])->name('demosiswaa');
Route::get('/demografi/siswa/statussiswa', [DemografiSiswa::class, 'statusSiswa'])->name('demosiswass');



// Route::get('/cok', function (){return 'Not Found !';} )->name('cok');
/**
 * INFO: parameter pertama itu url routenya, sementara yang di dalam array adalah Controller yang
 * berada di folder App\Http\Controllers lalu diikuti dengan nama fungsi yang akan dipanggil.
 */
require __DIR__ . '/auth.php';
