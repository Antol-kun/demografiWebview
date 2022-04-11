<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Carbon\Carbon;
use Alert;
use DataTables;
use App\Imports\PegawaiImport;
use Maatwebsite\Excel\Facades\Excel;

class DataguruController extends Controller
{
    //
    public function getIndex(Request $request) {
        $guru = DB::table('tabelguru')->orderBy('id', 'DESC')->get();

        $data = [
            'title' => 'Data Pegawai',
            'dataguru' => $guru,
            'breadcrumb' => [
                ['url' => '/' , 'name' => 'Home'],
                ['url' => '/interface' , 'name' => 'Interface'],
                ['url' => '/master' , 'name' => 'List Data'],
            ],
            
            'testVariable' => 'Pegawai'
        ];
        
        return view('dataguru.index', $data);
    }

    public function importdata(Request $request)
    {

        $this->validate($request, [
            'dataimport' => 'required|mimes:csv,xls,xlsx'
        ]);
 
        // menangkap file excel
        $file = $request->file('dataimport');
 
        $row = Excel::import(new PegawaiImport, $file);

        if($row){
            Alert::success('Berhasil', 'Data berhasil disimpan');
            return redirect('/dataguru');
        }
    }

    public function downloadsampel()
    {
        $pathToFile = public_path('sampel/pegawai_sampel.xlsx');
        return response()->download($pathToFile);
    }

    public function getKeluarga(Request $request) {
        $keluarga = DB::table('tblkeluarga')->whereNotNull('nama_keluarga')->where('idguru', base64_decode($request->id))->get();
        
        $data = [
            'title' => 'Data keluarga',
            'datakeluarga' => $keluarga,
            'breadcrumb' => [
                ['url' => '/' , 'name' => 'Home'],
                ['url' => '/interface' , 'name' => 'Interface'],
                ['url' => '/master' , 'name' => 'List Data'],
            ],
            
            'testVariable' => 'Keluarga',
            'idguru' => base64_decode($request->id),
        ];

        return view('dataguru.showkeluarga', $data);
        // print_r($keluarga);
    }

    public function getPendidikan(Request $request) {
        $pendidikan = DB::table('tabelPendidikanGuru')->whereNotNull('Jenjang')->where('idguru', base64_decode($request->id))->get();
        
        $data = [
            'title' => 'Data jenjang pendidikan',
            'datajenjang' => $pendidikan,
            'breadcrumb' => [
                ['url' => '/' , 'name' => 'Home'],
                ['url' => '/interface' , 'name' => 'Interface'],
                ['url' => '/master' , 'name' => 'List Data'],
            ],
            
            'testVariable' => 'Pendidikan',
            'idguru' => base64_decode($request->id),
        ];

        return view('dataguru.showjenjang', $data);
        // print_r($keluarga);
    }

    public function getMapel(Request $request) {
        $mapel = DB::table('tblmapeldiampu')
                    // ->select('league_name')
                    ->join('tblmapel', 'tblmapel.idmapel', '=', 'tblmapeldiampu.idmapel')
                    ->where('idguru', $request->id)
                    ->get();

        $tbmapel = DB::table('tblmapel')->where('status_mapel','Y')->get();
        
        $data = [
            'title' => 'Data mapel yang di ampu',
            'datamapel' => $mapel,
            'tblmapel' => $tbmapel,
            'breadcrumb' => [
                ['url' => '/' , 'name' => 'Home'],
                ['url' => '/interface' , 'name' => 'Interface'],
                ['url' => '/master' , 'name' => 'List Data'],
            ],
            
            'testVariable' => 'Mapel yang diampu',
            'idguru' => $request->id,
        ];

        return view('dataguru.showmapel', $data);
        // print_r($keluarga);
    }
    
    public function getCreate() {
        $mapel = DB::table('tblmapel')->where('status_mapel','Y')->get();

        $data = [
            'title' => 'Tambah Data Pegawai',
            'datamapel' => $mapel,
            'breadcrumb' => [
                ['url' => '/' , 'name' => 'Home'],
                ['url' => '/interface' , 'name' => 'Interface'],
                ['url' => '/master' , 'name' => 'List Data'],
            ],
            
            'testVariable' => 'Pegawai'
        ];
        
        return view('dataguru.create', $data);
    }

