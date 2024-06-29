<?php
session_start();

require_once(__DIR__ . '/../../controllers/ViewProfileController.php');


?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title>View Profile</title>
  <link rel="icon" href="<?php echo BASE_URL; ?>assets/images/Logo Shape.svg">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
  <link rel="stylesheet" href="<?php echo BASE_URL; ?>assets/css/CSS/ProfileStyle.css">
  <script src="<?php echo BASE_URL; ?>assets/js/JS/ViewProfileJS.JS"></script>
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
  <script src="https://kit.fontawesome.com/475cbef551.js" crossorigin="anonymous"></script>

  <!-- Custom styles for this template-->
  <link href="<?php echo BASE_URL; ?>assets/css/CSS/sb-admin-2.min.css" rel="stylesheet">
  <script src="<?php echo BASE_URL; ?>assets/js/JS/jquery-3.6.0.min.js"></script>

  <script type='text/javascript'>
    <?php
    $SkillsArray = json_encode($Skillsss);
    $SKRating = json_encode($skill_ratings);
    $Certs = json_encode($certificates);
    echo "var Skills_array = " . $SkillsArray . ";";
    echo "var SkRating_array = " . $SKRating . ";";
    echo "var Certs = " . $Certs . ";";
    ?>
  </script>

</head>

<body onLoad="ReadSkills('form');" class="bg-light">
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


  <div class="container">
    <div class="w-100 row mb-2 m-0">
      <button type="button" class="btn btn-danger btn-square-sm ml-auto align-middle mr-1" style="display: <?php echo ($respond); ?>" title="Reject" data-toggle="modal" data-target="#RejectModal">
        <i class="fa-solid fa-x"></i>
      </button>
      <button type="button" class="btn btn-success btn-square-sm ml-1 align-middle mr-1" style="display: <?php echo ($respond); ?>" title="Accept" data-toggle="modal" data-target="#AcceptModal">
        <i class="fa-solid fa-check"></i>
      </button>
    </div>

    <div class="main-body">
      <div class="row gutters-sm">
        <div class="col-md-4 mb-3">
          <div class="card rounded-bottom">
            <div class="card-body">
              <div class="d-flex flex-column align-items-center text-center">
                <img src="<?php echo ($img); ?>" alt="Profile Picture" class="rounded-circle pp" width="150" height="150">
                <div class="mt-3">
                  <h4 id="UsernameMain"><?php echo ($_SESSION["ViewUsername"]); ?></h4>
                  <p id="JobMain" class="text-secondary mb-1"><?php echo ($_SESSION["Viewjob_position"]); ?></p>
                  <p id="AdressMain" class="text-muted font-size-sm"><?php echo ($_SESSION["Viewadress"]); ?></p>
                </div>
              </div>
            </div>
          </div>
          <div class="card mt-3 rounded">
            <div class="card-body">
              <div class="row d-flex align-items-center justify-content-center mb-3">
                <h6 class="float-left col-12 m-0 mb-3"><i class="material-icons text-info mr-2">Social Info</i></h6>
                <!--							data-toggle="modal" data-target="#CertsModal"     -->
              </div>
              <div class="row" style="display: <?php echo ($web); ?>">
                <div class="col-5 ml-3">
                  <h6 class="mb-0 row">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-globe mr-2 icon-inline">
                      <circle cx="12" cy="12" r="10"></circle>
                      <line x1="2" y1="12" x2="22" y2="12"></line>
                      <path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z">
                      </path>
                    </svg>
                    <span class="ml-1 d-flex align-items-center">Website</span>
                  </h6>
                </div>
                <div class="col-6 text-secondary text-right pl-0 ml-auto">
                  <span id="WebsiteMain"><small><?php echo ($_SESSION["Viewwebsite"]); ?></small></span>
                </div>
              </div>

              <hr style="display: <?php echo ($web); ?>">

              <div class="row" style="display: <?php echo ($fb); ?>">
                <div class="col-5 ml-3">
                  <h6 class="mb-0 row">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-facebook mr-2 icon-inline text-primary">
                      <path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"></path>
                    </svg>
                    <span class="ml-1 d-flex align-items-center">Facebook</span>
                  </h6>
                </div>
                <div class="col-6 text-secondary text-right pl-0 ml-auto">
                  <span id="FBMain"><?php echo ($_SESSION["Viewfacebook"]); ?></span>
                </div>
              </div>

              <hr style="display: <?php echo ($fb); ?>">

              <div class="row" style="display: <?php echo ($ig); ?>">
                <div class="col-5 ml-3">
                  <h6 class="mb-0 row">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-instagram mr-2 icon-inline text-danger">
                      <rect x="2" y="2" width="20" height="20" rx="5" ry="5"></rect>
                      <path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path>
                      <line x1="17.5" y1="6.5" x2="17.51" y2="6.5"></line>
                    </svg>
                    <span class="ml-1 d-flex align-items-center">Instagram</span>
                  </h6>
                </div>
                <div class="col-6 text-secondary text-right pl-0 ml-auto">
                  <span id="IGMain"><?php echo ($_SESSION["Viewinstagram"]); ?></span>
                </div>
              </div>

              <hr style="display: <?php echo ($ig); ?>">

              <div class="row" style="display: <?php echo ($tw); ?>">
                <div class="col-5 ml-3">
                  <h6 class="mb-0 row">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-twitter mr-2 icon-inline text-info">
                      <path d="M23 3a10.9 10.9 0 0 1-3.14 1.53 4.48 4.48 0 0 0-7.86 3v1A10.66 10.66 0 0 1 3 4s-4 9 5 13a11.64 11.64 0 0 1-7 2c9 5 20 0 20-11.5a4.5 4.5 0 0 0-.08-.83A7.72 7.72 0 0 0 23 3z">
                      </path>
                    </svg>
                    <span class="ml-1 d-flex align-items-center">Twitter</span>
                  </h6>
                </div>
                <div class="col-6 text-secondary text-right pl-0 ml-auto">
                  @<span id="TWMain"><?php echo ($_SESSION["Viewtwitter"]); ?></span>
                </div>
              </div>

              <hr style="display: <?php echo ($tw); ?>">

              <div class="row" style="display: <?php echo ($li); ?>">
                <div class="col-5 ml-3">
                  <h6 class="mb-0 row">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-linkedin" viewBox="0 0 16 16">
                      <path d="M0 1.146C0 .513.526 0 1.175 0h13.65C15.474 0 16 .513 16 1.146v13.708c0 .633-.526 1.146-1.175 1.146H1.175C.526 16 0 15.487 0 14.854V1.146zm4.943 12.248V6.169H2.542v7.225h2.401zm-1.2-8.212c.837 0 1.358-.554 1.358-1.248-.015-.709-.52-1.248-1.342-1.248-.822 0-1.359.54-1.359 1.248 0 .694.521 1.248 1.327 1.248h.016zm4.908 8.212V9.359c0-.216.016-.432.08-.586.173-.431.568-.878 1.232-.878.869 0 1.216.662 1.216 1.634v3.865h2.401V9.25c0-2.22-1.184-3.252-2.764-3.252-1.274 0-1.845.7-2.165 1.193v.025h-.016a5.54 5.54 0 0 1 .016-.025V6.169h-2.4c.03.678 0 7.225 0 7.225h2.4z" />
                    </svg>
                    <span class="ml-1 d-flex align-items-center">Linkedin</span>
                  </h6>
                </div>
                <div class="col-6 text-secondary text-right pl-0 ml-auto">
                  <span id="LIMain"><?php echo ($_SESSION["Viewlinkedin"]); ?></span>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-8">
          <div class="card mb-3 rounded">
            <div class="card-body">
              <div class="row d-flex align-items-center justify-content-center">
                <h6 class="float-left col-12 m-0 mb-3"><i class="material-icons text-info mr-2">Contact Info</i></h6>
              </div>
              <div class="row">
                <div class="col-4">
                  <h6 class="mb-0">Full Name</h6>
                </div>
                <div class="col-8 text-secondary">
                  <span id="FName"><?php echo ($_SESSION["Viewfull_name"]); ?></span>
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-4">
                  <h6 class="mb-0">Email</h6>
                </div>
                <div class="col-8 text-secondary">
                  <span id="mail"><?php echo ($_SESSION["Viewemail"]); ?></span>
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-4">
                  <h6 class="mb-0">Mobile</h6>
                </div>
                <div class="col-8 text-secondary">
                  <span id="mob"><?php echo ($_SESSION["Viewmobile"]); ?></span>
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-4">
                  <h6 class="mb-0">Address</h6>
                </div>
                <div class="col-8 text-secondary">
                  <span id="adress"><?php echo ($_SESSION["Viewadress"]); ?></span>
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-4">
                  <h6 class="mb-0">Resume</h6>
                </div>
                <div class="col-8 text-secondary">
                  <span id="adress"><?php echo ($_SESSION["Viewresume_name"]); ?></span>
                </div>
              </div>
            </div>
          </div>
          <div class="row gutters-sm">
            <div class="col-sm-6 mb-3">
              <div class="card h-100 rounded">
                <div class="card-body">
                  <div class="row d-flex align-items-center justify-content-center mb-3">
                    <h6 class="float-left col-12 m-0 mb-3"><i class="material-icons text-info mr-2">Skills</i></h6>
                  </div>
                  <?php
                  if (count($Skillsss) > 0) {
                    for ($i = 0; $i < count($Skillsss); $i++) {
                      if ($Skillsss[$i] != "") {
                        echo (
                          '<small>' . $Skillsss[$i] . '</small>
													<div class="progress mb-3" style="height: 5px">
														<div class="progress-bar bg-primary" role="progressbar" style="width: ' . $skill_ratings[$i] . '%" aria-valuenow="' . $skill_ratings[$i] . '" aria-valuemin="0" aria-valuemax="100"></div>
													</div>'
                        );
                      }
                    }
                  }
                  ?>
                </div>
              </div>
            </div>
            <div class="col-sm-6 mb-3">
              <div class="card h-100 rounded">
                <div class="card-body">
                  <div class="row d-flex align-items-center justify-content-center mb-3">
                    <h6 class="float-left col-12 m-0 mb-3"><i class="material-icons text-info mr-2">Certifications</i>
                    </h6>

                  </div>
                  <?php
                  $hr = '';
                  if (count($certificates) > 1) {
                    $hr = '<hr>';
                  }
                  for ($i = 0; $i < count($certificates); $i++) {
                    echo ($certificates[$i] . $hr);
                  }
                  ?>
                </div>
              </div>
            </div>
          </div>

          <div class="card mb-3 rounded">
            <div class="card-body">
              <div class="row d-flex align-items-center justify-content-center">
                <h6 class="float-left col-7 m-0"><i class="material-icons text-info mr-2">Work History</i></h6>
                <button type="button" class="btn btn-dark btn-square-sm float-right ml-auto align-middle mr-3" id="" style="color: white;" onClick=""><i class="bi bi-pen"></i></button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>



    <!-- Accept Modal-->
    <div class="modal fade" id="AcceptModal" tabindex="-1" role="dialog" aria-labelledby="Accept" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="Accept">Accept applicant</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">×</span> </button>
          </div>
          <div class="modal-body text-dark">Are you sure you want to <strong>accept</strong> this applicant?</div>
          <div class="modal-footer">
            <button class="btn btn-secondary mr-auto" type="button" data-dismiss="modal">Cancel</button>
            <form class="form-inline my-2 my-md-0" method="post">
              <input type="submit" name="Accept" value="Accept" class="btn btn-success">
              </input>
            </form>
          </div>
        </div>
      </div>
    </div>

    <!-- Reject Modal-->
    <div class="modal fade" id="RejectModal" tabindex="-1" role="dialog" aria-labelledby="Reject" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="Reject">Reject applicant</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">×</span> </button>
          </div>
          <div class="modal-body text-dark">Are you sure you want to <strong>reject</strong> this applicant?</div>
          <div class="modal-footer">
            <button class="btn btn-secondary mr-auto" type="button" data-dismiss="modal">Cancel</button>
            <form class="form-inline my-2 my-md-0" method="post">
              <input type="submit" name="Reject" value="Reject" class="btn btn-danger">
              </input>
            </form>
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
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">Are you sure you want to logout?</div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
            <form class="form-inline my-2 my-md-0" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
              <input type="submit" name="Logout" value="Logout" class="btn btn-primary" href="login.html"></input>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>




  <!-- Bootstrap core JavaScript-->
  <script src="<?php echo BASE_URL; ?>assets/js/JS/jquery/jquery.min.js"></script>
  <script src="<?php echo BASE_URL; ?>assets/js/JS/Bootjs/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="<?php echo BASE_URL; ?>assets/js/JS/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="<?php echo BASE_URL; ?>assets/js/JS/sb-admin-2.min.js"></script>
</body>

</html>