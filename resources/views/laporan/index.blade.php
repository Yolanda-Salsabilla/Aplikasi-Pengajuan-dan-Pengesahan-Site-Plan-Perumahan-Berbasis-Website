@extends('layout.master')

@section('title', 'Halaman Pengesahan Siteplan')
@section('subtitle', 'Pengesahan Siteplan')

@section('content')
<!-- Hover table card start -->
<div class="card">
    <div class="card-header">
        <h4>Laporan Rekapitulasi Site Plan Perumahan</h4>
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
            <!-- Search bar -->
            <form method="GET" action="{{ route('laporan') }}" class="mb-4">
                <div class="form-row align-items-end">
                    <div class="col-md-3 my-1">
                        <label for="start_date" class="ml-1">Tanggal Masuk Mulai</label>
                        <input type="date" class="form-control" name="start_date" value="{{ request('start_date') }}">
                    </div>
                    <div class="col-md-3 my-1">
                        <label for="end_date" class="ml-1">Tanggal Masuk Akhir</label>
                        <input type="date" class="form-control" name="end_date" value="{{ request('end_date') }}">
                    </div>
                    <div class="col-md-3 my-1">
                        <label for="nama_perumahan" class="ml-1">Nama Perumahan</label>
                        <input type="text" class="form-control" name="nama_perumahan" placeholder="Nama Perumahan" value="{{ request('nama_perumahan') }}">
                    </div>
                    <div class="col-md-3 my-1">
                        <button class="btn btn-primary btn-block" type="submit"><i class="fas fa-search"></i> Cari</button>
                    </div>
                </div>
            </form>

            <!-- Print PDF form -->
            <form method="POST" action="{{ route('cetak.pdf') }}" class="mb-3">
                @csrf
                <div class="form-row align-items-end">
                    <div class="col-md-3 my-1">
                        <label for="start_date" class="ml-1">Tanggal Masuk Mulai</label>
                        <input type="date" class="form-control" name="start_date" value="{{ request('start_date') }}">
                    </div>
                    <div class="col-md-3 my-1">
                        <label for="end_date" class="ml-1">Tanggal Masuk Akhir</label>
                        <input type="date" class="form-control" name="end_date" value="{{ request('end_date') }}">
                    </div>
                    <div class="col-md-3 my-1">
                        <label for="nama_perumahan" class="ml-1">Nama Perumahan</label>
                        <input type="text" class="form-control" name="nama_perumahan" placeholder="Nama Perumahan" value="{{ request('nama_perumahan') }}">
                    </div>
                    <div class="col-md-3 my-1">
                        <button type="submit" class="btn btn-success btn-block"><i class="fas fa-file-pdf"></i> Cetak PDF</button>
                    </div>
                </div>
            </form>

            <!-- Admin Table -->
            <table class="table table-hover table-striped table-bordered">
                <thead class="thead-dark">
                    <tr>
                        <th rowspan="2" class="align-middle">No Registrasi</th>
                        <th rowspan="2" class="align-middle">
                            <a href="{{ route('laporan', array_merge(request()->query(), ['sort_by' => 'tanggal_masuk', 'sort_order' => request('sort_order') == 'asc' ? 'desc' : 'asc'])) }}">
                                Tgl Masuk
                                @if(request('sort_by') == 'tanggal_masuk')
                                    <i class="fas fa-sort-{{ request('sort_order') == 'asc' ? 'up' : 'down' }}"></i>
                                @endif
                            </a>
                        </th>
                        <th rowspan="2" class="align-middle">
                            <a href="{{ route('laporan', array_merge(request()->query(), ['sort_by' => 'tanggal_selesai', 'sort_order' => request('sort_order') == 'asc' ? 'desc' : 'asc'])) }}">
                                Tgl Selesai
                                @if(request('sort_by') == 'tanggal_selesai')
                                    <i class="fas fa-sort-{{ request('sort_order') == 'asc' ? 'up' : 'down' }}"></i>
                                @endif
                            </a>
                        </th>
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
                        <th>Koordinat Latitude</th>
                        <th>Koordinat Longitude</th>
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
    </div>
</div>
<!-- Hover table card end -->
@endsection
