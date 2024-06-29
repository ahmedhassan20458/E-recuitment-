<?php
$isAuth = true;
require_once(__DIR__ . '/../config/config.php');

// Get admin data from database 
$sql = "SELECT image FROM accounts_images WHERE username = '" . $_SESSION['username'] . "'";
if ($stmt = mysqli_prepare($conn, $sql)) {
    // Attempt to execute the prepared statement
    if (mysqli_stmt_execute($stmt)) {
        // Store result
        $result = mysqli_stmt_store_result($stmt);

        if (mysqli_stmt_num_rows($stmt) == 1) {
            mysqli_stmt_bind_result($stmt, $image);
            if (empty($image)) {
                $img = 'Images/PP.png';
            } else {
                $img = 'data:image/jpeg;base64,' . base64_encode($image);
            }
            if (mysqli_stmt_fetch($stmt)) {
            }
        } else {
            echo "Oops! Something went wrong. Please try again later.";
        }
    } else {
        echo "Oops! Something went wrong. Please try again later.";
    }

    // Close statement
    mysqli_stmt_close($stmt);
}

$sql = "SELECT role FROM accounts WHERE username = '" . $_SESSION['username'] . "'";
if ($stmt = mysqli_prepare($conn, $sql)) {

    // Attempt to execute the prepared statement
    if (mysqli_stmt_execute($stmt)) {
        // Store result
        mysqli_stmt_store_result($stmt);

        if (mysqli_stmt_num_rows($stmt) !== 0) {
            // Bind result variables
            mysqli_stmt_bind_result($stmt, $_SESSION["role"]);
            if (mysqli_stmt_fetch($stmt)) {
            }
        } else {
            echo "Oops! Something went wrong. Please try again later.";
        }
    } else {
        echo "Oops! Something went wrong. Please try again later.";
    }

    if ($_SESSION['role'] !== 'MOTAAdmin' && $_SESSION['role'] !== 'Employer') {
        session_unset();
        session_destroy();
        header("location: " . $Path . "SignIn" . $End);
        exit;
    } elseif ($_SESSION['role'] == 'MOTAAdmin') {
        $Dir = 'Admin/MOTAAdmin';
    } elseif ($_SESSION['role'] == 'Employer') {
        $Dir = 'Company';
    }
    // Close statement
    mysqli_stmt_close($stmt);
}



if (isset($_GET['viewuser'])) {
    $_SESSION['ViewUsername'] = $_GET['viewuser'];

    if (isset($_GET['viewjob'])) {
        $_SESSION['ViewJobid'] = $_GET['viewjob'];
        $respond = 'inline-block';
    } elseif (isset($_GET['viewpos'])) {
        $_SESSION['viewposition'] = $_GET['viewpos'];
        $respond = 'none';
    }
} else {
    header("location: " . $Path . "Company" . $End);
}


// Get View Username data from database 
$sql = "SELECT image FROM accounts_images WHERE username = '" . $_SESSION['ViewUsername'] . "'";
if ($stmt = mysqli_prepare($conn, $sql)) {
    // Attempt to execute the prepared statement
    if (mysqli_stmt_execute($stmt)) {
        // Store result
        $result = mysqli_stmt_store_result($stmt);

        if (mysqli_stmt_num_rows($stmt) == 1) {
            mysqli_stmt_bind_result($stmt, $image);
            if (empty($image)) {
                $img = BASE_URL . 'assets/images/Images/PP.png';
            } else {
                $vwimg = 'data:image/jpeg;base64,' . base64_encode($image);
            }
            if (mysqli_stmt_fetch($stmt)) {
            }
        } else {
            echo "Oops! Something went wrong. Please try again later.";
        }
    } else {
        echo "Oops! Something went wrong. Please try again later.";
    }

    // Close statement
    mysqli_stmt_close($stmt);
}

// Get CV data from database 
$sql = "SELECT resume FROM applicants WHERE username = '" . $_SESSION['ViewUsername'] . "'";
if ($stmt = mysqli_prepare($conn, $sql)) {
    // Attempt to execute the prepared statement
    if (mysqli_stmt_execute($stmt)) {
        // Store result
        $result = mysqli_stmt_store_result($stmt);

        if (mysqli_stmt_num_rows($stmt) == 1) {
            mysqli_stmt_bind_result($stmt, $CV);
            if (mysqli_stmt_fetch($stmt)) {
            }
        } else {
            echo "Oops! Something went wrong. Please try again later.";
        }
    } else {
        echo "Oops! Something went wrong. Please try again later.";
    }

    // Close statement
    mysqli_stmt_close($stmt);
}


