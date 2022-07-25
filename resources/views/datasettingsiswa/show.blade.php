{{-- INI KITA EXTENDS ROOT VIEW YANG ADA DI FOLDER resources\views\layouts\template.blade.php --}}
@extends('layouts.template')
@push('lib-css')
@endpush
@push('css')
@endpush

@section('sub_header_action')
<div class="me-4">
    <!--begin::Menu-->
        <a href="/datasettingsiswa" class="btn btn-sm btn-flex btn-info fw-bolder">Kembali ke {{$testVariable3}}</a>
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
                <table class="table table-hover">
                    <tbody>
                        @php $class = array(); @endphp
                    	@forelse($kelas as $kls)
                        @php array_push($class, $kls->idkelasberjalan); @endphp
                      <tr>
                        <td width="15%"><b>Kelompok Kelas</b></td>
                        <td>{{$kls->kode_kelompok}}</td>
                      </tr>
                      <tr>
                        <td><b>Tahun Ajaran</b></td>
                        <td><label id="lbtahun">{{$kls->tahunakademik}} / {{$kls->semester}}</label></td>
                      </tr>
                      <tr>
                        <td><b>Wali Kelas</b></td>
                        <td><label id="lbwali">{{$kls->Nama}}</label></td>
                      </tr>
                      @empty
                      <tr>
                        <td width="15%"><b>Kelompok Kelas</b></td>
                        <td>-</td>
                      </tr>
                      <tr>
                        <td><b>Tahun Ajaran</b></td>
                        <td><label id="lbtahun">-</label></td>
                      </tr>
                      <tr>
                        <td><b>Wali Kelas</b></td>
                        <td><label id="lbwali">-</label></td>
                      </tr>
                      <tr>
                      @endforelse
                    </tbody>
                  </table>
                                
            </div>

        </div>
        <!--end::Card-->
        
        <br/>
        <div class="card">
            <!--begin::Card header-->
            <div class="card-header border-0 pt-6">
                <!--begin::Card title-->
                <div class="card-title">
                    {{ $testVariable2 }}
                    <button type="button" class="btn btn-sm btn-primary" style="position: absolute; right: 30px;" data-bs-toggle="modal" data-bs-target="#kt_modal_create_app">Tambah Siswa</button>
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
                            <h4 class="text-gray-800 fw-bolder">Data Siswa</h4>
                            <div class="fs-6 text-gray-600">Setting siswa berdasarkan kelompok kelas / rombongan belajar</div>
                        </div>
                        <!--end::Content-->
                    </div>
                    <!--end::Wrapper-->
                </div>
                <!--end::Notice-->
                
                <!--begin::Table-->
                <div id="kt_table_users_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer"><div class="table-responsive">
                    <table class="display table table-striped table-bordered nowrap dataTable no-footer" id="tabeldata" role="grid">
                            <!--begin::Table head-->
                            <thead>
                            <!--begin::Table row-->
                            <tr class="text-start text-gray-400 fw-bolder fs-7 text-uppercase gs-0" role="row">
                                <th class="w-10px pe-2 sorting_disabled" rowspan="1" colspan="1" aria-label="" style="">#</th>
                                <th class="min-w-125px sorting" tabindex="0" aria-controls="kt_table_users" rowspan="1" colspan="1" aria-label="User: activate to sort column ascending" style="width: 5.25px;">NISN</th>
                                <th class="min-w-125px sorting" tabindex="0" aria-controls="kt_table_users" rowspan="1" colspan="1" aria-label="Role: activate to sort column ascending" style="width: 151.047px;">Nama Lengkap Siswa</th>
                                <th class="min-w-125px sorting" tabindex="0" aria-controls="kt_table_users" rowspan="1" colspan="1" aria-label="Role: activate to sort column ascending" style="width: 151.047px;">Tingkat Kelas</th>
                                <th class="min-w-125px sorting" tabindex="0" aria-controls="kt_table_users" rowspan="1" colspan="1" aria-label="Role: activate to sort column ascending" style="width: 151.047px;">Tahun Masuk</th>
                                <th class="min-w-125px sorting" tabindex="0" aria-controls="kt_table_users" rowspan="1" colspan="1" aria-label="Role: activate to sort column ascending" style="width: 151.047px;">Action</th>
                                </tr>
                            <!--end::Table row-->
                            </thead>
                            <!--end::Table head-->
                            <!--begin::Table body-->
                            <tbody class="text-gray-600 fw-bold">
                            	@php $no=1; @endphp
                                @forelse($tabelsiswa as $datasiswa)
                                <tr class="odd">
                                <td>{{$no++}}</td>
                                <td class="d-flex align-items-center">{{$datasiswa->nisn}}</td>
                                <td>{{$datasiswa->nama_siswa}}</td>
                                <td>{{$datasiswa->tingkatkelas}}</td>
                                <td>{{$datasiswa->tahunmasuk}}</td>
                                <td>
                                    <a href="javascript:void(0)" class="tfitur" onclick="konfirmasi({{$datasiswa->idkelassiswa}})"><span class="badge badge-danger">Hapus Siswa</span></a>
                                </td>
                                <!--end::Action=-->                            
                            </tr>
                            @empty
                                <tr class="odd">
                                    <td colspan="3">Belum ada data</td>
                                    <td></td>
                                    <td></td>
                                </tr>
                            @endforelse
                            </tbody>
                            <!--end::Table body-->
                        </table>
                        </div>

            </div>

        </div>
        <!--end::Card-->

        <!--begin::Modal - Create App-->
        <div class="modal fade" id="kt_modal_create_app" tabindex="-1" aria-hidden="true">
            <!--begin::Modal dialog-->
            <div class="modal-dialog modal-dialog-centered mw-900px">
                <!--begin::Modal content-->
                <div class="modal-content">
                    <!-- <form method="post" action="/datasettingsiswa/updatesiswa"> -->
                        {{ csrf_field() }}
                    <!--begin::Modal header-->
                    <div class="modal-header">
                        <!--begin::Modal title-->
                        <h2>Tabel Data Siswa</h2>
                        <!--end::Modal title-->                        
                        <!--begin::Close-->
                        <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                            <!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
                            <span class="svg-icon svg-icon-1">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                    <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)" fill="black" />
                                    <rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="black" />
                                </svg>
                            </span>
                            <!--end::Svg Icon-->
                        </div>
                        <!--end::Close-->
                    </div>
                    <!--end::Modal header-->
                    <!--begin::Modal body-->
                    <div class="modal-body py-lg-10 px-lg-10">                        
                        
                        <!-- <select name="tingkat" class="form-select form-select-solid" style="width: 30%; position: absolute;right: 10px;" onchange="ambilSiswa(this)">
                            <option value="0">Filter Tingkat Kelas Siswa...</option>
                            <option value="X">X</option>
                            <option value="XI">XI</option>
                            <option value="XII">XII</option>
                        </select>
                        <br/><br/><br/><br/> -->
                        <input type="hidden" name="kelas" id="kelas" value="{{$class[0]}}"/>
                        <input type="hidden" name="kode" id="kode" value="{{ base64_encode($kode) }}"/>
                        <input type="hidden" name="thn" id="thn" value="{{ base64_encode($tahun) }}"/>
                        <input type="hidden" name="sms" id="sms" value="{{ base64_encode($semester) }}"/>
                        <button type="button" class="btn btn-sm btn-primary" style="position: absolute; left: 750px;" name="btnSimpan" id="btnSimpan">Simpan Siswa</button><br/><br/>
                        <table class="table align-middle table-row-dashed fs-6 gy-5 dataTable no-footer" id="tabeldatasettings" role="grid">
                            <!--begin::Table head-->
                            <thead>
                            <!--begin::Table row-->
                            <tr class="text-start text-gray-400 fw-bolder fs-7 text-uppercase gs-0" role="row">
                                <th class="w-10px pe-2 sorting_disabled" rowspan="1" colspan="1" aria-label="" style="width: 5.25px;">
                                    <div class="form-check form-check-sm form-check-custom form-check-solid me-3">
                                        <input class="form-check-input" type="checkbox" data-kt-check="true" data-kt-check-target="#tabeldatasettings .form-check-input" value="1">
                                    </div>
                                </th>
                                <th class="min-w-125px sorting" tabindex="0" aria-controls="kt_table_users" rowspan="1" colspan="1" aria-label="User: activate to sort column ascending" style="width: 5.25px;">NIS / NISN</th>
                                <th class="min-w-125px sorting" tabindex="0" aria-controls="kt_table_users" rowspan="1" colspan="1" aria-label="Role: activate to sort column ascending" style="width: 151.047px;">Nama Lengkap Siswa</th>
                                <th class="min-w-125px sorting" tabindex="0" aria-controls="kt_table_users" rowspan="1" colspan="1" aria-label="Role: activate to sort column ascending" style="width: 151.047px;">Tingkat Kelas</th>
                                <th class="min-w-125px sorting" tabindex="0" aria-controls="kt_table_users" rowspan="1" colspan="1" aria-label="Role: activate to sort column ascending" style="width: 151.047px;">Tahun Masuk</th>
                                </tr>
                            <!--end::Table row-->
                            </thead>
                            <!--end::Table head-->
                            <!--begin::Table body-->
                            <tbody class="text-gray-600 fw-bold" id="show_data">
                            @foreach($siswa as $datasiswas)
                            <tr class="odd">
                                <td><div class="form-check form-check-sm form-check-custom form-check-solid"><input class="form-check-input" type="checkbox" name="id[]" value="{{$datasiswas->nisn}}"></div></td>
                                <td class="d-flex align-items-center">{{$datasiswas->nis}} / {{$datasiswas->nisn}}</td>
                                <td>{{$datasiswas->nama_siswa}}</td>
                                <td>{{$datasiswas->tingkatkelas}}</td>
                                <td>{{$datasiswas->tahunmasuk}}</td>
                            </tr>
                            @endforeach
                            </tbody>
                            <!--end::Table body-->
                        </table>
                        
                                        </div>
                                        <!--end::Wrapper-->
                                    </div>
                                    <!--end::Actions-->
                                    <!-- </form> -->
                            </div>
                            <!--end::Content-->
                        </div>
                        <!--end::Stepper-->
                    </div>
                    <!--end::Modal body-->
                </div>
                <!--end::Modal content-->
            </div>
            <!--end::Modal dialog-->
        
    </div>
    <!--end::Container-->
