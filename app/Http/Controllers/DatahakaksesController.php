<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Carbon\Carbon;
use Alert;
use DataTables;

class DatahakaksesController extends Controller
{

    public function getIndex(Request $request) {
        $hakakses = DB::table('tblhakakses')
                    ->orderBy('idhakakses', 'desc')
                    ->get();

        $data = [
            'title' => 'Data Role',
            'datahak' => $hakakses,
            'breadcrumb' => [
                ['url' => '/' , 'name' => 'Home'],
                ['url' => '/interface' , 'name' => 'Interface'],
                ['url' => '/master' , 'name' => 'List Data'],
            ],
            
            'testVariable' => 'Role'
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
        
        return view('datahakakses.index', $data);
    }

    
    public function getCreate() {
        
        $data = [
            'title' => 'Tambah Data Role',
            'breadcrumb' => [
                ['url' => '/' , 'name' => 'Home'],
                ['url' => '/interface' , 'name' => 'Interface'],
                ['url' => '/master' , 'name' => 'List Data'],
            ],
            
            'testVariable' => 'Role'
        ];
        
        return view('datahakakses.create', $data);
    }

    public function getEdit($id) {
        $hakakses = DB::table('tblhakakses')->where('idhakakses', base64_decode($id))
                    ->get();
        
        $data = [
            'title' => 'Edit Data Role',
            'datahak' => $hakakses,
            'breadcrumb' => [
                ['url' => '/' , 'name' => 'Home'],
                ['url' => '/interface' , 'name' => 'Interface'],
                ['url' => '/master' , 'name' => 'List Data'],
            ],
            
            'testVariable' => 'Role'
        ];
        
        return view('datahakakses.edit', $data);
    }

    public function store(Request $request)
    {

        $data = DB::table('tblhakakses')->insert([
            'nama_akses' => $request->input('nama'),
            'keterangan_akses' => $request->input('keterangan'),
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
            $data = DB::table('tblhakakses')->where('idhakakses',$request->input('id'))->update([
                'nama_akses' => $request->input('nama'),
                'keterangan_akses' => $request->input('keterangan'),
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
        $idhak = base64_encode($id);
        
        $data = DB::table('tblhakakses')->where('idhakakses', base64_decode($idhak));
        $data->delete();

        if($data) {
            return response()->json(['message'=>'Berhasil']);
        }else{
            return response()->json(['message'=>'Gagal !']);
        }
    }

}
