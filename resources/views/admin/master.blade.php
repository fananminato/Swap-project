<!DOCTYPE html>
<html>
<head>
    @include('admin.include.meta')
    @include('admin.include.css')
</head>

<body class="hold-transition skin-blue sidebar-mini fixed">
    <div class="wrapper">
        @include('admin.include.header')
        @include('admin.include.sidebar')
        <div class="content-wrapper">
            <section class="content">
                @yield('content')
            </section>
        </div>
        @include('admin.include.footer')
        <div class="control-sidebar-bg"></div>
    </div>
    @include('admin.include.js')
</body>
</html>
