<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DemografiKinerjaGuruController extends Controller
{
    protected $title = 'Statistik Kinerja Guru';

    public function presensi(){
        $data = [
            'title' => $this->title,
            'breadcrumb' => [
                ['url' => '/' , 'name' => 'Home'],
                ['url' => '/interface' , 'name' => 'Interface'],
                ['url' => '/master' , 'name' => 'List Data'],
            ],
            'testVariable' => $this->title,
        ];

        // generate data filter bulan
        $bulan = [];
        for ($i = 12; $i > 0; $i--) { 
            $timestamp = mktime(0, 0, 0, date('n') - $i, 1); 
            $bulan[date('n', $timestamp)] = date('M', $timestamp); 
        }
        $data['bulan'] = $bulan;

        return view('demografi.kinerjaguru.presensi', $data);
    }

    public function materi(){
        $data = [
            'title' => $this->title,
            'breadcrumb' => [
                ['url' => '/' , 'name' => 'Home'],
                ['url' => '/interface' , 'name' => 'Interface'],
                ['url' => '/master' , 'name' => 'List Data'],
            ],
            'testVariable' => $this->title,
        ];
        return view('demografi.kinerjaguru.materi', $data);
    }

    public function tugas(){
        $data = [
            'title' => $this->title,
            'breadcrumb' => [
                ['url' => '/' , 'name' => 'Home'],
                ['url' => '/interface' , 'name' => 'Interface'],
                ['url' => '/master' , 'name' => 'List Data'],
            ],
            'testVariable' => $this->title,
        ];
        return view('demografi.kinerjaguru.tugas', $data);
    }

    public function quiz(){
        $data = [
            'title' => $this->title,
            'breadcrumb' => [
                ['url' => '/' , 'name' => 'Home'],
                ['url' => '/interface' , 'name' => 'Interface'],
                ['url' => '/master' , 'name' => 'List Data'],
            ],
            'testVariable' => $this->title,
        ];
        return view('demografi.kinerjaguru.quiz', $data);
    }

    public function banksoal(){
        $data = [
            'title' => $this->title,
            'breadcrumb' => [
                ['url' => '/' , 'name' => 'Home'],
                ['url' => '/interface' , 'name' => 'Interface'],
                ['url' => '/master' , 'name' => 'List Data'],
            ],
            'testVariable' => $this->title,
        ];
        return view('demografi.kinerjaguru.banksoal', $data);
    }

    public function bankmateri(){
        $data = [
            'title' => $this->title,
            'breadcrumb' => [
                ['url' => '/' , 'name' => 'Home'],
                ['url' => '/interface' , 'name' => 'Interface'],
                ['url' => '/master' , 'name' => 'List Data'],
            ],
            'testVariable' => $this->title,
        ];
        return view('demografi.kinerjaguru.bankmateri', $data);
    }
}