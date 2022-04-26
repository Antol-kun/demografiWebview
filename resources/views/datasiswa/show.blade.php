{{-- INI KITA EXTENDS ROOT VIEW YANG ADA DI FOLDER resources\views\layouts\template.blade.php --}}
@extends('layouts.template')
@push('lib-css')
@endpush
@push('css')
@endpush

@section('sub_header_action')
<a href="/datasiswa" class="btn btn-sm btn-primary">Kembali ke {{$testVariable}}</a>
@endsection

@section('content')
<div class="post d-flex flex-column-fluid" id="kt_post">
    <!--begin::Container-->
    <div id="kt_content_container" class="container">
        <!--begin::Card-->
        {{--LANGSUNG GUNAKAN NAMA VARIABLE YANG TELAH DIMASUKKAN KE ARRAY ELEMEN DI CONTROLLER PEMANGGIL
        SEBELUMNYA(HOMECONTROLLER::example()) --}}
        <div class="card">
            <!--begin::Card header-->
            <div class="card-header border-0 pt-6">
                <!--begin::Card title-->
                <div class="card-title">
                    Detail {{ $testVariable }}
                </div>
                <!--begin::Card title-->
                <!--begin::Card toolbar-->
                <div class="card-toolbar">
                    <!--begin::Toolbar-->
                </div>
                <!--end::Card toolbar-->
            </div>

            <div class="card-body pt-0">
                <!--begin::Notice-->
                <!--begin::Notice-->
                <div class="notice d-flex bg-light-warning rounded border-warning border border-dashed mb-9 p-6">
                    <!--begin::Icon-->
                    <!--begin::Svg Icon | path: icons/duotone/Code/Warning-1-circle.svg-->
                    <span class="svg-icon svg-icon-2tx svg-icon-warning me-4">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewBox="0 0 24 24"
                            version="1.1">
                            <circle fill="#000000" opacity="0.3" cx="12" cy="12" r="10" />
                            <rect fill="#000000" x="11" y="7" width="2" height="8" rx="1" />
                            <rect fill="#000000" x="11" y="16" width="2" height="2" rx="1" />
                        </svg>
                    </span>
                    <!--end::Svg Icon-->
                    <!--end::Icon-->
                    <!--begin::Wrapper-->
                    <div class="d-flex flex-stack flex-grow-1">
                        <!--begin::Content-->
                        <div class="fw-bold">
                            <h4 class="text-gray-800 fw-bolder">Informasi</h4>
                            <div class="fs-6 text-gray-600">Detail informasi data siswa</div>
                        </div>
                        <!--end::Content-->
                    </div>
                    <!--end::Wrapper-->
                </div>
                <!--end::Notice-->
                <!--end::Notice-->
                <!--begin::Input group-->

                <div class="py-5">
                    <div class="rounded border p-10">
                        <ul class="nav nav-tabs nav-line-tabs nav-line-tabs-2x mb-5 fs-6">
                            <li class="nav-item">
                                <a class="nav-link active" data-bs-toggle="tab" href="#kt_tab_pane_4"><i
                                        class="fas fa-user"></i> Data Diri Siswa</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-bs-toggle="tab" href="#kt_tab_pane_7"><i
                                        class="fas fa-file-pdf"></i> Raport Siswa</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-bs-toggle="tab" href="#kt_tab_pane_8"><i
                                        class="fas fa-user"></i> Data Pelanggaran Siswa</a>
                            </li>
                        </ul>
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="kt_tab_pane_4" role="tabpanel">
                                <table class="table table-hover">
                                    <tbody>
                                        <tr>
                                            <td width="20%"><b>NIS</b></td>
                                            <td width="2%">:</td>
                                            <td>{{$datasiswa[0]->nis}}</td>
                                            <td rowspan="22">
                                                <center><img
                                                        src="@if($datasiswa[0]->foto == null) {{ asset('pasfoto/siswa/no-image.png') }} @else {{ asset('pasfoto/siswa/'.$datasiswa[0]->foto) }} @endif"
                                                        class="img-thumbnail" alt="Pasfoto Siswa" width="204"
                                                        height="15a">
                                                    <br />
                                                    <u>NISN : {{$datasiswa[0]->nisn}}</u>
                                                    <br />{{$datasiswa[0]->nama_siswa}}
                                                </center>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td width="20%"><b>NISN</b></td>
                                            <td width="2%">:</td>
                                            <td>{{$datasiswa[0]->nisn}}</td>
                                        </tr>
                                        <tr>
                                            <td width="20%"><b>NIK</b></td>
                                            <td width="2%">:</td>
                                            <td>{{$datasiswa[0]->nik}}</td>
                                        </tr>
                                        <tr>
                                            <td width="20%"><b>Kartu Keluarga</b></td>
                                            <td width="2%">:</td>
                                            <td>{{$datasiswa[0]->kk}}</td>
                                        </tr>
                                        <tr>
                                            <td width="20%"><b>Nama Siswa</b></td>
                                            <td width="2%">:</td>
                                            <td>{{$datasiswa[0]->nama_siswa}}</td>
                                        </tr>
                                        <tr>
                                            <td width="20%"><b>Jenis Kelamin</b></td>
                                            <td width="2%">:</td>
                                            <td>@if($datasiswa[0]->jenkel == 'l') Laki-laki
                                                @elseif($datasiswa[0]->jenkel == 'p') Perempuan @endif</td>
                                        </tr>
                                        <tr>
                                            <td width="20%"><b>Tempat Lahir</b></td>
                                            <td width="2%">:</td>
                                            <td>{{$datasiswa[0]->tempat_lahir}}</td>
                                        </tr>
                                        <tr>
                                            <td width="20%"><b>Tanggal Lahir</b></td>
                                            <td width="2%">:</td>
                                            <td>{{$datasiswa[0]->tgl_lahir}}</td>
                                        </tr>
                                        <tr>
                                            <td width="20%"><b>Agama</b></td>
                                            <td width="2%">:</td>
                                            <td>{{$datasiswa[0]->agama}}</td>
                                        </tr>
                                        <tr>
                                            <td width="20%"><b>Anak Ke-</b></td>
                                            <td width="2%">:</td>
                                            <td>{{$datasiswa[0]->anak_ke}}</td>
                                        </tr>
                                        <tr>
                                            <td width="20%"><b>Tahun Masuk Awal</b></td>
                                            <td width="2%">:</td>
                                            <td>{{$datasiswa[0]->tahunmasuk}}</td>
                                        </tr>
                                        <tr>
                                            <td width="20%"><b>Tingkat Kelas</b></td>
                                            <td width="2%">:</td>
                                            <td>@if($datasiswa[0]->tingkatkelas == 'X') {{$datasiswa[0]->tingkatkelas}}
                                                (Sepuluh) @elseif($datasiswa[0]->tingkatkelas == 'XI')
                                                {{$datasiswa[0]->tingkatkelas}} (Sebelas)
                                                @elseif($datasiswa[0]->tingkatkelas == 'XII')
                                                {{$datasiswa[0]->tingkatkelas}} (Dua Belas) @endif</td>
                                        </tr>
                                        <tr>
                                            <td width="20%"><b>Status Siswa</b></td>
                                            <td width="2%">:</td>
                                            <td>{{$datasiswa[0]->statussiswa}}</td>
                                        </tr>
                                        <tr>
                                            <td width="20%"><b>Nama Ayah</b></td>
                                            <td width="2%">:</td>
                                            <td>{{$datasiswa[0]->nama_ayah}}</td>
                                        </tr>
                                        <tr>
                                            <td width="20%"><b>Nama Ibu</b></td>
                                            <td width="2%">:</td>
                                            <td>{{$datasiswa[0]->nama_ibu}}</td>
                                        </tr>
                                        <tr>
                                            <td width="20%"><b>Pekerjaan Ayah</b></td>
                                            <td width="2%">:</td>
                                            <td>{{$datasiswa[0]->kerja_ayah}}</td>
                                        </tr>
                                        <tr>
                                            <td width="20%"><b>Pekerjaan Ibu</b></td>
                                            <td width="2%">:</td>
                                            <td>{{$datasiswa[0]->kerja_ibu}}</td>
                                        </tr>
                                        <tr>
                                            <td width="20%"><b>Alamat Tinggal</b></td>
                                            <td width="2%">:</td>
                                            <td>{{$datasiswa[0]->alamat}}</td>
                                        </tr>
                                        <tr>
                                            <td width="20%"><b>Email Wali Siswa</b></td>
                                            <td width="2%">:</td>
                                            <td>{{$datasiswa[0]->email_wali}}</td>
                                        </tr>
                                        <tr>
                                            <td width="20%"><b>Email Siswa</b></td>
                                            <td width="2%">:</td>
                                            <td>{{$datasiswa[0]->email_siswa}}</td>
                                        </tr>
                                        <tr>
                                            <td width="20%"><b>No. Telepon Siswa</b></td>
                                            <td width="2%">:</td>
                                            <td>{{$datasiswa[0]->no_telp}}</td>
                                        </tr>
                                        <tr>
                                            <td width="20%"><b>No. Telepon Wali</b></td>
                                            <td width="2%">:</td>
                                            <td>{{$datasiswa[0]->no_telp_wali}}</td>
                                        </tr>

                                        <tr style="background-color: #DCDCDC">
                                            <td colspan="3"><b># Data Ijazah</b></td>
                                            <td>:</td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td width="20%"><b>Tahun Ijazah</b></td>
                                            <td width="2%">:</td>
                                            <td>{{$datasiswa[0]->ijazah_tahun}}</td>
                                        </tr>
                                        <tr>
                                            <td width="20%"><b>Nopes UN SMP</b></td>
                                            <td width="2%">:</td>
                                            <td>{{$datasiswa[0]->ijazah_nopes}}</td>
                                        </tr>
                                        <tr>
                                            <td width="20%"><b>NO. SHUN</b></td>
                                            <td width="2%">:</td>
                                            <td>{{$datasiswa[0]->ijazah_no_shun}}</td>
                                        </tr>
                                        <tr>
                                            <td width="20%"><b>NO. Ijazah</b></td>
                                            <td width="2%">:</td>
                                            <td>{{$datasiswa[0]->ijazah_no}}</td>
                                        </tr>
                                        <tr style="background-color: #DCDCDC">
                                            <td colspan="3"><b># Data Asal Sekolah</b></td>
                                            <td>:</td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td width="20%"><b>Asal Sekolah</b></td>
                                            <td width="2%">:</td>
                                            <td>{{$datasiswa[0]->asal_sekolah}}</td>
                                        </tr>
                                        <tr>
                                            <td width="20%"><b>Tanggal Masuk</b></td>
                                            <td width="2%">:</td>
                                            <td>{{$datasiswa[0]->tgl_masuk}}</td>
                                        </tr>
                                        <tr>
                                            <td width="20%"><b>Tanggal Keluar</b></td>
                                            <td width="2%">:</td>
                                            <td>{{$datasiswa[0]->tgl_keluar}}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>

                            <div class="tab-pane fade" id="kt_tab_pane_7" role="tabpanel">

                                <div id="kt_table_users_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                                    <embed type="application/pdf"
                                        src="http://guruedsy.ubl.ac.id/theme2/gambar/raport.pdf" width="100%"
                                        height="870px">
                                </div>
                            </div>

                            <div class="tab-pane fade" id="kt_tab_pane_8" role="tabpanel">
                                <table class="table table-striped table-bordered table-responsive">
                                    <thead>
                                        <tr>
                                            <th width="50" style="text-align:center;">No</th>
                                            <th>Tgl Kejadian</th>
                                            <th>Tempat Kejadian</th>
                                            <th>Kasus</th>
                                            <th>Sanksi</th>
                                            <th>Jenis Hukuman</th>
                                            <th>Bukti Pelanggaran</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $no = 1;
                                        @endphp
                                        @forelse ($pelanggaran as $ssw)
                                            <tr style="height: 40px">
                                                <td style="text-align:center;">{{ $no++ }}</td>
                                                <td>{{ $ssw->tgl_kejadian }}</td>
                                                <td>{{ $ssw->tempat_kejadian }}</td>
                                                <td>{{ $ssw->kasus }}</td>
                                                <td>{{ $ssw->jenis_sanksi }}</td>
                                                <td>{{ $ssw->sanksi }}</td>
                                                @if ($ssw->img_kasus)
                                                    <td><img src="{{ $ssw->img_kasus }}" alt="" style="width: 100px"></td>
                                                @else
                                                    <td>Tidak Ada Bukti.</td>
                                                @endif
                                            </tr>
                                        @empty
                                            <tr class="text-center">
                                                <td colspan="7">Tidak ada riwayat pelanggaran</td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                            <!--end::Table-->

                        </div>
                    </div>
                </div>
            </div>

        </div>
        <!--end::Card-->
    </div>
    <!--end::Container-->
</div>
@endsection

@push('lib-js')
@endpush
@push('js')
@endpush