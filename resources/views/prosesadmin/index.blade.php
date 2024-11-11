@extends('layout.master')

@section('title', 'Halaman Proses Persetujuan Administrasi')
@section('subtitle', 'Proses Persetujuan Administrasi')


<style>
    .btn-download {
        background-color: #d3d3d3; /* Warna abu-abu lembut */
        color: black;
        padding: 5px 10px;
        text-decoration: none;
        border-radius: 4px;
    }

    .btn-download:hover {
        background-color: #b3b3b3; /* Warna abu-abu yang lebih gelap saat di-hover */
    }
</style>
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
                        <h4 class="text-custom">Persetujuan Administrasi</h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Page-header end -->

<!-- Hover table card start -->
<div class="card">
    <div class="card-header">
        <h5>Proses Persetujuan Pengajuan Administrasi</h5>
        @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
            @endif
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
    <div class="card-block table-bordered">
        <div class="table-responsive">
            @if(auth()->user()->role == 'admin')
            <!-- Admin Table -->
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>No Registrasi</th>
                        <th>Pengembang</th>
                        <th>Perumahan</th>
                        <th>Surat</th>
                        <th>KTP</th>
                        <th>SBU</th>
                        <th>SPPT/PBB/Lunas PBB</th>
                        <th>Sertif Tanah</th>
                        <th>NPWP</th>
                        <th>SIUJK</th>
                        <th>Dokumen Lingkungan</th>
                        <th>SIUP/SITU/NIB</th>
                        <th>Tata Ruang</th>
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
                            <a href="{{ asset('storage/permohonan_pengesahans/' . $item->permohonan_pengesahan) }}" download class="btn-download">
                                {{ $item->permohonan_pengesahan }}
                            </a>
                        </td>
                        <td>
                            <a href="{{ asset('storage/surat_ktps/'. $item->surat_ktp) }}" download class="btn-download">{{ $item->surat_ktp }}</a>
                        </td>
                        <td>
                            <a href="{{ asset('storage/sbus/'. $item->sbu) }}" download class="btn-download">{{ $item->sbu }}</a>
                        </td>
                        <td>
                            <a href="{{ asset('storage/sspt_pbblunass/'. $item->sspt_pbblunas) }}" download class="btn-download">{{ $item->sspt_pbblunas }}</a>
                        </td>
                        <td>
                            <a href="{{ asset('storage/sertifs/'. $item->sertif) }}" download class="btn-download">{{ $item->sertif }}</a>
                        </td>
                        <td>
                            <a href="{{ asset('storage/npwp_perusahaans/'. $item->npwp_perusahaan) }}" download class="btn-download">{{ $item->npwp_perusahaan }}</a>
                        </td>
                        <td>
                            <a href="{{ asset('storage/slujks/'. $item->slujk) }}" download class="btn-download">{{ $item->slujk }}</a>
                        </td>
                        <td>
                            <a href="{{ asset('storage/dok_lingkungans/'. $item->dok_lingkungan) }}" download class="btn-download">{{ $item->dok_lingkungan }}</a>
                        </td>
                        <td>
                            <a href="{{ asset('storage/siup_situ_nibs/'. $item->siup_situ_nib) }}" download class="btn-download">{{ $item->siup_situ_nib }}</a>
                        </td>
                        <td>
                            <a href="{{ asset('storage/info_puprs/'. $item->info_pupr) }}" download class="btn-download">{{ $item->info_pupr }}</a>
                        </td>
                        <td>
                            {{ $item->statusadmin }}
                            <button class="btn btn-warning" data-toggle="modal" data-target="#statusModal-{{ $item->id_pengajuans }}" >Ubah Status</button>
                        </td>
                        @if (empty($item->keterangan_admin))
                            <td>
                                <button class="btn btn-primary" data-toggle="modal" data-target="#keteranganModal-{{ $item->id_pengajuans }}" data-id="{{ $item->id_pengajuans }}">Tambah Keterangan</button>
                            </td>
                        @else
                            <td>
                                <span>{{ $item->keterangan_admin }}</span>
                                <button class="btn btn-primary" data-toggle="modal" data-target="#keteranganModal-{{ $item->id_pengajuans }}" data-id="{{ $item->id_pengajuans }}">Edit Keterangan</button>
                            </td>
                        @endif
                        <td>{{ $item->ket_update_administrasi ? 'Sudah Di Update' : 'Belum Di Update' }} {{ $item->user->name }}</td>
                    </tr>


                    <!-- Keterangan Modal -->
                    <div class="modal fade" id="keteranganModal-{{ $item->id_pengajuans }}" tabindex="-1" role="dialog" aria-labelledby="keteranganModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="keteranganModalLabel">Keterangan</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form action="{{ route('keteranganadmin.update', ['id' => $item->id_pengajuans]) }}" method="POST">
                                        @csrf
                                        @method('patch')
                                        <div class="form-group">
                                            <label for="keterangan_admin" class="col-form-label">Keterangan:</label>
                                            <input type="text" class="form-control" id="keterangan_admin" name="keterangan_admin" value="{{ $item->keterangan_admin }}">
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

                    <!-- Status Modal -->
                    <div class="modal fade" id="statusModal-{{ $item->id_pengajuans }}" tabindex="-1" role="dialog" aria-labelledby="statusModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="statusModalLabel">Ubah Status {{ $item->user->name }}</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form action="{{ route('statusadmin.update', ['id' => $item->id_pengajuans]) }}" method="POST">
                                        @csrf
                                        @method('patch')
                                        <div class="form-group">
                                            <label for="statusadmin" class="col-form-label">Status:</label>
                                            <select class="form-control" id="statusadmin" name="statusadmin">
                                                <option value="" disabled>Pilih Status</option>
                                                <option value="0" {{ $item->statusadmin == false ? 'selected' : '' }}>Belum Disetujui</option>
                                                <option value="1" {{ $item->statusadmin == true ? 'selected' : '' }}>Sudah Disetujui</option>
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
                        <td>{{ $item->id_pengajuans }}</td>
                        <td>{{ $item->tanggal_masuk }}</td>
                        <td>{{ $item->user->name }}</td>
                        <td>{{ $item->nama_perumahan }}</td>
                        <td>{{ $item->statusadmin ? 'Sudah Disetujui' : 'Belum Disetujui' }}</td>
                        <td>{{ $item->keterangan_admin }}</td>
                        <td>
                            @if (!$item->statusadmin)
                                <a href="{{ route('pengajuan.edit', ['pengajuan' => $item->id_pengajuans]) }}" class="btn btn-primary">Edit</a>
                            @else
                                Telah Baik
                            @endif
                        </td>
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

@section('scripts')
{{-- <script>
    $('#statusModal-{{ $item->id_pengajuan }}').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget);
        var id = button.data('id_pengajuan');
        var status = button.data('status');
        var action = '{{ route("statusadmin.update", ":id_pengajuan") }}';
        action = action.replace(':id_pengajuan', id);

        var modal = $(this);
        modal.find('form').attr('action', action);
        modal.find('.modal-body #statusadmin').val(status);
    });
</script> --}}
@endsection
