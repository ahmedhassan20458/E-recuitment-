<?php
$isAuth = false;
require_once(__DIR__ . '/../../config/config.php');

session_start();


if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] == true) {
    if ($_SESSION["role"] == 'RApplicant' || $_SESSION["role"] == 'Applicant') {
        header("location: " . $Path . "Profile" . $End);
    } elseif ($_SESSION["role"] == 'REmployer' || $_SESSION["role"] == 'Employer') {
        header("location: " . $Path . "Company" . $End);
    } elseif ($_SESSION["role"] == 'MOTAAdmin') {
        header("location: " . $Path . "Admin/Admin" . $End);
    }
}



// Create connection
$conn = new mysqli($db_servername, $db_User, $db_password, $db_name);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
// Define variables and initialize with empty values
$username = $Password = "";
$username_err = $Password_err = $login_err = "";
$A = $E = false;


// Processing form data when form is submitted
if (isset($_POST['Submit'])) {

    // Check if username is empty
    if (empty(($_POST["Username"]))) {
        $username_err = "Please enter username.";
    } else {
        $username = ($_POST["Username"]);
    }

    // Check if password is empty
    if (empty(($_POST["Password"]))) {
        $Password_err = "Please enter your password.";
    } else {
        $Password = ($_POST["Password"]);
    }

    // Validate credentials
    if (empty($username_err) && empty($Password_err)) {
        // Prepare a select statement
        $sql = "SELECT ID, username, password, role, status FROM accounts WHERE username = '" . $username . "'";
        if ($stmt = mysqli_prepare($conn, $sql)) {

            // Attempt to execute the prepared statement
            if (mysqli_stmt_execute($stmt)) {
                // Store result
                mysqli_stmt_store_result($stmt);

                // Check if username exists, if yes then verify password
                if (mysqli_stmt_num_rows($stmt) == 1) {
                    // Bind result variables
                    mysqli_stmt_bind_result($stmt, $id, $username, $hashed_password, $role, $status);
                    if (mysqli_stmt_fetch($stmt)) {
                        if (password_verify($Password, $hashed_password)) {
                            // Password is correct, so start a new session

                            // Store data in session variables
                            //											$direc = $_SESSION['directory'];
                            $_SESSION["id"] = $id;
                            $_SESSION["username"] = $username;
                            $_SESSION['role'] = $role;
                            $_SESSION['status'] = $status;
                            if ($_SESSION['status'] !== "Confirmed") {
                                $_SESSION["loggedin"] = false;
                                echo "<script>
                                        alert('Confirm your email first..');
                                        window.location.href='" . $Path . "SignIn" . $End . "';
                                    </script>";
                            } elseif ($_SESSION['role'] == "Job Applicant" || $_SESSION['role'] == "RApplicant") {
                                $_SESSION["loggedin"] = true;
                                header("location: " . BASE_URL . "views/profile/Profile.php");
                            } elseif ($_SESSION['role'] == "Employer" || $_SESSION['role'] == "REmployer") {
                                $_SESSION["loggedin"] = true;
                                header("location: " . BASE_URL . "views/company/Company.php");
                            } elseif ($_SESSION['role'] == "MOTAAdmin") {
                                $_SESSION["loggedin"] = true;
                                header("location: " . BASE_URL . "Admin/MOTAAdmin.php");
                            } else {
                                $login_err = "Unknown error, please try again later..";
                            }

                            // Redirect user to welcome page

                        } else {
                            //Password is not valid, display a generic error message
                            $login_err = "Invalid password.";
                        }
                    }
                } else {
                    // Username doesn't exist, display a generic error message
                    $login_err = "Invalid username.";
                }
            } else {
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        } else {
            echo "Oops! Something went wrong. Please try again later.";
        }
    }

    // Close connection
    mysqli_close($conn);
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Sign In</title>
    <link rel="icon" href="<?php echo BASE_URL; ?>assets/images/Logo Shape.svg">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>assets/css/CSS/SigninStyle.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;700;1000&display=swap" rel="stylesheet">
</head>

<body>

    <div class="container d-flex align-self-center justify-content-center align-items-center" style="max-width: 100vw; height: 100vh; max-height: 100vh;">
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <!-- Email input -->
            <div class="row align-items-center justify-content-center mb-md-4">
                <div class="col-12 mb-md-0 mb-4 text-center"> <img src="<?php echo BASE_URL; ?>assets/images/Logo.svg" alt="" style="max-height: 20vh; max-width: 90vw;"> </div>
            </div>
            <div class="form-outline mb-2">
                <label class="form-label" for="Username">Username</label>
                <input type="text" id="Username" name="Username" class="form-control" />
            </div>

            <!-- Password input -->
            <div class="form-outline mb-4">
                <label class="form-label" for="Password">Password</label>
                <input type="password" id="Password" name="Password" class="form-control" />
            </div>

            <!-- Submit button -->
            <?php
            if (!empty($login_err)) {
                echo '<div class="alert alert-danger">' . $login_err . '</div>';
            }
            ?>
            <input type="submit" name="Submit" value="Sign in" class="btn btn-primary btn-block mb-4">
            </input>

            <!-- Register buttons -->
            <div class="text-center">
                <p>New member? <a href="<?php echo ($Path . 'SignUp' . $End) ?>">Sign Up</a></p>
            </div>
        </form>
    </div>
    <footer class="navbar fixed-bottom text-center text-lg-start bg-white text-muted d-flex justify-content-center align-items-center">
        <!-- Copyright -->
        <div class="text-center p-2"> <small> © Copyright E-Rectuit Team FCAI-HU - 2024</small> </div>
    </footer>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>

</html>