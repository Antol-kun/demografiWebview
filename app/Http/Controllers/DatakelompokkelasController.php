<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Carbon\Carbon;
use Alert;
use DataTables;

class DatakelompokkelasController extends Controller
{
  
    public function getIndex(Request $request) {
       $kelas = DB::table('tblkelompokkelas')
                    ->join('tbljurusan','tbljurusan.idjurusan','=','tblkelompokkelas.idjurusan')
                    ->orderBy('idkelompokkls', 'desc')
                    ->get();
        $data = [
            'title' => 'Data Kelompok Kelas',
            'datakelas' => $kelas,
            'breadcrumb' => [
                ['url' => '/' , 'name' => 'Home'],
                ['url' => '/interface' , 'name' => 'Interface'],
                ['url' => '/master' , 'name' => 'List Data'],
            ],
           
            'testVariable' => 'Kelompok Kelas'
        ];
        
        return view('datakelompokkelas.index', $data);
    }

    
    public function getCreate() {
        $jurusan = DB::table('tbljurusan')->orderBy('idjurusan', 'desc')->get();

        $data = [
            'title' => 'Tambah Data Kelompok Kelas',
            'jurusan' => $jurusan,
            'breadcrumb' => [
                ['url' => '/' , 'name' => 'Home'],
                ['url' => '/interface' , 'name' => 'Interface'],
                ['url' => '/master' , 'name' => 'List Data'],
            ],
            
            'testVariable' => 'Kelompok Kelas'
        ];
        
        return view('datakelompokkelas.create', $data);
    }

    public function getEdit($id) {
        $jurusan = DB::table('tbljurusan')->orderBy('idjurusan', 'desc')->get();
        $kelompok = DB::table('tblkelompokkelas')
                    ->join('tbljurusan','tbljurusan.idjurusan','=','tblkelompokkelas.idjurusan')
                    ->where('idkelompokkls', base64_decode($id))
                    ->get();

        $data = [
            'title' => 'Edit Kelompok Kelas',
            'kelompok' =>$kelompok,
            'jurusan' => $jurusan,
            'breadcrumb' => [
                ['url' => '/' , 'name' => 'Home'],
                ['url' => '/interface' , 'name' => 'Interface'],
                ['url' => '/master' , 'name' => 'List Data'],
            ],
            'testVariable' => 'Kelompok Kelas'
        ];

        return view('datakelompokkelas.edit', $data);
    }

    public function store(Request $request)
    {
        //DB::beginTransaction();
        $jurus = DB::table('tbljurusan')->where('idjurusan',$request->input('jurusan'))->get();
        $kode = $request->input('tingkat')." ".$jurus[0]->singkatan." ".$request->input('nama');

        $cek = DB::table('tblkelompokkelas')->where('kode_kelompok', $kode)->first();
        if(!empty($cek)){
            return response()->json(['message'=> 'match']);
        }else{
            $setting = DB::table('tblkelompokkelas')->insert([
                // 'kode_kelompok' => $request->input('kode'),
                'kode_kelompok' => $kode,
                'nama_kelompok' => $request->input('nama'),
                'jurusan_kelompok' => '-',
                'tingkat_kelas' => $request->input('tingkat'),
                'reg_date' => Carbon::now()->toDateTimeString(),
                'idjurusan' => $request->input('jurusan')
            ]);

            if($setting) {
                return response()->json(['message'=> 'success']);
            }else{
               return response()->json(['message'=> 'fail']);
            }
        }
        
    }

    public function update(Request $request)
    {
            $jurus = DB::table('tbljurusan')->where('idjurusan',$request->input('jurusan'))->get();
            $kode = $request->input('tingkat')." ".$jurus[0]->singkatan." ".$request->input('nama');

            $data = DB::table('tblkelompokkelas')->where('idkelompokkls',$request->input('id_kelompok'))->update([
                    'kode_kelompok' => $kode,
                    'nama_kelompok' => $request->input('nama'),
                    'jurusan_kelompok' => '-',
                    'tingkat_kelas' => $request->input('tingkat'),
                    'reg_date' => Carbon::now()->toDateTimeString(),
                    'idjurusan' => $request->input('jurusan')
                ]);

            if($data) {
                Alert::success('Berhasil', 'Data berhasil diubah');
                return response()->json(['message'=>'Berhasil']);
            }else{
                //DB::rollback();
                Alert::error('Gagal', 'Gagal mengubah data !');
                return response()->json(['message'=>'Gagal !']);
            }
    }

    public function destroy($id)
    {
        $idkelas = base64_encode($id);
        $data = DB::table('tblkelompokkelas')->where('idkelompokkls', base64_decode($idkelas));
        $data->delete();

        if($data) {
            return response()->json(['message'=>'Berhasil']);
        }else{
            return response()->json(['message'=>'Gagal !']);
        }
    }

}
