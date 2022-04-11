<?php

namespace App\Http\Controllers;

use \App\Models\Pelanggaran;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;
use Yajra\DataTables\Facades\DataTables;

class DataPelanggaranSiswaController extends Controller
{   
    public function getdata()
    {
        return DB::table('v_pelanggaran_detail')->orderBy('id', 'DESC')->get();
    }

    public function filterdata(Request $request)
    {
        $db = DB::table('v_pelanggaran_detail')->orderBy('id', 'DESC');
        if($request->kelas && $request->tahun){
            return $db->where('tingkat_kelas', $request->kelas)->where('tahunakademik', $request->tahun)->get();
        }elseif($request->kelas){
            return $db->where('tingkat_kelas', $request->kelas)->get();
        }elseif($request->tahun){
            return $db->where('tahunakademik', $request->tahun)->get();
        }
    }

    public function index()
    {
        $tahun = DB::table('tabeltahunajaran')->get()->pluck('tahunakademik');

        $data = [
            'title' => 'Data Pelanggaran Siswa',
            'breadcrumb' => [
                ['url' => '/' , 'name' => 'Home'],
                ['url' => '/interface' , 'name' => 'Interface'],
                ['url' => '/master' , 'name' => 'List Data Pelanggaran'],
            ],
            'tahun_ajaran' => $tahun,
            'testVariable' => 'Pelanggaran Siswa'
            
        ];

        return view('datapelanggaran.index', $data);
    }

    public function create()
    {
        $list_siswa = DB::table('tblsiswa')->get()->pluck('nisn','nama_siswa');
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
            'bukti_pelanggaran'=> 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048'
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
            $imgfile = Pelanggaran::where('id', $id)->get()->pluck('img_kasus');

            if($request->hasFile('bukti_pelanggaran') == false){
                // jika admin tidak edit foto
                // dd('gambar kosong');

                Pelanggaran::where('id', $id)->update([
                    'nisn'            => $request->nisn,
                    'tgl_kejadian'    => $request->tgl_kejadian,
                    'tempat_kejadian' => $request->tmpt_kejadian,
                    'saksi'           => $request->saksi,
                    'kasus'           => $request->kasus,
                    'sanksi'          => $request->sanksihukuman,
                    'jenis_sanksi'    => $request->jenis_sanksi,
                    'img_kasus'       => $imgfile[0], 
                ]);

                return response()->json(['success' => true]);
            }else{
                // jika admin melakukan edit foto

                $image = $request->file('bukti_pelanggaran');

                // dd($imgfile[0]);

                // hapus file foto yang lama
                $oldfile = public_path('bukti_pelanggaran/'.$imgfile[0]);
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

    public function destroy($id)
    {
        $imgfile = Pelanggaran::where('id', $id)->get()->pluck('img_kasus');
        $data = Pelanggaran::find($id);

        $oldfile = public_path('bukti_pelanggaran/'.$imgfile[0]);
        if(File::exists($oldfile)){
            File::delete($oldfile);
        }
        $data->delete();

        if($data){
            return response()->json(['success' => true]);
        }
    }
}