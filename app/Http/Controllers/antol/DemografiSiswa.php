<?php

namespace App\Http\Controllers\antol;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DemografiSiswa extends Controller
{
    protected $title = 'Demografi Siswa';

    // Function Umum
    function getJenkel($jk){
        return DB::table('tblsiswa')->where('jenkel', $jk)->count();
    }

    function getTingkatKelas($tk){
        return DB::table('v_jadwal_siswa')->distinct('nisn')->where('tingkat_kelas', $tk)->count();
    }

    function getStatusSiswa($stat){
        return DB::table('tblsiswa')->where('statussiswa', $stat)->count();
    }

    function getAgama($ag){
        return DB::table('tblsiswa')->where('agama', $ag)->count();
    }

    function getKelompokKls(){
        // $arrKls = DB::table('v_jadwal_siswa')->distinct('kode_kelompok')->pluck('kode_kelompok');
        $arrKls = DB::table('tblkelompokkelas')->pluck('kode_kelompok');
        $jmlKls = DB::table('v_jadwal_siswa')->pluck('kode_kelompok');
        
        $dataKls = [];
        foreach($arrKls as $k){
            if($k != null){
                array_push($dataKls, $k);
            }else{
                array_push($dataKls, 'Belum Disetting');
            }
        }

        $nullKls = [];
        // get data yang belum disetting (null)
        foreach($jmlKls as $j){
            if($j == null){
                array_push($nullKls, $j);
            }
        }
        $klskosong = ['Belum Disetting' => count($nullKls)];

        // get data yang memiliki isi
        $dataCampur = [];
        foreach($jmlKls as $j){
            if($j != null){
                foreach($dataKls as $dk){
                    if($dk == $j){
                        $dataCampur[$dk] = DB::table('v_jadwal_siswa')->distinct('nisn')->where('kode_kelompok', $j)->count();
                    }
                }
            }
        }
        
        if($klskosong == 0){
            $combine = array_merge($klskosong, $dataCampur);
        }else{
            $combine = $dataCampur;
        }
        // dd($combine);
        return $combine;
    }
    // end function Umum

    // function tingkat kls
    function getTKelasJenkel($jk, $tk){
        return DB::table('v_jadwal_siswa_demografi')->distinct('nisn')->where('tingkat_kelas', $tk)->where('jenkel', $jk)->count();
    }

    function getTKelasAgama($agama, $tk){
        return DB::table('v_jadwal_siswa_demografi')->distinct('nisn')->where('tingkat_kelas', $tk)->where('agama', $agama)->count();
    }

    function getTKelasStatus($status, $tk){
        return DB::table('v_jadwal_siswa_demografi')->distinct('nisn')->where('tingkat_kelas', $tk)->where('statussiswa', $status)->count();
    }
    // end function tingkat kls

    // function tahun masuk
    function getJumlahSiswaTM(int $tahun){
        return DB::table('tblsiswa')->where('tahunmasuk', $tahun)->count();
    }

    function getJumlahSiswaTMJK(int $tahun, $jk){
        return DB::table('tblsiswa')->where('tahunmasuk', $tahun)->where('jenkel', $jk)->count();
    }

    function getJumlahSiswaTMAgama(int $tahun, $agama){
        return DB::table('tblsiswa')->where('tahunmasuk', $tahun)->where('agama', $agama)->count();
    }
    // end function tahun masuk

    // function jenis kelamin
    function getJKTingkatKls($jk, $tk){
        return DB::table('v_jadwal_siswa_demografi')->distinct('nisn')->where('jenkel', $jk)->where('tingkat_kelas', $tk)->count();
    }
    // end function jenis kelamin

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

        // Stat Semua
        $data['Seluruh'] = DB::table('tblsiswa')->count();

