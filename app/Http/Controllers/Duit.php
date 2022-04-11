<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\Input; //untuk input::get
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


use Redirect; //untuk redirect
use DB;

use Illuminate\Http\Request;
use App\Models\User;

class Duit extends Controller
{

   public function paketpembayaran(){

        $paket =  DB::table('paket_pembayaran')
                         ->join('tabeltahunajaran', 'paket_pembayaran.tahun_ajaran', '=', 'tabeltahunajaran.idsettingtahun')
                         ->select('paket_pembayaran.*', 'tabeltahunajaran.tahunakademik', 'tabeltahunajaran.semester')
                         ->get();

         $komponenbiaya = DB::table('tblkomponenbiaya')
                       ->get();

         $ta = DB::table('tabeltahunajaran')
                        ->where('statusta', 'Y')
                        ->get();
         $data = [
            'title' => 'Paket Pembayaran',
            'paket' => $paket,
            'komponenbiaya' => $komponenbiaya,
            'ta' => $ta,
            'breadcrumb' => [
                ['url' => '/' , 'name' => 'Home'],
                ['url' => '/interface' , 'name' => 'Interface'],
                ['url' => '/master' , 'name' => 'List Data'],
            ],
            
            'testVariable' => 'Paket Pembayaran'
        ];        

        return view('Duit.PaketPembayaran',$data);

    }


    public function rekappembayaransiswa(){

         $data = [
            'title' => 'Rekap Pembayaran Siswa',
            'breadcrumb' => [
                ['url' => '/' , 'name' => 'Home'],
                ['url' => '/interface' , 'name' => 'Interface'],
                ['url' => '/master' , 'name' => 'List Data'],
            ],
            
            'testVariable' => 'Data Rekap Pembayaran Siswa'
        ];        

        return view('Duit.RekapPembayaran',$data);

    }

    public function siswabelumlunas (){

        $data = [
            'title' => 'Siswa Belum Lunas',
            'breadcrumb' => [
                ['url' => '/' , 'name' => 'Home'],
                ['url' => '/interface' , 'name' => 'Interface'],
                ['url' => '/master' , 'name' => 'List Data'],
            ],
            
            'testVariable' => 'Data Siswa Belum Lunas'
        ];        

        return view('Duit.SiswaBelumLunas',$data);

    }

    public function detailtunggakan (){

        $data = [
            'title' => 'Detail Tagihan Belum Lunas',
            'breadcrumb' => [
                ['url' => '/' , 'name' => 'Home'],
                ['url' => '/interface' , 'name' => 'Interface'],
                ['url' => '/master' , 'name' => 'List Data'],
            ],
            
            'testVariable' => 'Data Detail Tagihan Belum Lunas'
        ];        

        return view('Duit.DetailBelumLunas',$data);

    }

    public function log_pembayaransiswa (){

         $data = [
            'title' => 'Historis Pembayaran Siswa',
            'breadcrumb' => [
                ['url' => '/' , 'name' => 'Home'],
                ['url' => '/interface' , 'name' => 'Interface'],
                ['url' => '/master' , 'name' => 'List Data'],
            ],
            
            'testVariable' => 'Data Historis Pembayaran Siswa'
        ];        

        return view('Duit.LogPembayaran',$data);

    }

    public function verifmanualpembayaran (){

        $data = [
            'title' => 'Verifikasi Manual Pembayaran Siswa',
            'breadcrumb' => [
                ['url' => '/' , 'name' => 'Home'],
                ['url' => '/interface' , 'name' => 'Interface'],
                ['url' => '/master' , 'name' => 'List Data'],
            ],
            
            'testVariable' => 'Data Verifikasi Manual Pembayaran Siswa'
        ];        

        return view('Duit.VerifManualPembayaran',$data);

    }


   public function simpanpaket (Request $request){

      // return $request->all();

       $data = array(
          'nama_paket' => $request->paket,
          'tahun_ajaran' => $request->tahunajaran,
           'frekuensi_before' => $request->fre_before,
           'tgl_pembayaran' => $request->tgl_pembayaran,
           'frekuensi_after' => $request->fre_after,
           'tgl_tagihan' => $request->tgl_tagihan,
           'type_pembayaran' => $request->tipetagihan,
           'bulan_bayaran' => $request->blnbayaran,
       );

       $inputpaket = DB::table('paket_pembayaran')
                    ->insertGetId($data);

        if ($inputpaket):

          $idkomponen = $request->input('ckomponen');

            for($a=0;$a<count($idkomponen); $a++){

                $inputDetailPaket = DB::table('detail_paket_pembayaran')
                                    ->insert([
                                       'id_paket_pembayaran' => $inputpaket,
                                       'id_komponen_biaya' => $idkomponen[$a]
                                    ]);

            }

            if ($inputDetailPaket):

                return back()->with(['success' => 'Berhasil Menyimpan Data Paket Pembayaran']);

            else:
                return back()->with(['warning' => 'Gagal Menyimpan Data Detail Paket Pembayaran!']);
            endif;

        else:
            return back()->with(['warning' => 'Gagal Menyimpan Data Paket Pembayaran!']);

        endif;

   }

