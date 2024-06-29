<?php
$isAuth = true;
require_once(__DIR__ . '/../config/config.php');

$_SESSION['PendingAppl_err'] = $ApplicID = $JobAppID = '';

if (isset($_SESSION['loggedin']) && $_SESSION["role"] !== 'Employer' && $_SESSION["role"] !== 'REmployer') {
    Logout();
}



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
} else {
    echo "Oops! Something went wrong. Please try again later.";
}

//Get user data from DB
$sql = "SELECT id, username, full_name, adress, mobile, email, resume_name, facebook, instagram, twitter, linkedin, website, job_position, skills, skill_rating, certificates FROM applicants WHERE username = ?";
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
            mysqli_stmt_bind_result($stmt, $_SESSION["id"], $_SESSION["username"], $_SESSION["full_name"], $_SESSION["adress"], $_SESSION["mobile"], $_SESSION["email"], $_SESSION["resume_name"], $_SESSION["facebook"], $_SESSION["instagram"], $_SESSION["twitter"], $_SESSION["linkedin"], $_SESSION["website"], $_SESSION["job_position"], $_SESSION["skills"], $_SESSION["skill_rating"], $_SESSION["certificates"]);
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
$sql = "SELECT company, employees, jobs, location, logo, color FROM companies WHERE employees = '" . $_SESSION["username"] . "'";
if ($stmt = mysqli_prepare($conn, $sql)) {
    // Attempt to execute the prepared statement
    if (mysqli_stmt_execute($stmt)) {
        // Store result
        mysqli_stmt_store_result($stmt);

        if (mysqli_stmt_num_rows($stmt) !== 0) {
            // Bind result variables
            mysqli_stmt_bind_result($stmt, $_SESSION["company"], $_SESSION["employees"], $_SESSION["jobs"], $_SESSION["location"], $_SESSION["logo"], $_SESSION["color"]);
            if (empty($_SESSION["company"])) {
                $_SESSION["company"] = '';
            }
            if (empty($_SESSION["logo"])) {
                $logo = 'Images/Company.png';
            } else {
                $logo = 'data:image/jpeg;base64,' . base64_encode($_SESSION["logo"]);
            }
            if (mysqli_stmt_fetch($stmt)) {
            }
        } else {
            echo "<script>
                    alert('Account not assigned to any Companies');
                     window.location.href='" . $Path . "Home" . $End . "';
                </script>";
        }
    } else {
        echo "<script>
                alert('Oops! Something went wrong. Please try again later.');
                 window.location.href='" . $Path . "Home" . $End . "';
            </script>";
    }

    // Close statement
    mysqli_stmt_close($stmt);
}




