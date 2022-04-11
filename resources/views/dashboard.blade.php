@extends('layouts.template')
@push('lib-css')
@endpush
@push('css')
@endpush

@section('sub_header_action')
<div class="me-4">
    <!--begin::Menu-->
   
   
    <!--end::Menu-->
</div>
<!--end::Wrapper-->
<!--begin::Button-->

@endsection

@section('content')
    <div class="post d-flex flex-column-fluid" id="kt_post">
        <!--begin::Container-->
        <div id="kt_content_container" class="container">
            <!--begin::Row-->
            <div class="row gy-5 g-xl-8">
               
                <!--begin::Col-->
                <div class="col-sm-6 col-xl-4">
                    <div class="card stat-widget">
                        <div class="card-body">
                            <h5 class="card-title">Mading / Pengumuman</h5>
                            @if(count($info) > 0)
                                @foreach($info as $mading)
                                    <div class="transactions-list">
                                        <div class="tr-item">
                                            <div class="tr-company-name">
                                                <div class="tr-icon tr-card-icon tr-card-bg-info text-info">
                                                    <i data-feather="twitch"></i>
                                                </div>
                                                <div class="tr-text">
                                                    <a  href='javascript:void(0)' onclick='openpengumumanS("{{$mading->id}}")' > <h4>{{$mading->judul}}</h4></a>
                                                    <p>{{$mading->tgl_publish}}</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                        </div>
                    </div>
                </div>
                <!--end::Col-->
            </div>
            <!--end::Row-->
            
        </div>
        <!--end::Container-->
    </div>

      <div class="modal fade bd-example-modal-lg" id="modalinfo" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg  modal-dialog-centered" >
            <div class="modal-content">
                <div class="modal-header">
                    {{--                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>--}}
                </div>
                <div class="modal-body">
                    <textarea  id="summernoteg" name="editordata"></textarea>
                </div>
                <div class="modal-footer">
                </div>
            </div>
        </div>
    </div>
@endsection

@push('lib-js')
@endpush
@push('js')


    <script>
        function openpengumumanS(data) {

            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type:"POST",
                url: "{{route('isipengumumanS')}}",
                data: { id: data },
                //dataType: 'json',
                success: function(response){

                    $('#modalinfo').modal('show')
                    //  $("#isiinfo").html(response);
                    // $('#summernotez').summernote('editor.pasteHTML', response);
                    $('#summernoteg').summernote('code', response);
                    $('#summernoteg').next().find(".note-editable").attr("contenteditable", false);
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
