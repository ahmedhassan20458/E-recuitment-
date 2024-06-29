<?php
$isAuth = false;
require_once(__DIR__ . '/../config/config.php');

session_start();

$_SESSION['apply'] = $_SESSION['lgo'] = $_SESSION['company'] = '';

if (isset($_GET['id'])) {
	$_SESSION['JobID'] = $_GET['id'];
}
if ($_GET['id'] == null) {
	header("location: " . $Path . "Jobs" . $End);
}


//Get user data
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
	$_SESSION['userid'] = '';
	$_SESSION['apply'] = 'disabled';
	$Logout = 'none';
	$Dropdown = 'none';
	$Login = 'inline-block';
	$Profile = 'none';
} else {
	if ($_SESSION["role"] == 'MOTAAdmin' || $_SESSION["role"] == 'Employer') {
		header("location: " . $Path . "Home" . $End);
	}
	$Logout = 'block';
	$Dropdown = 'flex';
	$Login = 'none';
	$Profile = 'block';

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
	$sql = "SELECT id, username FROM applicants WHERE username = ?";
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
				mysqli_stmt_bind_result($stmt, $_SESSION["userid"], $_SESSION["username"]);
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
}


//Get Job from DB
$sql = "SELECT company, department, job_title, job_description, capacity, applied, accepted, rejected, applicants, Status, time_added FROM jobs WHERE id = " . $_SESSION['JobID'];
//echo($sql);
if ($stmt = mysqli_query($conn, $sql)) {
	$Color = 'text-dark';
	if ($stmt) {
		while (!empty($row = mysqli_fetch_assoc($stmt))) {
			$_SESSION['company'] = $row["company"];
			$_SESSION['department'] = $row["department"];
			$_SESSION['job_title'] = $row["job_title"];
			$_SESSION['job_description'] = $row["job_description"];
			$_SESSION['capacity'] = $row["capacity"];
			$_SESSION['applied'] = $row["applied"];
			$_SESSION['accepted'] = $row["accepted"];
			$_SESSION['applicants'] = $row["applicants"];
			$_SESSION['Status'] = $row["Status"];

			$date_time = $row["time_added"];
			$_SESSION['time_added'] = date("d-m-Y", strtotime($date_time));

			$sql2 = "SELECT logo, color, location FROM companies WHERE company = '" . $row["company"] . "'";

			if ($stmt2 = mysqli_query($conn, $sql2)) {
				// Attempt to execute the prepared statement
				while ($row2 = mysqli_fetch_assoc($stmt2)) {

					$_SESSION['logo'] = $row2["logo"];
					$_SESSION['color'] = $row2["color"];
					$_SESSION['location'] = $row2["location"];

					$Occupied = 0;
					$Occupied += round((($row["accepted"] / $row["capacity"]) * 100), 1);
					if ($Occupied <= 50) {
						$Color = 'success';
					} elseif ($Occupied > 50 && $Occupied <= 70) {
						$Color = 'warning';
					} elseif ($Occupied > 70) {
						$Color = 'danger';
					}

					if (empty($_SESSION['logo'])) {
						$_SESSION['lgo'] = 'Images/Company.png';
					} else {
						$_SESSION['lgo'] = 'data:image/jpeg;base64,' . base64_encode($_SESSION['logo']);
					}
				}
			}
		}
	}
} else {
	header("location: " . $Path . "Jobs" . $End);
}





$sql = "SELECT applicants FROM jobs WHERE id=" . $_SESSION['JobID'];
if ($stmt = mysqli_prepare($conn, $sql)) {

	// Attempt to execute the prepared statement
	if (mysqli_stmt_execute($stmt)) {
		// Store result
		mysqli_stmt_store_result($stmt);

		if (mysqli_stmt_num_rows($stmt) == 1) {
			// Bind result variables
			mysqli_stmt_bind_result($stmt, $_SESSION["ApplicantsIDs"]);
			if (mysqli_stmt_fetch($stmt)) {
			}
			if (str_contains($_SESSION["ApplicantsIDs"], "," . $_SESSION['userid'] . ",")) {
				$_SESSION['apply'] = 'disabled';
			} else {
				$_SESSION['apply'] = '';
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

//Apply for a Job
if (isset($_POST['Apply'])) {
	if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
		echo "<script>
					alert('Please sign in first..');
				</script>";
	} else {
		if ($_SESSION['apply'] == 'disabled') {
			echo "<script>
					alert('You\'ve already applied for this job..');
				</script>";
		} else {
			if (!is_null($_SESSION['JobID'])) {
				$sql = "UPDATE jobs SET applicants = '" . $_SESSION['applicants'] . "," . $_SESSION['userid'] . ",' WHERE id=" . $_SESSION['JobID'] . " AND company = '" . $_SESSION['company'] . "'";
				if ($conn->query($sql) === TRUE) {
					echo "<script>
								alert('Applied succesfully');
								window.location.href='" . $_SERVER['PHP_SELF'] . "';
							</script>";
					$_SESSION['apply'] = 'disabled';
				} else {
					echo "Error updating record: " . $conn->error;
				}
			}
		}
	}
}
