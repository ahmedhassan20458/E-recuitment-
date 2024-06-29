<?php
require_once('../../controllers/HomeController.php');

?>

<!DOCTYPE html>
<html class="wide wow-animation" lang="en">

<head>
  <title>E-Recruit - Home</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <link rel="icon" href="<?php echo BASE_URL; ?>assets/images/Logo Shape.svg">
  <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Montserrat:300,400,700%7CPoppins:300,400,500,700,900">
  <link href="<?php echo BASE_URL; ?>assets/css/CSS/sb-admin-2.min.css" rel="stylesheet">
  <link rel="stylesheet" href="<?php echo BASE_URL; ?>assets/css/owl.carousel.min.css">
  <link rel="stylesheet" href="<?php echo BASE_URL; ?>assets/css/ticker-style.css">
  <link rel="stylesheet" href="<?php echo BASE_URL; ?>assets/css/flaticon.css">
  <link rel="stylesheet" href="<?php echo BASE_URL; ?>assets/css/slicknav.css">
  <link rel="stylesheet" href="<?php echo BASE_URL; ?>assets/css/animate.min.css">
  <link rel="stylesheet" href="<?php echo BASE_URL; ?>assets/css/magnific-popup.css">
  <link rel="stylesheet" href="<?php echo BASE_URL; ?>assets/css/fontawesome-all.min.css">
  <link rel="stylesheet" href="<?php echo BASE_URL; ?>assets/css/themify-icons.css">
  <link rel="stylesheet" href="<?php echo BASE_URL; ?>assets/css/slick.css">
  <link rel="stylesheet" href="<?php echo BASE_URL; ?>assets/css/nice-select.css">
  <link rel="stylesheet" href="<?php echo BASE_URL; ?>assets/css/style2.css">
  <script src="https://kit.fontawesome.com/475cbef551.js" crossorigin="anonymous"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
  <link rel="stylesheet" href="<?php echo BASE_URL; ?>assets/css/CSS/fonts.css">
  <link rel="stylesheet" href="<?php echo BASE_URL; ?>assets/css/CSS/style.css">
  <link rel="stylesheet" href="<?php echo BASE_URL; ?>assets/css/CSS/HomeStyles.css">
  <style>
    .ie-panel {
      display: none;
      background: #212121;
      padding: 10px 0;
      box-shadow: 3px 3px 5px 0 rgba(0, 0, 0, .3);
      clear: both;
      text-align: center;
      position: relative;
      z-index: 1;
    }

    html.ie-10 .ie-panel,
    html.lt-ie-10 .ie-panel {
      display: block;
    }
  </style>
</head>

