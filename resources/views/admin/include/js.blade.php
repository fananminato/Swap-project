<script src="{{ asset('admin_assets/admin_css/plugins/jQuery/jquery-2.2.3.min.js') }}"></script>
<script src="{{ asset('admin_assets/admin_css/bootstrap/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('admin_assets/admin_css/dist/js/app.min.js') }}"></script>
<script src="{{ asset('admin_assets/admin_css/plugins/datepicker/bootstrap-datepicker.js') }}"></script>
<script src="{{ asset('admin_assets/admin_css/plugins/iCheck/icheck.min.js') }}"></script>
<script src="{{ asset('admin_assets/admin_css/bower_components/fastclick/lib/fastclick.js') }}"></script>
<script src="{{ asset('admin_assets/admin_css/plugins/slimScroll/jquery.slimscroll.js') }}"></script>
<script src="{{ asset('admin_assets/admin_css/plugins/gritter/js/jquery.gritter.min.js') }}"></script>

<script src="{{ asset('admin_assets/admin_css/plugins/datatables/media/js/jquery.dataTables.min.js') }}">
</script>
<script src="{{ asset('admin_assets/admin_css/plugins/datatables/3/dataTables.bootstrap.min.js') }}"></script>
<script src="{{ asset('admin_assets/admin_css/plugins/datatables/media/js/jquery.dataTables.min.js') }}">
</script>
<script src="{{ asset('admin_assets/admin_css/plugins/datatables/3/dataTables.bootstrap.min.js') }}"></script>
@yield('scripts')

<!--End Of Body Scripts-->
{{-- <script>
    $(document).ready(function() {
        var allTable = $('#DataTable').DataTable({
            "bPaginate": true,
            "bLengthChange": false,
            "bFilter": true,
            "bInfo": true,
            "bAutoWidth": false,
        })
    });
</script> --}}
<script>
    $(document).ready(function() {
        // var allTable = $('table').DataTable({
        //     "bPaginate": true,
        //     "bLengthChange": false,
        //     "bFilter": true,
        //     "bInfo": true,
        //     "bsearch": true,
        //     "bAutoWidth": false,


        // });

        $('#date').datepicker({
            format: 'yyyy-mm-dd',
            todayHighlight: true,
            showTodayButton: true,
            autoclose: true,
            clearBtn: true,
            showClose: true,
        });

        $('#close_date').datepicker({
			format: 'yyyy-mm-dd',
			todayHighlight: true,
			showTodayButton: true,
			autoclose: true,
			clearBtn: true,
			showClose: true,
		});


        $('input[type="checkbox"].flat-blue, input[type="radio"].flat-blue').iCheck({
            checkboxClass: 'icheckbox_flat-blue',
            radioClass: 'iradio_flat-blue'
        })

    });
</script>

@if (Session::has('msg'))
    <script>
        $(document).ready(function() {
            $.gritter.add({
                title: 'Success!',
                text: '{{ ucwords(session('msg')) }}<br>Please click X to dismiss this notification.',
                class_name: "gritter-success",

            });
        });
    </script>
@endif

@if (Session::has('emsg'))
    <script>
        $(document).ready(function() {
            $.gritter.add({
                title: 'Error!',
                text: '{{ ucwords(session('emsg')) }}<br>Please click X to dismiss this notification.',
                class_name: "gritter-danger",
            });
        });
    </script>
@endif
@yield('menucustomescripts')
@yield('page_script')
@yield('customescripts')
