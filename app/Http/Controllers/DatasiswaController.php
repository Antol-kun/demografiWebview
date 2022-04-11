<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Carbon\Carbon;
use Alert;
use DataTables;
use Validator;
use App\Imports\SiswaImport;
use Maatwebsite\Excel\Facades\Excel;

class DatasiswaController extends Controller
{

    public function getIndex(Request $request) {
        $kelompokkelas = DB::table('tblkelompokkelas')
                    ->orderBy('idkelompokkls', 'desc')
                    ->get();

        $siswa = DB::table('v_tblsiswa')->orderBy('idsiswa', 'DESC')->get();
       
        $data = [
            'title' => 'Data Siswa',
            'kelompok' => $kelompokkelas,
            'datasiswa' => $siswa,
            'breadcrumb' => [
                ['url' => '/' , 'name' => 'Home'],
                ['url' => '/interface' , 'name' => 'Interface'],
                ['url' => '/master' , 'name' => 'List Data'],
            ],
            
            'testVariable' => 'Siswa'
        ];

         
        return view('datasiswa.index', $data);
    }

    public function importdatasiswa(Request $request)
    {

        $this->validate($request, [
            'dataimport' => 'required|mimes:csv,xls,xlsx'
        ]);
 
        // menangkap file excel
        $file = $request->file('dataimport');
 
        $row = Excel::import(new SiswaImport, $file);

        if($row){
            Alert::success('Berhasil', 'Data berhasil disimpan');
            return redirect('/datasiswa');
        }
    }

    public function downloadsampelsiswa()
    {
        $pathToFile = public_path('sampel/siswa_sampell_rev.xlsx');
        return response()->download($pathToFile);
    }
    
    public function getCreate() {
       // $tahun = DB::table('tabeltahunajaran')->where('statusta', 'Y')->get();
       // $kelas = DB::table('tblkelompokkelas')->distinct('tingkat_kelas')->get();

        $data = [
            'title' => 'Tambah Data Siswa',
            // 'datatahun' => $tahun,
            // 'datakelas' => $kelas,
            'breadcrumb' => [
                ['url' => '/' , 'name' => 'Home'],
                ['url' => '/interface' , 'name' => 'Interface'],
                ['url' => '/master' , 'name' => 'List Data'],
            ],
            
            'testVariable' => 'Data Siswa'
        ];
        
        return view('datasiswa.create', $data);
    }

    public function getEdit($id) {
       $siswa = DB::table('tblsiswa')->where('idsiswa', base64_decode($id))->get();

        $data = [
            'title' => 'Ubah Data Siswa',
            'datasiswa' => $siswa,
            'breadcrumb' => [
                ['url' => '/' , 'name' => 'Home'],
                ['url' => '/interface' , 'name' => 'Interface'],
                ['url' => '/master' , 'name' => 'List Data'],
            ],
            
            'testVariable' => 'Data Siswa'
        ];
        
        return view('datasiswa.edit', $data);
    }

    public function getBerkas($id) {
       $siswa = DB::table('tblsiswa')->where('nisn', base64_decode($id))->get();
       $berkas = DB::table('tblberkas')->where('nisn', base64_decode($id))->orderBy('idberkas', 'DESC')->get();

        $data = [
            'title' => 'Berkas Siswa',
            'datasiswa' => $siswa,
            'databerkas' => $berkas,
            'breadcrumb' => [
                ['url' => '/' , 'name' => 'Home'],
                ['url' => '/interface' , 'name' => 'Interface'],
                ['url' => '/master' , 'name' => 'List Data'],
            ],
            
            'nisn' => $siswa[0]->nisn,
            'testVariable' => 'Data Siswa',
            'testVariable2' => 'Berkas Siswa'
        ];
        
        return view('datasiswa.berkas', $data);
    }

    public function getShow($id) {
       $siswa = DB::table('tblsiswa')->where('idsiswa', base64_decode($id))
                ->get();

        $data = [
            'title' => 'Detail Data Siswa',
            'datasiswa' => $siswa,
            'breadcrumb' => [
                ['url' => '/' , 'name' => 'Home'],
                ['url' => '/interface' , 'name' => 'Interface'],
                ['url' => '/master' , 'name' => 'List Data'],
            ],
            
            'testVariable' => 'Data Siswa'
        ];
        
        return view('datasiswa.show', $data);
    }

