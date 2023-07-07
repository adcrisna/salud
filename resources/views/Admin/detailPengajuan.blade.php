@extends('layouts.admin')
@section('css')
    <link rel="stylesheet" href="{{ asset('plugins/morris/morris.css') }}">
    <link rel="stylesheet" href="{{ asset('dist/css/AdminLTE.min.css') }}">
    <style>
        img.zoom {
            width: 130px;
            height: 100px;
            -webkit-transition: all .2s ease-in-out;
            -moz-transition: all .2s ease-in-out;
            -o-transition: all .2s ease-in-out;
            -ms-transition: all .2s ease-in-out;
        }

        .transisi {
            -webkit-transform: scale(1.8);
            -moz-transform: scale(1.8);
            -o-transform: scale(1.8);
            transform: scale(1.8);
        }
    </style>
@endsection

@section('content')
    <section class="content-header">
        <ol class="breadcrumb">
            <li><a href="{{ route('admin.home') }}"><i class="fa fa-home"></i> Home</a></li>
            <li class="active">Detail</li>
        </ol>
    </section>
    <br />
    <br />
    <section class="content">
        @if (\Session::has('msg_success'))
            <h5>
                <div class="alert alert-warning">
                    {{ \Session::get('msg_success') }}
                </div>
            </h5>
        @endif
        @if (\Session::has('msg_error'))
            <h5>
                <div class="alert alert-danger">
                    {{ \Session::get('msg_error') }}
                </div>
            </h5>
        @endif
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Detail Pengajuan</h3>
                        <div class="box-tools pull-right">
                            <a href="{{ route('admin.pengajuan') }}" class="btn btn-sm btn-warning">
                                Kembali</a>
                        </div>
                    </div>
                    <div class="box-body table-responsive">
                        <table class="table table-bordered table-striped" id="data-pengajuan">
                            <thead>
                                <tr>
                                    <th style="width: 50%">Tanggal Pengajuan</th>
                                    <td> {{ $detail->updated_at }}</td>
                                </tr>
                                <tr>
                                    <th style="width: 50%">Sekolah</th>
                                    <td> {{ $detail->Sekolah->name }}</td>
                                </tr>
                                <tr>
                                    <th style="width: 50%">Alamat</th>
                                    <td> {{ $detail->Sekolah->alamat }}</td>
                                </tr>
                                <tr>
                                    <th style="width: 50%">No Telepon</th>
                                    <td> {{ $detail->Sekolah->telepon }}</td>
                                </tr>
                                <tr>
                                    <th style="width: 50%">Jumlah Siswa</th>
                                    <td> {{ $detail->jumlah_siswa }}</td>
                                </tr>
                                <tr>
                                    <th style="width: 50%">Status</th>
                                    <td>{{ $detail->status }}</td>
                                </tr>
                            </thead>
                        </table>
                        <embed type="application/pdf" src="{{ asset('lampiran/' . @$detail->lampiran) }}" width="100%"
                            height="700px"></embed>
                    </div>
                </div>
            </div>
        </div>
        <br />
    </section>
@endsection

@section('javascript')
    <script src="{{ asset('adminlte/plugins/morris/morris.min.js') }}"></script>
    <script src="{{ asset('adminlte/plugins/raphael/raphael-min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('.zoom').hover(function() {
                $(this).addClass('transisi');
            }, function() {
                $(this).removeClass('transisi');
            });
        });
    </script>
@endsection
