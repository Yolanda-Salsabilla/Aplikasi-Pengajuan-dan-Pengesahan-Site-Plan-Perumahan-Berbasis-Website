@extends('layout.master')

@section('title', 'Halaman Profil')
@section('subtitle', 'Profil')

@section('content')
<div class="container-fluid my-5">
    <div class="card">
        <div class="card-header text-center">
        </div>
        <div class="card-body">
            <div class="mb-4">
                <h3>Data History Pengajuan</h3>
                <div class="table-responsive">
                    <table class="table table-striped w-100">
                        <thead class="table-dark">
                            <tr>
                                <th>Nomor</th>
                                <th>History Pengajuan Site Plan Perumahan Oleh User</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($history as $item)
                            <tr>
                                <td>{{ $item->id }}</td>
                                <td>{{ $item->description }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