    public function store(Request $request)
    {
		
		$batas = request()->validate([
         'pasfoto'  => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($files = $request->file('pasfoto')) {
            //store file into document folder
            $image = $request->file('pasfoto');
            $new_name = rand() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('pasfoto/siswa/'), $new_name);
			
        $data = array(
            'nis' => $request->input('nis'),
            'nisn' => $request->input('nisn'),
            'nama_siswa' => $request->input('nama'),
            'jenkel' => $request->input('jeniskelamin'),
            'tempat_lahir' => $request->input('tempatlahir'),
            'tgl_lahir' => $request->input('tanggallahir'),
            'agama' => $request->input('agama'),
            'nama_ayah' => $request->input('nama_ayah'),
            'nama_ibu' => $request->input('nama_ibu'),
            'alamat' => $request->input('alamat'),
            'ijazah_tahun' => $request->input('tahun'),
            'ijazah_nopes' => $request->input('nopes'),
            'ijazah_no_shun' => $request->input('no_shun'),
            'ijazah_no' => $request->input('no_ijazah'),
            'asal_sekolah' => $request->input('asal_sekolah'),
            'no_telp' => $request->input('no_telp'),
            'tgl_masuk' => $request->input('tgl_masuk'),
            'tgl_keluar' => $request->input('tgl_keluar'),
            'kerja_ayah' => $request->input('kerja_ayah'),
            'kerja_ibu' => $request->input('kerja_ibu'),
            'anak_ke' => $request->input('anak_ke'),
            'reg_date' => Carbon::now()->toDateTimeString(),
            'email_wali' => $request->input('emailwali'),
            'email_siswa' => $request->input('emailsiswa'),
            'status_siswa' => 'BT',
            'no_telp_wali' => $request->input('no_telp_wali'),
            'tahunmasuk' => $request->input('tahun_masuk'),
            'tingkatkelas' => $request->input('tingkat'),
            'statussiswa' => $request->input('status_siswa'),
            'nik' => $request->input('nik'),
            'kk' => $request->input('kk'),
            'foto' => $new_name
        );

        $hakakses = DB::table('tblhakakses')->where('nama_akses','Siswa')->first();
        if(!empty($hakakses)){
            $siswa = DB::table('tblsiswa')->insert($data);

            $seq = DB::table('tbuser')->max('id') + 1; 

            $datakun = DB::table('tbuser')->insert([
                    'id' => $seq,
                    'username' => $request->input('nisn'),
                    'password' => password_hash('12345678', PASSWORD_DEFAULT),
                    'nama' => $request->input('nama'),
                    'email' => $request->input('emailsiswa'),
                    'created_at' => Carbon::now()->toDateTimeString(),
                    'active' => 'TRUE',
                    'id_hakakses' => $hakakses->idhakakses
            ]);

            if($siswa) {
                Alert::success('Berhasil', 'Data berhasil ditambahkan');
                return redirect('/datasiswa');
            }else{
                //DB::rollback();
                Alert::error('Gagal', 'Gagal menambahkan data !');
                return redirect('/datasiswa/create');
            }
        }else{
            Alert::warning('Perhatian !', 'Data role Siswa belum dibuat !');
            return redirect('/datasiswa/create');
        }
		
		}else{
			$data = array(
            'nis' => $request->input('nis'),
            'nisn' => $request->input('nisn'),
            'nama_siswa' => $request->input('nama'),
            'jenkel' => $request->input('jeniskelamin'),
            'tempat_lahir' => $request->input('tempatlahir'),
            'tgl_lahir' => $request->input('tanggallahir'),
            'agama' => $request->input('agama'),
            'nama_ayah' => $request->input('nama_ayah'),
            'nama_ibu' => $request->input('nama_ibu'),
            'alamat' => $request->input('alamat'),
            'ijazah_tahun' => $request->input('tahun'),
            'ijazah_nopes' => $request->input('nopes'),
            'ijazah_no_shun' => $request->input('no_shun'),
            'ijazah_no' => $request->input('no_ijazah'),
            'asal_sekolah' => $request->input('asal_sekolah'),
            'no_telp' => $request->input('no_telp'),
            'tgl_masuk' => $request->input('tgl_masuk'),
            'tgl_keluar' => $request->input('tgl_keluar'),
            'kerja_ayah' => $request->input('kerja_ayah'),
            'kerja_ibu' => $request->input('kerja_ibu'),
            'anak_ke' => $request->input('anak_ke'),
            'reg_date' => Carbon::now()->toDateTimeString(),
            'email_wali' => $request->input('emailwali'),
            'email_siswa' => $request->input('emailsiswa'),
            'status_siswa' => 'BT',
            'no_telp_wali' => $request->input('no_telp_wali'),
            'tahunmasuk' => $request->input('tahun_masuk'),
            'tingkatkelas' => $request->input('tingkat'),
            'statussiswa' => $request->input('status_siswa'),
            'nik' => $request->input('nik'),
            'kk' => $request->input('kk')
        );

        $hakakses = DB::table('tblhakakses')->where('nama_akses','Siswa')->first();
        if(!empty($hakakses)){
            $siswa = DB::table('tblsiswa')->insert($data);

            $seq = DB::table('tbuser')->max('id') + 1; 

            $datakun = DB::table('tbuser')->insert([
                    'id' => $seq,
                    'username' => $request->input('nisn'),
                    'password' => password_hash('12345678', PASSWORD_DEFAULT),
                    'nama' => $request->input('nama'),
                    'email' => $request->input('emailsiswa'),
                    'created_at' => Carbon::now()->toDateTimeString(),
                    'active' => 'TRUE',
                    'id_hakakses' => $hakakses->idhakakses
            ]);

            if($siswa) {
                Alert::success('Berhasil', 'Data berhasil ditambahkan');
                return redirect('/datasiswa');
            }else{
                //DB::rollback();
                Alert::error('Gagal', 'Gagal menambahkan data !');
                return redirect('/datasiswa/create');
            }
        }else{
            Alert::warning('Perhatian !', 'Data role Siswa belum dibuat !');
            return redirect('/datasiswa/create');
        }
		}
    }

    public function update(Request $request)
    {
		$request->validate([
         'pasfoto'  => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

      
            if ($files = $request->file('pasfoto')) {
            $datasiswa = DB::table('tblsiswa')->where('idsiswa',$request->input('id'))->get();
            if($datasiswa[0]->foto == NULL){
                //store file into document folder
                $image = $request->file('pasfoto');
                $new_name = rand() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('pasfoto/siswa/'), $new_name);
            }else{
                 unlink(public_path('pasfoto/siswa/'.$datasiswa[0]->foto));
            
                //store file into document folder
                $image = $request->file('pasfoto');
                $new_name = rand() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('pasfoto/siswa/'), $new_name);
            }
                //$this->delete_image($datasiswa[0]->foto);
            //  unlink(public_path('pasfoto/siswa/'.$datasiswa[0]->foto));
                
      //           //store file into document folder
      //           $image = $request->file('pasfoto');
      //           $new_name = rand() . '.' . $image->getClientOriginalExtension();
      //           $image->move(public_path('pasfoto/siswa/'), $new_name);
                
                $data = array(
                    'nis' => $request->input('nis'),
                    'nisn' => $request->input('nisn'),
                    'nama_siswa' => $request->input('nama'),
                    'jenkel' => $request->input('jeniskelamin'),
                    'tempat_lahir' => $request->input('tempatlahir'),
                    'tgl_lahir' => $request->input('tanggallahir'),
                    'agama' => $request->input('agama'),
                    'nama_ayah' => $request->input('nama_ayah'),
                    'nama_ibu' => $request->input('nama_ibu'),
                    'alamat' => $request->input('alamat'),
                    'ijazah_tahun' => $request->input('tahun'),
                    'ijazah_nopes' => $request->input('nopes'),
                    'ijazah_no_shun' => $request->input('no_shun'),
                    'ijazah_no' => $request->input('no_ijazah'),
                    'asal_sekolah' => $request->input('asal_sekolah'),
                    'no_telp' => $request->input('no_telp'),
                    'tgl_masuk' => $request->input('tgl_masuk'),
                    'tgl_keluar' => $request->input('tgl_keluar'),
                    'kerja_ayah' => $request->input('kerja_ayah'),
                    'kerja_ibu' => $request->input('kerja_ibu'),
                    'anak_ke' => $request->input('anak_ke'),
                    'reg_date' => Carbon::now()->toDateTimeString(),
                    'email_wali' => $request->input('emailwali'),
                    'email_siswa' => $request->input('emailsiswa'),
                    'no_telp_wali' => $request->input('no_telp_wali'),
                    'tahunmasuk' => $request->input('tahun_masuk'),
                    'tingkatkelas' => $request->input('tingkat'),
                    'statussiswa' => $request->input('status_siswa'),
                    'nik' => $request->input('nik'),
                    'kk' => $request->input('kk'),
                    'foto' => $new_name
                );

                $siswa = DB::table('tblsiswa')->where('idsiswa', $request->input('id'))->update($data);
                if($siswa) {
                    Alert::success('Berhasil', 'Data berhasil diubah');
                    return redirect('/datasiswa');
                }else{
                    //DB::rollback();
                    Alert::error('Gagal', 'Gagal mengubah data !');
                    return redirect()->back(); 
                }
                
                }else{
                    $data = array(
                    'nis' => $request->input('nis'),
                    'nisn' => $request->input('nisn'),
                    'nama_siswa' => $request->input('nama'),
                    'jenkel' => $request->input('jeniskelamin'),
                    'tempat_lahir' => $request->input('tempatlahir'),
                    'tgl_lahir' => $request->input('tanggallahir'),
                    'agama' => $request->input('agama'),
                    'nama_ayah' => $request->input('nama_ayah'),
                    'nama_ibu' => $request->input('nama_ibu'),
                    'alamat' => $request->input('alamat'),
                    'ijazah_tahun' => $request->input('tahun'),
                    'ijazah_nopes' => $request->input('nopes'),
                    'ijazah_no_shun' => $request->input('no_shun'),
                    'ijazah_no' => $request->input('no_ijazah'),
                    'asal_sekolah' => $request->input('asal_sekolah'),
                    'no_telp' => $request->input('no_telp'),
                    'tgl_masuk' => $request->input('tgl_masuk'),
                    'tgl_keluar' => $request->input('tgl_keluar'),
                    'kerja_ayah' => $request->input('kerja_ayah'),
                    'kerja_ibu' => $request->input('kerja_ibu'),
                    'anak_ke' => $request->input('anak_ke'),
                    'reg_date' => Carbon::now()->toDateTimeString(),
                    'email_wali' => $request->input('emailwali'),
                    'email_siswa' => $request->input('emailsiswa'),
                    'no_telp_wali' => $request->input('no_telp_wali'),
                    'tahunmasuk' => $request->input('tahun_masuk'),
                    'tingkatkelas' => $request->input('tingkat'),
                    'statussiswa' => $request->input('status_siswa'),
                    'nik' => $request->input('nik'),
                    'kk' => $request->input('kk')
                );

                $siswa = DB::table('tblsiswa')->where('idsiswa', $request->input('id'))->update($data);
                if($siswa) {
                    Alert::success('Berhasil', 'Data berhasil diubah');
                    return redirect('/datasiswa');
                }else{
                    //DB::rollback();
                    Alert::error('Gagal', 'Gagal mengubah data !');
                    return redirect()->back(); 
                }
            }
    }

    public function uploadberkas(Request $request)
    {
        $batas = request()->validate([
         'berkas'  => 'required|mimes:pdf|max:2048',
        ]);
        
        if ($files = $request->file('berkas')) {
            //store file into document folder
            $image = $request->file('berkas');
            $new_name = rand() . '.' . $image->getClientOriginalExtension();
            if($request->input('jenis') == 'Ijazah'){
                $image->move(public_path('berkas/siswa/ijazah/'), $new_name);
            }else if($request->input('jenis') == 'Akta_lahir'){
                $image->move(public_path('berkas/siswa/akta/'), $new_name);
            }else if($request->input('jenis') == 'KK'){
                $image->move(public_path('berkas/siswa/kk/'), $new_name);
            }

            $data = array(
                'jenis_berkas' => $request->input('jenis'),                
                'no_berkas' => $request->input('nomor'),                
                'file_berkas' => $new_name,                
                'reg_date' => Carbon::now()->toDateTimeString(),                
                'nisn' => $request->input('nisn')
            );

            $upload = DB::table('tblberkas')->insert($data);
            if($upload) {
                Alert::success('Berhasil', 'Berkas siswa berhasil di upload');
                return redirect()->back(); 
            }else{
                //DB::rollback();
                Alert::error('Gagal', 'Gagal mengubah data !');
                return redirect()->back(); 
            }
        }
        
    }

    public function ubahberkas(Request $request)
    {
        $batas = request()->validate([
         'berkas'  => 'mimes:pdf|max:2048',
        ]);
        
        if ($files = $request->file('berkas')) {
            //store file into document folder
            $databerkas = DB::table('tblberkas')->where('idberkas',$request->input('id'))->get();
            
            if($request->input('jenis') == 'Ijazah'){
                $this->delete_file($databerkas[0]->file_berkas, 'ijazah');
            }else if($request->input('jenis') == 'Akta_lahir'){
                $this->delete_file($databerkas[0]->file_berkas, 'akta');
            }else if($request->input('jenis') == 'KK'){
                $this->delete_file($databerkas[0]->file_berkas, 'kk');
            }

            $image = $request->file('berkas');
            $new_name = rand() . '.' . $image->getClientOriginalExtension();
            if($request->input('jenis') == 'Ijazah'){
                $image->move(public_path('berkas/siswa/ijazah/'), $new_name);
            }else if($request->input('jenis') == 'Akta_lahir'){
                $image->move(public_path('berkas/siswa/akta/'), $new_name);
            }else if($request->input('jenis') == 'KK'){
                $image->move(public_path('berkas/siswa/kk/'), $new_name);
            }

            $data = array(
                'jenis_berkas' => $request->input('jenis'),                
                'no_berkas' => $request->input('nomor'),                
                'file_berkas' => $new_name,                
                'reg_date' => Carbon::now()->toDateTimeString(),                
                'nisn' => $request->input('nisn')
            );

            $upload = DB::table('tblberkas')->where('idberkas', $request->input('id'))->update($data);
            if($upload) {
                Alert::success('Berhasil', 'Berkas siswa berhasil di ubah');
                return redirect()->back(); 
            }else{
                //DB::rollback();
                Alert::error('Gagal', 'Gagal mengubah berkas !');
                return redirect()->back(); 
            }
        }else{
            $data = array(
                'jenis_berkas' => $request->input('jenis'),                
                'no_berkas' => $request->input('nomor'),              
                'reg_date' => Carbon::now()->toDateTimeString(),                
                'nisn' => $request->input('nisn')
            );

            $upload = DB::table('tblberkas')->where('idberkas', $request->input('id'))->update($data);
            if($upload) {
                Alert::success('Berhasil', 'Berkas siswa berhasil di ubah');
                return redirect()->back(); 
            }else{
                //DB::rollback();
                Alert::error('Gagal', 'Gagal mengubah berkas !');
                return redirect()->back(); 
            }
        }
        
    }

    public function filterdata(Request $request)
    {
        $kelas = $request->input('kelas');
        $kelompokkelas = DB::table('tblkelompokkelas')
                    ->orderBy('idkelompokkls', 'desc')
                    ->get();       

        if($kelas != null){
            $siswa = DB::table('v_tblsiswa')->where('kode_kelompok', $kelas)->orderBy('idsiswa', 'DESC')->get();
        }else{
            $siswa = DB::table('v_tblsiswa')->orderBy('idsiswa', 'DESC')->get();
        }
       
        $data = [
            'title' => 'Data Siswa',
            'kelompok' => $kelompokkelas,
            'datasiswa' => $siswa,
            'breadcrumb' => [
                ['url' => '/' , 'name' => 'Home'],
                ['url' => '/interface' , 'name' => 'Interface'],
                ['url' => '/master' , 'name' => 'List Data'],
            ],
            
            'testVariable' => 'Siswa'
        ];

        return view('datasiswa.filter', $data);
    }

    public function destroy($id)
    {
        $idsiswa = base64_encode($id);
        $siswa =  DB::table('tblsiswa')->where('idsiswa', base64_decode($idsiswa));
        
		$datasiswa = DB::table('tblsiswa')->where('idsiswa', base64_decode($idsiswa))->get();
		if(count($datasiswa) > 0){
            $this->delete_image($datasiswa[0]->foto);
        }

        $datauser = DB::table('tbuser')->where('username',$datasiswa[0]->nisn);
        $datauser->delete();
        $siswa->delete();

        if($siswa) {
            return response()->json(['message'=>'Berhasil']);
        }else{
            return response()->json(['message'=>'Gagal !']);
        }
    }

    public function destroyberkas($id)
    {
        $berkas =  DB::table('tblberkas')->where('idberkas', $id);
        
        $databerkas = DB::table('tblberkas')->where('idberkas', $id)->get();
        if(count($databerkas) > 0){
            if($databerkas[0]->jenis_berkas == 'Ijazah'){
                $this->delete_file($databerkas[0]->file_berkas, 'ijazah');
            }else if($databerkas[0]->jenis_berkas == 'Akta_lahir'){
                $this->delete_file($databerkas[0]->file_berkas, 'akta');
            }else if($databerkas[0]->jenis_berkas == 'KK'){
                $this->delete_file($databerkas[0]->file_berkas, 'kk');
            }
        }

        $berkas->delete();

        if($berkas) {
            return response()->json(['message'=>'Berhasil']);
        }else{
            return response()->json(['message'=>'Gagal !']);
        }
    }
	
	function delete_image($img)
    {
        if ($img && file_exists(public_path('pasfoto/siswa/'.$img)))
            return unlink(public_path('pasfoto/siswa/'.$img));
        // return $img;
    }

    function delete_file($file, $jenis)
    {
        if ($file && file_exists(public_path('berkas/siswa/'.$jenis.'/'.$file)))
            return unlink(public_path('berkas/siswa/'.$jenis.'/'.$file));
        // return $img;
    }

}
