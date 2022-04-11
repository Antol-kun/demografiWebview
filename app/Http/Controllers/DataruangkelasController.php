<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Carbon\Carbon;
use Alert;
use DataTables;
use Validator;

class DataruangkelasController extends Controller
{
    
    public function getIndex(Request $request) {
        $ruang = DB::table('tblruangkelas')->orderBy('idruang', 'DESC')->get();

        $data = [
            'title' => 'Data Ruang Kelas',
            'dataruang' => $ruang,
            'breadcrumb' => [
                ['url' => '/' , 'name' => 'Home'],
                ['url' => '/interface' , 'name' => 'Interface'],
                ['url' => '/master' , 'name' => 'List Data'],
            ],
            
            'testVariable' => 'Ruang Kelas'
        ];
        
        return view('dataruangkelas.index', $data);
    }

    
    public function getCreate() {
        
        $data = [
            'title' => 'Tambah Data Ruang Kelas',
            'breadcrumb' => [
                ['url' => '/' , 'name' => 'Home'],
                ['url' => '/interface' , 'name' => 'Interface'],
                ['url' => '/master' , 'name' => 'List Data'],
            ],
            
            'testVariable' => 'Ruang Kelas'
        ];
        
        return view('dataruangkelas.create', $data);
    }

    public function getEdit($id) {        
        $ruang = DB::table('tblruangkelas')->where('idruang', base64_decode($id))->get();

        $data = [
            'title' => 'Ubah Data Ruang Kelas',
            'ruang' => $ruang,
            'breadcrumb' => [
                ['url' => '/' , 'name' => 'Home'],
                ['url' => '/interface' , 'name' => 'Interface'],
                ['url' => '/master' , 'name' => 'List Data'],
            ],
            
            'testVariable' => 'Ruang Kelas'
        ];
        
        return view('dataruangkelas.edit', $data);
    }

    public function store(Request $request)
    {
        $jurusan = DB::table('tblruangkelas')->insert([
            'kode_ruang' => $request->input('kode_ruang'),
            'nama_ruang' => $request->input('nama_ruang'),
            'kapasitas' => $request->input('kapasitas'),
            'jenis_ruangan' => $request->input('jenis'),
            'reg_date' => Carbon::now()->toDateTimeString()
        ]);

        if($jurusan) {
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
        $jurusan = DB::table('tblruangkelas')->where('idruang', $request->input('id'))->update([
            'kode_ruang' => $request->input('kode_ruang'),
            'nama_ruang' => $request->input('nama_ruang'),
            'kapasitas' => $request->input('kapasitas'),
            'jenis_ruangan' => $request->input('jenis'),
            'reg_date' => Carbon::now()->toDateTimeString()
        ]);

        if($jurusan) {
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
        $idruang = base64_encode($id);
        $ruang =  DB::table('tblruangkelas')->where('idruang', base64_decode($idruang));
        $ruang->delete();

        if($ruang) {
            Alert::success('Berhasil', 'Data berhasil dihapus');
            return response()->json(['message'=>'Berhasil']);
        }else{
            //DB::rollback();
            Alert::error('Gagal', 'Gagal menghapus data !');
            return response()->json(['message'=>'fail']);
        }
    }

}
