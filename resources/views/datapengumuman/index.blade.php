{{-- INI KITA EXTENDS ROOT VIEW YANG ADA DI FOLDER resources\views\layouts\template.blade.php --}}
@extends('layouts.template')
@push('lib-css')
@endpush
@push('css')
@endpush

@section('sub_header_action')
<!--begin::Button-->
<a href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#modalinfo" class="btn btn-sm btn-primary">Tambah {{$testVariable}}</a>
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
                    Data {{ $testVariable }}
                </div>
                <!--begin::Card title-->
                <!--begin::Card toolbar-->
                <div class="card-toolbar">
                    <!--begin::Toolbar-->
                    <div class="d-flex align-items-center position-relative my-1" data-kt-user-table-toolbar="base">
                        <!--end::Add user-->
                    </div>
                    <!--end::Toolbar-->
                    <!--begin::Group actions-->
                    <div class="d-flex justify-content-end align-items-center d-none" data-kt-user-table-toolbar="selected">
                        <div class="fw-bolder me-5">
                        <span class="me-2" data-kt-user-table-select="selected_count"></span>Selected</div>
                        <button type="button" class="btn btn-danger" data-kt-user-table-select="delete_selected">Delete Selected</button>
                    </div>
                </div>
                <!--end::Card toolbar-->
            </div>

            <div class="card-body pt-0">
                <!--begin::Table-->
                <div id="kt_table_users_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer"><div class="table-responsive">
                    
                    <table id="tabeldata"  class=" display table table-striped table-bordered nowrap" style="width:100%">
                    <thead>
                    <tr>
                        <th>No</th>
                        <th>Judul</th>
                        <th>Isi Pengumuman</th>
                        <th>Tanggal Publish</th>
                        <th>Tanggal Berakhir</th>
{{--                        <th>Penerima Pengumuman</th>--}}
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($info as $data)
                        <tr style="height: 40px">
                            <td style="text-align:center;">{{$loop->index +1 }}</td>
                            <td>{{$data->judul}}</td>
                            <td style="text-align:center;">
                                <a  href='javascript:void(0)' class='pengumuman' onclick='openpengumuman("{{$data->id}}")'>
                                    <span class="badge badge-primary fs-8">Lihat Pengumuman</span></a>
                            </td>
                            <td style="text-align:center;">{{$data->tgl_publish}}</td>
                            <td style="text-align:center;">{{$data->tgl_close}}</td>
{{--                            <td style="text-align:center;">{{$data->nama_akses}}</td>--}}
                            <td>
                                <a style="background-color: deepskyblue; color: white" href="#" class="btn btn-light btn-active-light-primary btn-sm" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end" data-kt-menu-flip="top-end">Opsi
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
{{--                                        <a href="/datapengumuman/detailpaket/ @endif{{base64_encode($data->id)}}" class="menu-link px-3 ">Lihat Detail</a>--}}
{{--                                    </div>--}}
                                    <div class="menu-item px-3">
                                        <a href="javascript:void(0)"
                                           onclick="
                                               return Swal.fire({
                                               title: 'Yakin ingin menghapus data?',
                                               text: 'Data tidak akan muncul lagi',
                                               type: 'warning',
                                               showCancelButton: true,
                                               confirmButtonColor: '#3085d6',
                                               cancelButtonColor: '#d33',
                                               confirmButtonText: 'Hapus'
                                               }).then((result) => {

                                               if (result.value) {

                                               window.location.href = '/datapengumuman/hapuspengumuman/{{base64_encode($data->id)}}'
                                               } })"
                                           class="menu-link px-3">Hapus</a>
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
            </div>
                <!--end::Table-->
            </div>


            <div class="modal fade" id="modalinfo" tabindex="-1" aria-hidden="true">
        <!--begin::Modal dialog-->
        <div class="modal-dialog modal-dialog-centered mw-1000px">
            <!--begin::Modal content-->
            <div class="modal-content">
                <!--begin::Modal header-->
                <div class="modal-header">
                    <!--begin::Modal title-->
                    <h2>Tambah Info Pengumuman</h2>
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
                <div class="modal-body scroll-y mx-5 mx-xl-15 my-7">
                    <form id="kt_modal_new_card_form" class="form" method="post" action="/datapengumuman/simpaninfo">
                        @csrf

                        <div class="row mb-5">
                            <div class="col-md-12 fv-row">
                                <!--end::Label-->
                                <label class="required fs-5 fw-bold mb-2">Penerima</label>
                                <!--begin::Select-->
{{--                                <select required name="penerima" id="penerima" class="form-select form-select-solid">--}}
{{--                                    <option value="" disabled selected>Penerima</option>--}}
{{--                                    @foreach($penerima as $data)--}}
{{--                                        <option value="{{$data->idhakakses}}">{{$data->nama_akses}}</option>--}}
{{--                                    @endforeach--}}
{{--                                </select>--}}

                                <select class="form-control select2" id="kt_select2_3" name="penerima[]" multiple="multiple">
                                    @foreach($penerima as $data)--}}
                                        <option value="{{$data->idhakakses}}">{{$data->nama_akses}}</option>
                                    @endforeach

                                </select>
                                <!--end::Select-->
                            </div>

                        </div>

                        <div class="row mb-5">
                            <div class="col-md-12 fv-row">
                                <label class="required fs-5 fw-bold mb-2">Judul Pengumuman</label>
                                <!--begin::Select-->
                                <input class="form-control" type="text" required name="judul"  />
                                <!--end::Select-->
                            </div>
                        </div>

                        <div class="row mb-5">
                            <div class="col-md-6 fv-row">
                                <!--end::Label-->
                                <label class="required fs-5 fw-bold mb-2">Tanggal Publikasi</label>
                                <!--begin::Select-->
                                <input class="form-control tgp" type="datetime-local" required name="tglpublish" id="example-datetime-local-input" />
                                <!--end::Select-->
                            </div>
                            <div class="col-md-6 fv-row">
                                <!--end::Label-->
                                <label class="required fs-5 fw-bold mb-2">Tanggal Berakhir</label>
                                <!--begin::Select-->
                                <input class="form-control tgc" type="datetime-local" required name="tglclose" id="example-datetime-local-input" />
                                <!--end::Select-->
                            </div>

                        </div>

                        <!--begin::Input group-->
                            <div class="row mb-5">
                                <div class="col-md-12 fv-row">
                                    <textarea id="summernotex" name="editordata"></textarea>
                                </div>
                            </div>





                            <div class="row mb-5" style="padding-top: 10px" >

                                <div style="text-align: right">
                                    <button type="submit" onclick="loadinginfo()" id="buttonpaket" class="btn btn-primary">
                                        <span class="indicator-label">Simpan</span>
                                    </button>
                                </div>

                            </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <div class="modal fade" id="modalpengumuman" tabindex="-1" aria-hidden="true">
        <!--begin::Modal dialog-->
        <div class="modal-dialog modal-dialog-centered mw-1000px">
            <!--begin::Modal content-->
            <div class="modal-content">
                <!--begin::Modal header-->

                <!--end::Modal header-->
                <!--begin::Modal body-->
                <div class="modal-body scroll-y mx-5 mx-xl-15 my-7">

                    <div class="row mb-5">
                        <div class="col-md-12 fv-row">
                            <textarea id="summernotez" name="editordata"></textarea>
                        </div>
                    </div>

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
@push('lib-js')
<script>
function loadinginfo() {

            var paket = $('#summernotex').val()
            var ta = $('.tgc').val()
            var tgp = $('.tgp').val()
            var tgb = $('#penerima').val()

            if(paket != '' && ta != '' && tgp != '' && tgb != '') {
                $('#buttonpaket').html('<span class="spinner-border spinner-border-sm mr-2" role="status" aria-hidden="true"></span> Loading...');
            }


        }

        function openpengumuman(data) {
//console.log(data);
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type:"POST",
                url: "/datapengumuman/isipengumuman",
                data: { id: data },
                //dataType: 'json',
                success: function(response){

                     $('#modalpengumuman').modal('show')
                   //  $("#isiinfo").html(response);
                   // $('#summernotez').summernote('editor.pasteHTML', response);
                    $('#summernotez').summernote('code', response);
                },
                error:function(response){

                    Swal.fire({
                        type: 'error',
                        title: 'Oops...',
                        text: 'Gagal Terhubung!',

                    });

                    console.log(response);
                }
            });



        }
</script>
@endpush
@push('js')
@endpush