        $data['tahunAkhir'] = DB::table('tblsiswa')->distinct('tahunmasuk')->orderBy('tahunmasuk', 'desc')->limit(1)->pluck('tahunmasuk')->first();
        $data['jmlAkhir'] = DB::table('v_jadwal_siswa')->distinct('nisn')->where('tahunakademik', $data['tahunAkhir'])->count();
        // End Stat Semua

        // Perjenis kelamin
        $data['laki'] = $this->getJenkel('l');
        $data['perempuan'] = $this->getJenkel('p');
        // end jenis kelamin

        // Per Tingkat Kelas
        $data['tkls'] = [];
        $data['jmlkelas'] = [];
        $tingkatkls = DB::table('tblkelompokkelas')->distinct('tingkat_kelas')->pluck('tingkat_kelas');
        foreach($tingkatkls as $tk){
            array_push($data['jmlkelas'], $this->getTingkatKelas($tk));
            array_push($data['tkls'], 'Kelas '.$tk);
        }
        // End Tingkat Kelas

        // Per Kelompok Kelas
        $data['series'] = []; $data['labels'] = [];
        foreach ($this->getKelompokKls() as $key => $kk) {
            array_push($data['series'], $kk);
            array_push($data['labels'], $key);
        }
        // End Kelompok Kelas

        // Per Agama
        $agamaArr = ['Islam', 'Katolik', 'Protestan', 'Buddha', 'Konghuchu', 'Hindu'];
        foreach($agamaArr as $a){
            $data[$a] = $this->getAgama($a);
        }
        // End Agama

        // Per Status Siswa
        $statusArr = ['Aktif', 'Lulus', 'DO', 'Mutasi'];
        foreach($statusArr as $s){
            $data[$s]  = $this->getStatusSiswa($s);
        }
        // End Status Siswa

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

        // Per Tingkat Kelas
        $data['tkls'] = [];
        $data['jmlkelas'] = [];
        $tingkatkls = DB::table('tblkelompokkelas')->distinct('tingkat_kelas')->pluck('tingkat_kelas');
        foreach($tingkatkls as $tk){
            array_push($data['jmlkelas'], $this->getTingkatKelas($tk));
            array_push($data['tkls'], 'Kelas '.$tk);
        }
        // End Tingkat Kelas

        // Per TK JK
        foreach($tingkatkls as $tk){;
            $data['kelas'.$tk.'_LK'] = $this->getTKelasJenkel('l', $tk);
            $data['kelas'.$tk.'_P'] = $this->getTKelasJenkel('p', $tk);
        }
        // End TK JK

        // Per TK Agama
        $agamaArr = ['Islam', 'Katolik', 'Protestan', 'Buddha', 'Konghuchu', 'Hindu'];
        foreach($agamaArr as $ag){
            $data[$ag] = [];
            foreach ($tingkatkls as $tk) {
                 array_push($data[$ag], $this->getTKelasAgama($ag, $tk));
            }
        }
        // End TK Agama

        // Per Status Siswa
        $statusSiswa = ['Aktif', 'Lulus', 'DO', 'Mutasi'];
        foreach($statusSiswa as $ss){
            $data[$ss]  = [];
            foreach ($tingkatkls as $tk) {
                 array_push($data[$ss], $this->getTKelasStatus($ss, $tk));
            }
        }
        // End Status Siswa

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

        $arrTM = DB::table('tblsiswa')->distinct('tahunmasuk')->limit(3)->orderBy('tahunmasuk', 'asc')->pluck('tahunmasuk');
        // Per Tahun Masuk
        $data['jmlTahunMasuk'] = [];
        foreach($arrTM as $tm){
             array_push($data['jmlTahunMasuk'], $this->getJumlahSiswaTM($tm));
        }
        $data['tahunmasuk'] = $arrTM;
        // End Tahun Masuk

