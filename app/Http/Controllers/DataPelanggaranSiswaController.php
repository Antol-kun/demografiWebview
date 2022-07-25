<?php

namespace App\Http\Controllers;

use \App\Models\Pelanggaran;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;
use Yajra\DataTables\Facades\DataTables;

class DataPelanggaranSiswaController extends Controller
{ 
    public function filterdata(Request $request)
    {
        // dd($request->all());
        $db = DB::table('tblpelanggaran')->leftjoin('v_jadwal_siswa', 'tblpelanggaran.nisn', '=', 'v_jadwal_siswa.nisn')->distinct('tblpelanggaran.id')->orderBy('tblpelanggaran.id', 'desc');

        if($request->kelas){
            $siswa = $db->where('tingkat_kelas', $request->kelas)->get();
            $hasil = view('datapelanggaran.tablePelanggaran', compact('siswa'));
        }elseif($request->tahun){
            $siswa = $db->where('tahunakademik', $request->tahun)->get();
            $hasil = view('datapelanggaran.tablePelanggaran', compact('siswa'));
        }elseif($request->kel_kls){
            $siswa = $db->where('kode_kelompok', $request->kel_kls)->get();
            $hasil = view('datapelanggaran.tablePelanggaran', compact('siswa'));
        }elseif($request->kelas && $request->tahun){
            $siswa = $db->where('kode_kelompok', $request->kelas)
                    ->where('tahunakademik', $request->tahun)
                    ->get();
            $hasil = view('datapelanggaran.tablePelanggaran', compact('siswa'));
        }elseif($request->kelas && $request->kel_kls){
            $siswa = $db->where('kode_kelompok', $request->kelas)
                    ->where('kode_kelompok', $request->kel_kls)
                    ->get();
            $hasil = view('datapelanggaran.tablePelanggaran', compact('siswa'));
        }elseif($request->kel_kls && $request->tahun){
            $siswa = $db->where('kode_kelompok', $request->kel_kls)
                    ->where('tahunakademik', $request->tahun)
                    ->get();
            $hasil = view('datapelanggaran.tablePelanggaran', compact('siswa'));
        }elseif($request->kelas && $request->tahun && $request->kel_kls){
            $siswa = $db->where('tingkat_kelas', $request->kelas)
                        ->where('tahunakademik', $request->tahun)
                        ->where('kode_kelompok', $request->kel_kls)->get();
            $hasil = view('datapelanggaran.tablePelanggaran', compact('siswa'));
        }

        return $hasil;
    }
    
    public function index()
    {
        $tahun   = DB::table('tabeltahunajaran')->get()->pluck('tahunakademik');
        $kel_kls = DB::table('tblkelompokkelas')->orderBy('kode_kelompok', 'ASC')->get()->pluck('kode_kelompok');

        $data = [
            'title' => 'Data Pelanggaran Siswa',
            'breadcrumb' => [
                ['url' => '/' , 'name' => 'Home'],
                ['url' => '/interface' , 'name' => 'Interface'],
                ['url' => '/master' , 'name' => 'List Data Pelanggaran'],
            ],
            'tahun_ajaran'   => $tahun,
            'kel_kls'        => $kel_kls,
            // 'tingkat_kls'    => DB::table('v_pelanggaran_detail')->select('tingkat_kelas')->groupBy('tingkat_kelas')->get(),
            // 'tahun_akademik' => DB::table('v_pelanggaran_detail')->select('tahunakademik')->groupBy('tahunakademik')->get(),
            // 'kode_kelompok'  => DB::table('v_pelanggaran_detail')->select('kode_kelompok')->groupBy('kode_kelompok')->get(),
            'siswa'          => DB::table('tblpelanggaran')->leftjoin('v_jadwal_siswa', 'tblpelanggaran.nisn', '=', 'v_jadwal_siswa.nisn')->distinct('tblpelanggaran.id')->orderBy('tblpelanggaran.id', 'desc')->get(),
            'testVariable'   => 'Pelanggaran Siswa'
        ];
        
        return view('datapelanggaran.index', $data);
    }

