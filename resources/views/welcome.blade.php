<html lang="eng">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0">

    <link rel="shortcut icon" href="{{ asset('storage/images/favicon.ico') }}" type="image/x-icon">
    <link rel="stylesheet" href="{{ asset('page/vendors/owl-carousel/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('page/vendors/owl-carousel/css/owl.theme.default.css') }}">
    <link rel="stylesheet" href="{{ asset('page/css/style.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/theme-default.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    {{-- others --}}
    <link rel="stylesheet" href="{{ asset('vendor/animate.css/animate.min.css') }}">
    <link rel="stylesheet" href="{{ asset('fonts/boxicons.css') }}">
    <link rel="stylesheet" href="{{ asset('fonts/Font_Awesome/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('fonts/Material_Design/css/materialdesignicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/perfect-scrollbar/perfect-scrollbar.css') }}">
    <title>Home</title>
</head>

<body id="body" data-spy="scroll" data-target=".navbar" data-offset="100" translate="yes">
    <header id="header-section">
        <nav class="navbar navbar-expand-lg pl-3 pl-sm-0" id="navbar">
          <div class="container">
            <div class="navbar-brand-wrapper d-flex w-100">
              <img src="{{ asset('storage/images/logo_old.svg') }}" />
              <button class="navbar-toggler ml-auto btn" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="mdi mdi-menu navbar-toggler-icon"></span>
              </button>
            </div>
            <div class="collapse navbar-collapse navbar-menu-wrapper" id="navbarSupportedContent">
              <ul class="navbar-nav align-items-lg-center align-items-start ml-auto">
                <li class="d-flex align-items-center justify-content-between pl-4 pl-lg-0">
                  <div class="navbar-collapse-logo">
                    <img src="{{ asset('storage/images/logo_old.svg') }}" />
                  </div>
                  <button class="navbar-toggler close-button btn" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="fas fa-xmark"></span>
                  </button>
                </li>
                @guest
                  <li class="nav-item btn-contact-us pl-4 pl-lg-0">
                    <a class="btn btn-primary btn-lg" href="{{ route('ShowLoginForm') }}">Sign In</a>
                    <a class="btn btn-outline-primary btn-lg" href="{{ route('ShowRegisterForm') }}">Sign Up</a>
                  </li>
                @else
                  <li class="nav-item btn-contact-us pl-4 pl-lg-0">
                    <a class="btn btn-primary btn-lg" href="{{ route('ShowDashboard') }}">Dashboard</a>
                    <form action="{{ route('logout') }}" method="post" style="display: inline">
                      @csrf
                      <button class="btn btn-outline-danger btn-lg" href="{{ route('logout') }}" type="submit">Logout</button>
                    </form>
                  </li>
                @endguest
              </ul>
            </div>
          </div>
        </nav>
      </header>

      <div class="banner">
        <div class="container">
          <h1 class="font-weight-semibold">Earn Money Online</h1>
          <h6 class="font-weight-normal text-muted pb-3">Explore a website that offers various opportunities to earn money</h6>
          <div>
            <a href="{{ route('ShowLoginForm') }}" class="btn btn-primary">Get Started</a>
          </div>
          <img src="{{ asset('page/images/banner.svg') }}" alt="" class="img-fluid">
        </div>
      </div>

      <div class="content-wrapper">
        <div class="container">

          <section class="case-studies" id="about">
            <div class="row grid-margin">
              <div class="col-12 text-center pb-5">
                <h2>Ways to Earn Money Online</h2>
                <h6 class="section-subtitle text-muted">Grow your online presence and increase your followers to maximize your earnings.</h6>
              </div>
              <div class="col-12 col-md-6 col-lg-3 stretch-card mb-3 mb-lg-0" data-aos="zoom-in" onclick="window.location.href = '/earnings/boosting/youtube'">
                <div class="card color-cards">
                  <div class="card-body p-0">
                    <div class="bg-white text-center card-contents  cursor-pointer">
                      <div class="card-image">
                        <img src="{{ asset('page/images/youtube.png') }}" class="case-studies-card-img" alt="">
                      </div>
                      <div class="card-desc-box d-flex align-items-center justify-content-around">
                        <div>
                          <h6 class="text-white pb-2 px-3">Boost Your YouTube Subscribers</h6>
                          <button class="btn btn-white">Learn More</button>
                        </div>
                      </div>
                    </div>
                    <div class="card-details text-center pt-4">
                      <h6 class="m-0 pb-1">Boost Your YouTube Subscribers</h6>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-12 col-md-6 col-lg-3 stretch-card mb-3 mb-lg-0" data-aos="zoom-in" data-aos-delay="200" onclick="window.location.href = '/earnings/boosting/tiktok'">
                <div class="card color-cards">
                  <div class="card-body p-0">
                    <div class="bg-white text-center card-contents cursor-pointer">
                      <div class="card-image">
                        <img src="{{ asset('page/images/tiktok.png') }}" class="case-studies-card-img" alt="">
                      </div>
                      <div class="card-desc-box d-flex align-items-center justify-content-around">
                        <div>
                          <h6 class="text-white pb-2 px-3">Boost Your TikTok Followers</h6>
                          <button class="btn btn-white">Learn More</button>
                        </div>
                      </div>
                    </div>
                    <div class="card-details text-center pt-4">
                      <h6 class="m-0 pb-1">Boost Your TikTok Followers</h6>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-12 col-md-6 col-lg-3 stretch-card mb-3 mb-lg-0" data-aos="zoom-in" data-aos-delay="200"onclick="window.location.href = '/earnings/boosting/instagram'">
                <div class="card color-cards">
                  <div class="card-body p-0">
                    <div class="bg-white text-center card-contents cursor-pointer">
                      <div class="card-image">
                        <img src="{{ asset('page/images/instagram.png') }}" class="case-studies-card-img" alt="">
                      </div>
                      <div class="card-desc-box d-flex align-items-center justify-content-around">
                        <div>
                          <h6 class="text-white pb-2 px-3">Boost Your Instagram Followers</h6>
                          <button class="btn btn-white">Learn More</button>
                        </div>
                      </div>
                    </div>
                    <div class="card-details text-center pt-4">
                      <h6 class="m-0 pb-1">Boost Your Instagram Followers</h6>
                    </div>
                  </div>
                </div>
              </div>
              <style>
                .cursor-pointer {
                    cursor: pointer;
                }
              </style>
              <div class="col-12 col-md-6 col-lg-3 stretch-card mb-3 mb-lg-0" data-aos="zoom-in" data-aos-delay="400" onclick="window.location.href = '/earnings/trivias'">
                <div class="card color-cards">
                  <div class="card-body p-0 cursor-pointer">
                    <div class="bg-white text-center card-contents">
                      <div class="card-image">
                        <img src="{{ asset('page/images/quiz.png') }}" class="case-studies-card-img" alt="">
                      </div>
                      <div class="card-desc-box d-flex align-items-center justify-content-around">
                        <div>
                          <h6 class="text-white pb-2 px-3">Answer Trivia Quizzes</h6>
                          <button class="btn btn-white">Learn More</button>
                        </div>
                      </div>
                    </div>
                    <div class="card-details text-center pt-4">
                      <h6 class="m-0 pb-1">Answer Trivia Quizzes</h6>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-12 col-md-6 col-lg-3 stretch-card" data-aos="zoom-in" data-aos-delay="600" onclick="window.location.href = '/earnings/spin'">
                <div class="card color-cards">
                  <div class="card-body p-0  cursor-pointer">
                    <div class="bg-success text-center card-contents">
                      <div class="card-image">
                        <img src="{{ asset('page/images/spin.png') }}" class="case-studies-card-img" alt="">
                      </div>
                      <div class="card-desc-box d-flex align-items-center justify-content-around">
                        <div>
                          <h6 class="text-white pb-2 px-3">Spin Daily Questions Every day</h6>
                          <button class="btn btn-white">Learn More</button>
                        </div>
                      </div>
                    </div>
                    <div class="card-details text-center pt-4">
                      <h6 class="m-0 pb-1">Spin And Win</h6>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-12 col-md-6 col-lg-3 stretch-card mb-3 mb-lg-0" data-aos="zoom-in" onclick="window.location.href = '/earnings/watch/youtube/videoe'">
                <div class="card color-cards">
                  <div class="card-body p-0">
                    <div class="bg-white text-center card-contents  cursor-pointer">
                      <div class="card-image">
                        <img src="{{ asset('page/images/youtube.png') }}" class="case-studies-card-img" alt="">
                      </div>
                      <div class="card-desc-box d-flex align-items-center justify-content-around">
                        <div>
                          <h6 class="text-white pb-2 px-3">Watch youtube videos</h6>
                          <button class="btn btn-white">Learn More</button>
                        </div>
                      </div>
                    </div>
                    <div class="card-details text-center pt-4">
                      <h6 class="m-0 pb-1">Watch youtube videos</h6>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-12 col-md-6 col-lg-3 stretch-card mb-3 mb-lg-0" data-aos="zoom-in" data-aos-delay="200" onclick="window.location.href = '/earnings/watch/tiktok/video'">
                <div class="card color-cards">
                  <div class="card-body p-0">
                    <div class="bg-white text-center card-contents cursor-pointer">
                      <div class="card-image">
                        <img src="{{ asset('page/images/tiktok.png') }}" class="case-studies-card-img" alt="">
                      </div>
                      <div class="card-desc-box d-flex align-items-center justify-content-around">
                        <div>
                          <h6 class="text-white pb-2 px-3">Watch Tiktok Videos</h6>
                          <button class="btn btn-white">Learn More</button>
                        </div>
                      </div>
                    </div>
                    <div class="card-details text-center pt-4">
                      <h6 class="m-0 pb-1">Watch Tiktok Videos</h6>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </section>

          <section class="contact-details" id="contact-details-section">
            <div class="row text-center text-md-left">
              <div class="col-12 col-md-6 col-lg-4 grid-margin">
                <img src="{{ asset('storage/images/logo_old.svg') }}" class="pb-2" />
                <div class="pt-2">
                  <p class="text-muted m-0">Contact us at: vpngoal@example.com</p>
                </div>
              </div>
              <div class="col-12 col-md-6 col-lg-4 grid-margin">
                <h5 class="pb-2">Get in Touch</h5>
                <p class="text-muted">Don’t miss any updates of our new templates and extensions!</p>
                <form action="{{ route('ShowLoginForm') }}">
                  <input type="text" class="form-control" id="Email" placeholder="Enter your Email">
                  <div class="pt-3">
                    <button class="btn btn-dark">Subscribe</button>
                  </div>
                </form>
              </div>
              <div class="col-12 col-md-6 col-lg-4 grid-margin">
                <h5 class="pb-2">Our address</h5>
                <p class="text-muted">Kicukiro, Kagarama</p>
                <div class="d-flex justify-content-center justify-content-md-start">
                  <a href="#"><span class="mdi mdi-facebook"></span></a>
                  <a href="#"><span class="mdi mdi-twitter"></span></a>
                  <a href="#"><span class="mdi mdi-instagram"></span></a>
                  <a href="#"><span class="mdi mdi-linkedin"></span></a>
                </div>
              </div>
            </div>
          </section>

        </div>
      </div>
    <script src="{{ asset('page/vendors/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('page/vendors/bootstrap/bootstrap.min.js') }}"></script>
    <script src="{{ asset('page/vendors/owl-carousel/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('page/vendors/aos/js/aos.js') }}"></script>
    <script src="{{ asset('page/js/landingpage.js') }}"></script>

</body>

</html>
