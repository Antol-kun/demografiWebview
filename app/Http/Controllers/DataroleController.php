<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Carbon\Carbon;
use Alert;
use DataTables;
use Validator;

class DataroleController extends Controller
{
    public function getIndex(Request $request) {        
        $akses = DB::table('tblrole')
                ->select(DB::raw('tblhakakses.idhakakses, tblhakakses.nama_akses, COUNT(idfitur) AS jml')) 
                ->join('tblhakakses','tblhakakses.idhakakses','=','tblrole.role_deskripsi')
                ->groupBy('tblhakakses.idhakakses','tblhakakses.nama_akses')
                ->get();

        $data = [
            'title' => 'Data Hak Akses',
            'datahak' => $akses,          
            'breadcrumb' => [
                ['url' => '/' , 'name' => 'Home'],
                ['url' => '/interface' , 'name' => 'Interface'],
                ['url' => '/master' , 'name' => 'List Data'],
            ],
            
            'testVariable' => 'Hak Akses'
        ];
        
        return view('datarole.index', $data);
    }

    public function getCreate() {
        $pengguna = DB::table('tabelguru')->get();
        $fitur = DB::table('tblfitur')->get();
        $akses = DB::table('tblhakakses')->get();

        $data = [
            'title' => 'Tambah Data Hak Akses',
            'pengguna' => $pengguna,
            'datafitur' => $fitur,
            'dataakses' => $akses,
            'breadcrumb' => [
                ['url' => '/' , 'name' => 'Home'],
                ['url' => '/interface' , 'name' => 'Interface'],
                ['url' => '/master' , 'name' => 'List Data'],
            ],
            
            'testVariable' => 'Manajemen Hak Akses',
            'testVariable2' => 'Tabel Fitur Aplikasi',
            'testVariable3' => 'Setting Manajemen Hak Akses'
        ];
        
        return view('datarole.create', $data);
    }


    public function getEdit($id) {
        $hakakses = DB::table('tblhakakses')->get();
        $fitur = DB::table('tblfitur')->get();

        $editfitur = DB::table('tblrole')
                ->join('tblfitur','tblfitur.idfitur','=','tblrole.idfitur')
                ->join('tblhakakses','tblhakakses.idhakakses','=','tblrole.role_deskripsi')
                ->where('idhakakses', base64_decode($id))
                ->get();

        $role = DB::table('tblrole')
                ->join('tblhakakses','tblhakakses.idhakakses','=','tblrole.role_deskripsi')
                ->where('idhakakses', base64_decode($id))
                ->get();

        $data = [
            'title' => 'Ubah Data Hak Akses',
            'hakakses' => $hakakses,
            'editfitur' => $editfitur,
            'datafitur' => $fitur,
            'dataakses' => $role,
            'breadcrumb' => [
                ['url' => '/' , 'name' => 'Home'],
                ['url' => '/interface' , 'name' => 'Interface'],
                ['url' => '/master' , 'name' => 'List Data'],
            ],
            
            'testVariable' => 'Manajemen Hak Akses',
            'testVariable2' => 'Tabel Fitur Aplikasi',
            'testVariable3' => 'Setting Manajemen Hak Akses'
        ];
        
        return view('datarole.edit', $data);
    }

    public function getShow($id) {
        $pengguna = DB::table('tabelguru')->get();
        $fitur = DB::table('tblfitur')->get();
        $akses = DB::table('tblhakakses')->get();
        $role = DB::table('v_tblrole')->where('iduser', $id)->get();

        $data = [
            'title' => 'Detail Data Hak Akses',
            'pengguna' => $pengguna,
            'datafitur' => $fitur,
            'dataakses' => $akses,
            'datarole' => $role,
            'breadcrumb' => [
                ['url' => '/' , 'name' => 'Home'],
                ['url' => '/interface' , 'name' => 'Interface'],
                ['url' => '/master' , 'name' => 'List Data'],
            ],
            
            'testVariable' => 'Manajemen Hak Akses',
            'testVariable2' => 'Tabel Fitur Aplikasi',
            'testVariable3' => 'Setting Manajemen Hak Akses'
        ];
        
        return view('datarole.show', $data);
    }

    public function store(Request $request)
    {
        $fitur = $request->input('id');
        $arr = array();
        for($a=0; $a<count($fitur); $a++){
            array_push($arr, array('cek' => $fitur[$a], 'pub' => 'Y'));
        }

        $role;
        foreach ($arr as $key => $value) {
            $data = array(
                'iduser' => '0',//$request->input('pengguna'),
                'role_deskripsi' => $request->input('akses'),
                'idfitur' => $value['cek'],
                'publish' => $value['pub'],
                'reg_date' => Carbon::now()->toDateTimeString()
            );
            $role = DB::table('tblrole')->insert($data);            
        }

        if($role) {
            Alert::success('Berhasil', 'Data berhasil ditambahkan');
            return redirect('/datarole');
        }else{
            //DB::rollback();
            Alert::error('Berhasil', 'Gagal menambahkan data');
            return redirect('/datarole/store');
        }
    }

    public function update(Request $request)
    {
        $fitur = $request->input('id');
        $arr = array();
        for($a=0; $a<count($fitur); $a++){
            array_push($arr, array('cek' => $fitur[$a], 'pub' => 'Y'));
        }

        $role;
        foreach ($arr as $key => $value) {
            $cek = DB::table('tblrole')
                    ->where('role_deskripsi', $request->input('idhak'))
                    ->where('idfitur', $value['cek'])
                    ->get();
            
            $data = array(
                'iduser' => '0',//$request->input('pengguna'),
                'role_deskripsi' => $request->input('idhak'),
                'idfitur' => $value['cek'],
                'publish' => $value['pub'],
                'reg_date' => Carbon::now()->toDateTimeString()
            );

            if(count($cek)){
                if($cek[0]->role_deskripsi == $request->input('idhak') && $cek[0]->idfitur == $value['cek']){
                    // $role = DB::table('tblrole')->where('role_deskripsi', $request->input('idhak'))->update($data);
                    $role = false;
                }
            }else{
                $role = DB::table('tblrole')->insert($data);
            }
            

            // $role = DB::table('tblrole')->where('role_deskripsi', $request->input('akses'))->update($data);         
        }

        if($role) {
            Alert::success('Berhasil', 'Berhasil menambahkan fitur baru');
            return redirect('/datarole/edit/'.base64_encode($request->input('idhak')));
        }else{
            //DB::rollback();
            Alert::warning('Perhatian', 'Tidak terjadi perubahan fitur !');
            return redirect('/datarole/edit/'.base64_encode($request->input('idhak')));
        }
    }

    public function destroy($id)
    {
        $hak = base64_encode($id);

        $role =  DB::table('tblrole')->where('role_deskripsi', base64_decode($hak));
        $role->delete();

        if($role) {
            return response()->json(['message'=>'Berhasil']);
        }else{
            //DB::rollback();
            return response()->json(['message'=>'Gagal']);
        }
    }

    public function destroyfitur($param1, $param2)
    {
        $idhak = base64_encode($param1);
        $idfitur = base64_encode($param2);

        $role =  DB::table('tblrole')
                ->where('role_deskripsi', base64_decode($idhak))
                ->where('idfitur', base64_decode($idfitur));
        $role->delete();

        if($role) {
                return response()->json(['message'=>'Berhasil']);
            }else{
                //DB::rollback();
                return response()->json(['message'=>'Gagal']);
            }
    }

}