    public function create()
    {
        $list_siswa = DB::table('v_jadwal_siswa')->distinct('nisn')->pluck('nisn','nama_siswa');
        $data = [
            'title' => 'Tambah Data Pelanggar',
            'breadcrumb' => [
                ['url' => '/' , 'name' => 'Home'],
                ['url' => '/interface' , 'name' => 'Interface'],
                ['url' => '/master' , 'name' => 'Tambah Data Pelanggar'],
            ],
            'list_siswa' => $list_siswa,
            'testVariable' => 'Pelanggaran Siswa'
        ];

        // dd($data);

        return view('datapelanggaran.create', $data);
    }

    public function store(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'nisn'           => 'required',
            'tgl_kejadian'   => 'required',
            'tmpt_kejadian'  => 'required',
            'saksi'          => 'required',
            'kasus'          => 'required',
            'sanksihukuman'  => 'required',
            'jenis_sanksi'   => 'required',
            'bukti_pelanggaran'=> 'image|mimes:jpg,png,jpeg,gif,svg|max:2048'
        ]);

        if($validate->fails()){
            return response()->json([
                'success' => false,
                'errors'  => $validate->getMessageBag()->toArray()
            ]);
        } else {
            if($request->file('bukti_pelanggaran')){
                //store file into document folder
                $image = $request->file('bukti_pelanggaran');
                $new_name = rand() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('bukti_pelanggaran/'), $new_name);

                Pelanggaran::insert([
                    'nisn'            => $request->nisn,
                    'tgl_kejadian'    => $request->tgl_kejadian,
                    'tempat_kejadian' => $request->tmpt_kejadian,
                    'saksi'           => $request->saksi,
                    'kasus'           => $request->kasus,
                    'sanksi'          => $request->sanksihukuman,
                    'jenis_sanksi'    => $request->jenis_sanksi,
                    'img_kasus'       => url('bukti_pelanggaran/'.$new_name), 
                ]);
    
                return response()->json(['success' => true]);
            }else{
                Pelanggaran::insert([
                    'nisn'            => $request->nisn,
                    'tgl_kejadian'    => $request->tgl_kejadian,
                    'tempat_kejadian' => $request->tmpt_kejadian,
                    'saksi'           => $request->saksi,
                    'kasus'           => $request->kasus,
                    'sanksi'          => $request->sanksihukuman,
                    'jenis_sanksi'    => $request->jenis_sanksi,
                ]);
    
                return response()->json(['success' => true]);
            }
        }
    }

    public function edit($id)
    {
        $list  = DB::table('tblsiswa')->get()->pluck('nisn','nama_siswa');
        $siswa = Pelanggaran::where('id', base64_decode($id))->get();

        $data = [
            'title' => 'Edit Data Pelanggar',
            'breadcrumb' => [
                ['url' => '/' , 'name' => 'Home'],
                ['url' => '/interface' , 'name' => 'Interface'],
                ['url' => '/master' , 'name' => 'Edit Data Pelanggar'],
            ],
            'list'  => $list,
            'siswa' => $siswa,
            
            'testVariable' => 'Pelanggaran Siswa'
        ];

        return view('datapelanggaran.edit', $data);
    }

    public function update(Request $request, $id)
    {
        $validate = Validator::make($request->all(), [
            'nisn'           => 'required',
            'tgl_kejadian'   => 'required',
            'tmpt_kejadian'  => 'required',
            'saksi'          => 'required',
            'kasus'          => 'required',
            'sanksihukuman'  => 'required',
            'jenis_sanksi'   => 'required',
            'bukti_pelanggaran' => 'image|mimes:jpg,png,jpeg,gif,svg|max:2048'
        ]);

        if($validate->fails()){
            return response()->json([
                'success' => false
            ]);
        } else {
            $imgfile = Pelanggaran::where('id', $id)->pluck('img_kasus')->first();

            if($imgfile != null){
                if($request->hasFile('bukti_pelanggaran') == false){
                    Pelanggaran::where('id', $id)->update([
                        'nisn'            => $request->nisn,
                        'tgl_kejadian'    => $request->tgl_kejadian,
                        'tempat_kejadian' => $request->tmpt_kejadian,
                        'saksi'           => $request->saksi,
                        'kasus'           => $request->kasus,
                        'sanksi'          => $request->sanksihukuman,
                        'jenis_sanksi'    => $request->jenis_sanksi,
                        'img_kasus'       => $imgfile, 
                    ]);
    
                    return response()->json(['success' => true]);
                }else{
                    // jika admin melakukan edit foto
    
                    $image = $request->file('bukti_pelanggaran');
    
                    // hapus file foto yang lama
                    $oldfile = public_path('bukti_pelanggaran/'.$imgfile);
                    if(File::exists($oldfile)){
                        File::delete($oldfile);
                    }
                    
                    // ganti dengan file foto yang baru
                    $name_edited = rand() . '.' . $image->getClientOriginalExtension();
                    $image->move(public_path('bukti_pelanggaran/'), $name_edited);
    
                    // dd(url('bukti_pelanggaran/'.$name_edited));
    
                    Pelanggaran::where('id', $id)->update([
                        'nisn'            => $request->nisn,
                        'tgl_kejadian'    => $request->tgl_kejadian,
                        'tempat_kejadian' => $request->tmpt_kejadian,
                        'saksi'           => $request->saksi,
                        'kasus'           => $request->kasus,
                        'sanksi'          => $request->sanksihukuman,
                        'jenis_sanksi'    => $request->jenis_sanksi,
                        'img_kasus'       => url('bukti_pelanggaran/'.$name_edited),
                    ]);
    
                    return response()->json(['success' => true]);
                }
            }else{
                if($request->hasFile('bukti_pelanggaran') == false){
                    Pelanggaran::where('id', $id)->update([
                        'nisn'            => $request->nisn,
                        'tgl_kejadian'    => $request->tgl_kejadian,
                        'tempat_kejadian' => $request->tmpt_kejadian,
                        'saksi'           => $request->saksi,
                        'kasus'           => $request->kasus,
                        'sanksi'          => $request->sanksihukuman,
                        'jenis_sanksi'    => $request->jenis_sanksi,
                        'img_kasus'       => $imgfile, 
                    ]);
    
                    return response()->json(['success' => true]);
                }else{
                    // jika admin melakukan edit foto
                    $image = $request->file('bukti_pelanggaran');
    
                    // hapus file foto yang lama
                    $oldfile = public_path('bukti_pelanggaran/'.$imgfile);
                    if(File::exists($oldfile)){
                        File::delete($oldfile);
                    }
                    
                    // ganti dengan file foto yang baru
                    $name_edited = rand() . '.' . $image->getClientOriginalExtension();
                    $image->move(public_path('bukti_pelanggaran/'), $name_edited);
    
                    // dd(url('bukti_pelanggaran/'.$name_edited));
    
                    Pelanggaran::where('id', $id)->update([
                        'nisn'            => $request->nisn,
                        'tgl_kejadian'    => $request->tgl_kejadian,
                        'tempat_kejadian' => $request->tmpt_kejadian,
                        'saksi'           => $request->saksi,
                        'kasus'           => $request->kasus,
                        'sanksi'          => $request->sanksihukuman,
                        'jenis_sanksi'    => $request->jenis_sanksi,
                        'img_kasus'       => url('bukti_pelanggaran/'.$name_edited),
                    ]);
    
                    return response()->json(['success' => true]);
                }
            }
        }
    }

    public function destroy($id)
    {
        $imgfile = Pelanggaran::where('id', $id)->first()->pluck('img_kasus');

        if($imgfile != null){
            $oldfile = public_path('bukti_pelanggaran/'.$imgfile);
            if(File::exists($oldfile)){
                File::delete($oldfile);
            }
        }

        if(Pelanggaran::where('id', $id)->delete()){
            return response()->json(['success' => true]);
        }
    }
}