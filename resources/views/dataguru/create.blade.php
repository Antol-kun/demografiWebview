{{-- INI KITA EXTENDS ROOT VIEW YANG ADA DI FOLDER resources\views\layouts\template.blade.php --}}
@extends('layouts.template')
@push('lib-css')
@endpush
@push('css')
@endpush

@section('sub_header_action')
<a href="/dataguru" class="btn btn-sm btn-primary">Kembali ke {{$testVariable}}</a>
@endsection

@section('content')
<div class="post d-flex flex-column-fluid" id="kt_post">
    <!--begin::Container-->
    <div id="kt_content_container" class="container">
        <!--begin::Card-->
        {{--LANGSUNG GUNAKAN NAMA VARIABLE YANG TELAH DIMASUKKAN KE ARRAY ELEMEN DI CONTROLLER PEMANGGIL SEBELUMNYA(HOMECONTROLLER::example()) --}}
        <div class="card">
            <!--begin::Card header-->
            <div class="card-header border-0 pt-6">
                <!--begin::Card title-->
                <div class="card-title">
                    Tambah {{ $testVariable }}
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
																<svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
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
                            <h4 class="text-gray-800 fw-bolder">Perhatian</h4>
                            <div class="fs-6 text-gray-600">Pengguna agar memperhatikan seluruh <b class="text-danger">input/isian</b> yang disediakan!</div>
                        </div>
                        <!--end::Content-->
                    </div>
                    <!--end::Wrapper-->
                </div>
                <!--end::Notice-->
                <!--end::Notice-->
                <!--begin::Input group-->
                <form action="/dataguru/store" enctype="multipart/form-data" method="post">
                        {{ csrf_field() }}
                <div class="row mb-5">
                    
                    <!--begin::Col-->
                    <div class="col-md-6 fv-row">
                        <!--begin::Label-->
                        <label class="required fs-5 fw-bold mb-2">Nomor Induk Yayasan (NIY) / NIP</label>
                        <!--end::Label-->
                        <!--begin::Input-->
                        <input type="number" class="form-control form-control-solid" placeholder="" name="nip" id="nip" required />
                        <!--end::Input-->
                    </div>
                    <!--end::Col-->
                    <!--begin::Col-->
                    <div class="col-md-6 fv-row">
                        <!--end::Label-->
                        <label class="required fs-5 fw-bold mb-2">Nomor Induk Kependudukan</label>
                        <!--end::Label-->
                        <!--end::Input-->
                        <input type="number" class="form-control form-control-solid" placeholder="" name="nik" id="nik" required/>
                        <!--end::Input-->
                    </div>
                    <!--end::Col-->
                </div>
                <div class="row mb-5">
                    
                    <!--begin::Col-->
                    <div class="col-md-6 fv-row">
                        <!--end::Label-->
                        <label class="fs-5 fw-bold mb-2">NUPTK</label>
                        <!--end::Label-->
                        <!--begin::Input-->
                         <input type="number" class="form-control form-control-solid" placeholder="" name="nuptk" id="nuptk" />
                        <!--end::Input-->
                    </div>
                    <!--end::Col-->
                    <!--begin::Col-->
                    <div class="col-md-6 fv-row">
                        
                        <!-- <label class="fs-5 fw-bold mb-2">NIY / NIGK</label> -->
                        
                        <input type="hidden" class="form-control form-control-solid" placeholder="" name="niy" id="niy" />
                        
                    </div>
                    <!--end::Col-->
                </div>
                <div class="row mb-5">
                    <!--begin::Col-->
                    <div class="col-md-6 fv-row">
                        <!--begin::Label-->
                        <label class="required fs-5 fw-bold mb-2">Nama Lengkap <font size="1pt">(Nama Sesuai KTP)</font></label>
                        <!--end::Label-->
                        <!--begin::Input-->
                        <input type="text" class="form-control form-control-solid" placeholder="" name="nama_lengkap" id="nama_lengkap" required/>
                        <!--end::Input-->
                    </div>
                    <!--end::Col-->
                    <!--begin::Col-->
                    <div class="col-md-6 fv-row">
                        <!--end::Label-->
                        <label class="required fs-5 fw-bold mb-2">Agama</label>
                        <!--end::Label-->
                        <!--begin::Select-->
                        <select name="agama" class="form-select form-select-solid" id="agama" required>
                            <option value="">Silahkan Pilih Agama...</option>
                            <option value="Islam">Islam</option>
                            <option value="Protestan">Protestan</option>
                            <option value="Katolik">Katolik</option>
                            <option value="Hindu">Hindu</option>
                            <option value="Buddha">Buddha</option>
                            <option value="Khonghucu">Khonghucu</option>
                        </select>
                        <!--end::Select-->
                    </div>
                    <!--end::Col-->
                </div>
                <div class="row mb-5">
                    <!--begin::Col-->
                    <div class="col-md-6 fv-row">
                        <!--begin::Label-->
                        <label class="required fs-5 fw-bold mb-2">Tempat Lahir</label>
                        <!--end::Label-->
                        <!--begin::Input-->
                        <input type="text" class="form-control form-control-solid" placeholder="" name="tempatlahir" id="tempatlahir" required/>
                        <!--end::Input-->
                    </div>
                    <!--end::Col-->
                    <!--begin::Col-->
                    <div class="col-md-6 fv-row">
                        <!--end::Label-->
                        <label class="required fs-5 fw-bold mb-2">Tanggal Lahir</label>
                        <!--end::Label-->
                        <!--begin::Input-->
                         <input type="date" class="form-control form-control-solid" placeholder="" name="tanggallahir" id="tanggallahir" onchange="tglpensiun()" required/>
                        <!--end::Input-->
                    </div>
                    <!--end::Col-->
                </div>
                <div class="row mb-5">
                    <!--begin::Col-->
                    <div class="col-md-6 fv-row">
                        <!--begin::Label-->
                        <label class="required fs-5 fw-bold mb-2">Jenis Kelamin</label>
                        <!--end::Label-->
                        <!--begin::Input-->
                        <select name="jenkel" class="form-select form-select-solid" id="jenkel" required>
                            <option value="">Silahkan Pilih Jenis Kelamin...</option>
                            <option value="L">Laki-laki</option>
                            <option value="P">Perempuan</option>
                        </select>
                        <!--end::Input-->
                    </div>
                    <!--end::Col-->
                    <!--begin::Col-->
                    <div class="col-md-6 fv-row">
                        <!--end::Label-->
                        <label class="required fs-5 fw-bold mb-2">Alamat Tinggal <font size="1pt">(Alamat Sesuai Domisili)</font></label>
                        <!--end::Label-->
                        <!--begin::Input-->
                        <textarea class="form-control form-control-solid" name="alamat" id="alamat" required></textarea>
                        <!--end::Input-->
                    </div>
                    <!--end::Col-->
                </div>
                <div class="row mb-5">
                    <!--begin::Col-->
                    <div class="col-md-6 fv-row">
                        <!--begin::Label-->
                        <label class="required fs-5 fw-bold mb-2">No. Telepon / Handphone</label>
                        <!--end::Label-->
                        <!--begin::Input-->
                        <input type="number" class="form-control form-control-solid" placeholder="" name="notelp" id="notelp" required/>
                        <!--end::Input-->
                    </div>
                    <!--end::Col-->
                    <!--begin::Col-->
                    <div class="col-md-6 fv-row">
                        <!--end::Label-->
                        <label class="required fs-5 fw-bold mb-2">Email</label>
                        <!--end::Label-->
                        <!--begin::Input-->
                         <input type="email" class="form-control form-control-solid" placeholder="" name="email" id="email" required/>
                        <!--end::Input-->
                    </div>
                    <!--end::Col-->
                </div>
                <div class="row mb-5">
                    <!--begin::Col-->
                    <div class="col-md-6 fv-row">
                        <!--begin::Label-->
                        <label class="required fs-5 fw-bold mb-2">Jabatan</label>
                        <!--end::Label-->
                        <!--begin::Input-->
                        <input type="text" class="form-control form-control-solid" placeholder="" name="jabatan" id="jabatan" required/>
                        <!--end::Input-->
                    </div>
                    <!--end::Col-->
                    <!--begin::Col-->
                    <div class="col-md-6 fv-row">
                        <!--end::Label-->
                        <label class="fs-5 fw-bold mb-2">Pangkat</label>
                        <!--end::Label-->
                        <!--begin::Input-->
                         <input type="text" class="form-control form-control-solid" placeholder="" name="pangkat" id="pangkat" />
                        <!--end::Input-->
                    </div>
                    <!--end::Col-->
                </div>
                <div class="row mb-5">
                    <!--begin::Col-->
                    <div class="col-md-6 fv-row">
                        <!--begin::Label-->
                        <label class="fs-5 fw-bold mb-2">Golongan</label>
                        <!--end::Label-->
                        <!--begin::Input-->
                        <input type="text" class="form-control form-control-solid" placeholder="" name="golongan" id="golongan" />
                        <!--end::Input-->
                    </div>
                    <!--end::Col-->
                    <!--begin::Col-->
                    <div class="col-md-6 fv-row">
                        <!--begin::Label-->
                        <label class="required fs-5 fw-bold mb-2">Status Marital</label>
                        <!--end::Label-->
                        <!--begin::Input-->
                        <select name="status_marital" class="form-select form-select-solid" id="status_marital" required>
                            <option value="">Silahkan Pilih Status Marital...</option>
                            <option value="BM">Belum Menikah</option>
                            <option value="M">Menikah</option>
                            <option value="C">Cerai</option>
                        </select>
                        <!--end::Input-->
                    </div>
                    <!--end::Col-->
                </div>
                <div class="row mb-5">                    
                    <!--begin::Col-->
                    <div class="col-md-6 fv-row">
                        <!--end::Label-->
                        <label class="fs-5 fw-bold mb-2">Golongan Darah</label>
                        <!--end::Label-->
                        <!--begin::Input-->
                        <select name="gol_darah" class="form-select form-select-solid" id="gol_darah">
                            <option value="">Silahkan Pilih Golongan Darah...</option>
                            <option value="A">A</option>
                            <option value="B">B</option>
                            <option value="AB">AB</option>
                            <option value="O">O</option>
                        </select>
                        <!--end::Input-->
                    </div>
                    <!--end::Col-->
                    <!--begin::Col-->
                    <div class="col-md-6 fv-row">
                        <!--begin::Label-->
                        <label class="fs-5 fw-bold mb-2">Gelar Depan</label>
                        <!--end::Label-->
                        <!--begin::Input-->
                        <input type="text" class="form-control form-control-solid" placeholder="" name="gelar_depan" id="gelar_depan" />
                        <!--end::Input-->
                    </div>
                    <!--end::Col-->
                </div>
                <div class="row mb-5">
                    
                    <!--begin::Col-->
                    <div class="col-md-6 fv-row">
                        <!--end::Label-->
                        <label class="fs-5 fw-bold mb-2">Gelar Belakang</label>
                        <!--end::Label-->
                        <!--begin::Input-->
                         <input type="text" class="form-control form-control-solid" placeholder="" name="gelar_belakang" id="gelar_belakang" />
                        <!--end::Input-->
                    </div>
                    <!--end::Col-->
                     <!--begin::Col-->
                    <div class="col-md-6 fv-row">
                        <!--begin::Label-->
                        <label class="required fs-5 fw-bold mb-2">TMT (Terhitung Mulai Tanggal)</label>
                        <!--end::Label-->
                        <!--begin::Input-->
                        <input type="date" class="form-control form-control-solid" placeholder="" name="tmt" id="tmt" onchange="tgltmt()" required/>
                        <!--end::Input-->
                    </div>
                    <!--end::Col-->
                </div>
                <div class="row mb-5">
                   
                    <!--begin::Col-->
                    <div class="col-md-6 fv-row">
                        <!--end::Label-->
                        <label class="required fs-5 fw-bold mb-2">Tugas Tambahan</label>
                        <!--end::Label-->
                        <!--begin::Input-->
                         <!-- <input type="text"  placeholder="" name="tugas" id="tugas" /> -->
                         <br/>
                         <label class="checkbox checkbox-success">
                            <input type="checkbox" name="tugas[]" id="tugas1" value="Guru">
                            <span></span>Guru
                        </label>
                        <label class="checkbox checkbox-success">
                            <input type="checkbox" name="tugas[]" id="tugas2" value="Staff">
                            <span></span>Staff
                        </label>
                        <!--end::Input-->
                    </div>
                    <!--end::Col-->
                    <!--begin::Col-->
                    <div class="col-md-6 fv-row">
                        <!--end::Label-->
                        <label class="fs-5 fw-bold mb-2">Status Pegawai</label>
                        <!--end::Label-->
                        <!--begin::Input-->
                        <select name="status_guru" class="form-select form-select-solid" id="status_guru">
                            <option value="">Silahkan Pilih Status Pegawai...</option>
                            <!-- <option value="GTT">GTT (Guru  Tidak  Tetap)</option>
                            <option value="GTY">GTY (Guru Tetap Yayasan)</option>
                            <option value="PTT">PTT (Pegawai Tetap Tetap)</option>
                            <option value="PTY">PTY (Pegawai Tetap Yayasan)</option> -->
                            <!-- <option value="Honorer">Honorer</option>
                            <option value="PNS">PNS (Pegawai Negeri Sipil)</option> -->
                        </select>
                        <!--end::Input-->
                    </div>
                    <!--end::Col-->
                </div>
                <div class="row mb-5">
                    <!--begin::Col-->
                    <div class="col-md-6 fv-row">
                        <!--begin::Label-->
                        <label class="fs-5 fw-bold mb-2">Sertifikasi</label>
                        <!--end::Label-->
                        <!--begin::Input-->
                        <select name="sertifikasi" class="form-select form-select-solid" id="sertifikasi">
                            <option value="">Silahkan Pilih Status Pegawai...</option>
                            <option value="belum">Belum</option>
                            <option value="sudah">Sudah</option>
                             <option value="proses">Sedang Dalam Proses</option>
                        </select>
                        <!--end::Input
                    </div>
                    <!--end::Col-->
                </div>
                <!--begin::Col-->
                    <div class="col-md-6 fv-row">
                        <!--begin::Label-->
                        <label class="fs-5 fw-bold mb-2">Foto Pegawai</label>
                        <!--end::Label-->
                        <!--begin::Input-->
                        <input type="file" class="form-control form-control-solid" placeholder="" name="pasfoto" id="pasfoto" onchange="readURL(this);"/><br/>
                        <img id="blah" src="{{ asset('pasfoto/guru/no-image.png') }}" class="img-thumbnail" alt="Pasfoto" width="204" height="136"> 
                        <!--end::Input-->
                    </div>
                    <!--end::Col-->
                <br/><br/><br/><br/><br/>

                <div style="width: 100%; height: 20px; border-bottom: 1px solid black; text-align: left">
                      <span style="font-size: 20px; background-color: #F3F5F6; padding: 0 10px;">
                        Masa Kerja
                      </span>
                    </div><br/><br/>

                <div class="row mb-5">
                    <!--begin::Col-->
                    <div class="col-md-6 fv-row">
                        <!--begin::Label-->
                        <label class="fs-5 fw-bold mb-2">Balas Bakti 15 Tahun</label>
                        <!--end::Label-->
                        <!--begin::Input-->
                        <input type="date" class="form-control form-control-solid" placeholder="" name="bakti_15" id="bakti_15" />
                        <!--end::Input-->
                    </div>
                    <!--end::Col-->
                    <!--begin::Col-->
                    <div class="col-md-6 fv-row">
                        <!--end::Label-->
                        <label class="fs-5 fw-bold mb-2">Balas Bakti 25 Tahun</label>
                        <!--end::Label-->
                        <!--begin::Input-->
                         <input type="date" class="form-control form-control-solid" placeholder="" name="bakti_25" id="bakti_25" />
                        <!--end::Input-->
                    </div>
                    <!--end::Col-->
                </div>
                <div class="row mb-5">
                    <!--begin::Col-->
                    <div class="col-md-6 fv-row">
                        <!--begin::Label-->
                        <label class="fs-5 fw-bold mb-2">Pensiun 55 tahun</label>
                        <!--end::Label-->
                        <!--begin::Input-->
                        <input type="date" class="form-control form-control-solid" placeholder="" name="pensiun" id="pensiun" />
                        <!--end::Input-->
                    </div>
                    <!--end::Col-->
                    <!--begin::Col-->
                    <div class="col-md-6 fv-row">
                        <!--end::Label-->
                        <label class="fs-5 fw-bold mb-2">Masa Perpanjangan Pertama</label>
                        <!--end::Label-->
                        <!--begin::Input-->
                         <input type="date" class="form-control form-control-solid" placeholder="" name="perpanjangan_pertama" id="perpanjangan_pertama" />
                        <!--end::Input-->
                    </div>
                    <!--end::Col-->
                </div>
                <div class="row mb-5">
                    <!--begin::Col-->
                    <div class="col-md-6 fv-row">
                        <!--begin::Label-->
                        <label class="fs-5 fw-bold mb-2">Masa Perpanjangan Kedua</label>
                        <!--end::Label-->
                        <!--begin::Input-->
                        <input type="date" class="form-control form-control-solid" placeholder="" name="perpanjangan_kedua" id="perpanjangan_kedua" />
                        <!--end::Input-->
                    </div>
                    <!--end::Col-->
                    <!--begin::Col-->
                    <div class="col-md-6 fv-row">
                        <!--end::Label-->
                        <label class="fs-5 fw-bold mb-2">Masa Perpanjangan Ketiga</label>
                        <!--end::Label-->
                        <!--begin::Input-->
                         <input type="date" class="form-control form-control-solid" placeholder="" name="perpanjangan_ketiga" id="perpanjangan_ketiga" />
                        <!--end::Input-->
                    </div>
                    <!--end::Col-->
                </div>                
                </div>

                <div style="width: 100%; height: 20px; border-bottom: 1px solid black; text-align: left">
                      <span style="font-size: 20px; background-color: #F3F5F6; padding: 0 10px;">
                        Data Anggota Keluarga
                      </span>
                    </div><br/><br/>

                <div class="form-group fieldGroup">
                            
                        <div class="row mb-5">
                        <!--begin::Col-->
                        <div class="col-md-6 fv-row">
                            <!--begin::Label-->
                            <label class="fs-5 fw-bold mb-2">Nama Anggota keluarga</label>
                            <!--end::Label-->
                            <!--begin::Input-->
                             <input type="text" name="nama[]" class="form-control" placeholder=""/>
                            <!--end::Input-->
                        </div>
                        <!--end::Col-->
                        <!--begin::Col-->
                        <div class="col-md-6 fv-row">
                            <!--end::Label-->
                            <label class="fs-5 fw-bold mb-2">Hubungan Keluarga</label>
                            <!--end::Label-->
                            <!--begin::Input-->
                             <select name="hubungan[]" class="form-select form-select-solid" id="hubungan">
                                <option value="">Pilih Hubungan Keluarga...</option>
                                <option value="suami">Suami</option>
                                <option value="istri">Istri</option>
                                <option value="anak">Anak</option>
                            </select>
                            <!--end::Input-->
                        </div>
                        <!--end::Col-->
                        <div class="col-md-6 fv-row">
                            <!--begin::Label-->
                            <label class="fs-5 fw-bold mb-2">Tempat Lahir</label>
                            <input type="text" name="tempatlahirkeluarga[]" class="form-control" placeholder=""/>
                        </div>
                        <div class="col-md-6 fv-row">
                            <!--begin::Label-->
                            <label class="fs-5 fw-bold mb-2">Tanggal Lahir</label>
                            <input type="date" name="tgllahirkeluarga[]" class="form-control" placeholder=""/>
                        </div>

                    </div>

                    <div class="input-group">
                            <div class="input-group-addon ml-3"> 
                                <a href="javascript:void(0)" class="btn btn-success btn-sm addMore"><i class="fas fa-plus"></i></a>
                            </div>
                        </div>
                            
                    </div>

                    <div class="form-group fieldGroupCopy" style="display: none;">

                    <div class="row mb-5">
                        <!--begin::Col-->
                        <div class="col-md-6 fv-row">
                            <!--begin::Label-->
                            <label class="fs-5 fw-bold mb-2">Nama Anggota keluarga</label>
                            <!--end::Label-->
                            <!--begin::Input-->
                             <input type="text" name="nama[]" class="form-control" placeholder=""/>
                            <!--end::Input-->
                        </div>
                        <!--end::Col-->
                        <!--begin::Col-->
                        <div class="col-md-6 fv-row">
                            <!--end::Label-->
                            <label class="fs-5 fw-bold mb-2">Hubungan Keluarga</label>
                            <!--end::Label-->
                            <!--begin::Input-->
                             <select name="hubungan[]" class="form-select form-select-solid" id="hubungan">
                                <option value="">Pilih Hubungan Keluarga...</option>
                                <option value="suami">Suami</option>
                                <option value="istri">Istri</option>
                                <option value="anak">Anak</option>
                            </select>
                            <!--end::Input-->
                        </div>
                        <!--end::Col-->
                        <div class="col-md-6 fv-row">
                            <!--begin::Label-->
                            <label class="fs-5 fw-bold mb-2">Tempat Lahir</label>
                            <input type="text" name="tempatlahirkeluarga[]" class="form-control" placeholder=""/>
                        </div>
                        <div class="col-md-6 fv-row">
                            <!--begin::Label-->
                            <label class="fs-5 fw-bold mb-2">Tanggal Lahir</label>
                            <input type="date" name="tgllahirkeluarga[]" class="form-control" placeholder=""/>
                        </div>

                    </div>

                    <div class="input-group">
                        <div class="input-group-addon"> 
                            <a href="javascript:void(0)" class="btn btn-danger btn-sm remove"><i class="fas fa-trash"></i></a>
                        </div>
                    </div>
                </div>

                <br/><br/>

                <div style="width: 100%; height: 20px; border-bottom: 1px solid black; text-align: left">
                      <span style="font-size: 20px; background-color: #F3F5F6; padding: 0 10px;">
                        Data Pendidikan Terakhir
                      </span>
                    </div><br/><br/>

                <div class="form-group2 fieldGroup2">
                            
                        <div class="row mb-5">
                        <!--begin::Col-->
                        <div class="col-md-6 fv-row">
                            <!--begin::Label-->
                            <label class="fs-5 fw-bold mb-2">Jenjang Pendidikan</label>
                            <!--end::Label-->
                            <!--begin::Input-->
                             <select name="jenjang[]" class="form-select form-select-solid" id="jenjang">
                                <option value="">Pilih Jenjang Pendidikan...</option>
                                <option value="sma">SMA</option>
                                <option value="smk">SMK</option>
                                <option value="diploma">Diploma</option>
                                <option value="s1">S1</option>
                                <option value="s2">S2</option>
                                <option value="s3">S3</option>
                            </select>
                            <!--end::Input-->
                        </div>
                        <!--end::Col-->
                        <!--begin::Col-->
                        <div class="col-md-6 fv-row">
                            <!--end::Label-->
                            <label class="fs-5 fw-bold mb-2">Asal Perguruan Tinggi</label>
                            <!--end::Label-->
                            <!--begin::Input-->
                             <input type="text" name="kampus[]" class="form-control" placeholder=""/>
                            <!--end::Input-->
                        </div>
                        <!--end::Col-->
                        <div class="col-md-6 fv-row">
                            <!--begin::Label-->
                            <label class="fs-5 fw-bold mb-2">Program Studi</label>
                            <input type="text" name="prodi[]" class="form-control" placeholder=""/>
                        </div>
                        <div class="col-md-6 fv-row">
                            <!--begin::Label-->
                            <label class="fs-5 fw-bold mb-2">Tahun Masuk</label>
                            <input type="number" name="tahunmasuk[]" class="form-control" placeholder=""/>
                        </div>
                        <div class="col-md-6 fv-row">
                            <!--begin::Label-->
                            <label class="fs-5 fw-bold mb-2">Tahun Keluar</label>
                            <input type="number" name="tahunkeluar[]" class="form-control" placeholder=""/>
                        </div>
                        <div class="col-md-6 fv-row">
                            <!--begin::Label-->
                            <label class="fs-5 fw-bold mb-2">IPK</label>
                            <input type="text" name="ipk[]" class="form-control" placeholder=""/>
                        </div>

                    </div>

                    <div class="input-group2">
                            <div class="input-group-addon ml-3"> 
                                <a href="javascript:void(0)" class="btn btn-success btn-sm addMore2"><i class="fas fa-plus"></i></a>
                            </div>
                        </div>
                            
                    </div>

                    <div class="form-group2 fieldGroupCopy2" style="display: none;">

                    <div class="row mb-5">
                        <!--begin::Col-->
                        <div class="col-md-6 fv-row">
                            <!--begin::Label-->
                            <label class="fs-5 fw-bold mb-2">Jenjang Pendidikan</label>
                            <!--end::Label-->
                            <!--begin::Input-->
                             <select name="jenjang[]" class="form-select form-select-solid" id="jenjang">
                                <option value="">Pilih Jenjang Pendidikan...</option>
                                <option value="sma_smk">SMA/SMK</option>
                                <option value="diploma">Diploma</option>
                                <option value="s1">S1</option>
                                <option value="s2">S2</option>
                                <option value="s3">S3</option>
                            </select>
                            <!--end::Input-->
                        </div>
                        <!--end::Col-->
                        <!--begin::Col-->
                        <div class="col-md-6 fv-row">
                            <!--end::Label-->
                            <label class="fs-5 fw-bold mb-2">Asal Perguruan Tinggi</label>
                            <!--end::Label-->
                            <!--begin::Input-->
                             <input type="text" name="kampus[]" class="form-control" placeholder=""/>
                            <!--end::Input-->
                        </div>
                        <!--end::Col-->
                        <div class="col-md-6 fv-row">
                            <!--begin::Label-->
                            <label class="fs-5 fw-bold mb-2">Program Studi</label>
                            <input type="text" name="prodi[]" class="form-control" placeholder=""/>
                        </div>
                        <div class="col-md-6 fv-row">
                            <!--begin::Label-->
                            <label class="fs-5 fw-bold mb-2">Tahun Masuk</label>
                            <input type="number" name="tahunmasuk[]" class="form-control" placeholder=""/>
                        </div>
                        <div class="col-md-6 fv-row">
                            <!--begin::Label-->
                            <label class="required fs-5 fw-bold mb-2">Tahun Keluar</label>
                            <input type="number" name="tahunkeluar[]" class="form-control" placeholder=""/>
                        </div>
                        <div class="col-md-6 fv-row">
                            <!--begin::Label-->
                            <label class="retextquired fs-5 fw-bold mb-2">IPK</label>
                            <input type="text" name="ipk[]" class="form-control" placeholder=""/>
                        </div>

                    </div>

                    <div class="input-group2">
                        <div class="input-group-addon"> 
                            <a href="javascript:void(0)" class="btn btn-danger btn-sm remove2"><i class="fas fa-trash"></i></a>
                        </div>
                    </div>
                </div>

                <!-- <br/><br/>

                <div style="width: 100%; height: 20px; border-bottom: 1px solid black; text-align: left">
                      <span style="font-size: 20px; background-color: #F3F5F6; padding: 0 10px;">
                        Data Mata Pelajaran yang di Ampu
                      </span>
                    </div><br/><br/>

                <div class="form-group3 fieldGroup3">
                            
                        <div class="row mb-5">
                        <div class="col-md-6 fv-row">
                            <label class="required fs-5 fw-bold mb-2">Mata Pelajaran Yang di Ampu</label>
                         
                             <select name="mapel[]" class="form-select form-select-solid" id="mapel">
                                <option value="">Pilih Mapel...</option>
                                @foreach($datamapel as $mapel)
                                <option value="{{$mapel->idmapel}}">({{$mapel->kode_mapel}}) - {{$mapel->nama_mapel}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-6 fv-row">
                            <label class="required fs-5 fw-bold mb-2">Jumlah Jam</label>
                         
                             <input type="number" name="jumlah_jam[]" class="form-control" placeholder=""/>
                           
                        </div>
                        <div class="col-md-6 fv-row">
                            <label class="required fs-5 fw-bold mb-2">Kelas</label>
                            <input type="text" name="kelas[]" class="form-control" placeholder=""/>
                        </div>

                    </div>

                    <div class="input-group3">
                            <div class="input-group-addon ml-3"> 
                                <a href="javascript:void(0)" class="btn btn-success btn-sm addMore3"><i class="fas fa-plus"></i></a>
                            </div>
                        </div>
                            
                    </div>

                    <div class="form-group3 fieldGroupCopy3" style="display: none;">

                    <div class="row mb-5">
                        <div class="col-md-6 fv-row">
                            <label class="required fs-5 fw-bold mb-2">Mata Pelajaran Yang di Ampu</label>
                          
                             <select name="mapel[]" class="form-select form-select-solid" id="mapel">
                                <option value="">Pilih Mapel...</option>
                                @foreach($datamapel as $mapel)
                                <option value="{{$mapel->idmapel}}">({{$mapel->kode_mapel}}) - {{$mapel->nama_mapel}}</option>
                                @endforeach
                            </select>
                        </div>
                  
                        <div class="col-md-6 fv-row">
                       
                            <label class="required fs-5 fw-bold mb-2">Jumlah Jam</label>
                         
                             <input type="number" name="jumlah_jam[]" class="form-control" placeholder=""/>
                          
                        </div>
                        <div class="col-md-6 fv-row">
                            <label class="required fs-5 fw-bold mb-2">Kelas</label>
                            <input type="text" name="kelas[]" class="form-control" placeholder=""/>
                        </div>

                    </div>

                    <div class="input-group3">
                        <div class="input-group-addon"> 
                            <a href="javascript:void(0)" class="btn btn-danger btn-sm remove3"><i class="fas fa-trash"></i></a>
                        </div>
                    </div>
                </div> -->


            <div class="card-footer text-end">
                <button class="btn w-100 w-sm-auto btn-primary">
                    <span class="svg-icon svg-icon-white svg-icon-1"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                            <polygon points="0 0 24 0 24 24 0 24"/>
                            <path d="M17,4 L6,4 C4.79111111,4 4,4.7 4,6 L4,18 C4,19.3 4.79111111,20 6,20 L18,20 C19.2,20 20,19.3 20,18 L20,7.20710678 C20,7.07449854 19.9473216,6.94732158 19.8535534,6.85355339 L17,4 Z M17,11 L7,11 L7,4 L17,4 L17,11 Z" fill="#000000" fill-rule="nonzero"/>
                            <rect fill="#000000" opacity="0.3" x="12" y="4" width="3" height="5" rx="0.5"/>
                        </g>
                    </svg></span>
                    Simpan</button>
            </div>

        </form>

        </div>
        <!--end::Card-->
    </div>
    <!--end::Container-->
</div>
@endsection

@push('lib-js')
@endpush
@push('js')
    <script>
        $(document).ready(function () {
        const checkbox = document.getElementById('tugas1');
        const checkbox2 = document.getElementById('tugas2');

        checkbox.addEventListener('change', (event) => {
          if (event.currentTarget.checked) {
           $("#status_guru").append("<option value='GTT'>GTT (Guru  Tidak  Tetap)</option><option value='GTY'>GTT (Guru  Tetap  Yayasan)</option>");
          } else {
            // alert('not checked');
            $("#status_guru").empty();
          }
        });

        checkbox2.addEventListener('change', (event) => {
          if (event.currentTarget.checked) {
            $("#status_guru").append("<option value='PTT'>PTT (Pegawai  Tidak  Tetap)</option><option value='PTY'>PTT (Pegawai  Tetap  Yayasan)</option>");
          } else {
            // alert('not checked');
            $("#status_guru").empty();
          }
        });
            // membatasi jumlah inputan
            var maxGroup = 10;
            var maxGroup2 = 5;
            var maxGroup3 = 8;
            
            //melakukan proses multiple input data anggota keluarga
            $(".addMore").click(function(){
                if($('body').find('.fieldGroup').length < maxGroup){
                    var fieldHTML = '<div class="form-group fieldGroup">'+$(".fieldGroupCopy").html()+'</div>';
                    $('body').find('.fieldGroup:last').after(fieldHTML);
                }else{
                    alert('Maximum '+maxGroup+' groups are allowed.');
                }
            });
            
            //remove fields group
            $("body").on("click",".remove",function(){ 
                $(this).parents(".fieldGroup").remove();
            });

            //melakukan proses multiple input pendidikan terakhir
            $(".addMore2").click(function(){
                if($('body').find('.fieldGroup2').length < maxGroup2){
                    var fieldHTML = '<div class="form-group2 fieldGroup2">'+$(".fieldGroupCopy2").html()+'</div>';
                    $('body').find('.fieldGroup2:last').after(fieldHTML);
                }else{
                    alert('Maximum '+maxGroup2+' groups are allowed.');
                }
            });
            
            //remove fields group
            $("body").on("click",".remove2",function(){ 
                $(this).parents(".fieldGroup2").remove();
            });


            //melakukan proses multiple input mapel diampu
            // $(".addMore3").click(function(){
            //     if($('body').find('.fieldGroup3').length < maxGroup2){
            //         var fieldHTML = '<div class="form-group3 fieldGroup3">'+$(".fieldGroupCopy3").html()+'</div>';
            //         $('body').find('.fieldGroup3:last').after(fieldHTML);
            //     }else{
            //         alert('Maximum '+maxGroup3+' groups are allowed.');
            //     }
            // });
            
            // //remove fields group
            // $("body").on("click",".remove3",function(){ 
            //     $(this).parents(".fieldGroup3").remove();
            // });
        });

        $(function () {
            $('[name="country"]').select2()
            $('[name="agama"]').select2()
        })


        function tgltmt(){
            var tgl = document.getElementById('tmt').value;
            
            var bls15 = document.getElementById('bakti_15');
            var bls25 = document.getElementById('bakti_25');          
            
            var targetDate1 = new Date(tgl);
            var targetDate2 = new Date(tgl);
            
            var pars = new Date(tgl);

            targetDate1.setDate(targetDate1.getDate() + 5478); //15 tahun
            targetDate2.setDate(targetDate2.getDate() + 9131); //25 tahun

            var dd = ("0" + (pars.getDate() + 1)).slice(-2)
            var mm = ("0" + (pars.getMonth() + 1)).slice(-2);
            var yyyy1 = targetDate1.getFullYear();
            var yyyy2 = targetDate2.getFullYear();

            var balasbakti15 = yyyy1 + "-" + mm + "-" + dd;
            var balasbakti25 = yyyy2 + "-" + mm + "-" + dd;

            // So you can see the output
            // console.log(balasbakti15);
            bls15.value = balasbakti15;
            bls25.value = balasbakti25;
            
        }

        function tglpensiun(){
            var tgllahir = document.getElementById('tanggallahir').value;
            var pensiun = document.getElementById('pensiun');
            var targetDate3 = new Date(tgllahir);
            var pars = new Date(tgllahir);
            targetDate3.setDate(targetDate3.getDate() + 20088); //55 tahun
            var dd = ("0" + (pars.getDate() + 1)).slice(-2)
            var mm = ("0" + (pars.getMonth() + 1)).slice(-2);
            var yyyy3 = targetDate3.getFullYear();
            var pensiun55 = yyyy3 + "-" + mm + "-" + dd;
            pensiun.value = pensiun55;
        }

        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#blah').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
@endpush
