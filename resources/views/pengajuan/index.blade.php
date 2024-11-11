@extends('layout.master')

@section('title', 'Halaman Profil')
@section('subtitle', 'Profil')

@section('content')
<!-- Main-body start -->
<style>
    #map {
        height: 400px;
        width: 100%;
    }

    .form-group.row {
        display: flex;
        align-items: center;
    }

    .btn-container {
        text-align: right;
    }

    .btn-container .btn {
        margin-left: 10px;
    }

    .divider {
        border-top: 2px solid #e0e0e0;
        margin: 20px 0;
    }

    .data-table-container {
        width: 100%;
        overflow-x: auto;
    }

    .data-table {
        width: 100%;
        border-collapse: collapse;
    }

    .data-table th, .data-table td {
        padding: 8px;
        text-align: left;
        border-bottom: 1px solid #ddd;
    }

    .data-table th {
        background-color: #f2f2f2;
    }
</style>
<script src="https://maps.googleapis.com/maps/api/js?key={{ config('services.google_maps.api_key') }}&callback=initMap" async defer></script>
<div class="main-body">
    <div class="page-wrapper">
        <!-- Page-header start -->
        <div class="page-header card bgph" style="padding: 5px 0;">
            <div class="row" style="margin: 0;">
                <div class="col-lg-8">
                    <div class="page-header-title d-flex align-items-center" style="padding: 5px 0;">
                        <i class="bi bi-person bgpengesahan" style="font-size: 24px;"></i>
                        <div class="ms-3" style="line-height: 1;">
                            <h4 class="text-custom" style="margin: 0;">Pembuatan Dokumen Pengesahan Site Plans</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Page-header end -->

        <!-- Page body start -->
        <div class="page-body">
            <div class="row">
                <div class="col-sm-12">
                    <!-- Basic Form Inputs start -->
                    <div class="card">
                        <div class="card-header">
                            <div class="card-block">
                                <h4 class="sub-title" style="margin-top: -10px;">Pengajuan</h4>
                                @if(session('success'))
                                    <div class="alert alert-success">
                                        {{ session('success') }}
                                    </div>
                                @endif
                                @if(session('error'))
                                    <div class="alert alert-success">
                                        {{ session('error') }}
                                    </div>
                                @endif
                                <form action="{{ route('pengajuan.store') }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Tanggal Pengajuan</label>
                                    <div class="col-sm-4">
                                        <input type="date" class="form-control" id="tanggal_masuk" name="tanggal_masuk" required>
                                    </div>
                                    <label class="col-sm-2 col-form-label">Nama Perumahan</label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" id="nama_perumahan" name="nama_perumahan" required>
                                    </div>

                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Nama Perencana</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="nama_perencana" name="nama_perencana" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Alamat Perumahan</label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" id="alamat" name="alamat" required>
                                    </div>
                                    <label class="col-sm-2 col-form-label">Tipe Bangunan</label>
                                    <div class="col-sm-4">
                                        <select id="tipe" name="tipe" class="form-control" required>
                                            <option value="" disabled selected>Pilih Salah satu tipe</option>
                                            <option value="21 M²">21 M²</option>
                                            <option value="36 M²">36 M²</option>
                                            <option value="45 M²">45 M²</option>
                                            <option value="54 M²">54 M²</option>
                                            <option value="60 M²">60 M²</option>
                                            <option value="70 M²">70 M²</option>
                                            <option value="120 M²">120 M²</option>
                                            <option value="120 M²">> 120 M²</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Jumlah Bangunan</label>
                                    <div class="col-sm-4">
                                        <input type="number" class="form-control" id="jumlah" name="jumlah" required>
                                    </div>
                                    <label class="col-sm-2 col-form-label">Tanda Tangan Perencana</label>
                                    <div class="col-sm-4">
                                        <input type="file" class="form-control" id="ttd_perencana" name="ttd_perencana" accept=".jpeg,.png,.jpg" required>
                                    </div>
                                </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Latitude</label>
                                        <div class="col-sm-4">
                                            <input type="text" class="form-control" id="latitude" name="latitude" readonly>
                                        </div>
                                        <label class="col-sm-2 col-form-label">Longitude</label>
                                        <div class="col-sm-4">
                                            <input type="text" class="form-control" id="longitude" name="longitude" readonly>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-12">
                                            <div id="map"></div>
                                        </div>
                                    </div>

                                    <div class="divider"></div>

                                    <h4 class="sub-title" style="margin-top: -10px;">Persyaratan Administratif</h4>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Surat Permohonan Pengesahan Site Plan</label>
                                        <div class="col-sm-4">
                                            <input type="file" class="form-control" id="permohonan_pengesahan" name="permohonan_pengesahan" accept=".pdf" required>
                                        </div>
                                        <label class="col-sm-2 col-form-label">Scan NPWP Perusahaan</label>
                                        <div class="col-sm-4">
                                            <input type="file" class="form-control" id="npwp_perusahaan" name="npwp_perusahaan" accept=".pdf" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">SBU</label>
                                        <div class="col-sm-4">
                                            <input type="file" class="form-control" id="sbu" name="sbu" accept=".pdf" required>
                                        </div>
                                        <label class="col-sm-2 col-form-label">Scan SIUJK Legalisir Pemerintah Daerah</label>
                                        <div class="col-sm-4">
                                            <input type="file" class="form-control" id="slujk" name="slujk" accept=".pdf" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Scan KTP Pengembang</label>
                                        <div class="col-sm-4">
                                            <input type="file" class="form-control" id="surat_ktp" name="surat_ktp" accept=".pdf" required>
                                        </div>
                                        <label class="col-sm-2 col-form-label">Scan Dokumen Lingkungan</label>
                                        <div class="col-sm-4">
                                            <input type="file" class="form-control" id="dok_lingkungan" name="dok_lingkungan" accept=".pdf" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Scan Akta Pendirian Badan Usaha(SBU)</label>
                                        <div class="col-sm-4">
                                            <input type="file" class="form-control" id="akta" name="akta" accept=".pdf" required>
                                        </div>
                                        <label class="col-sm-2 col-form-label">Scan SIUP/SITU/NIB</label>
                                        <div class="col-sm-4">
                                            <input type="file" class="form-control" id="siup_situ_nib" name="siup_situ_nib" accept=".pdf" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Scan SPPT,PBB,dan Tanda Lunas PBB</label>
                                        <div class="col-sm-4">
                                            <input type="file" class="form-control" id="sspt_pbblunas" name="sspt_pbblunas" accept=".pdf" required>
                                        </div>
                                        <label class="col-sm-2 col-form-label">Scan Informasi Tata Ruang dari PUPR</label>
                                        <div class="col-sm-4">
                                            <input type="file" class="form-control" id="info_pupr" name="info_pupr" accept=".pdf" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Scan Sertifikat Tanah</label>
                                        <div class="col-sm-4">
                                            <input type="file" class="form-control" id="sertif" name="sertif" accept=".pdf" required>
                                        </div>
                                    </div>

                                    <div class="divider"></div>

                                    <h4 class="sub-title" style="margin-top: -10px;">Persyaratan Teknis</h4>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Rancangan Lokasi Perumahan</label>
                                        <div class="col-sm-4">
                                            <input type="file" class="form-control" id="lokasi" name="lokasi" accept="image/*" required>
                                        </div>
                                        <label class="col-sm-2 col-form-label">Rancangan Potongan Perumahan</label>
                                        <div class="col-sm-4">
                                            <input type="file" class="form-control" id="rancangan_potongan" name="rancangan_potongan" accept="image/*" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Rancangan Site Plan Perumahan</label>
                                        <div class="col-sm-4">
                                            <input type="file" class="form-control" id="rancangan_steplan" name="rancangan_steplan" accept="image/*" required>
                                        </div>
                                        <label class="col-sm-2 col-form-label">Rancangan Denah Tipe Perumahan</label>
                                        <div class="col-sm-4">
                                            <input type="file" class="form-control" id="denah" name="denah" accept="image/*" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-12 btn-container">
                                            <button type="submit" class="btn btn-primary"  style="font-weight: bold;">Simpan</button>
                                            <button type="button" class="btn btn-primary" style="font-weight: bold;">
                                                <a href="/dashboard" style="color: white; text-decoration: none; display: inline-block; width: 100%; height: 100%;">Batal</a>
                                            </button>
                                        </div>


                                    </div>
                                </form>
                                <div class="divider"></div>
                                <h4>Data Perumahan</h4>
                                <br>
                                <div class="data-table-container">
                                    <table class="data-table">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Nama Perumahan</th>
                                                <th>Alamat</th>
                                                <th>Tipe Bangunan</th>
                                                <th>Jumlah Bangunan</th>
                                                <th>Latitude</th>
                                                <th>Longitude</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($data as $item)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
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
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Page body end -->
                </div>
            </div>
            <!-- Main-body end -->
            <script>
                function initMap() {
                    var map = new google.maps.Map(document.getElementById('map'), {
                        center: {lat: -6.200000, lng: 106.816666},
                        zoom: 13
                    });

                    var marker = new google.maps.Marker({
                        position: {lat: -6.200000, lng: 106.816666},
                        map: map,
                        draggable: true
                    });

                    google.maps.event.addListener(marker, 'dragend', function(event) {
                        document.getElementById('latitude').value = event.latLng.lat();
                        document.getElementById('longitude').value = event.latLng.lng();
                    });
                }
            </script>
@endsection
