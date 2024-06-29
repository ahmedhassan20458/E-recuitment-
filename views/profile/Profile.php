<?php

require_once(__DIR__ . '/../../controllers/Controller.php'); {
	$JobTitles = array(
		"General Manager",
		"Company Manager",
		"Deputy General Manager",
		"Resident Manager",
		"Director of Operations",
		"Assistant Manager",
		"Exec. Secretary",
		"Secretary / Department Admin Assistant",
		"Director of Rooms/ Rooms Division Manager",
		"Director of Revenue",
		"Front Office Manager",
		"Asst. F.O. Manager",
		"Duty Manager",
		"Night Manager",
		"Front Office Supervisor",
		"Business Center Supervisor",
		"Guest Relations Manager",
		"Guest Relations Supervisor",
		"Shift Leader Receptionist / Senior Receptionist",
		"Senior Receptionist",
		"Telephone Operator Supervisor",
		"Guest Relations officer",
		"Business Centre Clerk",
		"Receptionist",
		"Telephone operator",
		"Junior Receptionist",
		"Drivers Supervisor / Guest Driver ",
		"Airport representative",
		"Bell Captain",
		"Assistant Bell Captain",
		"Data Entry Clerk / passport Clerk",
		"Driver",
		"Valet Parking",
		"Bell Man",
		"Executive House Keeper",
		"Asst. Exc. of Housekeeping",
		"House Keeping Manager",
		"Asst. Housekeeping Manager ",
		"Housekeeping Senior Supervisor ",
		"Housekeeping Supervisor",
		"Senior Floor Supervisor",
		"HK Floor Supervisor",
		"Linen Room Supervisor",
		"Order Taker",
		"Florist",
		"Tailor",
		"Houseman ",
		"Mini Bar Attendant",
		"Linen Room Attendant ",
		"Valet",
		"Marble Supervisor",
		"Marble Worker",
		"Laundry  Manager",
		"Laundry Accounting Manager",
		"Laundry Chief Accountant",
		"Asst. Laundry Manager",
		"Laundry coordinator ",
		"Laundry Senior Supervisor",
		"Laundry General Casher",
		"Laundry Supervisor",
		"Laundry Technician Supervisor",
		"Laundry Technician Shift Leader",
		"Laundry Technician ",
		"Dry Cleaner",
		"Laundry Shift Leader",
		"Laundry Valet Shift Leader",
		"Washer Shift Leader",
		"Presser Shift Leader",
		"Laundry Driver Shift Leader",
		"Laundry Store Keeper",
		"Laundry Driver ",
		"Laundry Worker Shift Leader",
		"Laundry Presser ",
		"Laundry Machine Operator",
		"Laundry Washer",
		"Laundry Valet",
		"Preparing & Packing Attendant",
		"Laundry Worker/ Runner",
		"Recreation Manager",
		"Assistant Recreation Manager",
		"Health club Supervisor",
		"Spa Therapist",
		"Recreation Supervisor",
		"Masseur/ Misuse ",
		"Fitness Instructor",
		"Life Guard Supervisor",
		"Beach / Pool Supervisor",
		"Life Guard ",
		"Health Club receptionist",
		"Pool/ Beach Attendant",
		"Recreation Attendant",
		"Director of Food & Beverage",
		"Assistant Director F & B",
		"Food & Beverage Manager",
		"F&B Cost Controller",
		"Assistant F&B Cost Controller",
		"Cost Control Supervisor",
		"F&B Store Keeper",
		"F&B Cost Control Clerk",
		"F&B Cashier / Restaurant cashier",
		"Asst. Food & Beverage Mgr.",
		"Outlets Manager ( MD )",
		"Restaurant Manager",
		"Bars Manager",
		"Asst. Restaurant Manager ",
		"Assistant Bar Manager",
		"Head Waiter",
		"Head Bar Tender",
		"F&B Supervisor",
		"Assistant Head Waiter",
		"Senior Captain",
		"Bar Man",
		"Bartender",
		"Captain",
		"Butler",
		"Receiving Hostess",
		"Hostess ",
		"Assistant Barman",
		"Assistant Captain",
		"Waiter/ Waitress ",
		"Bar Waiter",
		"Shisha Man",
		"Bar Boy",
		"Bus Boy",
		"Executive Chef",
		"Chef De Cuisine",
		"Exec. Sous Chef",
		"Bakery Chef ",
		"Pastry Chef",
		"Specialty Rest. Chef ",
		"Senior Sous Chef",
		"Sous Chef",
		"Assistant Pastry Chef",
		"Assistant Bakery Chef",
		"Jnr. Sous Chef",
		"Senior Chef De Partie",
		"Chef De Partie",
		"Kitchen Artist",
		"Demi chef de Partie",
		"Commis 1 ( Bakery, Pastery,Hot Section, etc. )",
		"Commis 2 ( Bakery, Pastery,Hot Section, etc. )",
		"Commis 3 ( Bakery, Pastery,Hot Section, etc. )",
		"Kitchen Helper",
		"Chief Steward",
		"Asst. Chief Steward",
		"Senior  Supervisor Steward",
		"Stewarding Supervisor",
		"Steward Shift Leader",
		"Steward Porter",
		"Director of Finance",
		"Financial Controller ",
		"Asst. Financial Controller",
		"Materials Manager",
		"Purchasing Manager",
		"Credit Manager",
		"Chief Accountant / Accounts Manager",
		"Cost Controller ( general )",
		"Asst. Purchasing Manager",
		"Assistant Credit Manager",
		"Senior Accountant",
		"Senior Auditor",
		"Acct. Receivable Supervisor / Senior Accounts Receivable",
		"Acct. Payable Supervisor / Senior Accounts Payable",
		"Income Auditor / Internal Auditor",
		"Head Storekeeper",
		"Accounts Payable ",
		"General Cashier",
		"General Accountant",
		"Asst. Cost Controller",
		"Receivable Accountant",
		"Purchasing Supervisor",
		"Store Supervisor",
		"Cost control clerk",
		"General Store Keeper",
		"Receiving Clerk",
		"Paymaster",
		"Purchasing Coordinator",
		"Team Leader - Materials",
		"Night Auditor",
		"Bill Collector",
		"Purchasing Clerk",
		"Store Keeper",
		"Assistant Store keeper",
		"Store Porter ",
		"I.T. Manager",
		"Asst. I.T. Manager",
		"I.T Supervisor",
		"IT Coordinator",
		"Director of Human Resources",
		"Human Resources Manager",
		"Training Manager",
		"Assistant Human Resources Manager",
		"Asst. Training Manager",
		"Housing Manager",
		"HR Senior Supervisor",
		"Human Resources Coordinator",
		"HR Supervisor",
		"Training Coordinator",
		"HR Senior Supervisor",
		"Company Nurse",
		"Personnel Supervisor",
		"Housing / Cafeteria Senior Supervisor",
		"HR Specialist",
		"Housing Supervisor /Cafeteria Supervisor",
		"Timekeeper",
		"Staff Cafeteria Demi Chef",
		"Staff Housing Attendant / Cafeteria Attendant.",
		"Security Manager",
		"Asst. Security Manager",
		"Security Supervisor",
		"Security Shift Leader",
		"Security Guard",
		"Director of Engineering ",
		"Asst. Director Of Engineering",
		"Chief Engineer",
		"Asst. Chief Engineer",
		"Joiner Assistant Chief Engineer",
		"Shift Engineer ",
		"Health & Safety Manager",
		"Engineering Senior Supervisor",
		"Engineering Supervisor",
		"Engineering Shift Leader",
		"Engineering Coordinator",
		"Health & Safety  Supervisor",
		"Maintenance Senior Supervisor",
		"A/C Supervisor",
		"Electrician Supervisor",
		"Painter Supervisor",
		"Kitchen/Laundry Equipment Supervisor",
		"Health and Safety Officer",
		"Senior Carpenter",
		"Senior Plumper",
		"Senior Maintenance  A/C",
		"Kitchen/Laundry Equipment Technician",
		"Boiler Technician/ Operator",
		"Handyman / ken-fix-It",
		"Mechanic",
		"A/C Technician",
		"Carpenter",
		"Polisher",
		"Plumber",
		"Painter",
		"Electrical",
		"Welder",
		"Water Treatment Technician",
		"Planet Rooms Technician",
		"Maintenance Technician",
		"Order Taker",
		"Engineering Helper",
		"Chief Gardener",
		"Agriculture Engineer",
		"Gardener Senior Supervisor",
		"Gardener Supervisor",
		"Gardener",
		"Director of Sales & Marketing",
		"Director of Sales",
		"Business Development Manager",
		"E-commerce Director",
		"Asst. Director of Sales",
		"Sales Manager",
		"Revenue Manager ",
		"Yield Manager ",
		"Social Media Manager",
		"E-commerce Manager",
		"Public Relations Manager",
		"Reservation Manager",
		"Asst. Sales Manager",
		"Asst. Reservation Manager",
		"Reservation Supervisor",
		"Sales Executive",
		"E-commerce Coordinator",
		"Sales Coordinator",
		"Office Boy",
	);
}
//echo('
//	<object data="data:application/pdf;base64,'. base64_encode($CV) .'" type="application/pdf" style="height:200px;width:60%"></object>');
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<title>E-Recruit - Profile</title>
	<link rel="icon" href="<?php echo BASE_URL; ?>assets/images/Logo Shape.svg">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
	<link rel="stylesheet" href="<?php echo BASE_URL; ?>assets/css/CSS/ProfileStyle.css">
	<script src="<?php echo BASE_URL; ?>assets/js/JS/ProfileJS.JS"></script>
	<link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
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
		<a class="navbar-brand h-100  d-flex" href="<?php echo ($Path . "Home" . $End); ?>">
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
		<!--	<iframe  src="<?php echo ('data:application/pdf;base64,' . base64_encode($CV)); ?>" ></iframe>-->
		<!--	<embed src="CV.pdf" width="800px" height="2100px" />-->
		<div class="main-body">
			<div class="row gutters-sm">
				<div class="col-md-4 mb-3">
					<div class="card rounded-bottom">
						<div class="card-body">
							<div class="d-flex flex-column align-items-center text-center">
								<img src="<?php echo ($img); ?>" alt="Profile Picture" class="rounded-circle pp" width="150" height="150">
								<div class="mt-3">
									<h4 id="UsernameMain"><?php echo ($_SESSION["username"]); ?></h4>
									<p id="JobMain" class="text-secondary mb-1"><?php echo ($_SESSION["job_position"]); ?></p>
									<p id="AdressMain" class="text-muted font-size-sm"><?php echo ($_SESSION["adress"]); ?></p>
									<button type="button" class="btn btn-dark mt-3" onClick="Generalinfomodal('getFile', 'FileName', 'UsernameUpdate', 'JobUpdate', 'AdressUpdate');" data-toggle="modal" data-target="#exampleModalCenter"> <i class="bi bi-pen"></i> </button>
								</div>
							</div>
						</div>
					</div>
					<div class="card mt-3 rounded">
						<div class="card-body">
							<div class="row d-flex align-items-center justify-content-center mb-3">
								<h6 class="float-left col-7 m-0"><i class="material-icons text-info mr-2">Social Info</i></h6>
								<button type="button" class="btn btn-dark btn-square-sm float-right ml-auto align-middle mr-3" onClick="Socialinfomodal('Website', 'Facebook', 'Instagram', 'Twitter', 'Linkedin');" data-toggle="modal" data-target="#SocialMediaModal"> <i class="bi bi-pen"></i> </button>
								<!--							data-toggle="modal" data-target="#CertsModal"     -->
							</div>
							<div class="row" style="display: <?php echo ($web); ?>">
								<div class="col-5 ml-3">
									<h6 class="mb-0 row">
										<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-globe mr-2 icon-inline">
											<circle cx="12" cy="12" r="10"></circle>
											<line x1="2" y1="12" x2="22" y2="12"></line>
											<path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"></path>
										</svg>
										<span class="ml-1 d-flex align-items-center">Website</span>
									</h6>
								</div>
								<div class="col-6 text-secondary text-right pl-0 ml-auto">
									<span id="WebsiteMain"><small><?php echo ($_SESSION["website"]); ?></small></span>
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
									<span id="FBMain"><?php echo ($_SESSION["facebook"]); ?></span>
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
									<span id="IGMain"><?php echo ($_SESSION["instagram"]); ?></span>
								</div>
							</div>

							<hr style="display: <?php echo ($ig); ?>">

							<div class="row" style="display: <?php echo ($tw); ?>">
								<div class="col-5 ml-3">
									<h6 class="mb-0 row">
										<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-twitter mr-2 icon-inline text-info">
											<path d="M23 3a10.9 10.9 0 0 1-3.14 1.53 4.48 4.48 0 0 0-7.86 3v1A10.66 10.66 0 0 1 3 4s-4 9 5 13a11.64 11.64 0 0 1-7 2c9 5 20 0 20-11.5a4.5 4.5 0 0 0-.08-.83A7.72 7.72 0 0 0 23 3z"></path>
										</svg>
										<span class="ml-1 d-flex align-items-center">Twitter</span>
									</h6>
								</div>
								<div class="col-6 text-secondary text-right pl-0 ml-auto">
									@<span id="TWMain"><?php echo ($_SESSION["twitter"]); ?></span>
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
									<span id="LIMain"><?php echo ($_SESSION["linkedin"]); ?></span>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-8">
					<div class="card mb-3 rounded">
						<div class="card-body">
							<div class="row d-flex align-items-center justify-content-center">
								<h6 class="float-left col-7 m-0"><i class="material-icons text-info mr-2">Contact Info</i></h6>
								<button type="button" class="btn btn-dark btn-square-sm float-right ml-auto align-middle mr-3" id="EditInfo" style="color: white;" data-toggle="modal" data-target="#ContactInfoModal" onClick="Contactinfomodal('getCV', 'ResumeName', 'NameBox', 'mailbox', 'mobbox', 'adressbox');"><i class="bi bi-pen"></i></button>
								<!--							data-toggle="modal" data-target="#CertsModal"     -->
							</div>
							<div class="row">
								<div class="col-4">
									<h6 class="mb-0">Full Name</h6>
								</div>
								<div class="col-8 text-secondary">
									<span id="FName"><?php echo ($_SESSION["full_name"]); ?></span>
								</div>
							</div>
							<hr>
							<div class="row">
								<div class="col-4">
									<h6 class="mb-0">Email</h6>
								</div>
								<div class="col-8 text-secondary">
									<span id="mail"><?php echo ($_SESSION["email"]); ?></span>
								</div>
							</div>
							<hr>
							<div class="row">
								<div class="col-4">
									<h6 class="mb-0">Mobile</h6>
								</div>
								<div class="col-8 text-secondary">
									<span id="mob"><?php echo ($_SESSION["mobile"]); ?></span>
								</div>
							</div>
							<hr>
							<div class="row">
								<div class="col-4">
									<h6 class="mb-0">Address</h6>
								</div>
								<div class="col-8 text-secondary">
									<span id="adress"><?php echo ($_SESSION["adress"]); ?></span>
								</div>
							</div>
							<hr>
							<div class="row">
								<div class="col-4">
									<h6 class="mb-0">Resume</h6>
								</div>
								<div class="col-8 text-secondary">
									<span id="adress"><?php echo ($_SESSION["resume_name"]); ?></span>
								</div>
							</div>
						</div>
					</div>
					<div class="row gutters-sm">
						<div class="col-sm-6 mb-3">
							<div class="card h-100 rounded">
								<div class="card-body">
									<div class="row d-flex align-items-center justify-content-center mb-3">
										<h6 class="float-left col-7 m-0"><i class="material-icons text-info mr-2">Skills</i></h6>
										<button type="button" class="btn btn-dark btn-square-sm float-right ml-auto align-middle mr-3" style="color: white;" data-toggle="modal" data-target="#SkillsModal" onClick="ReadSkills('form');"><i class="bi bi-pen"></i></button>
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
										<h6 class="float-left col-8 m-0"><i class="material-icons text-info mr-2">Certifications</i></h6>
										<button type="button" class="btn btn-dark btn-square-sm float-right ml-auto align-middle mr-3" onClick="ReadCerts('formCert');" style="color: white;" data-toggle="modal" data-target="#CertsModal"><i class="bi bi-pen"></i></button>

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

		<!-- General Info Modal -->
		<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true" data-keyboard="false" data-backdrop="static">
			<div class="modal-dialog modal-dialog-centered" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLongTitle">Edit Info</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
					</div>
					<div class="modal-body">
						<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" class="align-items-center" enctype="multipart/form-data">
							<div class="row d-flex align-items-center justify-content-center mt-2">
								<label class="float-left col-7 m-0 imagename">New profile picture : <span id="FileName" style="text-overflow: ellipsis; "></span></label>
								<button type="button" class="btn btn-secondary float-right col-3 ml-auto align-middle h-100 mr-3" style="color: white;" onclick="document.getElementById('getFile').click();">Upload</button>
								<input type="file" accept="image/*" class="form-control-file" id="getFile" style="display:none;" name="image" onChange="Text1ToValue2('getFile', 'FileName')" title="upload new image">
							</div>

							<hr>
							<div class="row d-flex align-items-center justify-content-center mt-2">
								<label class="float-left col-md-5 m-0">Username: </label>
								<input type="text" class="form-control float-right col-md-6 ml-md-auto align-middle h-100 mr-3 ml-3" id="UsernameUpdate" name="UsernameUpdate">
							</div>

							<hr>
							<div class="row d-flex align-items-center justify-content-center mt-2">
								<label class="float-left col-md-5 m-0">Current Job: </label>
								<select id="JobUpdate" name="JobUpdate" class="form-control float-right col-md-6 ml-md-auto align-middle h-100 mr-3 ml-3" title="Job Title">
									<option value="">Job Title...</option>
									<?php
									foreach ($JobTitles as $key => $value) :
										echo '<option value="' . $value . '">' . $value . '</option>';
									endforeach;
									?>
								</select>
							</div>

							<hr>
							<div class="row d-flex align-items-center justify-content-center mt-2">
								<label class="float-left col-md-5 m-0">Adress: </label>
								<input type="text" class="form-control float-right col-md-6 ml-md-auto align-middle h-100 mr-3 ml-3" id="AdressUpdate" name="AdressUpdate">
							</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-dark mr-auto" data-dismiss="modal">Close</button>
						<input type="submit" name="SubmitGeneralInfo" onClick="checkifEmpty('UsernameUpdate', 'JobUpdate', 'AdressUpdate');" class="form-control btn btn-primary btn-sm col-3" value="Save">
						</form>
					</div>
				</div>
			</div>
		</div>

		<!-- Contact Info Modal -->
		<div class="modal fade" id="ContactInfoModal" tabindex="-1" role="dialog" aria-labelledby="ContactInfoModalTitle" aria-hidden="true" data-keyboard="false" data-backdrop="static">
			<div class="modal-dialog modal-dialog-centered" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLongTitle">Edit Contact Info</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
					</div>
					<div class="modal-body">
						<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" class="align-items-center" enctype="multipart/form-data">
							<div class="row d-flex align-items-center justify-content-center mt-2">
								<label class="float-left col-md-5 m-0">Full Name: </label>
								<input type="text" class="form-control float-right col-md-6 ml-md-auto align-middle h-100 mr-3 ml-3" id="NameBox" name="NameBox">
							</div>

							<hr>
							<div class="row d-flex align-items-center justify-content-center mt-2">
								<label class="float-left col-md-5 m-0">Email: </label>
								<input type="text" class="form-control float-right col-md-6 ml-md-auto align-middle h-100 mr-3 ml-3" id="mailbox" name="mailbox">
							</div>

							<hr>
							<div class="row d-flex align-items-center justify-content-center mt-2">
								<label class="float-left col-md-5 m-0">Mobile: </label>
								<input type="text" class="form-control float-right col-md-6 ml-md-auto align-middle h-100 mr-3 ml-3" id="mobbox" name="mobbox">
							</div>

							<hr>
							<div class="row d-flex align-items-center justify-content-center mt-2">
								<label class="float-left col-md-5 m-0">Address: </label>
								<input type="text" class="form-control float-right col-md-6 ml-md-auto align-middle h-100 mr-3 ml-3" id="adressbox" name="adressbox">
							</div>

							<hr>
							<div class="row d-flex align-items-center justify-content-center mt-2">
								<label class="float-left col-7 m-0 CVname">Resume : <span id="ResumeName" style="text-overflow: ellipsis; "></span></label>
								<button type="button" class="btn btn-secondary float-right col-3 ml-auto align-middle h-100 mr-3" style="color: white;" onclick="document.getElementById('getCV').click();">Upload</button>
								<input type="file" accept=".pdf" class="form-control-file" id="getCV" style="display:none;" name="CV" onChange="Text1ToValue2('getCV', 'ResumeName')" title="upload new CV">
							</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-dark mr-auto" data-dismiss="modal">Close</button>
						<input type="submit" name="SubmitContactInfo" onClick="" class="form-control btn btn-primary btn-sm col-3" value="Save">
						</form>
						<!--					setTimeout(function() {location.reload();}, 1000);-->
					</div>
				</div>
			</div>
		</div>

		<!-- Social Media Modal -->
		<div class="modal fade" id="SocialMediaModal" tabindex="-1" role="dialog" aria-labelledby="SocialMediaModalTitle" aria-hidden="true" data-keyboard="false" data-backdrop="static">
			<div class="modal-dialog modal-dialog-centered" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLongTitle">Edit Social Info</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
					</div>
					<div class="modal-body">
						<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" class="align-items-center" enctype="multipart/form-data">
							<div class="row d-flex align-items-center justify-content-center mt-2">
								<label class="float-left col-md-5 m-0">
									<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-globe mr-2 icon-inline">
										<circle cx="12" cy="12" r="10"></circle>
										<line x1="2" y1="12" x2="22" y2="12"></line>
										<path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"></path>
									</svg>
									Website:
								</label>
								<input type="text" class="form-control float-right col-md-6 ml-md-auto align-middle h-100 mr-3 ml-3 mt-md-0 mt-2" id="Website" name="Website">
							</div>

							<hr>
							<div class="row d-flex align-items-center justify-content-center mt-2">
								<label class="float-left col-md-5 m-0">
									<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-facebook mr-2 icon-inline text-primary">
										<path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"></path>
									</svg>
									Facebook: </label>
								<input type="text" class="form-control float-right col-md-6 ml-md-auto align-middle h-100 mr-3 ml-3 mt-md-0 mt-2" id="Facebook" name="Facebook">
							</div>

							<hr>
							<div class="row d-flex align-items-center justify-content-center mt-2">
								<label class="float-left col-md-5 m-0">
									<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-instagram mr-2 icon-inline text-danger">
										<rect x="2" y="2" width="20" height="20" rx="5" ry="5"></rect>
										<path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path>
										<line x1="17.5" y1="6.5" x2="17.51" y2="6.5"></line>
									</svg>
									Instagram: </label>
								<input type="text" class="form-control float-right col-md-6 ml-md-auto align-middle h-100 mr-3 ml-3 mt-md-0 mt-2" id="Instagram" name="Instagram">
							</div>

							<hr>
							<div class="row d-flex align-items-center justify-content-center mt-2">
								<label class="float-left col-md-5 m-0">
									<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-twitter mr-2 icon-inline text-info">
										<path d="M23 3a10.9 10.9 0 0 1-3.14 1.53 4.48 4.48 0 0 0-7.86 3v1A10.66 10.66 0 0 1 3 4s-4 9 5 13a11.64 11.64 0 0 1-7 2c9 5 20 0 20-11.5a4.5 4.5 0 0 0-.08-.83A7.72 7.72 0 0 0 23 3z"></path>
									</svg>
									Twitter: </label>
								<input type="text" class="form-control float-right col-md-6 ml-md-auto align-middle h-100 mr-3 ml-3 mt-md-0 mt-2" id="Twitter" name="Twitter">
							</div>

							<hr>
							<div class="row d-flex align-items-center justify-content-center mt-2">
								<label class="float-left col-md-5 m-0">
									<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-linkedin" viewBox="0 0 16 16">
										<path d="M0 1.146C0 .513.526 0 1.175 0h13.65C15.474 0 16 .513 16 1.146v13.708c0 .633-.526 1.146-1.175 1.146H1.175C.526 16 0 15.487 0 14.854V1.146zm4.943 12.248V6.169H2.542v7.225h2.401zm-1.2-8.212c.837 0 1.358-.554 1.358-1.248-.015-.709-.52-1.248-1.342-1.248-.822 0-1.359.54-1.359 1.248 0 .694.521 1.248 1.327 1.248h.016zm4.908 8.212V9.359c0-.216.016-.432.08-.586.173-.431.568-.878 1.232-.878.869 0 1.216.662 1.216 1.634v3.865h2.401V9.25c0-2.22-1.184-3.252-2.764-3.252-1.274 0-1.845.7-2.165 1.193v.025h-.016a5.54 5.54 0 0 1 .016-.025V6.169h-2.4c.03.678 0 7.225 0 7.225h2.4z" />
									</svg>
									Linkedin: </label>
								<input type="text" class="form-control float-right col-md-6 ml-md-auto align-middle h-100 mr-3 ml-3 mt-md-0 mt-2" id="Linkedin" name="Linkedin">
							</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-dark mr-auto" data-dismiss="modal">Close</button>
						<input type="submit" name="SubmitSocialInfo" onClick="setTimeout(function() {location.reload();}, 1000);" class="form-control btn btn-primary btn-sm col-3" value="Save">

						<!--					checkifEmpty('Website', 'Facebook', 'Instagram', 'Twitter', 'Linkedin');-->
						</form>
					</div>
				</div>
			</div>
		</div>

		<!-- Edit Skills Modal -->
		<div class="modal fade" id="SkillsModal" tabindex="-1" role="dialog" aria-labelledby="SkillsModalTitle" aria-hidden="true" data-keyboard="false" data-backdrop="static">
			<div class="modal-dialog modal-dialog-centered" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLongTitle">Edit Skills</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close" onClick="setTimeout(function() {ReadSkills('form');}, 500);">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" id="form">
						</form>
						<div class="d-flex align-items-center justify-content-center w-100">
							<button type="button" class="btn btn-outline-success btn-square-sm" onClick="AddSkill('form');">&plus;</button>
						</div>
					</div>
					<div class="modal-footer">
						<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" class="w-100" method="post">
							<div class="row d-flex align-items-center justify-content-center mx-2">
								<button type="button" class="btn btn-dark mr-auto" data-dismiss="modal" onClick="setTimeout(function() {ReadSkills('form');}, 500);">Close</button>
								<input type="submit" name="SubmitSkills" class="form-control btn btn-primary btn-sm col-3 col-md-2 ml-auto" onClick="GetNewSkills(); setTimeout(function() {location.reload();}, 1000);" value="Save">
								<input type="text" id="SkillsBox" style="display: none;" name="AllSkills">
								<input type="text" id="RatingBox" style="display: none;" name="AllRatings">
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>

		<!-- Edit Certificates Modal -->
		<div class="modal fade" id="CertsModal" tabindex="-1" role="dialog" aria-labelledby="CertsModalTitle" aria-hidden="true" data-keyboard="false" data-backdrop="static">
			<div class="modal-dialog modal-dialog-centered" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLongTitle">Edit Certifications</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close" onClick="setTimeout(function() {ReadCerts('form');}, 500); setTimeout(function() {Certsadded = 0;}, 550);">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" id="formCert">
						</form>
						<div class="d-flex align-items-center justify-content-center w-100">
							<button type="button" class="btn btn-outline-success btn-square-sm" onClick="AddCert('formCert');">&plus;</button>
						</div>
					</div>
					<div class="modal-footer">
						<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" class="w-100" method="post">
							<div class="row d-flex align-items-center justify-content-center mx-2">
								<button type="button" class="btn btn-dark mr-auto" data-dismiss="modal" onClick="setTimeout(function() {ReadCerts('form');}, 500); setTimeout(function() {Certsadded = 0;}, 550);">Close</button>
								<input type="submit" name="SubmitCerts" class="form-control btn btn-primary btn-sm col-3 col-md-2 ml-auto" onClick="GetNewCerts(); " value="Save">
								<!--					 setTimeout(function() {location.reload();}, 1000); -->
								<input type="text" id="CertsBox" style="display: none;" name="AllCerts">
							</div>
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