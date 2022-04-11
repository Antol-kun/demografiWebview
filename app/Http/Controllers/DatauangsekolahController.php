<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Carbon\Carbon;
use Alert;
use DataTables;

class DatauangsekolahController extends Controller
{
  
    public function getIndex(Request $request) {
        $uang = DB::table('tblkomponenbiaya')
                    ->orderBy('idkomponen', 'desc')
                    ->get();

        $data = [
            'title' => 'Master Komponen Biaya Sekolah',
            'uang' => $uang,
            'breadcrumb' => [
                ['url' => '/' , 'name' => 'Home'],
                ['url' => '/interface' , 'name' => 'Interface'],
                ['url' => '/master' , 'name' => 'List Data'],
            ],
            
            'testVariable' => 'Komponen Biaya Sekolah'
        ];
        
        return view('datauangsekolah.index', $data);
    }

    
    public function getCreate() {
        
        $data = [
            'title' => 'Tambah Komponen Biaya Sekolah',
            'breadcrumb' => [
                ['url' => '/' , 'name' => 'Home'],
                ['url' => '/interface' , 'name' => 'Interface'],
                ['url' => '/master' , 'name' => 'List Data'],
            ],
            
            'testVariable' => 'Komponen Biaya Sekolah'
        ];
        
        return view('datauangsekolah.create', $data);
    }
    
    public function getEdit($id) {
        
        $komponen = DB::table('tblkomponenbiaya')->where('idkomponen', base64_decode($id))
                    ->get();

        $data = [
            'title' => 'Edit Komponen Biaya Sekolah',
            'datakomponen' => $komponen,
            'breadcrumb' => [
                ['url' => '/' , 'name' => 'Home'],
                ['url' => '/interface' , 'name' => 'Interface'],
                ['url' => '/master' , 'name' => 'List Data'],
            ],
            
            'testVariable' => 'Komponen Biaya Sekolah'
        ];
        
        return view('datauangsekolah.edit', $data);
    }

    public function store(Request $request)
    {

        $data = DB::table('tblkomponenbiaya')->insert([
            'nama_komponen' => $request->input('komponen'),
            'besaran_biaya' => preg_replace("/[^0-9]/", "", $request->input('besaran')),
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
            $data = DB::table('tblkomponenbiaya')->where('idkomponen',$request->input('id'))->update([
                'nama_komponen' => $request->input('komponen'),
                'besaran_biaya' => preg_replace("/[^0-9]/", "", $request->input('besaran')),
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
        $data = DB::table('tblkomponenbiaya')->where('idkomponen',$id);
        $data->delete();

        if($data) {
            // Alert::success('Berhasil', 'Data berhasil dihapus');
            return response()->json(['message'=>'Berhasil']);
            // return redirect('/datauangsekolah');
        }else{
                //DB::rollback();
            // Alert::error('Gagal', 'Gagal menghapus data !');
            return response()->json(['message'=>'Gagal']);
        }
    }

}
