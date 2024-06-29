<?php

$isAuth = false;
require_once(__DIR__ . '/../../controllers/JobDetailsController.php');


?>
<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>E-Recruit - Job Details </title>
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!--        <link rel="manifest" href="site.webmanifest">-->
  <link rel="shortcut icon" type="image/x-icon" href="<?php echo BASE_URL; ?>assets/images/Logo Shape.svg">
  <script src="https://kit.fontawesome.com/475cbef551.js" crossorigin="anonymous"></script>

  <!-- Custom styles for this template-->
  <link href="<?php echo BASE_URL; ?>assets/css/CSS/sb-admin-2.min.css" rel="stylesheet">
  <script src="<?php echo BASE_URL; ?>assets/js/JS/jquery-3.6.0.min.js"></script>

  <!-- CSS here -->
  <link rel="stylesheet" href="<?php echo BASE_URL; ?>assets/css/CSS/JobDetailsStyle.css">
  <link rel="stylesheet" href="<?php echo BASE_URL; ?>assets/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?php echo BASE_URL; ?>assets/css/owl.carousel.min.css">
  <link rel="stylesheet" href="<?php echo BASE_URL; ?>assets/css/flaticon.css">
  <link rel="stylesheet" href="<?php echo BASE_URL; ?>assets/css/slicknav.css">
  <link rel="stylesheet" href="<?php echo BASE_URL; ?>assets/css/price_rangs.css">
  <link rel="stylesheet" href="<?php echo BASE_URL; ?>assets/css/animate.min.css">
  <link rel="stylesheet" href="<?php echo BASE_URL; ?>assets/css/magnific-popup.css">
  <link rel="stylesheet" href="<?php echo BASE_URL; ?>assets/css/fontawesome-all.min.css">
  <link rel="stylesheet" href="<?php echo BASE_URL; ?>assets/css/themify-icons.css">
  <link rel="stylesheet" href="<?php echo BASE_URL; ?>assets/css/slick.css">
  <link rel="stylesheet" href="<?php echo BASE_URL; ?>assets/css/nice-select.css">
  <link rel="stylesheet" href="<?php echo BASE_URL; ?>assets/css/style.css">



  <style>
    .btn-light {
      color: #212529;
      background-color: #f8f9fa;
      border-color: #f8f9fa;
      min-width: 0px;
    }

    .btn-light::before {
      background: #AFAFAF;
    }
  </style>


</head>

