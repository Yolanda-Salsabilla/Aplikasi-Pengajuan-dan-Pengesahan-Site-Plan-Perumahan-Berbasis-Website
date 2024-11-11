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
        .modal-header {
            display: flex;
            align-items: center;
        }
        .modal-title img {
            height: 30px;
            margin-right: 10px;
        }
        .modal-content {
            border-radius: 10px;
        }
        .form-check-label {
            margin-left: 5px;
        }

    </style>

</head>

<body>

  <!-- ======= Top Bar ======= -->
  <section id="topbar" class="d-flex align-items-center">
    <div class="container d-flex justify-content-center justify-content-md-between">
      <div class="contact-info d-flex align-items-center">
      </div>
    </div>
  </section>

  <!-- ======= Header ======= -->
  <header id="header" class="d-flex align-items-center">
    <div class="container d-flex align-items-center justify-content-between">

      <div class="">
      <a href="/dashboard">
                            <img class="img-fluid " src="{{asset('assets1')}}/images/logo1.png" alt="Theme-Logo" />
                        </a>
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="index.html"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
      </div>

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto active" href="#hero">Home</a></li>
          <li><a class="nav-link scrollto" href="#testimonials">About</a></li>


        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->

 <!-- ======= Hero Section ======= -->
<section id="hero" class="d-flex flex-column justify-content-center align-items-center">
    <div class="container" data-aos="fade-in">
      <h1>Welcome to E-Site Plan</h1>
      <h4>Dinas Perumahan Rakyat dan Kawasan Permukiman serta Pertanahan Kabupaten Ogan Ilir </h4>
      <div class="d-flex align-items-center">
        <i class="bx bxs-right-arrow-alt get-started-icon"></i>
        <!-- Button trigger modal -->
        <button type="button" class="btn-get-started scrollto" data-bs-toggle="modal" data-bs-target="#loginModal">
          Login
        </button>
      </div>
    </div>
  </section><!-- End Hero -->

  <!-- Login Modal -->
  <div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="loginModalLabel">Login</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="mb-3">
              <label for="email" :value="__('Email')" class="form-label">Email address</label>
              <input type="email" class="form-control" id="email" name="email" :value="old('email')" required autofocus autocomplete="username" aria-describedby="emailHelp">
              <x-input-error :messages="$errors->get('email')" class="mt-2" />
              <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
            </div>
            <div class="mb-3">
              <label for="password" :value="__('Password')" class="form-label">Password</label>
              <input type="password" class="form-control" id="password" name="password" required autocomplete="current-password">
              <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>
            
            <button type="submit" class="btn btn-primary">{{ __('Log in') }}</button>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#registerModal" data-bs-dismiss="modal">Register</button>
        </div>
      </div>
    </div>
  </div>

  <!-- Register Modal -->
  <div class="modal fade" id="registerModal" tabindex="-1" aria-labelledby="registerModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="registerModalLabel">Register</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form method="POST" action="{{ route('register') }}">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label" :value="__('Name')">Name</label>
                <input id="name" type="text" class="form-control" name="name" :value="old('name')" required autofocus autocomplete="name" >
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
              </div>
            <div class="mb-3">
              <label for="email" class="form-label" :value="__('Email')">Email address</label>
              <input type="email" class="form-control" id="email" name="email" :value="old('email')" required autocomplete="username">
              <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>
            <div class="mb-3">
              <label for="password" class="form-label" :value="__('Password')">Password</label>
              <input type="password" class="form-control" id="password" name="password" required autocomplete="new-password">
              <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>
            <div class="mb-3">
              <label for="password_confirmation" class="form-label" :value="__('Confirm Password')">Confirm Password</label>
              <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required autocomplete="new-password">
              <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
            </div>
            <button type="submit" class="btn btn-primary">Register</button>
          </form>
        </div>
      </div>
    </div>
  </div>


  <main id="main">

    <!-- ======= Why Us Section ======= -->
    <section id="why-us" class="why-us">
      <div class="container">

        <div class="row">
          <div class="col-xl-4 col-lg-5" data-aos="fade-up">
            <div class="content">
              <h3>Aplikasi Pengajuan dan Pengesahan Site Plan Perumahan </h3>
              <p>
              Sebuah sistem digital yang dirancang untuk memfasilitasi proses pengajuan dan pengesahan rencana tata letak perumahan.
              </p>
            </div>
          </div>
          <div class="col-xl-8 col-lg-7 d-flex">
            <div class="icon-boxes d-flex flex-column justify-content-center">
              <div class="row">
                <div class="col-xl-4 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="100">
                  <div class="icon-box mt-4 mt-xl-0">
                    <i class="bx bx-receipt"></i>
                    <h4>Waktu Pelayanan</h4>
                    <p>21 Hari Kerja</p>
                  </div>
                </div>
                <div class="col-xl-4 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="200">
                  <div class="icon-box mt-4 mt-xl-0">
                    <i class="bx bx-cube-alt"></i>
                    <h4>Biaya / Tarif</h4>
                    <p>Tidak Dipungut Biaya</p>
                  </div>
                </div>
                <div class="col-xl-4 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="300">
                  <div class="icon-box mt-4 mt-xl-0">
                    <i class="bx bx-images"></i>
                    <h4>Produk Pelayanan</h4>
                    <p>Dokumen Pengesahan Site Plan Perumahan</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>
    </section><!-- End Why Us Section -->


    <!-- ======= Testimonials Section ======= -->
    <div class="section-title">
    <section id="testimonials" class="testimonials">
      <div class="container position-relative" data-aos="fade-up">


      <div class="testimonials-slider swiper" data-aos="fade-up" data-aos-delay="100">
          <div class="swiper-wrapper">
            <div class="swiper-slide">
              <div class="testimonial-item">
                <img src="assets/img/testimonials/about.png" class="testimonial-img" alt="">
                <p>
                <h3>Deskripsi</h3>
                  <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                  Dinas Perumahan Rakyat dan Kawasan Permukiman serta Pertanahan merupakan salah satu instansi di bawah Pemerintah Kabupaten Ogan Ilir, Sumatera Selatan, yang bertanggung jawab atas urusan pemerintahan di bidang perumahan dan kawasan permukiman serta pertanahan. Instansi ini dibentuk untuk mengelola dan mengatur pembangunan perumahan, kawasan permukiman, serta penggunaan lahan secara efisien dan berkelanjutan. Tujuannya adalah untuk memenuhi kebutuhan masyarakat akan tempat tinggal dan pemanfaatan lahan yang optimal demi kesejahteraan masyarakat.
                  <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                </p>
              </div>
            </div><!-- End testimonial item -->
            <div class="swiper-slide">
              <div class="testimonial-item">
              <img src="assets/img/testimonials/about.png" class="testimonial-img" alt="">
                <p>
                <h3>Visi dan Misi</h3>
                  <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                  Visi: Menjadi Intitusi yang Unggul dan Profesional untuk Mewujudkan Pembangunan, Pembangunan Perumahan Rakyat dan Kawasan Permukiman,  Sarana Prasarana Umum dan Tata Pertanahan yang Berkeadilan. Misi : Mewujudkan SDM yang professional dalam hal perumahan rakyat dan kawasan permukiman serta pertanahan
                 ,Meningkatkan kualitas perumahan rakyat, Meningkatkan kualitas kawasan permukiman, Meningkatkan tata kelola pertanahan
                  <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                </p>
              </div>
            </div><!-- End testimonial item -->
            <div class="swiper-slide">
              <div class="testimonial-item">
              <img src="assets/img/testimonials/about.png" class="testimonial-img" alt="">
                <h3>Motto Pelayanan</h3>
                <p>
                  <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                  Berupaya menyelenggarakan pelayanan dengan sebaik-baiknnya dengan didasari sikap ramah dan sopan dalam menyelenggarakan pelayanan.
                  Bekerja sama secara cerdas dengan prosedur yang berlaku serta tepat waktu dengan melakukan peningkatan mutu layanan melalui perbaikan sarana dan peasarana serta tertib administrasi.
                  Melayani dan memberi solusi terhadap permasalahan dengan proses penyelesaian sesuai ketentuan yang berlaku dan senantiasa mengevaluasi sistem dan prosedur pelayanan publik.

                  <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                </p>
              </div>
            </div><!-- End testimonial item -->
          </div>
          <div class="swiper-pagination"></div>
        </div>

      </div>
    </section><!-- End Testimonials Section -->



    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
      <div class="container">

        <div class="section-title">
          <h2 data-aos="fade-up">Contact</h2>
          </div>

        <div class="row justify-content-center">

          <div class="col-xl-3 col-lg-4 mt-4" data-aos="fade-up">
            <div class="info-box">
              <i class="bx bx-map"></i>
              <h3>Our Address</h3>
              <p>Jalan Lintas Timur KM.38 Perkantoran Terpadu Tanjung Senai Indralaya</p>
            </div>
          </div>


        <div class="row justify-content-center" data-aos="fade-up" data-aos-delay="300">
          <div class="col-xl-9 col-lg-12 mt-4">
            <form action="forms/contact.php" method="post" role="form" class="php-email-form">
              <div class="row">
                <div class="col-md-6 form-group">
                  <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" required>
                </div>
                <div class="col-md-6 form-group mt-3 mt-md-0">
                  <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" required>
                </div>
              </div>
              <div class="form-group mt-3">
                <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" required>
              </div>
              <div class="form-group mt-3">
                <textarea class="form-control" name="message" rows="5" placeholder="Message" required></textarea>
              </div>
              <div class="my-3">
                <div class="loading">Loading</div>
                <div class="error-message"></div>
                <div class="sent-message">Your message has been sent. Thank you!</div>
              </div>
              <div class="text-center"><button type="submit">Send Message</button></div>
            </form>
          </div>

        </div>

      </div>
    </section><!-- End Contact Section -->

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer">

    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-3 col-md-6 footer-contact">
            <h3>Flexor</h3>
            <p>
              A108 Adam Street <br>
              New York, NY 535022<br>
              United States <br><br>
              <strong>Phone:</strong> +1 5589 55488 55<br>
              <strong>Email:</strong> info@example.com<br>
            </p>
          </div>

          <div class="col-lg-2 col-md-6 footer-links">
            <h4>Useful Links</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Home</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">About us</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Services</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Terms of service</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Privacy policy</a></li>
            </ul>
          </div>

          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Our Services</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Web Design</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Web Development</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Product Management</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Marketing</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Graphic Design</a></li>
            </ul>
          </div>

          <div class="col-lg-4 col-md-6 footer-newsletter">
            <h4>Join Our Newsletter</h4>
            <p>Tamen quem nulla quae legam multos aute sint culpa legam noster magna</p>
            <form action="" method="post">
              <input type="email" name="email"><input type="submit" value="Subscribe">
            </form>
          </div>

        </div>
      </div>
    </div>

    <div class="container d-lg-flex py-4">

      <div class="me-lg-auto text-center text-lg-start">
        <div class="copyright">
          &copy; Copyright <strong><span>Flexor</span></strong>. All Rights Reserved
        </div>
        <div class="credits">
          <!-- All the links in the footer should remain intact. -->
          <!-- You can delete the links only if you purchased the pro version. -->
          <!-- Licensing information: https://bootstrapmade.com/license/ -->
          <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/flexor-free-multipurpose-bootstrap-template/ -->
          Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
        </div>
      </div>
      <div class="social-links text-center text-lg-right pt-3 pt-lg-0">
        <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
        <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
        <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
        <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
        <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
      </div>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src={{"assets/vendor/aos/aos.js"}}></script>
  <script src={{"assets/vendor/bootstrap/js/bootstrap.bundle.min.js"}}></script>
  <script src={{"assets/vendor/glightbox/js/glightbox.min.js"}}></script>
  <script src={{"assets/vendor/isotope-layout/isotope.pkgd.min.js"}}></script>
  <script src={{"assets/vendor/swiper/swiper-bundle.min.js"}}></script>
  <script src={{"assets/vendor/php-email-form/validate.js"}}></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>


  <!-- Template Main JS File -->
  <script src={{"assets/js/main.js"}}></script>

</body>

</html>
