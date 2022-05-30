<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Carbon\Carbon;
use Alert;
use DataTables;

class DataUserController extends Controller
{

    public function getIndex(Request $request) {
        $user = DB::table('tbuser')
                ->join('tblhakakses','tblhakakses.idhakakses','=','tbuser.id_hakakses')
                ->whereNotIn('id_hakakses',[22])
                ->orderBy('tbuser.id', 'DESC')
                ->get();

        $data = [
            'title' => 'Data User',
            'datauser' => $user,
            'breadcrumb' => [
                ['url' => '/' , 'name' => 'Home'],
                ['url' => '/interface' , 'name' => 'Interface'],
                ['url' => '/master' , 'name' => 'List Data'],
            ],
            
            'testVariable' => 'Data User'
        ];

        return view('datauser.index', $data);
    }

    
    public function getCreate() {
        $hakakses = DB::table('tblhakakses')
                    ->orderBy('idhakakses', 'desc')
                    ->get();

        $cekuser = DB::table('tbuser')
                ->select('username')
                ->whereNotIn('id_hakakses',[21])
                ->get();

        $arr = array();
        $batas = DB::table('tbuser')
                ->selectRaw('COUNT(username) AS batas')
                ->groupBy('username')
                ->get();

        foreach ($batas as $val) {
            
        if($val->batas < 2){
            foreach($cekuser as $datauser){
                array_push($arr, array($datauser->username));            
            }
        }

        }
		
		/*$batas = DB::table('tabelguru')
                ->select('Nama')
				->where('Jabatansekolah','Staff')
				->whereNotIn('Nip',$arr)
                ->get();*/

        $guru = DB::table('tabelguru')                
                // ->whereRaw('substring("Jabatansekolah", 7, 5) ='."'Staff"."'")
                ->where('Jabatansekolah','Staff')
				->orWhere('Jabatansekolah','Guru, Staff')
                ->whereNotIn('Nip',$arr)
                ->get();

        $data = [
            'title' => 'Tambah Data User',
            'datahak' => $hakakses,
            'dataguru' => $guru,
            'breadcrumb' => [
                ['url' => '/' , 'name' => 'Home'],
                ['url' => '/interface' , 'name' => 'Interface'],
                ['url' => '/master' , 'name' => 'List Data'],
            ],
            
            'testVariable' => 'Data User'
        ];
        
        return view('datauser.create', $data);
        //print_r($batas);
    }

    public function getUser($id)
    {
        $guru = DB::table('tabelguru')                
                // ->whereRaw('substring("Jabatansekolah", 7, 5) ='."'Staff"."'")
                // ->where('Jabatansekolah','Staff')
                // ->orWhere('Jabatansekolah','Guru, Staff')
                ->where('Nip',$id)
                ->get();

        if($guru){
            return response()->json($guru);
        }else{
            return response()->json(['empty']);
        }
    }

    public function getEdit($id) {
        $hakakses = DB::table('tblhakakses')
                    ->orderBy('idhakakses', 'desc')
                    ->get();

        $useredit = DB::table('tbuser')
                ->join('tblhakakses','tblhakakses.idhakakses','=','tbuser.id_hakakses')
                ->where('id',base64_decode($id))
                ->get();

        $cekuser = DB::table('tbuser')
                ->select('username')
                ->get();

        $arr = array();
        foreach($cekuser as $datauser){
            array_push($arr, array($datauser->username));            
        }

        $guru = DB::table('tabelguru')                
                //->whereRaw('substring("Jabatansekolah", 7, 5) ='."'Staff"."'")
				->where('Jabatansekolah','Staff')
                ->whereNotIn('Nip',$arr)
                ->get();

        $data = [
            'title' => 'Ubah Data User',
            'datahak' => $hakakses,
            'dataguru' => $guru,
            'datauser' => $useredit,
            'breadcrumb' => [
                ['url' => '/' , 'name' => 'Home'],
                ['url' => '/interface' , 'name' => 'Interface'],
                ['url' => '/master' , 'name' => 'List Data'],
            ],
            
            'testVariable' => 'Data User'
        ];
        
        return view('datauser.edit', $data);
    }


