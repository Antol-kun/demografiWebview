{{-- INI KITA EXTENDS ROOT VIEW YANG ADA DI FOLDER resources\views\layouts\template.blade.php --}}
@extends('layouts.template')
@push('lib-css')
@endpush
@push('css')
@endpush

@section('sub_header_action')
    @include('demografi.kinerjaguru.topbar')
@endsection

@section('content')
<div class="d-flex flex-column-fluid" id="kt_post">
    <!--begin::Container-->
    <div id="kt_content_container" class="container">

    </div>
    <!--end::Container-->
</div>
@endsection

@push('lib-js')
<script></script>
@endpush
@push('js')
@endpush