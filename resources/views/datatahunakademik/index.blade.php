{{-- INI KITA EXTENDS ROOT VIEW YANG ADA DI FOLDER resources\views\layouts\template.blade.php --}}
@extends('layouts.template')
@push('lib-css')
@endpush
@push('css')
@endpush

@section('sub_header_action')
<!--begin::Button-->
<a href="/datatahunakademik/create" class="btn btn-sm btn-primary">Tambah {{$testVariable}}</a>
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
                        <!-- <span class="svg-icon svg-icon-1 position-absolute ms-6">
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <rect x="0" y="0" width="24" height="24"></rect>
                                    <path d="M14.2928932,16.7071068 C13.9023689,16.3165825 13.9023689,15.6834175 14.2928932,15.2928932 C14.6834175,14.9023689 15.3165825,14.9023689 15.7071068,15.2928932 L19.7071068,19.2928932 C20.0976311,19.6834175 20.0976311,20.3165825 19.7071068,20.7071068 C19.3165825,21.0976311 18.6834175,21.0976311 18.2928932,20.7071068 L14.2928932,16.7071068 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"></path>
                                    <path d="M11,16 C13.7614237,16 16,13.7614237 16,11 C16,8.23857625 13.7614237,6 11,6 C8.23857625,6 6,8.23857625 6,11 C6,13.7614237 8.23857625,16 11,16 Z M11,18 C7.13400675,18 4,14.8659932 4,11 C4,7.13400675 7.13400675,4 11,4 C14.8659932,4 18,7.13400675 18,11 C18,14.8659932 14.8659932,18 11,18 Z" fill="#000000" fill-rule="nonzero"></path>
                                </g>
                            </svg>
                        </span>
                        <input type="text" data-kt-user-table-filter="search" class="form-control form-control-solid w-250px ps-14" placeholder="Cari {{ $testVariable }}.."> -->
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
                <div id="tbltahun" class="dataTables_wrapper dt-bootstrap4 no-footer">
                    <div class="table-responsive">

                        <table id="tabeldata" class="table table-striped table-bordered data-table">
                            <thead>
                                <tr>
                                    <th width="50" style="text-align:center;">No</th>
                                    <th>Tahun</th>
                                    <th>Semester</th>
                                    <th>Status</th>
                                    <th width="100px">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $no=1; @endphp
                                @foreach($tahunakademik as $data)
                                <tr style="height: 40px">
                                    <td style="text-align:center;">{{$no++}}</td>
                                    <td>{{$data->tahunakademik}}</td>
                                    <td>{{$data->semester}}</td>
                                    <td>{{$data->statusta}}</td>
                                    <td><a href="/datatahunakademik/edit/{{base64_encode($data->idsettingtahun)}}"><i class="fa fa-edit text-warnin" style="font-size:15px;color:#009ef7;"></i></a></td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    
                    </div></div>
                <!--end::Table-->
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
      //   $(document).ready(function() {
      //    //$('#tbltahun').load("/datatahunakademik/show");
      //    var table = $('.data-table').DataTable({
      //       processing: true,
      //       serverSide: true,
      //       ajax: "/datatahunakademik/index",
      //       columns: [
      //           {data: 'DT_RowIndex', name: 'DT_RowIndex',className: "text-center"},
      //           {data: 'tahunakademik', name: 'tahunakademik'},
      //           {data: 'semester', name: 'semester'},
      //           {data: 'statusta', name: 'statusta'},
      //           {data: 'action', name: 'action', orderable: false, searchable: false},
      //       ]
      //   });
      // });
    </script>
@endpush
@push('js')
@endpush
