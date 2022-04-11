{{-- INI KITA EXTENDS ROOT VIEW YANG ADA DI FOLDER resources\views\layouts\template.blade.php --}}
@extends('layouts.template')
@push('lib-css')
@endpush
@push('css')
@endpush

@section('sub_header_action')

@endsection

@section('content')
<div class="post d-flex flex-column-fluid" id="kt_post">
    <!--begin::Container-->
    <div id="kt_content_container" class="container">
        <!--begin::Card-->
        {{--LANGSUNG GUNAKAN NAMA VARIABLE YANG TELAH DIMASUKKAN KE ARRAY ELEMEN DI CONTROLLER PEMANGGIL SEBELUMNYA(HOMECONTROLLER::example()) --}}

<div class="card mb-5 mb-xl-10">
        <div class="card-body pt-9 pb-0">
            <!--begin::Details-->
            <div class="d-flex flex-wrap flex-sm-nowrap mb-3">
                <!--begin: Pic-->
                <div class="me-7 mb-4">
                    <div class="symbol symbol-100px symbol-lg-160px symbol-fixed position-relative">
                        <img class="gambarLogo3" src="http://edsy.ubl.ac.id/pasfoto/guru/no-image.png" alt="image" />
                        <div class="position-absolute translate-middle bottom-0 start-100 mb-6 bg-success rounded-circle border border-4 border-white h-20px w-20px"></div>
                    </div>
                </div>
                <!--end::Pic-->
                <!--begin::Info-->
                <div class="flex-grow-1" style="padding-top: 50px">
                    <!--begin::Title-->
                    <div class="d-flex justify-content-between align-items-start flex-wrap mb-2">
                        <!--begin::User-->
                        <div class="d-flex flex-column">
                            <!--begin::Name-->
                            <div class="d-flex align-items-center mb-2">
                                <a href="#" class="text-gray-900 text-hover-primary fs-2 fw-bolder me-1">{{Auth::user()->nama}}</a>
                                <a href="#">
                                    <!--begin::Svg Icon | path: icons/duotune/general/gen026.svg-->
                                    <span class="svg-icon svg-icon-1 svg-icon-primary">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewBox="0 0 24 24">
                                            <path d="M10.0813 3.7242C10.8849 2.16438 13.1151 2.16438 13.9187 3.7242V3.7242C14.4016 4.66147 15.4909 5.1127 16.4951 4.79139V4.79139C18.1663 4.25668 19.7433 5.83365 19.2086 7.50485V7.50485C18.8873 8.50905 19.3385 9.59842 20.2758 10.0813V10.0813C21.8356 10.8849 21.8356 13.1151 20.2758 13.9187V13.9187C19.3385 14.4016 18.8873 15.491 19.2086 16.4951V16.4951C19.7433 18.1663 18.1663 19.7433 16.4951 19.2086V19.2086C15.491 18.8873 14.4016 19.3385 13.9187 20.2758V20.2758C13.1151 21.8356 10.8849 21.8356 10.0813 20.2758V20.2758C9.59842 19.3385 8.50905 18.8873 7.50485 19.2086V19.2086C5.83365 19.7433 4.25668 18.1663 4.79139 16.4951V16.4951C5.1127 15.491 4.66147 14.4016 3.7242 13.9187V13.9187C2.16438 13.1151 2.16438 10.8849 3.7242 10.0813V10.0813C4.66147 9.59842 5.1127 8.50905 4.79139 7.50485V7.50485C4.25668 5.83365 5.83365 4.25668 7.50485 4.79139V4.79139C8.50905 5.1127 9.59842 4.66147 10.0813 3.7242V3.7242Z" fill="#00A3FF" />
                                            <path class="permanent" d="M14.8563 9.1903C15.0606 8.94984 15.3771 8.9385 15.6175 9.14289C15.858 9.34728 15.8229 9.66433 15.6185 9.9048L11.863 14.6558C11.6554 14.9001 11.2876 14.9258 11.048 14.7128L8.47656 12.4271C8.24068 12.2174 8.21944 11.8563 8.42911 11.6204C8.63877 11.3845 8.99996 11.3633 9.23583 11.5729L11.3706 13.4705L14.8563 9.1903Z" fill="white" />
                                        </svg>
                                    </span>
                                    <!--end::Svg Icon-->
                                </a>
                           </div>
                            <!--end::Name-->
                            <!--begin::Info-->
                            <div class="d-flex flex-wrap fw-bold fs-6 mb-4 pe-2">
                                <a href="#" class="d-flex align-items-center text-gray-400 text-hover-primary me-5 mb-2">
                                    <!--begin::Svg Icon | path: icons/duotune/communication/com006.svg-->
                                    <span class="svg-icon svg-icon-4 me-1">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                            <path opacity="0.3" d="M22 12C22 17.5 17.5 22 12 22C6.5 22 2 17.5 2 12C2 6.5 6.5 2 12 2C17.5 2 22 6.5 22 12ZM12 7C10.3 7 9 8.3 9 10C9 11.7 10.3 13 12 13C13.7 13 15 11.7 15 10C15 8.3 13.7 7 12 7Z" fill="black" />
                                            <path d="M12 22C14.6 22 17 21 18.7 19.4C17.9 16.9 15.2 15 12 15C8.8 15 6.09999 16.9 5.29999 19.4C6.99999 21 9.4 22 12 22Z" fill="black" />
                                        </svg>
                                    </span>
                                    {{Auth::user()->username}}</a>

                            </div>
                            <!--end::Info-->
                        </div>
                        <!--end::User-->

                    </div>
                    <!--end::Title-->

                </div>
                <!--end::Info-->
            </div>
            <!--end::Details-->
            <!--begin::Navs-->

            <ul class="nav nav-stretch nav-line-tabs nav-line-tabs-2x border-transparent fs-5 fw-bolder">
                <!--begin::Nav item-->
               <li class="nav-item mt-2">
                    <a class="nav-link text-active-primary ms-0 me-10 py-5 {{ (request()->segment(2) == 'profil_admin') ? 'active' : '' }}" href="{{route('profile_adm', ['id' => base64_encode(Auth::user()->username)])}}">Profil</a>
                </li>
                <!--end::Nav item-->
                <!--begin::Nav item-->
                <li class="nav-item mt-2">
                    <a class="nav-link text-active-primary ms-0 me-10 py-5 {{ (request()->segment(2) == 'password') ? 'active' : '' }}" href="{{route('password_adm', ['id' => base64_encode(Auth::user()->username)])}}">Kata Sandi</a>
                </li>
                <!--end::Nav item-->

                <!--end::Nav item-->
            </ul>
           
            <!--begin::Navs-->
        </div>
    </div>


