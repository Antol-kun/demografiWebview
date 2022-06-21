<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DemografiGuru extends Controller
{
    public function jumlahGuru(){
        $data = [
            'title' => 'Demografi Guru',
            'breadcrumb' => [
                ['url' => '/' , 'name' => 'Home'],
                ['url' => '/interface' , 'name' => 'Interface'],
                ['url' => '/master' , 'name' => 'List Data'],
            ],
            'testVariable' => 'Demografi Guru'
        ];
        return view('demografi.guru.jumlahguru', $data);
    }

    public function jkGuru(){
        $data = [
            'title' => 'Demografi Guru',
            'breadcrumb' => [
                ['url' => '/' , 'name' => 'Home'],
                ['url' => '/interface' , 'name' => 'Interface'],
                ['url' => '/master' , 'name' => 'List Data'],
            ],
            'testVariable' => 'Demografi Guru'
        ];
        return view('demografi.guru.jkguru', $data);
    }

    public function pegawaiGuru(){
        $data = [
            'title' => 'Demografi Guru',
            'breadcrumb' => [
                ['url' => '/' , 'name' => 'Home'],
                ['url' => '/interface' , 'name' => 'Interface'],
                ['url' => '/master' , 'name' => 'List Data'],
            ],
            'testVariable' => 'Demografi Guru'
        ];
        return view('demografi.guru.status', $data);
    }

    public function sertifikasiGuru(){
        $data = [
            'title' => 'Demografi Guru',
            'breadcrumb' => [
                ['url' => '/' , 'name' => 'Home'],
                ['url' => '/interface' , 'name' => 'Interface'],
                ['url' => '/master' , 'name' => 'List Data'],
            ],
            'testVariable' => 'Demografi Guru'
        ];
        return view('demografi.guru.sertifikasi', $data);
    }

    public function pendidikanGuru(){
        $data = [
            'title' => 'Demografi Guru',
            'breadcrumb' => [
                ['url' => '/' , 'name' => 'Home'],
                ['url' => '/interface' , 'name' => 'Interface'],
                ['url' => '/master' , 'name' => 'List Data'],
            ],
            'testVariable' => 'Demografi Guru'
        ];
        return view('demografi.guru.pendidikan', $data);
    }

    public function maritalGuru(){
        $data = [
            'title' => 'Demografi Guru',
            'breadcrumb' => [
                ['url' => '/' , 'name' => 'Home'],
                ['url' => '/interface' , 'name' => 'Interface'],
                ['url' => '/master' , 'name' => 'List Data'],
            ],
            'testVariable' => 'Demografi Guru'
        ];
        return view('demografi.guru.marital', $data);
    }
}