//Get user data from DB
$sql = "SELECT id, full_name, adress, mobile, email, resume_name, facebook, instagram, twitter, linkedin, website, job_position, skills, skill_rating, certificates FROM applicants WHERE username = ?";
if ($stmt = mysqli_prepare($conn, $sql)) {
    // Bind variables to the prepared statement as parameters
    mysqli_stmt_bind_param($stmt, "s", $param_username);

    // Set parameters
    $param_username = $_SESSION["ViewUsername"];

    // Attempt to execute the prepared statement
    if (mysqli_stmt_execute($stmt)) {
        // Store result
        mysqli_stmt_store_result($stmt);

        if (mysqli_stmt_num_rows($stmt) == 1) {
            // Bind result variables
            mysqli_stmt_bind_result($stmt, $_SESSION["Viewid"], $_SESSION["Viewfull_name"], $_SESSION["Viewadress"], $_SESSION["Viewmobile"], $_SESSION["Viewemail"], $_SESSION["Viewresume_name"], $_SESSION["Viewfacebook"], $_SESSION["Viewinstagram"], $_SESSION["Viewtwitter"], $_SESSION["Viewlinkedin"], $_SESSION["Viewwebsite"], $_SESSION["Viewjob_position"], $_SESSION["Viewskills"], $_SESSION["Viewskill_rating"], $_SESSION["Viewcertificates"]);
            if (mysqli_stmt_fetch($stmt)) {
            }
        } else {
            echo "Oops! Something went wrong. Please try again later.";
        }
    } else {
        echo "Oops! Something went wrong. Please try again later.";
    }
    if (empty($_SESSION['Viewwebsite'])) {
        $web = 'none';
    } else {
        $web = 'flex';
    }
    if (empty($_SESSION['Viewfacebook'])) {
        $fb = 'none';
    } else {
        $fb = 'flex';
    }
    if (empty($_SESSION['Viewinstagram'])) {
        $ig = 'none';
    } else {
        $ig = 'flex';
    }
    if (empty($_SESSION['Viewtwitter'])) {
        $tw = 'none';
    } else {
        $tw = 'flex';
    }
    if (empty($_SESSION['Viewlinkedin'])) {
        $li = 'none';
    } else {
        $li = 'flex';
    }

    // Close statement
    mysqli_stmt_close($stmt);
}
//Set Certifications, Skills & Rating Variables
$Skillsss = explode(",,", $_SESSION["Viewskills"]);
$skill_ratings = explode(",", $_SESSION["Viewskill_rating"]);
$certificates = explode(",,", $_SESSION["Viewcertificates"]);



if (isset($_POST['Accept'])) {
    $sql = "UPDATE jobs SET employees = COALESCE(employees, '," . $_SESSION["Viewid"] . ",') , applicants = REPLACE(applicants, '," . $_SESSION["Viewid"] . ",', '') WHERE id=" . $_SESSION['ViewJobid'] . " AND company = '" . $_SESSION['company'] . "'";
    if ($conn->query($sql) === TRUE) {
        echo "<script>
                    alert('Applicant accepted!');
                     window.location.href='" . $Path . "Company" . $End . "';
                </script>";
    } else {
        echo "Error updating record: " . $conn->error;
    }
    exit;
}



if (isset($_POST['Reject'])) {
    $sql = "UPDATE jobs SET rejected_accounts = COALESCE(rejected_accounts, '," . $_SESSION["Viewid"] . ",') , applicants = REPLACE(applicants, '," . $_SESSION["Viewid"] . ",', '') WHERE id=" . $_SESSION['ViewJobid'] . " AND company = '" . $_SESSION['company'] . "'";
    if ($conn->query($sql) === TRUE) {
        echo "<script>
                    alert('Applicant rejected!');
                     window.location.href='" . $Path . "Company" . $End . "';
                </script>";
    } else {
        echo "Error updating record: " . $conn->error;
    }
    exit;
}
