<!DOCTYPE html>
<html lang="en">

<head>
    @include('backend.includes.header')
    @include('backend.includes.css')
</head>

<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
    <div class="wrapper">
        <!-- Navbar -->
        @include('backend.includes.top')
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->

        @include('backend.includes.nav')
        <!-- Content Wrapper. Contains page content -->

        <!-- /.content-wrapper -->
        @yield('adminbodycontent')

        <!-- Main Footer -->
        @include('backend.includes.footer')

    </div>
    <!-- ./wrapper -->

    <!-- REQUIRED SCRIPTS -->
    @include('backend.includes.script')
</body>

</html>