//Change Company Info
if (isset($_POST["SubmitEditCompany"])) {

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
            $query = $conn->query("UPDATE companies SET logo = '" . $img_content . "' WHERE company = '" . $_SESSION['company'] . "'");


            //check if successfully inserted
            if ($query) {
                $status = "Image successfully uploaded.";
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
    $CompanyName = $_POST['nambox'];

    if (!empty($CompanyName) && $CompanyName != $_SESSION['company']) {
        $sql = "SELECT * FROM companies WHERE company = ?";
        if ($stmt = mysqli_prepare($conn, $sql)) {
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $CompanyName);

            // Attempt to execute the prepared statement
            if (mysqli_stmt_execute($stmt)) {
                /* store result */
                mysqli_stmt_store_result($stmt);
                if (mysqli_stmt_num_rows($stmt) == 1) {
                    echo ('<script>alert("This Company already Exists.")</script>');
                } else {
                    // Update applicants info table
                    $sql = "UPDATE companies SET company  = '" . $CompanyName . "' WHERE company = '" . $_SESSION['company'] . "'";
                    if (!empty($CompanyName)) {
                        if ($conn->query($sql) === TRUE) {

                            // Update applicants images table
                            $sql2 = "UPDATE jobs SET company  = '" . $CompanyName . "' WHERE company = '" . $_SESSION['company'] . "'";
                            if ($conn->query($sql2) === TRUE) {
                                $_SESSION["loggedin"] = true;
                                $_SESSION["company"] = $CompanyName;
                                $status = 'Data updated succesfully';
                                echo "<script>
												alert('$status');
												window.location.href='" . $_SERVER['PHP_SELF'] . "';
											</script>";
                            }
                        } else {
                            echo ('<script>alert("Error updating record: ' . $conn->error . '")</script>');
                        }
                    } else {
                        $status = "Can\'t save an empty input";
                        echo "<script>
									alert('$status');
									window.location.href='" . $_SERVER['PHP_SELF'] . "';
								</script>";
                    }
                }
            } else {
                echo ('<script>alert("Oops! Something went wrong. Please try again later.")</script>');
            }
        }
    } elseif (!empty($CompanyName) && $CompanyName == $_SESSION['company']) {
        $sql = "SELECT * FROM companies WHERE company = ?";
        if ($stmt = mysqli_prepare($conn, $sql)) {
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $CompanyName);

            // Attempt to execute the prepared statement
            if (mysqli_stmt_execute($stmt)) {
                /* store result */
                mysqli_stmt_store_result($stmt);
                // Update applicants info table
                $sql = "UPDATE companies SET company  = '" . $CompanyName . "' WHERE company = '" . $_SESSION['company'] . "'";
                if (!empty($CompanyName)) {
                    if ($conn->query($sql)) {
                        // Update applicants images table
                        $sql2 = "UPDATE jobs SET company  = '" . $CompanyName . "' WHERE company = '" . $_SESSION['company'] . "'";
                        if ($conn->query($sql2)) {
                            $_SESSION["loggedin"] = true;
                            $_SESSION["company"] = $CompanyName;
                            $status = 'Data updated succesfully';
                            echo "<script>
									alert('$status');
									window.location.href='" . $_SERVER['PHP_SELF'] . "';
								</script>";
                        }
                    } else {
                        echo ('<script>alert("Error updating record: ' . $conn->error . '")</script>');
                    }
                } else {
                }
            } else {
                echo ('<script>alert("Oops! Something went wrong. Please try again later.")</script>');
            }
        }
    } elseif (empty($CompanyName) && !empty($_FILES["image"]["name"])) {
        $status = "Image updated successfully";
        echo "<script>
				alert('$status');
				window.location.href='" . $_SERVER['PHP_SELF'] . "';
			</script>";
    } else {
        $status = "Can\'t save an empty input";
        echo "<script>
				alert('$status');
				window.location.href='" . $_SERVER['PHP_SELF'] . "';
			</script>";
    }
}


//Enable All Jobs
if (isset($_POST['EnableAll'])) {
    if ($_SESSION['role'] == 'REmployer') {
        echo "<script>
                    alert('Can\'t enable jobs until account approved by admins..' );
                     window.location.href='" . $_SERVER['PHP_SELF'] . "';
                </script>";
    } else {
        $sql = "UPDATE jobs SET Status = 'Enabled' WHERE company = '" . $_SESSION['company'] . "'";
        if ($conn->query($sql) === TRUE) {
            echo "<script>
                    alert('All Jobs Enabled succesfully');
                     window.location.href='" . $_SERVER['PHP_SELF'] . "';
                </script>";
        } else {
            echo "Error updating record: " . $conn->error;
        }
    }
}

//Disable All Jobs
if (isset($_POST['DisableAll'])) {
    $sql = "UPDATE jobs SET Status = 'Disabled' WHERE company = '" . $_SESSION['company'] . "'";
    if ($conn->query($sql) === TRUE) {
        echo "<script>
                    alert('All Jobs Disabled succesfully');
                     window.location.href='" . $_SERVER['PHP_SELF'] . "';
                </script>";
    } else {
        echo "Error updating record: " . $conn->error;
    }
}

//Add Job
if (isset($_POST['SubmitAddJob'])) {
    $titlebox = $_POST['titlebox'];
    $descbox = $_POST['descbox'];
    $capbox = $_POST['capbox'];
    $date = new DateTime("now", new DateTimeZone('Africa/Cairo'));

    $sql = "INSERT INTO jobs(company, job_title, job_description, capacity, applied, accepted, rejected, Status,  time_added) VALUES ('" . $_SESSION['company'] . "','" . $titlebox . "','" . $descbox . "'," . $capbox . ",0,0,0,'Disabled','" . $date->format('Y-m-d H:i:s') . "')";
    if (!empty($titlebox) && !empty($descbox) && !empty($capbox)) {
        if ($conn->query($sql) === TRUE) {
            echo "<script>
                    alert('Job added succesfully');
                    window.location.href='" . $_SERVER['PHP_SELF'] . "';
                </script>";
        } else {
            echo "Error updating record: " . $conn->error;
        }
    } else {
        echo "<script>alert('Can't save an empty input);</script>";
    }
}

