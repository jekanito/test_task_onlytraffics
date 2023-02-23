$(function () {
    $('#example2').DataTable({
        "order": [[0, 'desc']],
        "paging": true,
        "lengthChange": false,
        "searching": false,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,
    });
});