    public function getEdit($id) {
        $mapel = DB::table('tblmapel')->where('status_mapel','Y')->get();
        $guru = DB::table('tabelguru')->where('id',base64_decode($id))->get();

        $data = [
            'title' => 'Ubah Data Pegawai',
            'datamapel' => $mapel,
            'dataguru' => $guru,
            'breadcrumb' => [
                ['url' => '/' , 'name' => 'Home'],
                ['url' => '/interface' , 'name' => 'Interface'],
                ['url' => '/master' , 'name' => 'List Data'],
            ],
            
            'testVariable' => 'Pegawai',
            'editkeluarga' => base64_decode($id),
            'editjenjang' => base64_decode($id),
            'editmapel' => base64_decode($id),
        ];
        
        return view('dataguru.edit', $data);
    }

    public function getShow($id) {
        // $mapel = DB::table('tblmapel')->where('status_mapel','Y')->get();
        $guru = DB::table('tabelguru')->where('id',base64_decode($id))->get();
        $keluarga = DB::table('tblkeluarga')->where('idguru', base64_decode($id))->whereNotNull('nama_keluarga')->get();
        $pendidikan = DB::table('tabelPendidikanGuru')->whereNotNull('Jenjang')->where('idguru', base64_decode($id))->get();
        $mapel = DB::table('v_tabelsetting_jadwal')
                    ->where('idguru', base64_decode($id))
                    ->get();

        $data = [
            'title' => 'Detail Data Pegawai',
            'datamapel' => $mapel,
            'dataguru' => $guru,
            'datakeluarga' => $keluarga,
            'datajenjang' => $pendidikan,
            'breadcrumb' => [
                ['url' => '/' , 'name' => 'Home'],
                ['url' => '/interface' , 'name' => 'Interface'],
                ['url' => '/master' , 'name' => 'List Data'],
            ],
            
            'testVariable' => 'Pegawai'
        ];
        
        return view('dataguru.show', $data);
    }

