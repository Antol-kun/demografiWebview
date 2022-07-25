<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class DataKehadiranSiswaController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Data Kehadiran Siswa',
            'breadcrumb' => [
                ['url' => '/' , 'name' => 'Home'],
                ['url' => '/interface' , 'name' => 'Interface'],
                ['url' => '/master' , 'name' => 'List Data Kehadiran'],
            ],
            'izin' => DB::table('tblizinsiswa')->join('tblsiswa', 'tblsiswa.nisn', '=', 'tblizinsiswa.nisn')->orderBy('idizin', 'DESC')->get(),
            'testVariable' => 'Kehadiran Siswa'
        ];
        return view('datakehadiran.index', $data);
    }

    public function create()
    {
        $data = [
            'title' => 'Data Kehadiran Siswa',
            'breadcrumb' => [
                ['url' => '/' , 'name' => 'Home'],
                ['url' => '/interface' , 'name' => 'Interface'],
                ['url' => '/master' , 'name' => 'Form Data Kehadiran'],
            ],
            'list_siswa'   => DB::table('tblsiswa')->get()->pluck('nisn','nama_siswa'),
            'testVariable' => 'Kehadiran Siswa'
        ];
        return view('datakehadiran.create', $data);
    }

    public function store(Request $request)
    {
        // dd($request);
        $validate = Validator::make($request->all(), [
            'nisn'        => 'required',
            'keterangan'  => 'required',    
            'tgl_mulai'   => 'required',
            'tgl_selesai' => 'required'
        ]);

        if($validate->fails()){
            return response()->json(['success' => false, 'errors' => $validate->getMessageBag()->toArray()]);
        }else{
            // cek apakah siswa masih izin kehadiran
            $cek_tgl = DB::table('tblizinsiswa')
                        ->where('nisn', $request->nisn)
                        ->where('tgl_selesai', '>=', $request->tgl_selesai)
                        ->where('tgl_mulai', '<=', $request->tgl_selesai)
                        ->first();

            $cek_tgl2 = DB::table('tblizinsiswa')
                        ->where('nisn', $request->nisn)
                        ->where('tgl_selesai', '>=', $request->tgl_mulai)
                        ->where('tgl_mulai', '<=', $request->tgl_mulai)
                        ->first();

            // dd($cek_tgl, $cek_tgl2);
            if(!empty($cek_tgl) or !empty($cek_tgl2)){
                DB::table('tblizinsiswa')
                    ->where('idizin', $cek_tgl2->idizin)
                    ->update([
                        'nisn'        => $request->nisn,
                        'keterangan'  => $request->keterangan,
                        'tgl_mulai'   => $request->tgl_mulai,
                        'tgl_selesai' => $request->tgl_selesai,
                    ]);

                return response()->json([
                    'success'  => true,
                    'message' => 'Data kehadiran di update!'
                ]);
            } else {
                // jika siswa sama sekali tidak memiliki izin
                DB::table('tblizinsiswa')->insert([
                    'nisn'        => $request->nisn,
                    'keterangan'  => $request->keterangan,
                    'tgl_mulai'   => $request->tgl_mulai,
                    'tgl_selesai' => $request->tgl_selesai,
                ]);
    
                return response()->json([
                    'success' => true,
                    'message' => 'Berhasil menambahkan data kehadiran!'
                ]);
            }

        }
    }

    public function edit($id)
    {
        $data = [
            'title' => 'Data Kehadiran Siswa',
            'breadcrumb' => [
                ['url' => '/' , 'name' => 'Home'],
                ['url' => '/interface' , 'name' => 'Interface'],
                ['url' => '/master' , 'name' => 'Form Edit Data Kehadiran'],
            ],
            'list_siswa'   => DB::table('tblsiswa')->get()->pluck('nisn','nama_siswa'),
            'izin'         => DB::table('tblizinsiswa')->where('idizin', base64_decode($id))->get(),
            'testVariable' => 'Kehadiran Siswa'
        ];
        return view('datakehadiran.edit', $data);
    }

    public function update(Request $request, $id){
        $validate = Validator::make($request->all(), [
            'nisn'        => 'required',
            'keterangan'  => 'required',    
            'tgl_mulai'   => 'required',
            'tgl_selesai' => 'required'
        ]);

        if($validate->fails()){
            return response()->json(['success' => false, 'errors' => $validate->getMessageBag()->toArray()]);
        }else{
            $data = DB::table('tblizinsiswa')->where('idizin', base64_decode($id));
            $data->update([
                'nisn'        => $request->nisn,
                'keterangan'  => $request->keterangan,
                'tgl_mulai'   => $request->tgl_mulai,
                'tgl_selesai' => $request->tgl_selesai,
            ]);
            return response()->json(['success' => true]);
        }
    }

    public function destroy($id){
        $data = DB::table('tblizinsiswa')->where('idizin', $id);
        $data->delete();

        return response()->json(['success' => true]);
    }
}
