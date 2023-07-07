@extends('layouts.sekolah')
@section('css')
    <link rel="stylesheet" href="{{ asset('adminlte/plugins/morris/morris.css') }}">
    <link rel="stylesheet" href="{{ asset('adminlte/dist/css/AdminLTE.min.css') }}">
@endsection

@section('content')
    <section class="content-header">
        <ol class="breadcrumb">
            <li><a href="{{ route('sekolah.home') }}"><i class="fa fa-home"></i> Home</a></li>
        </ol>
    </section>
    <br>
    <br>
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <!-- Box Comment -->
                <div class="box box-widget">
                    <div class="box-header with-border">
                        <div class="user-block">
                            <img class="img-circle" src="{{ asset('logo_dishub.png') }}" alt="User Image">
                            <span class="username"><a href="#">Dinas Perhubungan Kota Cirebon</a></span>
                            <span class="description">Shared publicly</span>
                        </div>
                        <!-- /.user-block -->
                        <div class="box-tools">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i
                                    class="fa fa-minus"></i>
                            </button>
                        </div>
                        <!-- /.box-tools -->
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <img class="img-responsive pad" src="{{ asset('cirtos.jpg') }}" alt="Photo">

                        <p>I took this photo this morning. What do you guys think? Lorem ipsum dolor sit amet consectetur
                            adipisicing elit. Soluta debitis officiis corporis voluptatum assumenda, incidunt ipsa a non
                            corrupti vero eligendi quis expedita. Magnam, iusto accusamus itaque veritatis blanditiis
                            placeat! Lorem ipsum dolor sit amet consectetur adipisicing elit. Eius fuga rem repellat sequi
                            neque nisi? Earum quaerat voluptatem consequatur corporis dignissimos repudiandae doloribus
                            quibusdam dicta. Ratione magni perspiciatis vel exercitationem? Lorem ipsum dolor sit amet
                            consectetur adipisicing elit. Natus totam laboriosam ea molestias porro. Veniam reprehenderit
                            accusamus fugit maiores natus architecto repudiandae similique ipsa, incidunt modi adipisci
                            atque voluptates possimus.</p>
                        {{-- <button type="button" class="btn btn-default btn-xs"><i class="fa fa-share"></i> Share</button>
                        <button type="button" class="btn btn-default btn-xs"><i class="fa fa-thumbs-o-up"></i>
                            Like</button>
                        <span class="pull-right text-muted">127 likes - 3 comments</span> --}}
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('javascript')
    <script src="{{ asset('adminlte/plugins/morris/morris.min.js') }}"></script>
    <script src="{{ asset('adminlte/plugins/raphael/raphael-min.js') }}"></script>
@endsection
