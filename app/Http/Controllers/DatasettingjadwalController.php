<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Carbon\Carbon;
use Alert;
use DataTables;

class DatasettingjadwalController extends Controller
{
    //

    public function getIndex(Request $request) {
        $jadwal = DB::table('v_tabelsetting_jadwal')
                    ->get();

        $data = [
            'title' => 'Data Setting Jadwal',
            'jadwal' => $jadwal,
            'breadcrumb' => [
                ['url' => '/' , 'name' => 'Home'],
                ['url' => '/interface' , 'name' => 'Interface'],
                ['url' => '/master' , 'name' => 'List Data'],
            ],
            
            'testVariable' => 'Setting Jadwal'
        ];
       
        return view('datasettingjadwal.index', $data);
    }

    
    public function getCreate() {
        
        $kelas = DB::table('tblkelasberjalan')
                    ->join('tblkelompokkelas','tblkelasberjalan.idkelompokkls','=','tblkelompokkelas.idkelompokkls')
                    ->join('tabeltahunajaran','tabeltahunajaran.idsettingtahun','=','tblkelasberjalan.idsettingtahun')
                    // ->select('tblkelasberjalan.idke','tblkelasberjalan.idruangkelas as ruang')
                    ->where('statusta','Y')
                    ->orderBy('idkelasberjalan', 'desc')
                    ->get();

        $guru = DB::table('tabelguru')->whereNotIn('Jabatansekolah', ['Staff'])->get();
        $mapel = DB::table('tblmapel')->Join('tbljurusan','tblmapel.idjurusan','=','tbljurusan.idjurusan')->get();

        $data = [
            'title' => 'Tambah Data Setting Jadwal',
            'datakelas' => $kelas,
            'dataguru' => $guru,
            'datamapel' => $mapel,
            'breadcrumb' => [
                ['url' => '/' , 'name' => 'Home'],
                ['url' => '/interface' , 'name' => 'Interface'],
                ['url' => '/master' , 'name' => 'List Data'],
            ],
            
            'testVariable' => 'Setting Jadwal'
        ];
        
        return view('datasettingjadwal.create', $data);
        // print_r($mapel);
    }

    public function getEdit($id) {
        $kelas = DB::table('tblkelasberjalan')
                    ->join('tblkelompokkelas','tblkelasberjalan.idkelompokkls','=','tblkelompokkelas.idkelompokkls')
                    // ->select('tblkelasberjalan.idke','tblkelasberjalan.idruangkelas as ruang')
                    ->orderBy('idkelasberjalan', 'desc')
                    ->get();

        $guru = DB::table('tabelguru')->get();
        $mapel = DB::table('tblmapel')->get();

        $setjadwal = DB::table('v_tabelsetting_jadwal')->where('idsetjadwal', base64_decode($id))
                    ->get();

        $data = [
            'title' => 'Edit Data Setting Jadwal',
            'datakelas' => $kelas,
            'dataguru' => $guru,
            'datamapel' => $mapel,
            'datajadwal' => $setjadwal,
            'breadcrumb' => [
                ['url' => '/' , 'name' => 'Home'],
                ['url' => '/interface' , 'name' => 'Interface'],
                ['url' => '/master' , 'name' => 'List Data'],
            ],
            
            'testVariable' => 'Setting Jadwal'
        ];
        
        return view('datasettingjadwal.edit', $data);
    }

    public function getSetjadwal() {
        
        $data = [
            'title' => 'Tambah Data Setting Jadwal',
            'breadcrumb' => [
                ['url' => '/' , 'name' => 'Home'],
                ['url' => '/interface' , 'name' => 'Interface'],
                ['url' => '/master' , 'name' => 'List Data'],
            ],
            
            'testVariable' => 'Setting Jadwal'
        ];
        
        return view('datasettingjadwal.setjadwal', $data);
    }

