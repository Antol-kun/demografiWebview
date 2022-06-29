<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DemografiKeuanganSiswaController extends Controller
{
    protected $title = 'Statistik Keuangan Siswa';
    
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
        return view('demografi.keuangan.semua', $data);
    }

    public function kelompokkelas(){
        $data = [
            'title' => $this->title,
            'breadcrumb' => [
                ['url' => '/' , 'name' => 'Home'],
                ['url' => '/interface' , 'name' => 'Interface'],
                ['url' => '/master' , 'name' => 'List Data'],
            ],
            'testVariable' => $this->title,
        ];
        return view('demografi.keuangan.kelompokkelas', $data);
    }
}
