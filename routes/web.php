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

//SHORTCUT UNTUK MEMBUAT STORAGE LINK PADA SHARED HOSTING
/*Route::get('sysmlink', function(){
    $targetFolder = $_SERVER['DOCUMENT_ROOT'].'/sourceCode/storage/app/public';
    $linkFolder = $_SERVER['DOCUMENT_ROOT'].'/storage';
    symlink($targetFolder, $linkFolder);
    return 'success';
});*/

// Route::get('/', [HomeController::class, 'beranda']);
Route::group(['middleware' => ['guestAuth']], function() {

    Route::get('/', [AuthController::class, 'login'])->name('login');
    Route::post('/authen/postlogin', [AuthController::class, 'postlogin'])->name('aksilogin');

     Route::get('/authen/helpdesk', [AuthController::class, 'helpdesk'])->name('helpdesk');
      Route::post('/authen/sendemail', [AuthController::class, 'sendemail'])->name('sendemail');
    // Route::get('/auth/logout', [AuthController::class, 'logout'])->name('logout');
});


// Route::group(['middleware' => ['GuestAuth']], function() {

//     Route::get('/auth/login', [AuthController::class, 'login'])->name('login');
//     Route::post('/auth/postlogin', [AuthController::class, 'postlogin'])->name('aksilogin');
//     // Route::get('/auth/logout', [AuthController::class, 'logout'])->name('logout');
// });

// Route::middleware(['auth', 'admin'])->group(function () {
//     Route::get('/auth/login', [AuthController::class, 'login'])->name('login');
//     Route::post('/auth/postlogin', [AuthController::class, 'postlogin'])->name('aksilogin');
// });
/**
 * INFO: Ini pakai route grouping agar tidak susah buat satu satu routenya
 * untuk dokumentasi library nya bisa dilihat pada url: https://github.com/lesichkovm/laravel-advanced-route
 */

// Route::group(['middleware' => ['Admin']], function() {
    
\AdvancedRoute::controllers([
    // 'setting' => SettingsController::class,
	// 'dashboard' => HomeController::class,
 //    'profile' => ProfileController::class,
 //    'users' => UserController::class,
 //    'datasekolah' => DatasekolahController::class,
 //    'dataguru' => DataguruController::class,
 //    'datastaff' => DatastaffController::class,
 //    'datasiswa' => DatasiswaController::class,
 //    'datafitur' => DatafiturController::class,
 //    'datamatapelajaran' => DatamatapelajaranController::class,
 //    'dataruangkelas' => DataruangkelasController::class,
 //    'datajurusan' => DatajurusanController::class,
 //    'datahakakses' => DatahakaksesController::class,
 //    'datatahunakademik' => DatatahunakademikController::class,
 //    'datarole' => DataroleController::class,
 //    'role' => DataroleController::class,
 //    'datakelompokkelas' => DatakelompokkelasController::class,
 //    'datakelasberjalan' => DatakelasberjalanController::class,
 //    'datasettingjadwal' => DatasettingjadwalController::class,
 //    'datainputnilai' => DatainputnilaiController::class,
 //    'datauangsekolah' => DatauangsekolahController::class,
 //    'datasettingpembayaran' => DatasettingbayarController::class,
 //    'datapembayaranspp' => DatapembayaransppController::class,
 //    'datasettingsiswa' => DataSettingSiswaController::class,
 //    'datakomponennilai' => DataKomponenNilaiController::class,
 //    'databobotnilai' => DataBobotController::class,
	// 'datauser' => DataUserController::class,
 //    'datapaket' => Duit::class,
	// 'databobotkomponennilai' => ManajemenNilai::class,
    'authen' => AuthController::class,
	// 'datapengumuman' => Mading::class,

    //INFO: CONTOH INTERFACE MULAI DARI LIST DATA SAMPAI DENGAN TAMBAH
    'example' => ExampleController::class
]);

Route::get('/authen/logout', [AuthController::class, 'logout'])->name('logout');

