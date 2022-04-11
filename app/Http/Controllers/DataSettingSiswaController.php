<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KelasBerjalan;
use DB;
use Carbon\Carbon;
use Alert;
use DataTables;

class DataSettingSiswaController extends Controller
{
    //
    public function getIndex(Request $request) {
        $siswa = DB::table('v_tblsetsiswa')
                    ->get();

        $data = [
            'title' => 'Data Setting Siswa',
            'datasiswa' => $siswa,
            'breadcrumb' => [
                ['url' => '/' , 'name' => 'Home'],
                ['url' => '/interface' , 'name' => 'Interface'],
                ['url' => '/master' , 'name' => 'List Data'],
            ],
            'testVariable' => 'Setting Siswa'
        ];

        return view('datasettingsiswa.index', $data);

    }

    public function getCreate() {
 
        $kelas = DB::table('tblkelasberjalan')
                ->join('tabelguru','tabelguru.id','=','tblkelasberjalan.idguru')
                ->join('tabeltahunajaran','tabeltahunajaran.idsettingtahun','=','tblkelasberjalan.idsettingtahun')
                ->join('tblkelompokkelas','tblkelompokkelas.idkelompokkls','=','tblkelasberjalan.idkelompokkls')
                ->join('tblruangkelas','tblruangkelas.idruang','=','tblkelasberjalan.idruangkelas')
                ->where('tabeltahunajaran.statusta', 'Y')
                ->get();

        $setsiswa = DB::table('tb_kelas_siswa')
                    ->select(DB::raw('nisn'))
                    ->get();

        $arr = array();
        foreach($setsiswa as $datasis){
            array_push($arr, array($datasis->nisn));            
        }
            
        $siswa = DB::table('tblsiswa')
                ->where('statussiswa','Aktif')
                ->whereNotIn('nisn', $arr)
                ->get();

        $data = [
            'title' => 'Tambah Setting Siswa',
            'kelas' => $kelas,
            'datasiswa' => $siswa,
            'breadcrumb' => [
                ['url' => '/' , 'name' => 'Home'],
                ['url' => '/interface' , 'name' => 'Interface'],
                ['url' => '/master' , 'name' => 'List Data'],
            ],
            
            'testVariable' => 'Data Kelas Berjalan',
            'testVariable2' => 'Tabel Siswa',
            'testVariable3' => 'Setting Siswa'
        ];
       
        return view('datasettingsiswa.create', $data);
    }

    public function getShow($kls,$thn, $sms)
    {
        $kelas = DB::table('v_tblsetsiswa')
                ->where('kode_kelompok', base64_decode($kls))
                ->where('tahunakademik', base64_decode($thn))
                ->get();

        $datasiswa = DB::table('tb_kelas_siswa')
                ->join('tblsiswa','tblsiswa.nisn','=','tb_kelas_siswa.nisn')
                ->join('tblkelasberjalan','tblkelasberjalan.idkelasberjalan','=','tb_kelas_siswa.idkelasberjalan')
                ->join('tabeltahunajaran','tabeltahunajaran.idsettingtahun','=','tblkelasberjalan.idsettingtahun')
                ->join('tblkelompokkelas','tblkelompokkelas.idkelompokkls','=','tblkelasberjalan.idkelompokkls')
                ->where('kode_kelompok', base64_decode($kls))
                ->where('tahunakademik', base64_decode($thn))
                ->where('semester', base64_decode($sms))
                ->get();

        $setsiswa = DB::table('tb_kelas_siswa')
                    ->select(DB::raw('nisn'))
                    ->get();

        $arr = array();
        foreach($setsiswa as $datasis){
            array_push($arr, array($datasis->nisn));            
        }
            
        $siswa = DB::table('tblsiswa')
                ->where('statussiswa','Aktif')
                ->whereNotIn('nisn', $arr)
                ->get();       
        
        $data = [
            'title' => 'Detail Setting Siswa',
            'kelas' => $kelas,
            'siswa' => $siswa,
            'tabelsiswa' => $datasiswa,
            'kode' => base64_decode($kls),
            'tahun' => base64_decode($thn),
            'semester' => base64_decode($sms),
            'breadcrumb' => [
                ['url' => '/' , 'name' => 'Home'],
                ['url' => '/interface' , 'name' => 'Interface'],
                ['url' => '/master' , 'name' => 'List Data'],
            ],
            
            'testVariable' => 'Data Kelas Berjalan',
            'testVariable2' => 'Tabel Siswa',
            'testVariable3' => 'Setting Siswa'
        ];
       
        return view('datasettingsiswa.show', $data);
        // print_r($datasiswa);
    }

    public function getSiswa($id)
    {
        if($id == "0"){
            $setsiswa = DB::table('tb_kelas_siswa')
                    ->select(DB::raw('nisn'))
                    ->get();

            $arr = array();
            foreach($setsiswa as $datasis){
                array_push($arr, array($datasis->nisn));            
            }
            
            $siswa = DB::table('tblsiswa')
					->where('statussiswa','Aktif')
                    ->whereNotIn('nisn', $arr)
                    ->get();

            if($siswa){
                return response()->json($siswa);
            }else{
                return response()->json(['empty']);
            }
            return response()->json($id);
        }else{
            $setsiswa = DB::table('tb_kelas_siswa')
                    ->select(DB::raw('nisn'))
                    ->get();

            $arr = array();
            foreach($setsiswa as $datasis){
                array_push($arr, array($datasis->nisn));            
            }
            
            $siswa = DB::table('tblsiswa')
                    ->where('tingkatkelas', $id)
					->where('statussiswa','Aktif')
                    ->whereNotIn('nisn', $arr)
                    ->get();

            if($siswa){
                return response()->json($siswa);
            }else{
                return response()->json(['empty']);
            }
        }

    }
	
