<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\Input; //untuk input::get
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


use Redirect; //untuk redirect
use DB;
use Session;
use \App\Models\User;
use Illuminate\Http\Request;


class AuthController extends Controller
{

   public function login (){

        $data['logo'] = DB::table('tblsekolah')->limit(1)->first();
        return view('authen.login',$data);
    }

     public function helpdesk (){

        $data['logo'] = DB::table('tblsekolah')->limit(1)->first();
        return view('LupaPassword',$data);

    }

    public function sendemail (Request $request){

           $user = $request->username;

            $akun =   DB::table('v_login_users')
                ->where('username', $user)->first();

            if (empty($akun)){
                return back()->with(['warning' => 'NIP/NISN yang Anda Masukan Tidak Ditemukan !']);
            }else{
                $pwd = $this->acak(8);
                $pwbaru = Hash::make($pwd);

                $ubah =   DB::table('tbuser')
                    ->where('username', $user)->update([
                        'password' => $pwbaru
                    ]);

                // Konfigurasi email

                $details = [
                    'password' => $pwd,
                ];

                \Mail::to($akun->email)->send(new \App\Mail\MyTestMail($details));


                if ($ubah):
                    return back()->with(['success' => 'Harap Periksa Kotak Masuk/Spam Email Anda, Password Baru Telah Dikirimkan']);
                else:
                    return back()->with(['warning' => 'Gagal Mereset Password !']);
                endif;
            }


        }

    function postlogin (Request $request){

     $akun =   DB::table('v_login_users')
           ->whereNotIn('nama_akses', ['Guru','Siswa'])
           ->where('username', $request->username)
           ->first();
        //    ->where('password', $request->password)->first();           

            if ($akun) {
                // cek enkripsi password
                $passwordEnkripsi = $akun->password;
                $password = $request->password;
                // $benar = ;
                
                // manggil data user yang login
                // Auth::user()->nama
                // kalo di file selain controller dan view
                // auth()->user
                if (password_verify($password, $passwordEnkripsi)) {
                    Auth::LoginUsingId($akun->id);
                    
                    // Cek akun aktif/tidak belom ditambahkan.               
                    if ($akun->active == true){
                        // if($akun->nama_akses == 'Admin') {
                        //     // return Auth::user();
                        //     Session::put('iduser',$akun->id);
                        //     Session::put('username',$akun->username);
                        //     Session::put('nama',$akun->nama);
                        //     Session::put('email',$akun->email);
                        //     Session::put('level',$akun->nama_akses);
                        //     return redirect('/admin_dashboard');
                        //     // echo "Admin";

                        // } else if($akun->nama_akses != 'Admin') {
                            
                        //     $cekstaff = DB::table('v_login_pegawai')
                        //     ->where('username', $request->username)->first();
                            
                        //     // $akses = substr($cekstaff->Jabatansekolah, 6, 7);
                        //     if(!empty($cekstaff)){
                        //         Session::put('iduser',$cekstaff->id);
                        //         Session::put('username',$cekstaff->username);
                        //         Session::put('nama',$cekstaff->nama);
                        //         Session::put('email',$cekstaff->email);
                        //         Session::put('level',$cekstaff->Jabatansekolah);

                        //         $jml = strlen($cekstaff->Jabatansekolah);
                        //         if($jml == '11'){
                        //             return redirect('/staff_dashboard');
                        //         }else if($jml == '5'){
                        //             return redirect('/staff_dashboard');
                        //         }
                        //     }else{
                        //         $this->logout();
                        //         return back()->with(['warning' => 'Akses user tidak ditemukan !']);
                        //     }
                            
                            
                        // }else{
                        //     $this->logout();
                        //     return back()->with(['warning' => 'Akses user tidak ditemukan !']);
                        // }
                        // echo $akun->nama_akses;

                        if($akun->nama_akses == 'Admin') {
                            Session::put('iduser',$akun->id);
                            Session::put('username',$akun->username);
                            Session::put('nama',$akun->nama);
                            Session::put('email',$akun->email);
                            Session::put('level',$akun->nama_akses);
                            return redirect('/dashboard');
                            // echo $akun->nama_akses;
                        }else{
                            Session::put('iduser',$akun->id);
                            Session::put('username',$akun->username);
                            Session::put('nama',$akun->nama);
                            Session::put('email',$akun->email);
                            Session::put('level',$akun->nama_akses);
                            return redirect('/dashboard');
                            // echo $akun->nama_akses;
                        }

                }else{
                    return back()->with(['warning' => 'Akun tidak aktif !']);
                }

                } else {
                    return back()->with(['warning' => 'Password yang Anda Masukan Salah !']);
                }
            } else {
                return back()->with(['warning' => 'Username Tidak Ditemukan !']);
            }

    }

    public function profile($id)
    {
        $akun = DB::table('tabelguru')->where('Nip',base64_decode($id))->get();

        $data = [
            'title' => 'Profil',
            'dataguru' => $akun,
            'breadcrumb' => [
                ['url' => '/' , 'name' => 'Home'],
                ['url' => '/interface' , 'name' => 'Interface'],
                ['url' => '/master' , 'name' => 'List Data'],
            ],
            
            'testVariable' => 'Profil Pengguna'
        ];

        return view('authen.profil',$data);
        // print_r(base64_decode($id));
    }

     public function password($id)
    {
        $akun = DB::table('tabelguru')->where('Nip',base64_decode($id))->get();

        $data = [
            'title' => 'Password',
            'dataguru' => $akun,
            'breadcrumb' => [
                ['url' => '/' , 'name' => 'Home'],
                ['url' => '/interface' , 'name' => 'Interface'],
                ['url' => '/master' , 'name' => 'List Data'],
            ],
            
            'testVariable' => 'Password Pengguna'
        ];

        return view('authen.passw',$data);
        // print_r(base64_decode($id));
    }


public function savepass(Request $request){

      if (password_verify($request->passlama, Auth::user()->password)){

            $updatePass = DB::table('tbuser')
                            ->where('id', Auth::user()->id)
                            ->update([
                                'password' => Hash::make($request->passbaru)
                            ]);
            if ($updatePass):
                echo 'success';
            else:
                echo 'djancok';
            endif;
        }else{
            echo 'salah';
        }


}

 // public function acak($panjang)
 //    {
 //        $karakter= 'ABCDEFGHJKLMNPQRSTUVWXYZ23456789';
 //        $string = '';
 //        for ($i = 0; $i < $panjang; $i++) {
 //            $pos = rand(0, strlen($karakter)-1);
 //            $string .= $karakter{$pos};
 //        }
 //        return $string;
 //    }

    public function logout () {
        Auth::logout();
        Session::flush();
        return redirect('/');
    }

}
