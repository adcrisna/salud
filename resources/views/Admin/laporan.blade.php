<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Data Laporan Jadwal Cirtos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<style>
    .logo {
        float: left;
    }

    .jarak {
        line-height: 1.em;
    }

    hr {
        border: 1px solid rgb(0, 0, 0);
    }

    .ttd {
        float: right;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        border-spacing: 0;
        margin-bottom: 5px;
    }

    table th {
        padding: 5px;
        /* background: #EEEEEE; */
        text-align: center;
        border-bottom: 1px solid black;
        border-top: 1px solid black;
        border-left: 1px solid black;
        border-right: 1px solid black;
    }

    table td {
        padding: 10px;
        /* background: #EEEEEE; */
        text-align: center;
        border-bottom: 1px solid black;
    }

    table th {
        white-space: nowrap;
        font-weight: normal;
        border-bottom: 1px solid black;
        border-top: 1px solid black;
        border-left: 1px solid black;
        border-right: 1px solid black;
    }

    table td {
        text-align: center;
        border: 1px solid black;
        border-top: 1px solid black;
        border-left: 1px solid black;
        border-right: 1px solid black;
    }

    table tbody tr:last-child th {
        border: 1px solid black;
        border-top: 1px solid black;
        border-left: 1px solid black;
        border-right: 1px solid black;
    }

    table tfoot th {
        padding: 5px 5px;
        background: #FFFFFF;
        border-bottom: 1px solid black;
        border-top: 1px solid black;
        border-left: 1px solid black;
        border-right: 1px solid black;
        font-size: 1.2em;
        white-space: nowrap;
    }

    table tfoot tr:first-child th {
        border-top: 1px solid black;
        border-top: 1px solid black;
        border-left: 1px solid black;
        border-right: 1px solid black;

    }

    table tfoot tr:last-child th {
        color: #ffffff;
        background-color: #ffffff;
        /*font-size: 1.5em;*/
        /* border-top: 1px solid #57B223; */

    }

    table tfoot tr th:first-child {
        border: 1px solid black;
        border-top: 1px solid black;
        border-left: 1px solid black;
        border-right: 1px solid black;
    }
</style>

<body>
    <div>
        <div>
            <img class="logo" src="{{ public_path('logo/') . $sekolah->logo }}" alt="logo" width="15%"
                height="10%">
        </div>
        <p class="text-center jarak" style="font-size: 16px"><b>Data Laporan Jadwal Cirtos<br>
                {{ $sekolah->name }}</b></p>
        <p class="text-center" style="font-size: 11px">{{ $sekolah->alamat }} <br>Email: {{ $sekolah->email }},
            Telp. {{ $sekolah->telepon }}</p>
    </div>
    <hr>
    <br>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Jadwal</th>
                <th>Sekolah</th>
                <th>Alamat</th>
                <th>No Telepon</th>
                <th>Jumlah Siswa</th>
        </thead>
        <tbody>
            @foreach ($jadwal as $value)
                <tr>
                    <td>{{ @$value->id }}</td>
                    <td>{{ @$value->waktu_penjadwalan }}</td>
                    <td>{{ @$value->Sekolah->name }}</td>
                    <td>{{ @$value->Sekolah->alamat }}</td>
                    <td>{{ @$value->Sekolah->telepon }}</td>
                    <td>{{ @$value->jumlah_siswa }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <br>
    <p style="font-size: 14px" class="ttd">
        Cirebon, {{ Date('d-M-Y') }} <br>
        Kepala {{ $sekolah->name }} <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <u>Muhamad Ade Crisna</u><br>
        2018102051
    </p>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
    </script>
</body>

</html>
