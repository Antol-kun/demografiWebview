<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Carbon\Carbon;
use Alert;
use DataTables;
use Validator;

class ManajemenNilai extends Controller
{
    public function getIndex(Request $request) {        
        $mapel = DB::table('v_tb_jadwal_guru')
             ->select('idMapel','NIP','Gelardepan','Gelarbelakang', 'Nama','Kodemapel','idkelompokkls','Tahun','Semester','KelompokKelas','Jurusan','Namamapel','NamaKelompokKelas')->distinct('KelompokKelas','Kodemapel', 'NamaKelompokKelas')
            ->where('Status','Y')->get();

        $data = [
            'title' => 'Data Bobot Komponen Nilai',
            'mapel' => $mapel,
            'breadcrumb' => [
                ['url' => '/' , 'name' => 'Home'],
                ['url' => '/interface' , 'name' => 'Interface'],
                ['url' => '/master' , 'name' => 'List Data'],
            ],
            
            'testVariable' => 'Bobot Komponen Nilai',
            // 'testVariable2' => 'Tabel Fitur Aplikasi',
            'testVariable3' => 'Bobot Komponen Nilai'
        ];
        
        return view('databobotkomponennilai.index', $data);
    }

    public function getShowKomponen($nip) {

        $params = base64_decode($nip);
        $id = explode('>', $params);


        $komponen = DB::table('tblkomponenpenilaian')->get();
        $mapel = DB::table('v_tb_jadwal_guru')
            ->select('idMapel','NIP','Kodemapel','idkelompokkls','Tahun','Semester','KelompokKelas','Jurusan','Namamapel','NamaKelompokKelas')->distinct('KelompokKelas','Kodemapel', 'NamaKelompokKelas')
            ->where('Status','Y')
            ->where('NIP', $id[0])->get();
        // $param = array(
        //              'nip'=>base64_decode($nip),'idmapel'=>base64_decode($id2),
        //              'tahun'=>base64_decode($id3),'semester'=>base64_decode($id4),
        //              'idkelompokkls'=>base64_decode($id5),'Namamapel'=>base64_decode($id6),
        //              'Kelompokkelas'=>base64_decode($id7), 'Kelas'=>base64_decode($id8)
        //              /*'Guru'=>base64_decode($id8),
        //              'Gelardepan'=>base64_decode($id9), 'Gelarbelakang'=>base64_decode($id10),*/
        //              );

            // $data['param'] = 

        $data = [
            'title' => 'Data Bobot Komponen Nilai',
            'komponen' => $komponen,
            'mapel' => $mapel,
            //'param' => $param,
            'breadcrumb' => [
                ['url' => '/' , 'name' => 'Home'],
                ['url' => '/interface' , 'name' => 'Interface'],
                ['url' => '/master' , 'name' => 'List Data'],
            ],
            
            'testVariable' => 'Bobot Komponen Nilai',
            // 'testVariable2' => 'Tabel Fitur Aplikasi',
            'testVariable3' => 'Bobot Komponen Nilai'
        ];
        
        return view('databobotkomponennilai.show', $data);
    }


       public function CekBobot (Request $request){
        $id =  base64_decode($request->id);
        $params = explode('>', $id);
        $cekpresentase = DB::table('tb_komponen_nilai')
            ->select(DB::raw('SUM(bobot) as totalbobot'))
            ->where('idkomponen', $params[0])
            ->where('nip', $params[2])
            ->where('kode_mapel', $params[3])
            ->where('tahun', $params[4])
            ->where('semester', $params[5])
            ->where('idkelompokkls', $params[6])->first();

        if ($cekpresentase-> totalbobot == NULL){
           $jumlah = array('totalbobot' => 0 ) ;
        }else{
            $jumlah = $cekpresentase;
        }

        return response()->json($jumlah);
    }
    

     public function ViewNilaiKomponen ($id) {
    

        $code = base64_decode($id);
        $idx = explode('>', $code);

        $data['komponen'] = DB::table('tb_komponen_nilai')
            ->where('idkomponen', $idx[0])
              ->where('nip', $idx[2])
                ->where('kode_mapel', $idx[3])
                ->where('tahun', $idx[4])
                ->where('semester', $idx[5])
                ->where('idkelompokkls', $idx[6])
                 ->get();


       // return $data['komponen'];

       return view('databobotkomponennilai.viewkomponen', $data);

    }