    public function update(Request $request)
    {   
        $batas = request()->validate([
         'pasfoto'  => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        
        if ($files = $request->file('pasfoto')) {
            $dataguru = DB::table('tabelguru')->where('id',$request->input('id'))->get();
            $this->delete_image($dataguru[0]->paspoto);
            
            //store file into document folder
            $image = $request->file('pasfoto');
            $new_name = rand() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('pasfoto/guru/'), $new_name);
        
        $for_query = '';
        $tugas = $request->input('tugas');
        if(!empty($tugas)){
            foreach ($tugas as $key) {            
                $for_query .= $key . ', ';
            }
        }
        $for_query = substr($for_query, 0, -2);
        
        $data = array(
            'Nip' => $request->input('nip'),
            'Nik' => $request->input('nik'),
            'Nama' => $request->input('nama_lengkap'),
            'Agama' => $request->input('agama'),
            'Tempatlahir' => $request->input('tempatlahir'),
            'Tanggallahir' => $request->input('tanggallahir'),
            'Jeniskelamin' => $request->input('jenkel'),
            'Alamat' => $request->input('alamat'),
            'NoHp' => $request->input('notelp'),
            'Email' => $request->input('email'),
            'Jabatan' => $request->input('jabatan'),
            'Pangkat' => $request->input('pangkat'),
            'Golongan' => $request->input('golongan'),
            'NUPTK' => $request->input('nuptk'),
            'StatusMenikah' => $request->input('status_marital'),
            'Goldarah' => $request->input('gol_darah'),
            'Gelardepan' => $request->input('gelar_depan'),
            'Gelarbelakang' => $request->input('gelar_belakang'),
            'Tahunmasuk' => $request->input('tmt'),
            'Jabatansekolah' => $for_query,
            'Niy' => $request->input('niy'),
            'status_guru' => $request->input('status_guru'),
            'balas_bakti_15_tahun' => $request->input('bakti_15'),
            'balas_bakti_25_tahun' => $request->input('bakti_25'),
            'pensiun_55_tahun' => $request->input('pensiun'),
            'masa_perpanjangan_1' => $request->input('perpanjangan_pertama'),
            'masa_perpanjangan_2' => $request->input('perpanjangan_kedua'),
            'masa_perpanjangan_3' => $request->input('perpanjangan_ketiga'),
            'sertifikasi' => $request->input('sertifikasi'),
            'reg_date' => Carbon::now()->toDateTimeString(),
            'paspoto' => $new_name
        );

        $ubah = DB::table('tabelguru')->where('id',$request->input('id'))->update($data);
        if($ubah) {
                Alert::success('Berhasil', 'Data berhasil diubah');
                return redirect('/dataguru');
            }else{
                //DB::rollback();
                Alert::error('Gagal', 'Gagal mengubah data !');
                return redirect('/dataguru/'.$request->input('id'));
            }
            
        }else{
            $for_query = '';
            $tugas = $request->input('tugas');
            if(!empty($tugas)){
                foreach ($tugas as $key) {            
                    $for_query .= $key . ', ';
                }
            }
            $for_query = substr($for_query, 0, -2);
            
            $data = array(
                'Nip' => $request->input('nip'),
                'Nik' => $request->input('nik'),
                'Nama' => $request->input('nama_lengkap'),
                'Agama' => $request->input('agama'),
                'Tempatlahir' => $request->input('tempatlahir'),
                'Tanggallahir' => $request->input('tanggallahir'),
                'Jeniskelamin' => $request->input('jenkel'),
                'Alamat' => $request->input('alamat'),
                'NoHp' => $request->input('notelp'),
                'Email' => $request->input('email'),
                'Jabatan' => $request->input('jabatan'),
                'Pangkat' => $request->input('pangkat'),
                'Golongan' => $request->input('golongan'),
                'NUPTK' => $request->input('nuptk'),
                'StatusMenikah' => $request->input('status_marital'),
                'Goldarah' => $request->input('gol_darah'),
                'Gelardepan' => $request->input('gelar_depan'),
                'Gelarbelakang' => $request->input('gelar_belakang'),
                'Tahunmasuk' => $request->input('tmt'),
                'Jabatansekolah' => $for_query,
                'Niy' => $request->input('niy'),
                'status_guru' => $request->input('status_guru'),
                'balas_bakti_15_tahun' => $request->input('bakti_15'),
                'balas_bakti_25_tahun' => $request->input('bakti_25'),
                'pensiun_55_tahun' => $request->input('pensiun'),
                'masa_perpanjangan_1' => $request->input('perpanjangan_pertama'),
                'masa_perpanjangan_2' => $request->input('perpanjangan_kedua'),
                'masa_perpanjangan_3' => $request->input('perpanjangan_ketiga'),
                'sertifikasi' => $request->input('sertifikasi'),
                'reg_date' => Carbon::now()->toDateTimeString()
            );

            // $hakakses = DB::table('tblhakakses')->where('nama_akses','Guru')->first();
            // if(!empty($hakakses)){

            //     $cekakun = DB::table('tbuser')->where('username', $request->input('nip'))->first();
            //     if(!empty($cekakun)){
            //         if($for_query == 'Guru' OR $for_query == 'Guru, Staff'){
            //             // $seq = DB::table('tbuser')->max('id') + 1; 
            //             // $sethak = DB::table('tblhakakses')->where('id_hakakses', $cekakun->idhakakses)->first();

            //             $datakun = DB::table('tbuser')->where('id',$request->input('id'))->update([
            //                     // 'id' => $seq,
            //                     'username' => $request->input('nip'),
            //                     'password' => password_hash('12345678', PASSWORD_DEFAULT),
            //                     'nama' => $request->input('nama_lengkap'),
            //                     'email' => $request->input('email'),
            //                     'created_at' => Carbon::now()->toDateTimeString(),
            //                     'active' => 'TRUE',
            //                     'id_hakakses' => $cekakun->id_hakakses
            //             ]);
            //         }
            //     }else{
            //         if($for_query == 'Guru' OR $for_query == 'Guru, Staff'){
            //             $seq = DB::table('tbuser')->max('id') + 1; 

            //             $datakun = DB::table('tbuser')->insert([
            //                     'id' => $seq,
            //                     'username' => $request->input('nip'),
            //                     'password' => password_hash('12345678', PASSWORD_DEFAULT),
            //                     'nama' => $request->input('nama_lengkap'),
            //                     'email' => $request->input('email'),
            //                     'created_at' => Carbon::now()->toDateTimeString(),
            //                     'active' => 'TRUE',
            //                     'id_hakakses' => $hakakses->idhakakses
            //             ]);
            //         }
            //     }
                

            // }else{
            //     Alert::warning('Perhatian !', 'Data role Guru belum dibuat !');
            //     return redirect('/dataguru');
            // }

            // $cekusers = DB::table('tbuser')
            //             ->where('username', $request->input('nip'))
            //             ->first();

            // foreach($cekusers as $var){
            //     $cekakun = DB::table('tbuser')
            //             ->where('username', $request->input('nip'))
            //             ->where('id_hakakses', $cekusers->id_hakakses)
            //             ->first();

            //     print_r($)
            //}

            // if($for_query == 'Guru, Staff'){
            //         echo "Hapus Staff";
            //     }else if($for_query == 'Guru'){
            //         echo "Hapus Staff";
            //     }else if($for_query == 'Staff'){
            //         echo "Hapus Guru";
            //     }
            
            $ubah = DB::table('tabelguru')->where('id',$request->input('id'))->update($data);
            if($ubah) {
                    Alert::success('Berhasil', 'Data berhasil diubah');
                    return redirect('/dataguru');
            }else{
                //DB::rollback();
                Alert::error('Gagal', 'Gagal mengubah data !');
                return redirect('/dataguru/'.$request->input('id'));
            }           
        }

    }

    public function store(Request $request)
    {
        $nama = $request->input('nama');
        $hubungan = $request->input('hubungan');
        $tmplahir = $request->input('tempatlahirkeluarga');
        $tgllahir = $request->input('tgllahirkeluarga');

        $jenjang = $request->input('jenjang');
        $kampus = $request->input('kampus');
        $prodi = $request->input('prodi');
        $tahunmasuk = $request->input('tahunmasuk');
        $tahunkeluar = $request->input('tahunkeluar');
        $ipk = $request->input('ipk');

        $batas = request()->validate([
         'pasfoto'  => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($files = $request->file('pasfoto')) {
            //store file into document folder
            $image = $request->file('pasfoto');
            $new_name = rand() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('pasfoto/guru/'), $new_name);

            // $mapel = $request->input('mapel');
            // $jam = $request->input('jumlah_jam');
            // $kelas = $request->input('kelas');
            $idguru="";

            $for_query = '';
            $tugas = $request->input('tugas');
            if(!empty($tugas)){
                foreach ($tugas as $key) {            
                    $for_query .= $key . ', ';
                }
            }
            $for_query = substr($for_query, 0, -2);
            
            $data = array(
                'Nip' => $request->input('nip'),
                'Nik' => $request->input('nik'),
                'Nama' => $request->input('nama_lengkap'),
                'Agama' => $request->input('agama'),
                'Tempatlahir' => $request->input('tempatlahir'),
                'Tanggallahir' => $request->input('tanggallahir'),
                'Jeniskelamin' => $request->input('jenkel'),
                'Alamat' => $request->input('alamat'),
                'NoHp' => $request->input('notelp'),
                'Email' => $request->input('email'),
                'Jabatan' => $request->input('jabatan'),
                'Pangkat' => $request->input('pangkat'),
                'Golongan' => $request->input('golongan'),
                'NUPTK' => $request->input('nuptk'),
                'StatusMenikah' => $request->input('status_marital'),
                'Goldarah' => $request->input('gol_darah'),
                'Gelardepan' => $request->input('gelar_depan'),
                'Gelarbelakang' => $request->input('gelar_belakang'),
                'Tahunmasuk' => $request->input('tmt'),
                'Jabatansekolah' => $for_query,
                'Niy' => $request->input('niy'),
                'status_guru' => $request->input('status_guru'),
                'balas_bakti_15_tahun' => $request->input('bakti_15'),
                'balas_bakti_25_tahun' => $request->input('bakti_25'),
                'pensiun_55_tahun' => $request->input('pensiun'),
                'masa_perpanjangan_1' => $request->input('perpanjangan_pertama'),
                'masa_perpanjangan_2' => $request->input('perpanjangan_kedua'),
                'masa_perpanjangan_3' => $request->input('perpanjangan_ketiga'),
                'sertifikasi' => $request->input('sertifikasi'),
                'reg_date' => Carbon::now()->toDateTimeString(),
                'paspoto' => $new_name
            );


            $hakakses = DB::table('tblhakakses')->where('nama_akses','Guru')->first();
            if(!empty($hakakses)){
                
                $simpan = DB::table('tabelguru')->insert($data);        
                $idgr =  DB::table('tabelguru')->latest('id')->first();
                $idguru = $idgr->id; 

                if(!empty($hubungan)){
                    for($a=0;$a<count($hubungan); $a++){
                        $tgllahirs = date('Y', strtotime($tgllahir[$a]));
                        $thnsekarang = Carbon::now()->format('Y');
                        $umur = $thnsekarang - $tgllahirs;

                        $datakeluarga = array(
                            'idguru' => $idguru,
                            'nama_keluarga' => $nama[$a],
                            'hubungan' => $hubungan[$a],
                            'tempat_lahir' => $tmplahir[$a],
                            'tgl_lahir_keluarga' => $tgllahir[$a],
                            'umur_anak' => $umur,
                            'reg_date' => Carbon::now()->toDateTimeString()
                        );
                        $simpan = DB::table('tblkeluarga')->insert($datakeluarga);
                    }
                }

                if(!empty($jenjang)){
                        for($b=0;$b<count($jenjang); $b++){
                        $datapendidikan = array(
                            'idguru' => $idguru,
                            'Jenjang' => $jenjang[$b],
                            'Asalperguruantinggi' => $kampus[$b],
                            'Prodi' => $prodi[$b],
                            'Tahunmasuk' => $tahunmasuk[$b],
                            'Tahunkeluar' => $tahunkeluar[$b],
                            'Ipk' => $ipk[$b],
                            'reg_date' => Carbon::now()->toDateTimeString()
                        );
                        $simpan = DB::table('tabelPendidikanGuru')->insert($datapendidikan);
                    }
                }

                if($for_query == 'Guru' OR $for_query == 'Guru, Staff'){
                    $seq = DB::table('tbuser')->max('id') + 1; 

                    $datakun = DB::table('tbuser')->insert([
                            'id' => $seq,
                            'username' => $request->input('nip'),
                            'password' => password_hash('12345678', PASSWORD_DEFAULT),
                            'nama' => $request->input('nama_lengkap'),
                            'email' => $request->input('email'),
                            'created_at' => Carbon::now()->toDateTimeString(),
                            'active' => 'TRUE',
                            'id_hakakses' => $hakakses->idhakakses
                    ]);
                }

                // for($c=0;$c<count($mapel); $c++){
                //     $datamapel = array(
                //         'idguru' => $idguru,
                //         'idmapel' => $mapel[$c],
                //         'jumlah_jam' => $jam[$c],
                //         'kelas' => $kelas[$c],
                //         'reg_date' => Carbon::now()->toDateTimeString()
                //     );
                //     $simpan = DB::table('tblmapeldiampu')->insert($datamapel);
                // }

                Alert::success('Berhasil', 'Data berhasil disimpan');
                return redirect('/dataguru');
            }else{
                Alert::warning('Perhatian !', 'Data role Guru belum dibuat !');
                return redirect('/dataguru/create');
            }

        }else{

            // $mapel = $request->input('mapel');
            // $jam = $request->input('jumlah_jam');
            // $kelas = $request->input('kelas');
            $idguru="";

            $for_query = '';
            $tugas = $request->input('tugas');
            if(!empty($tugas)){
                foreach ($tugas as $key) {            
                    $for_query .= $key . ', ';
                }
            }
            $for_query = substr($for_query, 0, -2);
            
            $data = array(
                'Nip' => $request->input('nip'),
                'Nik' => $request->input('nik'),
                'Nama' => $request->input('nama_lengkap'),
                'Agama' => $request->input('agama'),
                'Tempatlahir' => $request->input('tempatlahir'),
                'Tanggallahir' => $request->input('tanggallahir'),
                'Jeniskelamin' => $request->input('jenkel'),
                'Alamat' => $request->input('alamat'),
                'NoHp' => $request->input('notelp'),
                'Email' => $request->input('email'),
                'Jabatan' => $request->input('jabatan'),
                'Pangkat' => $request->input('pangkat'),
                'Golongan' => $request->input('golongan'),
                'NUPTK' => $request->input('nuptk'),
                'StatusMenikah' => $request->input('status_marital'),
                'Goldarah' => $request->input('gol_darah'),
                'Gelardepan' => $request->input('gelar_depan'),
                'Gelarbelakang' => $request->input('gelar_belakang'),
                'Tahunmasuk' => $request->input('tmt'),
                'Jabatansekolah' => $for_query,
                'Niy' => $request->input('niy'),
                'status_guru' => $request->input('status_guru'),
                'balas_bakti_15_tahun' => $request->input('bakti_15'),
                'balas_bakti_25_tahun' => $request->input('bakti_25'),
                'pensiun_55_tahun' => $request->input('pensiun'),
                'masa_perpanjangan_1' => $request->input('perpanjangan_pertama'),
                'masa_perpanjangan_2' => $request->input('perpanjangan_kedua'),
                'masa_perpanjangan_3' => $request->input('perpanjangan_ketiga'),
                'sertifikasi' => $request->input('sertifikasi'),
                'reg_date' => Carbon::now()->toDateTimeString()
            );
            
            $hakakses = DB::table('tblhakakses')->where('nama_akses','Guru')->first();
            if(!empty($hakakses)){
                
                $simpan = DB::table('tabelguru')->insert($data);        
                $idgr =  DB::table('tabelguru')->latest('id')->first();
                $idguru = $idgr->id; 

                if(!empty($hubungan)){
                    for($a=0;$a<count($hubungan); $a++){
                        $tgllahirs = date('Y', strtotime($tgllahir[$a]));
                        $thnsekarang = Carbon::now()->format('Y');
                        $umur = $thnsekarang - $tgllahirs;

                        $datakeluarga = array(
                            'idguru' => $idguru,
                            'nama_keluarga' => $nama[$a],
                            'hubungan' => $hubungan[$a],
                            'tempat_lahir' => $tmplahir[$a],
                            'tgl_lahir_keluarga' => $tgllahir[$a],
                            'umur_anak' => $umur,
                            'reg_date' => Carbon::now()->toDateTimeString()
                        );
                        $simpan = DB::table('tblkeluarga')->insert($datakeluarga);
                    }
                }

                if(!empty($jenjang)){
                        for($b=0;$b<count($jenjang); $b++){
                        $datapendidikan = array(
                            'idguru' => $idguru,
                            'Jenjang' => $jenjang[$b],
                            'Asalperguruantinggi' => $kampus[$b],
                            'Prodi' => $prodi[$b],
                            'Tahunmasuk' => $tahunmasuk[$b],
                            'Tahunkeluar' => $tahunkeluar[$b],
                            'Ipk' => $ipk[$b],
                            'reg_date' => Carbon::now()->toDateTimeString()
                        );
                        $simpan = DB::table('tabelPendidikanGuru')->insert($datapendidikan);
                    }
                }
                
                if($for_query == 'Guru' OR $for_query == 'Guru, Staff'){
                    $seq = DB::table('tbuser')->max('id') + 1; 

                    $datakun = DB::table('tbuser')->insert([
                            'id' => $seq,
                            'username' => $request->input('nip'),
                            'password' => password_hash('12345678', PASSWORD_DEFAULT),
                            'nama' => $request->input('nama_lengkap'),
                            'email' => $request->input('email'),
                            'created_at' => Carbon::now()->toDateTimeString(),
                            'active' => 'TRUE',
                            'id_hakakses' => $hakakses->idhakakses
                    ]);
                }
                
                // for($c=0;$c<count($mapel); $c++){
                //     $datamapel = array(
                //         'idguru' => $idguru,
                //         'idmapel' => $mapel[$c],
                //         'jumlah_jam' => $jam[$c],
                //         'kelas' => $kelas[$c],
                //         'reg_date' => Carbon::now()->toDateTimeString()
                //     );
                //     $simpan = DB::table('tblmapeldiampu')->insert($datamapel);
                // }

                Alert::success('Berhasil', 'Data berhasil disimpan');
                return redirect('/dataguru');
            }else{
                Alert::warning('Perhatian !', 'Data role Guru belum dibuat !');
                return redirect('/dataguru/create');
            }

        }


    }

    public function storekeluarga(Request $request)
    {
        $tgllahir = date('Y', strtotime($request->input('tgllahirkeluarga')));
        $thnsekarang = Carbon::now()->format('Y');
        $umur = $thnsekarang - $tgllahir;
        $idguru = $request->input('idguru');

        $data = array(
            'idguru' => $idguru,
            'nama_keluarga' => $request->input('nama'),
            'hubungan' => $request->input('hubungan'),
            'tempat_lahir' => $request->input('tempatlahirkeluarga'),
            'tgl_lahir_keluarga' => $request->input('tgllahirkeluarga'),
            'umur_anak' => $umur,
            'reg_date' => Carbon::now()->toDateTimeString()
        );
        $simpan = DB::table('tblkeluarga')->insert($data);

        if($simpan){
            Alert::success('Berhasil', 'Data berhasil disimpan');
            return redirect('/dataguru/showkeluarga/'.$idguru.'');
        }else{
            Alert::error('Gagal', 'Data gagal disimpan');
            return redirect('/dataguru/showkeluarga/'.$idguru.'');
        }
    }

    public function storependidikan(Request $request)
    {
        $idguru = $request->input('idguru');

        $data = array(
                'idguru' => $idguru,
                'Jenjang' => $request->input('jenjang'),
                'Asalperguruantinggi' => $request->input('kampus'),
                'Prodi' => $request->input('prodi'),
                'Tahunmasuk' => $request->input('tahunmasuk'),
                'Tahunkeluar' => $request->input('tahunkeluar'),
                'Ipk' => $request->input('ipk'),
                'reg_date' => Carbon::now()->toDateTimeString()
            );
        $simpan = DB::table('tabelPendidikanGuru')->insert($data);

        if($simpan){
            Alert::success('Berhasil', 'Data berhasil disimpan');
            return redirect('/dataguru/showpendidikan/'.$idguru.'');
        }else{
            Alert::error('Gagal', 'Data gagal disimpan');
            return redirect('/dataguru/showpendidikan/'.$idguru.'');
        }
    }

    public function storemapel(Request $request)
    {
        $idguru = $request->input('idguru');

        $data = array(
                'idguru' => $idguru,
                'idmapel' => $request->input('mapel'),
                'jumlah_jam' => $request->input('jumlah_jam'),
                'kelas' => $request->input('kelas'),
                'reg_date' => Carbon::now()->toDateTimeString()
            );
        $simpan = DB::table('tblmapeldiampu')->insert($data);

        if($simpan){
            Alert::success('Berhasil', 'Data berhasil disimpan');
            return redirect('/dataguru/showmapel/'.$idguru.'');
        }else{
            Alert::error('Gagal', 'Data gagal disimpan');
            return redirect('/dataguru/showmapel/'.$idguru.'');
        }
    }

    public function updatemapel(Request $request)
    {
        $idguru = $request->input('idguru');

        $data = array(
                'idmapel' => $request->input('mapel'),
                'jumlah_jam' => $request->input('jumlah_jam'),
                'kelas' => $request->input('kelas'),
                'reg_date' => Carbon::now()->toDateTimeString()
            );
        $simpan = DB::table('tblmapeldiampu')->where('idmapelampu', $request->input('idmapel'))->update($data);

        if($simpan){
            Alert::success('Berhasil', 'Data berhasil diubah');
            return redirect('/dataguru/showmapel/'.$idguru.'');
        }else{
            Alert::error('Gagal', 'Data gagal diubah');
            return redirect('/dataguru/showmapel/'.$idguru.'');
        }
    }

    public function updatependidikan(Request $request)
    {
        $idguru = $request->input('idguru');

        $data = array(
                'Jenjang' => $request->input('jenjang'),
                'Asalperguruantinggi' => $request->input('kampus'),
                'Prodi' => $request->input('prodi'),
                'Tahunmasuk' => $request->input('tahunmasuk'),
                'Tahunkeluar' => $request->input('tahunkeluar'),
                'Ipk' => $request->input('ipk'),
                'reg_date' => Carbon::now()->toDateTimeString()
            );
        $simpan = DB::table('tabelPendidikanGuru')->where('id', $request->input('idjenjang'))->update($data);

        if($simpan){
            Alert::success('Berhasil', 'Data berhasil diubah');
            return redirect('/dataguru/showpendidikan/'.$idguru.'');
        }else{
            Alert::error('Gagal', 'Data gagal diuabh');
            return redirect('/dataguru/showpendidikan/'.$idguru.'');
        }
    }

    public function updatekeluarga(Request $request)
    {
        $tgllahir = date('Y', strtotime($request->input('tgllahirkeluarga')));
        $thnsekarang = Carbon::now()->format('Y');
        $umur = $thnsekarang - $tgllahir;
        $idguru = $request->input('idguru');

        $data = array(
            'nama_keluarga' => $request->input('nama'),
            'hubungan' => $request->input('hubungan'),
            'tempat_lahir' => $request->input('tempatlahirkeluarga'),
            'tgl_lahir_keluarga' => $request->input('tgllahirkeluarga'),
            'umur_anak' => $umur,
            'reg_date' => Carbon::now()->toDateTimeString()
        );
        $simpan = DB::table('tblkeluarga')->where('idkeluarga', $request->input('idklg'))->update($data);

        if($simpan){
            Alert::success('Berhasil', 'Data berhasil diubah');
            return redirect('/dataguru/showkeluarga/'.$idguru.'');
        }else{
            Alert::error('Gagal', 'Data gagal mengubah data');
            return redirect('/dataguru/showkeluarga/'.$idguru.'');
        }
    }

    public function destroykeluarga($id)
    {
        $data = DB::table('tblkeluarga')->where('idkeluarga',$id);
        $guru = DB::table('tblkeluarga')->where('idkeluarga',$id)->get();
        $data->delete();

        if($data) {
            Alert::success('Berhasil', 'Data berhasil dihapus');
            //return response()->json(['message'=>'Berhasil']);
            return redirect('/dataguru/showkeluarga/'.$guru[0]->idguru.'');
        }else{
                //DB::rollback();
            Alert::error('Gagal', 'Gagal menghapus data !');
            return redirect('/dataguru/showkeluarga/'.$guru[0]->idguru.'');
        }
    }

    public function destroypendidikan($id)
    {
        $data = DB::table('tabelPendidikanGuru')->where('id',$id);
        $pendidikan = DB::table('tabelPendidikanGuru')->where('id',$id)->get();
        $data->delete();

        if($data) {
            Alert::success('Berhasil', 'Data berhasil dihapus');
            //return response()->json(['message'=>'Berhasil']);
            return redirect('/dataguru/showpendidikan/'.$pendidikan[0]->idguru.'');
        }else{
                //DB::rollback();
            Alert::error('Gagal', 'Gagal menghapus data !');
            return redirect('/dataguru/showpendidikan/'.$pendidikan[0]->idguru.'');
        }
    }

    public function destroymapel($id)
    {
        $data = DB::table('tblmapeldiampu')->where('idmapelampu',$id);
        $mapel = DB::table('tblmapeldiampu')->where('idmapelampu',$id)->get();
        $data->delete();

        if($data) {
            Alert::success('Berhasil', 'Data berhasil dihapus');
            //return response()->json(['message'=>'Berhasil']);
            return redirect('/dataguru/showmapel/'.$mapel[0]->idguru.'');
        }else{
                //DB::rollback();
            Alert::error('Gagal', 'Gagal menghapus data !');
            return redirect('/dataguru/showmapel/'.$mapel[0]->idguru.'');
        }
    }

    public function destroyguru($id)
    {
        $datamapel = DB::table('tblmapeldiampu')->where('idguru',$id);
        $datakeluarga = DB::table('tblkeluarga')->where('idguru',$id);
        $datajenjang = DB::table('tabelPendidikanGuru')->where('idguru',$id);
        $data = DB::table('tabelguru')->where('id',$id);
        
        $dataguru = DB::table('tabelguru')->where('id',$id)->get();
        $this->delete_image($dataguru[0]->paspoto);

        $datauser = DB::table('tbuser')->where('username',$dataguru[0]->Nip);

        $datamapel->delete();
        $datakeluarga->delete();
        $datajenjang->delete();
        $datauser->delete();
        $data->delete();

        if($data) {
            return response()->json(['message'=>'Berhasil']);
        }else{
            return response()->json(['message'=>'gagal']);
        }
        // return response()->json(['message'=>$id]);
        
    }
    
    function delete_image($img)
    {
        if ($img && file_exists(public_path('pasfoto/guru/'.$img)))
            return unlink(public_path('pasfoto/guru/'.$img));
        // return $img;
    }

}
