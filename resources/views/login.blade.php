<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>SIPAS | Dashboard</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('assets/adminLTE/plugins/fontawesome-free/css/all.min.css') }}" />
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('assets/adminLTE/css/adminlte.min.css') }}">
    <!-- overlayScrollbars -->
    <link rel="stylesheet"
        href="{{ asset('assets/adminLTE/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="{{ asset('assets/adminLTE/plugins/daterangepicker/daterangepicker.css') }}">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <link href="{{ asset('assets/img/icon.png') }}" rel="shortcut icon">
</head>

<body class="hold-transition login-page">
    <main>
        <div class="login-box">
            <div class="login-logo">
                </a><b>Sistem Informasi</b> Perpustakaan
            </div>
            <!-- /.login-logo -->
            <div class="card">
                <div class="card-body login-card-body">
                    <p class="login-box-msg">Sign in to start your session</p>
                    <form action="{{ route('login-check') }}" method="post">
                        @csrf
                        <div class="input-group mb-3">
                            <input type="text"
                                class="form-control {{ $errors->has('username') ? 'is-invalid' : '' }}"
                                placeholder="Masukkan Username" name="username" value="{{ old('username') }}">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-envelope"></span>
                                </div>
                            </div>
                            <div class="invalid-feedback">
                                @error('username')
                                    {{ $message }}
                                @enderror
                            </div>
                        </div>

                        <div class="input-group mb-3">
                            <input type="password"
                                class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}"
                                placeholder="Masukkan Password" name="password">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-lock"></span>
                                </div>
                            </div>
                            <div class="invalid-feedback">
                                @error('password')
                                    {{ $message }}
                                @enderror
                            </div>
                        </div>
                        @if (session()->has('error'))
                            <div class="alert alert-danger col-12" role="alert">
                                <strong>{{ session('error') }}</strong>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif
                        <div class="row">
                            <!-- /.col -->
                            <div class="col-12">
                                <button type="submit" class="btn btn-primary btn-block">Sign In</button>
                                <a href="{{ route('index') }}" class="btn btn-danger btn-block">Kembali</a>
                            </div>
                            <!-- /.col -->
                        </div>
                    </form>
                    <!-- /.social-auth-links -->
                </div>
                <!-- /.login-card-body -->
            </div>
        </div>
    </main>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <script src="{{ asset('assets/adminLTE/plugins/jquery/jquery.min.js') }}"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="{{ asset('assets/adminLTE/plugins/jquery-ui/jquery-ui.min.js') }}"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
        $.widget.bridge('uibutton', $.ui.button)
    </script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('assets/adminLTE/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <!-- Chart -->
    <!-- ChartJS -->
    <script src="{{ asset('assets/adminLTE/plugins/chart.js/Chart.min.js') }}"></script>
    <!-- Sparkline -->
    <script src="{{ asset('assets/adminLTE/plugins/sparklines/sparkline.js') }}"></script>
    <!-- jQuery Knob Chart -->
    <script src="{{ asset('assets/adminLTE/plugins/jquery-knob/jquery.knob.min.js') }}"></script>

    <!-- daterangepicker -->
    <script src="{{ asset('assets/adminLTE/plugins/moment/moment.min.js') }}"></script>
    <script src="{{ asset('assets/adminLTE/plugins/daterangepicker/daterangepicker.js') }}"></script>
    <!-- overlayScrollbars -->
    <script src="{{ asset('assets/adminLTE/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('assets/adminLTE/js/adminlte.js') }}"></script>

</body>

</html>
