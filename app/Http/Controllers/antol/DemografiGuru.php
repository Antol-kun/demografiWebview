<?php

namespace App\Http\Controllers\antol;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DemografiGuru extends Controller
{
    // function untuk jumlahGuru
    function getStatusKepegawaian($status){
        return DB::table('tabelguru')->whereIn('Jabatansekolah', ['Guru', 'Guru, Staff'])->where('status_guru', $status)->count();
    }

    function getJenisKelamin($jk){
        return DB::table('tabelguru')->where('Jeniskelamin', $jk)->whereIn('Jabatansekolah', ['Guru', 'Guru, Staff'])->count();
    }

    function getStatusMarital($sm){
        return DB::table('tabelguru')->whereIn('Jabatansekolah', ['Guru', 'Guru, Staff'])->where('StatusMenikah', $sm)->count();
    }

    function getSertifikasi($serti){
        return DB::table('tabelguru')->whereIn('Jabatansekolah', ['Guru', 'Guru, Staff'])->where('sertifikasi', $serti)->count();
    }
    // end function jumlahGuru

    // function untuk jkGuru()
    function getPendidikanAkhirJK($jenjang, $jk){
        return DB::table('tabelguru')->join('tabelPendidikanGuru', 'tabelPendidikanGuru.idguru', '=', 'tabelguru.id')->whereIn('Jabatansekolah', ['Guru', 'Guru, Staff'])->where('Jenjang', $jenjang)->where('Jeniskelamin', $jk)->count();
    }

    function getStatusKepegawaianJK($status, $jk){
        return DB::table('tabelguru')->whereIn('Jabatansekolah', ['Guru', 'Guru, Staff'])->where('status_guru', $status)->where('Jeniskelamin', $jk)->count();
    }

    function getStatusMaritalJK($sm, $jk){
        return DB::table('tabelguru')->where('StatusMenikah', $sm)->where('Jeniskelamin', $jk)->whereIn('Jabatansekolah', ['Guru', 'Guru, Staff'])->count();
    }
    // end function untuk jkGuru()

    // ======================================================================================================================

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

        // jumlah guru berstatus pegawai
        $data['totalGuruPegawai'] = DB::table('tabelguru')->whereIn('Jabatansekolah', ['Guru, Staff','Guru'])->count();
        $data['jumlahGuruMengajar'] = DB::table('v_tb_jadwal_guru')->distinct('NIP')->whereIn('Jabatansekolah', ['Guru','Guru, Staff'])->count();
        // end jumlah guru berstatus pegawai

        // jumlah guru total
        $jumlahGuruTahun = DB::table('v_tb_jadwal_guru')->join('tabeltahunajaran', 'tabeltahunajaran.idsettingtahun', '=', 'v_tb_jadwal_guru.id_tahun_ajaran')->distinct('NIP')->pluck('tahunakademik');
        $tahunGuru = DB::table('tabeltahunajaran')->distinct('tahunakademik')->limit('3')->orderBy('tahunakademik', 'desc')->pluck('tahunakademik');
        $data['tahunGuruLabels'] = $tahunGuru;

        foreach($tahunGuru as $tg){
            $data[$tg] = 0;
            foreach($jumlahGuruTahun as $jgt){
                if($jgt == $tg){
                    $data[$tg] = DB::table('v_tb_jadwal_guru')->join('tabeltahunajaran', 'tabeltahunajaran.idsettingtahun', '=', 'v_tb_jadwal_guru.id_tahun_ajaran')->distinct('NIP')->whereIn('semester', ['Ganjil', 'Genap'])->where('tahunakademik', $tg)->count();
                }
            }
        }

        $data['JumlahGuruFinal'] = [];
        foreach($tahunGuru->reverse() as $tg){
            array_push($data['JumlahGuruFinal'], $data[$tg]);
        }
        // end guru total

        // per status kepegawaian
        $statPG = ['GTT', 'GTY'];
        $getKepegawaianLabels = DB::table('tabelguru')->distinct('status_guru')->whereIn('Jabatansekolah', ['Guru', 'Guru, Staff'])->pluck('status_guru');
        $getKepegawaian = DB::table('tabelguru')->whereIn('Jabatansekolah', ['Guru', 'Guru, Staff'])->pluck('status_guru');
        $data['statLabel'] = ['Guru Tidak Tetap (GTT)', 'Guru Tetap Yayasan (GTY)'];

