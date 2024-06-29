<?php
$isAuth = false;
require_once(__DIR__ . '/../config/config.php');

session_start();

if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
	$Logout = 'none';
	$Dropdown = 'none';
	$Login = 'inline-block';
	$Profile = 'none';
} else {
	$Logout = 'block';
	$Dropdown = 'flex';
	$Login = 'none';
	$Profile = 'block';

	if ($_SESSION["role"] == 'MOTAAdmin') {
		$Comp = 'Admin/MOTAAdmin';
	} elseif ($_SESSION["role"] == 'Employer') {
		$Comp = 'Company';
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
	}


	//Get data from DB
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

		// Close statement
		mysqli_stmt_close($stmt);
	}
	//Set Certifications, Skills & Rating Variables
	$Skillsss = explode(",,", $_SESSION["skills"]);
	$skill_ratings = explode(",", $_SESSION["skill_rating"]);
	$certificates = explode(",,", $_SESSION["certificates"]);

	if ($_SESSION['role'] !== 'Employer' || $_SESSION['role'] !== 'MOTAAdmin') {
		$emp = 'none';
		$app = 'block';
	} else {
		$emp = 'block';
		$app = 'none';
	}
}