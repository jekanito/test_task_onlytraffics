@push('styles')
    <link rel="stylesheet" href="{{asset('/adminlte_3/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('/adminlte_3/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('/adminlte_3/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
@endpush

@push('scripts')
    <script src="{{asset('/adminlte_3/plugins/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('/adminlte_3/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
    <script src="{{asset('/adminlte_3/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
    <script src="{{asset('/adminlte_3/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
    <script src="{{asset('/adminlte_3/plugins/datatables-buttons/js/dataTables.buttons.min.js')}}"></script>
    <script src="{{asset('/adminlte_3/plugins/datatables-buttons/js/buttons.bootstrap4.min.js')}}"></script>

    <!-- Page specific script -->
    <script src="{{asset('/js/datatable.js')}}"></script>
@endpush