        foreach($getKepegawaianLabels as $gtp){
            if($gtp == null){
                array_push($statPG, null);
                // $statPG[2] = null;
                array_unshift($data['statLabel'], "Belum Disetting");
            }
        }

        foreach($getKepegawaian as $p){
            if($p != null){
                foreach($statPG as $sp){
                    if($sp != null){
                        $data[$sp] = $this->getStatusKepegawaian($sp);
                    }
                }
            }else{
                $data['BelumDiset'] = $this->getStatusKepegawaian(null);
            }
        }
        // dd($data);
        // end per status kepegawaian

        // per jenis kelamin
        $data['Laki']       = $this->getJenisKelamin('L');
        $data['Perempuan']  = $this->getJenisKelamin('P');
        // end jenis kelamin

        // per status marital
        $data['BelumMenikah']   = $this->getStatusMarital('BM');
        $data['Menikah']        = $this->getStatusMarital('M');
        $data['Cerai']          = $this->getStatusMarital('C');
        // end status marital

        // per tahun pensiun
        $data['kurangSetahunPensiun'] = 0;
        $data['satuSampaiLimaPensiun'] = 0;
        $data['limaSampaiSepuluhPensiun'] = 0;
        $data['lebihSepuluhPensiun'] = 0;

        $tglLahir = DB::table('tabelguru')->whereIn('Jabatansekolah', ['Guru', 'Guru, Staff'])->pluck('Tanggallahir');
        foreach($tglLahir as $tl){
            $now = Carbon::parse(date('Y-m-d'));
            $lahir = Carbon::parse($tl);
            $umur = $lahir->diffInYears($now);
            $sisaPensiun = 55 - $umur;

            if($sisaPensiun <= 1){
                $data['kurangSetahunPensiun']++;
            }elseif($sisaPensiun > 1 AND $sisaPensiun <= 5){
                $data['satuSampaiLimaPensiun']++;
            }elseif($sisaPensiun > 5 AND $sisaPensiun <= 10){
                $data['limaSampaiSepuluhPensiun']++;
            }elseif($sisaPensiun > 10){
                $data['lebihSepuluhPensiun']++;
            }
        }
        // end tahun pensiun

        // per durasi kerja
        $data['kurangSetahunMK'] = 0;
        $data['satuSampaiLimaMK'] = 0;
        $data['limaSampaiSepuluhMK'] = 0;
        $data['sepuluhSampaiLimaBelasMK'] = 0;
        $data['lebihLimaBelasMK'] = 0;

        $tahunMasuk = DB::table('tabelguru')->whereIn('Jabatansekolah', ['Guru', 'Guru, Staff'])->pluck('Tahunmasuk');
        foreach($tahunMasuk as $tm){
            $now = Carbon::parse(date('Y-m-d'));
            $thnMasuk = Carbon::parse($tm);
            $masakerja = $thnMasuk->diffInYears($now);

            if($masakerja <= 1){
                $data['kurangSetahunMK']++;
            }elseif($masakerja > 1 AND $masakerja <= 5){
                $data['satuSampaiLimaMK']++;
            }elseif($masakerja > 5 AND $masakerja <= 10){
                $data['limaSampaiSepuluhMK']++;
            }elseif($masakerja > 10 AND $masakerja <= 15){
                $data['sepuluhSampaiLimaBelasMK']++;
            }elseif($masakerja > 15){
                $data['lebihLimaBelasMK']++;
            }
        }
        // end per durasi kerja

        // per pendidikan terakhir
        $data['penLabels'] = ['SMA', 'SMK', 'D3', 'S1', 'S2', 'S3'];
        $pendList   = ['sma', 'smk', 'diploma', 's1', 's2', 's3'];
        $getPendidikan = DB::table('tabelguru')->join('tabelPendidikanGuru', 'tabelPendidikanGuru.idguru', '=', 'tabelguru.id')->whereIn('Jabatansekolah', ['Guru', 'Guru, Staff'])->pluck('Jenjang');

