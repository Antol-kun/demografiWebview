{{-- INI KITA EXTENDS ROOT VIEW YANG ADA DI FOLDER resources\views\layouts\template.blade.php --}}
@extends('layouts.template')
@push('lib-css')
@endpush
@push('css')
@endpush

@section('sub_header_action')
  {{ csrf_field() }}
<div class="me-4">
    <!--begin::Menu-->
        <!-- <a href="{{ url('datarole') }}" class="btn btn-sm btn-flex btn-info fw-bolder">Kembali ke {{$testVariable3}}</a> -->
</div>
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
                    {{ $testVariable }}
                </div>
                <!--begin::Card title-->
                <!--begin::Card toolbar-->
                <div class="card-toolbar">
                    <!--begin::Toolbar-->
                </div>
                <!--end::Card toolbar-->
            </div>

            <div class="card-body pt-0">
               
               <div class="table-responsive">
                <table id="tabeldata"  class=" display table table-striped table-bordered nowrap" style="width:100%">
                    <thead>
                    <tr>
                        <th>No</th>
                        <th>Tahun Ajaran</th>
                        <th>Semester</th>
                        <th>Guru Mapel</th>
                        <th>Kelompok Kelas</th>
                        <th>Mata Pelajaran</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @php $no=1 @endphp
                    @foreach($mapel as $data)
                        <tr style="height: 40px">
                            <td style="text-align:center;">{{$no++}}</td>
                            <td>{{$data -> Tahun}}</td>
                            <td>{{$data -> Semester}}</td>
                            <td><u>{{ $data->Gelardepan }} {{$data -> Nama}},{{ $data->Gelarbelakang }}</u><br/>NIP : {{$data -> NIP}}</td>
                            <td>{{$data -> KelompokKelas." ".$data -> Jurusan." ".$data -> NamaKelompokKelas}}</td>

                            <td>{{$data -> Namamapel}}</td>
                            <td>
                                <a style="background-color: deepskyblue; color: white" href="#" class="btn btn-light btn-active-light-primary btn-sm" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end" data-kt-menu-flip="top-end">Komponen Nilai
                                    <!--begin::Svg Icon | path: icons/duotone/Navigation/Angle-down.svg-->
                                    <span class="svg-icon svg-icon-5 m-0">
                                                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                    <polygon points="0 0 24 0 24 24 0 24"></polygon>
                                                                    <path d="M6.70710678,15.7071068 C6.31658249,16.0976311 5.68341751,16.0976311 5.29289322,15.7071068 C4.90236893,15.3165825 4.90236893,14.6834175 5.29289322,14.2928932 L11.2928932,8.29289322 C11.6714722,7.91431428 12.2810586,7.90106866 12.6757246,8.26284586 L18.6757246,13.7628459 C19.0828436,14.1360383 19.1103465,14.7686056 18.7371541,15.1757246 C18.3639617,15.5828436 17.7313944,15.6103465 17.3242754,15.2371541 L12.0300757,10.3841378 L6.70710678,15.7071068 Z" fill="#000000" fill-rule="nonzero" transform="translate(12.000003, 11.999999) rotate(-180.000000) translate(-12.000003, -11.999999)"></path>
                                                                </g>
                                                            </svg>
                                                        </span>
                                    <!--end::Svg Icon--></a>
                                <!--begin::Menu-->
                                <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-bold fs-7 w-125px py-4" data-kt-menu="true">
                                    <!--begin::Menu item-->
{{--                                    <div class="menu-item px-3">--}}
{{--                                        <a href="javascript:void(0)" class="menu-link px-3 tpengetahuan"  data-id="{{ $data->NIP.'>'.$data->idMapel.'>'.$data->Tahun.'>'.$data->Semester.'>'.$data->idkelompokkls.'>'.'Pengetahuan'}}" >Pengetahuan</a>--}}
{{--                                    </div>--}}
{{--                                    <div class="menu-item px-3">--}}
{{--                                        <a href="javascript:void(0)" class="menu-link px-3 tpketerampilan" data-id="{{ $data->NIP.'>'.$data->idMapel.'>'.$data->Tahun.'>'.$data->Semester.'>'.$data->idkelompokkls.'>'.'Keterampilan'}}" >Keterampilam Keterampilam</a>--}}
{{--                                    </div>--}}
                                    <!--end::Menu item-->
                                    <!--begin::Menu item-->
                                    <div class="menu-item px-3">
                                        <a href="/databobotkomponennilai/showkomponen/{{ base64_encode($data->NIP.'>'.$data->idMapel.'>'.$data->Tahun.'>'.$data->Semester.'>'.$data->idkelompokkls.'>'.$data -> Namamapel.'>'.$data -> KelompokKelas.' '.$data -> Jurusan.' '.$data -> NamaKelompokKelas)}}" class="menu-link px-3" data-kt-users-table-filter="delete_row">Lihat Komponen</a>
                                    </div>
                                    <!--end::Menu item-->

                                </div>
                                <!--end::Menu-->
                            </td>
                        </tr>
                    @endforeach
                    </tbody>

                </table>
            </div>
            <!--end::Table-->

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
    <script>
        /*$(document).ready(function () {
        })*/
        $(function () {
            $('[name="pengguna"]').select2()
            $('[name="akses"]').select2()
        })

    $.ajaxSetup({
                  headers: {
                      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                  }
            });

            // $('#btnSimpan').click(function (e) {
            //     e.preventDefault();
            //     $(this).html('Memproses Data...');
            //     //document.getElementById("btnSimpan").disabled = true;

            //     var pengguna = $("#pengguna").val();
            //     var akses = $("#akses").val();

            //     var arr=[];
            //     $("input:checkbox[name*=id]:checked").each(function(){
            //          //arr.push($(this).val());
            //          arr.push({
            //             'cek': $(this).val(),
            //             'pub': 'Y'
            //          });
            //     });

                // for (var y=0; y<arr.length; y++)
                // {
                //   //console.log(arr[y].cek);
                //     $.ajax({
                //       data: {pengguna: pengguna, akses: akses, fitur: arr[y].cek, status:arr[y].pub},
                //       url: "/datarole/store",
                //       type: "POST",
                //       dataType: 'json',
                //       success: function (data) {
                //           $('#kelasinput').trigger("reset");
                //           document.getElementById("btnSimpan").disabled = false;
                //           $('#btnSimpan').html('Simpan');
                //           location.href = "/datarole/";
                //           // console.log(data);
                //       },
                //       error: function (data) {
                //           console.log('Error:', data);
                //           $('#btnSimpan').html('Simpan');
                //           document.getElementById("btnSimpan").disabled = false;
                //       }
                //   });
                // }

                

                
            // });
            
            
    </script>
@endpush