<body>
  <div class="preloader">
    <div class="preloader-body">
      <div class="cssload-container">
        <div class="cssload-speeding-wheel"></div>
      </div>
      <p>Loading...</p>
    </div>
  </div>
  <div class="page">

    <header class="section page-header">
      <!--RD Navbar-->
      <div class="rd-navbar-wrap">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow-sm">
          <a class="navbar-brand h-100  d-flex" href="<?php echo ($Path . "Home" . $End); ?>">
            <img src="<?php echo BASE_URL; ?>assets/images/Logo.svg" style="min-height:100%; max-height: 4vh;" alt="">
          </a>

          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">
            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow" style="display: <?php echo ($Dropdown); ?>;">
              <a class="nav-link dropdown-toggle" href="#" title="Account" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 text-gray-600 small"> <?php echo ($_SESSION["username"]); ?>
                </span> <img class="img-profile rounded-circle" alt="PP" src="<?php echo ($img); ?>">
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow-sm animated--grow-in" aria-labelledby="userDropdown">

                <a class="dropdown-item" href="<?php echo ($Path . "Profile" . $End); ?>">
                  <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i> Profile
                </a>


                <a class="dropdown-item" href="<?php echo ($Path . "Home" . $End); ?>"> <i class="fa-solid fa-house fa-sm fa-fw mr-2 text-gray-400"></i> Home </a>

                <a class="dropdown-item" href="<?php echo ($Path . "Jobs" . $End); ?>">
                  <i class="fas fa-magnifying-glass fa-sm fa-fw mr-2 text-gray-400"></i> Find Jobs
                </a>

                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal"> <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i> Logout </a>
              </div>
            </li>
            <a href="<?php echo (BASE_URL . "views/sign-in/SignIn.php"); ?>" class="btn btn-light btn-sm py-md-2 px-1" style="display: <?php echo ($Login); ?>;"> <span class="icon text-gray-600 px-1"> <i class="fa-solid fa-right-to-bracket"></i> </span> <span class="px-1">Sign In</span> </a>
          </ul>
        </nav>
        <!-- End of Topbar -->
      </div>
    </header>

    <!--Main section-->

    <section class="section main-section parallax-scene-js" style="background:url('<?php echo BASE_URL; ?>assets/images/h1_hero.jpg') no-repeat center center; background-size:cover;margin-top: 70px; min-height: 93vh; padding:0;">

      <!-- slider Area Start-->
      <div class="slider-area w-100">
        <!-- Mobile Menu -->
        <div class="slider-active">
          <div class="single-slider slider-height d-flex align-items-center" data-background="<?php echo BASE_URL; ?>assets/images/h1_hero.jpg">
            <div class="container w-100">
              <div class="row">
                <div class="col-xl-6 col-lg-9 col-md-10">
                  <div class="hero__caption">
                    <h1>Find the most exciting startup jobs</h1>
                  </div>
                </div>
              </div>
              <!-- Search Box -->
              <div class="row">
                <div class="col-xl-8">
                  <!-- form -->
                  <form action="#" class="search-box">
                    <div class="input-group centerz wow fadeInRight">
                      <input type="search" class="form-control" style="height: 4rem;border-radius: 0.25rem; border-bottom-right-radius: 0; border-top-right-radius: 0" placeholder="eg. General Manager, HR Manager" aria-label="Search" aria-describedby="search-addon" />
                      <a href="<?php echo ($Path . "Jobs" . $End); ?>" type="button" style="height: 4rem; border-bottom-left-radius: 0; border-top-left-radius: 0" class="btn btn-primary">search</a>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="decorate-layer">
        <div class="layer-1">
          <div class="layer" data-depth=".20"><img src="<?php echo BASE_URL; ?>assets/images/Images/Home/parallax-item-1-563x532.png" alt="" width="563" height="266" /> </div>
        </div>
        <div class="layer-2">
          <div class="layer" data-depth=".30"><img src="<?php echo BASE_URL; ?>assets/images/Images/Home/parallax-item-2-276x343.png" alt="" width="276" height="171" /> </div>
        </div>
        <div class="layer-3">
          <div class="layer" data-depth=".40"><img src="<?php echo BASE_URL; ?>assets/images/Images/Home/parallax-item-3-153x144.png" alt="" width="153" height="72" /> </div>
        </div>
        <div class="layer-4">
          <div class="layer" data-depth=".20"><img src="<?php echo BASE_URL; ?>assets/images/Images/Home/parallax-item-4-69x74.png" alt="" width="69" height="37" /> </div>
        </div>
        <div class="layer-5">
          <div class="layer" data-depth=".40"><img src="<?php echo BASE_URL; ?>assets/images/Images/Home/parallax-item-5-72x75.png" alt="" width="72" height="37" /> </div>
        </div>
        <div class="layer-6">
          <div class="layer" data-depth=".30">
            <img src="<?php echo BASE_URL; ?>assets/images/Images/Home/parallax-item-6-45x54.png" alt="" width="45" height="27" />
          </div>
        </div>
      </div>
    </section>


    <!--Top Partners-->
    <div class="container my-3 pt-5 pb-2" id="TopPartners">
      <h2 class="wow fadeInLeft py-0">Top Partners</h2>
      <section class="customer-logos slider wow fadeInRight">
        <div class="slide my-auto"><img src="<?php echo BASE_URL; ?>assets/images/FCAI.png"></div>
        <div class="slide my-auto"><img src="<?php echo BASE_URL; ?>assets/images/HU.jpg"></div>
        <div class="slide my-auto"><img src="<?php echo BASE_URL; ?>assets/images/Wuzzuf.jpg"></div>
        <div class="slide my-auto"><img src="<?php echo BASE_URL; ?>assets/images/Linkedin.webp"></div>

        <div class="slide my-auto"><img src="<?php echo BASE_URL; ?>assets/images/FCAI.png"></div>
        <div class="slide my-auto"><img src="<?php echo BASE_URL; ?>assets/images/HU.jpg"></div>
        <div class="slide my-auto"><img src="<?php echo BASE_URL; ?>assets/images/Wuzzuf.jpg"></div>
        <div class="slide my-auto"><img src="<?php echo BASE_URL; ?>assets/images/Linkedin.webp"></div>
      </section>
    </div>

    <!--About-->
    <section class="section section-sm position-relative pt-0" id="about">
      <div class="container">
        <div class="row row-30 justify-content-center">
          <div class="col-lg-6 row align-items-center">
            <div class="block-decorate-img wow fadeInLeft row align-items-center col-12" data-wow-delay=".2s">
              <img src="<?php echo BASE_URL; ?>assets/images/Logo.svg" alt="" class="p-3 my-auto mx-auto col-12" style="box-shadow: none; filter: drop-shadow(2px 2px 3px #bdbdbd);" />
            </div>
          </div>
          <div class="col-lg-6 col-12">
            <div class="block-sm offset-top-45">
              <div class="section-name wow fadeInRight" data-wow-delay=".2s">About</div>
              <h3 class="wow fadeInLeft text-capitalize devider-bottom" data-wow-delay=".3s"><span class="text-primary">E-Recruit </span></h3>
              <p class="offset-xl-40 wow fadeInUp ellipsis" data-wow-delay=".4s">This system enables Egyptian job
                seekers to join the recruitment systems to register their personal data, qualifications, and
                work
                experience, with the necessary documents attached. In addition to providing an electronic application
                service for vacancies advertised by employers, compatible with their qualifications and
                specializations. After that, the data is automatically matched and audited, and then this data is passed
                through the automated nomination system, after which the nomination points are displayed to all
                applicants on the advertisement, with their desires for jobs, in addition to the jobs for which they
                were nominated.</p>
            </div>
          </div>
        </div>
        <div class="decor-text decor-text-1">ABOUT</div>
      </div>
    </section>

    <!--Counters-->
    <section class="section bg-image-2">
      <div class="container section-md">
        <div class="row row-30 text-center">
          <div class="col-md-4 col-sm-6 col-12">
            <div class="counter-classic">
              <div class="counter-classic-number"><i class="fa-solid fa-user text-white mr-2"></i><span class="counter text-white" data-speed="2000"><?php echo ($_SESSION['NOfApplicants']); ?></span> </div>
              <div class="counter-classic-title text-white">Number of Employees</div>
            </div>
          </div>
          <div class="col-md-4 col-sm-6 col-12">
            <div class="counter-classic">
              <div class="counter-classic-number"><i class="fa-regular fa-briefcase text-white mr-2"></i><span class="counter text-white" data-speed="2000"><?php echo ($_SESSION['NOfJobs']); ?></span> </div>
              <div class="counter-classic-title text-white">Active Jobs</div>
            </div>
          </div>
          <div class="col-md-4 col-sm-6 col-12">
            <div class="counter-classic">
              <div class="counter-classic-number"><i class="fa-regular fa-handshake text-white mr-2"></i><span class="counter text-white" data-speed="2000"><?php echo ($_SESSION['NOfPartners']); ?></span></div>
              <div class="counter-classic-title text-white">Global Partners</div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!--Related Links-->
    <div class="container pb-2 mb-5">
      <h2 class="wow fadeInLeft pb-0 mt-3">Related Links</h2>
      <section class="customer-logos slider row align-items-center wow fadeInRight">
        <div class="slide rounded shadow my-auto p-2"><a href="https://www.helwan.edu.eg/en/home-3/" target="_blank"><img src="<?php echo BASE_URL; ?>assets/images/HU.jpg"></a></div>
        <div class="slide rounded shadow my-auto p-2"><a href="http://safcai.helwan.edu.eg/index.php/ar/" target="_blank"><img src="<?php echo BASE_URL; ?>assets/images/FCAI.png"></a></div>
        <div class="slide rounded shadow my-auto p-2"><a href="https://wuzzuf.net/jobs/egypt" target="_blank"><img src="<?php echo BASE_URL; ?>assets/images/Wuzzuf.jpg"></a></div>
        <div class="slide rounded shadow my-auto p-2"><a href="https://www.linkedin.com/" target="_blank"><img src="<?php echo BASE_URL; ?>assets/images/Linkedin.webp"></a></div>

        <div class="slide rounded shadow my-auto p-2"><a href="https://www.helwan.edu.eg/en/home-3/" target="_blank"><img src="<?php echo BASE_URL; ?>assets/images/HU.jpg"></a></div>
        <div class="slide rounded shadow my-auto p-2"><a href="http://safcai.helwan.edu.eg/index.php/ar/" target="_blank"><img src="<?php echo BASE_URL; ?>assets/images/FCAI.png"></a></div>
        <div class="slide rounded shadow my-auto p-2"><a href="https://wuzzuf.net/jobs/egypt" target="_blank"><img src="<?php echo BASE_URL; ?>assets/images/Wuzzuf.jpg"></a></div>
        <div class="slide rounded shadow my-auto p-2"><a href="https://www.linkedin.com/" target="_blank"><img src="<?php echo BASE_URL; ?>assets/images/Linkedin.webp"></a></div>
      </section>
    </div>

  </div>



  <!--Footer-->
  <footer class="section footer-classic section-sm">
    <div class="container">
      <div class="row row-30 justify-content-center">
        <div class="col-lg-4 col-12 wow fadeInLeft row justify-content-center">
          <!--Brand--><a class="text-center mx-auto row align-items-center" href=""> <img class="col-12 mx-auto my-auto" style="max-width: 75%!important;" src="<?php echo BASE_URL; ?>assets/images/Logo.svg" alt="" /></a>
        </div>
        <div class="col-lg-4 col-sm-4 wow fadeInUp" data-wow-delay=".3s">
          <P class="footer-classic-title text-lg-left text-center">Quick Links</P>
          <ul class="footer-classic-nav-list">
            <li class="text-lg-left text-center"><a href="">Latest news</a></li>
            <li class="text-lg-left text-center"><a href="">University
                newsletter</a></li>
            <li class="text-lg-left text-center"><a href="" data-toggle="modal" data-target="#Contactmodal">Contact</a>
            </li>
          </ul>
        </div>
        <div class="col-lg-4 wow fadeInLeft" data-wow-delay=".2s">
          <P class="footer-classic-title">newsletter</P>
          <form class="rd-mailform text-left footer-classic-subscribe-form" data-form-output="form-output-global" data-form-type="contact" method="post" action="bat/rd-mailform.php">
            <p class="text-white">Be the first to find out about our latest news, updates, and special offers.</p>
            <div class="form-wrap col-12 p-0">
              <label class="form-label p-0" for="subscribe-email">Your Email Address</label>
              <input class="form-input" id="subscribe-email" type="email" style="position: absolute; left: 0;" name="email">
              <input class="form-button button-primary button-circle col-5 text-center justify-content-center" style="position: absolute; right: 0; min-height: 50px; border: none; border-bottom-left-radius: 0; border-top-left-radius: 0;" value="Sign Up" type="button" />
            </div>
          </form>
        </div>
      </div>
    </div>
    <div class="container wow fadeInUp" data-wow-delay=".4s">
      <div class="footer-classic-aside">
        <p class="rights">© Copyright E-Recruit Team FCAI-HU - 2024</p>
        <ul class="social-links">
          <li><a class="fa fa-linkedin" target="_blank" href=""></a></li>
          <li><a class="fa fa fa-twitter" target="_blank" href=""></a></li>
          <li><a class="fa fa-facebook" target="_blank" href=""></a></li>
          <li><a class="fa fa-instagram" target="_blank" href=""></a></li>
        </ul>
      </div>
    </div>
  </footer>
  </div>

  <!-- Contact Modal -->
  <div class="modal fade" id="Contactmodal" tabindex="-1" role="dialog" aria-labelledby="ContactmodalTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="ContactusTitle">Contact us</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">

          <label class="col-12">
            <strong>Name</strong>
          </label>
          <label class="col-12">Youssef Sheta</label>

          <label class="col-12">
            <strong>E-mail</strong>
          </label>
          <label class="col-12">youssefsheta23.9@gmail.com</label>

          <label class="col-12">
            <strong>Mobile</strong>
          </label>
          <label class="col-12">01014417566</label>

          <label class="col-12">
            <strong>Fax</strong>
          </label>
          <label class="col-12"></label>

          <label class="col-12">
            <strong>Address</strong>
          </label>
          <label class="col-12"></label>

        </div>
      </div>
    </div>
  </div>


  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Are you sure you want to logout?</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <form class="form-inline my-2 my-md-0" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <input type="submit" name="Logout" value="Logout" class="btn btn-primary" href="login.html">
            </input>
          </form>
        </div>
      </div>
    </div>
  </div>

  <script src="<?php echo BASE_URL; ?>assets/js/JS/jquery-3.6.0.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
  </script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
  </script>
  <div class="snackbars" id="form-output-global"></div>
  <script src="<?php echo BASE_URL; ?>assets/js/JS/core.min.js"></script>
  <script src="<?php echo BASE_URL; ?>assets/js/JS/script.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.6.0/slick.js"></script>

  <!-- All JS Custom Plugins Link Here here -->
  <script src="<?php echo BASE_URL; ?>assets/js/vendor/modernizr-3.5.0.min.js"></script>
  <!-- One Page, Animated-HeadLin -->
  <script src="<?php echo BASE_URL; ?>assets/js/wow.min.js"></script>
  <script src="<?php echo BASE_URL; ?>assets/js/animated.headline.js"></script>
  <script src="<?php echo BASE_URL; ?>assets/js/jquery.magnific-popup.js"></script>

  <!-- Breaking New Pluging -->
  <script src="<?php echo BASE_URL; ?>assets/js/jquery.ticker.js"></script>
  <script src="<?php echo BASE_URL; ?>assets/js/site.js"></script>

  <!-- Scrollup, nice-select, sticky -->
  <script src="<?php echo BASE_URL; ?>assets/js/jquery.scrollUp.min.js"></script>
  <script src="<?php echo BASE_URL; ?>assets/js/jquery.nice-select.min.js"></script>
  <script src="<?php echo BASE_URL; ?>assets/js/jquery.sticky.js"></script>

  <!-- Jquery Plugins, main Jquery -->
  <script src="<?php echo BASE_URL; ?>assets/js/plugins.js"></script>
  <script src="<?php echo BASE_URL; ?>assets/js/main.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="<?php echo BASE_URL; ?>assets/js/JS/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="<?php echo BASE_URL; ?>assets/js/JS/sb-admin-2.min.js"></script>
</body>

</html>