    public function store(Request $request)
    {
        $hari = $request->input('hari');

        if($hari == 'Senin'){
            $kodehr = '1';
        }else if($hari == 'Selasa'){
            $kodehr = '2';
        }else if($hari == 'Rabu'){
            $kodehr = '3';
        }else if($hari == 'Kamis'){
            $kodehr = '4';
        }else if($hari == 'Jumat'){
            $kodehr = '5';
        }else if($hari == 'Sabtu'){
            $kodehr = '6';
        }

        // $data = DB::table('tblsettingjadwal')->insert([
        //     'idkelasberjalan' => $request->input('kelas'),
        //     'idmapel' => $request->input('mapel'),
        //     'idguru' => $request->input('guru'),
        //     'hari' => $hari,
        //     'jam_mulai' => $request->input('jam_mulai'),
        //     'jam_selesai' => $request->input('jam_selesai'),
        //     'reg_date' => Carbon::now()->toDateTimeString(),
        //     'kode_hari' => $kodehr
        // ]);

        // if($data) {
        //     Alert::success('Berhasil', 'Data berhasil ditambahkan');
        //     return response()->json(['message'=>'Berhasil']);
        // }else{
        //     //DB::rollback();
        //     Alert::error('Gagal', 'Gagal menambahkan data !');
        //     return response()->json(['message'=>'Gagal !']);
        // }
        
        // $cekguru1 = DB::select( DB::raw("SELECT * FROM tblsettingjadwal 
        //                                 WHERE idguru='".$request->input('guru')."'  AND hari='".$hari."' 
        //                                 AND jam_selesai >= '".$request->input('jam_selesai')."' AND jam_mulai <= '".$request->input('jam_selesai')."'") );

        // $cekguru2 = DB::select( DB::raw("SELECT * FROM tblsettingjadwal 
        //                                 WHERE idguru='".$request->input('guru')."'  AND hari='".$hari."' 
        //                                 AND jam_selesai >= '".$request->input('jam_mulai')."' AND jam_mulai <= '".$request->input('jam_mulai')."'") );

        // $cekkelas1 = DB::select( DB::raw("SELECT * FROM tblsettingjadwal 
        //                                 WHERE idkelasberjalan='".$request->input('kelas')."'  AND hari='".$hari."' 
        //                                 AND jam_selesai >= '".$request->input('jam_selesai')."' AND jam_mulai <= '".$request->input('jam_selesai')."'") );

        // $cekkelas2 = DB::select( DB::raw("SELECT * FROM tblsettingjadwal 
        //                                 WHERE idkelasberjalan='".$request->input('kelas')."'  AND hari='".$hari."' 
        //                                 AND jam_selesai >= '".$request->input('jam_mulai')."' AND jam_mulai <= '".$request->input('jam_mulai')."'") );


        $cg1 = DB::table('tblsettingjadwal')->where('idguru',$request->input('guru'))->where('hari',$hari)
                ->where('jam_selesai','>=',$request->input('jam_mulai'))->where('jam_mulai','<=',$request->input('jam_mulai'))->first();

        $cg2 = DB::table('tblsettingjadwal')->where('idguru',$request->input('guru'))->where('hari',$hari)
                ->where('jam_selesai','>=',$request->input('jam_selesai'))->where('jam_mulai','<=',$request->input('jam_selesai'))->first();

        $ck1 = DB::table('tblsettingjadwal')->where('idkelasberjalan',$request->input('kelas'))->where('hari',$hari)
                ->where('jam_selesai','>=',$request->input('jam_mulai'))->where('jam_mulai','<=',$request->input('jam_mulai'))->first();

        $ck2 = DB::table('tblsettingjadwal')->where('idkelasberjalan',$request->input('kelas'))->where('hari',$hari)
                ->where('jam_selesai','>=',$request->input('jam_selesai'))->where('jam_mulai','<=',$request->input('jam_selesai'))->first();


 // return response()->json($cg1);

        if(empty($cg1) AND empty($cg2) AND empty($ck1) AND empty($ck2)){
             $data = DB::table('tblsettingjadwal')->insert([
                'idkelasberjalan' => $request->input('kelas'),
                'idmapel' => $request->input('mapel'),
                'idguru' => $request->input('guru'),
                'hari' => $hari,
                'jam_mulai' => $request->input('jam_mulai'),
                'jam_selesai' => $request->input('jam_selesai'),
                'reg_date' => Carbon::now()->toDateTimeString(),
                'kode_hari' => $kodehr
            ]);

            if($data) {
                // Alert::success('Berhasil', 'Data berhasil ditambahkan');
                return response()->json(['message'=>'success']);
            }else{
                //DB::rollback();
                // Alert::error('Gagal', 'Gagal menambahkan data !');
                return response()->json(['message'=>'fail !']);
            }
            
        }else{
           return response()->json(['message'=>'match']);
        }
        
    }

    public function update(Request $request)
    {
            $hari = $request->input('hari');

            if($hari == 'Senin'){
                $kodehr = '1';
            }else if($hari == 'Selasa'){
                $kodehr = '2';
            }else if($hari == 'Rabu'){
                $kodehr = '3';
            }else if($hari == 'Kamis'){
                $kodehr = '4';
            }else if($hari == 'Jumat'){
                $kodehr = '5';
            }else if($hari == 'Sabtu'){
                $kodehr = '6';
            }

            $cekguru = DB::select( DB::raw("SELECT * FROM tblsettingjadwal 
                                        WHERE idguru='".$request->input('guru')."'  AND hari='".$hari."' 
                                        AND jam_mulai < '".$request->input('jam_mulai')."' AND jam_selesai > '".$request->input('jam_mulai')."'") );

            $cekkelas = DB::select( DB::raw("SELECT * FROM tblsettingjadwal 
                                            WHERE idkelasberjalan='".$request->input('kelas')."'  AND hari='".$hari."' 
                                            AND jam_mulai < '".$request->input('jam_mulai')."' AND jam_selesai > '".$request->input('jam_mulai')."'") );

            if(!empty($cekguru) AND !empty($cekkelas)){
                return response()->json(['message'=>'match']);
            }else{
                $setjadwal = DB::table('tblsettingjadwal')->where('idsetjadwal',$request->input('id'))->update([
                    'idkelasberjalan' => $request->input('kelas'),
                    'idmapel' => $request->input('mapel'),
                    'idguru' => $request->input('guru'),
                    'hari' => $hari,
                    'jam_mulai' => $request->input('jam_mulai'),
                    'jam_selesai' => $request->input('jam_selesai'),
                    'reg_date' => Carbon::now()->toDateTimeString(),
                    'kode_hari' => $kodehr
                ]);


                if($setjadwal) {
                    // Alert::success('Berhasil', 'Data berhasil diubah');
                    return response()->json(['message'=>'success']);
                }else{
                    //DB::rollback();
                    // Alert::error('Gagal', 'Gagal mengubah data !');
                    return response()->json(['message'=>'fail']);
                }

            }

    }

    public function destroy($id)
    {
        $setjadwal = DB::table('tblsettingjadwal')->where('idsetjadwal',$id);
        $setjadwal->delete();

        if ($setjadwal) {
            return response()->json(['message'=>'success']);
        } else {
            return response()->json(['message'=>'fail']);
        }
    }

}
