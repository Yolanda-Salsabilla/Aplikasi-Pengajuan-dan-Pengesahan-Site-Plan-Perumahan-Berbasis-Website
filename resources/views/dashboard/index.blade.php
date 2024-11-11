@extends('layout.master')

@section('title', 'Halaman Pengesahan Siteplan')
@section('subtitle', 'Pengesahan Siteplan')

@section('content')

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Flexor Bootstrap Template - Index</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href={{"assets/img/favicon.png"}} rel="icon">
  <link href={{"assetsimg/apple-touch-icon.png"}} rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href={{"assets/vendor/aos/aos.css"}} rel="stylesheet">
  <link href={{"assets/vendor/bootstrap/css/bootstrap.min.css"}} rel="stylesheet">
  <link href={{"assets/vendor/bootstrap-icons/bootstrap-icons.css"}} rel="stylesheet">
  <link href={{"assets/vendor/boxicons/css/boxicons.min.css"}} rel="stylesheet">
  <link href={{"assets/vendor/glightbox/css/glightbox.min.css"}} rel="stylesheet">
  <link href={{"assets/vendor/swiper/swiper-bundle.min.css"}} rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">


  <!-- Template Main CSS File -->
  <link href={{"assets/css/style.css"}} rel="stylesheet">

<style>
    .custom-card {
        border-radius: 15px;
        padding: 20px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        transition: transform 0.3s, box-shadow 0.3s;
    }
    .custom-card .icon {
        border-radius: 10px;
        padding: 10px;
        display: inline-block;
    }
    .custom-card h5 {
        margin-top: 10px;
        font-weight: bold;
    }
    .custom-card .card-text {
        font-weight: bold;
        font-size: 1.2rem;
    }
    .card1 { background-color: #3d81b8; }
    .card2 { background-color: #6a994e; }
    .card3 { background-color: #588b8b; }
    .card4 { background-color: #0073cc; }
    .card5 { background-color: #6a994e  ; }
    .card6 { background-color: #bc4749; }
    .custom-card .icon i {
        font-size: 3.5rem; /* Increase the size of the icons */
    }
    .custom-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
    }
</style>

@if (auth()->user()->role == 'user')

 <!-- ======= Hero Section ======= -->
 <section id="heroo" class="d-flex flex-column justify-content-center align-items-center">
    <div class="container" data-aos="fade-in">
      <h1>Welcome to E-Site Plan</h1>
      <h4>Dinas Perumahan Rakyat dan Kawasan Permukiman serta Pertanahan Kabupaten Ogan Ilir </h4>
      <div class="d-flex align-items-center">
        <i class="bx bxs-right-arrow-alt get-started-icon"></i>
        <!-- Button trigger modal -->

      </div>
    </div>
  </section><!-- End Hero -->


<div class="container mt-5">
  <div class="row" style="margin-top: 150px;"> <!-- Menambahkan margin-top -->
  <div class="col-sm-6">
    <div class="card">
      <div class="card-body">
      <div class="d-flex align-items-center">
      <i class="bi bi-file-earmark-fill me-2" style="font-size: 1.5rem;"></i>
      <h5 class="card-title mb-2">Data Pengajuan</h5>
      </div>
      <p class="card-text" style="font-size: 1.5rem; font-weight: bold; margin-left: 38px;">{{ $pengajuanUser }}</p>
        <a href="/pengajuan" class="btn btn-primary">Lihat Selengkapnya</a>
      </div>
    </div>
  </div>
  <div class="col-sm-6">
    <div class="card">
      <div class="card-body">
      <div class="d-flex align-items-center">
      <i class="bi bi-file-earmark-check-fill me-2" style="font-size: 1.5rem;"></i>
      <h5 class="card-title mb-2">Data Pengesahan</h5>
      </div>
      <p class="card-text" style="font-size: 1.5rem; font-weight: bold; margin-left: 38px;">{{ $pengesahanUser }}</p>
        <a href="/pengesahan" class="btn btn-primary">Lihat Selengkapnya</a>
      </div>
      </div>
    </div>
  </div>
</div>


<style>
    .custom-card {
        background-colo r: #f8f9fa; /* Warna latar belakang */
        border-radius: 15px; /* Membuat sudut card menjadi melengkung */
        box-shadow: 0px 0px 15px 0px rgba(0, 0, 0, 0.1); /* Efek bayangan card */
    }
    
    .custom-card:hover {
        transform: translateY(-5px); /* Efek hover menggeser card ke atas */
        transition: transform 0.3s ease; /* Efek transisi smooth saat hover */
    }
    
    .card-body {
        padding: 18px; /* Padding dalam card */
    }
    
    .card-title {
        color: #003B74; /* Warna teks judul */
    }
    
    .text-left {
        color: #003B74; /* Warna teks langkah-langkah */
        font-size: 16px; /* Ukuran teks langkah-langkah */
        line-height: 2.1; /* Jarak antara baris */
    }
</style>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-10 mb-8">
            <a class="card text-center custom-card" href="#">
                <div class="card-body">
                <h5 class="card-title">Mekanisme Pengajuan Site Plan Perumahan</h5>
                    <ol class="text-left">
                        <li>Pengembang mengajukan Site Plan dengan mengisi dan upload kelengkapan persyaratan berkas administrasi dan teknis.</li>
                        <li>Berkas administrasi diperiksa jika lengkap disetujui, jika tidak pengembang harus edit pengajuan untuk dilengkapi.</li>
                        <li>Jika persyaratan administrasi disetujui maka petugas akan meninjau lokasi/ Survey lapangan.</li>
                        <li>Berkas teknis diperiksa jika rancangan sesuai disetujui, jika tidak  pengembang harus edit pengajuan untuk dibenarkan.</li>
                        <li>Hasil pengajuan berbentuk dokumen pengesahan site plan perumahan yang telah ditandatangani oleh yang bersangktan</li>
                    </ol>
                </div>
            </a>
        </div>
    </div>
</div>


@elseif (auth()->user()->role == 'admin')

 <!-- ======= Hero Section ======= -->
 <section id="heroo" class="d-flex flex-column justify-content-center align-items-center">
    <div class="container" data-aos="fade-in">
      <div class="d-flex align-items-center">
        <i class="bx bxs-right-arrow-alt get-started-icon"></i>
        <!-- Button trigger modal -->
      </div>
    </div>
  </section><!-- End Hero -->


<div class="container mt-5">
  <div class="row" style="margin-top: 150px;"> <!-- Menambahkan margin-top -->
    <div class="col-sm-6">
        <div class="card">
        <div class="card-body">
        <div class="d-flex align-items-center">
        <i class="bi bi-people-fill me-2" style="font-size: 1.5rem;"></i>
        <h5 class="card-title mb-2">Data User</h5>
        </div>
        <p class="card-text" style="font-size: 1.5rem; font-weight: bold; margin-left: 38px;">{{ $user }}</p>
            <a href="/user" class="btn btn-primary">Lihat Selengkapnya</a>
        </div>
        </div>
    </div>
    <div class="col-sm-6">
        <div class="card">
        <div class="card-body">
        <div class="d-flex align-items-center">
        <i class="bi bi-file-earmark-fill me-2" style="font-size: 1.5rem;"></i>
        <h5 class="card-title mb-2">Data Pengajuan</h5>
        </div>
        <p class="card-text" style="font-size: 1.5rem; font-weight: bold; margin-left: 38px;">{{ $pengajuan }}</p>
            <a href="/pengembangan" class="btn btn-primary">Lihat Selengkapnya</a>
        </div>
        </div>
        </div>
        <div class="col-sm-6">
    <div class="card">
      <div class="card-body">
      <div class="d-flex align-items-center">
      <i class="bi bi-file-earmark-check-fill me-2" style="font-size: 1.5rem;"></i>
      <h5 class="card-title mb-2">Data Pengesahan</h5>
      </div>
      <p class="card-text" style="font-size: 1.5rem; font-weight: bold; margin-left: 38px;">{{ $pengesahan}}</p>
        <a href="/pengesahan" class="btn btn-primary">Lihat Selengkapnya</a>
      </div>
      </div>
    </div>
    <div class="col-sm-6">
    <div class="card">
      <div class="card-body">
      <div class="d-flex align-items-center">
      <i class="bi bi-back me-2" style="font-size: 1.5rem;"></i>
      <h5 class="card-title mb-2">Data Laporan Rekapitulasi</h5>
      </div>
      <p class="card-text" style="font-size: 1.5rem; font-weight: bold; margin-left: 38px;">{{ $pengajuan }}</p>
        <a href="/laporan" class="btn btn-primary">Lihat Selengkapnya</a>
      </div>
      </div>
    </div>
  </div>
</div>

@elseif (auth()->user()->role == 'kabid')

 <!-- ======= Hero Section ======= -->
 <section id="heroo" class="d-flex flex-column justify-content-center align-items-center">
    <div class="container" data-aos="fade-in">
      <div class="d-flex align-items-center">
        <i class="bx bxs-right-arrow-alt get-started-icon"></i>
        <!-- Button trigger modal -->
      </div>
    </div>
  </section><!-- End Hero -->

  <div class="container mt-5">
  <div class="row" style="margin-top: 150px;"> <!-- Menambahkan margin-top -->
  <div class="col-sm-6">
    <div class="card">
      <div class="card-body">
      <div class="d-flex align-items-center">
      <i class="bi bi-file-earmark-check-fill me-2" style="font-size: 1.5rem;"></i>
      <h5 class="card-title mb-2">Data Pengesahan</h5>
      </div>
      <p class="card-text" style="font-size: 1.5rem; font-weight: bold; margin-left: 38px;">{{ $pengesahan }}</p>
        <a href="/pengesahan" class="btn btn-primary">Lihat Selengkapnya</a>
      </div>
    </div>
  </div>
  <div class="col-sm-6">
    <div class="card">
      <div class="card-body">
      <div class="d-flex align-items-center">
      <i class="bi bi-back me-2" style="font-size: 1.5rem;"></i>
      <h5 class="card-title mb-2">Data Laporan Rekapitulasi</h5>
      </div>
      <p class="card-text" style="font-size: 1.5rem; font-weight: bold; margin-left: 38px;">{{ $pengajuan }}</p>
        <a href="/laporan" class="btn btn-primary">Lihat Selengkapnya</a>
      </div>
      </div>
    </div>
  </div>
</div>


@else
<section id="heroo" class="d-flex flex-column justify-content-center align-items-center">
    <div class="container" data-aos="fade-in">
      <div class="d-flex align-items-center">
        <i class="bx bxs-right-arrow-alt get-started-icon"></i>
        <!-- Button trigger modal -->
      </div>
    </div>
  </section><!-- End Hero -->

  <div class="container mt-5">
  <div class="row" style="margin-top: 150px;"> <!-- Menambahkan margin-top -->
  <div class="col-sm-6">
    <div class="card">
      <div class="card-body">
      <div class="d-flex align-items-center">
      <i class="bi bi-file-earmark-check-fill me-2" style="font-size: 1.5rem;"></i>
      <h5 class="card-title mb-2">Data Pengesahan</h5>
      </div>
      <p class="card-text" style="font-size: 1.5rem; font-weight: bold; margin-left: 38px;">{{ $pengesahan }}</p>
        <a href="/pengesahan" class="btn btn-primary">Lihat Selengkapnya</a>
      </div>
    </div>
  </div>
  <div class="col-sm-6">
    <div class="card">
      <div class="card-body">
      <div class="d-flex align-items-center">
      <i class="bi bi-back me-2" style="font-size: 1.5rem;"></i>
      <h5 class="card-title mb-2">Data Laporan Rekapitulasi</h5>
      </div>
      <p class="card-text" style="font-size: 1.5rem; font-weight: bold; margin-left: 38px;">{{ $pengajuan }}</p>
        <a href="/laporan" class="btn btn-primary">Lihat Selengkapnya</a>
      </div>
      </div>
    </div>
  </div>
</div>


@endif

@endsection