//Edit Job
if (isset($_POST['SubmitEditJob'])) {
    $titlbox = $_POST['titlbox'];
    $descrbox = $_POST['descrbox'];
    $capacbox = $_POST['capacbox'];
    $id = $_POST['jobID'];
    if (!empty($titlbox) && !empty($descrbox) && !empty($capacbox)) {
        $sql = "UPDATE jobs SET job_title = '" . str_replace("'", "\'", $titlbox) . "', job_description = '" . str_replace("'", "\'", $descrbox) . "', capacity = " . $capacbox . " WHERE id=" . $id . " AND company = '" . $_SESSION['company'] . "'";
        if ($conn->query($sql) === TRUE) {
            echo "<script>
                    alert('Job updated succesfully');
                    window.location.href='" . $_SERVER['PHP_SELF'] . "';
                </script>";
        } else {
            echo "Error updating record: " . $conn->error;
        }
    } else {
        echo "<script>alert('Can't save an empty input);</script>";
    }
}

//Enable Job
if (isset($_POST['EnableJob'])) {
    if ($_SESSION['role'] == 'REmployer') {
        echo "<script>
                    alert('Can\'t enable jobs until account approved by admins..' );
                    window.location.href='" . $_SERVER['PHP_SELF'] . "';
                </script>";
    } else {
        $titlbox = $_POST['titlbox'];
        $descrbox = $_POST['descrbox'];
        $capacbox = $_POST['capacbox'];
        $id = $_POST['jobID'];
        if (!empty($titlbox) && !empty($descrbox) && !empty($capacbox)) {
            $sql = "UPDATE jobs SET job_title = '" . $titlbox . "', job_description = '" . $descrbox . "', capacity = " . $capacbox . ", Status = 'Enabled' WHERE id=" . $id . " AND company = '" . $_SESSION['company'] . "'";
            if ($conn->query($sql) === TRUE) {
                echo "<script>
                        alert('Job Enabled');
                        window.location.href='" . $_SERVER['PHP_SELF'] . "';
                    </script>";
            } else {
                echo "Error updating record: " . $conn->error;
            }
        } else {
            echo "<script>alert('Can't save an empty input);</script>";
        }
    }
}

//Disable Job
if (isset($_POST['DisableJob'])) {
    $titlbox = $_POST['titlbox'];
    $descrbox = $_POST['descrbox'];
    $capacbox = $_POST['capacbox'];
    $id = $_POST['jobID'];
    if (!empty($titlbox) && !empty($descrbox) && !empty($capacbox)) {
        $sql = "UPDATE jobs SET job_title = '" . $titlbox . "', job_description = '" . $descrbox . "', capacity = " . $capacbox . ", Status = 'Disabled' WHERE id=" . $id . " AND company = '" . $_SESSION['company'] . "'";
        if ($conn->query($sql) === TRUE) {
            echo "<script>
                    alert('Job Disabled');
                    window.location.href='" . $_SERVER['PHP_SELF'] . "';
                </script>";
        } else {
            echo "Error updating record: " . $conn->error;
        }
    } else {
        echo "<script>alert('Can't save an empty input);</script>";
    }
}


//Delete Job
if (isset($_POST['DeleteEditJob'])) {
    $id = $_POST['jobID2'];
    $sql = "DELETE FROM jobs WHERE id=" . $id . " AND company = '" . $_SESSION['company'] . "'";
    if ($conn->query($sql) === TRUE) {
        echo "<script>
                alert('Job deleted succesfully');
                window.location.href='" . $_SERVER['PHP_SELF'] . "';
            </script>";
    } else {
        echo "Error deleting record: " . $conn->error;
    }
}






if (isset($_POST['AcceptApp'])) {
    $ApplicIDacc = $_POST['ApplicIDacc'];
    $JobAppIDacc = $_POST['JobAppIDacc'];
    $sql = "UPDATE jobs SET employees = COALESCE(employees, '," . $ApplicIDacc . ",') , applicants = REPLACE(applicants, '," . $ApplicIDacc . ",', '') WHERE id=" . $JobAppIDacc;
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



if (isset($_POST['RejectApp'])) {
    $ApplicIDrej = $_POST['ApplicIDrej'];
    $JobAppIDrej = $_POST['JobAppIDrej'];
    $sql = "UPDATE jobs SET rejected_accounts = COALESCE(rejected_accounts, '," . $ApplicIDrej . ",') , applicants = REPLACE(applicants, '," . $ApplicIDrej . ",', '') WHERE id=" . $JobAppIDrej . " AND company = '" . $_SESSION['company'] . "'";
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
