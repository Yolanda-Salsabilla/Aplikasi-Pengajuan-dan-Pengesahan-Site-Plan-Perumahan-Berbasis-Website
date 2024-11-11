<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
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

        .table1 {
            table-layout: fixed;
            word-wrap: break-word;
        }

        table tr td,
        table tr th {
            font-size: 7pt;
            text-align: center;

            vertical-align: middle; /* Ensures vertical alignment to middle */
        }

        .text-center {
            text-align: center;
        }
    </style>
</head>

<body>
    <div class="kop-surat">
        <table class="kop-table">
            <tr>
                <td rowspan="3"><img src="{{public_path('foto')}}/logo_dinas.png" alt="logo kop" srcset=""></td>
                <td style="font-size: 16px; font-weight: bold;">PEMERINTAH KABUPATEN OGAN ILIR</td>
            </tr>
            <tr>
                <td style="font-size: 20px; font-weight: bold;">DINAS PERUMAHAN RAKYAT DAN KAWASAN <br> PERMUKIMAN SERTA PERTANAHAN</td>
            </tr>
            <tr>
                <td style="font-size: 10px;">Alamat : Komplek Perkantoran Terpadu Tanjung Senai Km.38 Indralaya Kode Pos 30662</td>
            </tr>
        </table>
        <div class="garis-bawah-tebal"></div>
        <div class="garis-bawah-tipis"></div>
    </div>
    <center>
        <h5>LAPORAN REKAPITULASI DATA PENGEMBANG DAN DATA PERUMAHAN</h5>
    </center>
    <br>

    <?php
        if($startDate && $endDate) {
            $formattedStartDate = $startDate->format('d F Y');
            $formattedEndDate = $endDate->format('d F Y');
            echo "Periode : " . $formattedStartDate . " sampai " . $formattedEndDate;
        } else {
            echo "Periode :  -";
        }
    ?>

    <br><br>
    <div class="table-responsive">
        <table class='table table1 table-bordered'>
            <thead>
                <tr>
                    <th rowspan="2" class="align-middle">No</th>
                    <th rowspan="2" class="align-middle">Tgl Masuk</th>
                    <th rowspan="2" class="align-middle">Tgl Selesai</th>
                    <th colspan="7">Pengembang</th>
                    <th colspan="6">Perumahan</th>
                </tr>
                <tr>
                    <th>Perusahaan</th>
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
                    <th>Lat</th>
                    <th>Long</th>
                </tr>
                </thead>
                <tbody>
                    @foreach ($data as $item)
                    <tr>
                        <td class="text-center">{{ $item->id_pengajuans }}</td>
                        <td class="text-center">{{ $item->tanggal_masuk }}</td>
                        <td class="text-center">{{ optional($item->persetujuan->pengesahan)->updated_at }}</td>
                        <td>{{ $item->user->nama_perusahaan }}</td>
                        <td>{{ $item->user->name }}</td>
                        <td>{{ $item->nama_perencana }}</td>
                        <td>{{ $item->user->alamat }}</td>
                        <td>{{ $item->user->asosiasi }}</td>
                        <td>{{ $item->user->kontak }}</td>
                        <td>{{ $item->user->email }}</td>
                        <td>{{ $item->nama_perumahan }}</td>
                        <td>{{ $item->alamat }}</td>
                        <td class="text-center">{{ $item->tipe }}</td>
                        <td class="text-center">{{ $item->Jumlah }}</td>
                        <td class="text-center">{{ $item->latitude }}</td>
                        <td class="text-center">{{ $item->longitude }}</td>
                    </tr>
                    @endforeach
                </tbody>
        </table>
    </div>
</body>

</html>