	public function getSiswaTahun($id)
    {
        if($id == "0"){
            $setsiswa = DB::table('tb_kelas_siswa')
                    ->select(DB::raw('nisn'))
                    ->get();

            $arr = array();
            foreach($setsiswa as $datasis){
                array_push($arr, array($datasis->nisn));            
            }
            
            $siswa = DB::table('tblsiswa')
					->where('statussiswa','Aktif')
                    ->whereNotIn('nisn', $arr)
                    ->get();

            if($siswa){
                return response()->json($siswa);
            }else{
                return response()->json(['empty']);
            }
            return response()->json($id);
        }else{
            $setsiswa = DB::table('tb_kelas_siswa')
                    ->select(DB::raw('nisn'))
                    ->get();

            $arr = array();
            foreach($setsiswa as $datasis){
                array_push($arr, array($datasis->nisn));            
            }
            
            $siswa = DB::table('tblsiswa')
					->where('tahunmasuk', $id)
					->where('statussiswa','Aktif')
                    ->whereNotIn('nisn', $arr)
                    ->get();

            if($siswa){
                return response()->json($siswa);
            }else{
                return response()->json(['empty']);
            }
        }

    }

    public function getKelas($id)
    {
        $kelas = DB::table('tblkelasberjalan')
                ->join('tabelguru','tabelguru.id','=','tblkelasberjalan.idguru')
                ->join('tabeltahunajaran','tabeltahunajaran.idsettingtahun','=','tblkelasberjalan.idsettingtahun')
                ->join('tblkelompokkelas','tblkelompokkelas.idkelompokkls','=','tblkelasberjalan.idkelompokkls')
                ->join('tblruangkelas','tblruangkelas.idruang','=','tblkelasberjalan.idruangkelas')
                ->where('tblkelasberjalan.idkelasberjalan', $id)
                ->where('tabeltahunajaran.statusta', 'Y')
                ->get();

        if($kelas){
            return response()->json($kelas);
        }else{
            return response()->json(['empty']);
        }
    }

    public function store(Request $request)
    {
        $idsiswa = $request->input('id');
        // echo json_encode($idsiswa);
        $data = array(
                    'idkelasberjalan' => $request->input('kelas'),
                    'nisn' => $idsiswa,
                    'reg_date' => Carbon::now()->toDateTimeString()
                );
                // var_dump($data);

        $simpan = DB::table('tb_kelas_siswa')->insert($data);
        if($simpan){
            return response()->json(['success']);
        }else{
            return response()->json(['error']);
        }
        // $arr = array();
        // if(!empty($idsiswa)){
        //     for($a=0; $a<count($idsiswa); $a++){
        //         array_push($arr, array('cek' => $idsiswa[$a]));         
        //     }

        //     $simpan;

        //     foreach($arr as $key => $value){
        //         $data = array(
        //             'idkelasberjalan' => $request->input('kelas'),
        //             'nisn' => $value['cek'],
        //             'reg_date' => Carbon::now()->toDateTimeString()
        //         );
        //         // var_dump($data);

        //         $simpan = DB::table('tb_kelas_siswa')->insert($data);
        //     }

        //     if($simpan){
        //         return response()->json(['success']);
        //     }
        // }else{
        //     Alert::error('Gagal', 'Siswa belum dipilih !');
        //     return redirect()->back(); 
        // }
        
    }


    public function updatesiswa(Request $request)
    {
        $idsiswa = $request->input('id');
        $kode = $request->input('kode');
        $thn = $request->input('thn');
        $semester = $request->input('sms');

        if(!empty($idsiswa)){
            for($a=0; $a<count($idsiswa); $a++){
                $data = array(
                    'idkelasberjalan' => $request->input('kelas'),
                    'nisn' => $idsiswa[$a],
                    'reg_date' => Carbon::now()->toDateTimeString()
                );
                // var_dump($data);

                $simpan = DB::table('tb_kelas_siswa')->insert($data);                
            }
            if($simpan){
                Alert::success('Berhasil', 'Data berhasil ditambahkan');
                return redirect()->back();
            }
        }else{
            Alert::error('Gagal', 'Siswa belum dipilih !');
            return redirect()->back();
        }
    }

    public function destroy($kls)
    {
        // $siswa = DB::table('tb_kelas_siswa')
        //         ->join('tblsiswa','tblsiswa.nis','=','tb_kelas_siswa.nisn') 
        //         ->join('tblkelasberjalan','tblkelasberjalan.idkelasberjalan','=','tb_kelas_siswa.idkelasberjalan') 
        //         ->join('tblkelompokkelas','tblkelompokkelas.idkelompokkls','=','tblkelasberjalan.idkelompokkls') 
        //         ->join('tabeltahunajaran','tabeltahunajaran.idsettingtahun','=','tblkelasberjalan.idsettingtahun')
        //         ->where('tblkelompokkelas.kode_kelompok', $kls)
        //         ->where('tabeltahunajaran.tahunakademik', $thn)
        //         ->get();
                // echo $siswa[0]->idkelasberjalan;
        $kelas =  DB::table('tb_kelas_siswa')->where('idkelasberjalan',$kls);
        $kelas->delete();

        if($kelas) {
            return response()->json(['message'=>'Berhasil']);
        }else{
           return response()->json(['message'=>'Gagal']);
        }
    }

    public function destroysiswa($id)
    {
        $kelas =  DB::table('tb_kelas_siswa')->where('idkelassiswa',$id);
        $kelas->delete();

        if($kelas) {
            return response()->json(['message'=>'Berhasil']);
        }else{
           return response()->json(['message'=>'Gagal']);
        }
    }

   
}
