<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8" />
	<title>{{ $title ?? 'Dashboard' }} | {{ $settings['app_name'] ?? env('APP_NAME') }}</title>
	<meta name="csrf-token" content="{{ csrf_token() }}">

	<meta name="viewport" content="width=device-width, initial-scale=1" />

	<!--begin::Fonts-->
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
	<!--end::Fonts-->
	<!--begin::Global Stylesheets Bundle(used by all pages)-->
	<link href="{{ asset('theme2/plugins/global/plugins.bundle.css') }}" rel="stylesheet" type="text/css" />
	<link href="{{ asset('theme2/css/style.bundle.css') }}" rel="stylesheet" type="text/css" />
	<!--end::Global Stylesheets Bundle-->
	<link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">
	<link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet">
	<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
	<link rel="stylesheet"
		href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">

	<style>
		.logo2 {
			vertical-align: middle;
			width: 100px;
			height: 100px;
			border-radius: 50%;
		}
	</style>
	@if (request()->segment(1) != 'demografi')
		<style>
			#kt_header_nav {
				width: 100%;
				justify-content: center;
			}
		</style>
	@endif
	@yield('css')
	@stack('lib-css')
</head>
<!--end::Head-->
<!--begin::Body-->

<body id="kt_body"
	class="header-fixed header-tablet-and-mobile-fixed toolbar-enabled toolbar-fixed toolbar-tablet-and-mobile-fixed aside-enabled aside-fixed"
	style="--kt-toolbar-height:55px;--kt-toolbar-height-tablet-and-mobile:55px">
	<!--begin::Main-->
	<!--begin::Root-->
	@include('sweetalert::alert')
	<div class="container">
	@yield('content')
	</div>
	<!--end::Root-->
	<!--begin::Scrolltop-->
	<div id="kt_scrolltop" class="scrolltop" data-kt-scrolltop="true">
		<!--begin::Svg Icon | path: icons/duotone/Navigation/Up-2.svg-->
		<span class="svg-icon">
			<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
				height="24px" viewBox="0 0 24 24" version="1.1">
				<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
					<polygon points="0 0 24 0 24 24 0 24" />
					<rect fill="#000000" opacity="0.5" x="11" y="10" width="2" height="10" rx="1" />
					<path
						d="M6.70710678,12.7071068 C6.31658249,13.0976311 5.68341751,13.0976311 5.29289322,12.7071068 C4.90236893,12.3165825 4.90236893,11.6834175 5.29289322,11.2928932 L11.2928932,5.29289322 C11.6714722,4.91431428 12.2810586,4.90106866 12.6757246,5.26284586 L18.6757246,10.7628459 C19.0828436,11.1360383 19.1103465,11.7686056 18.7371541,12.1757246 C18.3639617,12.5828436 17.7313944,12.6103465 17.3242754,12.2371541 L12.0300757,7.38413782 L6.70710678,12.7071068 Z"
						fill="#000000" fill-rule="nonzero" />
				</g>
			</svg>
		</span>
		<!--end::Svg Icon-->
	</div>
	<!--end::Main-->
	<!--begin::Javascript-->

	<!--begin::Javascript-->
	<!--begin::Global Javascript Bundle(used by all pages)-->
	<script src="{{ asset('theme2/plugins/global/plugins.bundle.js') }}"></script>
	<script src="{{ asset('theme2/js/scripts.bundle.js') }}"></script>
	<script src="{{asset('js/custom.js')}}"></script>
	<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
	<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/chart.js@3.8.0/dist/chart.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
	<!--end::Global Javascript Bundle-->
	<!--end::Javascript-->
	@stack('lib-js')


	@if ($message = Session::get('success'))
	<script type="text/javascript">
		Swal.fire({
            type: 'success',
            title: 'Berhasil!',
            text: ' {{ $message }}',

        });

	</script>
	@endif

	@if ($message = Session::get('warning'))
	<script type="text/javascript">
		Swal.fire({
            type: 'error',
            title: 'Ooppss!',
            text: ' {{ $message }}',

        });
	</script>
	@endif


	<script>
		$(document).ready(function () {
				$('.alldtb').DataTable({
					// scrollY: '55vh',
					// scrollCollapse: true,
				});
				$('#cok').dataTable({
					scrollY: '55vh',
        			scrollCollapse: true,
				});
				$('#myTab a').on('click', function (event) {
					event.preventDefault()
					$(this).tab('show')
				});

				// prefix untuk setting siswa
				$('#tabeldatasetting').dataTable({
					"ordering": false
				});
				$('#tabeldatasettings').dataTable({
					"ordering": false
				});
				// end setting siswa

				$('#tabeldata').dataTable();
				$('#tabeldatas').dataTable();
                // initToast('Berhasil', 'Dokumen berhasil dihapus!', 'success', '11 menit yang lalu')
                $('.select2').select2({
                    placeholder: 'Pilih data'
                });
                 $('#limit').DataTable({
		            responsive: true,
		            'iDisplayLength': 100,
		        });

                $('#summernotex').summernote({
            placeholder: 'Isi Informasi Pengumuman Disini',
            tabsize: 2,
            height: 300,
            fontNames: ['Arial', 'Arial Black', 'Comic Sans MS', 'Courier New'],
            toolbar: [
                ['style', ['style']],
                ['font', ['bold', 'underline', 'clear']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['table', ['table']],
                ['insert', ['link', 'picture', 'video']],
                ['view', ['fullscreen', 'codeview', 'help']]
            ]
        });

        $('#summernotez').summernote({
            // placeholder: 'Isi Informasi Pengumuman Disini',
            tabsize: 2,
            height: 300,
            toolbar: [
                ['style', ['style']],
                ['font', ['bold', 'underline', 'clear']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['table', ['table']],
                ['insert', ['link', 'picture', 'video']],
                ['view', ['fullscreen', 'codeview', 'help']]
            ]
        });
        // $('#summernoteg').summernote("disabled");
        $('#summernoteg').summernote({
            toolbar: [
                ['para', ['ul']]
            ],
            focus: true
        });
        
            })

            var rupiah = document.getElementById('rupiah');

	        rupiah.addEventListener('keyup', function(e){
	            rupiah.value = formatRupiah(this.value, 'Rp.');
	        });

	        /* Fungsi formatRupiah */
	        function formatRupiah(angka, prefix){
	            var number_string = angka.replace(/[^,\d]/g, '').toString(),
	            split   = number_string.split(','),
	            sisa    = split[0].length % 3,
	            rupiah  = split[0].substr(0, sisa),
	            ribuan  = split[0].substr(sisa).match(/\d{3}/gi);
	 
	            if(ribuan){
	                separator = sisa ? '.' : '';
	                rupiah += separator + ribuan.join('.');
	            }
	 
	            rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
	            return prefix == undefined ? rupiah : (rupiah ? 'Rp.' + rupiah : '');
	        }

            function initToast(title, message, status, time) {
                $.toast({
                    type: status,
                    title: title,
                    subtitle: time,
                    content: message,
                    delay: 5000,
                });
            }

            async function transAjax(data) {
                html = null;
                data.headers = {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
                await $.ajax(data).done(function(res) {
                    html = res;
                })
                .fail(function() {
                    return false;
                })
                return html
            }

	</script>
	@stack('js')
</body>
<!--end::Body-->

</html>