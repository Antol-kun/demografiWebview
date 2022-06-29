<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DemografiPresensiController extends Controller
{
    protected $title = 'Statistik Presensi';
    
    public function semua(){
        $data = [
            'title' => $this->title,
            'breadcrumb' => [
                ['url' => '/' , 'name' => 'Home'],
                ['url' => '/interface' , 'name' => 'Interface'],
                ['url' => '/master' , 'name' => 'List Data'],
            ],
            'testVariable' => $this->title,
        ];
        return view('demografi.presensi.semua', $data);
    }

    public function kelompokKelas(){
        $data = [
            'title' => $this->title,
            'breadcrumb' => [
                ['url' => '/' , 'name' => 'Home'],
                ['url' => '/interface' , 'name' => 'Interface'],
                ['url' => '/master' , 'name' => 'List Data'],
            ],
            'testVariable' => $this->title,
        ];
        return view('demografi.presensi.kelompokkelas', $data);
    }
}
