<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="{{ public_path('foto/banyuasin.png') }}" rel="shortcut icon">
    <title>Laporan Pengajuan User</title>
    <style type="text/css">
        body {
            font-family: Arial, sans-serif;
        }

        .kop-surat {
            text-align: center;
            margin-bottom: 20px;
            padding: 5px;
        }

        .kop-table {
            margin: 0 auto;
            border-collapse: collapse;
        }

        .kop-table img {
            padding-right: 15px;
            max-width: 100px;
            max-height: 110px;
        }

        .kop-table th,
        .kop-table td {
            padding: 0;
            text-align: center;
        }

        .garis-bawah-tebal {
            width: 100%;
            border-bottom: 3px solid #000;
            margin: 0 auto;
            margin-bottom: 1px;
        }

        .garis-bawah-tipis {
            width: 100%;
            margin: 0 auto;
            border-bottom: 1px solid #000;
        }

        table tr td,
        table tr th {
            font-size: 7pt;
            text-align: center;
        }
    </style>
</head>

<body>
    <div class="kop-surat">
        <table class="kop-table">
            <tr>
                <td rowspan="3"><img src="{{public_path('foto')}}/logo_dinas.png" alt="logo kop" srcset="">
                </td>
                <td style="font-size: 16px; font-weight: bold;">PEMERINTAH KABUPATEN OGAN ILIR</td>
            </tr>
            <tr>
                <td style="font-size: 20px; font-weight: bold;">DINAS PERUMAHAN RAKYAT DAN KAWASAN <br> PERMUKIMAN SERTA PERTANAHAN
                </td>
            </tr>
            <tr>
                <td style="font-size: 10px;">Alamat : Komplek Perkantoran Terpadu Tanjung Senai Km.38 Indralaya Kode Pos 30662</td>
            </tr>

        </table>
        <div class="garis-bawah-tebal"></div>
        <div class="garis-bawah-tipis"></div>
    </div>
    <center>
        <h5>LAPORAN REKAPITULASI DATA PENGEMBANG DAN DATA PERUMAHAN</h4>
    </center>
    <br>
@foreach ($data as $item)
    <p>Periode &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: {{ $item->tanggal_masuk }} - {{ $item->persetujuan->pengesahan->updated_at }}</p>
    <br>
    <table class='table table-bordered'>
        <thead>
            <tr>
                <th rowspan="2" class="txt-center">No Registrasi</th>
                <th rowspan="2">Tgl Masuk</th>
                <th rowspan="2">Tgl Selesai</th>
                <th colspan="6">Pengembang</th>
                <th colspan="6">Perumahan</th>
            </tr>
            <tr>
                <th>Nama</th>
                <th>Perencana</th>
                <th>Alamat</th>
                <th>Asosiasi</th>
                <th>Kontak</th>
                <th>Email</th>
                <th>Nama</th>
                <th>Alamat</th>
                <th>Tipe</th>
                <th>Jumlah</th>
                <th>Koordinat Latitude</th>
                <th>Koordinat Longitude</th>
            </tr>
        </thead>
        <tbody>

                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->tanggal_masuk }}</td>
                        <td>{{ $item->persetujuan->pengesahan->updated_at }}</td>
                        <td>{{ $item->user->name }}</td>
                        <td>{{ $item->user->perencana }}</td>
                        <td>{{ $item->user->alamat}}</td>
                        <td>{{ $item->user->asosiasi}}</td>
                        <td>{{ $item->user->kontak }}</td>
                        <td>{{ $item->user->email }}</td>
                        <td>{{ $item->nama_perumahan }}</td>
                        <td>{{ $item->alamat }}</td>
                        <td>{{ $item->tipe }}</td>
                        <td>{{ $item->Jumlah }}</td>
                        <td>{{ $item->latitude }}</td>
                        <td>{{ $item->longitude }}</td>
                    </tr>
                    @endforeach
        </tbody>
    </table>

</body>

</html>