        foreach($pendList as $pl){
            $data[$pl] = 0;
            foreach($getPendidikan as $gp){
                if($gp == $pl){
                    $data[$pl] = DB::table('tabelguru')->join('tabelPendidikanGuru', 'tabelPendidikanGuru.idguru', '=', 'tabelguru.id')->whereIn('Jabatansekolah', ['Guru', 'Guru, Staff'])->where('Jenjang', $pl)->count();
                }
            }
        }
        // end per pendidikan terakhir

        // per sertifikasi
        $data['SudahSerti']     = $this->getSertifikasi('sudah');
        $data['ProsesSerti']    = $this->getSertifikasi('proses');
        $data['BelumSerti']     = $this->getSertifikasi('belum');
        $data['BelumSetting']   = $this->getSertifikasi(null);
        // end sertifikasi

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

        // per pendidikan terakhir
        $data['penLabels'] = ['SMA', 'SMK', 'D3', 'S1', 'S2', 'S3'];
        $pendList   = ['sma', 'smk', 'diploma', 's1', 's2', 's3'];
        $getPendidikan = DB::table('tabelguru')->join('tabelPendidikanGuru', 'tabelPendidikanGuru.idguru', '=', 'tabelguru.id')->whereIn('Jabatansekolah', ['Guru', 'Guru, Staff'])->pluck('Jenjang');
        
        foreach($getPendidikan as $gp){
            foreach($pendList as $pl){
                $data['Pend_L_'.$pl] = DB::table('tabelguru')->join('tabelPendidikanGuru', 'tabelPendidikanGuru.idguru', '=', 'tabelguru.id')->whereIn('Jabatansekolah', ['Guru', 'Guru, Staff'])->where('Jenjang', $pl)->where('Jeniskelamin', 'L')->count();
                $data['Pend_P_'.$pl] = DB::table('tabelguru')->join('tabelPendidikanGuru', 'tabelPendidikanGuru.idguru', '=', 'tabelguru.id')->whereIn('Jabatansekolah', ['Guru', 'Guru, Staff'])->where('Jenjang', $pl)->where('Jeniskelamin', 'P')->count();
            }
        }
        // end per pendidikan terakhir

        // per jenis kelamin
        $data['Laki']       = DB::table('tabelguru')->where('Jeniskelamin', 'L')->whereIn('Jabatansekolah', ['Guru', 'Guru, Staff'])->count();
        $data['Perempuan']  = DB::table('tabelguru')->where('Jeniskelamin', 'P')->whereIn('Jabatansekolah', ['Guru', 'Guru, Staff'])->count();
        // end jenis kelamin

        // per status kepegawaian
        $statPG = ['GTT', 'GTY'];
        $getKepegawaian = DB::table('tabelguru')->whereIn('Jabatansekolah', ['Guru', 'Guru, Staff'])->pluck('status_guru');
        $data['statLabel'] = ['GTT', 'GTY'];

        foreach($getKepegawaian as $gtp){
            if($gtp == null){
                $statPG[2] = null;
                $data['statLabel'][2] = 'Belum diset';
            }
        }

        foreach($getKepegawaian as $p){
            $data['L'] = []; $data['P'] = [];
            // if($p != null){
                foreach($statPG as $sp){
                    array_push($data['L'], $this->getStatusKepegawaianJK($sp, 'L'));
                    array_push($data['P'], $this->getStatusKepegawaianJK($sp, 'P'));
                }
            // }
        }
        // dd($data);
        // DB::table('tabelguru')->where('status_guru', 'GTT')->count();
        // end per status kepegawaian

        // per status marital
        $smArr  = DB::table('tabelguru')->distinct('StatusMenikah')->orderBy('StatusMenikah', 'asc')->whereIn('Jabatansekolah', ['Guru', 'Guru, Staff'])->pluck('StatusMenikah');
        $dataSm = DB::table('tabelguru')->whereIn('Jabatansekolah', ['Guru', 'Guru, Staff'])->pluck('StatusMenikah');

