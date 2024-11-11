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
<!-- Hover table card start -->
<div class="card">
    <div class="card-header">
        <h5>Data User</h5>
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
            <!-- Admin Table -->
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>No Registrasi</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Alamat</th>
                        <th>No.telepon</th>
                        <th>Role</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                   @foreach ($user as $item)
                    <tr>
                        <td>{{ $item->id_users }}</td>
                        <td class="name">{{ $item->name }}</td>
                        <td>{{ $item->email }}</td>
                        <td>{{ $item->alamat }}</td>
                        <td>{{ $item->kontak }}</td>
                        <td>{{ $item->role }}</td>
                        <td>
                            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editModal-{{ $item->id }}">Edit</button>
                            <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal-{{ $item->id }}">Hapus</button>
                        </td>
                    </tr>
                    <!-- Modal Edit -->
                    <div class="modal fade" id="editModal-{{ $item->id }}" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="editModalLabel">Edit Data</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <!-- Form edit data -->
                                    <form  action="{{ route('updateuser', ['id' => $item->id_users]) }}" method="POST">
                                        @csrf
                                        @method('patch')
                                        <!-- Input fields -->
                                        <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Nama Pengembang</label>
                                        <div class="col-sm-10">
                                                <input type="text" class="form-control" name="name" placeholder="Nama" value="{{ old('name', $item->name) }}">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label"> Nama Perusahaan</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" name="nama_perusahaan" value="{{ old('nama_perusahaan', $item->nama_perusahaan) }}">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Alamat Pengembang</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" placeholder="Alamat" name="alamat" value="{{ old('alamat', $item->alamat) }}">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Kontak</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" placeholder="Kontak" name="kontak" value="{{ old('kontak', $item->kontak) }}">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Email</label>
                                            <div class="col-sm-10">
                                                <input type="email" class="form-control" placeholder="Email" name="email" value="{{ old('email', $item->email) }}">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Role</label>
                                            <div class="col-sm-10">
                                                <input type="role" class="form-control" placeholder="role" name="role" value="{{ old('role', $item->role) }}">
                                            </div>
                                        </div>

                                        <!-- Submit button -->
                                        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Modal Delete -->
                    <div class="modal fade" id="deleteModal-{{ $item->id }}" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="deleteModalLabel">Konfirmasi Hapus Data</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <p>Anda yakin ingin menghapus data ini?</p>
                                </div>
                                <div class="m odal-footer">
                                    <!-- Hidden input field for user ID -->
                                    <form action="{{ route('deleteuser', ['id' => $item->id_users]) }}" method="post">
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
<!-- Hover table card end -->
<!-- Modal Edit -->


@endsection
