@extends('layout.master')

@section('title', 'Halaman Profil')
@section('subtitle', 'Profil')

@section('content')
<!-- Main-body start -->
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
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <div class="row">
            <div class="col-sm-12">
                <!-- Basic Form Inputs card start -->
                <div class="card">
                    <div class="card-header">
                        <div class="card-header-right">
                            <i class="icofont icofont-spinner-alt-5"></i>
                        </div>
                    </div>
                    <div class="card-body">
                        <h4 class="sub-title" style="margin-top: -30px;">Pengisian Profil</h4>
                        <form id="profilForm" action="{{ route('profile.update', ['id' => auth()->user()->id_users]) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('patch')
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label class="col-form-label">Nama Pengembang</label>
                                    <input type="text" class="form-control" name="name" placeholder="Nama" value="{{ old('name', auth()->user()->name) }}">
                                </div>
                                <div class="col-md-6">
                                    <label class="col-form-label">Nama Perusahaan</label>
                                    <input type="text" class="form-control" name="nama_perusahaan" value="{{ old('nama_perusahaan', auth()->user()->nama_perusahaan) }}">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label class="col-form-label">Alamat Pengembang</label>
                                    <input type="text" class="form-control" placeholder="Alamat" name="alamat" value="{{ old('alamat', auth()->user()->alamat) }}">
                                </div>
                                <div class="col-md-6">
                                    <label class="col-form-label">Asosiasi Pengembang</label>
                                    <input type="text" class="form-control" placeholder="Asosiasi" name="asosiasi" value="{{ old('asosiasi', auth()->user()->asosiasi) }}">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label class="col-form-label">Kontak</label>
                                    <input type="text" class="form-control" placeholder="Kontak" name="kontak" value="{{ old('kontak', auth()->user()->kontak) }}">
                                </div>
                                <div class="col-md-6">
                                    <label class="col-form-label">Email</label>
                                    <input type="email" class="form-control" placeholder="Email" name="email" value="{{ old('email', auth()->user()->email) }}">
                                </div>
                            </div>
                            <!-- Tanda Tangan Pengembang -->
                            @if (auth()->user()->ttd_pengembang == '')
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label class="col-form-label">Tanda Tangan Pengembang</label>
                                    <div class="d-flex align-items-center">
                                        <canvas id="signature-pad" width="400" height="200" style="border: 1px solid #000000;"></canvas>
                                        <button type="button" class="btn btn-secondary ms-3" onclick="clearPad()">Clear</button>
                                    </div>
                                    <input type="hidden" name="ttd_pengembang" id="ttd_pengembang">
                                </div>
                            </div>
                            @else
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label class="col-form-label">Tanda Tangan Pengembang</label>
                                    <div class="d-flex align-items-center">
                                        <canvas id="signature-pad" width="400" height="200" style="border: 1px solid #000000;"></canvas>
                                        <button type="button" class="btn btn-secondary ms-3" onclick="clearPad()">Clear</button>
                                    </div>
                                    <input type="hidden" name="ttd_pengembang" id="ttd_pengembang"value="{{ asset('storage/' . auth()->user()->ttd_pengembang) }}">
                                </div>
                            </div>
                            @endif
                            {{-- @if (auth()->user()->ttd_pengembang == "")
                            <div class="mb-3 row">
                                <label class="col-sm-2 col-form-label">Tanda Tangan Pengembang</label>
                                <div class="col-sm-10">
                                    <canvas id="signature-pad" width="400" height="200" style="border: 1px solid #000000;"></canvas>
                                    <input type="hidden" name="ttd_pengembang" id="ttd_pengembang">
                                    <button type="button" class="btn btn-secondary mt-2" onclick="clearPad()">Clear</button>
                                </div>
                            </div>
                            @else
                            <div class="mb-3 row">
                                <label class="col-sm-2 col-form-label">Tanda Tangan Pengembang</label>
                                <div class="col-sm-10 d-grid align-items-center">
                                    <div>
                                        <canvas id="signature-pad" width="400" height="200" style="border: 1px solid #000000;"></canvas>
                                        <input type="hidden" name="ttd_pengembang" id="ttd_pengembang" value="{{ asset('storage/' . auth()->user()->ttd_pengembang) }}">
                                    </div>
                                    <button type="button" class="btn btn-secondary mt-2" onclick="clearPad()">Clear</button>
                                </div>
                            </div>
                            @endif --}}
                            <div class="d-flex justify-content-end">
                                <div>
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                    <a href="/dashboard" class="btn btn-danger ms-2">Batal</a>
                                </div>
                            </div>
                        </form>
                        <!-- Main-body end -->
                        <div id="styleSelector"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/signature_pad@4.0.0/dist/signature_pad.umd.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        var canvas = document.getElementById('signature-pad');
        var signaturePad = new SignaturePad(canvas);

        // Check if there's an existing signature data and load it
        var existingSignature = document.getElementById('ttd_pengembang').value;
        if (existingSignature) {
            var img = new Image();
            img.src = existingSignature;
            img.onload = function () {
                var ctx = canvas.getContext('2d');
                ctx.drawImage(img, 0, 0);
            };
        }

        document.getElementById('profilForm').addEventListener('submit', function (e) {
            if (signaturePad.isEmpty() && !existingSignature) {
                alert("Please provide a signature first.");
                e.preventDefault();
            } else {
                if (!signaturePad.isEmpty()) {
                    var dataURL = signaturePad.toDataURL();
                    document.getElementById('ttd_pengembang').value = dataURL;
                    console.log("Signature Data URL: ", dataURL); // Log the dataURL to the console
                }
            }
        });

        window.clearPad = function() {
            signaturePad.clear();
            document.getElementById('ttd_pengembang').value = '';
        }
    });
</script>
@endsection
