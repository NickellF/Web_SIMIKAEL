<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>Pengajuan Magang SIMIKAEL</title>
    <meta name="description" content="" />
    <meta name="keywords" content="" />


    <link href="{{ asset('assets/img/smk.png') }}" rel="icon" />

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com" rel="preconnect" />
    <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Source+Sans+Pro:ital,wght@0,200;0,300;0,400;0,600;0,700;0,900;1,200;1,300;1,400;1,600;1,700;1,900&display=swap"
      rel="stylesheet"
    />

    <!-- Vendor CSS Files -->
    <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/vendor/aos/aos.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet" />

    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>

    <!-- Main CSS File -->
    <link rel="stylesheet" href="{{ asset('assets/css/main.css') }}">

  </head>

  <body class="index-page">
    <header id="header" class="header d-flex align-items-center sticky-top">
      <div
        class="container-fluid position-relative d-flex align-items-center justify-content-between"
      >
      
        <a href="{{ route('home') }}"
          class="logo d-flex align-items-center me-auto me-xl-0"
        >
        <h1 class="sitename"><img src="assets/img/smk.png" height="100px"></h1> 
          <!-- Uncomment the line below if you also wish to use an image logo -->
          <!-- <img src="assets/img/logo.png" alt=""> -->
          
          <h1 class="sitename">Pengajuan Magang SIMIKAEL</h1>
        
          <span></span>
        </a>

        <nav id="navmenu" class="navmenu">
          <ul>
            <li>
              <a href="{{ route('home') }}#hero" class="active">Home<br /></a>
            </li>
            <li><a href="{{ route('home') }}#about">About</a></li>
            <li><a href="{{ route('home') }}#services">Jurusan</a></li>
            <li><a href="{{ route('home') }}#portfolio">Galeri</a></li>
            <li><a href="{{ route('home') }}#contact">Contact</a></li>
          </ul>
          <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
        </nav>

        <div class="d-flex align-items-center gap-2">
          @auth
              <form method="POST" action="{{ route('logout') }}" style="margin: 0;">
                  @csrf
                  <button type="submit" class="btn-getstarted" style="margin: 0 5px;">Logout</button>
              </form>
              @if(auth()->user()->role == 'admin')
                  <a class="btn-getstarted" href="{{ route('admin.dashboard') }}" style="margin: 0 5px;">Dashboard</a>
              @elseif(auth()->user()->role == 'guru')
                  <a class="btn-getstarted" href="{{ route('guru.dashboard') }}" style="margin: 0 5px;">Dashboard</a>
              @elseif(auth()->user()->role == 'siswa')
                  <a class="btn-getstarted" href="{{ route('siswa.dashboard') }}" style="margin: 0 5px;">Dashboard</a>
              @endif
          @else
              <a class="btn-getstarted" href="{{ route('login') }}">Login</a>
          @endauth
      </div>
      </div>
    </header>

    <main class="main">
      <!-- Hero Section -->
      <section id="hero" class="hero section">
        <div class="container d-flex flex-column justify-content-center align-items-center text-center position-relative" data-aos="zoom-out">
            <img src="{{ asset('assets/img/edu.svg') }}" class="img-fluid animated" alt="" />
            <h1>Welcome to <span>Pengajuan Magang SIMIKAEL</span></h1>
            <p>
              A place where innovation, skill and the future meet! 🌟
              Get ready to become a superior generation with quality education and the best practical experience. 🚀💡
            </p>
            <a href="#about" class="btn-get-started scrollto">Get Started</a>
        </div>
    </section>

      <!-- About Section -->
      <section id="about" class="about section">
        <!-- Section Title -->
        <div class="container section-title" data-aos="fade-up">
          <h2>Profil SIMIKAEL</h2>
          <p>
          </p>
        </div>
        <!-- End Section Title -->

        <div class="container" data-aos="fade-up">
          <div class="row g-4 g-lg-5" data-aos="fade-up" data-aos-delay="200">
            <div class="col-lg-5">
              <div class="about-img">
                <img
                  src="{{ asset('assets/img/michael.jpg') }}"
                  class="img-fluid"
                  alt=""
                />
              </div>
            </div>

            <div class="col-lg-7">
              <h3 class="pt-0 pt-lg-5">
                Profil Singkat SIMIKAEL
              </h3>

              <!-- Tabs -->
              <ul class="nav nav-pills mb-3">
                <li>
                  <a
                    class="nav-link active"
                    data-bs-toggle="pill"
                    href="#about-tab1"
                    >Sejarah Singkat</a>
                </li>
                <li>
                  <a class="nav-link" data-bs-toggle="pill" href="#about-tab2"
                    >Struktur Pengajuan PKL</a>
                </li>
                <li>
                  <a class="nav-link" data-bs-toggle="pill" href="#about-tab3"
                    >Jurusan dalam Program PKL</a>
                </li>
                <li>
                  <a class="nav-link" data-bs-toggle="pill" href="#about-tab4"
                    >Visi Misi</a>
                </li>
              </ul>
              <!-- End Tabs -->

              <!-- Tab Content -->
              <div class="tab-content">
                <div class="tab-pane fade show active" id="about-tab1">
                  <p class="fst-italic">
                    Simikael didirikan sebagai wadah inovatif untuk memfasilitasi siswa dalam mengembangkan potensi dan pengalaman praktis melalui Program Praktik Kerja Lapangan (PKL). Berawal dari pemikiran untuk menjembatani kesenjangan antara teori akademis dan praktik industri, Simikael hadir sebagai solusi komprehensif bagi siswa untuk mempersiapkan diri menghadapi dunia kerja.
                  </p>
                  <div class="d-flex align-items-center mt-4"></div>
                  <div class="d-flex align-items-center mt-4"></div>
                  <div class="d-flex align-items-center mt-4"></div>
                </div>
                <!-- End Tab 1 Content -->

                <div class="tab-pane fade" id="about-tab2">
                  <div class="d-flex align-items-center mt-4">
                    <h4>Struktur Pengajuan PKL SIMIKAEL</h4>
                  </div>
                  <p>
                    <ul>
                      <li>Pendaftaran Online</li>
                      <li>Seleksi Berkas</li>
                      <li>Pemilihan Lokasi PKL</li>
                      <li>Persiapan Dokumen</li>
                      <li>Penempatan</li>
                      <li>Monitoring dan Evaluasi</li>
                    </ul>
                  </p>
                </div>
                <!-- End Tab 2 Content -->

                <div class="tab-pane fade" id="about-tab3">
                  <div class="d-flex align-items-center mt-4">
                    <h4>Struktur Pengajuan PKL SIMIKAEL</h4>
                  </div>
                  <p>
                    <ul>
                      <li>Teknik Komputer Dan Jaringan</li>
                      <li>Rekayasa Perangkat Lunak</li>
                      <li>Multimedia</li>
                    </ul>
                  </p>
                  </div>
                <div class="tab-pane fade" id="about-tab4">
                  <p class="fst-italic">
                    <h2>Visi Misi</h2>
                  </p>

                  <div class="d-flex align-items-center mt-4">
                    <h4>VISI</h4>
                  </div>
                  <p>“Menjadi platform terdepan yang memberdayakan siswa melalui pengalaman praktik kerja yang berkualitas, inovatif, dan bermakna.”</p>

                  <div class="d-flex align-items-center mt-4">
                    <h4>MISI</h4>
                  </div>
                  <p><ol>
                    <li>Menjalin kerja sama strategis dengan berbagai instansi dan perusahaan untuk memfasilitasi siswa dalam mengembangkan potensi dan pengalaman praktis.</li>
                    <li>Memberikan bimbingan komprehensif selama proses PKL untuk meningkatkan kualitas dan kemampuan siswa.</li>
                    <li>Mengembangkan keterampilan profesional siswa melalui pengalaman praktik kerja.</li>  
                    <li>Menciptakan jejaring profesional yang berkelanjutan untuk siswa dan perusahaan.</li>
                    <li>Memfasilitasi siswa menemukan kesempatan PKL yang sesuai dengan minat dan kompetensi siswa.</li>
                  
                  </ol></p>
                <!-- End Tab 3 Content -->
              </div>
            </div>
          </div>
        </div>
      </section>
      <!-- /About Section -->

    <section id="clients" class="clients section">
      <h2 style="text-align: center">Kolaborasi Bersama :</h2>
      <div class="container" data-aos="fade-up">
        <div class="row gy-4">
          <div class="col-xl-2 col-md-3 col-6 client-logo">
            <img src="assets/img/clients copy/itho.png" class="img-fluid" alt="">
          </div><!-- End Client Item -->
          <div class="col-xl-2 col-md-3 col-6 client-logo">
            <img src="assets/img/clients copy/nexa.png" class="img-fluid" alt="">
          </div><!-- End Client Item -->
          <div class="col-xl-2 col-md-3 col-6 client-logo">
            <img src="assets/img/clients copy/telkoms.png" class="img-fluid" alt="">
          </div><!-- End Client Item -->
          <div class="col-xl-2 col-md-3 col-6 client-logo">
            <img src="assets/img/clients copy/micro.png" class="img-fluid" alt="">
          </div><!-- End Client Item -->
          <div class="col-xl-2 col-md-3 col-6 client-logo">
            <img src="assets/img/clients copy/tesla.png" class="img-fluid" alt="">
          </div><!-- End Client Item -->
          <div class="col-xl-2 col-md-3 col-6 client-logo">
            <img src="assets/img/clients copy/zcr.png" class="img-fluid" alt="">
          </div><!-- End Client Item -->
        <!-- End Client Item -->
        </div>
      </div>
    </section>

      <!-- /Call To Action Section -->

      <!-- Onfocus Section -->
      <section id="onfocus" class="onfocus section dark-background">
        <div class="container-fluid p-0" data-aos="fade-up">
          <div class="row g-0">
            <div class="col-lg-6 video-play position-relative">
              
            </div>
            <div class="col-lg-6">
              <div
                class="content d-flex flex-column justify-content-center h-100"
              >
                <h3>Info Pengajuan Magang</h3>
                <p class="fst-italic">
                  Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed
                  do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                </p>
                <ul>
                  <li>
                    Ullamco laboris nisi ut
                    aliquip ex ea commodo consequat. Duis aute irure dolor in
                    reprehenderit in voluptate trideta storacalaperda mastiro
                    dolore eu fugiat nulla pariatur.
                  </li>
                </ul>
                <a href="#" class="read-more align-self-start"
                  ><span>Read More</span><i class="bi bi-arrow-right"></i
                ></a>
              </div>
            </div>
          </div>
        </div>
      </section>
      <!-- /Onfocus Section -->



      <!-- Services Section -->
      <section id="services" class="services section">
        <!-- Section Title -->
        <div class="container section-title" data-aos="fade-up">
          <h2>Jurusan yang ada di SIMIKAEL</h2>
          <p>
            Pengajuan magang untuk jurusan yang ada di SIMIKAEL
          </p>
        </div>
        <!-- End Section Title -->

        <div class="container" data-aos="fade-up" data-aos-delay="100">
          <div class="row gy-5">
            <div class="col-xl-4 col-md-6" data-aos="zoom-in" data-aos-delay="200">
              <div class="service-item">
                  <div class="img">
                      <img src="{{ asset('assets/img/tkj.jpg') }}" class="img-fluid" alt="">
                  </div>
                  <div class="details position-relative">
                      <div class="icon">
                        <ion-icon name="logo-bitcoin"></ion-icon>
                      </div>
                      <a href="#" class="stretched-link" data-bs-toggle="modal" data-bs-target="#serviceModal">
                          <h3>Teknik Komputer dan Jaringan</h3>
                      </a>
                      <p>
                        Fokus pada pengembangan infrastruktur teknologi informasi, manajemen jaringan komputer, keamanan sistem, dan implementasi solusi jaringan di berbagai organisasi dan perusahaan teknologi. Siswa akan mempelajari konfigurasi perangkat jaringan, troubleshooting, dan pengamanan sistem komputer.
                      </p>
                  </div>
              </div>
          </div>

          <!-- Modal -->
          <div class="modal fade" id="serviceModal" tabindex="-1" aria-labelledby="serviceModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="serviceModalLabel">Teknik Komputer dan Jaringan</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-6">
                                <img src="{{ asset('assets/img/tkj.jpg') }}" class="img-fluid" alt="">
                            </div>
                            <div class="col-md-6">
                                <h2>
                                  Teknik Komputer dan Jaringan
                                </h2>
                                <p>
                                  Fokus pada pengembangan infrastruktur teknologi informasi, manajemen jaringan komputer, keamanan sistem, dan implementasi solusi jaringan di berbagai organisasi dan perusahaan teknologi. Siswa akan mempelajari konfigurasi perangkat jaringan, troubleshooting, dan pengamanan sistem komputer.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
          </div>
            <!-- End Service Item -->

            <div class="col-xl-4 col-md-6" data-aos="zoom-in" data-aos-delay="300">
              <div class="service-item">
                  <div class="img">
                      <img src="{{ asset('assets/img/rpl.jpg') }}" class="img-fluid" alt="">
                  </div>
                  <div class="details position-relative">
                      <div class="icon">
                        <ion-icon name="stats-chart-outline"></ion-icon>
                      </div>
                      <a href="#" class="stretched-link" data-bs-toggle="modal" data-bs-target="#serviceModal3">
                          <h3>Rekayasa Perangkat Lunak</h3>
                      </a>
                      <p>
                        Mengkhususkan diri dalam pengembangan perangkat lunak, merancang aplikasi komputer, analisis sistem, dan implementasi solusi digital. Siswa akan terlibat dalam proses pengembangan perangkat lunak mulai dari perencanaan, desain, pengkodean, hingga pengujian aplikasi di berbagai industri teknologi.
                      </p>
                  </div>
              </div>
          </div>

          <!-- Modal -->
          <div class="modal fade" id="serviceModal3" tabindex="-1" aria-labelledby="serviceModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="serviceModalLabel"> Rekayasa Perangkat Lunak</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-6">
                                <img src="{{ asset('assets/img/rpl.jpg') }}" class="img-fluid" alt="">
                            </div>
                            <div class="col-md-6">
                              <h3> Rekayasa Perangkat Lunak</h3>
                                <p>
                                  Mengkhususkan diri dalam pengembangan perangkat lunak, merancang aplikasi komputer, analisis sistem, dan implementasi solusi digital. Siswa akan terlibat dalam proses pengembangan perangkat lunak mulai dari perencanaan, desain, pengkodean, hingga pengujian aplikasi di berbagai industri teknologi.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
          </div>
            <!-- End Service Item -->

          <div class="col-xl-4 col-md-6" data-aos="zoom-in" data-aos-delay="400">
              <div class="service-item">
                  <div class="img">
                      <img src="{{ asset('assets/img/mm.jpg') }}" class="img-fluid" alt="">
                  </div>
                  <div class="details position-relative">
                      <div class="icon">
                        <ion-icon name="lock-closed-outline"></ion-icon>
                      </div>
                      <a href="#" class="stretched-link" data-bs-toggle="modal" data-bs-target="#serviceModal4">
                          <h3>Multimedia</h3>
                      </a>
                      <p>
                        Berfokus pada kreasi konten digital, desain grafis, produksi video, animasi, dan pengembangan media interaktif. Siswa akan mengeksplorasi berbagai aspek multimedia, termasuk desain grafis, editing video, motion graphics, dan pengembangan konten kreatif di agensi media, studio desain, dan departemen marketing.
                        
                  </div>
              </div>
          </div>

          <!-- Modal -->
          <div class="modal fade" id="serviceModal4" tabindex="-1" aria-labelledby="serviceModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="serviceModalLabel">Multimedia</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-6">
                                <img src="{{ asset('assets/img/mm.jpg') }}" class="img-fluid" alt="">
                            </div>
                            <div class="col-md-6">
                                <h2>
                                  Multimedia
                                </h2>
                                <p>
                                  Berfokus pada kreasi konten digital, desain grafis, produksi video, animasi, dan pengembangan media interaktif. Siswa akan mengeksplorasi berbagai aspek multimedia, termasuk desain grafis, editing video, motion graphics, dan pengembangan konten kreatif di agensi media, studio desain, dan departemen marketing.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
          </div>

            <!-- End Service Item -->
          </div>
        </div>
      </section>
      <!-- /Services Section -->

      <!-- Testimonials Section -->
      <section id="testimonials" class="testimonials section dark-background">
        <!-- Section Title -->
        <div class="container section-title" data-aos="fade-up">
          <h2>Testimonial</h2>
          <p>
            Testimoni Ceo Perusahaan yang berkolaborasi dengan kami.
          </p>
        </div>
        <!-- End Section Title -->

        <img
          src="{{ asset('assets/img/testimonials-bg.jpg') }}"
          class="testimonials-bg"
          alt=""
        />

        <div class="container" data-aos="fade-up" data-aos-delay="100">
          <div class="swiper init-swiper">
            <script type="application/json" class="swiper-config">
              {
                "loop": true,
                "speed": 600,
                "autoplay": {
                  "delay": 5000
                },
                "slidesPerView": "auto",
                "pagination": {
                  "el": ".swiper-pagination",
                  "type": "bullets",
                  "clickable": true
                }
              }
            </script>
            <div class="swiper-wrapper">
              <div class="swiper-slide">
                <div class="testimonial-item">
                  <img
                    src="{{ asset('assets/img/testimonials/testimonials-1.jpg') }}"
                    class="testimonial-img"
                    alt=""
                  />
                  <h3>Samba</h3>
                  <h4>Ceo Telkomsel</h4>
                  <div class="stars">
                    <i class="bi bi-star-fill"></i
                    ><i class="bi bi-star-fill"></i
                    ><i class="bi bi-star-fill"></i
                    ><i class="bi bi-star-fill"></i
                    ><i class="bi bi-star-fill"></i>
                  </div>
                  <p>
                    <i class="bi bi-quote quote-icon-left"></i>
                    <span
                      >Love it</span
                    >
                    <i class="bi bi-quote quote-icon-right"></i>
                  </p>
                </div>
              </div>
              <!-- End testimonial item -->

              <div class="swiper-slide">
                <div class="testimonial-item">
                  <img
                    src="{{ asset('assets/img/testimonials/testimonials-2.jpg') }}"
                    class="testimonial-img"
                    alt=""
                  />
                  <h3>Timothy</h3>
                  <h4>Ceo Microsoft</h4>
                  <div class="stars">
                    <i class="bi bi-star-fill"></i
                    ><i class="bi bi-star-fill"></i
                    ><i class="bi bi-star-fill"></i
                    ><i class="bi bi-star-fill"></i
                    ><i class="bi bi-star-fill"></i>
                  </div>
                  <p>
                    <i class="bi bi-quote quote-icon-left"></i>
                    <span
                      >Inflasi akan terjadi.</span
                    >
                    <i class="bi bi-quote quote-icon-right"></i>
                  </p>
                </div>
              </div>
              <!-- End testimonial item -->

              <div class="swiper-slide">
                <div class="testimonial-item">
                  <img
                    src="{{ asset('assets/img/testimonials/testimonials-3.jpg') }}"
                    class="testimonial-img"
                    alt=""
                  />
                  <h3>Gumi</h3>
                  <h4>Ceo ZiCare</h4>
                  <div class="stars">
                    <i class="bi bi-star-fill"></i
                    ><i class="bi bi-star-fill"></i
                    ><i class="bi bi-star-fill"></i
                    ><i class="bi bi-star-fill"></i
                    ><i class="bi bi-star-fill"></i>
                  </div>
                  <p>
                    <i class="bi bi-quote quote-icon-left"></i>
                    <span
                      >Sangat bagus</span
                    >
                    <i class="bi bi-quote quote-icon-right"></i>
                  </p>
                </div>
              </div>
              <!-- End testimonial item -->

              <div class="swiper-slide">
                <div class="testimonial-item">
                  <img
                    src="{{ asset('assets/img/testimonials/testimonials-4.jpg') }}"
                    class="testimonial-img"
                    alt=""
                  />
                  <h3>Raihan</h3>
                  <h4>Ceo IthoStock</h4>
                  <div class="stars">
                    <i class="bi bi-star-fill"></i
                    ><i class="bi bi-star-fill"></i
                    ><i class="bi bi-star-fill"></i
                    ><i class="bi bi-star-fill"></i
                    ><i class="bi bi-star-fill"></i>
                  </div>
                  <p>
                    <i class="bi bi-quote quote-icon-left"></i>
                    <span
                      >Keren academy ini....</span
                    >
                    <i class="bi bi-quote quote-icon-right"></i>
                  </p>
                </div>
              </div>
              <!-- End testimonial item -->

              <div class="swiper-slide">
                <div class="testimonial-item">
                  <img
                    src="{{ asset('assets/img/testimonials/testimonials-5.jpg') }}"
                    class="testimonial-img"
                    alt=""
                  />
                  <h3>RAJA BILIS</h3>
                  <h4>Ceo Bilis <h4>
                  <div class="stars">
                    <i class="bi bi-star-fill"></i
                    ><i class="bi bi-star-fill"></i
                    ><i class="bi bi-star-fill"></i
                    ><i class="bi bi-star-fill"></i
                    ><i class="bi bi-star-fill"></i>
                  </div>
                  <p>
                    <i class="bi bi-quote quote-icon-left"></i>
                    <span
                      >THE BEST!</span
                    >
                    <i class="bi bi-quote quote-icon-right"></i>
                  </p>
                </div>
              </div>
              <!-- End testimonial item -->
            </div>
            <div class="swiper-pagination"></div>
          </div>
        </div>
      </section>
      <!-- /Testimonials Section -->

      

      <!-- Portfolio Section -->
      <section id="portfolio" class="portfolio section">

        <!-- Section Title -->
        <div class="container section-title" data-aos="fade-up">
          <h2>Gallery</h2>
        </div><!-- End Section Title -->
  
        <div class="container-fluid">
  
          <div class="isotope-layout" data-default-filter="*" data-layout="masonry" data-sort="original-order">
  
            <ul class="portfolio-filters isotope-filters" data-aos="fade-up" data-aos-delay="100">
              <li data-filter="*" class="filter-active">All</li>
              <li data-filter=".filter-app">Guru</li>
              <li data-filter=".filter-product">Siswa</li>
              <li data-filter=".filter-branding">Kejuaraan</li>
              <li data-filter=".filter-books">Kegiatan</li>
            </ul><!-- End Portfolio Filters -->
  
            <div class="row g-0 isotope-container" data-aos="fade-up" data-aos-delay="200">
  
              <div class="col-xl-3 col-lg-4 col-md-6 portfolio-item isotope-item filter-app">
                <div class="portfolio-content h-100">
                  <img src="assets/img/gallery/rpll.jpg" class="img-fluid" alt="">
                  <div class="portfolio-info">
                    <a href="assets/img/gallery/rpll.jpg" data-gallery="portfolio-gallery-app" class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
                  </div>
                </div>
              </div><!-- End Portfolio Item -->
  
              <div class="col-xl-3 col-lg-4 col-md-6 portfolio-item isotope-item filter-product">
                <div class="portfolio-content h-100">
                  <img src="assets/img/gallery/siswa2.jpg" class="img-fluid" alt="">
                  <div class="portfolio-info">
                    <a href="assets/img/gallery/siswa2.jpg" data-gallery="portfolio-gallery-product" class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
                  </div>
                </div>
              </div><!-- End Portfolio Item -->
  
              <div class="col-xl-3 col-lg-4 col-md-6 portfolio-item isotope-item filter-branding">
                <div class="portfolio-content h-100">
                  <img src="assets/img/gallery/j.png" class="img-fluid" alt="">
                  <div class="portfolio-info">
                    <a href="assets/img/gallery/j.png" data-gallery="portfolio-gallery-branding" class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
                  </div>
                </div>
              </div><!-- End Portfolio Item -->
  
              <div class="col-xl-3 col-lg-4 col-md-6 portfolio-item isotope-item filter-books">
                <div class="portfolio-content h-100">
                  <img src="assets/img/gallery/keg1.jpg" class="img-fluid" alt="">
                  <div class="portfolio-info">
                    <a href="assets/img/gallery/keg1.jpg" data-gallery="portfolio-gallery-book" class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
                  </div>
                </div>
              </div><!-- End Portfolio Item -->
  
              <div class="col-xl-3 col-lg-4 col-md-6 portfolio-item isotope-item filter-app">
                <div class="portfolio-content h-100">
                  <img src="assets/img/gallery/guru1.jpg" class="img-fluid" alt="">
                  <div class="portfolio-info">
                    <a href="assets/img/gallery/guru1.jpg" data-gallery="portfolio-gallery-app" class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
                  </div>
                </div>
              </div><!-- End Portfolio Item -->
  
              <div class="col-xl-3 col-lg-4 col-md-6 portfolio-item isotope-item filter-product">
                <div class="portfolio-content h-100">
                  <img src="assets/img/gallery/siswa1.jpeg" class="img-fluid" alt="">
                  <div class="portfolio-info">
                    <a href="assets/img/gallery/siswa1.jpeg" data-gallery="portfolio-gallery-product" class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
                  </div>
                </div>
              </div><!-- End Portfolio Item -->
  
              <div class="col-xl-3 col-lg-4 col-md-6 portfolio-item isotope-item filter-branding">
                <div class="portfolio-content h-100">
                  <img src="{{ asset('assets/img/gallery/j1.jpeg') }}" class="img-fluid" alt="">
                  <div class="portfolio-info">
                    <a href="{{ asset('assets/img/gallery/j1.jpeg') }}" data-gallery="portfolio-gallery-branding" class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
                  </div>
                </div>
              </div><!-- End Portfolio Item -->
  
              <div class="col-xl-3 col-lg-4 col-md-6 portfolio-item isotope-item filter-books">
                <div class="portfolio-content h-100">
                  <img src="{{ asset('assets/img/gallery/keg2.jpg') }}" class="img-fluid" alt="">
                  <div class="portfolio-info">
                    <a href="{{ asset('assets/img/gallery/keg2.jpg') }}" data-gallery="portfolio-gallery-book" class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
                  </div>
                </div>
              </div><!-- End Portfolio Item -->
  
              <div class="col-xl-3 col-lg-4 col-md-6 portfolio-item isotope-item filter-app">
                <div class="portfolio-content h-100">
                  <img src="{{ asset('assets/img/gallery/guru.jpeg') }}" class="img-fluid" alt="">
                  <div class="portfolio-info">
                    <a href="{{ asset('assets/img/gallery/guru.jpeg') }}" data-gallery="portfolio-gallery-app" class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
                  </div>
                </div>
              </div><!-- End Portfolio Item -->
  
              <div class="col-xl-3 col-lg-4 col-md-6 portfolio-item isotope-item filter-product">
                <div class="portfolio-content h-100">
                  <img src="{{ asset('assets/img/gallery/mpls.jpg') }}" class="img-fluid" alt="">
                  <div class="portfolio-info">
                    <a href="{{ asset('assets/img/gallery/mpls.jpg') }}" data-gallery="portfolio-gallery-product" class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
                  </div>
                </div>
              </div><!-- End Portfolio Item -->
  
              <div class="col-xl-3 col-lg-4 col-md-6 portfolio-item isotope-item filter-branding">
                <div class="portfolio-content h-100">
                  <img src="{{ asset('assets/img/gallery/j2.jpg') }}" class="img-fluid" alt="">
                  <div class="portfolio-info">
                    <a href="{{ asset('assets/img/gallery/j2.jpg') }}" data-gallery="portfolio-gallery-branding" class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
                  </div>
                </div>
              </div><!-- End Portfolio Item -->
  
              <div class="col-xl-3 col-lg-4 col-md-6 portfolio-item isotope-item filter-books">
                <div class="portfolio-content h-100">
                  <img src="{{ asset('assets/img/gallery/keg3.jpg') }}" class="img-fluid" alt="">
                  <div class="portfolio-info">
                    <a href="{{ asset('assets/img/gallery/keg3.jpg') }}" data-gallery="portfolio-gallery-book" class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
                  </div>
                </div>
              </div><!-- End Portfolio Item -->
  
            </div><!-- End Portfolio Container -->
  
          </div>
  
        </div>
  
      </section>
      <!-- /Portfolio Section -->


      <!-- Contact Section -->
      <section id="contact" class="contact section">
        <!-- Section Title -->
        <div class="container section-title" data-aos="fade-up">
          <h2>Contact</h2>
          <p>
            Hubungi kami dibawah ini
          </p>
        </div>
        <!-- End Section Title -->

        <div class="mb-5">
          <iframe
            style="width: 100%; height: 400px"
            src="https://www.google.com/maps/embed?pb=!4v1740005060765!6m8!1m7!1s_2Yux-AYvs5wbmQpc7IhKg!2m2!1d-6.967931180236227!2d110.3950522322658!3f356.25320952269186!4f-0.8003114439065797!5f0.7820865974627469" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"
            frameborder="0"
            allowfullscreen=""
          ></iframe>
        </div>
        <!-- End Google Maps -->

        <div class="container" data-aos="fade">
          <div class="row gy-5 gx-lg-5">
            <div class="col-lg-4">
              <div class="info">
                <h3>Kritik dan Saran</h3>
                <p>
                  Hubungi kami dibawah ini.
                </p>

                <div class="info-item d-flex">
                  <i class="bi bi-geo-alt flex-shrink-0"></i>
                  <div>
                    <h4>Lokasi:</h4>
                    <p>Perumahan Semarang Indah C2 No.19, Tawangmas, Kec. Semarang Barat, Kota Semarang, Jawa Tengah 50144</p>
                  </div>
                </div>
                <!-- End Info Item -->

                <div class="info-item d-flex">
                  <i class="bi bi-envelope flex-shrink-0"></i>
                  <div>
                    <h4>Email:</h4>
                    <p>simikael@gmail.com</p>
                  </div>
                </div>
                <!-- End Info Item -->

                <div class="info-item d-flex">
                  <i class="bi bi-phone flex-shrink-0"></i>
                  <div>
                    <h4>No. Telp:</h4>
                    <p>(024) 1221213</p>
                  </div>
                </div>
                <!-- End Info Item -->
              </div>
            </div>

            <div class="col-lg-8">
              <form
                action="forms/contact.php"
                method="post"
                role="form"
                class="php-email-form"
              >
                <div class="row">
                  <div class="col-md-6 form-group">
                    <input
                      type="text"
                      name="name"
                      class="form-control"
                      id="name"
                      placeholder="Your Name"
                      required=""
                    />
                  </div>
                  <div class="col-md-6 form-group mt-3 mt-md-0">
                    <input
                      type="email"
                      class="form-control"
                      name="email"
                      id="email"
                      placeholder="Your Email"
                      required=""
                    />
                  </div>
                </div>
                <div class="form-group mt-3">
                  <input
                    type="text"
                    class="form-control"
                    name="subject"
                    id="subject"
                    placeholder="Subject"
                    required=""
                  />
                </div>
                <div class="form-group mt-3">
                  <textarea
                    class="form-control"
                    name="message"
                    placeholder="Message"
                    required=""
                  ></textarea>
                </div>
                <div class="my-3">
                  <div class="loading">Loading</div>
                  <div class="error-message"></div>
                  <div class="sent-message">
                    Your message has been sent. Thank you!
                  </div>
                </div>
                <div class="text-center">
                  <button type="submit">Send Message</button>
                </div>
              </form>
            </div>
            <!-- End Contact Form -->
          </div>
        </div>
      </section>
      <!-- /Contact Section -->
    </main>

    <footer id="footer" class="footer dark-background">
      <div class="footer-top">
          <div class="container">
              <div class="row gy-4">
                  <div class="col-lg-4 col-md-6 footer-about">
                      <a href="index.html" class="logo flex items-center">
                          <span class="sitename text-xl font-bold">Pengajuan Magang SIMIKAEL.</span>
                      </a>
                      <div class="footer-contact pt-3">
                          <p>Perumahan Semarang Indah C2 No.19, Tawangmas, Kec. Semarang Barat, </p>
                          <p>Kota Semarang, Jawa Tengah 50144</p>
                          <p class="mt-3">
                              <strong>Phone:</strong> <span>(024) 26678239</span>
                          </p>
                          <p><strong>Email:</strong> <span>simikael@gmail.com</span></p>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  
      <div class="copyright text-center py-4 border-t border-gray-700">
          <div class="container px-4 sm:px-6 lg:px-8 flex flex-col sm:flex-row justify-content-center justify-content-lg-between items-center">
              <div class="flex flex-col items-center sm:items-start mb-4 sm:mb-0">
                  <div>
                      © Copyright <strong><span>Mammon</span></strong>. All Rights Reserved
                  </div>
                  <div class="credits">
                      Designed by <a href="https://github.com/PannXXX06" class="text-blue-500 hover:text-blue-400">Mammon</a>
                  </div>
              </div>
  
              <div class="social-links flex space-x-4 order-first sm:order-last">
                  <a href="" class="text-gray-400 hover:text-blue-500"><i class="bi bi-twitter-x"></i></a>
                  <a href="" class="text-gray-400 hover:text-blue-500"><i class="bi bi-facebook"></i></a>
                  <a href="" class="text-gray-400 hover:text-pink-500"><i class="bi bi-instagram"></i></a>
                  <a href="" class="text-gray-400 hover:text-blue-500"><i class="bi bi-linkedin"></i></a>
              </div>
          </div>
      </div>
  </footer>

    <!-- Scroll Top -->
    <a
      href="#"
      id="scroll-top"
      class="scroll-top d-flex align-items-center justify-content-center"
      ><i class="bi bi-arrow-up-short"></i
    ></a>

    <!-- Preloader -->
    <div id="preloader"></div>

    <!-- Vendor JS Files -->
    <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/php-email-form/validate.js') }}"></script>
    <script src="{{ asset('assets/vendor/aos/aos.js') }}"></script>
    <script src="{{ asset('assets/vendor/glightbox/js/glightbox.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/swiper/swiper-bundle.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/imagesloaded/imagesloaded.pkgd.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
    <!-- Main JS File -->
    <script src="{{ asset('assets/js/main.js') }}"></script>
  </body>
</html>