        foreach($dataSm as $ds){
            $data['MartialJK_L'] = []; $data['MartialJK_P'] = [];
            if($ds != null){
                foreach($smArr as $sa){
                    array_push($data['MartialJK_L'], $this->getStatusMaritalJK($sa, 'L'));
                    array_push($data['MartialJK_P'], $this->getStatusMaritalJK($sa, 'P'));
                }
            }
        }
        // end status marital

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

        // per status kepegawaian
        $statPG = ['GTT', 'GTY'];
        $getKepegawaianLabels = DB::table('tabelguru')->whereIn('Jabatansekolah', ['Guru', 'Guru, Staff'])->distinct('status_guru')->pluck('status_guru');
        $getKepegawaian = DB::table('tabelguru')->pluck('status_guru');
        $data['statLabel'] = ['Guru Tidak Tetap (GTT)', 'Guru Tetap Yayasan (GTY)'];

        foreach($getKepegawaianLabels as $gtp){
            if($gtp == null){
                array_push($statPG, null);
                // $statPG[2] = null;
                array_unshift($data['statLabel'], "Belum Disetting");
            }
        }

        foreach($getKepegawaian as $p){
            if($p != null){
                foreach($statPG as $sp){
                    if($sp != null){
                        $data[$sp] = DB::table('tabelguru')->whereIn('Jabatansekolah', ['Guru', 'Guru, Staff'])->where('status_guru', $sp)->count();
                    }
                }
            }else{
                $data['BelumDiset'] = DB::table('tabelguru')->whereIn('Jabatansekolah', ['Guru', 'Guru, Staff'])->where('status_guru', null)->count();
            }
        }
        // end per status kepegawaian

        // per tahun pensiun
        $data['kurangSetahunPensiun'] = 0;
        $data['satuSampaiLimaPensiun'] = 0;
        $data['limaSampaiSepuluhPensiun'] = 0;
        $data['lebihSepuluhPensiun'] = 0;

        $tglLahir = DB::table('tabelguru')->whereIn('Jabatansekolah', ['Guru', 'Guru, Staff'])->pluck('Tanggallahir');
        foreach($tglLahir as $tl){
            $now = Carbon::parse(date('Y-m-d'));
            $lahir = Carbon::parse($tl);
            $umur = $lahir->diffInYears($now);
            $sisaPensiun = 55 - $umur;

            if($sisaPensiun <= 1){
                $data['kurangSetahunPensiun']++;
            }elseif($sisaPensiun > 1 AND $sisaPensiun <= 5){
                $data['satuSampaiLimaPensiun']++;
            }elseif($sisaPensiun > 5 AND $sisaPensiun <= 10){
                $data['limaSampaiSepuluhPensiun']++;
            }elseif($sisaPensiun > 10){
                $data['lebihSepuluhPensiun']++;
            }
        }

        $data['detailKurangSetahunPensiun'] = [];
        $data['detailSatuSampaiLimaPensiun'] = [];
        $data['detailLimaSampaiSepuluhPensiun'] = [];
        $data['detailLebihSepuluhPensiun'] = [];

        $detailGuru = DB::table('tabelguru')->whereIn('Jabatansekolah', ['Guru', 'Guru, Staff'])                
                        ->orderBy('Gelardepan', 'desc')
                        ->orderBy('Nama', 'asc')->get();
        foreach($detailGuru as $dg){
            $now = Carbon::parse(date('Y-m-d'));
            $lahir = Carbon::parse($dg->Tanggallahir);
            $umur = $lahir->diffInYears($now);
            $sisaPensiun = 55 - $umur;

            if($sisaPensiun <= 1){
                array_push($data['detailKurangSetahunPensiun'], $dg);
            }elseif($sisaPensiun > 1 AND $sisaPensiun <= 5){
                array_push($data['detailSatuSampaiLimaPensiun'], $dg);
            }elseif($sisaPensiun > 5 AND $sisaPensiun <= 10){
                array_push($data['detailLimaSampaiSepuluhPensiun'], $dg);
            }elseif($sisaPensiun > 10){
                array_push($data['detailLebihSepuluhPensiun'], $dg);
            }
        }
        // end tahun pensiun

