<?php

namespace App\Http\Controllers;

use App\Models\Agenda;
use App\Models\Galeri;
use App\Models\KategoriGaleri;
use App\Models\SuratEksternal;
use App\Models\SuratKeluar;
use App\Models\Youtube;
use Illuminate\Http\Request;

use DB;
use Auth;

use Illuminate\Support\Facades\Input; //untuk input::get
use Illuminate\Support\Facades\Hash;


class HomeController extends Controller
{

    public function __construct(){

        date_default_timezone_set('Asia/Jakarta');

    }

    public function dashboard() {
        $data = [
            'title' => 'Dashboard',
            'breadcrumb' => [
                ['url' => '/' , 'name' => env('APP_NAME')],
                ['url' => '/' , 'name' => 'Dashboard'],
            ],
        ];

         $data['info'] =  DB::table('table_pengumuman')
            ->join('table_tujuan_pengumuman', 'table_pengumuman.id', '=', 'table_tujuan_pengumuman.id_pengumuman')
            ->select('table_pengumuman.*')
            ->where('table_tujuan_pengumuman.id_hakakses',Auth::user()->id_hakakses )
            ->where('table_pengumuman.tgl_close', '>', date('Y-m-d H:i:s') )
            ->where('table_pengumuman.tgl_publish', '<=', date('Y-m-d H:i:s') )
            ->orderByDesc('table_pengumuman.tgl_publish')
            ->get();


        return view('dashboard', $data);
    }


 public function isiPengumuman (Request $request){

        $cek = DB::table('table_pengumuman')
            ->where('id', $request->id)->first();


        if($cek):
            echo $cek->isi_pengumuman;
        else:
            echo 'error';
        endif;

    }

    public function beranda() {
        //TODO: BUAT SEBUAH LANDING PAGE MENGENAI APLIKASI SEPERTI SEON GITU
        return redirect('/dashboard');
        $data = [
            'title' => 'Beranda',
            'recent_foto' => Galeri::active()->latest()->limit(4)->get(),
            'randPost' => Galeri::active()->inRandomOrder()->limit(4)->get(),
            'kategori' => KategoriGaleri::active()->limit(3)->latest()->has('galeri')->get(),
            'yts' => Youtube::active()->latest()->get(),
        ];

        return view('front.index', $data);
    }

    public function detail($seo) {
        $post = Galeri::where('seotitle', $seo)->firstOrFail();

        $previous = Galeri::find(Galeri::where('id', '<', $post->id)->max('id'));
        $next = Galeri::find(Galeri::where('id', '>', $post->id)->min('id'));

        $data = [
            'title' => $post->title,
            'post' => $post,
            'prev_post' => $previous,
            'next_post' => $next,
            'recentPost' => Galeri::active()->latest()->limit(4)->get(),
        ];

        return view('front.detail', $data);
    }

    public function search() {
        $data = [
            'title' => 'Hasil pencarian: ' . \request()->search,
            'recentPost' => Galeri::active()->latest()->limit(4)->get(),
            'posts' => Galeri::where('title', 'like', '%'. \request()->search . '%')->latest()->paginate(10)
        ];

        return view('front.search', $data);
    }
    public function topik($topik) {
        $data = [
            'title' => 'Topik : ' . $topik,
            'recentPost' => Galeri::active()->latest()->limit(4)->get(),
            'posts' => Galeri::whereHas('kategori', function ($q) use($topik) {
                $q->where('label', $topik);
            })->latest()->paginate(10),
            'topik' => $topik
        ];

        return view('front.topik', $data);
    }

    public function offline() {
        return view('offline');
    }
}