   public function detailpaket ($id,$nama) {

      $paket =  DB::table('paket_pembayaran')
           ->join('tabeltahunajaran', 'paket_pembayaran.tahun_ajaran', '=', 'tabeltahunajaran.idsettingtahun')
           ->select('paket_pembayaran.*', 'tabeltahunajaran.tahunakademik', 'tabeltahunajaran.semester')
           ->where('id', base64_decode($id))
           ->first();

       $detail =  DB::table('detail_paket_pembayaran')
           ->join('tblkomponenbiaya', 'detail_paket_pembayaran.id_komponen_biaya', '=', 'tblkomponenbiaya.idkomponen')
           ->select('detail_paket_pembayaran.*', 'tblkomponenbiaya.nama_komponen', 'tblkomponenbiaya.besaran_biaya')
           ->where('id_paket_pembayaran', base64_decode($id))
           ->get();

       $komponenbiaya = DB::table('tblkomponenbiaya')
           ->get();

      $data = [
            'title' => 'Detail Paket '.base64_decode($nama),
            'paket' => $paket,
            'detail' => $detail,
            'komponenbiaya' => $komponenbiaya,
            'breadcrumb' => [
                ['url' => '/' , 'name' => 'Home'],
                ['url' => '/interface' , 'name' => 'Interface'],
                ['url' => '/master' , 'name' => 'List Data'],
            ],
            
            'testVariable' => 'Detail Paket Pembayaran'
        ];      

       return view('Duit.DetailPaket',$data);

   }

   public function hapuspaket ($id){



       $hapuspaket = DB::table('paket_pembayaran')
                    ->where('id',base64_decode($id))->delete();

       $hapusdetail = DB::table('detail_paket_pembayaran')
                  ->where('id_paket_pembayaran',base64_decode($id))->delete();

       if ($hapuspaket and $hapusdetail):

           return back()->with(['success' => 'Berhasil Menghapus Data Paket Pembayaran']);

       else:
           return back()->with(['warning' => 'Gagal Menghapus Data  Paket Pembayaran!']);
       endif;

   }

    public function hapusdetailpaket ($id){


        $hapusdetail = DB::table('detail_paket_pembayaran')
            ->where('id_detail_paket',base64_decode($id))->delete();

        if ($hapusdetail):

            return back()->with(['success' => 'Berhasil Menghapus Data  Detail Paket Pembayaran']);

        else:
            return back()->with(['warning' => 'Gagal Menghapus Data Detail Paket Pembayaran!']);
        endif;

    }

    public function tambahkomponenpaket ($id, Request $request) {

        $idkomponen = $request->input('ckomponen');



        if (empty($idkomponen) ):

            return back()->with(['warning' => 'Mohon Pilih Komponen Biaya!']);

        else:
            for($a=0;$a<count($idkomponen); $a++){

                $inputDetailPaket = DB::table('detail_paket_pembayaran')
                    ->insert([
                        'id_paket_pembayaran' => $id,
                        'id_komponen_biaya' => $idkomponen[$a]
                    ]);

            }

            if ($inputDetailPaket):

                return back()->with(['success' => 'Berhasil Menambah Komponen Data Paket Pembayaran']);

            else:
                return back()->with(['warning' => 'Gagal Menyimpan Komponen Data  Paket Pembayaran!']);
            endif;



        endif;




    }

    public function settingsiswa (){
		
		$paket =  DB::table('paket_pembayaran')
            ->join('tabeltahunajaran', 'paket_pembayaran.tahun_ajaran', '=', 'tabeltahunajaran.idsettingtahun')
            ->select('paket_pembayaran.*', 'tabeltahunajaran.tahunakademik', 'tabeltahunajaran.semester')
            ->get();

        $kelas =  DB::table('tblkelasberjalan')
            ->join('tblkelompokkelas', 'tblkelasberjalan.idkelompokkls', '=', 'tblkelompokkelas.idkelompokkls')
            ->join('tbljurusan', 'tblkelompokkelas.idjurusan', '=', 'tbljurusan.idjurusan')
            ->join('tb_kelas_siswa', 'tblkelasberjalan.idkelasberjalan', '=', 'tb_kelas_siswa.idkelasberjalan')
            ->join('tblsiswa', 'tb_kelas_siswa.nisn', '=', 'tblsiswa.nisn')
            ->select('tbljurusan.singkatan', 'tblkelompokkelas.tingkat_kelas', 'tblkelompokkelas.nama_kelompok')
            ->groupBy('tbljurusan.singkatan', 'tblkelompokkelas.tingkat_kelas', 'tblkelompokkelas.nama_kelompok')
            ->get();
		
		$data = [
            'title' => 'Setting Paket Pembayaran Siswa',
            'paket' => $paket,
			'kelas' => $kelas,
            'breadcrumb' => [
                ['url' => '/' , 'name' => 'Home'],
                ['url' => '/interface' , 'name' => 'Interface'],
                ['url' => '/master' , 'name' => 'List Data'],
            ],
            
            'testVariable' => 'Data Paket Pembayaran'
        ];        

        return view('Duit.SettingSiswa',$data);
    }