        public function SimpanKomponen(Request $request){


        $id =  $request->paramsnya;
        $params = explode('>', $id);

   //return $request->all();

        $data= array(
            'nama_komponen' => $request->namakomponen,
            'idkomponen' => $params[5],
            'bobot' => $request->bobot,
            'nip'=> $params[0],
            'kode_mapel' => $params[1],
            'tahun' => $params[2],
            'semester' => $params[3],
            'created_at' => date('Y-m-d H:i:s'),
            'idkelompokkls'=> $params[4],
        );


        if (empty($request->kelaslaen)):

            $input =  DB::table('tb_komponen_nilai')->insert($data);

            if ($input):
                echo 'success';
            else:
                echo 'gagal';
            endif;

        else:

            $input =  DB::table('tb_komponen_nilai')->insert($data);

            for ($x=0; $x<count($request->kelaslaen); $x++) {

                $split = explode('>', $request->input('kelaslaen')[$x]);

                $inputLagi = DB::table('tb_komponen_nilai')->insert([
                    'nama_komponen' => $request->namakomponen,
                    'idkomponen' => $params[5],
                    'bobot' => $request->bobot,
                    'nip' => $params[0],
                    'kode_mapel' => $split[0],
                    'tahun' => $split[1],
                    'semester' => $split[2],
                    'created_at' => date('Y-m-d H:i:s'),
                    'idkelompokkls' => $split[3],
                ]);
            }

            if ($input and $inputLagi):
                echo 'success';
            else:
                echo 'gagal';
            endif;

       endif;


    }




    public function simpanNilai (Request $request){

        for ($m=0; $m<count($request->nilai); $m++){
            $params = explode('>', $request->input('params')[$m]);

            if ($request->input('nilai')[$m] == '' or $request->input('nilai')[$m] == Null):
                $nilai = 0;
            else:
                $nilai = $request->input('nilai')[$m];
            endif;

            $input = DB::table('tabelnilaisiswa')->insert([
                        'nisn' => $params[0],
                        'id_komp_penilaian' =>  $params[6],
                        'id_komponen_nilai' => $params[7],
                        'nilai_mentah' => $nilai,
                        'id_user_input' => Auth::user()->id,
                        'nip' => $params[1],
                        'idMapel' => $params[2],
                        'id_kelompok_kelas' => $params[5],
                        'semester' => $params[4],
                        'created_at' => date('Y-m-d H:i:s'),
                        'tahun' => $params[3]
                    ]);
        }

        for ($k=0; $k<count($request->keterangan); $k++){


                $split = explode('>', $request->input('idKet')[$k]);

                $inputKet = DB::table('tabel_ket_nilaisiswa')->insert([
                    'nisn' => $split[0],
                    'nip' => $split[1],
                    'keterangan' => $request->input('keterangan')[$k],
                    'id_komp_penilaian' =>  $split[6],
                    'idMapel' => $split[2],
                    'id_kelompok_kelas' => $split[5],
                    'tahun' => $split[3],
                    'semester' => $split[4],
                    'id_user_input' => Auth::user()->id,
                    'created_at' => date('Y-m-d H:i:s'),
                ]);


        }

        if ($input and $inputKet){
            return back()->with(['success' => 'Data Nilai Berhasil Disimpan !']);
        }else{
            return back()->with(['warning' => 'Data Nilai Gagal Disimpan !']);
        }

    }
    

      public function CekEditKomponen (Request $request){

        $ids =  $request->id;
        $idx = explode('>', $ids);

//        $dataSekarang = DB::table('tb_komponen_nilai')
//            ->where('id', $idx[0])->first();
//
//        $typeKomponen = array('type' =>  $idx[1]);


        $cekpresentase = DB::table('tb_komponen_nilai')
            ->select(DB::raw('SUM(bobot) as totalbobot'))
            ->where('idkomponen', $idx[6])
            ->where('nip', $idx[1])
            ->where('kode_mapel',$idx[2])
            ->where('tahun', $idx[3])
            ->where('semester', $idx[4])
            ->where('idkelompokkls', $idx[5])->first();



        return response()->json($cekpresentase);

    }


     public function SimpanUbah ($id, Request $request){

        $idx = DB::table('tb_komponen_nilai')->where('id',$id)->update([
            'bobot' =>  $request->editbobot,
            'nama_komponen' => $request->editnamakomponen
        ]);

       

       if( $idx){
           echo 'success';
       }else{
           echo 'gagal';
       }

    }

    public function HapusKomponen ($id){

        $params = base64_decode($id);

        $Hapus = DB::table('tb_komponen_nilai')->where('id',$params)->delete();

        if ($Hapus){
            return back()->with(['success' => 'Data Komponen Berhasil Dihapus !']);
        }else{
            return back()->with(['warning' => 'Data Komponen Gagal Dihapus !']);
        }

    }
    

}
