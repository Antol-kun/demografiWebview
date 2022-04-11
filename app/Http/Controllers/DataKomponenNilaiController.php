<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Carbon\Carbon;
use Alert;
use DataTables;

class DataKomponenNilaiController extends Controller
{

    public function getIndex(Request $request) {
        $komponen = DB::table('tblkomponenpenilaian')
                    ->orderBy('idkompnilai', 'desc')
                    ->get();

        $data = [
            'title' => 'Data Komponen Nilai',
            'datakomponen' => $komponen,
            'breadcrumb' => [
                ['url' => '/' , 'name' => 'Home'],
                ['url' => '/interface' , 'name' => 'Interface'],
                ['url' => '/master' , 'name' => 'List Data'],
            ],
            
            'testVariable' => 'Komponen Nilai'
        ];

        return view('datakomponennilai.index', $data);
    }

    
    public function getCreate() {
        
        $data = [
            'title' => 'Tambah Data Komponen Penilaian',
            'breadcrumb' => [
                ['url' => '/' , 'name' => 'Home'],
                ['url' => '/interface' , 'name' => 'Interface'],
                ['url' => '/master' , 'name' => 'List Data'],
            ],
            
            'testVariable' => 'Komponen Penilaian'
        ];
        
        return view('datakomponennilai.create', $data);
    }

    public function getEdit($id) {
        $komp = DB::table('tblkomponenpenilaian')->where('idkompnilai', base64_decode($id))
                    ->get();
        
        $data = [
            'title' => 'Edit Data Komponen Penilaian',
            'datakomp' => $komp,
            'breadcrumb' => [
                ['url' => '/' , 'name' => 'Home'],
                ['url' => '/interface' , 'name' => 'Interface'],
                ['url' => '/master' , 'name' => 'List Data'],
            ],
            
            'testVariable' => 'Komponen Penilaian'
        ];
        
        return view('datakomponennilai.edit', $data);
    }

    public function store(Request $request)
    {

        $data = DB::table('tblkomponenpenilaian')->insert([
            'nama_komponen' => $request->input('nama'),
            'reg_date' => Carbon::now()->toDateTimeString()
        ]);

        if($data) {
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
            $data = DB::table('tblkomponenpenilaian')->where('idkompnilai',$request->input('id'))->update([
                'nama_komponen' => $request->input('nama'),
                'reg_date' => Carbon::now()->toDateTimeString()
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
        $idkomp = base64_encode($id);

        $data = DB::table('tblkomponenpenilaian')->where('idkompnilai', base64_decode($idkomp));
        $data->delete();

        if($data) {
            return response()->json(['message'=>'Berhasil']);
        }else{
            return response()->json(['message'=>'Gagal !']);
        }
    }

}
