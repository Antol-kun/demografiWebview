<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DemografiSiswa extends Controller
{
    protected $title = 'Demografi Siswa';

    function getJumlahSiswaPerKelas($kelas){
        return DB::table('v_jadwal_siswa')
                ->where('tingkat_kelas', $kelas)
                ->where('statusta', 'Y')
                ->distinct('nisn')
                ->count();
    }

    function getTingkatKelas(){
        // $dataTK = 
        return DB::table('tblkelompokkelas')->select('tingkat_kelas')->distinct('tingkat_kelas')->get();
        // $tkls = [];
        // foreach($dataTK as $tk){
        //     array_push($tkls, $tk->tingkat_kelas);
        // }
        // return $tkls;
    }

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
        return view('demografi.siswa.semua', $data);
    }

    public function tingkatKelas(){
        $data = [
            'title' => $this->title,
            'breadcrumb' => [
                ['url' => '/' , 'name' => 'Home'],
                ['url' => '/interface' , 'name' => 'Interface'],
                ['url' => '/master' , 'name' => 'List Data'],
            ],
            'testVariable' => $this->title
        ];

        $data['kelasX'] = $this->getJumlahSiswaPerKelas('X');
        $data['kelasXI'] = $this->getJumlahSiswaPerKelas('XI');
        $data['kelasXII'] = $this->getJumlahSiswaPerKelas('XII');

        $data['tingkatKelas'] = $this->getTingkatKelas();
        // dd($data['tingkatKelas']);
        return view('demografi.siswa.tingkatkelas', $data);
    }
    
    public function tahunMasuk(){
        $data = [
            'title' => $this->title,
            'breadcrumb' => [
                ['url' => '/' , 'name' => 'Home'],
                ['url' => '/interface' , 'name' => 'Interface'],
                ['url' => '/master' , 'name' => 'List Data'],
            ],
            'testVariable' => $this->title
        ];
        return view('demografi.siswa.tahunmasuk', $data);
    }

    public function jenisKelamin(){
        $data = [
            'title' => $this->title,
            'breadcrumb' => [
                ['url' => '/' , 'name' => 'Home'],
                ['url' => '/interface' , 'name' => 'Interface'],
                ['url' => '/master' , 'name' => 'List Data'],
            ],
            'testVariable' => $this->title
        ];
        return view('demografi.siswa.jeniskelamin', $data);
    }

    public function agama(){
        $data = [
            'title' => $this->title,
            'breadcrumb' => [
                ['url' => '/' , 'name' => 'Home'],
                ['url' => '/interface' , 'name' => 'Interface'],
                ['url' => '/master' , 'name' => 'List Data'],
            ],
            'testVariable' => $this->title
        ];
        return view('demografi.siswa.agama', $data);
    }

    public function statusSiswa(){
        $data = [
            'title' => $this->title,
            'breadcrumb' => [
                ['url' => '/' , 'name' => 'Home'],
                ['url' => '/interface' , 'name' => 'Interface'],
                ['url' => '/master' , 'name' => 'List Data'],
            ],
            'testVariable' => $this->title
        ];
        return view('demografi.siswa.statussiswa', $data);
    }
}
