<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DemografiSiswa extends Controller
{
    public function semua(){
        $data = [
            'title' => 'Demografi Siswa',
            'breadcrumb' => [
                ['url' => '/' , 'name' => 'Home'],
                ['url' => '/interface' , 'name' => 'Interface'],
                ['url' => '/master' , 'name' => 'List Data'],
            ],
            'testVariable' => 'Demografi Siswa'
        ];
        return view('demografi.siswa.semua', $data);
    }

    public function tingkatKelas(){
        $data = [
            'title' => 'Demografi Siswa',
            'breadcrumb' => [
                ['url' => '/' , 'name' => 'Home'],
                ['url' => '/interface' , 'name' => 'Interface'],
                ['url' => '/master' , 'name' => 'List Data'],
            ],
            'testVariable' => 'Demografi Siswa'
        ];
        return view('demografi.siswa.tingkatkelas', $data);
    }
    
    public function tahunMasuk(){
        $data = [
            'title' => 'Demografi Siswa',
            'breadcrumb' => [
                ['url' => '/' , 'name' => 'Home'],
                ['url' => '/interface' , 'name' => 'Interface'],
                ['url' => '/master' , 'name' => 'List Data'],
            ],
            'testVariable' => 'Demografi Siswa'
        ];
        return view('demografi.siswa.tahunmasuk', $data);
    }

    public function jenisKelamin(){
        $data = [
            'title' => 'Demografi Siswa',
            'breadcrumb' => [
                ['url' => '/' , 'name' => 'Home'],
                ['url' => '/interface' , 'name' => 'Interface'],
                ['url' => '/master' , 'name' => 'List Data'],
            ],
            'testVariable' => 'Demografi Siswa'
        ];
        return view('demografi.siswa.jeniskelamin', $data);
    }

    public function agama(){
        $data = [
            'title' => 'Demografi Siswa',
            'breadcrumb' => [
                ['url' => '/' , 'name' => 'Home'],
                ['url' => '/interface' , 'name' => 'Interface'],
                ['url' => '/master' , 'name' => 'List Data'],
            ],
            'testVariable' => 'Demografi Siswa'
        ];
        return view('demografi.siswa.agama', $data);
    }

    public function statusSiswa(){
        $data = [
            'title' => 'Demografi Siswa',
            'breadcrumb' => [
                ['url' => '/' , 'name' => 'Home'],
                ['url' => '/interface' , 'name' => 'Interface'],
                ['url' => '/master' , 'name' => 'List Data'],
            ],
            'testVariable' => 'Demografi Siswa'
        ];
        return view('demografi.siswa.statussiswa', $data);
    }
}
