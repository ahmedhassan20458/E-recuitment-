<?php

session_start();
$isAuth = true;
require_once(__DIR__ . '/../config/config.php');

// Get image data from database 
$sql = "SELECT image FROM accounts_images WHERE username = '" . $_SESSION['username'] . "'";
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

// Get CV data from database 
$sql = "SELECT resume FROM applicants WHERE username = '" . $_SESSION['username'] . "'";
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

//Get account from DB
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

    if ($_SESSION['role'] == 'Job Applicant') {
        $emp = 'none';
        $app = 'block';
    } elseif ($_SESSION['role'] == 'RApplicant') {
        $emp = 'none';
        $app = 'block';
    } else {
        $emp = 'block';
        $app = 'none';
    }
    // Close statement
    mysqli_stmt_close($stmt);
}


//Get user data from DB
$sql = "SELECT username, full_name, adress, mobile, email, resume_name, facebook, instagram, twitter, linkedin, website, job_position, skills, skill_rating, certificates FROM applicants WHERE username = ?";
if ($stmt = mysqli_prepare($conn, $sql)) {
    // Bind variables to the prepared statement as parameters
    mysqli_stmt_bind_param($stmt, "s", $param_username);

    // Set parameters
    $param_username = $_SESSION["username"];

    // Attempt to execute the prepared statement
    if (mysqli_stmt_execute($stmt)) {
        // Store result
        mysqli_stmt_store_result($stmt);

        if (mysqli_stmt_num_rows($stmt) == 1) {
            // Bind result variables
            mysqli_stmt_bind_result($stmt, $_SESSION["username"], $_SESSION["full_name"], $_SESSION["adress"], $_SESSION["mobile"], $_SESSION["email"], $_SESSION["resume_name"], $_SESSION["facebook"], $_SESSION["instagram"], $_SESSION["twitter"], $_SESSION["linkedin"], $_SESSION["website"], $_SESSION["job_position"], $_SESSION["skills"], $_SESSION["skill_rating"], $_SESSION["certificates"]);
            if (mysqli_stmt_fetch($stmt)) {
            }
        } else {
            echo "Oops! Something went wrong. Please try again later.";
        }
    } else {
        echo "Oops! Something went wrong. Please try again later.";
    }
    if (empty($_SESSION['website'])) {
        $web = 'none';
    } else {
        $web = 'flex';
    }
    if (empty($_SESSION['facebook'])) {
        $fb = 'none';
    } else {
        $fb = 'flex';
    }
    if (empty($_SESSION['instagram'])) {
        $ig = 'none';
    } else {
        $ig = 'flex';
    }
    if (empty($_SESSION['twitter'])) {
        $tw = 'none';
    } else {
        $tw = 'flex';
    }
    if (empty($_SESSION['linkedin'])) {
        $li = 'none';
    } else {
        $li = 'flex';
    }

    // Close statement
    mysqli_stmt_close($stmt);
}
//Set Certifications, Skills & Rating Variables
$Skillsss = explode(",,", $_SESSION["skills"]);
$skill_ratings = explode(",", $_SESSION["skill_rating"]);
$certificates = explode(",,", $_SESSION["certificates"]);



if ($_SESSION["role"] == 'MOTAAdmin') {
    $Comp = 'Admin/MOTAAdmin';
    $emp = 'block';
    Logout();
} elseif ($_SESSION["role"] == 'Employer') {
    $Comp = 'Company';
    $emp = 'block';
    Logout();
} else {
    $emp = 'none';
}




