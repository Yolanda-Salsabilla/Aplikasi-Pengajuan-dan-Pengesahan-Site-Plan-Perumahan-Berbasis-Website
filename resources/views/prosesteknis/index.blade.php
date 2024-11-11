@extends('layout.master')

@section('title', 'Halaman Proses Persetujuan Teknis')
@section('subtitle', 'Proses Persetujuan Teknis')


@section('content')

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
                        <h4 class="text-custom">Persetujuan Teknis</h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Page-header end -->

    <style>
.btn-download {
    display: inline-block;
    padding: 8px 16px;
    font-size: 14px;
    color: #333; /* Warna teks */
    background-color: #d3d3d3; /* Warna abu-abu soft */
    border: 1px solid #ccc; /* Border dengan warna sedikit lebih gelap */
    border-radius: 4px; /* Membuat sudut tombol agak melengkung */
    text-align: center;
    text-decoration: none; /* Menghilangkan garis bawah pada link */
    margin: 4px 2px;
    transition: background-color 0.3s; /* Animasi transisi saat hover */
}

.btn-download:hover {
    background-color: #bbb; /* Warna abu-abu yang lebih gelap saat hover */
}
</style>



<!-- Hover table card start -->
<div class="card">
    <div class="card-header">
        <h5>Proses Persetujuan Pengajuan Teknis</h5>
        @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
            @endif
        {{-- <span>use class <code>table-hover</code> inside table element</span> --}}
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
                        <th>Pengembang</th>
                        <th>Perumahan</th>
                        <th>Rancangan lokasi Perumahan</th>
                        <th>Rancangan Site Plan</th>
                        <th>Rancangan Potongan Perumahan</th>
                        <th>Rancangan Denah Tipe Perumahan</th>
                        <th>Status</th>
                        <th>Keterangan</th>
                        <th>Update Keterangan</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $item)
                    <tr>
                        <td>{{ $item->id_pengajuans }}</td>
                        <td>{{ $item->user->name }}</td>
                        <td>{{ $item->nama_perumahan }}</td>

                        <td>
                            <a href="{{ asset('storage/lokasis/'. $item->lokasi) }}" download class="btn-download">{{ $item->lokasi }}</a>
                        </td>
                        <td>
                            <a href="{{ asset('storage/rancangan_steplans/'. $item->rancangan_steplan) }}" download class="btn-download">{{ $item->rancangan_steplan }}</a>
                        </td>
                        <td>
                            <a href="{{ asset('storage/rancangan_potongan/'. $item->rancangan_potongan) }}" download class="btn-download">{{ $item->rancangan_potongan}}</a>
                        </td>
                        <td>
                            <a href="{{ asset('storage/denahs/'. $item->denah) }}" download class="btn-download">{{ $item->denah }}</a>
                        </td>

                        <td>{{ $item->statusteknis }}
                            <button class="btn btn-warning" data-toggle="modal" data-target="#statusTeknis-{{ $item->id_pengajuans }}">Ubah Status</button>
                        </td>
                        @if (empty($item->keterangan_teknis))
                            <td>
                                <button class="btn btn-primary" data-toggle="modal" data-target="#keteranganModal-{{ $item->id_pengajuans }}" data-id="{{ $item->id_pengajuans }}">Tambah Keterangan</button>
                            </td>
                        @endif
                        @if ($item->keterangan_teknis)
                            <td>
                                <span>{{ $item->keterangan_teknis }}</span>
                                <button class="btn btn-primary" data-toggle="modal" data-target="#keteranganModal1-{{ $item->id_pengajuans }}" data-id="{{ $item->id_pengajuans }}">edit Keterangan</button>
                            </td>
                        @endif
                        @if ($item->ket_update_teknis == false)
                            <td>Belum Di Update User {{$item->user->name}}</td>
                        @else
                            <td>Sudah Di Update Oleh {{$item->user->name}}</td>
                        @endif
                    </tr>


            <div class="modal fade" id="keteranganModal-{{ $item->id_pengajuans }}" tabindex="-1" role="dialog" aria-labelledby="keteranganModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="keteranganModalLabel">Tambah Keterangan</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form  action="{{ route('keteranganteknis.add', ['id' => $item->id_pengajuans]) }}" method="POST">
                                @csrf
                                @method('patch')
                                <div class="form-group">
                                    <label for="keterangan_teknis" class="col-form-label">Keterangan:</label>
                                    <input type="text" class="form-control" id="keterangan_teknis" name="keterangan_teknis">
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Save</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal fade" id="keteranganModal1-{{ $item->id_pengajuans }}" tabindex="-1" role="dialog" aria-labelledby="keteranganModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="keteranganModalLabel">Edit Keterangan</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form  action="{{ route('keteranganteknis.update', ['id' => $item->id_pengajuans]) }}" method="POST">
                                @csrf
                                @method('patch')
                                <div class="form-group">
                                    <label for="keterangan_teknis" class="col-form-label">Keterangan:</label>
                                    <input type="text" class="form-control" id="keterangan_teknis" name="keterangan_teknis" value="{{ $item->keterangan_teknis }}">
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit"  class="btn btn-primary">Save</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal fade" id="statusTeknis-{{ $item->id_pengajuans }}"  tabindex="-1" role="dialog" aria-labelledby="statusModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="statusModalLabel">Ubah Status {{  $item->user->name }}</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="{{ route('statusteknis.update', ['id' => $item->id_pengajuans]) }}" method="POST">
                                @csrf
                                @method('patch')
                                <div class="form-group">
                                    <label for="statusteknis" class="col-form-label">Status:</label>
                                    <select class="form-control" id="statusteknis" name="statusteknis">
                                        <option value="" disabled>Pilih Status</option>
                                        <option value="0" {{ $item->statusteknis == false ? 'selected' : '' }}>Belum Disetujui</option>
                                        <option value="1" {{ $item->statusteknis == true ? 'selected' : '' }}>Sudah Disetujui</option>
                                    </select>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Save</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
                    @endforeach
                </tbody>
            </table>
            @else
            @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
            @endif
            <!-- User Table -->
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>No Registrasi</th>
                        <th>Tgl Masuk</th>
                        <th>Pengembang</th>
                        <th>Perumahan</th>
                        <th>Status</th>
                        <th>Keterangan</th>
                        <th>Update</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $item)
                    <tr>
                        <td>{{ $item->id_pengajuans}}</td>
                        <td>{{ $item->tanggal_masuk }}</td>
                        <td>{{ $item->user->name }}</td>
                        <td>{{ $item->nama_perumahan }}</td>
                        @if ($item->statusteknis == false)
                            <td> Belum Disetujui</td>
                        @else
                            <td> Sudah Disetujui</td>
                        @endif
                        <td>{{ $item->keterangan_teknis }}</td>
                        @if ($item->statusteknis == false)
                            <td>
                                <a href=" {{route('edit1', ['persetujuan'=>$item->id_pengajuans]) }}" class="btn btn-primary">Edit</a>
                            </td>
                        @else
                            <td>Telah Baik</td>
                        @endif
                    </tr>


                    @endforeach
                </tbody>
            </table>
            @endif
            <!-- Tambahkan ini di bagian bawah halaman -->


        </div>
    </div>
</div>
<!-- Hover table card end -->
@endsection