<div class="card mb-5 mb-xl-10" id="kt_profile_details_view">
									<!--begin::Card header-->
									<div class="card-header cursor-pointer">
										<!--begin::Card title-->
										<div class="card-title m-0">
											<h3 class="fw-bolder m-0">Profil - {{Session::get('nama')}}</h3>
										</div>
										<!--end::Card title-->
										<!--begin::Action-->
										<!-- <a href="/metronic8/demo1/../demo1/account/settings.html" class="btn btn-primary align-self-center">Edit Profile</a> -->
										<!--end::Action-->
									</div>
									<!--begin::Card header-->
									<!--begin::Card body-->
									<div class="card-body p-9">
										@forelse($dataguru as $guru)
			                            <table class="table table-hover">
			                            <tbody>
			                                <tr>
			                                    <td width="20%"><b>NIP</b></td>
			                                    <td width="2%">:</td>
			                                    <td>{{$guru->Nip}}</td>
			                                    <td rowspan="27"> 
			                                        <center><img src="@if($guru->paspoto == null) {{ asset('pasfoto/guru/no-image.png') }} @else {{ asset('pasfoto/guru/'.$guru->paspoto) }} @endif" class="img-thumbnail" alt="Pasfoto Guru" width="204" height="15a">
													<br/>
													<u>NIP : {{$guru->Nip}}</u>
													<br/>{{$guru->Gelardepan}} {{$guru->Nama}},{{$guru->Gelarbelakang}}</center>
												</td>
			                                </tr>
			                                <tr>
			                                    <td width="20%"><b>NIK</b></td>
			                                    <td width="2%">:</td>
			                                    <td>{{$guru->Nik}}</td>
			                                </tr>
			                                <tr>
			                                    <td width="20%"><b>Nama Lengkap</b></td>
			                                    <td width="2%">:</td>
			                                    <td>{{$guru->Nama}}</td>
			                                </tr>
			                                <tr>
			                                    <td width="20%"><b>Agama</b></td>
			                                    <td width="2%">:</td>
			                                    <td>{{$guru->Agama}}</td>
			                                </tr>
			                                <tr>
			                                    <td width="30%"><b>Tempat Lahir / Tanggal Lahir</b></td>
			                                    <td width="2%">:</td>
			                                    <td>{{$guru->Tempatlahir}}, {{$guru->Tanggallahir}}</td>
			                                </tr>
			                                <tr>
			                                    <td width="20%"><b>Jenis Kelamin</b></td>
			                                    <td width="2%">:</td>
			                                    <td>@if($guru->Jeniskelamin == 'L') Laki-laki @elseif($guru->Jeniskelamin == 'P') Perempuan @endif</td>
			                                </tr>
			                                <tr>
			                                    <td width="20%"><b>Alamat</b></td>
			                                    <td width="2%">:</td>
			                                    <td>{{$guru->Alamat}}</td>
			                                </tr>
			                                <tr>
			                                    <td width="20%"><b>No. Telepon / Handphone</b></td>
			                                    <td width="2%">:</td>
			                                    <td>{{$guru->NoHp}}</td>
			                                </tr>
			                                <tr>
			                                    <td width="20%"><b>Email</b></td>
			                                    <td width="2%">:</td>
			                                    <td>{{$guru->Email}}</td>
			                                </tr>
			                                <tr>
			                                    <td width="20%"><b>Jabatan/Pangkat/Golongan</b></td>
			                                    <td width="2%">:</td>
			                                    <td>{{$guru->Jabatan}},{{$guru->Pangkat}},{{$guru->Golongan}}</td>
			                                </tr>
			                                <tr>
			                                    <td width="20%"><b>Email</b></td>
			                                    <td width="2%">:</td>
			                                    <td>{{$guru->Email}}</td>
			                                </tr>
			                                <tr>
			                                    <td width="20%"><b>NUPTK</b></td>
			                                    <td width="2%">:</td>
			                                    <td>{{$guru->NUPTK}}</td>
			                                </tr>
			                                <tr>
			                                    <td width="20%"><b>Status Marital</b></td>
			                                    <td width="2%">:</td>
			                                    <td>@if($guru->StatusMenikah == 'BM') Belum Menikah @elseif($guru->StatusMenikah == 'M') Menikah @elseif($guru->StatusMenikah == 'C') Cerai @endif</td>
			                                </tr>
			                                <tr>
			                                    <td width="20%"><b>Golongan Darah</b></td>
			                                    <td width="2%">:</td>
			                                    <td>{{$guru->Goldarah}}</td>
			                                </tr>
			                                <tr>
			                                    <td width="20%"><b>Gelar Depan</b></td>
			                                    <td width="2%">:</td>
			                                    <td>{{$guru->Gelardepan}}</td>
			                                </tr>
			                                <tr>
			                                    <td width="20%"><b>Gelar Belakang</b></td>
			                                    <td width="2%">:</td>
			                                    <td>{{$guru->Gelarbelakang}}</td>
			                                </tr>
			                                <tr>
			                                    <td width="20%"><b>TMT (Terhitung Mulai Tanggal)</b></td>
			                                    <td width="2%">:</td>
			                                    <td>{{$guru->Tahunmasuk}}</td>
			                                </tr>
			                                <tr>
			                                    <td width="20%"><b>Tugas Tambahan</b></td>
			                                    <td width="2%">:</td>
			                                    <td>{{$guru->Jabatansekolah}}</td>
			                                </tr>
			                                <tr>
			                                    <td width="20%"><b>NIY</b></td>
			                                    <td width="2%">:</td>
			                                    <td>{{$guru->Niy}}</td>
			                                </tr>
			                                <tr>
			                                    <td width="20%"><b>Status Guru</b></td>
			                                    <td width="2%">:</td>
			                                    <td>{{ strtoupper($guru->status_guru)}}</td>
			                                </tr>
			                                <tr>
			                                    <td width="20%"><b>Balas Bakti 15 Tahun</b></td>
			                                    <td width="2%">:</td>
			                                    <td>{{$guru->balas_bakti_15_tahun}}</td>
			                                </tr>
			                                 <tr>
			                                    <td width="20%"><b>Balas Bakti 25 Tahun</b></td>
			                                    <td width="2%">:</td>
			                                    <td>{{$guru->balas_bakti_25_tahun}}</td>
			                                </tr>
			                                 <tr>
			                                    <td width="20%"><b>Pensiun 55 Tahun</b></td>
			                                    <td width="2%">:</td>
			                                    <td>{{$guru->pensiun_55_tahun}}</td>
			                                </tr>
			                                 <tr>
			                                    <td width="20%"><b>Masa Perpanjangan Pertama</b></td>
			                                    <td width="2%">:</td>
			                                    <td>{{$guru->masa_perpanjangan_1}}</td>
			                                </tr>
			                                <tr>
			                                    <td width="20%"><b>Masa Perpanjangan Kedua</b></td>
			                                    <td width="2%">:</td>
			                                    <td>{{$guru->masa_perpanjangan_2}}</td>
			                                </tr>
			                                <tr>
			                                    <td width="20%"><b>Masa Perpanjangan Ketiga</b></td>
			                                    <td width="2%">:</td>
			                                    <td>{{$guru->masa_perpanjangan_3}}</td>
			                                </tr>
			                                <tr>
			                                    <td width="20%"><b>Sertifikasi</b></td>
			                                    <td width="2%">:</td>
			                                    <td>{{strtoupper($guru->sertifikasi)}}</td>
			                                </tr>
			                            </tbody>
			                        </table>
			                        @endforeach
									</div>
									<!--end::Card body-->
								</div>



						



    </div>
    <!--end::Container-->
</div>


 



@endsection

@push('lib-js')

@endpush
@push('js')
@endpush
