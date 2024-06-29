<?php

$isAuth = false;
require_once(__DIR__ . '/../../controllers/JobsController.php');



if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    $Logout = 'none';
    $Login = 'inline-block';
    $Profile = 'none';
} else {
    $Logout = 'inline-block';
    $Login = 'none';
    $Profile = 'inline-block';
}


?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>E-Recruit - Jobs</title>
    <link rel="icon" href="<?php echo BASE_URL; ?>assets/images/Logo Shape.svg">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>assets/css/CSS/JobsStyle.css">
    <script src="<?php echo BASE_URL; ?>assets/js/JS/JobsJS.js"></script>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css" integrity="sha256-mmgLkCYLUQbXn0B1SRqzHar6dCnv9oZFPEC1g1cwlkk=" crossorigin="anonymous" />

    <!-- Custom fonts for this template-->
    <link href="<?php echo BASE_URL; ?>assets/css/CSS/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <script src="https://kit.fontawesome.com/475cbef551.js" crossorigin="anonymous"></script>

    <!-- Custom styles for this template-->
    <link href="<?php echo BASE_URL; ?>assets/css/CSS/sb-admin-2.min.css" rel="stylesheet">
    <script src="<?php echo BASE_URL; ?>assets/js/JS/jquery-3.6.0.min.js"></script>

    <!-- Font Awesome CSS -->
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>assets/fonts/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>assets/fonts/themify-icons.css">
    <!-- Slicknav js -->
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>assets/css/slicknav.css" type="text/css">
    <!-- Main Styles -->
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>assets/css/main.css" type="text/css">
    <!-- Responsive CSS Styles -->
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>assets/css/responsive.css" type="text/css">

    <!-- Select Stylesheet -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">
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

    <!-- Find Job Section Start -->
    
<div class="row mx-auto w-100 m-0 text-center justify-content-center align-items-center">
    <h6 class="col-md-auto col-6">Search By Company:</h6>
    <div class="col-md-auto col-6 my-2">
        <select class="selectpicker" data-live-search="true" multiple id="selectcompany" onChange="filter();">
            <?php
            $sql = "SELECT company FROM companies WHERE Status = 'Enabled' ORDER BY company ASC";
            if ($stmt = mysqli_query($conn, $sql)) {
                if ($stmt) {
                    while ($row = mysqli_fetch_assoc($stmt)) {
                        echo ("<option>" . $row['company'] . "</option>");
                    }
                }
            }
            ?>
        </select>
    </div>
    <h6 class="col-md-auto col-6 my-2">Search By Job:</h6>
    <div class="col-md-auto col-6">
        <select class="selectpicker" data-live-search="true" multiple id="selectJob" onChange="filter();">
            <?php
            $sql = "SELECT job_title FROM jobs WHERE Status = 'Enabled' ORDER BY company ASC";
            if ($stmt = mysqli_query($conn, $sql)) {
                if ($stmt) {
                    while ($row = mysqli_fetch_assoc($stmt)) {
                        echo ("<option>" . $row['job_title'] . "</option>");
                    }
                }
            }
            ?>
        </select>
    </div>
</div>

    <section class="find-job section pt-3">
        <div class="container">
            <h2 class="section-title">Newest Jobs</h2>
            <div class="row">
                <div class="col-md-12">
                    <?php
                    //Get Jobs from DB
                    $sql = "SELECT id, company, department, job_title, job_description, capacity, applied, accepted, rejected, Status, time_added FROM jobs WHERE Status = 'Enabled' ORDER BY time_added DESC";
                    if ($stmt = mysqli_query($conn, $sql)) {
                        $Color = 'text-dark';
                        if ($stmt) {
                            while ($row = mysqli_fetch_assoc($stmt)) {
                                $sql2 = "SELECT logo, color, location FROM companies WHERE company = '" . $row["company"] . "'";

                                if ($stmt2 = mysqli_prepare($conn, $sql2)) {
                                    // Attempt to execute the prepared statement
                                    if (mysqli_stmt_execute($stmt2)) {
                                        // Store result
                                        mysqli_stmt_store_result($stmt2);
                                        if (mysqli_stmt_num_rows($stmt2) == 1) {
                                            // Bind result variables


                                            mysqli_stmt_bind_result($stmt2, $logo, $col, $loc);

                                            if (mysqli_stmt_fetch($stmt2)) {
                                                $Occupied = 0;
                                                $Occupied += round((($row["accepted"] / $row["capacity"]) * 100), 1);
                                                if ($Occupied <= 50) {
                                                    $Color = 'success';
                                                } elseif ($Occupied > 50 && $Occupied <= 70) {
                                                    $Color = 'warning';
                                                } elseif ($Occupied > 70) {
                                                    $Color = 'danger';
                                                }
                                                if (empty($logo)) {
                                                    $img = 'Images/Company.png';
                                                } else {
                                                    $img = 'data:image/jpeg;base64,' . base64_encode($logo);
                                                }
                                                echo (
                                                    ' 
											<div class="job-list mh-100 mw-100 w-100" company="' . $row["company"] . '" job="' . $row["job_title"] . '">
											  <div class="thumb">
												<a href="#"><img src="' . $img . '" width="100" class="border border-light shadow-sm" alt=""></a>
											  </div>
											  <div class="job-list-content">
												 <h4 class="row w-100" style="max-width: 100%;">
													 <a href="#" class="col-9 pr-0 ml-2" style="word-wrap: break-word;">' . $row["job_title"] . '</a>
													 <span class="full-time  ml-auto align-items-center h-25 h-md-75 py-md-2 py-0 text-center">
                                                         <small style="color: white;">Full-Time</small>
													 </span>
												 </h4>
												<p class="ellipsis pr-2">' . $row["job_description"] . '</p>
												<div class="job-tag">
												  <div class="col-md-7 col-12">
													<div class="meta-tag">
													  <span><a href="browse-categories.html"><i class="fas fa-briefcase fa-sm fa-fw mr-2 text-gray-400"></i>' . $row["department"] . '</a></span>
													  <span><i class="ti-location-pin"></i>' . $loc . '</span>
													</div>
												  </div>
												  <div class="col-md-5 col-12 ml-auto text-right">
													<a href="' . $Path . 'JobDetails' . $End . '?id=' . $row["id"] . '" class="btn btn-common btn-rm text-white">View</a>
												  </div>
												</div>
											  </div>
											</div>');
                                            }
                                        } else {
                                            echo "Oops! Something went wrong. Please try again later.";
                                        }
                                    } else {
                                        echo "Oops! Something went wrong. Please try again later.";
                                    }
                                }
                            }
                        }
                    }
                    ?>
                </div>
            </div>
        </div>
    </section>
    <!-- Find Job Section End -->

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">×</span> </button>
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

    <!-- Bootstrap core JavaScript-->
    <script src="<?php echo BASE_URL; ?>assets/js/JS/jquery/jquery.min.js"></script>
    <script src="<?php echo BASE_URL; ?>assets/js/JS/Bootjs/bootstrap.bundle.min.js"></script>

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?php echo BASE_URL; ?>assets/js/JS/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?php echo BASE_URL; ?>assets/js/JS/sb-admin-2.min.js"></script>
</body>

</html>