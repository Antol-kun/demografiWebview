<!--begin::Aside-->
<div id="kt_aside" class="aside aside-light aside-hoverable" data-kt-drawer="true" data-kt-drawer-name="aside"
    data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true"
    data-kt-drawer-width="{default:'200px', '300px': '250px'}" data-kt-drawer-direction="start"
    data-kt-drawer-toggle="#kt_aside_mobile_toggle">
    <!--begin::Brand-->
    <div class="aside-logo flex-column-auto" id="kt_aside_logo">
        <!--begin::Logo-->
        <a href="/dashboard">
            <img alt="Logo" src="https://guru-edsy.bakultani.com/theme2/gambar/symbolsip2.png "
                class="h-15px logo text-blue my-1 fs-3" /> Edsy Apps
        </a>
        <!--end::Logo-->
        <!--begin::Aside toggler-->
        <div id="kt_aside_toggle" class="btn btn-icon w-auto px-0 btn-active-color-primary aside-toggle"
            data-kt-toggle="true" data-kt-toggle-state="active" data-kt-toggle-target="body"
            data-kt-toggle-name="aside-minimize">
            <!--begin::Svg Icon | path: icons/duotone/Navigation/Angle-double-left.svg-->
            <span class="svg-icon svg-icon-1 rotate-180">
                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                    height="24px" viewBox="0 0 24 24" version="1.1">
                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                        <polygon points="0 0 24 0 24 24 0 24" />
                        <path
                            d="M5.29288961,6.70710318 C4.90236532,6.31657888 4.90236532,5.68341391 5.29288961,5.29288961 C5.68341391,4.90236532 6.31657888,4.90236532 6.70710318,5.29288961 L12.7071032,11.2928896 C13.0856821,11.6714686 13.0989277,12.281055 12.7371505,12.675721 L7.23715054,18.675721 C6.86395813,19.08284 6.23139076,19.1103429 5.82427177,18.7371505 C5.41715278,18.3639581 5.38964985,17.7313908 5.76284226,17.3242718 L10.6158586,12.0300721 L5.29288961,6.70710318 Z"
                            fill="#000000" fill-rule="nonzero"
                            transform="translate(8.999997, 11.999999) scale(-1, 1) translate(-8.999997, -11.999999)" />
                        <path
                            d="M10.7071009,15.7071068 C10.3165766,16.0976311 9.68341162,16.0976311 9.29288733,15.7071068 C8.90236304,15.3165825 8.90236304,14.6834175 9.29288733,14.2928932 L15.2928873,8.29289322 C15.6714663,7.91431428 16.2810527,7.90106866 16.6757187,8.26284586 L22.6757187,13.7628459 C23.0828377,14.1360383 23.1103407,14.7686056 22.7371482,15.1757246 C22.3639558,15.5828436 21.7313885,15.6103465 21.3242695,15.2371541 L16.0300699,10.3841378 L10.7071009,15.7071068 Z"
                            fill="#000000" fill-rule="nonzero" opacity="0.5"
                            transform="translate(15.999997, 11.999999) scale(-1, 1) rotate(-270.000000) translate(-15.999997, -11.999999)" />
                    </g>
                </svg>
            </span>
            <!--end::Svg Icon-->
        </div>
        <!--end::Aside toggler-->
    </div>
    <!--end::Brand-->
    <!--begin::Aside menu-->
    <div class="aside-menu flex-column-fluid">
        <!--begin::Aside Menu-->
        <div class="hover-scroll-overlay-y my-5 my-lg-5" id="kt_aside_menu_wrapper" data-kt-scroll="true"
            data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-height="auto"
            data-kt-scroll-dependencies="#kt_aside_logo, #kt_aside_footer" data-kt-scroll-wrappers="#kt_aside_menu"
            data-kt-scroll-offset="0">
            <!--begin::Menu-->
            <div class="menu menu-column menu-title-gray-800 menu-state-title-primary menu-state-icon-primary menu-state-bullet-primary menu-arrow-gray-500"
                id="#kt_aside_menu" data-kt-menu="true">
                @php $sekolah = DB::table('tblsekolah')->first(); @endphp
                <center>
                    <img src="{{ asset('logo/'.$sekolah->logo) }}" class="logo2" alt="Logo Sekolah" width="30%">
                </center><br />

                <div class="menu menu-column menu-title-gray-800 menu-state-title-primary menu-state-icon-primary menu-state-bullet-primary menu-arrow-gray-500"
                    id="#kt_aside_menu" data-kt-menu="true">
                    <div class="menu-item">
                        <div class="menu-content pb-2">
                            <span class="menu-section text-muted text-uppercase fs-8 ls-1">Dashboard</span>
                        </div>
                    </div>
                    <div class="menu-item">
                        <a class="menu-link" href="/dashboard">
                            <span class="menu-icon">
                                <span class="svg-icon svg-icon-2">
                                    <i class="fas fa-fire"></i>
                                </span>
                            </span>
                            <span class="menu-title">Dashboard</span>
                        </a>
                    </div>

                    @php $menus = DB::table('tbuser')
                    ->join('tblrole','tbuser.id_hakakses','=','tblrole.role_deskripsi')
                    ->join('tblfitur','tblfitur.idfitur','=','tblrole.idfitur')
                    ->where('username', Auth::user()->username )
                    ->where('id_hakakses', Auth::user()->id_hakakses)
                    ->get();
                    @endphp

                    @foreach($menus as $mn7)
                    @if($mn7->nama_fitur == 'Pengumuman')
                    <div class="menu-item">
                        <a class="menu-link" href="/datapengumuman">
                            <span class="menu-icon">
                                <span class="svg-icon svg-icon-2">
                                    <i class="fas fa-users"></i>
                                </span>
                            </span>
                            <span class="menu-title">Pengumuman</span>
                        </a>
                    </div>
                    @endif
                    @endforeach

                    <div class="menu-item">
                        <div class="menu-content pt-8 pb-0">
                            <span class="menu-section text-muted text-uppercase fs-8 ls-1">Menu Master</span>
                        </div>
                    </div>
                    <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
                        <span class="menu-link">
                            <span class="menu-icon">
                                <!--begin::Svg Icon | path: icons/duotune/abstract/abs042.svg-->
                                <span class="svg-icon svg-icon-2">
                                    <i class="far fa-bookmark"></i>
                                </span>
                                <!--end::Svg Icon-->
                            </span>
                            <span class="menu-title">Master Data</span>
                            <span class="menu-arrow"></span>
                        </span>

                        <div class="menu-sub menu-sub-accordion menu-active-bg">
                            <div class="menu-item">
                                @foreach($menus as $mn1)
                                @if($mn1->nama_fitur == 'Data Sekolah')
                                <a class="menu-link" href="/datasekolah">
                                    <span class="menu-bullet">
                                        <span class="bullet bullet-dot"></span>
                                    </span>
                                    <span class="menu-title">Data Sekolah</span>
                                </a>
                                @endif

                                @if($mn1->nama_fitur == 'Data Pegawai')
                                <a class="menu-link" href="/dataguru">
                                    <span class="menu-bullet">
                                        <span class="bullet bullet-dot"></span>
                                    </span>
                                    <span class="menu-title">Data Pegawai</span>
                                </a>
                                @endif

                                @if($mn1->nama_fitur == 'Data Siswa')
                                <a class="menu-link" href="/datasiswa">
                                    <span class="menu-bullet">
                                        <span class="bullet bullet-dot"></span>
                                    </span>
                                    <span class="menu-title">Data Siswa</span>
                                </a>
                                @endif

                                @if($mn1->nama_fitur == 'Data Mata Pelajaran')
                                <a class="menu-link" href="/datamatapelajaran">
                                    <span class="menu-bullet">
                                        <span class="bullet bullet-dot"></span>
                                    </span>
                                    <span class="menu-title">Data Mata Pelajaran</span>
                                </a>
                                @endif

                                @if($mn1->nama_fitur == 'Data Ruang Kelas')
                                <a class="menu-link" href="/dataruangkelas">
                                    <span class="menu-bullet">
                                        <span class="bullet bullet-dot"></span>
                                    </span>
                                    <span class="menu-title">Data Ruang Kelas</span>
                                </a>
                                @endif

                                @if($mn1->nama_fitur == 'Data Jurusan')
                                <a class="menu-link" href="/datajurusan">
                                    <span class="menu-bullet">
                                        <span class="bullet bullet-dot"></span>
                                    </span>
                                    <span class="menu-title">Data Jurusan</span>
                                </a>
                                @endif

                                @if($mn1->nama_fitur == 'Data Kelompok Kelas')
                                <a class="menu-link" href="/datakelompokkelas">
                                    <span class="menu-bullet">
                                        <span class="bullet bullet-dot"></span>
                                    </span>
                                    <span class="menu-title">Data Kelompok Kelas</span>
                                </a>
                                @endif

                                @endforeach
                            </div>
                        </div>
                    </div>

                    <div class="menu-item">
                        <div class="menu-content pt-8 pb-0">
                            <span class="menu-section text-muted text-uppercase fs-8 ls-1">Menu Management Siswa</span>
                        </div>
                    </div>
                    @if(Session::get('level') == 'Admin')
                    <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
                        <span class="menu-link">
                            <span class="menu-icon">
                                <!--begin::Svg Icon | path: icons/duotune/abstract/abs042.svg-->
                                <span class="svg-icon svg-icon-2">
                                    <i class="fas fa-address-card"></i>
                                </span>
                                <!--end::Svg Icon-->
                            </span>
                            <span class="menu-title">Managemen Siswa</span>
                            <span class="menu-arrow"></span>
                        </span>

                        <div class="menu-sub menu-sub-accordion menu-active-bg">
                            <div class="menu-item">
                                <a class="menu-link" href="/datapelanggaransiswa">
                                    <span class="menu-bullet">
                                        <span class="bullet bullet-dot"></span>
                                    </span>
                                    <span class="menu-title">Data Pelanggaran Siswa</span>
                                </a>
                                <a class="menu-link" href="/datakehadiran">
                                    <span class="menu-bullet">
                                        <span class="bullet bullet-dot"></span>
                                    </span>
                                    <span class="menu-title">Data Kehadiran Siswa</span>
                                </a>
                            </div>
                        </div>
                    </div>
                    @endif

                    <div class="menu-item">
                        <div class="menu-content pt-8 pb-0">
                            <span class="menu-section text-muted text-uppercase fs-8 ls-1">Menu Manajemen Role</span>
                        </div>
                    </div>
                    @if(Session::get('level') == 'Admin')
                    <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
                        <span class="menu-link">
                            <span class="menu-icon">
                                <!--begin::Svg Icon | path: icons/duotune/abstract/abs042.svg-->
                                <span class="svg-icon svg-icon-2">
                                    <i class="fas fa-address-card"></i>
                                </span>
                                <!--end::Svg Icon-->
                            </span>
                            <span class="menu-title">Data Manajemen Role</span>
                            <span class="menu-arrow"></span>
                        </span>

                        <div class="menu-sub menu-sub-accordion menu-active-bg">
                            <div class="menu-item">
                                <a class="menu-link" href="/datahakakses">
                                    <span class="menu-bullet">
                                        <span class="bullet bullet-dot"></span>
                                    </span>
                                    <span class="menu-title">Manajemen Role</span>
                                </a>
                                <a class="menu-link" href="/datarole">
                                    <span class="menu-bullet">
                                        <span class="bullet bullet-dot"></span>
                                    </span>
                                    <span class="menu-title">Manajemen Hak Akses</span>
                                </a>
                            </div>
                        </div>
                    </div>
                    @endif

                    <div class="menu-item">
                        <div class="menu-content pt-8 pb-0">
                            <span class="menu-section text-muted text-uppercase fs-8 ls-1">Menu Kurikulum</span>
                        </div>
                    </div>
                    <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
                        <span class="menu-link">
                            <span class="menu-icon">
                                <!--begin::Svg Icon | path: icons/duotune/abstract/abs042.svg-->
                                <span class="svg-icon svg-icon-2">
                                    <i class="fas fa-book-reader"></i>
                                </span>
                                <!--end::Svg Icon-->
                            </span>
                            <span class="menu-title">Manajemen Kurikulum</span>
                            <span class="menu-arrow"></span>
                        </span>

                        <div class="menu-sub menu-sub-accordion menu-active-bg">
                            <div class="menu-item">
                                @foreach($menus as $mn2)
                                @if($mn2->nama_fitur == 'Setting Tahun Ajaran')
                                <a class="menu-link" href="/datatahunakademik">
                                    <span class="menu-bullet">
                                        <span class="bullet bullet-dot"></span>
                                    </span>
                                    <span class="menu-title">Setting Tahun Ajaran</span>
                                </a>
                                @endif

                                @if($mn2->nama_fitur == 'Setting Kelas Berjalan')
                                <a class="menu-link" href="/datakelasberjalan">
                                    <span class="menu-bullet">
                                        <span class="bullet bullet-dot"></span>
                                    </span>
                                    <span class="menu-title">Setting Kelas Berjalan</span>
                                </a>
                                @endif

                                @if($mn2->nama_fitur == 'Setting Jadwal')
                                <a class="menu-link" href="/datasettingjadwal">
                                    <span class="menu-bullet">
                                        <span class="bullet bullet-dot"></span>
                                    </span>
                                    <span class="menu-title">Setting Jadwal</span>
                                </a>
                                @endif

                                @if($mn2->nama_fitur == 'Setting Siswa')
                                <a class="menu-link" href="/datasettingsiswa">
                                    <span class="menu-bullet">
                                        <span class="bullet bullet-dot"></span>
                                    </span>
                                    <span class="menu-title">Setting Siswa</span>
                                </a>
                                @endif

                                @if($mn2->nama_fitur == 'Setting Pindah Kelas')
                                <a class="menu-link" href="/datakelasberjalan">
                                    <span class="menu-bullet">
                                        <span class="bullet bullet-dot"></span>
                                    </span>
                                    <span class="menu-title">Setting Pindah Kelas</span>
                                </a>
                                @endif

                                @if($mn2->nama_fitur == 'Pengumuman')
                                <a class="menu-link" href="/atapengumuman">
                                    <span class="menu-bullet">
                                        <span class="bullet bullet-dot"></span>
                                    </span>
                                    <span class="menu-title">Pengumuman</span>
                                </a>
                                @endif

                                @endforeach
                            </div>
                        </div>
                    </div>



                    <div class="menu-item">
                        <div class="menu-content pt-8 pb-0">
                            <span class="menu-section text-muted text-uppercase fs-8 ls-1">Menu Raport</span>
                        </div>
                    </div>
                    <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
                        <span class="menu-link">
                            <span class="menu-icon">
                                <!--begin::Svg Icon | path: icons/duotune/abstract/abs042.svg-->
                                <span class="svg-icon svg-icon-2">
                                    <i class="fas fa-address-book"></i>
                                </span>
                                <!--end::Svg Icon-->
                            </span>
                            <span class="menu-title">Manajemen Raport</span>
                            <span class="menu-arrow"></span>
                        </span>

                        <div class="menu-sub menu-sub-accordion menu-active-bg">
                            <div class="menu-item">
                                @foreach($menus as $mn4)
                                @if($mn4->nama_fitur == 'Input Nilai Raport')
                                <a class="menu-link" href="/datainputraport">
                                    <span class="menu-bullet">
                                        <span class="bullet bullet-dot"></span>
                                    </span>
                                    <span class="menu-title">Input Nilai Raport</span>
                                </a>
                                @endif

                                @if($mn4->nama_fitur == 'Input Nilai Tugas')
                                <a class="menu-link" href="/datainputnilai">
                                    <span class="menu-bullet">
                                        <span class="bullet bullet-dot"></span>
                                    </span>
                                    <span class="menu-title">Input Nilai Tugas</span>
                                </a>
                                @endif

                                @if($mn4->nama_fitur == 'Lihat Raport')
                                <a class="menu-link" href="javascript:void(0);">
                                    <span class="menu-bullet">
                                        <span class="bullet bullet-dot"></span>
                                    </span>
                                    <span class="menu-title">Lihat Raport</span>
                                </a>
                                @endif

                                @if($mn4->nama_fitur == 'Cetak Raport')
                                <a class="menu-link" href="javascript:void(0);">
                                    <span class="menu-bullet">
                                        <span class="bullet bullet-dot"></span>
                                    </span>
                                    <span class="menu-title">Cetak Raport</span>
                                </a>
                                @endif

                                @endforeach
                            </div>
                        </div>
                    </div>

                    <div class="menu-item">
                        <div class="menu-content pt-8 pb-0">
                            <span class="menu-section text-muted text-uppercase fs-8 ls-1">Menu Nilai</span>
                        </div>
                    </div>
                    <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
                        <span class="menu-link">
                            <span class="menu-icon">
                                <!--begin::Svg Icon | path: icons/duotune/abstract/abs042.svg-->
                                <span class="svg-icon svg-icon-2">
                                    <i class="fas fa-file-signature"></i>
                                </span>
                                <!--end::Svg Icon-->
                            </span>
                            <span class="menu-title">Manajemen Nilai</span>
                            <span class="menu-arrow"></span>
                        </span>

                        <div class="menu-sub menu-sub-accordion menu-active-bg">
                            <div class="menu-item">
                                @foreach($menus as $mn5)
                                @if($mn5->nama_fitur == 'Input Komponen Nilai')
                                <a class="menu-link" href="/datakomponennilai">
                                    <span class="menu-bullet">
                                        <span class="bullet bullet-dot"></span>
                                    </span>
                                    <span class="menu-title">Input Komponen Nilai</span>
                                </a>
                                @endif

                                @if($mn5->nama_fitur == 'Range Penilaian')
                                <a class="menu-link" href="/databobotnilai">
                                    <span class="menu-bullet">
                                        <span class="bullet bullet-dot"></span>
                                    </span>
                                    <span class="menu-title">Range Penilaian</span>
                                </a>
                                @endif

                                @if($mn5->nama_fitur == 'Bobot Komponen Penilaian')
                                <a class="menu-link" href="/databobotkomponennilai">
                                    <span class="menu-bullet">
                                        <span class="bullet bullet-dot"></span>
                                    </span>
                                    <span class="menu-title">Bobot Komponen Penilaian</span>
                                </a>
                                @endif

                                @if($mn5->nama_fitur == 'Input Nilai')
                                <a class="menu-link" href="/datainputnilai">
                                    <span class="menu-bullet">
                                        <span class="bullet bullet-dot"></span>
                                    </span>
                                    <span class="menu-title">Input Nilai</span>
                                </a>
                                @endif

                                @if($mn5->nama_fitur == 'Lihat Rekap Nilai')
                                <a class="menu-link" href="/datainputnilai">
                                    <span class="menu-bullet">
                                        <span class="bullet bullet-dot"></span>
                                    </span>
                                    <span class="menu-title">Lihat Rekap Nilai</span>
                                </a>
                                @endif

                                @endforeach
                            </div>
                        </div>
                    </div>

                    <div class="menu-item">
                        <div class="menu-content pt-8 pb-0">
                            <span class="menu-section text-muted text-uppercase fs-8 ls-1">Menu Keuangan</span>
                        </div>
                    </div>
                    <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
                        <span class="menu-link">
                            <span class="menu-icon">
                                <!--begin::Svg Icon | path: icons/duotune/abstract/abs042.svg-->
                                <span class="svg-icon svg-icon-2">
                                    <i class="fas fa-file-invoice-dollar"></i>
                                </span>
                                <!--end::Svg Icon-->
                            </span>
                            <span class="menu-title">Manajemen Keuangan</span>
                            <span class="menu-arrow"></span>
                        </span>

                        <div class="menu-sub menu-sub-accordion menu-active-bg">
                            <div class="menu-item">
                                @foreach($menus as $mn6)
                                @if($mn6->nama_fitur == 'Master Komponen Biaya Sekolah')
                                <a class="menu-link" href="/datauangsekolah">
                                    <span class="menu-bullet">
                                        <span class="bullet bullet-dot"></span>
                                    </span>
                                    <span class="menu-title">Master Komponen Biaya Sekolah</span>
                                </a>
                                @endif

                                @if($mn6->nama_fitur == 'Setting Pembayaran Siswa')
                                <a class="menu-link" href="/datapaket/settingsiswa">
                                    <span class="menu-bullet">
                                        <span class="bullet bullet-dot"></span>
                                    </span>
                                    <span class="menu-title">Setting Pembayaran Siswa</span>
                                </a>
                                @endif

                                @if($mn6->nama_fitur == 'Paket Pembayaran Siswa')
                                <a class="menu-link" href="/datapaket/paketpembayaran">
                                    <span class="menu-bullet">
                                        <span class="bullet bullet-dot"></span>
                                    </span>
                                    <span class="menu-title">Paket Pembayaran Siswa</span>
                                </a>
                                @endif

                                @if($mn6->nama_fitur == 'Rekap Pembayaran Siswa')
                                <a class="menu-link" href="/datapaket/rekappembayaransiswa">
                                    <span class="menu-bullet">
                                        <span class="bullet bullet-dot"></span>
                                    </span>
                                    <span class="menu-title">Rekap Pembayaran Siswa</span>
                                </a>
                                @endif

                                @if($mn6->nama_fitur == 'Status Pembayaran')
                                <a class="menu-link" href="/datapaket/siswabelumlunas">
                                    <span class="menu-bullet">
                                        <span class="bullet bullet-dot"></span>
                                    </span>
                                    <span class="menu-title">Status Pembayaran Siswa</span>
                                </a>
                                @endif

                                @if($mn6->nama_fitur == 'Historis Transaksi')
                                <a class="menu-link" href="/datapaket/log_pembayaransiswa">
                                    <span class="menu-bullet">
                                        <span class="bullet bullet-dot"></span>
                                    </span>
                                    <span class="menu-title">Historis Transaksi</span>
                                </a>
                                @endif

                                @if($mn6->nama_fitur == 'Validasi Pembayaran')
                                <a class="menu-link" href="/datapaket/verifmanualpembayaransiswa">
                                    <span class="menu-bullet">
                                        <span class="bullet bullet-dot"></span>
                                    </span>
                                    <span class="menu-title">Validasi Pembayaran</span>
                                </a>
                                @endif

                                <!-- @if($mn6->nama_fitur == 'Laporan Pembayaran')
                                <a class="menu-link" href="/datalaporanpembayaran">
                                    <span class="menu-bullet">
                                        <span class="bullet bullet-dot"></span>
                                    </span>
                                    <span class="menu-title">Laporan Pembayaran</span>
                                </a>
                                @endif -->

                                <!-- @if($mn6->nama_fitur == 'Pembayaran SPP')
                                <a class="menu-link" href="/datapembayaranspp">
                                    <span class="menu-bullet">
                                        <span class="bullet bullet-dot"></span>
                                    </span>
                                    <span class="menu-title">Pembayaran SPP</span>
                                </a>
                                @endif -->

                                @endforeach
                            </div>
                        </div>
                    </div>

                    <div class="menu-item">
                        <div class="menu-content pt-8 pb-0">
                            <span class="menu-section text-muted text-uppercase fs-8 ls-1">Menu Manajemen
                                Pengguna</span>
                        </div>
                    </div>
                    @if(Session::get('level') == 'Admin')
                    <div class="menu-item">
                        <a class="menu-link" href="/datauser">
                            <span class="menu-icon">
                                <span class="svg-icon svg-icon-2">
                                    <i class="fas fa-users"></i>
                                </span>
                            </span>
                            <span class="menu-title">Pengguna</span>
                        </a>
                    </div>
                    @endif

                </div>


            </div>
            <!--end::Menu-->
        </div>
    </div>
    <!--end::Aside menu-->
    <!--begin::Footer-->
    <div class="aside-footer flex-column-auto pt-5 pb-7 px-5" id="kt_aside_footer">
        <a href="#" target="_blank" class="btn btn-custom btn-primary w-100" data-bs-toggle="tooltip"
            data-bs-trigger="hover" data-bs-delay-show="8000"
            title="Check out the complete documentation with over 100 components">
            <span class="btn-label">Visit Us</span>
            <!--begin::Svg Icon | path: icons/duotone/General/Clipboard.svg-->
            <span class="svg-icon btn-icon svg-icon-2">
                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                    height="24px" viewBox="0 0 24 24" version="1.1">
                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                        <rect x="0" y="0" width="24" height="24" />
                        <path
                            d="M8,3 L8,3.5 C8,4.32842712 8.67157288,5 9.5,5 L14.5,5 C15.3284271,5 16,4.32842712 16,3.5 L16,3 L18,3 C19.1045695,3 20,3.8954305 20,5 L20,21 C20,22.1045695 19.1045695,23 18,23 L6,23 C4.8954305,23 4,22.1045695 4,21 L4,5 C4,3.8954305 4.8954305,3 6,3 L8,3 Z"
                            fill="#000000" opacity="0.3" />
                        <path
                            d="M11,2 C11,1.44771525 11.4477153,1 12,1 C12.5522847,1 13,1.44771525 13,2 L14.5,2 C14.7761424,2 15,2.22385763 15,2.5 L15,3.5 C15,3.77614237 14.7761424,4 14.5,4 L9.5,4 C9.22385763,4 9,3.77614237 9,3.5 L9,2.5 C9,2.22385763 9.22385763,2 9.5,2 L11,2 Z"
                            fill="#000000" />
                        <rect fill="#000000" opacity="0.3" x="7" y="10" width="5" height="2" rx="1" />
                        <rect fill="#000000" opacity="0.3" x="7" y="14" width="9" height="2" rx="1" />
                    </g>
                </svg>
            </span>
            <!--end::Svg Icon-->
        </a>
    </div>
    <!--end::Footer-->
</div>
<!--end::Aside-->