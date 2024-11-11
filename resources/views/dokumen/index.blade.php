@extends('layout.master')

@section('content')

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
                            <h4 class="text-custom" style="margin: 0;">Pembuatan Dokumen Pengesahan Site Plan</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Page-header end -->

        <style>
            .black-text-option {
                color: black;
            }
        </style>
        <div class="container mt-5">
            <form id="documentForm" method="POST" action="{{ route('dokumen.generateDocx') }}">
                @csrf
                <div class="row">
                    <div class="col-md-6 col-lg-3">
                        <div class="form-group mb-3">
                            <label for="pengajuans_id">Pilih Pengajuan</label>
                            <select name="pengajuans_id" id="pengajuans_id" class="form-control" required>
                                <option value="" selected disabled>Pilih Pengajuan</option>
                                @foreach($data as $pengajuan)
                                    <option value="{{ $pengajuan->id_pengajuans }}">{{ $pengajuan->nama_perumahan }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group mb-3">
                            <label for="users_id">Pilih Pengembang</label>
                            <select name="users_id" id="users_id" class="form-control black-text-option" required>
                                <option value="" selected disabled>Pilih Pengembang</option>
                                @foreach($user as $item)
                                    <option value="{{ $item->id_users }}">{{ $item->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group mb-3">
                            <label for="nomor_naskah">Nomor Surat</label>
                            <input type="text" name="nomor_naskah" id="nomor_naskah" class="form-control" required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="tanggal_naskah">Tanggal Pembuatan</label>
                            <input type="date" name="tanggal_naskah" id="tanggal_naskah" class="form-control" required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="kepada_penerima">Kepada Penerima</label>
                            <input type="text" name="kepada_penerima" id="kepada_penerima" class="form-control" required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="surat_pengembang">No. Surat Pengembang</label>
                            <input type="text" name="surat_pengembang" id="surat_pengembang" class="form-control" required>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3">
                        <div class="form-group mb-3">
                            <label for="nama_staff">Nama Staff</label>
                            <input type="text" name="nama_staff" id="nama_staff" class="form-control" required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="nip_staff">NIP Staff</label>
                            <input type="text" name="nip_staff" id="nip_staff" class="form-control" required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="nama_kabid">Nama Kabid</label>
                            <input type="text" name="nama_kabid" id="nama_kabid" class="form-control" required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="nip_kabid">NIP Kabid</label>
                            <input type="text" name="nip_kabid" id="nip_kabid" class="form-control" required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="nama_kadin">Nama Kadin</label>
                            <input type="text" name="nama_kadin" id="nama_kadin" class="form-control" required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="nip_kadin">NIP Kadin</label>
                            <input type="text" name="nip_kadin" id="nip_kadin" class="form-control" required>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3">
                        <div class="form-group mb-3">
                            <label for="nomor_shm">Nomor SHM</label>
                            <input type="text" name="nomor_shm" id="nomor_shm" class="form-control" required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="nib_tanah">NIB. Tanah</label>
                            <input type="text" name="nib_tanah" id="nib_tanah" class="form-control" required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="detail_lanjutan">Detail Lanjutan</label>
                            <input type="text" name="detail_lanjutan" id="detail_lanjutan" class="form-control" required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="luas_rencana_pembangunan">Luas Rencana Pembangunan</label>
                            <input type="text" name="luas_rencana_pembangunan" id="luas_rencana_pembangunan" class="form-control" required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="tanggal_survei">Tanggal Survei</label>
                            <input type="date" name="tanggal_survei" id="tanggal_survei" class="form-control" required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="wilayah_pembangunan">Wilayah Pembangunan</label>
                            <input type="text" name="wilayah_pembangunan" id="wilayah_pembangunan" class="form-control" required>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3">
                        <div class="form-group mb-3">
                            <label for="nomor_itr">Nomor ITR</label>
                            <input type="text" name="nomor_itr" id="nomor_itr" class="form-control" required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="tanggal_itr">Tanggal ITR</label>
                            <input type="date" name="tanggal_itr" id="tanggal_itr" class="form-control" required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="peruntukan_kawasan">Peruntukan Kawasan</label>
                            <input type="text" name="peruntukan_kawasan" id="peruntukan_kawasan" class="form-control" required>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Word Document</button>
                <button type="button" class="btn btn-danger" onclick="clearForm()">Clear</button>
            </form>
        </div>

        <script>
            function clearForm() {
                document.getElementById('documentForm').reset();
            }
        </script>
    </div>
</div>
@endsection