    public function getDetail($id)
    {
        $hakakses = DB::table('tblhakakses')
                    ->orderBy('idhakakses', 'desc')
                    ->get();

        $useredit = DB::table('tbuser')
                ->join('tblhakakses','tblhakakses.idhakakses','=','tbuser.id_hakakses')
                ->where('id',base64_decode($id))
                ->get();

        $cekuser = DB::table('tbuser')
                ->select('username')
                ->get();

        $arr = array();
        foreach($cekuser as $datauser){
            array_push($arr, array($datauser->username));            
        }

        $guru = DB::table('tabelguru')                
                //->whereRaw('substring("Jabatansekolah", 7, 5) ='."'Staff"."'")
				->where('Jabatansekolah','Staff')
                ->whereNotIn('Nip',$arr)
                ->get();

        $data = [
            'title' => 'Ubah Data User',
            'datahak' => $hakakses,
            'dataguru' => $guru,
            'datauser' => $useredit,
            'breadcrumb' => [
                ['url' => '/' , 'name' => 'Home'],
                ['url' => '/interface' , 'name' => 'Interface'],
                ['url' => '/master' , 'name' => 'List Data'],
            ],
            
            'testVariable' => 'Data User'
        ];

        return view('datauser.show', $data);
    }

    public function getUbahPass($id)
    {
        $detailuser = DB::table('tbuser')->where('id', base64_decode($id))->first();

        $data = [
            'title'  => 'Reset Password User',
            'duser'  => $detailuser,
            'breadcrumb' => [
                ['url' => '/' , 'name' => 'Home'],
                ['url' => '/interface' , 'name' => 'Interface'],
                ['url' => '/master' , 'name' => 'List Data'],
            ],
            
            'testVariable' => 'Data User'
        ];
        
        return view('datauser.ubahpass', $data);
    }

    public function postUbahPass($id, Request $request)
    {
        $data = DB::table('tbuser')->where('id', $id)->update([
            'password' => password_hash($request->password, PASSWORD_DEFAULT),
        ]);

        if($data) {                
            return response()->json(['message'=>'Berhasil']);
        }else{
            return response()->json(['message'=>'Gagal !']);
        }
    }

    public function store(Request $request)
    {

        $cek = DB::table('tbuser')->where('username', $request->input('username'))->get();

        if(count($cek) > 2){ 
            if($cek[0]->username  == $request->input('username')){
                return response()->json(['message' => 'match']);
            }
        }else{
            $seq = DB::table('tbuser')->max('id') + 1; 

                $data = DB::table('tbuser')->insert([
                    'id' => $seq,
                    'username' => $request->input('username'),
                    'password' => password_hash('12345678', PASSWORD_DEFAULT),
                    'nama' => $request->input('nama'),
                    'email' => $request->input('email'),
                    'created_at' => Carbon::now()->toDateTimeString(),
                    'active' => 'TRUE',
                    'id_hakakses' => $request->input('role')
                ]);

                if($data) {
                    // Alert::success('Berhasil', 'Data berhasil ditambahkan');
                    return response()->json(['message'=>'Berhasil']);
                }else{
                    //DB::rollback();
                    // Alert::error('Gagal', 'Gagal menambahkan data !');
                    return response()->json(['message'=>'Gagal !']);
                }
        }
    }

    public function update(Request $request)
    {
            $data = DB::table('tbuser')->where('id',$request->input('id'))->update([
                'username' => $request->input('username'),
                'password' => password_hash('12345678', PASSWORD_DEFAULT),
                'nama' => $request->input('nama'),
                'email' => $request->input('email'),
                'created_at' => Carbon::now()->toDateTimeString(),
                'active' => 'TRUE',
                'id_hakakses' => $request->input('role')
            ]);

            if($data) {                
                return response()->json(['message'=>'Berhasil']);
            }else{
                return response()->json(['message'=>'Gagal !']);
            }
    }

    public function destroy($id)
    {
        $iduser = base64_encode($id);

        $data = DB::table('tbuser')->where('id', base64_decode($iduser));
        $data->delete();

        if($data) {            
            return response()->json(['message'=>'Berhasil']);
        }else{
            return response()->json(['message'=>'Gagal']);
        }
    }

}
