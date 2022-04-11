<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Carbon\Carbon;
use Alert;
use DataTables;

class Mading extends Controller
{

    public function getIndex(Request $request) {
        $info =  DB::table('table_pengumuman')
//                         ->join('table_tujuan_pengumuman', 'table_pengumuman.id', '=', 'table_tujuan_pengumuman.id_pengumuman')
//                        ->join('tblhakakses','table_tujuan_pengumuman.id_hakakses', '=', 'tblhakakses.idhakakses' )
//                         ->select('table_pengumuman.*', 'table_tujuan_pengumuman.id_hakakses','tblhakakses.nama_akses')
                         ->get();

             $penerima =  DB::table('tblhakakses')->get();

        $data = [
            'title' => 'Pengumuman',
            'info' => $info,
            'penerima' => $penerima,
            'breadcrumb' => [
                ['url' => '/' , 'name' => 'Home'],
                ['url' => '/interface' , 'name' => 'Interface'],
                ['url' => '/master' , 'name' => 'List Data'],
            ],
            
            'testVariable' => 'Pengumuman'
        ];

        // if ($request->ajax()) {
            

        //     return Datatables::of($data)
        //             ->addIndexColumn()
        //             ->addColumn('action', function($row){
        //                 $btn = '<a href="/datahakakses/edit/'.$row->idhakakses.'"><i class="fas fa-edit" style="font-size:15px;color:#009ef7;"></i></a>
        //                 <a href="/datahakakses/hapus/'.$row->idhakakses.'"><i class="fas fa-trash" style="font-size:15px;color:red;"></i></a>';
        //                 return $btn;
        //             })
        //             ->rawColumns(['action'])
        //             ->make(true);
        // }
        
        return view('datapengumuman.index', $data);
    }

    public function simpanPengumuman (Request $request) {

     // return $request->all();

        $input = DB::table('table_pengumuman')->insertGetId([
                    'judul' =>$request->judul,
                    'isi_pengumuman' =>$request->editordata,
                    'tgl_publish' => $request->tglpublish,
                    'tgl_close' => $request->tglclose
                ]);

        for ($a=0; $a<count($request->penerima); $a++){
            $inputtujuan = DB::table('table_tujuan_pengumuman')->insert([
                'id_pengumuman' =>$input,
                'id_hakakses' => $request->input('penerima')[$a],

            ]);
        }


        if ($input and $inputtujuan):

            return back()->with(['success' => 'Berhasil Menyimpan Pengumuman']);

        else:
            return back()->with(['warning' => 'Gagal Menyimpan Pengumuman!']);
        endif;

    }

    public function isiPengumuman (Request $request){

        $cek = DB::table('table_pengumuman')
                ->where('id', $request->id)->first();


       if($cek):
           echo $cek->isi_pengumuman;
       else:
            echo 'error';
       endif;

    }

    public function HapusPengumuman ($id){



        $hapus = DB::table('table_pengumuman')
            ->where('id', base64_decode($id))->delete();

        $hapusTujuan = DB::table('table_tujuan_pengumuman')
            ->where('id_pengumuman', base64_decode($id))->delete();

        if ($hapus and $hapusTujuan):

            return back()->with(['success' => 'Berhasil Menghapus Pengumuman']);

        else:
            return back()->with(['warning' => 'Gagal Menghapus Pengumuman!']);
        endif;

    }


    public function cekQuery ($id){

       // $cek = DB::table('tb_tugas')->pluck('id_komponen_nilai')->all();

        $cek = DB::table('tb_tugas')
            ->select(DB::raw('id_komponen_nilai'))
            ->whereNotNull('id_komponen_nilai')
            ->get();

        $kmp = [];
        foreach($cek as $komp){
            array_push($kmp, array($komp->id_komponen_nilai));
        }



        $komponen = DB::table('tb_komponen_nilai')
                     ->whereNotIn('id', $kmp)
                  ->get();

//        for ($a=0; $a<count())

        return $komponen;

    }

}
