@extends('layouts.sekolah')
@section('css')
    <link rel="stylesheet" href="{{ asset('adminlte/plugins/datatables/dataTables.bootstrap.css') }}">
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
            <li><a href="{{ route('sekolah.home') }}"><i class="fa fa-home"></i> Home</a></li>
            <li class="active">Data Pengajuan</li>
        </ol>
        <br />
    </section>
    <section class="content">
        @if (\Session::has('msg_success'))
            <h5>
                <div class="alert alert-info">
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
                <div class="box box-danger">
                    <div class="box-header">
                        <h3 class="box-title">Data Pengajuan</h3>
                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-info btn-xs" data-toggle="modal"
                                data-target="#modal-form-tambah-pengajuan"><i class="fa fa-plus"> Tambah Data
                                </i></button>
                        </div>
                    </div>
                    <div class="box-body table-responsive">
                        <table class="table table-bordered table-striped" id="data-pengajuan">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Waktu Pengajuan</th>
                                    <th>Sekolah</th>
                                    <th>Jumlah Siswa</th>
                                    <th>No Surat</th>
                                    <th>Perihal</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach (@$pengajuan as $key => $value)
                                    <tr>
                                        <td>{{ @$value->id }}</td>
                                        <td>{{ @$value->created_at }}</td>
                                        <td>{{ @$value->Sekolah->name }}</td>
                                        <td>{{ @$value->jumlah_siswa }}</td>
                                        <td>{{ @$value->no_surat }}</td>
                                        <td>{{ @$value->perihal }}</td>
                                        <td>{{ @$value->status }}</td>
                                        <td>
                                            <a href="{{ route('sekolah.pdfPengajuan', $value->id) }}"
                                                class="btn btn-xs btn-warning" target="_blank"><i class="fa fa-download">
                                                    View</i></a> &nbsp;
                                            @if ($value->status == null)
                                                <button class="btn btn-xs btn-success btn-edit-pengajuan"><i
                                                        class="fa fa-send">
                                                        Pengajuan</i></button> &nbsp;
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="modal fade" id="modal-form-tambah-pengajuan" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Form Pengajuan</h4>
                </div>
                <div class="modal-body">
                    <form action="{{ route('sekolah.addPengajuan') }}" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="form-group has-feedback">
                            <input type="hidden" name="id" class="form-control" value="{{ $sekolah->id }}" readonly>
                        </div>
                        <div class="form-group has-feedback">
                            <label>Nama Sekolah:</label>
                            <input type="text" name="name" class="form-control" value="{{ $sekolah->name }}"
                                readonly>
                        </div>
                        <div class="form-group has-feedback">
                            <label>Jumlah Siswa :</label>
                            <input type="number" min="1" max="30" name="jumlahSiswa" class="form-control"
                                placeholder="Jumlah Siswa" required>
                        </div>
                        <div class="form-group has-feedback">
                            <label>No Surat :</label>
                            <input type="text" name="surat" class="form-control" placeholder="No Surat" required>
                        </div>
                        {{-- <div class="form-group has-feedback">
                            <label>Perihal :</label>
                            <textarea name="perihal" id="perihal" class="form-control" cols="10" rows="5"></textarea>
                        </div> --}}
                        <div class="form-group has-feedback">
                            <label>Kepala Sekolah :</label>
                            <input type="text" name="kepalaSekolah" class="form-control"
                                placeholder="Nama Kepala Sekolah" required>
                        </div>
                        <div class="form-group has-feedback">
                            <label>NIP Kepala Sekolah :</label>
                            <input type="text" name="nip" class="form-control" placeholder="NIP Kepala Sekolah"
                                required>
                        </div>
                        <div class="row">
                            <div class="col-xs-4 col-xs-offset-8">
                                <button type="submit" class="btn btn-primary btn-block btn-flat">Simpan</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="modal-form-edit-pengajuan" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Form Upload Pengajuan</h4>
                </div>
                <div class="modal-body">
                    <form action="{{ route('sekolah.sendPengajuan') }}" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="form-group has-feedback">
                            <input type="hidden" name="id" readonly class="form-control" placeholder="ID" required>
                        </div>
                        <div class="form-group has-feedback">
                            <label>Surat Pengajuan</label>
                            <input type="file" class="form-control" name="lampiran" required>
                        </div>
                        <div class="row">
                            <div class="col-xs-4 col-xs-offset-8">
                                <button type="submit" class="btn btn-primary btn-block btn-flat">Kirim</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('javascript')
    <script src="{{ asset('adminlte/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('adminlte/plugins/datatables/dataTables.bootstrap.min.js') }}"></script>
    <script type="text/javascript">
        var table = $('#data-pengajuan').DataTable();

        $('#data-pengajuan').on('click', '.btn-edit-pengajuan', function() {
            row = table.row($(this).closest('tr')).data();
            console.log(row);
            $('input[name=id]').val(row[0]);
            $('#modal-form-edit-pengajuan').modal('show');
        });

        $(document).ready(function() {
            $('.zoom').hover(function() {
                $(this).addClass('transisi');
            }, function() {
                $(this).removeClass('transisi');
            });
        });
    </script>
@endsection
