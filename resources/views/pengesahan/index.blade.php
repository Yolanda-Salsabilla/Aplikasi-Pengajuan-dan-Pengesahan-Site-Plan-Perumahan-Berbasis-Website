@extends('layout.master')

@section('title', 'Halaman Pengesahan Siteplan')
@section('subtitle', 'Pengesahan Siteplan')

@section('content')
<style>
    .table td {
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    }
</style>

<script src="https://maps.googleapis.com/maps/api/js?key={{ config('services.google_maps.api_key') }}&callback=initMap" async defer></script>
<div class="main-body">
    <div class="page-wrapper">
    <!-- Page-header start -->
    <div class="page-header card bgph">
        <div class="row align-items-end">
            <div class="col-lg-8">
                <div class="page-header-title d-flex align-items-center">
                    <i class="bi bi-person bgpengesahan"></i>
                    <div class="ms-3">
                        <h4 class="text-custom">Pengesahan Site Plan Perumahan</h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Page-header end -->

<!-- Hover table card start -->
<div class="card">
    <div class="card-header">
        <h5>Data Pengesahan Site Plan Perumahan</h5>
        <div class="card-header-right">
            <ul class="list-unstyled card-option">
                <li><i class="icofont icofont-simple-left"></i></li>
                <li><i class="icofont icofont-maximize full-card"></i></li>
                <li><i class="icofont icofont-minus minimize-card"></i></li>
                <li><i class="icofont icofont-refresh reload-card"></i></li>
                <li><i class="icofont icofont-error close-card"></i></li>
            </ul>
        </div>
    </div>
    <div class="card-block table-border-style">
        <div class="table-responsive">
            @if(auth()->user()->role == 'admin')
            <!-- Admin Table -->
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>No Registrasi</th>
                        <th>Tgl Masuk</th>
                        <th>Tgl Selesai</th>
                        <th>Pengembang</th>
                        <th>Perumahan</th>
                        <th>Proses Pengesahan</th>
                        <th>Dokumen Resmi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $item)
                    <tr>
                        <td>{{ $item->id_pengajuans }}</td>
                        <td>{{ $item->tanggal_masuk }}</td>
                        <td>{{ $item->persetujuan->pengesahan->updated_at }}</td>
                        <td>{{ $item->user->name  }}</td>
                        <td>{{ $item->nama_perumahan }}</td>
                        <td>
                            Proses | {{ $item->persetujuan->pengesahan->proses_pengesahan ? 'Sudah Di Sahkan' : 'Belum Di Sahkan' }}
                        </td>
                        <td>
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#uploadModal-{{ $item->id_pengajuans }}">
                                Upload Dokumen
                            </button>
                            @if ($item->persetujuan->pengesahan->dokumen_resmi !== null)
                                {{ $item->persetujuan->pengesahan->dokumen_resmi }}
                            @endif
                        </td>
                    </tr>
                    <div class="modal fade" id="uploadModal-{{ $item->id_pengajuans }}" tabindex="-1" role="dialog" aria-labelledby="uploadModalLabel-{{ $item->id_pengajuans }}" aria-hidden="true">
                        <div class="modal-dialog" role="document_resmi">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="uploadModalLabel-{{ $item->id }}">Upload Dokumen</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form action="{{ route('uploadDocumentResmi', ['id' => $item->persetujuan->pengesahan->id_pengesahans]) }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    @method('patch')
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label for="document_resmi">Pilih Dokumen</label>
                                            <input type="file" class="form-control" id="document_resmi" name="dokumen_resmi" accept="application/pdf">
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Upload</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </tbody>
            </table>
            @else
            <!-- User Table -->
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>No Registrasi</th>
                        <th>Tgl Masuk</th>
                        <th>Tgl Selesai</th>
                        <th>Pengembang</th>
                        <th>Perumahan</th>
                        <th>Proses Pengesahan</th>
                        <th>Dokumen Resmi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $item)
                    <tr>
                        <td>{{ $item->id_pengajuans }}</td>
                        <td>{{ $item->tanggal_masuk }}</td>
                        <td>{{ $item->persetujuan->pengesahan->updated_at }}</td>
                        <td>{{ $item->user ? $item->user->name : 'N/A' }}</td>
                        <td>{{ $item->nama_perumahan }}</td>
                        <td>
                            Proses | {{ $item->persetujuan->pengesahan->proses_pengesahan ? 'Sudah Di Sahkan' : 'Belum Di Sahkan' }}
                        </td>
                        @if ($item->persetujuan->pengesahan->dokumen_resmi == "")
                            <td>
                                Belum Ada
                            </td>
                        @else
                            <td>
                                <a class="btn btn-info" href="{{ asset('storage/dokumen_resmi/'. $item->persetujuan->pengesahan->dokumen_resmi) }}" download>Unduh</a>
                            </td>
                        @endif
                    </tr>
                    @endforeach
                </tbody>
            </table>
            @endif
        </div>
    </div>
</div>
<!-- Hover table card end -->
@endsection
