<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DemografiPegawai extends Controller
{
    protected $title = 'Demografi Pegawai';

    public function jumlahPegawai(){
        $data = [
            'title' => $this->title,
            'breadcrumb' => [
                ['url' => '/' , 'name' => 'Home'],
                ['url' => '/interface' , 'name' => 'Interface'],
                ['url' => '/master' , 'name' => 'List Data'],
            ],
            'testVariable' => $this->title
        ];
        return view('demografi.pegawai.semua', $data);
    }

    public function jkPegawai(){
        $data = [
            'title' => $this->title,
            'breadcrumb' => [
                ['url' => '/' , 'name' => 'Home'],
                ['url' => '/interface' , 'name' => 'Interface'],
                ['url' => '/master' , 'name' => 'List Data'],
            ],
            'testVariable' => $this->title
        ];
        return view('demografi.pegawai.jkpegawai', $data);
    }

    public function status(){
        $data = [
            'title' => $this->title,
            'breadcrumb' => [
                ['url' => '/' , 'name' => 'Home'],
                ['url' => '/interface' , 'name' => 'Interface'],
                ['url' => '/master' , 'name' => 'List Data'],
            ],
            'testVariable' => $this->title
        ];
        return view('demografi.pegawai.status', $data);
    }

    public function sertifikasiPegawai(){
        $data = [
            'title' => $this->title,
            'breadcrumb' => [
                ['url' => '/' , 'name' => 'Home'],
                ['url' => '/interface' , 'name' => 'Interface'],
                ['url' => '/master' , 'name' => 'List Data'],
            ],
            'testVariable' => $this->title
        ];
        return view('demografi.pegawai.sertifikasi', $data);
    }

    public function pendidikanPegawai(){
        $data = [
            'title' => $this->title,
            'breadcrumb' => [
                ['url' => '/' , 'name' => 'Home'],
                ['url' => '/interface' , 'name' => 'Interface'],
                ['url' => '/master' , 'name' => 'List Data'],
            ],
            'testVariable' => $this->title
        ];
        return view('demografi.pegawai.pendidikan', $data);
    }

    public function maritalPegawai(){
        $data = [
            'title' => $this->title,
            'breadcrumb' => [
                ['url' => '/' , 'name' => 'Home'],
                ['url' => '/interface' , 'name' => 'Interface'],
                ['url' => '/master' , 'name' => 'List Data'],
            ],
            'testVariable' => $this->title
        ];
        return view('demografi.pegawai.marital', $data);
    }
}
