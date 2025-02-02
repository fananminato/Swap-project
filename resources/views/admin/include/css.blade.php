<link rel="stylesheet" href="{{ asset('admin_assets/admin_css/bootstrap/css/bootstrap.min.css') }}">
<link rel="stylesheet" href="{{ asset('admin_assets/admin_css/bootstrap/css/bootstrap.min.css') }}">
<link rel="stylesheet" href="{{ asset('admin_assets/admin_css/bootstrap/css/custom.css') }}">
<link rel="stylesheet" href="{{ asset('admin_assets/admin_css/bootstrap/css/font-awesome.min.css') }}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
<link rel="stylesheet" href="{{ asset('admin_assets/admin_css/dist/css/AdminLTE.min.css') }}">
<link rel="stylesheet" href="{{ asset('admin_assets/admin_css/dist/css/skins/default.min.css') }}">
<link rel="stylesheet" href="{{ asset('admin_assets/admin_css/paging.css') }}">
<link rel="stylesheet" href="{{ asset('admin_assets/admin_css/plugins/iCheck/all.css') }}">
<link href="{{ asset('admin_assets/admin_css/plugins/datepicker/datepicker3.css') }}" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="{{ asset('admin_assets/admin_css/plugins/gritter/css/jquery.gritter.css') }}">

<link href="{{ asset('admin_assets/admin_css/plugins/datatables/3/dataTables.bootstrap.css') }}" rel="stylesheet" type="text/css">

@yield('style')
@yield('page_plugin_style')
<script type="text/javascript" src="{{ asset('admin_assets/ckeditor/ckeditor.js') }}"></script>
<script language="JavaScript">
    function status(location) {
        if (confirm("Are you sure to Change status for this entry?") == 1)
            document.location = location;
    }

    function hstatus(location) {
        if (confirm("Are you sure to Change Home status for this entry?") == 1)
            document.location = location;
    }

    function del(location) {
        if (confirm("Are you sure to delete the entry?") == 1)
            document.location = location;
    }
</script>