        // per durasi kerja
        $data['kurangSetahunMK'] = 0;
        $data['satuSampaiLimaMK'] = 0;
        $data['limaSampaiSepuluhMK'] = 0;
        $data['sepuluhSampaiLimaBelasMK'] = 0;
        $data['lebihLimaBelasMK'] = 0;

        $tahunMasuk = DB::table('tabelguru')->whereIn('Jabatansekolah', ['Guru', 'Guru, Staff'])->pluck('Tahunmasuk');
        foreach($tahunMasuk as $tm){
            $now = Carbon::parse(date('Y-m-d'));
            $thnMasuk = Carbon::parse($tm);
            $masakerja = $thnMasuk->diffInYears($now);

            if($masakerja <= 1){
                $data['kurangSetahunMK']++;
            }elseif($masakerja > 1 AND $masakerja <= 5){
                $data['satuSampaiLimaMK']++;
            }elseif($masakerja > 5 AND $masakerja <= 10){
                $data['limaSampaiSepuluhMK']++;
            }elseif($masakerja > 10 AND $masakerja <= 15){
                $data['sepuluhSampaiLimaBelasMK']++;
            }elseif($masakerja > 15){
                $data['lebihLimaBelasMK']++;
            }
        }
        // end per durasi kerja

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

        // per sertifikasi
        $data['SudahSerti']     = DB::table('tabelguru')->whereIn('Jabatansekolah', ['Guru', 'Guru, Staff'])->where('sertifikasi', 'sudah')->count();
        $data['ProsesSerti']    = DB::table('tabelguru')->whereIn('Jabatansekolah', ['Guru', 'Guru, Staff'])->where('sertifikasi', 'proses')->count();
        $data['BelumSerti']     = DB::table('tabelguru')->whereIn('Jabatansekolah', ['Guru', 'Guru, Staff'])->where('sertifikasi', 'belum')->count();
        $data['BelumSetting']   = DB::table('tabelguru')->whereIn('Jabatansekolah', ['Guru', 'Guru, Staff'])->where('sertifikasi', null)->count();
        // end sertifikasi

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

        // per pendidikan terakhir
        $data['penLabels'] = ['SMA', 'SMK', 'D3', 'S1', 'S2', 'S3'];
        $pendList   = ['sma', 'smk', 'diploma', 's1', 's2', 's3'];
        $getPendidikan = DB::table('tabelguru')->join('tabelPendidikanGuru', 'tabelPendidikanGuru.idguru', '=', 'tabelguru.id')->whereIn('Jabatansekolah', ['Guru', 'Guru, Staff'])->pluck('Jenjang');

        foreach($pendList as $pl){
            $data[$pl] = 0;
            foreach($getPendidikan as $gp){
                if($gp == $pl){
                    $data[$pl] = DB::table('tabelguru')->join('tabelPendidikanGuru', 'tabelPendidikanGuru.idguru', '=', 'tabelguru.id')->whereIn('Jabatansekolah', ['Guru', 'Guru, Staff'])->where('Jenjang', $pl)->count();
                }
            }
        }
        // end per pendidikan terakhir

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

        // per status marital
        $data['BelumMenikah']   = $this->getStatusMarital('BM');
        $data['Menikah']        = $this->getStatusMarital('M');
        $data['Cerai']          = $this->getStatusMarital('C');
        // end status marital

        // per jenkel
        $maritalArr = ['BM', 'M', 'C'];
        $jmlJK = DB::table('tabelguru')->pluck('Jeniskelamin');
        $data['MaritalLaki'] = []; $data['MaritalPerempuan'] = [];
        foreach($maritalArr as $ma){
            array_push($data['MaritalLaki'], DB::table('tabelguru')->whereIn('Jabatansekolah', ['Guru', 'Guru, Staff'])->where('Jeniskelamin', 'L')->where('StatusMenikah', $ma)->count());
            array_push($data['MaritalPerempuan'], DB::table('tabelguru')->whereIn('Jabatansekolah', ['Guru', 'Guru, Staff'])->where('Jeniskelamin', 'P')->where('StatusMenikah', $ma)->count());
        }
        // end jenkel

        return view('demografi.guru.marital', $data);
    }
}