Route::group(['middleware' => ['admin']], function() {

\AdvancedRoute::controllers([
  
    'setting' => SettingsController::class,
    'dashboard' => HomeController::class,
    'profile' => ProfileController::class,
    'users' => UserController::class,
    'datasekolah' => DatasekolahController::class,
    'dataguru' => DataguruController::class,
    'datastaff' => DatastaffController::class,
    'datasiswa' => DatasiswaController::class,
    'datafitur' => DatafiturController::class,
    'datamatapelajaran' => DatamatapelajaranController::class,
    'dataruangkelas' => DataruangkelasController::class,
    'datajurusan' => DatajurusanController::class,
    'datahakakses' => DatahakaksesController::class,
    'datatahunakademik' => DatatahunakademikController::class,
    'datarole' => DataroleController::class,
    'role' => DataroleController::class,
    'datakelompokkelas' => DatakelompokkelasController::class,
    'datakelasberjalan' => DatakelasberjalanController::class,
    'datasettingjadwal' => DatasettingjadwalController::class,
    'datainputnilai' => DatainputnilaiController::class,
    'datauangsekolah' => DatauangsekolahController::class,
    'datasettingpembayaran' => DatasettingbayarController::class,
    'datapembayaranspp' => DatapembayaransppController::class,
    'datasettingsiswa' => DataSettingSiswaController::class,
    'datakomponennilai' => DataKomponenNilaiController::class,
    'databobotnilai' => DataBobotController::class,
    'datauser' => DataUserController::class,
    'datapaket' => Duit::class,
    'databobotkomponennilai' => ManajemenNilai::class,
    'datapengumuman' => Mading::class,

    //INFO: CONTOH INTERFACE MULAI DARI LIST DATA SAMPAI DENGAN TAMBAH
    'example' => ExampleController::class
]);
    
Route::get('/dashboard',[HomeController::class, 'dashboard']);

 Route::post('/isipengumuman',[HomeController::class, 'isiPengumuman'])->name('isipengumumanS');


Route::get('/authen/profil_admin/{id}',[AuthController::class, 'profile'])->name('profile_adm');
Route::get('/authen/profil_staff/{id}',[AuthController::class, 'profile'])->name('profile');

Route::get('/authen/password/{id}',[AuthController::class, 'password'])->name('password_adm');

 Route::post('/authen/updatepass', [AuthController::class, 'savepass'])->name('updatepass');


Route::get('/offline', [HomeController::class, 'offline']);

// Route::post('/galeri/kategori/bulk-delete', [GaleriController::class, 'bulkDeleteCategori']);
// Route::post('/galeri/kategori/bulk-status', [GaleriController::class, 'bulkStatusCategori']);
// Route::get('/galeri/kategori/create', [GaleriController::class, 'createCategori']);
// Route::post('/galeri/kategori', [GaleriController::class, 'insertCategori']);
// Route::put('/galeri/kategori/{id}', [GaleriController::class, 'putCategori']);
// Route::get('/galeri/kategori/edit/{id}', [GaleriController::class, 'editCategori']);
// Route::delete('/galeri/kategori/{id}', [GaleriController::class, 'deleteCategori']);

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

// Demografi Presensi Siswa
Route::get('/demografi/presensi/semua', [DemografiPresensiController::class, 'semua'])->name('demopresensi');
Route::get('/demografi/presensi/kelompokkelas', [DemografiPresensiController::class, 'kelompokKelas'])->name('demopresensik');

// Demografi Keuangan Siswa
Route::get('/demografi/keuangan/semua', [DemografiKeuanganSiswaController::class, 'semua'])->name('demokeuangan');
Route::get('/demografi/keuangan/kelompokkelas', [DemografiKeuanganSiswaController::class, 'kelompokkelas'])->name('demokeuangankk');

// Route Data Pelanggar Siswa
Route::get('/datapelanggaransiswa', [DataPelanggaranSiswaController::class, 'index']);
Route::get('/datapelanggaransiswa/create', [DataPelanggaranSiswaController::class, 'create']);
Route::post('/datapelanggaransiswa/store', [DataPelanggaranSiswaController::class, 'store'])->name('pelanggar.create');
Route::get('/datapelanggaransiswa/edit/{id}', [DataPelanggaranSiswaController::class, 'edit']);
Route::post('/datapelanggaransiswa/update/{id}', [DataPelanggaranSiswaController::class, 'update'])->name('pelanggar.update');
Route::get('/datapelanggaransiswa/hapus/{id}', [DataPelanggaranSiswaController::class, 'destroy']);
Route::get('/datapelanggaransiswa/getdata', [DataPelanggaranSiswaController::class, 'getdata']);
// Route Filter Data Pelanggar Siswa
Route::get('/datapelanggaransiswa/filter', [DataPelanggaranSiswaController::class, 'filterdata'])->name('filterData');

// Route Kehadiran
Route::get('/datakehadiran', [DataKehadiranSiswaController::class, 'index'])->name('kehadiran.index');
Route::get('/datakehadiran/create', [DataKehadiranSiswaController::class, 'create'])->name('kehadiran.create');
Route::post('/datakehadiran/store', [DataKehadiranSiswaController::class, 'store'])->name('kehadiran.store');
Route::get('/datakehadiran/edit/{id}', [DataKehadiranSiswaController::class, 'edit'])->name('kehadiran.edit');
Route::post('/datakehadiran/update/{id}', [DataKehadiranSiswaController::class, 'update'])->name('kehadiran.update');
Route::get('/datakehadiran/hapus/{id}', [DataKehadiranSiswaController::class, 'destroy'])->name('kehadiran.delete');

// Route Kelas Berjalan
Route::post('/datakelasberjalan/store', [DatakelasberjalanController::class, 'store']);
Route::post('/datakelasberjalan/update', [DatakelasberjalanController::class, 'update']);
Route::get('/datakelasberjalan/index', [DatakelasberjalanController::class, 'getIndex']);
Route::get('/datakelasberjalan/edit/{id}', [DatakelasberjalanController::class, 'getEdit']);
Route::get('/datakelasberjalan/hapus/{id}', [DatakelasberjalanController::class, 'destroy']);

// Route Setting Jadwal
Route::post('/datasettingjadwal/store', [DatasettingjadwalController::class, 'store']);
Route::get('/datasettingjadwal/edit/{id}', [DatasettingjadwalController::class, 'getEdit']);
Route::get('/datasettingjadwal/index', [DatasettingjadwalController::class, 'getIndex']);
Route::post('/datasettingjadwal/update', [DatasettingjadwalController::class, 'update']);
Route::get('/datasettingjadwal/hapus/{id}', [DatasettingjadwalController::class, 'destroy']);

// Route Setting Tahun Ajaran/Akademik
Route::post('/datatahunakademik/store', [DatatahunakademikController::class, 'store']);
Route::post('/datatahunakademik/update', [DatatahunakademikController::class, 'update']);
Route::get('/datatahunakademik/index', [DatatahunakademikController::class, 'getIndex']);
Route::get('/datatahunakademik/edit/{id}', [DatatahunakademikController::class, 'getEdit']);
Route::get('/datatahunakademik/hapus/{id}', [DatatahunakademikController::class, 'destroy']);

// Route Kelompok Kelas
Route::post('/datakelompokkelas/store', [DatakelompokkelasController::class, 'store']);
Route::post('/datakelompokkelas/update', [DatakelompokkelasController::class, 'update']);
Route::get('/datakelompokkelas/index', [DatakelompokkelasController::class, 'getIndex']);
Route::get('/datakelompokkelas/edit/{id}', [DatakelompokkelasController::class, 'getEdit']);
Route::get('/datakelompokkelas/hapus/{id}', [DatakelompokkelasController::class, 'destroy']);

// Route Manajemen Hak Akses
Route::post('/datahakakses/store', [DatahakaksesController::class, 'store']);
Route::post('/datahakakses/update', [DatahakaksesController::class, 'update']);
Route::get('/datahakakses/index', [DatahakaksesController::class, 'getIndex']);
Route::get('/datahakakses/edit/{id}', [DatahakaksesController::class, 'getEdit']);
Route::get('/datahakakses/hapus/{id}', [DatahakaksesController::class, 'destroy']);

// Route Manajemen Fitur
Route::post('/datafitur/store', [DatafiturController::class, 'store']);
Route::post('/datafitur/update', [DatafiturController::class, 'update']);
Route::get('/datafitur/index', [DatafiturController::class, 'getIndex']);
Route::get('/datafitur/edit/{id}', [DatafiturController::class, 'getEdit']);
Route::get('/datafitur/hapus/{id}', [DatafiturController::class, 'destroy']);

// Route Komponen Biaya Sekolah
Route::post('/datauangsekolah/store', [DatauangsekolahController::class, 'store']);
Route::get('/datauangsekolah/index', [DatauangsekolahController::class, 'getIndex']);
Route::post('/datauangsekolah/update', [DatauangsekolahController::class, 'update']);
Route::get('/datauangsekolah/hapus/{id}', [DatauangsekolahController::class, 'destroy']);

// Route Setting Pembayaran
Route::post('/datasettingpembayaran/store', [DatasettingbayarController::class, 'store']);
Route::get('/datasettingpembayaran/index', [DatasettingbayarController::class, 'getIndex']);
Route::get('/datasettingpembayaran/create/{id}', [DatasettingbayarController::class, 'getCreate']);
Route::get('/datasettingpembayaran/lihat/{id}', [DatasettingbayarController::class, 'getShow']);

Route::get('/datapembayaranspp/create/{id}', [DatapembayaransppController::class, 'getCreate']);
Route::get('/datapembayaranspp/index', [DatapembayaransppController::class, 'getIndex']);
Route::get('/datapembayaranspp/create/{id}', [DatapembayaransppController::class, 'getCreate']);
Route::post('/datapembayaranspp/cari', [DatapembayaransppController::class, 'cariKomponen']);
Route::post('/datapembayaranspp/store', [DatapembayaransppController::class, 'store']);
Route::get('/datapembayaranspp/show/{id}', [DatapembayaransppController::class, 'getShow']);
Route::post('/datapembayaranspp/simpanvalidasi', [DatapembayaransppController::class, 'simpanValidasi']);

// Route master data sekolah
Route::post('/datasekolah/wilayah', [DatasekolahController::class, 'cariWilayah']);
Route::post('/datasekolah/store', [DatasekolahController::class, 'store']);
Route::get('/datasekolah/index', [DatasekolahController::class, 'getIndex']);
Route::get('/datasekolah/edit/{id}', [DatasekolahController::class, 'getEdit']);
Route::post('/datasekolah/update', [DatasekolahController::class, 'update']);
Route::get('/datasekolah/hapus/{id}', [DatasekolahController::class, 'destroy']);
Route::get('/datasekolah/show/{id}', [DatasekolahController::class, 'getShow']);

// Route Data Jurusan
Route::post('/datajurusan/store', [DatajurusanController::class, 'store']);
Route::post('/datajurusan/update', [DatajurusanController::class, 'update']);
Route::get('/datajurusan/index', [DatajurusanController::class, 'getIndex']);
Route::get('/datajurusan/hapus/{id}', [DatajurusanController::class, 'destroy']);

// Route data ruang kelas
Route::post('/dataruangkelas/store', [DataruangkelasController::class, 'store']);
Route::get('/dataruangkelas/index', [DataruangkelasController::class, 'getIndex']);
Route::post('/dataruangkelas/update', [DataruangkelasController::class, 'update']);
Route::get('/dataruangkelas/edit/{id}', [DataruangkelasController::class, 'getEdit']);
Route::get('/dataruangkelas/hapus/{id}', [DataruangkelasController::class, 'destroy']);

// Route data mata pelajaran
Route::post('/datamatapelajaran/store', [DatamatapelajaranController::class, 'store']);
Route::get('/datamatapelajaran/index', [DatamatapelajaranController::class, 'getIndex']);
Route::get('/datamatapelajaran/edit/{id}', [DatamatapelajaranController::class, 'getEdit']);
Route::post('/datamatapelajaran/update', [DatamatapelajaranController::class, 'update']);
Route::get('/datamatapelajaran/hapus/{id}', [DatamatapelajaranController::class, 'destroy']);

// Route Manajemen Role
Route::post('/datarole/store', [DataroleController::class, 'store']);
Route::post('/datarole/update', [DataroleController::class, 'update']);
Route::get('/datarole/index', [DataroleController::class, 'getIndex'])->name('admin_dataroleIndex');
Route::get('/datarole/edit/{id}', [DataroleController::class, 'getEdit'])->name('admin_editRole');
Route::get('/datarole/show/{id}', [DataroleController::class, 'getShow']);
Route::get('/datarole/hapus/{id}', [DataroleController::class, 'destroy']);
Route::get('/datarole/hapusfitur/{hak}/{fitur}', [DataroleController::class, 'destroyfitur']);

// Route Data Siswa
Route::post('/datasiswa/store', [DatasiswaController::class, 'store']);
Route::post('/datasiswa/update', [DatasiswaController::class, 'update']);
Route::post('/datasiswa/filter', [DatasiswaController::class, 'filterdata']);
Route::get('/datasiswa/index', [DatasiswaController::class, 'getIndex']);
Route::get('/datasiswa/edit/{id}', [DatasiswaController::class, 'getEdit']);
Route::get('/datasiswa/show/{id}', [DatasiswaController::class, 'getShow']);
Route::get('/datasiswa/hapus/{id}', [DatasiswaController::class, 'destroy']);
Route::post('/datasiswa/importdatasiswa', [DatasiswaController::class, 'importdatasiswa']);
Route::get('/datasiswa/downloadsampelsiswa', [DatasiswaController::class, 'downloadsampelsiswa']);
Route::get('/datasiswa/berkas/{id}', [DatasiswaController::class, 'getBerkas']);
Route::post('/datasiswa/uploadberkas', [DatasiswaController::class, 'uploadberkas']);
Route::post('/datasiswa/ubahberkas', [DatasiswaController::class, 'ubahberkas']);
Route::get('/datasiswa/hapusberkas/{id}', [DatasiswaController::class, 'destroyberkas']);

// Route Data Guru
Route::post('/dataguru/store', [DataguruController::class, 'store']);
Route::post('/dataguru/storekeluarga', [DataguruController::class, 'storekeluarga']);
Route::post('/dataguru/storependidikan', [DataguruController::class, 'storependidikan']);
Route::post('/dataguru/storemapel', [DataguruController::class, 'storemapel']);
Route::post('/dataguru/updatekeluarga', [DataguruController::class, 'updatekeluarga']);
Route::post('/dataguru/updatependidikan', [DataguruController::class, 'updatependidikan']);
Route::post('/dataguru/updatemapel', [DataguruController::class, 'updatemapel']);
Route::post('/dataguru/update', [DataguruController::class, 'update']);
Route::get('/dataguru/index', [DataguruController::class, 'getIndex'])->name('admin_dataguruIndex');
Route::get('/dataguru/edit/{id}', [DataguruController::class, 'getEdit']);
Route::get('/dataguru/showkeluarga/{id}', [DataguruController::class, 'getKeluarga']);
Route::get('/dataguru/hapus/{id}', [DataguruController::class, 'destroyguru'])->name('admin_dataguruHapus');
Route::get('/dataguru/hapuskeluarga/{id}', [DataguruController::class, 'destroykeluarga']);
Route::get('/dataguru/hapuspendidikan/{id}', [DataguruController::class, 'destroypendidikan']);
Route::get('/dataguru/hapusmapel/{id}', [DataguruController::class, 'destroymapel']);
Route::get('/dataguru/showpendidikan/{id}', [DataguruController::class, 'getPendidikan']);
Route::get('/dataguru/showmapel/{id}', [DataguruController::class, 'getMapel']);
Route::get('/dataguru/show/{id}', [DataguruController::class, 'getShow']);
Route::get('/dataguru/show/{id}', [DataguruController::class, 'getShow']);
Route::post('/dataguru/importpegawai', [DataguruController::class, 'importdata']);
Route::get('/dataguru/downloadsampel', [DataguruController::class, 'downloadsampel']);


Route::get('/datasettingsiswa/showkelas/{id}', [DataSettingSiswaController::class, 'getKelas']);
Route::get('/datasettingsiswa/showsiswa/{id}', [DataSettingSiswaController::class, 'getSiswa']);
Route::get('/datasettingsiswa/showtahunsiswa/{id}', [DataSettingSiswaController::class, 'getSiswaTahun']);
Route::get('/datasettingsiswa/show/{kls}/{thn}/{semester}', [DataSettingSiswaController::class, 'getShow']);
Route::get('/datasettingsiswa/hapus/{kls}', [DataSettingSiswaController::class, 'destroy']);
Route::post('/datasettingsiswa/store', [DataSettingSiswaController::class, 'store']);
Route::post('/datasettingsiswa/updatesiswa', [DataSettingSiswaController::class, 'updatesiswa']);
Route::get('/datasettingsiswa/index', [DataSettingSiswaController::class, 'getIndex']);
Route::get('/datasettingsiswa/hapussiswa/{id}', [DataSettingSiswaController::class, 'destroysiswa']);

Route::get('/datakomponennilai/index', [DataKomponenNilaiController::class, 'getIndex']);
Route::post('/datakomponennilai/store', [DataKomponenNilaiController::class, 'store']);
Route::post('/datakomponennilai/update', [DataKomponenNilaiController::class, 'update']);
Route::get('/datakomponennilai/edit/{id}', [DataKomponenNilaiController::class, 'getEdit']);
Route::get('/datakomponennilai/hapus/{id}', [DataKomponenNilaiController::class, 'destroy']);

Route::post('/databobotnilai/store', [DataBobotController::class, 'store']);
Route::post('/databobotnilai/update', [DataBobotController::class, 'update']);
Route::get('/databobotnilai/index', [DataBobotController::class, 'getIndex']);
Route::get('/databobotnilai/edit/{id}', [DataBobotController::class, 'getEdit']);
Route::get('/databobotnilai/hapus/{id}', [DataBobotController::class, 'destroy']);

Route::post('/datauser/store', [DataUserController::class, 'store']);
Route::get('/datauser/edit/{id}', [DataUserController::class, 'getEdit']);
Route::get('/datauser/showuser/{id}', [DataUserController::class, 'getUser']);
Route::get('/datauser/show/{id}', [DataUserController::class, 'getDetail']);
Route::post('/datauser/update', [DataUserController::class, 'update']);
Route::get('/datauser/hapus/{id}', [DataUserController::class, 'destroy']);
Route::get('/datauser/ubahpass/{id}', [DataUserController::class, 'getUbahPass']);
Route::post('/datauser/postubahpass/{id}', [DataUserController::class, 'postUbahPass']);

Route::get('/datapaket/paketpembayaran',[Duit::class, 'paketpembayaran'])->name('paketpembayaran');
Route::get('/datapaket/rekappembayaransiswa',[Duit::class, 'rekappembayaransiswa'])->name('rekappembayaransiswa');
Route::get('/datapaket/siswabelumlunas',[Duit::class, 'siswabelumlunas'])->name('siswabelumlunas');
Route::get('/datapaket/siswabelumlunas/detail',[Duit::class, 'detailtunggakan'])->name('detailbelumlunas');
Route::get('/datapaket/log_pembayaransiswa',[Duit::class, 'log_pembayaransiswa'])->name('log_pembayaransiswa');
Route::get('/datapaket/verifmanualpembayaransiswa',[Duit::class, 'verifmanualpembayaran'])->name('verifmanualpembayaransiswa');
Route::post('/datapaket/simpanpaket',[Duit::class, 'simpanpaket'])->name('simpanpaket');
Route::get('/datapaket/detailpaket/{id}/{nama}',[Duit::class, 'detailpaket'])->name('detailpaket');
Route::get('/datapaket/hapuspaket/{id}',[Duit::class, 'hapuspaket'])->name('hapuspaket');
Route::get('/datapaket/hapusdetailpaket/{id}',[Duit::class, 'hapusdetailpaket'])->name('hapusdetailpaket');
Route::put('/datapaket/tambahkomponenpaket/{id}',[Duit::class, 'tambahkomponenpaket'])->name('tambahkomponenpaket');

Route::get('/datapaket/settingsiswa',[Duit::class, 'settingsiswa'])->name('settingsiswa');
Route::get('/loadsiswa/{id}',[Duit::class, 'loadsiswa'])->name('loadsiswa');
Route::get('/keuangan/listpaketsiswa/{id}',[Duit::class, 'listpaketsiswa'])->name('listpaketsiswa');
Route::get('/datapaket/hapuspaketsiswa/{id}',[Duit::class, 'hapuspaket_siswa'])->name('hapuspaketsiswa');



Route::post('/simpanpaketsiswa',[Duit::class, 'simpanpaketsiswa'])->name('simpanpaketsiswa');

Route::get('/databobotkomponennilai/showkomponen/{id}',[ManajemenNilai::class, 'getShowKomponen'])->name('getShowKomponen');
Route::post('/manajemennilai/simpannilai', [ManajemenNilai::class, 'simpanNilai'])->name('simpannilai');
Route::post('/manajemennilai/updatenilai', [ManajemenNilai::class, 'updateNilai'])->name('updatenilai');
Route::post('/manajemennilai/cekbobot', [ManajemenNilai::class, 'CekBobot'])->name('cekbobot');
Route::post('/manajemennilai/hapuskomponen/{id}', [ManajemenNilai::class, 'CekBobot'])->name('cekbobot');

Route::post('/manajemennilai/simpankomponen', [ManajemenNilai::class, 'SimpanKomponen'])->name('simpankomponen');
Route::get('/manajemennilai/viewnilaikomponen/{id}', [ManajemenNilai::class, 'ViewNilaiKomponen'])->name('viewnilaikomponen');
Route::post('/manajemennilai/cekeditkomponen', [ManajemenNilai::class, 'CekEditKomponen'])->name('cekeditkomponen');
Route::put('/manajemennilai/simpanubah/{id}', [ManajemenNilai::class, 'SimpanUbah'])->name('simpanubah');
Route::get('/manajemennilai/hapuskomponen/{id}', [ManajemenNilai::class, 'HapusKomponen'])->name('HapusKomponen');


Route::get('/datapengumuman/pengumuman',[Mading::class, 'Pengumuman'])->name('pengumuman');
Route::post('/datapengumuman/simpaninfo',[Mading::class, 'simpanPengumuman'])->name('simpaninfo');
Route::post('/datapengumuman/isipengumuman',[Mading::class, 'isiPengumuman'])->name('isipengumuman');
Route::get('/datapengumuman/hapuspengumuman/{id}',[Mading::class, 'HapusPengumuman'])->name('hapuspengumuman');

Route::get('/datapengumuman/cekquery/{id}',[Mading::class, 'cekQuery'])->name('cekquery');

Route::get('/datapengumuman/paketpembayaran',[Duit::class, 'paketpembayaran'])->name('paketpembayaran');
 });
 

// Route::get('/cok', function (){return 'Not Found !';} )->name('cok');
/**
 * INFO: parameter pertama itu url routenya, sementara yang di dalam array adalah Controller yang
 * berada di folder App\Http\Controllers lalu diikuti dengan nama fungsi yang akan dipanggil.
 */
require __DIR__ . '/auth.php';