    public function loadsiswa ($id){

       $idx = explode('-',$id);

        $data['siswa'] =  DB::table('tblkelasberjalan')
            ->join('tblkelompokkelas', 'tblkelasberjalan.idkelompokkls', '=', 'tblkelompokkelas.idkelompokkls')
            ->join('tbljurusan', 'tblkelompokkelas.idjurusan', '=', 'tbljurusan.idjurusan')
            ->join('tb_kelas_siswa', 'tblkelasberjalan.idkelasberjalan', '=', 'tb_kelas_siswa.idkelasberjalan')
            ->join('tblsiswa', 'tb_kelas_siswa.nisn', '=', 'tblsiswa.nisn')
            ->select('tblsiswa.nisn','tblsiswa.nama_siswa', 'tbljurusan.singkatan', 'tblkelompokkelas.tingkat_kelas', 'tblkelompokkelas.nama_kelompok')
            ->where('tblkelompokkelas.tingkat_kelas' , $idx[0])
            ->where('tbljurusan.singkatan' , $idx[1])
            ->where('tblkelompokkelas.nama_kelompok' , $idx[2])
            ->get();

             $data['listSiswa'] = [];

        for ($a=0; $a<count($data['siswa']); $a++){
            array_push($data['listSiswa'],[
                'nisn' => $data['siswa'][$a]->nisn,
                'nama_siswa' => $data['siswa'][$a]->nama_siswa,
                'paket' => $this->listpsiswa($data['siswa'][$a]->nisn)
            ]);
        }



        return view('Duit.ShowSiswa',$data);

    }

     public function listpaketsiswa ($id){

       $i = base64_decode($id);

        $data['isipaket'] = DB::table('tabel_pembayaran_siswa')
                     ->select('tabel_pembayaran_siswa.*','paket_pembayaran.nama_paket')
                    ->join('paket_pembayaran', 'paket_pembayaran.id', '=', 'tabel_pembayaran_siswa.id_paket_pembayaran')
                       ->where('tabel_pembayaran_siswa.nisn',$i)
                      ->get();



        return view('Duit.Listpaketsiswa',$data);



    }

     public function listpsiswa ($id){



        $p= DB::table('tabel_pembayaran_siswa')
            ->join('paket_pembayaran', 'paket_pembayaran.id', '=', 'tabel_pembayaran_siswa.id_paket_pembayaran')
            ->where('tabel_pembayaran_siswa.nisn',$id)
            ->get();


        if (empty($p)){
            return 0;
        }else {
            return $p;
        }




    }

    public function simpanpaketsiswa (Request $request){

      // return $request->all();
        $nisn = $request->input('nisn');

        for ($i=0; $i<count($nisn); $i++){
           
            $cek = DB::table('tabel_pembayaran_siswa')
                    ->where('id_paket_pembayaran' , $request->input('idpaket'))
                    ->where('nisn' , $nisn[$i])
                    ->where('status' , 'Belum Lunas')
                    ->first();

            if (empty($cek)){
                $input = DB::table('tabel_pembayaran_siswa')->insert([
                    'id_paket_pembayaran' => $request->input('idpaket'),
                    'nisn' => $nisn[$i],
                    'status' => 'Belum Lunas'
                ]);
            }else{
                $input = true;
            }
        }



        if ($input):

            return back()->with(['success' => 'Berhasil Menyimpan Paket Pembayaran Siswa']);

        else:
            return back()->with(['warning' => 'Gagal Menyimpan Paket Pembayaran Siswa!']);
        endif;


    }

     public function hapuspaket_siswa($id){



       $ids = base64_decode($id);
       $idx = explode('-', $ids);



       $hapus = DB::table('tabel_pembayaran_siswa')
                ->where ('id', $idx[1])
                ->delete();

                 $hapus2 = DB::table('tabel_pembayaran_siswa')
                ->where ('id', $idx[1])
                ->get();

          




       if ($hapus):

           return back()->with(['success' => 'Berhasil Menghapus Paket Pembayaran Siswa']);

       else:
           return back()->with(['warning' => 'Gagal Menghapus Paket Pembayaran Siswa!']);
       endif;
    }

}
