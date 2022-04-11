<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KelasBerjalan;
use DB;
use Carbon\Carbon;
use Alert;
use DataTables;

class DatakelasberjalanController extends Controller
{

    //
    public function getIndex(Request $request) {
        $kelasjalan = DB::table('tblkelasberjalan')
                    ->join('tabeltahunajaran','tabeltahunajaran.idsettingtahun','=','tblkelasberjalan.idsettingtahun')
                    ->join('tblruangkelas','tblruangkelas.idruang','=','tblkelasberjalan.idruangkelas')
                    ->join('tblkelompokkelas','tblkelompokkelas.idkelompokkls','=','tblkelasberjalan.idkelompokkls')
                    ->join('tabelguru','tabelguru.id','=','tblkelasberjalan.idguru')
                    ->orderBy('tblkelasberjalan.idkelasberjalan', 'desc')
                    ->get();

        $data = [
            'title' => 'Data Kelas Berjalan',
            'datakelas' => $kelasjalan,
            'breadcrumb' => [
                ['url' => '/' , 'name' => 'Home'],
                ['url' => '/interface' , 'name' => 'Interface'],
                ['url' => '/master' , 'name' => 'List Data'],
            ],
            'testVariable' => 'Kelas Berjalan'
        ];

        return view('datakelasberjalan.index', $data);

    }

    public function getCreate() {
 
        $tahunakademik = DB::table('tabeltahunajaran')->where('statusta', 'Y')->get();
        $kelompok = DB::table('tblkelompokkelas')
                    ->join('tbljurusan','tbljurusan.idjurusan','=','tblkelompokkelas.idjurusan')
                    ->get();

        $guru = DB::table('tabelguru')->get();
        $ruang = DB::table('tblruangkelas')->orderBy('idruang', 'DESC')->get();

        $data = [
            'title' => 'Tambah Data Kelas Berjalan',
            'tahunakademik' => $tahunakademik,
            'kelompok' => $kelompok,
            'guru' => $guru,
            'ruang' => $ruang,
            'breadcrumb' => [
                ['url' => '/' , 'name' => 'Home'],
                ['url' => '/interface' , 'name' => 'Interface'],
                ['url' => '/master' , 'name' => 'List Data'],
            ],
            
            'testVariable' => 'Kelas Berjalan'
        ];
       
        return view('datakelasberjalan.create', $data);
    }

    public function getEdit($id) {
        
        $kelas = DB::table('tblkelasberjalan')
                    ->join('tabeltahunajaran','tblkelasberjalan.idsettingtahun','=','tabeltahunajaran.idsettingtahun')
                    ->join('tblruangkelas','tblruangkelas.idruang','=','tblkelasberjalan.idruangkelas')
                    ->join('tblkelompokkelas','tblkelasberjalan.idkelompokkls','=','tblkelompokkelas.idkelompokkls')
                    ->join('tabelguru','tblkelasberjalan.idguru','=','tabelguru.id')
                    ->where('idkelasberjalan', base64_decode($id))
                    ->get();

        $tahunakademik = DB::table('tabeltahunajaran')->where('statusta', 'Y')->get();
        $kelompok = DB::table('tblkelompokkelas')->get();
        $guru = DB::table('tabelguru')->get();
        $ruang = DB::table('tblruangkelas')->orderBy('idruang', 'DESC')->get();

        if ($kelas) {

            $data = [
            'title' => 'Edit Data Kelas Berjalan',
            'datakelas' => $kelas,
            'thnajaran' => $tahunakademik,
            'kelompok' => $kelompok,
            'guru' => $guru,
            'ruang' => $ruang,
            'breadcrumb' => [
                ['url' => '/' , 'name' => 'Home'],
                ['url' => '/interface' , 'name' => 'Interface'],
                ['url' => '/master' , 'name' => 'List Data'],
            ],
            
            'testVariable' => 'Kelas Berjalan'
        ];

        return view('datakelasberjalan.edit', $data);
         //var_dump($kelas);
            
        } else {
            return redirect('/datakelasberjalan');
        }

    }

    public function store(Request $request)
    {
        $cekkelas = DB::select( DB::raw("SELECT * FROM tblkelasberjalan WHERE
                        idruangkelas='".$request->input('kelas')."' OR idkelompokkls='".$request->input('rombel')."' OR idguru='".$request->input('walikelas')."'"));

        // return response()->json(['message'=>$cekkelas]);

        if(!empty($cekkelas)){
            return response()->json(['message'=>'match']);
        }else{
            $kelas = DB::table('tblkelasberjalan')->insert([
                'idsettingtahun' => $request->input('tahunakademik'),
                'idruangkelas' => $request->input('kelas'),
                'idkelompokkls' => $request->input('rombel'),
                // 'tingkat_kelas' => $request->input('tingkat'),
                'idjurusan' => $request->input('jurusan'),
                'idguru' => $request->input('walikelas'),
                'reg_date' => Carbon::now()->toDateTimeString()
            ]);

            if($kelas) {
                // Alert::success('Berhasil', 'Data berhasil ditambahkan');
                return response()->json(['message'=>'success']);
            }else{
                //DB::rollback();
                // Alert::error('Gagal', 'Gagal menambahkan data !');
                return response()->json(['message'=>'fail']);
            }
        }
    }

    public function update(Request $request)
    {
        $cekkelas = DB::select( DB::raw("SELECT * FROM tblkelasberjalan WHERE
                        idruangkelas='".$request->input('kelas')."' OR idkelompokkls='".$request->input('rombel')."' OR idguru='".$request->input('walikelas')."'"));

        // return response()->json(['message'=>$cekkelas]);

        // if(!empty($cekkelas)){
        //     return response()->json(['message'=>'match']);
        // }else{

            $kelas = DB::table('tblkelasberjalan')->where('idkelasberjalan',$request->input('id'))->update([
                'idsettingtahun' => $request->input('tahunakademik'),
                'idruangkelas' => $request->input('kelas'),
                'idkelompokkls' => $request->input('rombel'),
                // 'tingkat_kelas' => $request->input('tingkat'),
                'idjurusan' => $request->input('jurusan'),
                'idguru' => $request->input('walikelas'),
                'reg_date' => Carbon::now()->toDateTimeString()
            ]);

            if($kelas) {
                // Alert::success('Berhasil', 'Data berhasil ditambahkan');
                return response()->json(['message'=>'success']);
            }else{
                //DB::rollback();
                // Alert::error('Gagal', 'Gagal menambahkan data !');
                return response()->json(['message'=>'fail']);
            }
        //}
    }

    public function destroy($id)
    {
        $idkelas = base64_encode($id);

        $kelas =  DB::table('tblkelasberjalan')->where('idkelasberjalan', base64_decode($idkelas));
        $kelas->delete();

        if($kelas) {
            return response()->json(['message'=>'Berhasil']);
        }else{
            return response()->json(['message'=>'Gagal !']);
        }
    }


}