        // Per Tahun Masuk JK
        $data['jmLKTMJK'] = []; // jml Laki Thn Masuk Jenis Kelamin
        $data['jmPTMJK'] = []; // jml Perempuan Thn Masuk Jenis Kelamin
        foreach($arrTM as $tm){
             array_push($data['jmLKTMJK'], $this->getJumlahSiswaTMJK($tm, 'l'));
             array_push($data['jmPTMJK'], $this->getJumlahSiswaTMJK($tm, 'p'));
        }
        // End Per Tahun Masuk JK

        // Per Tahun Masuk Agama
        $agamaArr = ['Islam', 'Katolik', 'Protestan', 'Buddha', 'Konghuchu', 'Hindu'];

        foreach($agamaArr as $ag){
            $data[$ag] = [];
        }

        foreach($arrTM as $tm){
            foreach($agamaArr as $ag){
                array_push($data[$ag], $this->getJumlahSiswaTMAgama($tm, $ag));
            }
        }
        // End Per Tahun Masuk Agama


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

        // Per Jenis Kelamin
        $data['laki'] = $this->getJenkel('l');
        $data['perempuan'] = $this->getJenkel('p');
        // End Per Jenis Kelamin

        // Per Tingkat Kelas
        $tingkatkls = DB::table('tblkelompokkelas')->distinct('tingkat_kelas')->pluck('tingkat_kelas');
        $data['TK_L'] = []; // Tingkat Kelas Laki
        $data['TK_P'] = []; // Tingkat Kelas Perempuan
        foreach($tingkatkls as $tk){
            array_push($data['TK_L'], $this->getJKTingkatKls('l', $tk));
            array_push($data['TK_P'], $this->getJKTingkatKls('p', $tk));
        }
        // End Per Tingkat Kelas

        // Per Tahun Masuk
        $arrTM = DB::table('tblsiswa')->distinct('tahunmasuk')->limit(5)->orderBy('tahunmasuk', 'asc')->pluck('tahunmasuk');
        $data['jmLKTMJK'] = []; // jml Laki Thn Masuk Jenis Kelamin
        $data['jmPTMJK'] = []; // jml Perempuan Thn Masuk Jenis Kelamin
        foreach($arrTM as $tm){
             array_push($data['jmLKTMJK'], $this->getJumlahSiswaTMJK($tm, 'l'));
             array_push($data['jmPTMJK'], $this->getJumlahSiswaTMJK($tm, 'p'));
        }
        $data['tahunmasuk'] = $arrTM;
        // End Per Tahun Masuk

        // Per Kelompok Kelas
        $kelKlsOld = DB::table('v_jadwal_siswa_demografi')->distinct('nisn')->distinct('kode_kelompok')->pluck('kode_kelompok'); // data asli
        $kelKlsNew = []; // penampung data baru null = belum disetting
        foreach($kelKlsOld as $k){
            // get data kelompok kelas tidak null
            if($k != null){
                array_push($kelKlsNew, $k);
            }elseif($k == null){
                array_push($kelKlsNew, 'Belum disetting');
            }
        }
        $data['kelKlsNew'] = $kelKlsNew;
        $data['JmlSiswaLKelKls'] = [];
        $data['JmlSiswaPKelKls'] = [];
        foreach($kelKlsOld as $klsNew){
            array_push($data['JmlSiswaLKelKls'], DB::table('v_jadwal_siswa_demografi')->distinct('nisn')->where('kode_kelompok', $klsNew)->where('jenkel', 'l')->count());
            array_push($data['JmlSiswaPKelKls'], DB::table('v_jadwal_siswa_demografi')->distinct('nisn')->where('kode_kelompok', $klsNew)->where('jenkel', 'p')->count());
        }
        // End Per Kelompok Kelas

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

        $tingkatkls = DB::table('tblkelompokkelas')->distinct('tingkat_kelas')->pluck('tingkat_kelas');
        $data['tingkatkls'] = $tingkatkls;

        $agamaArr = ['Islam', 'Katolik', 'Protestan', 'Buddha', 'Konghuchu', 'Hindu'];

        // Per Agama
        $data['agama'] = $agamaArr;
        foreach($agamaArr as $a){
            $data[$a] = $this->getAgama($a);
        }
        // End Agama

