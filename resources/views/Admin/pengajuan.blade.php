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

                        </div>
                    </div>
                    <div class="box-body table-responsive">
                        <table class="table table-bordered table-striped" id="data-pengajuan">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Waktu Pengajuan</th>
                                    <th>Sekolah</th>
                                    <th>Alamat</th>
                                    <th>No Telepon</th>
                                    <th>Jumlah Siswa</th>
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
                                        <td>{{ @$value->Sekolah->alamat }}</td>
                                        <td>{{ @$value->Sekolah->telepon }}</td>
                                        <td>{{ @$value->jumlah_siswa }} Siswa</td>
                                        <td>{{ @$value->status }}</td>
                                        <td>
                                            <a href="{{ route('admin.detailPengajuan', $value->id) }}"
                                                class="btn btn-xs btn-warning"><i class="fa fa-eye">
                                                    Detail</i></a> &nbsp;
                                            @if ($value->status == 'Review')
                                                <button class="btn btn-xs btn-success btn-edit-pengajuan"><i
                                                        class="fa fa-check">
                                                        Konfirmasi</i></button> &nbsp;
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
    <div class="modal fade" id="modal-form-edit-pengajuan" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Form Persetujuan</h4>
                </div>
                <div class="modal-body">
                    <form action="{{ route('admin.updatePengajuan') }}" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="form-group has-feedback">
                            <input type="hidden" name="id" readonly class="form-control" placeholder="ID" required>
                        </div>
                        <div class="form-group has-feedback">
                            <label>Persetujuan</label>
                            <select name="status" id="status" class="form-control" onchange="displayBiaya()" required>
                                <option value="">Pilih</option>
                                <option value="Diterima">Terima</option>
                                <option value="Ditolak">Tolak</option>
                            </select>
                        </div>
                        <div class="form-group has-feedback" id="tanggal" style="display: none">
                            <label>Tanggal Jadwal :</label>
                            <input type="date" name="waktuPengajuan" class="form-control">
                        </div>
                        <div class="form-group has-feedback" id="jam" style="display: none">
                            <label>Jam :</label>
                            <select name="jam" id="jam" class="form-control">
                                <option value="">Pilih</option>
                                <option value="06:00:00">06:00</option>
                                <option value="07:00:00">07:00</option>
                                <option value="08:00:00">08:00</option>
                                <option value="09:00:00">09:00</option>
                                <option value="10:00:00">10:00</option>
                                <option value="11:00:00">11:00</option>
                                <option value="12:00:00">12:00</option>
                                <option value="13:00:00">13:00</option>
                                <option value="14:00:00">14:00</option>
                                <option value="15:00:00">15:00</option>
                                <option value="16:00:00">16:00</option>
                                <option value="17:00:00">17:00</option>
                                <option value="18:00:00">18:00</option>
                            </select>
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
    <script>
        function displayBiaya() {
            const status = document.getElementById("status").value;
            console.log(status);
            if (status == 'Diterima') {
                document.querySelector('#tanggal').style.display = 'inline-block';
                document.querySelector('#jam').style.display = 'inline-block';
            } else {
                document.querySelector('#tanggal').style.display = 'none';
                document.querySelector('#jam').style.display = 'none';
            }
        }
    </script>
@endsection
