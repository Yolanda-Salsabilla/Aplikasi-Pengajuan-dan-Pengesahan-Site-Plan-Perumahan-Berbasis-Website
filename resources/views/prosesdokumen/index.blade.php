@extends('layout.master')

@section('title', 'Halaman Proses Persetujuan Administrasi')
@section('subtitle', 'Proses Persetujuan Administrasi')

@section('content')
<!-- Hover table card start -->
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
                        <h4 class="text-custom">Persetujuan Dokumen</h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Page-header end -->


<div class="card">
    <div class="card-header">
        <h5>Data Persetujuan Dokumen Site Plan  Perumahan</h5>
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
                        <th>Upload Dokumen</th>
                        <th>TTD Staff</th>
                        <th class="text-center align-middle">TTD Pengembang</th>
                        <th>TTD Perencana</th>
                        <th>TTD Kabid</th>
                        <th>TTD Kadin</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $item)
                    <tr>
                        <td>{{ $item->id_pengajuans }}</td>
                        <td>{{ $item->user->name }}</td>
                        <td>{{ $item->nama_perumahan }}</td>
                        @if ( $item->dokumen->dokumen == '')
                            <td>
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#uploadModal-{{ $item->id }}">
                                    Upload Dokumen
                                </button>
                            </td>
                        @else
                        <td>
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#uploadModal-{{ $item->id }}">
                                    Upload Dokumen
                                </button>
                                <div class="row ml-1">
                                    {{ $item->dokumen->dokumen }}
                                </div>
                            </td>
                        @endif
                        @if($item->persetujuan->ttd_staff == '')
                        <td>
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#ttdStaffModal-{{ $item->id_pengajuans }}">
                                TTD Staff
                            </button>
                        </td>

                        @else
                        <td>
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#ttdStaffModal-{{ $item->id_pengajuans }}">
                                TTD Staff
                            </button>
                            <div class="row ml-1">
                                Selesai ACC
                            </div>
                        </td>
                        @endif
                        <td class="text-center align-middle">
                            <img src="{{ asset('storage/' . $item->user->ttd_pengembang) }}" alt="ttd_pengembang" style="width: 65px; height: 65px;">
                        </td>
                        <td class="text-center align-middle">
                            <img src="{{ asset('storage/ttd_perencanas/' . $item->ttd_perencana) }}" alt="ttd_perencana" style="width: 65px; height: 65px;">
                         </td>
                        <td class="text-center align-middle">
                            <img src="{{ asset('storage/' . $item->persetujuan->ttd_kabid) }}" alt="ttd_kabid" style="width: 65px; height: 65px;">
                        </td>
                        <td class="text-center align-middle">
                            <img src="{{ asset('storage/' . $item->persetujuan->ttd_kadin) }}" alt="ttd_kadin" style="width: 65px; height: 65px;">
                        <td>
                    </tr>
                    <div class="modal fade" id="uploadModal-{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="uploadModalLabel-{{ $item->id }}" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="uploadModalLabel-{{ $item->id }}">Upload Dokumen</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form action="{{ route('uploadDocument', ['id' => $item->id_pengajuans]) }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    @method('patch')
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label for="document">Pilih Dokumen</label>
                                            <input type="file" class="form-control" id="document" name="dokumen" accept="application/pdf">
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
                <div class="modal fade" id="ttdStaffModal-{{ $item->id_pengajuans }}" tabindex="-1" role="dialog" aria-labelledby="ttdStaffModalLabel-{{ $item->id_pengajuans }}" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="ttdStaffModalLabel-{{ $item->id_pengajuans }}">Tanda Tangan Staff</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        @if ($item->ttd_staff === '')

                                            <form action="{{ route('ttdstaff.update', ['id' => $item->id_pengajuans]) }}" method="post" enctype="multipart/form-data" data-item-id="{{ $item->id_pengajuans }}" data-canvas-prefix="signature-pad-staff-">
                                                @csrf
                                                @method('patch')
                                                <input type="hidden" name="pengajuan_id" value="{{ $item->id_pengajuans }}">
                                                <div class="form-group row">
                                                    <div class="col-sm-10">
                                                        <canvas id="signature-pad-staff-{{ $item->id_pengajuans }}" width="400" height="200" style="border: 1px solid #000000;"></canvas>
                                                        <input type="hidden" name="ttd_staff" id="ttd_staff-{{ $item->id_pengajuans }}">
                                                        <button type="button" class="btn btn-secondary" onclick="clearPad('staff', {{ $item->id_pengajuans }})">Clear</button>
                                                        <button type="submit" class="btn btn-primary">Simpan</button>
                                                    </div>
                                                </div>
                                            </form>

                            @else

                                <form action="{{ route('ttdstaff.update', ['id' => $item->id_pengajuans]) }}" method="post" enctype="multipart/form-data" data-item-id="{{ $item->id_pengajuans }}" data-canvas-prefix="signature-pad-staff-">
                                    @csrf
                                    @method('patch')
                                    <input type="hidden" name="pengajuan_id" value="{{ $item->id_pengajuans }}">
                                    <div class="form-group row">
                                        <div class="col-sm-10">
                                            <canvas id="signature-pad-staff-{{ $item->id_pengajuans }}" width="400" height="200" style="border: 1px solid #000000;"></canvas>
                                            <input type="hidden" name="ttd_staff" id="ttd_staff-{{ $item->id_pengajuans }}" value="{{ asset('storage/' . $item->persetujuan->ttd_staff) }}">
                                            <button type="button" class="btn btn-secondary" onclick="clearPad('staff', {{ $item->id_pengajuans }})">Clear</button>
                                            <button type="submit" class="btn btn-primary">Simpan</button>
                                        </div>
                                    </div>
                                </form>
                            @endif
                                    </div>
                                </div>
                            </div>
                    @endforeach
                </tbody>
            </table>
            @elseif(auth()->user()->role == 'kabid')
            <!-- Kabid Table -->
            <table class="table table-responsive table-hover">
                <thead>
                    <tr>
                        <th>No Registrasi</th>
                        <th>Tanggal Masuk</th>
                        <th>Pengembang</th>
                        <th>Perumahan</th>
                        <th>Dokumen</th>
                        <th>Tanda Tangan</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $item)
                    <tr>
                        <td>{{ $item->id_pengajuans }}</td>
                        <td>{{ $item->tanggal_masuk }}</td>
                        <td>{{ $item->user ? $item->user->name : 'No User' }}</td>
                        <td>{{ $item->nama_perumahan }}</td>
                        <td>
                        <a href="{{ asset('storage/dokumen/'. $item->dokumen->dokumen) }}" download>
                            <button class="btn btn-primary">
                                <i class="fas fa-download"></i> Unduh
                            </button>
                            </a>
                        </td>
                        @if ($item->ttd_kabid === '')
                            <td>
                            <form action="{{ route('ttdkabid.update', ['id' => $item->id_pengajuans]) }}" method="post" enctype="multipart/form-data" data-item-id="{{ $item->id_pengajuans }}" data-canvas-prefix="signature-pad-kabid-">
                                @csrf
                                @method('patch')
                                <input type="hidden" name="pengajuan_id" value="{{ $item->id_pengajuans }}">
                                <div class="form-group row">
                                    <div class="col-sm-10">
                                        <canvas id="signature-pad-kabid-{{ $item->id_pengajuans }}" width="400" height="200" style="border: 1px solid #000000;"></canvas>
                                        <input type="hidden" name="ttd_kabid" id="ttd_kabid-{{ $item->id_pengajuans }}">
                                        <button type="button" class="btn btn-secondary" onclick="clearPad('kabid', {{ $item->id_pengajuans }})">Clear</button>
                                        <button type="submit" class="btn btn-primary">Simpan</button>
                                    </div>
                                </div>
                            </form>
                        </td>
                        @else
                              <td>
                            <form action="{{ route('ttdkabid.update', ['id' => $item->id_pengajuans]) }}" method="post" enctype="multipart/form-data" data-item-id="{{ $item->id_pengajuans }}" data-canvas-prefix="signature-pad-kabid-">
                                @csrf
                                @method('patch')
                                <input type="hidden" name="pengajuan_id" value="{{ $item->id_pengajuans }}">
                                <div class="form-group row">
                                    <div class="col-sm-10">
                                        <canvas id="signature-pad-kabid-{{ $item->id_pengajuans }}" width="400" height="200" style="border: 1px solid #000000;"></canvas>
                                        <input type="hidden" name="ttd_kabid" id="ttd_kabid-{{ $item->id_pengajuans }}" value="{{ asset('storage/' . $item->persetujuan->ttd_kabid) }}">
                                        <button type="button" class="btn btn-secondary" onclick="clearPad('kabid', {{ $item->id_pengajuans }})">Clear</button>
                                        <button type="submit" class="btn btn-primary">Simpan</button>
                                    </div>
                                </div>
                            </form>
                        </td>
                        @endif

                    </tr>
                    @endforeach
                </tbody>
            </table>
            @else
            <!-- User Table -->
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>No Registrasi</th>
                        <th>Tanggal Masuk</th>
                        <th>Pengembang</th>
                        <th>Perumahan</th>
                        <th>Dokumen</th>
                        <th>Tanda Tangan</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $item)
                        <tr>
                            <td>{{ $item->id_pengajuans }}</td>
                            <td>{{ $item->tanggal_masuk }}</td>
                            <td>{{ $item->user->name }}</td>
                            <td>{{ $item->nama_perumahan }}</td>
                            <td>
                                <a href="{{ asset('storage/dokumen/'. $item->dokumen->dokumen) }}" download>
                                    <button class="btn btn-primary">
                                        <i class="fas fa-download"></i> Unduh
                                    </button>
                                </a>
                            </td>
                            @if ($item->ttd_kadin === '')
                                <td>
                                <form action="{{ route('ttdkadin.update', ['id' => $item->id_pengajuans]) }}" method="post" enctype="multipart/form-data" data-item-id="{{ $item->id_pengajuans }}" data-canvas-prefix="signature-pad-kadin-">
                                    @csrf
                                    @method('patch')
                                    <input type="hidden" name="pengajuan_id" value="{{ $item->id_pengajuans }}">
                                    <div class="form-group row">
                                        <div class="col-sm-10">
                                            <canvas id="signature-pad-kadin-{{ $item->id_pengajuans }}" width="400" height="200" style="border: 1px solid #000000;"></canvas>
                                            <input type="hidden" name="ttd_kadin" id="ttd_kadin-{{ $item->id_pengajuans }}">
                                            <button type="button" class="btn btn-secondary" onclick="clearPad('kadin', {{ $item->id_pengajuans }})">Clear</button>
                                            <button type="submit" class="btn btn-primary">Simpan</button>
                                        </div>
                                    </div>
                                </form>
                            </td>
                            @else
                                <td>
                                <form action="{{ route('ttdkadin.update', ['id' => $item->id_pengajuans]) }}" method="post" enctype="multipart/form-data" data-item-id="{{ $item->id_pengajuans }}" data-canvas-prefix="signature-pad-kadin-">
                                    @csrf
                                    @method('patch')
                                    <input type="hidden" name="pengajuan_id" value="{{ $item->id_pengajuans }}">
                                    <div class="form-group row">
                                        <div class="col-sm-10">
                                            <canvas id="signature-pad-kadin-{{ $item->id_pengajuans }}" width="400" height="200" style="border: 1px solid #000000;"></canvas>
                                            <input type="hidden" name="ttd_kadin" id="ttd_kadin-{{ $item->id_pengajuans }}" value="{{ asset('storage/' . $item->persetujuan->ttd_kadin) }}">
                                            <button type="button" class="btn btn-secondary" onclick="clearPad('kadin', {{ $item->id_pengajuans }})">Clear</button>
                                            <button type="submit" class="btn btn-primary">Simpan</button>
                                        </div>
                                    </div>
                                </form>
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

