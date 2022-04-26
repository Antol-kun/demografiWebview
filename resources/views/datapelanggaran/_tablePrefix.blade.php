<script>
    $(document).ready(function () {
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
    }
</script>