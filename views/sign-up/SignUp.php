<?php
session_start();
require_once(__DIR__ . '/../../controllers/SignUp Controller.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<title>Sign Up - Step one</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<link rel="stylesheet" href="<?php echo BASE_URL; ?>assets/css/CSS/SignupStyle.css">
	<link rel="icon" href="<?php echo BASE_URL; ?>assets/images/Logo Shape.svg">

	<link rel="stylesheet" href="<?php echo BASE_URL; ?>assets/css/CSS/LoaderStyle.css">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<script src="<?php echo BASE_URL; ?>assets/js/JS/SignupJS.js"></script>
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;700;1000&display=swap" rel="stylesheet">

</head>

<body style="height: 100vh; width: 100vw;" class="row align-items-center justify-content-center m-0">


	<div class="container d-flex align-self-center justify-content-center align-items-center px-0" style="max-width: 100vw;">
		<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" id="SignupForm" method="post" class="mt-4" enctype="multipart/form-data">

			<div class="row align-items-center justify-content-center mb-md-4">
				<div class="col-12 mb-md-0 mb-4 text-center">
					<img src="<?php echo BASE_URL; ?>assets/images/Logo.svg" alt="" style="max-height: 20vh; max-width: 90vw;">
				</div>
			</div>

			<div class="row col-md-6 col-12 mx-auto">

				<!-- Full Name input -->
				<div class="form-outline mb-md-4 mb-1 col-12 col-md-6 mx-0">
					<label class="form-label" for="Full Name">Full Name</label>
					<input type="text" id="Full Name" name="FullName" placeholder="Full Name" class="form-control text-dark" oninput="validate('Full Name');" required value="<?php echo isset($_POST["FullName"]) ? $_POST["FullName"] : ''; ?>" />
				</div>

				<!-- Username input -->
				<div class="form-outline mb-md-4 mb-1 col-12 col-md-6 mx-0">
					<label class="form-label" for="Username">Username</label>
					<input type="text" id="Username" name="Username" placeholder="Username" oninput="validate('Username'); emptyvalue('UserErr');" class="form-control text-dark" required value="<?php echo isset($_POST["Username"]) ? $_POST["Username"] : ''; ?>" />
					<div class="text-danger" id="UserErr">
						<?php echo ($_SESSION["Username_err"]); ?>
					</div>
				</div>

				<!-- Email input -->
				<div class="form-outline mb-md-4 mb-1 col-12 col-md-6 mx-0">
					<label class="form-label" for="Email">Email</label>
					<input type="Email" id="Email" name="email" placeholder="Email@example.com" oninput="validate('Email'); emptyvalue('EmailErr');" class="form-control text-dark" required value="<?php echo isset($_POST["email"]) ? $_POST["email"] : ''; ?>" />
					<div class="text-danger" id="EmailErr">
						<?php echo ($_SESSION["email_err"]); ?>
					</div>
				</div>

				<!-- Mobile input -->
				<div class="form-outline mb-md-4 mb-1 col-12 col-md-6 mx-0">
					<label class="form-label" for="Mobile">Mobile Number</label>
					<input type="tel" id="Mobile" name="Mobile" pattern="[0-9]{11}" placeholder="01234567898" class="form-control text-dark" required oninvalid="this.setCustomValidity('Please match the requested format')" oninput="this.setCustomValidity('');emptyvalue('MobErr');" value="<?php echo isset($_POST["Mobile"]) ? $_POST["Mobile"] : ''; ?>" />
					<div class="text-danger" id="MobErr">
						<?php echo ($_SESSION["Mobile_err"]); ?>
					</div>
				</div>

				<!-- Password input -->
				<div class="form-outline mb-md-4 mb-1 col-12 col-md-6">
					<label class="form-label" for="Password">Password</label>
					<input type="password" id="Password" name="Password" placeholder="Password" onChange="checkMatchPass('Password', 'Confirm', 'ConfLBL');validate('Password');" autocomplete="on" class="form-control text-dark" required />
				</div>

				<!-- Password Confirm -->
				<div class="form-outline mb-md-4 mb-1 col-12 col-md-6">
					<label class="form-label" for="Confirm">Confirm Password</label>
					<input type="password" id="Confirm" name="Confirm" placeholder="Confirm Password" onChange="checkMatchPass('Password', 'Confirm', 'ConfLBL');validate('Confirm');" autocomplete="on" class="form-control text-dark" required />
					<label class="text-danger m-0" style="display: none;" id="ConfLBL"></label>
				</div>

				<!-- role -->
				<div class="form-outline mb-md-2 mb-1  col-12 d-flex justify-content-center align-content-center mt-2">
					<label class="form-label mr-3" for="Role">Role:</label>
					<div class="custom-control custom-radio custom-control-inline">
						<input type="radio" id="JobApplicant" name="role" value="Job Applicant" class="custom-control-input" onChange="viewCompanyname('CompanySection'); viewapporemp();" checked>
						<label class="custom-control-label" for="JobApplicant">Job Applicant</label>
					</div>
					<div class="custom-control custom-radio custom-control-inline">
						<input type="radio" id="Employer" name="role" value="Employer" class="custom-control-input" onChange="viewCompanyname('CompanySection'); viewapporemp();">
						<label class="custom-control-label" for="Employer">Employer</label>
					</div>
				</div>

				<!-- Submit button -->
				<div class="form-outline mb-2 mt-3 col-12 d-flex justify-content-center align-content-center">
					<button type="button" id="Check" class="btn btn-primary btn-block mb-2 col-4" onClick="checkPass('Submit', 'Password', 'Confirm', 'ConfLBL');">Next</button>
					<input type="submit" value="Submit" name="Submit" id="Submit" class="btn btn-primary btn-block mb-2 w-50" style="display: none;"></input>
				</div>

				<!-- Login buttons -->
				<div class="form-outline mb-2 col-12">
					<div class="text-center">
						<p>Already have an account? <a href="<?php echo ($Path . 'SignIn' . $End) ?>">Sign In</a></p>
					</div>
				</div>
			</div>
		</form>

	</div>

	<footer class="navbar text-center text-lg-start bg-white text-muted d-flex justify-content-center align-items-center p-0" style="height: 4vh;">
		<!-- Copyright -->
		<div class="text-center p-2">
			<small>© Copyright E-Rectuit Team FCAI-HU - 2024</small>
		</div>
	</footer>


	<!-- Disclaimer Modal -->
	<div class="modal fade" id="Disclaimer" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLongTitle">E-Recruit Disclaimer:</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body px-5 py-4 text-" style="font-size: 0.9rem;">


					E-Recruit acts as a free-of-charge job posting service only and makes no recommendations regarding potential employers or prospective employees.
					<br>
					<br>
					We are not responsible for safety, wages, working conditions, or any other aspect of employment. All hiring, scheduling, and compensation for job postings are handled directly between the employee and the employer.
					<br>
					<br>
					E-Recruit does not perform background checks on candidates applying for jobs, and we do not research the integrity of each organization or individual person who lists a job with us.
					<br>
					<br>
					Employers and employees are urged to perform due diligence when offering, applying for, or accepting employment opportunities by requesting from each other references or any additional information needed to establish qualifications and credentials so as to ensure an overall fit between employer and applicant.
				</div>
			</div>
		</div>
	</div>


	<script>
		// Example starter JavaScript for disabling form submissions if there are invalid fields
		(function() {
			'use strict';
			window.addEventListener('load', function() {
				// Fetch all the forms we want to apply custom Bootstrap validation styles to
				var forms = document.getElementsByClassName('needs-validation');
				// Loop over them and prevent submission
				var validation = Array.prototype.filter.call(forms, function(form) {
					form.addEventListener('submit', function(event) {
						if (form.checkValidity() === false) {
							event.preventDefault();
							event.stopPropagation();
						}
						form.classList.add('was-validated');
					}, false);
				});
			}, false);
		})();
	</script>


	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

	<script src="<?php echo BASE_URL; ?>assets/js/JS/core.min.js"></script>

</body>

</html>