<body>

  <!-- Topbar -->
  <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow-sm">
    <a class="navbar-brand h-100 p-1 d-flex" href="<?php echo ($Path . "Home" . $End); ?>">
      <img src="<?php echo BASE_URL; ?>assets/images/Logo.svg" style="min-height:100%; max-height: 4vh;" alt="">
    </a>

    <!-- Topbar Navbar -->
    <ul class="navbar-nav ml-auto">
      <!-- Nav Item - User Information -->
      <li class="nav-item dropdown no-arrow">
        <a class="nav-link dropdown-toggle" href="#" title="Account" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <span class="mr-2 text-gray-600 small">
            <?php echo ($_SESSION["username"]); ?>
          </span>
          <img class="img-profile rounded-circle" alt="PP" src="<?php echo ($img); ?>">
        </a>
        <!-- Dropdown - User Information -->
        <div class="dropdown-menu dropdown-menu-right shadow-sm animated--grow-in" aria-labelledby="userDropdown">
          <a class="dropdown-item" href="<?php echo ($Path . "Jobs" . $End); ?>" style="display: <?php echo ($app); ?>;">
            <i class="fas fa-magnifying-glass fa-sm fa-fw mr-2 text-gray-400"></i> Find Jobs
          </a>

          <a class="dropdown-item" href="<?php echo ($Path . $Comp . $End); ?>" style="display: <?php echo ($emp); ?>;">
            <i class="fas fa-lock fa-sm fa-fw mr-2 text-gray-400"></i> Admin
          </a>

          <a class="dropdown-item" href="<?php echo ($Path . "Home" . $End); ?>">
            <i class="fa-solid fa-house fa-sm fa-fw mr-2 text-gray-400"></i> Home
          </a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
            <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i> Logout
          </a>
        </div>
      </li>
    </ul>
  </nav>
  <!-- End of Topbar -->

  <main style="min-height:95vh;">

    <!-- job post company Start -->
    <div class="job-post-company">
      <div class="container">
        <div class="row justify-content-between">
          <!-- Left Content -->
          <div class="col-xl-7 col-lg-8">
            <!-- job single -->
            <div class="single-job-items mb-50">
              <div class="job-items">
                <div class="company-img company-img-details"> <img src="<?php echo ($_SESSION['lgo']); ?>" class="border border-light shadow mb-3" id="logo" alt=""> </div>
                <div class="job-tittle">
                  <h4><?php echo ($_SESSION['job_title']); ?></h4>
                  <ul>
                    <li><?php echo ($_SESSION['company']); ?></li>
                    <li><i class="fas fa-map-marker-alt"></i><?php echo ($_SESSION['location']); ?></li>
                    <li>$3500 - $4000</li>
                  </ul>
                </div>
              </div>
            </div>
            <!-- job single End -->

            <div class="job-post-details">
              <div class="post-details1 mb-50">
                <!-- Small Section Tittle -->
                <div class="small-section-tittle">
                  <h4>Job Description</h4>
                </div>
                <p><?php echo ($_SESSION['job_description']); ?></p>
              </div>
              <div class="post-details2  mb-50">
                <!-- Small Section Tittle -->
                <div class="small-section-tittle">
                  <h4>Required Knowledge, Skills, and Abilities</h4>
                </div>
                <ul>
                  <li>System Software Development</li>
                  <li>Mobile Applicationin iOS/Android/Tizen or other platform</li>
                  <li>Research and code , libraries, APIs and frameworks</li>
                  <li>Strong knowledge on software development life cycle</li>
                  <li>Strong problem solving and debugging skills</li>
                </ul>
              </div>
              <div class="post-details2  mb-50">
                <!-- Small Section Tittle -->
                <div class="small-section-tittle">
                  <h4>Education + Experience</h4>
                </div>
                <ul>
                  <li>3 or more years of professional design experience</li>
                  <li>Direct response email experience</li>
                  <li>Ecommerce website design experience</li>
                  <li>Familiarity with mobile and web apps preferred</li>
                  <li>Experience using Invision a plus</li>
                </ul>
              </div>
            </div>
          </div>
          <!-- Right Content -->
          <div class="col-xl-4 col-lg-4">
            <div class="post-details3  mb-50">
              <!-- Small Section Tittle -->
              <div class="small-section-tittle">
                <h4>Job Overview</h4>
              </div>
              <ul>
                <li>Posted date : <span><?php echo ($_SESSION['time_added']); ?></span></li>
                <li>Location : <span><?php echo ($_SESSION['location']); ?></span></li>
                <li>Vacancy : <span><?php echo ($_SESSION['capacity']); ?></span></li>
                <li>Job nature : <span>Full time</span></li>
                <li>Salary : <span>$7,800 yearly</span></li>
                <!--              <li>Application date : <span>12 Sep 2020</span></li>-->
              </ul>
              <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"] . '?id=' . $_SESSION['JobID']); ?>" method="post" id="FORM">
                <div class="apply-btn2"> <button type="submit" name="Apply" href="#" class="btn p-4" <?php echo ($_SESSION['apply']); ?> id="apply">Apply Now</button> </div>
              </form>
            </div>
            <div class="post-details4  mb-50">
              <!-- Small Section Tittle -->
              <div class="small-section-tittle">
                <h4>Company Information</h4>
              </div>
              <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>
              <ul>
                <li>Name: <span></span></li>
                <li>Web : <span></span></li>
                <li>Email: <span></span></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- job post company End -->

  </main>
  <footer style="margin-bottom:-20px;">
    <!-- Footer Start-->
    <div class="footer-area footer-bg footer-padding">
      <div class="container">
        <div class="row d-flex justify-content-between">
          <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6">
            <div class="single-footer-caption mb-50">
              <div class="single-footer-caption mb-30">
                <div class="footer-tittle">
                  <h4>About Us</h4>
                  <div class="footer-pera">
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-xl-3 col-lg-3 col-md-4 col-sm-5">
            <div class="single-footer-caption mb-50">
              <div class="footer-tittle">
                <h4>Contact Info</h4>
                <ul>
                  <li>
                    <p>Address :</p>
                  </li>
                  <li><a href="#">Phone :</a></li>
                  <li><a href="#">Email :</a></li>
                </ul>
              </div>
            </div>
          </div>
          <div class="col-xl-3 col-lg-3 col-md-4 col-sm-5">
            <div class="single-footer-caption mb-50">
              <div class="footer-tittle">
                <h4>Important Links</h4>
                <ul>
                  <li><a href="#"> View Project</a></li>
                  <li><a href="#">Contact Us</a></li>
                  <li><a href="#">Testimonial</a></li>
                  <li><a href="#">Proparties</a></li>
                  <li><a href="#">Support</a></li>
                </ul>
              </div>
            </div>
          </div>
          <div class="col-xl-3 col-lg-3 col-md-4 col-sm-5">
            <div class="single-footer-caption mb-50">
              <div class="footer-tittle">
                <h4>Newsletter</h4>
                <div class="footer-pera footer-pera2">
                  <p>Heaven fruitful doesn't over lesser in days. Appear creeping.</p>
                </div>
                <!-- Form -->
                <div class="footer-form">
                  <div id="mc_embed_signup">
                    <form target="_blank" action="https://spondonit.us12.list-manage.com/subscribe/post?u=1462626880ade1ac87bd9c93a&amp;id=92a4423d01" method="get" class="subscribe_form relative mail_part">
                      <input type="email" name="email" id="newsletter-form-email" placeholder="Email Address" class="placeholder hide-on-focus" onfocus="this.placeholder = ''" onblur="this.placeholder = ' Email Address '">
                      <div class="form-icon">
                        <button type="submit" name="submit" id="newsletter-submit" class="email_icon newsletter-submit button-contactForm"><img src="" alt=""></button>
                      </div>
                      <div class="mt-10 info"></div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!--  -->
        <div class="row footer-wejed justify-content-center ">
          <div class="col-xl-3col-md-4 col-lg-3 col-12 row fadeInLeft row justify-content-center">
            <!-- logo -->
            <div class="footer-logo mb-20 col-12 row row-30 justify-content-center"><img src="Images/logoMOT.png" style="max-width: 30%!important;" alt=""> </div>
          </div>

        </div>
      </div>
    </div>
    <!-- Footer End-->
  </footer>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Are you sure you want to logout?</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <form class="form-inline my-2 my-md-0" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <input type="submit" name="Logout" value="Logout" class="btn btn-primary"></input>
          </form>
        </div>
      </div>
    </div>
  </div>

  <!-- JS here -->

  <script src="<?php echo BASE_URL; ?>assets/js/JS/core.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.6.0/slick.js"></script>


  <!-- All JS Custom Plugins Link Here here -->
  <script src="<?php echo BASE_URL; ?>assets/js/vendor/modernizr-3.5.0.min.js"></script>

  <!-- Jquery Plugins, main Jquery -->
  <script src="<?php echo BASE_URL; ?>assets/js/plugins.js"></script>
  <script src="<?php echo BASE_URL; ?>assets/js/main.js"></script>
</body>

</html>