<?php

namespace App\Http\Controllers\antol;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DemografiKesiswaan extends Controller
{
    public function kesiswaan()
    {
        $data = [
            'title' => 'Statistik Kesiswaan',
            'breadcrumb' => [
                ['url' => '/' , 'name' => 'Home'],
                ['url' => '/interface' , 'name' => 'Interface'],
                ['url' => '/master' , 'name' => 'List Data'],
            ],
            // Key sebagai variable name di view nanti, sementara value nya akan sebagai data yang ditampilkan
            'testVariable' => 'Statistik Kesiswaan'
        ];
        
        $data['berat'] = DB::table('v_pelanggaran_siswa')->where('jenis_sanksi', 'Berat')->count();
        $data['sedang'] = DB::table('v_pelanggaran_siswa')->where('jenis_sanksi', 'Sedang')->count();
        $data['ringan'] = DB::table('v_pelanggaran_siswa')->where('jenis_sanksi', 'Ringan')->count();

        // dd( $data['berat'],  $data['sedang'],  $data['ringan']);

        return view('demografi.kesiswaan.index', $data);
    }
}