//Change General Info
if (isset($_POST["SubmitGeneralInfo"])) {

    $error = false;
    $status = "";

    // 1) Profile Pic 
    //check if file is not empty
    if (!empty($_FILES["image"]["name"])) {

        //file info 
        $file_name = basename($_FILES["image"]["name"]);
        $file_type = pathinfo($file_name, PATHINFO_EXTENSION);

        //make an array of allowed file extension
        $allowed_file_types = array('jpg', 'jpeg', 'png', 'gif');


        //check if upload file is an image
        if (in_array($file_type, $allowed_file_types)) {

            $tmp_image = $_FILES['image']['tmp_name'];
            $img_content = addslashes(file_get_contents($tmp_image));

            //Now run insert query
            $query = $conn->query("UPDATE accounts_images SET image = '" . $img_content . "' WHERE username = '" . $_SESSION['username'] . "'");


            //check if successfully inserted
            if ($query) {
                $status = "Image has been successfully uploaded.";
            } else {
                $error = true;
                $status = "Something went wrong when uploading image!!!";
            }
        } else {
            $error = true;
            $status = 'Only jpg, jpeg, png, gif format supported';
        }
    }


    // 2) General Info
    $UsernameUpdate = $_POST['UsernameUpdate'];
    $JobUpdate = $_POST['JobUpdate'];
    $AdressUpdate = $_POST['AdressUpdate'];

    if ($UsernameUpdate != $_SESSION['username']) {
        $sql = "SELECT * FROM accounts WHERE username = ?";
        if ($stmt = mysqli_prepare($conn, $sql)) {
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $UsernameUpdate);

            // Attempt to execute the prepared statement
            if (mysqli_stmt_execute($stmt)) {
                /* store result */
                mysqli_stmt_store_result($stmt);
                if (mysqli_stmt_num_rows($stmt) == 1) {
                    echo ('<script>alert("This Username is already taken.")</script>');
                } else {
                    // Update applicants info table
                    $sql = "UPDATE applicants SET username  = '" . $UsernameUpdate . "', adress = '" . $AdressUpdate . "', job_position = '" . $JobUpdate . "' WHERE username = '" . $_SESSION['username'] . "'";
                    if (!empty($UsernameUpdate) && !empty($AdressUpdate) && !empty($JobUpdate)) {
                        if ($conn->query($sql) === TRUE) {

                            // Update applicants images table
                            $sql2 = "UPDATE accounts_images SET username  = '" . $UsernameUpdate . "' WHERE username = '" . $_SESSION['username'] . "'";
                            if ($conn->query($sql2) === TRUE) {
                                $sql3 = "UPDATE accounts SET username  = '" . $UsernameUpdate . "' WHERE username = '" . $_SESSION['username'] . "'";
                                if ($conn->query($sql3) === TRUE) {
                                    $_SESSION["loggedin"] = true;
                                    $_SESSION["username"] = $UsernameUpdate;
                                    $_SESSION["job_position"] = $JobUpdate;
                                    $_SESSION["adress"] = $AdressUpdate;
                                    echo "<script>
													alert('Data updated succesfully');
													 window.location.href='" . $_SERVER['PHP_SELF'] . "';
												</script>";
                                }
                            }
                        } else {
                            echo ('<script>alert("Error updating record: ' . $conn->error . '")</script>');
                        }
                    } else {
                        echo "<script>
										alert('Can\'t save an empty input');
										 window.location.href='" . $_SERVER['PHP_SELF'] . "';
									</script>";
                    }
                }
            } else {
                echo ('<script>alert("Oops! Something went wrong. Please try again later.")</script>');
            }
        }
    } else {
        $sql = "SELECT * FROM accounts WHERE username = ?";
        if ($stmt = mysqli_prepare($conn, $sql)) {
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $UsernameUpdate);

            // Attempt to execute the prepared statement
            if (mysqli_stmt_execute($stmt)) {
                /* store result */
                mysqli_stmt_store_result($stmt);
                // Update applicants info table
                $sql = "UPDATE applicants SET username  = '" . $UsernameUpdate . "', adress = '" . $AdressUpdate . "', job_position = '" . $JobUpdate . "' WHERE username = '" . $_SESSION['username'] . "'";
                if (!empty($UsernameUpdate) && !empty($AdressUpdate) && !empty($JobUpdate)) {
                    if ($conn->query($sql)) {
                        // Update applicants images table
                        $sql2 = "UPDATE accounts_images SET username  = '" . $UsernameUpdate . "' WHERE username = '" . $_SESSION['username'] . "'";
                        if ($conn->query($sql2)) {
                            $sql3 = "UPDATE accounts SET username  = '" . $UsernameUpdate . "' WHERE username = '" . $_SESSION['username'] . "'";
                            if ($conn->query($sql3)) {
                                $_SESSION["loggedin"] = true;
                                $_SESSION["username"] = $UsernameUpdate;
                                $_SESSION["job_position"] = $JobUpdate;
                                $_SESSION["adress"] = $AdressUpdate;
                                echo "<script>
									alert('Data updated succesfully');
									 window.location.href='" . $_SERVER['PHP_SELF'] . "';
								</script>";
                            }
                        }
                    } else {
                        echo ('<script>alert("Error updating record: ' . $conn->error . '")</script>');
                    }
                } else {
                    echo "<script>
                            alert('Can\'t save an empty input');
                             window.location.href='" . $_SERVER['PHP_SELF'] . "';
                        </script>";
                }
            } else {
                echo ('<script>alert("Oops! Something went wrong. Please try again later.")</script>');
            }
        }
    }
    // Close statement
    mysqli_stmt_close($stmt);
}


