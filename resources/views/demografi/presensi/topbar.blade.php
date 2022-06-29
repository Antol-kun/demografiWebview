<div class="d-flex align-items-center">
    <a href="{{route('demopresensi')}}" class="btn btn-sm {{request()->segment(3) == 'semua' ? 'btn-primary' : ''}} me-3">Umum</a>
    <a href="{{route('demopresensik')}}" class="btn btn-sm {{request()->segment(3) == 'kelompokkelas' ? 'btn-primary' : ''}} me-3">Kelompok Kelas</a>
</div>