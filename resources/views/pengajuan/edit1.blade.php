@extends('layout.master')

@section('title', 'Halaman Edit Pengajuan')
@section('subtitle', 'Edit Pengajuan')

@section('content')
<!-- Main-body start -->
<style>
    #map {
        height: 400px;
        width: 100%;
    }
</style>
<script src="https://maps.googleapis.com/maps/api/js?key={{ config('services.google_maps.api_key') }}&callback=initMap" async defer></script>
<div class="main-body">
    <div class="page-wrapper">
        <!-- Page-header start -->
        <div class="page-header card">
            <div class="row align-items-end">
                <div class="col-lg-8">
                    <div class="page-header-title">
                        <i class="icofont icofont-file-code bg-c-blue"></i>
                        <div class="d-inline">
                            <h4>Edit Pengajuan</h4>
                            <span>Edit data pengajuan perumahan</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="page-header-breadcrumb">
                        <ul class="breadcrumb-title">
                            <li class="breadcrumb-item">
                                <a href="index.html">
                                    <i class="icofont icofont-home"></i>
                                </a>
                            </li>
                            <li class="breadcrumb-item"><a href="#!">Pengajuan</a></li>
                            <li class="breadcrumb-item"><a href="#!">Edit Pengajuan</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- Page-header end -->

        <!-- Page body start -->
        <div class="page-body">
            <div class="row">
                <div class="col-sm-12">
                    <!-- Edit Form Inputs card start -->
                    <div class="card">
                        <div class="card-header">
                            <h5>Edit Form Inputs</h5>
                            <span>Update the details of the pengajuan</span>
                            <div class="card-header-right">
                                <i class="icofont icofont-spinner-alt-5"></i>
                            </div>
                        </div>
                        <div class="card-block">
                            <h4 class="sub-title">Basic Inputs</h4>
                        <form action="{{ route('updateKet.teknis', ['id_pengajuan' => $pengajuan->id_pengajuans]) }}" method="post" enctype="multipart/form-data">
                                @csrf
                                @method('patch')
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Tanggal Pengajuan</label>
                                    <div class="col-sm-10">
                                        <input type="date" class="form-control" id="tanggal_masuk" name="tanggal_masuk" value="{{ $pengajuan->tanggal_masuk }}" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Nama Perumahan</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="nama_perumahan" name="nama_perumahan" value="{{ $pengajuan->nama_perumahan }}" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Nama Perencana</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="nama_perencana" name="nama_perencana" value="{{ $pengajuan->nama_perencana }}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Alamat Perumahan</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="alamat" name="alamat" value="{{ $pengajuan->alamat }}" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Tipe Bangunan</label>
                                    <div class="col-sm-10">
                                        <select id="tipe" name="tipe" class="form-control" required>
                                            <option value="" disabled>Pilih Salah satu tipe</option>
                                            <option value="21 M²" {{ $pengajuan->tipe == '21 M²' ? 'selected' : '' }}>21 M²</option>
                                            <option value="36 M²" {{ $pengajuan->tipe == '36 M²' ? 'selected' : '' }}>36 M²</option>
                                            <option value="45 M²" {{ $pengajuan->tipe == '45 M²' ? 'selected' : '' }}>45 M²</option>
                                            <option value="54 M²" {{ $pengajuan->tipe == '54 M²' ? 'selected' : '' }}>54 M²</option>
                                            <option value="60 M²" {{ $pengajuan->tipe == '60 M²' ? 'selected' : '' }}>60 M²</option>
                                            <option value="70 M²" {{ $pengajuan->tipe == '70 M²' ? 'selected' : '' }}>70 M²</option>
                                            <option value="120 M²" {{ $pengajuan->tipe == '120 M²' ? 'selected' : '' }}>120 M²</option>
                                            <option value="> 120 M²" {{ $pengajuan->tipe == '> 120 M²' ? 'selected' : '' }}>> 120 M²</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Jumlah Bangunan</label>
                                    <div class="col-sm-10">
                                        <input type="number" class="form-control" id="Jumlah" name="Jumlah" value="{{ $pengajuan->Jumlah }}" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Tanda Tangan Perencana</label>
                                    <div class="col-sm-10">
                                        <input type="file" class="form-control" id="ttd_perencana" name="ttd_perencana" accept=".jpeg,.png,.jpg">
                                        <p id="file-name">{{ $pengajuan->ttd_perencana }}</p>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Lokasi</label>
                                    <div class="col-sm-10">
                                        <label for="latitude">Latitude:</label>
                                        <input type="text" id="latitude" name="latitude" value="{{ $pengajuan->latitude }}" readonly>
                                        <label for="longitude">Longitude:</label>
                                        <input type="text" id="longitude" name="longitude" value="{{ $pengajuan->longitude }}" readonly>
                                        <div id="map"></div>
                                    </div>
                                </div>

                                <div class="card">
                                    <div class="card-header">
                                        <h5>Persyaratan Administratif</h5>
                                    </div>
                                    <div class="card-body">
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Surat Permohonan Pengesahan Site Plan</label>
                                            <div class="col-sm-10">
                                                <input type="file" class="form-control" id="permohonan_pengesahan" name="permohonan_pengesahan" accept=".pdf">
                                                <p id="file-name">{{ $pengajuan->permohonan_pengesahan }}</p>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Scan KTP Pengembang</label>
                                            <div class="col-sm-10">
                                                <input type="file" class="form-control" id="surat_ktp" name="surat_ktp" accept=".pdf">
                                                <p id="file-name">{{ $pengajuan->surat_ktp }}</p>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Scan Akta Pendirian Badan Usaha (SBU)</label>
                                            <div class="col-sm-10">
                                                <input type="file" class="form-control" id="akta" name="akta" accept=".pdf">
                                                <p id="file-name">{{ $pengajuan->akta }}</p>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Scan SPPT, PBB, dan Tanda Lunas PBB</label>
                                            <div class="col-sm-10">
                                                <input type="file" class="form-control" id="sspt_pbblunas" name="sspt_pbblunas" accept=".pdf">
                                                <p id="file-name">{{ $pengajuan->sspt_pbblunas }}</p>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Scan Sertifikat Tanah</label>
                                            <div class="col-sm-10">
                                                <input type="file" class="form-control" id="sertif" name="sertif" accept=".pdf">
                                                <p id="file-name">{{ $pengajuan->sertif }}</p>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Scan NPWP Perusahaan</label>
                                            <div class="col-sm-10">
                                                <input type="file" class="form-control" id="npwp_perusahaan" name="npwp_perusahaan" accept=".pdf">
                                                <p id="file-name">{{ $pengajuan->npwp_perusahaan }}</p>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Scan SBU</label>
                                            <div class="col-sm-10">
                                                <input type="file" class="form-control" id="sbu" name="sbu" accept=".pdf">
                                                <p id="file-name">{{ $pengajuan->sbu }}</p>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Scan SIUJK Legalisir Pemerintah Daerah</label>
                                            <div class="col-sm-10">
                                                <input type="file" class="form-control" id="slujk" name="slujk" accept=".pdf">
                                                <p id="file-name">{{ $pengajuan->slujk }}</p>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Scan Dokumen Lingkungan</label>
                                            <div class="col-sm-10">
                                                <input type="file" class="form-control" id="dok_lingkungan" name="dok_lingkungan" accept=".pdf">
                                                <p id="file-name">{{ $pengajuan->dok_lingkungan }}</p>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Scan SIUP/SITU/NIB</label>
                                            <div class="col-sm-10">
                                                <input type="file" class="form-control" id="siup_situ_nib" name="siup_situ_nib" accept=".pdf">
                                                <p id="file-name">{{ $pengajuan->siup_situ_nib }}</p>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Scan Informasi Tata Ruang dari PUPR</label>
                                            <div class="col-sm-10">
                                                <input type="file" class="form-control" id="info_pupr" name="info_pupr" accept=".pdf">
                                                <p id="file-name">{{ $pengajuan->info_pupr }}</p>
                                            </div>
                                        </div>

                                        <h4 class="sub-title">Persyaratan Teknis</h4>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Rancangan Lokasi Perumahan</label>
                                            <div class="col-sm-4">
                                                <input type="file" class="form-control" id="lokasi" name="lokasi" accept="image/*">
                                                <p id="file-name">{{ $pengajuan->lokasi }}</p>
                                            </div>
                                            <label class="col-sm-2 col-form-label">Rancangan Potongan Perumahan</label>
                                            <div class="col-sm-4">
                                                <input type="file" class="form-control" id="rancangan_potongan" name="rancangan_potongan" accept="image/*">
                                                <p id="file-name">{{ $pengajuan->rancangan_potongan }}</p>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Rancangan Site Plan Perumahan</label>
                                            <div class="col-sm-4">
                                                <input type="file" class="form-control" id="rancangan_steplan" name="rancangan_steplan" accept="image/*">
                                                <p id="file-name">{{ $pengajuan->rancangan_steplan }}</p>
                                            </div>
                                            <label class="col-sm-2 col-form-label">Rancangan Denah Tipe Perumahan</label>
                                            <div class="col-sm-4">
                                                <input type="file" class="form-control" id="denah" name="denah" accept="image/*">
                                                <p id="file-name">{{ $pengajuan->denah }}</p>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <div class="col-sm-10 offset-sm-2">
                                                <button type="submit" class="btn btn-primary">Simpan</button>
                                                <a href="{{ url()->previous() }}" class="btn btn-secondary">Batal</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        </form>
                        </div>
                    </div>
                    <!-- Edit Form Inputs card end -->
                </div>
            </div>
        </div>
        <!-- Page body end -->
    </div>
</div>
<!-- Main-body end -->
<script>
    function initMap() {
        var lat = {{ $pengajuan->latitude ?? -6.200000 }};
        var lng = {{ $pengajuan->longitude ?? 106.816666 }};
        var map = new google.maps.Map(document.getElementById('map'), {
            center: {lat: lat, lng: lng},
            zoom: 13
        });

        var marker = new google.maps.Marker({
            position: {lat: lat, lng: lng},
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
