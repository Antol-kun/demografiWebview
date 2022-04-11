<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Carbon\Carbon;
use Alert;
use DataTables;
use Validator;

class DatamatapelajaranController extends Controller
{
    public function getIndex(Request $request) {
        $mapel = $data = DB::table('v_tblmapel')->get();

        $data = [
            'title' => 'Data Mata Pelajaran',
            'datamapel' => $mapel,
            'breadcrumb' => [
                ['url' => '/' , 'name' => 'Home'],
                ['url' => '/interface' , 'name' => 'Interface'],
                ['url' => '/master' , 'name' => 'List Data'],
            ],
            
            'testVariable' => 'Mata Pelajaran'
        ];

        // if ($request->ajax()) {
            

        //     return Datatables::of($data)
        //             ->addIndexColumn()
        //             ->editColumn('singkatan', function ($data) {
        //                 $singkatan = "(".$data->singkatan.") - ".$data->nama_jurusan;
        //                 return $singkatan;
        //             })
        //             ->editColumn('status_mapel', function ($data) {
        //                 if($data->status_mapel == 'Y'){
        //                     $status = "Aktif";
        //                 }else if($data->status_mapel == 'N'){
        //                     $status = "Tidak Aktif";
        //                 }
        //                 return $status;
        //             })
        //             ->addColumn('action', function($row){
        //                 $btn = '<a href="/datamatapelajaran/edit/'.$row->idmapel.'"><i class="fas fa-edit" style="font-size:15px;color:#009ef7;"></i></a>
        //                 &nbsp;&nbsp;
        //                 <a href="/datamatapelajaran/hapus/'.$row->idmapel.'"><i class="fas fa-trash" style="font-size:15px;color:red;"></i></a>';
        //                 return $btn;
        //             })
        //             ->rawColumns(['action'])
        //             ->make(true);
        // }
       
        return view('datamatapelajaran.index', $data);
    }

    
    public function getCreate() {
        $jurusan = DB::table('tbljurusan')->get();

        $tingkat = DB::table('tblkelompokkelas')
                    ->join('tbljurusan','tbljurusan.idjurusan','=','tblkelompokkelas.idjurusan')
                    ->orderBy('idkelompokkls', 'desc')
                    ->get();

        $data = [
            'title' => 'Tambah Data Mata Pelajaran',
            'jurusan' => $jurusan,
            'tingkat' => $tingkat,
            'breadcrumb' => [
                ['url' => '/' , 'name' => 'Home'],
                ['url' => '/interface' , 'name' => 'Interface'],
                ['url' => '/master' , 'name' => 'List Data'],
            ],
            
            'testVariable' => 'Mata Pelajaran'
        ];
        
        return view('datamatapelajaran.create', $data);
    }

    public function getEdit($id) {
        $jurusan = DB::table('tbljurusan')->get();
        $mapel = DB::table('v_tblmapel')->where('idmapel', base64_decode($id))->get();

        $data = [
            'title' => 'Ubah Data Mata Pelajaran',
            'jurusan' => $jurusan,
            'mapel' => $mapel,
            'breadcrumb' => [
                ['url' => '/' , 'name' => 'Home'],
                ['url' => '/interface' , 'name' => 'Interface'],
                ['url' => '/master' , 'name' => 'List Data'],
            ],
            
            'testVariable' => 'Mata Pelajaran'
        ];
        
        return view('datamatapelajaran.edit', $data);
    }

    public function store(Request $request)
    {
        $mapel = DB::table('tblmapel')->insert([
            'kode_mapel' => $request->input('kode'),
            'nama_mapel' => $request->input('nama'),
            'idjurusan' => $request->input('jurusan'),
            'status_mapel' => $request->input('status'),
            'reg_date' => Carbon::now()->toDateTimeString(),
            'tingkat_kls' => $request->input('tingkat'),
            'kkm' => $request->input('kkm')
        ]);

        if($mapel) {
            Alert::success('Berhasil', 'Data berhasil ditambahkan');
            return response()->json(['message'=>'Berhasil']);
        }else{
            //DB::rollback();
            Alert::error('Gagal', 'Gagal menambahkan data !');
            return response()->json(['message'=>'Gagal !']);
        }
    }

    public function update(Request $request)
    {
        $mapel = DB::table('tblmapel')->where('idmapel', $request->input('id'))->update([
            'kode_mapel' => $request->input('kode'),
            'nama_mapel' => $request->input('nama'),
            'idjurusan' => $request->input('jurusan'),
            'status_mapel' => $request->input('status'),
            'reg_date' => Carbon::now()->toDateTimeString(),
            'tingkat_kls' => $request->input('tingkat'),
            'kkm' => $request->input('kkm')
        ]);

        if($mapel) {
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
        $idmapel = base64_encode($id);
        $mapel =  DB::table('tblmapel')->where('idmapel', base64_decode($idmapel));
        $mapel->delete();

        if($mapel) {
            return response()->json(['pesan'=>'success']);
        }else{
            //DB::rollback();
            return response()->json(['pesan'=>'fail']);
        }
    }

}