@foreach ($data as $item)
<!-- Modal -->

@endforeach

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/signature_pad@4.0.0/dist/signature_pad.umd.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
    const data = @json($data);

    // Store signature pads
    const signaturePads = {};

    data.forEach(item => {
        initializeSignaturePad(item.id_pengajuans, 'signature-pad-kabid-', 'ttd_kabid-', 'kabid');
        initializeSignaturePad(item.id_pengajuans, 'signature-pad-kadin-', 'ttd_kadin-', 'kadin');
        initializeSignaturePad(item.id_pengajuans, 'signature-pad-staff-', 'ttd_staff-', 'staff');
    });

    function initializeSignaturePad(itemId, canvasIdPrefix, inputIdPrefix, type) {
        const canvas = document.getElementById(canvasIdPrefix + itemId);
        if (!canvas) return;

        const signaturePad = new SignaturePad(canvas);
        signaturePads[type + itemId] = signaturePad;

        const existingSignature = document.getElementById(inputIdPrefix + itemId).value;
        if (existingSignature) {
            const img = new Image();
            img.src = existingSignature;
            img.onload = function () {
                const ctx = canvas.getContext('2d');
                ctx.clearRect(0, 0, canvas.width, canvas.height); // Clear the canvas first
                ctx.drawImage(img, 0, 0);
            };
        }

        document.querySelector(`form[data-item-id="${itemId}"][data-canvas-prefix="${canvasIdPrefix}"]`).addEventListener('submit', function (event) {
            const dataUrl = signaturePad.toDataURL('image/png');
            document.getElementById(inputIdPrefix + itemId).value = dataUrl;
        });
    }

    window.clearPad = function (type, itemId) {
        const signaturePad = signaturePads[type + itemId];
        if (signaturePad) {
            signaturePad.clear();
            const canvas = document.getElementById('signature-pad-' + type + '-' + itemId);
            if (canvas) {
                const ctx = canvas.getContext('2d');
                ctx.clearRect(0, 0, canvas.width, canvas.height);
            }
            document.getElementById('ttd_' + type + '-' + itemId).value = '';
        }
    }
});

</script>
@endsection
@endsection
