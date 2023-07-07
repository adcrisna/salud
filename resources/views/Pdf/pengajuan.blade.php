<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Surat Pengajuan Kegiatan Salud</title>
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
</style>

<body>
    <div>
        <div>
            <img class="logo" src="{{ public_path('logo/') . $sekolah->logo }}" alt="logo" width="15%"
                height="10%">
        </div>
        <p class="text-center jarak" style="font-size: 16px"><b>Surat Pengajuan Kegiatan Salud <br>
                {{ $sekolah->name }}</b></p>
        <p class="text-center" style="font-size: 11px">{{ $sekolah->alamat }} <br>Email: {{ $sekolah->email }},
            Telp. {{ $sekolah->telepon }}</p>
    </div>
    <hr>
    <br>
    <br>
    <p style="font-size: 14px">
        Nomor : {{ $pengajuan->no_surat }} <br>
        Lampiran : <br>
        Perihal : {{ $pengajuan->perihal }}
    </p>
    <br>
    <p style="font-size: 14px">
        Kepada Yth, <br>
        Kepala Dinas Perhubungan Kota Cirebon <br>
        Di Cirebon
    </p>
    <p style="font-size: 14px">
        Dengan Hormat, <br> <br>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Dalam rangka mengembangkan dan memperkaya wawasan
        anak {{ $sekolah->name }} khususnya
        dalam hal kesadaran hal berlalu lintas, kami bermaksud untuk memohon ijin untuk mengikuti kegiatan SALUD (Sadar
        Lalu Lintas Anak Usia Dini), dengan rincian kegiatan sebagai berikut :
    </p>
    <p style="font-size: 14px">
        Hari, Tanggal &nbsp;&nbsp;&nbsp;: &nbsp;&nbsp;{{ date('d-m-Y', strtotime($pengajuan->waktu_pengajuan)) }}<br>
        Waktu &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: &nbsp;
        {{ date('H:i', strtotime($pengajuan->waktu_pengajuan)) }} - Selesai<br>
        Jumlah Peserta &nbsp;: &nbsp;&nbsp;{{ $pengajuan->jumlah_siswa }} Siswa
    </p>
    <br>
    <p style="font-size: 14px">
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Demikian surat permohonan ijin yang kami ajukan,
        atas perhatian dan kerjsama Bapak/Ibu kami sampaikan terima kasih.
    </p>
    <br>
    <p style="font-size: 14px" class="ttd">
        Cirebon, {{ Date('d-M-Y') }} <br>
        Kepala {{ $sekolah->name }} <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <u>{{ $pengajuan->kepala_sekolah }}</u><br>
        {{ $pengajuan->nip }}
    </p>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
    </script>
</body>

</html>
