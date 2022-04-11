<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Carbon\Carbon;
use Alert;
use DataTables;

class DataBobotController extends Controller
{

    public function getIndex(Request $request) {
        $bobot = DB::table('tblbobotkomponen')->orderBy('idbobot', 'DESC')->get();

        $data = [
            'title' => 'Data Range Penilaian',
            'databobot' => $bobot,
            'breadcrumb' => [
                ['url' => '/' , 'name' => 'Home'],
                ['url' => '/interface' , 'name' => 'Interface'],
                ['url' => '/master' , 'name' => 'List Data'],
            ],
            
            'testVariable' => 'Range Penilaian'
        ];

        return view('databobotnilai.index', $data);
    }

    
    public function getCreate() {
        
        $data = [
            'title' => 'Tambah Data Range Penilaian',
            'breadcrumb' => [
                ['url' => '/' , 'name' => 'Home'],
                ['url' => '/interface' , 'name' => 'Interface'],
                ['url' => '/master' , 'name' => 'List Data'],
            ],
            
            'testVariable' => 'Range Penilaian'
        ];
        
        return view('databobotnilai.create', $data);
    }

    public function getEdit($id) {
        $bobot = DB::table('tblbobotkomponen')->where('idbobot', base64_decode($id))
                    ->get();
        
        $data = [
            'title' => 'Edit Data Range Penilaian',
            'databobot' => $bobot,
            'breadcrumb' => [
                ['url' => '/' , 'name' => 'Home'],
                ['url' => '/interface' , 'name' => 'Interface'],
                ['url' => '/master' , 'name' => 'List Data'],
            ],
            
            'testVariable' => 'Range Penilaian'
        ];
        
        return view('databobotnilai.edit', $data);
    }

    public function store(Request $request)
    {
        $r1 = (int)$request->input('range_awal');
        $r2 = (int)$request->input('range_akhir');

        $cekr1 = DB::table('tblbobotkomponen')
                ->where('range_2','>=', $r1)
                ->where('range_1','<=',$r1)
                ->first();

        $cekr2 = DB::table('tblbobotkomponen')
                ->where('range_2','>=', $r2)
                ->where('range_1','<=',$r2)
                ->first();


        $cekgrade = DB::table('tblbobotkomponen')
                ->where('grade', $request->input('grade'))
                ->first();

        if(!empty($cekgrade)){
            return response()->json(['message'=>'match']);
        }else{
            if($r1 < $r2){
                
                if(empty($cekr1) AND empty($cekr2)){
                    $data = DB::table('tblbobotkomponen')->insert([
                        'grade' => $request->input('grade'),
                        'range_1' => $request->input('range_awal'),
                        'range_2' => $request->input('range_akhir'),
                        'reg_date' => Carbon::now()->toDateTimeString()
                    ]);

                    if($data) {
                        // Alert::success('Berhasil', 'Data berhasil ditambahkan');
                        return response()->json(['message'=>'Berhasil']);
                    }else{
                        //DB::rollback();
                        // Alert::error('Gagal', 'Gagal menambahkan data !');
                        return response()->json(['message'=>'Gagal !']);
                    }
                }else{
                    return response()->json(['message'=>'reject']);
                }
        
            }else{

                return response()->json(['message'=>'fail']);
            }
        }

        // if($r1 < $r2){
                
        //     if(empty($cekr1) AND empty($cekr2)){
        //         return response()->json(['message'=>'Masok']);
        //     }else{
        //         return response()->json(['message'=>'Ditolak']);
        //     }
        
        // }else{

        //     return response()->json(['message'=>'Melebihi range']);
        // }

        // if(count($cek)){ 
        //     if($cek[0]->grade  == $request->input('grade')){
        //         return response()->json(['message' => 'match']);
        //     }
        // }else{
        //         $data = DB::table('tblbobotkomponen')->insert([
        //             'grade' => $request->input('grade'),
        //             'range_1' => $request->input('range_awal'),
        //             'range_2' => $request->input('range_akhir'),
        //             'reg_date' => Carbon::now()->toDateTimeString()
        //         ]);

        //         if($data) {
        //             // Alert::success('Berhasil', 'Data berhasil ditambahkan');
        //             return response()->json(['message'=>'Berhasil']);
        //         }else{
        //             //DB::rollback();
        //             // Alert::error('Gagal', 'Gagal menambahkan data !');
        //             return response()->json(['message'=>'Gagal !']);
        //         }
        // }
    }

    public function update(Request $request)
    {
            $data = DB::table('tblbobotkomponen')->where('idbobot',$request->input('id'))->update([
                'grade' => $request->input('grade'),
                'range_1' => $request->input('range_awal'),
                'range_2' => $request->input('range_akhir'),
                'reg_date' => Carbon::now()->toDateTimeString()
            ]);

            if($data) {                
                return response()->json(['message'=>'Berhasil']);
            }else{
                return response()->json(['message'=>'Gagal !']);
            }
    }

    public function destroy($id)
    {
        $data = DB::table('tblbobotkomponen')->where('idbobot',$id);
        $data->delete();

        if($data) {            
            return response()->json(['message'=>'Berhasil']);
        }else{
            return response()->json(['message'=>'Gagal']);
        }
    }

}