</div>
@endsection

@push('lib-js')
@endpush
@push('js')
<script>
    $(document).ready(function () {
            // ambilAllSiswa();
        });

    $(function () {
            $('[name="siswa"]').select2()
        });

    $.ajaxSetup({
                  headers: {
                      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                  }
            });

    function konfirmasi(id){
            Swal.fire({
                title: "Perhatian !",
                text: "Anda yakin akan menghapus data berikut ?",
                icon: "warning",
                showCancelButton: true,
                confirmButtonText: "Ya, hapus !",
                cancelButtonText: "Tidak",
                reverseButtons: true
            }).then(function(result) {
                // console.log('Data:'+id);
                if (result.value) {
                    // console.log(nisn+" - "+thn);
                    $.ajax({
                      url: "/datasettingsiswa/hapussiswa/"+id,
                      type: "GET",
                      dataType: 'json',
                      success: function (data) {
                        location.reload();
                         Swal.fire("Berhasil", "Data berhasil dihapus", "success");                       
                      },
                      error: function (data) {
                          console.log('Error:', data);                      
                          Swal.fire("Gagal", "Data gagal dihapus !", "error");
                      }                 
                    });
                }
            });
        }

        function ambilSiswa(id){
        $.ajax({
                type  : 'GET',
                url   : '/datasettingsiswa/showsiswa/'+id.value,
                async : true,
                dataType : 'json',
                success : function(data){
                    var html = '';
                    var i;
                    // console.log(data);
                    if(data.length == 0){
                        html += '<tr class="odd">'+
                                '<td colspan="3">Tidak ada data !</td>'+
                                '</tr>';
                    }else{
                        for(i=0; i<data.length; i++){
                        html += '<tr class="odd">'+
                                '<td><div class="form-check form-check-sm form-check-custom form-check-solid"><input class="form-check-input" type="checkbox" checked="checked" name="id[]" value="'+data[i].nisn+'"></div></td>'+
                                '<td class="d-flex align-items-center">'+data[i].nis+'/'+data[i].nisn+'</td>'+
                                '<td>'+data[i].nama_siswa+'</td>'+
                                '</tr>';
                        }
                    }
                    
                    $('#show_data').html(html);
                }
 
            });
    }

    function ambilAllSiswa(){
        $.ajax({
                type  : 'GET',
                url   : '/datasettingsiswa/showsiswa/0',
                async : true,
                dataType : 'json',
                success : function(data){
                    var html = '';
                    var i;
                    console.log(data);
                    if(data.length == 0){
                        html += '<tr class="odd">'+
                                '<td colspan="3">Tidak ada data !</td>'+
                                '</tr>';
                    }else{
                        for(i=0; i<data.length; i++){
                        html += '<tr class="odd">'+
                                '<td><div class="form-check form-check-sm form-check-custom form-check-solid"><input class="form-check-input" type="checkbox" checked="checked" name="id[]" value="'+data[i].nisn+'"></div></td>'+
                                '<td class="d-flex align-items-center">'+data[i].nis+'/'+data[i].nisn+'</td>'+
                                '<td>'+data[i].nama_siswa+'</td>'+
                                '</tr>';
                        }
                    }
                    
                    $('#show_data').html(html);
                }
 
            });
    }

    $('#btnSimpan').click(function (e) {
                e.preventDefault();
                $(this).html('Memproses Data...');
                document.getElementById("btnSimpan").disabled = true;

                var kelas = $("#kelas").val();
                var kode = $("#kode").val();
                var thn = $("#thn").val();
                var sms = $("#sms").val();

                var arr=[];
                $("input:checkbox[name*=id]:checked").each(function(){
                     //arr.push($(this).val());
                     arr.push({'cek': $(this).val()});
                });

                if(Array.isArray(arr) && !arr.length){
                    document.getElementById("btnSimpan").disabled = false;
                    $('#btnSimpan').html('Simpan');
                    // location.href = "/datasettingsiswa/";
                    Swal.fire("Perhatian !", "Siswa belum dipilih !", "warning");
                }else{
                    for (var y=0; y<arr.length; y++)
                    {
                      // console.log(arr[y].cek);
                        $.ajax({
                          data: {kelas: kelas, id: arr[y].cek},
                          url: "/datasettingsiswa/store",
                          type: "POST",
                          dataType: 'json',
                          success: function (data) {
                            console.log(data);
                              // $('#kelasinput').trigger("reset");
                              document.getElementById("btnSimpan").disabled = false;
                              $('#btnSimpan').html('Simpan');
                              location.href = "/datasettingsiswa/show/"+kode+"/"+thn+"/"+sms ;
                              Swal.fire("Berhasil !", "Data berhasil ditambahkan", "success");
                          },
                          error: function (data) {
                              console.log('Error:', data);
                              $('#btnSimpan').html('Simpan');
                              document.getElementById("btnSimpan").disabled = false;
                              Swal.fire("Gagal !", "Terjadi kesalahan !", "error");
                          }
                      });
                    }
                }
                
            });

        // $('#saveBtn').click(function (e) {
        //         e.preventDefault();
        //         $(this).html('Memproses Data...');
        //         document.getElementById("saveBtn").disabled = true;

        //         $.ajax({
        //           data: $('#kelasinput').serialize(),
        //           url: "/datasettingsiswa/updatesiswa",
        //           type: "POST",
        //           dataType: 'json',
        //           success: function (data) {
        //               $('#kelasinput').trigger("reset");
        //               document.getElementById("saveBtn").disabled = false;
        //               $('#saveBtn').html('Simpan');
        //               Swal.fire("Berhasil", "Data berhasil di ubah", "success");
        //               console.log(data);
        //           },
        //           error: function (data) {
        //               console.log('Error:', data);
        //               $('#saveBtn').html('Simpan');
        //               document.getElementById("saveBtn").disabled = false;
        //               Swal.fire("Gagal", "Data gagl di ubah", "error");
        //           }
        //       });
        //     });

</script>
@endpush