@extends('layouts.admin')
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
            <li><a href="{{ route('admin.home') }}"><i class="fa fa-home"></i> Home</a></li>
            <li class="active">Data Jadwal</li>
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
                        <h3 class="box-title">Data Jadwal</h3>
                        <div class="box-tools pull-right">
                            <button class="btn btn-sm btn-warning" data-toggle="modal" data-target="#exportModal"><i
                                    class="fa fa-download"></i>
                                Laporan</button>
                        </div>
                    </div>
                    <div class="box-body table-responsive">
                        <table class="table table-bordered table-striped" id="data-jadwal">
                            <thead>
                                <tr>

                                    <th>ID</th>
                                    <th>Jadwal</th>
                                    <th>Sekolah</th>
                                    <th>Alamat</th>
                                    <th>No Telepon</th>
                                    <th>Jumlah Siswa</th>
                                    {{-- <th>Aksi</th> --}}
                                </tr>
                            </thead>
                            <tbody>
                                @foreach (@$jadwal as $key => $value)
                                    <tr>
                                        <td>{{ @$value->id }}</td>
                                        <td>{{ @$value->waktu_penjadwalan }}</td>
                                        <td>{{ @$value->Sekolah->name }}</td>
                                        <td>{{ @$value->Sekolah->alamat }}</td>
                                        <td>{{ @$value->Sekolah->telepon }}</td>
                                        <td>{{ @$value->jumlah_siswa }}</td>
                                        {{-- <td>
                                            <button class="btn btn-xs btn-warning btn-edit-jadwal"><i class="fa fa-edit">
                                                    Update</i></button> &nbsp;
                                        </td> --}}
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="modal fade" id="modal-form-edit-jadwal" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Form Persetujuan</h4>
                </div>
                <div class="modal-body">
                    <form action="{{ route('admin.updateJadwal') }}" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="form-group has-feedback">
                            <input type="text" name="id" readonly class="form-control" placeholder="ID" required>
                        </div>
                        <div class="form-group has-feedback">
                            <label>Persetujuan</label>
                            <select name="status" id="status" class="form-control">
                                <option value="">Pilih</option>
                                <option value="Diterima">Terima</option>
                                <option value="Ditolak">Tolak</option>
                            </select>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="exportModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Form Laporan Jadwal</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('admin.laporan') }}" method="post">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group has-feedback">
                            <label>Tanggal Awal</label>
                            <input type="date" name="tanggalAwal" class="form-control" required>
                        </div>
                        <div class="form-group has-feedback">
                            <label>Tanggal Akhir</label>
                            <input type="date" name="tanggalAkhir" class="form-control" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Cetak</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('javascript')
    <script src="{{ asset('adminlte/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('adminlte/plugins/datatables/dataTables.bootstrap.min.js') }}"></script>
    <script type="text/javascript">
        var table = $('#data-jadwal').DataTable();

        $('#data-jadwal').on('click', '.btn-edit-jadwal', function() {
            row = table.row($(this).closest('tr')).data();
            console.log(row);
            $('input[name=id]').val(row[0]);
            $('#modal-form-edit-jadwal').modal('show');
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
