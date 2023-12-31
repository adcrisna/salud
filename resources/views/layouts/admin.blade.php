<!DOCTYPE html>
<html>

<head>
    <link rel="shortcut icon" href="{{ asset('logo_dishub.png') }}" type="image/x-icon" />
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>{{ $title }}</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="stylesheet" type="text/css" href="{{ asset('adminlte/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('adminlte/plugins/font-awesome/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('adminlte/plugins/ionslider/ion.rangeSlider.min.js') }}">
    <link rel="stylesheet" href="{{ asset('adminlte/dist/css/AdminLTE.min.css') }}">
    <link rel="stylesheet" href="{{ asset('adminlte/dist/css/skins/_all-skins.min.css') }}">
    @yield('css')
</head>

<body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">

        <header class="main-header">
            <a href="/admin/home" class="logo">
                <span class="logo-mini"><img src="{{ asset('logo_dishub.png') }}" alt="logo" width="10px"
                        height="20px"></span>
                <span class="logo-lg"><img src="{{ asset('logo_dishub.png') }}" alt="logo" width="75px"
                        height="35px"></span>
            </a>
            <nav class="navbar navbar-static-top">
                <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                    <span class="sr-only">Navigation</span>
                </a>
            </nav>
        </header>
        <aside class="main-sidebar control-sidebar-dark">
            <section class="sidebar">
                <ul class="sidebar-menu">
                    <li>
                        <a href="{{ route('admin.home') }}">
                            <i class="fa fa-home"></i> <span>Home</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.sekolah') }}">
                            <i class="fa fa-list-alt"></i> <span>Data Sekolah</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.pengajuan') }}">
                            <i class="fa fa-edit"></i> <span>Data Pengajuan</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.jadwal') }}">
                            <i class="fa fa-calendar"></i> <span>Data Jadwal</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.profile') }}">
                            <i class="fa fa-wrench"></i> <span>Profile</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('logout') }}">
                            <i class="fa fa-sign-out"></i> <span>Logout</span>
                        </a>
                    </li>
                </ul>
            </section>
        </aside>
        <div class="content-wrapper">
            @yield('content')
        </div>

        <footer class="main-footer">
            <div class="pull-right hidden-xs">
                <b>Build with <span class="fa fa-coffee"></span> And <span class="fa fa-heart"></b>
            </div>
            <strong>Copyright &copy; 2023 .</strong>
        </footer>
        <div class="control-sidebar-bg"></div>
    </div>
    <script src="{{ asset('adminlte/plugins/jQuery/jquery-2.2.3.min.js') }}"></script>
    <script src="{{ asset('adminlte/plugins/jQueryUI/jquery-ui.min.js') }}"></script>
    <script>
        $.widget.bridge('uibutton', $.ui.button);
    </script>
    <script src="{{ asset('adminlte/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('adminlte/plugins/slimScroll/jquery.slimscroll.min.js') }}"></script>
    <script src="{{ asset('adminlte/plugins/fastclick/fastclick.js') }}"></script>
    <script src="{{ asset('adminlte/dist/js/app.min.js') }}"></script>
    <script src="{{ asset('adminlte/dist/js/demo.js') }}"></script>
    @yield('javascript')
</body>

</html>