//Contact Info Edit
if (isset($_POST['SubmitContactInfo'])) {
    $Fname = $_POST['NameBox'];
    $mailbox = $_POST['mailbox'];
    $mobbox = $_POST['mobbox'];
    $adressbox = $_POST['adressbox'];

    // 1) CV
    //check if file is not empty
    if (!empty($_FILES["CV"]["name"])) {
        $filePointer = fopen($_FILES['CV']['tmp_name'], 'r');
        $fileData = fread($filePointer, filesize($_FILES['CV']['tmp_name']));
        $fileData = addslashes($fileData);

        //file info 
        $file_name = basename($_FILES["CV"]["name"]);
        $file_type = pathinfo($file_name, PATHINFO_EXTENSION);

        //make an array of allowed file extension
        $allowed_file_types = array('pdf');


        //check if upload file is a CV
        if (in_array($file_type, $allowed_file_types)) {

            $tmp_CV = $_FILES['CV']['tmp_name'];
            $CV_content = addslashes(file_get_contents($tmp_CV));

            //Now run insert query
            $query = $conn->query("UPDATE applicants SET resume = '" . $fileData . "', resume_name = '" . $fileName . "' WHERE username = '" . $_SESSION['username'] . "'");


            //check if successfully inserted
            if ($query) {
                $status = "Resume has been successfully uploaded.";
                echo "<script>
						alert('Data updated succesfully');
						 window.location.href='" . $_SERVER['PHP_SELF'] . "';
					</script>";
            } else {
                $error = true;
                $status = "Something went wrong when uploading resume!!!";
            }
        } else {
            $error = true;
            $status = 'Only PDF format supported';
        }
    }




    $sql = "UPDATE applicants SET full_name = '" . $Fname . "', adress = '" . $adressbox . "', mobile = '" . $mobbox . "', email = '" . $mailbox . "' WHERE username = '" . $_SESSION['username'] . "'";
    if (isset($Fname) && isset($mailbox) && isset($mobbox) && isset($adressbox)) {
        if ($conn->query($sql) === TRUE) {
            echo "<script>
                    alert('Data updated succesfully');
                     window.location.href='" . $_SERVER['PHP_SELF'] . "';
                </script>";
        } else {
            echo "Error updating record: " . $conn->error;
        }
    } else {
        //        echo "<script>alert('Can't save an empty input);</script>";
    }
}

//Social Info Edit
if (isset($_POST['SubmitSocialInfo'])) {
    $Website = $_POST['Website'];
    $Facebook = $_POST['Facebook'];
    $Instagram = $_POST['Instagram'];
    $Twitter = $_POST['Twitter'];
    $Linkedin = $_POST['Linkedin'];

    $sql = "UPDATE applicants SET facebook = '" . $Facebook . "', instagram = '" . $Instagram . "', twitter = '" . $Twitter . "', linkedin = '" . $Linkedin . "', website = '" . $Website . "' WHERE username = '" . $_SESSION['username'] . "'";
    if ($conn->query($sql) === TRUE) {
        echo "<script>
                alert('Data updated succesfully');
                 window.location.href='" . $_SERVER['PHP_SELF'] . "';
            </script>";
    } else {
        echo "Error updating record: " . $conn->error;
    }
}


//Edit Skills
if (isset($_POST['SubmitSkills'])) {
    $NewSkills = str_replace(array('[', ']', '"'), '', (json_decode($_POST['AllSkills'])));
    $NewRatings = str_replace(array('[', ']', '"'), '', (json_decode($_POST['AllRatings'])));
    $sql = "UPDATE applicants SET skills  = '" . implode(",,", $NewSkills) . "', skill_rating = '" . $NewRatings . "' WHERE username = '" . $_SESSION['username'] . "'";
    if ($conn->query($sql) === TRUE) {
        echo "<script>
			alert('Data updated succesfully');
			 window.location.href='" . $_SERVER['PHP_SELF'] . "';
		</script>";
    } else {
        echo "Error updating record: " . $conn->error;
    }
}


//Edit Certificates
if (isset($_POST['SubmitCerts'])) {
    $NewCerts = $_POST['AllCerts'];
    $sql = "UPDATE applicants SET certificates  = '" . $NewCerts . "' WHERE username = '" . $_SESSION['username'] . "'";
    if ($conn->query($sql) === TRUE) {
        echo "<script>
					alert('Data updated succesfully');
					 window.location.href='" . $_SERVER['PHP_SELF'] . "';
				</script>";
    } else {
        echo "Error updating record: " . $conn->error;
    }
}
