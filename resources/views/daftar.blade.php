<!DOCTYPE html>
<html>

<head>
    <link rel="shortcut icon" href="trustme.png" type="image/x-icon" />
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Selamat Datang</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="stylesheet" href="{{ asset('adminlte/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('adminlte/dist/css/AdminLTE.min.css') }}">
    <link rel="stylesheet" href="{{ asset('adminlte/plugins/iCheck/square/blue.css') }}">
    <link rel="stylesheet" href="{{ asset('adminlte/plugins/morris/morris.css') }}">
    <link rel="stylesheet" href="{{ asset('adminlte/plugins/font-awesome/css/font-awesome.min.css') }}">
</head>

<body class="hold-transition login-page">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <br />
                <div class="login-logo">
                    <b>Aplikasi Salud</b> <br> Dinas Perhubungan Kota Cirebon
                    <center>
                        <img src="logo_dishub.png" width="30%" height="30%">
                    </center>
                    {{-- {{ bcrypt('password') }} --}}
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="login-box">
                    <div class="login-box-body">
                        <p class="login-box-msg">Pendaftaran Akun</p>
                        <form action="{{ route('prosesDaftar') }}" method="POST" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="form-group has-feedback">
                                <input type="text" name="name" class="form-control" placeholder="Nama Sekolah"
                                    value="{{ old('name') }}" required>
                                <span class="glyphicon glyphicon-home form-control-feedback"></span>
                            </div>
                            <div class="form-group has-feedback">
                                <input type="email" name="email" class="form-control" placeholder="Email"
                                    value="{{ old('email') }}" required>
                                <span class="glyphicon glyphicon-user form-control-feedback"></span>
                            </div>
                            <div class="form-group has-feedback">
                                <input type="password" name="password" class="form-control" placeholder="Password"
                                    required>
                                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                            </div>
                            <div class="form-group has-feedback">
                                <input type="number" name="telepon" class="form-control" placeholder="No Telepon"
                                    value="{{ old('telepon') }}" required>
                                <span class="glyphicon glyphicon-phone form-control-feedback"></span>
                            </div>
                            <div class="form-group has-feedback">
                                <textarea name="alamat" id="alamat" class="form-control" cols="3" rows="5" required></textarea>
                                <span class="glyphicon glyphicon-globe form-control-feedback"></span>
                            </div>
                            <div class="form-group has-feedback">
                                <label for="Logo">Logo</label>
                                <input type="file" name="logo" class="form-control" placeholder="Logo Sekolah"
                                    value="{{ old('logo') }}" required>
                                <span class="glyphicon glyphicon-image form-control-feedback"></span>
                            </div>
                            @if (\Session::has('msg_login'))
                                <div class="alert alert-danger">
                                    {{ \Session::get('msg_login') }}
                                </div>
                            @endif
                            @if (\Session::has('msg_success'))
                                <div class="alert alert-info">
                                    {{ \Session::get('msg_success') }}
                                </div>
                            @endif
                            <div class="row">
                                <div class="col-xs-9">
                                    <button type="submit" class="btn btn-primary btn-block btn-flat"
                                        style="width: 100px">Daftar</button>
                                </div>
                                <div class="col-xs-3">
                                    <a href="{{ route('index') }}">Login</a>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('adminlte/plugins/jQuery/jquery-2.2.3.min.js') }}"></script>
    <script src="{{ asset('adminlte/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('adminlte/plugins/iCheck/icheck.min.js') }}"></script>
    <script src="{{ asset('adminlte/plugins/morris/morris.min.js') }}"></script>
    <script src="{{ asset('adminlte/plugins/raphael/raphael-min.js') }}"></script>
    <script>
        $(function() {
            $('input').iCheck({
                checkboxClass: 'icheckbox_square-blue',
                radioClass: 'iradio_square-blue',
                increaseArea: '20%'
            });
        });
    </script>
</body>

</html>
