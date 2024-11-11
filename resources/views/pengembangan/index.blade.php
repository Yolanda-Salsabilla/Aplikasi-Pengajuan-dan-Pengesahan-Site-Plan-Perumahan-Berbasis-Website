@extends('layout.master')

@section('title', 'Halaman Profil')
@section('subtitle', 'Profil')

@section('content')
<style>
    .container-fluid {
        padding-left: 0;
        padding-right: 0;
    }
    .card-header {
        background-color: #f8f9fa;
        padding: 1rem 1.5rem;
    }
    .card-body {
        padding: 2rem 1.5rem;
    }
    .table th, .table td {
        white-space: nowrap;
        vertical-align: middle;
    }
    .table-responsive {
        margin-top: 1.5rem;
    }
    .mb-4 h3 {
        margin-bottom: 1rem;
        font-size: 1.25rem;
    }
</style>
<div class="container-fluid my-5">
    <div class="card">
        <div class="card-body">
            <div class="mb-4">
                <h3>Data Pengembang</h3>
                <div class="table-responsive">
                    <table class="table table-striped w-100">
                        <thead class="table-dark">
                            <tr>
                                <th>No Registrasi</th>
                                <th>Pengembang</th>
                                <th>Perusahaan</th>
                                <th>Alamat</th>
                                <th>Asosiasi</th>
                                <th>Kontak</th>
                                <th>Email</th>
                                <th>Role</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($user as $item)
                            <tr>
                                <td>{{ $item->id_users }}</td>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->nama_perusahaan}}</td>
                                <td>{{ $item->alamat }}</td>
                                <td>{{ $item->asosiasi }}</td>
                                <td>{{ $item->kontak }}</td>
                                <td>{{ $item->email }}</td>
                                <td>{{ $item->role }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="mb-4">
                <h3>Data Perumahan</h3>
                <div class="table-responsive">
                    <table class="table table-striped w-100">
                        <thead class="table-dark">
                            <tr>
                                <th>Nomor</th>
                                <th>Pengembang</th>
                                <th>Tanggal Masuk</th>
                                <th>Perumahan</th>
                                <th>Alamat</th>
                                <th>Tipe Bangunan</th>
                                <th>Jumlah</th>
                                <th>Koordinat Perumahan</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($gabungan as $item)
                            <tr>
                                <td>{{ $item->id_pengajuan }}</td>
                                <td>{{ $item->user->name }}</td>
                                <td>{{ $item->tanggal_masuk }}</td>
                                <td>{{ $item->nama_perumahan }}</td>
                                <td>{{ $item->alamat }}</td>
                                <td>{{ $item->tipe }}</td>
                                <td>{{ $item->Jumlah }}</td>
                                <td>{{ $item->longitude }} && {{ $item->latitude }}</td>
                                <td>
                                    <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal-{{ $item->id_pengajuans }}">Hapus</button>
                                </td>
                            </tr>
                            <div class="modal fade" id="deleteModal-{{ $item->id_pengajuans }}" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="deleteModalLabel">Konfirmasi Hapus Data</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <p>Anda yakin ingin menghapus data ini?</p>
                                </div>
                                <div class="modal-footer">
                                    <!-- Hidden input field for user ID -->
                                    <form action="{{ route('deletepengajuan', ['id_pengajuan' => $item->id_pengajuans]) }}" method="post">
                                        @csrf
                                        @method('delete')
                                        <button type="submit">Hapus Data</button>
                                    </form>
                                    <!-- Delete button -->
                                    <!-- Close button -->
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                </div>
                            </div>
                        </div>
                    </div>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