        // Per Tahun Ajaran
        $taArr = DB::table('tabeltahunajaran')->distinct('tahunakademik')->orderBy('tahunakademik', 'asc')->limit('5')->pluck('tahunakademik');
        foreach($agamaArr as $ag){
            $data['TH'.$ag] = [];
            foreach($taArr as $ta){
                array_push($data['TH'.$ag], DB::table('v_jadwal_siswa_demografi')->distinct('nisn')->where('tahunakademik', $ta)->where('agama', $ag)->count());
            }
        }
        $data['TahunAjaran'] = $taArr;
        // End Pertahun Ajaran

        // Agama Per Tingkat Kelas
        foreach($agamaArr as $ag){
            $data['TK'.$ag] = [];
            foreach($tingkatkls as $tk){
                array_push($data['TK'.$ag], DB::table('v_jadwal_siswa_demografi')->distinct('nisn')->where('agama', $ag)->where('tingkat_kelas', $tk)->count());
            }
        }
        // End Agama Per Tingkat Kelas

        // Agama Per Kelompok Kelas
        // $kelKlsOld = DB::table('v_tblsiswa')->distinct('kode_kelompok')->pluck('kode_kelompok'); // data asli
        $kelKlsOld = DB::table('v_jadwal_siswa_demografi')->distinct('kode_kelompok')->pluck('kode_kelompok'); // data asli
        $kelKlsNew = []; // penampung data baru null = belum disetting
        foreach($kelKlsOld as $k){
            // get data kelompok kelas tidak null
            if($k != null){
                array_push($kelKlsNew, $k);
            }elseif($k == null){
                array_push($kelKlsNew, 'Belum disetting');
            }
        }
        $data['cat_kls'] = $kelKlsNew;

        foreach($agamaArr as $ag){
            $data['kk_'.$ag] = [];
            foreach($kelKlsOld as $kko){
                array_push($data['kk_'.$ag], DB::table('v_jadwal_siswa_demografi')->distinct('nisn')->where('kode_kelompok', $kko)->where('agama', $ag)->count());
            }
        }
        // End Agama Per kelompok kelas
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

        // Per Status Siswa
        $statusArr = ['Aktif', 'Lulus', 'DO', 'Mutasi'];
        $jmlStat = [];
        foreach($statusArr as $s){
            array_push($jmlStat, $this->getStatusSiswa($s));
        }
        $statusArr[2] = 'Drop Out';
        $data['catStat'] = $statusArr;
        $data['jmlStat'] = $jmlStat;
        // End Status Siswa

        $tingkatkls = DB::table('tblkelompokkelas')->distinct('tingkat_kelas')->pluck('tingkat_kelas');

        $data['tingkatkls'] = $tingkatkls;
        // Status Siswa Per Tingkat Kls
        $statusArr[2] = 'DO';
        foreach($statusArr as $ss){
            $data['Stat_'.$ss] = [];
            foreach($tingkatkls as $tk){
                array_push($data['Stat_'.$ss], DB::table('v_jadwal_siswa_demografi')->distinct('nisn')->where('statussiswa', $ss)->where('tingkat_kelas', $tk)->count());
            }
        }
        // End Status Siswa Per Tingkat Kls

        // Status Siswa Per Tahun Masuk
        $data['catTahun'] = DB::table('tblsiswa')->distinct('tahunmasuk')->limit(3)->orderBy('tahunmasuk', 'asc')->pluck('tahunmasuk');
        foreach($statusArr as $ss){
            $data['TM_'.$ss] = [];
            foreach($data['catTahun'] as $ct){
                array_push($data['TM_'.$ss], DB::table('tblsiswa')->where('statussiswa', $ss)->where('tahunmasuk', $ct)->count());
            }
        }
        // End Status Siswa Per Tahun Masuk

        return view('demografi.siswa.statussiswa', $data);
    }
}