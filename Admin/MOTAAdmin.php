<?php
session_start();
require_once('AdminController.php');

$m = 0;
$Printed = "";
$in = 0;
$col = 0;
$per = 0;
$details = "";
$colu = "";
$piedata = "";
$DepBarData = "";
$echo = ""; {
	$Departments = array(
		"A&G",
		"Front Office",
		"Housekeeping",
		"Laundry",
		"Recreation",
		"F&B - Admin. & Related",
		"F&B - Service",
		"F&B - Kitchen",
		"F&B - Steward",
		"Finance",
		"I.T",
		"Human Resources",
		"Security",
		"Maintenance",
		"Agriculture",
		"Sales & Marketing"
	);
} {
	$AG = array(
		"General Manager",
		"Company Manager",
		"Deputy General Manager",
		"Resident Manager",
		"Director of Operations",
		"Assistant Manager",
		"Exec. Secretary",
		"Secretary / Department Admin Assistant"
	);
} {
	$FrontOffice = array(
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
		"Bell Man"
	);
} {
	$Housekeeping = array(
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
		"Marble Worker"
	);
} {
	$Laundry = array(
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
		"Laundry Worker/ Runner"
	);
} {
	$Recreation = array(
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
		"Recreation Attendant"
	);
} {
	$AdminRelated = array(
		"Director of Food & Beverage",
		"Assistant Director F & B",
		"Food & Beverage Manager",
		"F&B Cost Controller",
		"Assistant F&B Cost Controller",
		"Cost Control Supervisor",
		"F&B Store Keeper",
		"F&B Cost Control Clerk",
		"F&B Cashier / Restaurant cashier"
	);
} {
	$FBService = array(
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
		"Bus Boy"
	);
} {
	$Kitchen = array(
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
		"Kitchen Helper"
	);
} {
	$FBSteward = array(
		"Chief Steward",
		"Asst. Chief Steward",
		"Senior  Supervisor Steward",
		"Stewarding Supervisor",
		"Steward Shift Leader",
		"Steward Porter"
	);
} {
	$Finance = array(
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
		"Store Porter "
	);
} {
	$ITMan = array(
		"I.T. Manager",
		"Asst. I.T. Manager",
		"I.T Supervisor",
		"IT Coordinator"
	);
} {
	$HR = array(
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
		"Staff Housing Attendant / Cafeteria Attendant."
	);
} {
	$Security = array(
		"Security Manager",
		"Asst. Security Manager",
		"Security Supervisor",
		"Security Shift Leader",
		"Security Guard"
	);
} {
	$Maintenance = array(
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
		"Engineering Helper"
	);
} {
	$Agriculture = array(
		"Chief Gardener",
		"Agriculture Engineer",
		"Gardener Senior Supervisor",
		"Gardener Supervisor",
		"Gardener"
	);
} {
	$Marketing = array(
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
		"Office Boy"
	);
}

//Count Departments for graph
$Deps = array();
$i = 0;
foreach ($Departments as $key => $value) : $sql = "SELECT COUNT(department) AS Dep from jobs WHERE department = '" . $value . "'";
	if ($depstmt = mysqli_query($conn, $sql)) {

		if (mysqli_num_rows($depstmt) > 0) {

			while ($data = mysqli_fetch_assoc($depstmt)) {
				$Deps[$i] = $data['Dep'];

				$i++;
			}
		}
	}
endforeach;
arsort($Deps, 0);

//Print Departments
foreach ($Deps as $key => $value) {
	if ($m >= 0) {
		if ($value == 0) {
			continue;
		} else {
			$DepBarData .= "['$Departments[$key]', $value],";
		}
	}
}


?>


<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="icon" href="../Images/logoMOT.png">
	<title>Admin - Dashboard</title>

	<!-- Custom fonts for this template-->
	<script src="https://kit.fontawesome.com/475cbef551.js" crossorigin="anonymous"></script>
	<link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">

	<!-- Custom styles for this template-->
	<link href="<?php echo BASE_URL; ?>assets/css/CSS/sb-admin-2.min.css" rel="stylesheet">
	<script src="<?php echo BASE_URL; ?>assets/js/JS/jquery-3.6.0.min.js"></script>
	<script src="<?php echo BASE_URL; ?>assets/js/JS/AdminJS.js"></script>

	<link rel="stylesheet" type="text/css" href="<?php echo BASE_URL; ?>assets/lib/DataTables/DataTables-1.12.1/css/jquery.dataTables.min.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo BASE_URL; ?>assets/lib/DataTables/Buttons-2.2.3/css/buttons.dataTables.min.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo BASE_URL; ?>assets/lib/DataTables/FixedHeader-3.2.4/css/fixedHeader.dataTables.min.css" />

	<script type="text/javascript" src="<?php echo BASE_URL; ?>assets/lib/DataTables/DataTables-1.12.1/js/jquery.dataTables.min.js"></script>
	<script type="text/javascript" src="<?php echo BASE_URL; ?>assets/lib/DataTables/Buttons-2.2.3/js/dataTables.buttons.min.js"></script>
	<script type="text/javascript" src="<?php echo BASE_URL; ?>assets/lib/DataTables/FixedHeader-3.2.4/js/dataTables.fixedHeader.min.js"></script>

	<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

	<style>
		.ellipsis {
			overflow: hidden;
			text-overflow: ellipsis;
			display: -webkit-box;
			-webkit-line-clamp: 3;
			/* number of lines to show */
			line-clamp: 3;
			-webkit-box-orient: vertical;
		}
	</style>
</head>

<body id="page-top" onLoad="table('JobsTable');table('ApplTable')">

	<!-- Page Wrapper -->
	<div id="wrapper">
		<!-- Content Wrapper -->
		<div id="content-wrapper" class="d-flex flex-column">

			<!-- Main Content -->
			<div id="content">

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

				<!-- Begin Page Content -->
				<div class="container-fluid">

					<!-- Page Heading -->
					<div class="d-sm-flex align-items-center justify-content-between mb-4">
						<h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
						<!--
					<a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
						<i class="fas fa-download fa-sm text-white-50"></i> Generate Report
					</a> 
-->
					</div>

					<!-- Content Row -->
					<div class="row">
						<?php
						//Get Jobs from DB
						$sql = "SELECT id, job_title, job_description, capacity, applied, accepted, rejected, Status, time_added FROM jobs";
						if ($stmt = mysqli_query($conn, $sql)) {
							$Pending = 0;
							$Accsum = 0;
							$Capsum = 0;
							$Occupied = 0;
							if ($stmt) {
								while ($row = mysqli_fetch_assoc($stmt)) {
									$Pending += $row["applied"] - ($row["accepted"] + $row["rejected"]);
									$Accsum += $row["accepted"];
									$Capsum += $row["capacity"];
								}
								if (mysqli_num_rows($stmt)) {
									$Occupied += round((($Accsum / $Capsum) * 100), 1);
								}
							}
						}
						?>

						<!-- Number of applicants on the system -->
						<div class="col-xl-3 col-md-6 mb-4">
							<div class="card border-left-primary shadow-sm h-100 py-2">
								<div class="card-body">
									<div class="row no-gutters align-items-center">
										<div class="col mr-2">
											<div class="text-xs font-weight-bold text-primary text-uppercase mb-1"> Total Applicants</div>
											<div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo ($_SESSION['NOfApplicants']); ?></div>
										</div>
										<div class="col-auto"> <i class="fas fa-users fa-2x text-gray-300"></i> </div>
									</div>
								</div>
							</div>
						</div>

						<!-- Number of Employers on the system -->
						<div class="col-xl-3 col-md-6 mb-4">
							<div class="card border-left-success shadow-sm h-100 py-2">
								<div class="card-body">
									<div class="row no-gutters align-items-center">
										<div class="col mr-2">
											<div class="text-xs font-weight-bold text-success text-uppercase mb-1">Total Employers</div>
											<div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo ($_SESSION['NOfEmployer']); ?></div>
										</div>
										<div class="col-auto"> <i class="fas fa-user-tie fa-2x text-gray-300"></i> </div>
									</div>
								</div>
							</div>
						</div>

						<!-- Occupied Jobs Card -->
						<div class="col-xl-3 col-md-6 mb-4">
							<div class="card border-left-info shadow-sm h-100 py-2">
								<div class="card-body">
									<div class="row no-gutters align-items-center">
										<div class="col mr-2">
											<div class="text-xs font-weight-bold text-info text-uppercase mb-1">Occupied Jobs </div>
											<div class="row no-gutters align-items-center">
												<div class="col-auto">
													<div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?php echo ($Occupied); ?>%</div>
												</div>
												<div class="col">
													<div class="progress progress-sm mr-2">
														<div class="progress-bar bg-info" role="progressbar" title="Occupied Jobs" style="width: <?php echo ($Occupied); ?>%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
													</div>
												</div>
											</div>
										</div>
										<div class="col-auto"> <i class="fas fa-briefcase fa-2x text-gray-300"></i> </div>
									</div>
								</div>
							</div>
						</div>

						<!-- Pending Job Applications Card -->
						<div class="col-xl-3 col-md-6 mb-4">
							<div class="card border-left-warning shadow-sm h-100 py-2">
								<div class="card-body">
									<div class="row no-gutters align-items-center">
										<div class="col mr-2">
											<div class="text-xs font-weight-bold text-warning text-uppercase mb-1"> Pending Job Applications</div>
											<div class="h5 mb-0 font-weight-bold text-gray-800"> <?php echo ($Pending); ?> </div>
										</div>
										<div class="col-auto"> <i class="fas fa-clipboard-list fa-2x text-gray-300"></i> </div>
									</div>
								</div>
							</div>
						</div>
					</div>

					<!-- Content Row -->

					<div class="row">

						<!-- Jobs per department Chart -->
						<div class="card shadow mb-4 w-100 col-12">
							<div class="card-header py-3">
								<h6 class="m-0 font-weight-bold text-primary">Jobs per department</h6>
							</div>
							<div class="card-body">
								<div id="DepChart" class="Outputs"></div>
							</div>
						</div>

						<!-- Most Occupied Jobs Chart -->
						<!--
                    <div class="card shadow mb-4 w-100 col-12">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Most Occupied Jobs <small>(Chart)</small></h6>
                        </div>
                        <div class="card-body">
                            <div id="" class="Outputs"></div>
                        </div>
                    </div>
-->

					</div>

					<!-- Pending Accs -->
					<div class="card shadow-sm mb-4">
						<div class="card-header py-3">
							<div class="row d-flex align-items-center">
								<h5 class="m-0 ml-2 font-weight-bold text-primary">Pending Accounts</h5>
								<!--
							<button type="button" class="btn btn-danger btn-square-sm float-right ml-auto align-middle mr-1" data-toggle="modal" data-target="#DisableAllModal"> 
								<i class="fa-solid fa-x"></i>
							</button>
							<button type="button" class="btn btn-success btn-square-sm float-right ml-1 align-middle mr-1" data-toggle="modal" data-target="#EnableAllModal"> 
								<i class="fa-solid fa-check"></i> 
							</button>
							<button type="button" class="btn btn-primary btn-square-sm float-right ml-1 align-middle mr-1" data-toggle="modal" data-target="#AddJobModal"> 
								<i class="fa-solid fa-plus"></i>
							</button>
-->
							</div>
						</div>
						<div class="card-body">
							<div class="table-responsive">
								<table class="table table-bordered table-striped table-hover display" id="ApplTable" width="100%" cellspacing="0">
									<thead>
										<tr>
											<th class="sorting">Username</th>
											<th>Full Name</th>
											<!--										<th>Age</th>-->
											<!--										<th>Jobs Applied for</th>-->
											<th>National ID</th>
											<th>View CV</th>
											<th>View profile</th>
											<th>Time Created account</th>
											<!--										<th>Edit</th>-->
										</tr>
									</thead>
									<tbody>
										<?php
										//Get Jobs from DB
										$sql1 = "SELECT username FROM accounts WHERE role = 'Pending Applicant'";
										if ($stmt1 = mysqli_query($conn, $sql1)) {
											if ($stmt1) {
												while ($row1 = mysqli_fetch_assoc($stmt1)) {
													$sql2 = "SELECT username, full_name, adress, mobile, email, nat_id, id_front, id_back, birth_date, resume, job_position, datecreated FROM applicants WHERE username = '" . $row1['username'] . "'";
													if ($stmt2 = mysqli_query($conn, $sql2)) {
														if ($stmt2) {
															while ($row2 = mysqli_fetch_assoc($stmt2)) {
																echo (
																	'<tr>
																	<td id="usr' . $row2["username"] . '" class="text-dark">' . $row2["username"] . '</div></td>
																	<td id="ful' . $row2["username"] . '" class="text-dark">' . $row2["full_name"] . '</div></td>

																	<td id="nID' . $row2["username"] . '" class="text-dark">' . $row2["nat_id"] . '</td>
																	<td id="vCV' . $row2["username"] . '" class="text-primary"></td>
																	<td id="vProf' . $row2["username"] . '" class="text-primary"><a href="../ViewProfile.php?viewuser=' . $row2["username"] . '" name=view"' . $row2["username"] . '">View</a></td>
																	<td id="timecreated' . $row2["username"] . '">' . $row2["datecreated"] . '</td>
																	
																</tr>'
																);
															}
														}
													}
												}
											}
										}
										?>
									</tbody>
								</table>
							</div>
						</div>
					</div>

					<!-- Apps in the system -->
					<div class="card shadow-sm mb-4">
						<div class="card-header py-3">
							<div class="row d-flex align-items-center">
								<h5 class="m-0 ml-2 font-weight-bold text-primary">Applicants in the system <small>(Table)</small></h5>
								<!--
							<button type="button" class="btn btn-danger btn-square-sm float-right ml-auto align-middle mr-1" data-toggle="modal" data-target="#DisableAllModal"> 
								<i class="fa-solid fa-x"></i>
							</button>
							<button type="button" class="btn btn-success btn-square-sm float-right ml-1 align-middle mr-1" data-toggle="modal" data-target="#EnableAllModal"> 
								<i class="fa-solid fa-check"></i> 
							</button>
							<button type="button" class="btn btn-primary btn-square-sm float-right ml-1 align-middle mr-1" data-toggle="modal" data-target="#AddJobModal"> 
								<i class="fa-solid fa-plus"></i>
							</button>
-->
							</div>
						</div>
						<div class="card-body">
							<div class="table-responsive">
								<table class="table table-bordered table-striped table-hover display" id="ApplTable" width="100%" cellspacing="0">
									<thead>
										<tr>
											<th class="sorting">Username</th>
											<th>Full Name</th>
											<th>Job Title</th>
											<th>Age</th>
											<th>Jobs Applied for</th>
											<th>View CV</th>
											<th>View profile</th>
											<th>National ID</th>
											<th>Time Created account</th>
										</tr>
									</thead>
									<tbody>
										<?php
										//Get Jobs from DB
										$sql1 = "SELECT username FROM accounts WHERE role = 'Job Applicant'";
										if ($stmt1 = mysqli_query($conn, $sql1)) {
											if ($stmt1) {
												while ($row1 = mysqli_fetch_assoc($stmt1)) {
													$sql2 = "SELECT username, full_name, adress, mobile, email, nat_id, id_front, id_back, birth_date, resume, job_position, datecreated FROM applicants WHERE username = '" . $row1['username'] . "'";
													if ($stmt2 = mysqli_query($conn, $sql2)) {
														if ($stmt2) {
															while ($row2 = mysqli_fetch_assoc($stmt2)) {
																echo (
																	'<tr>
																	<td id="usr' . $row2["username"] . '" class="text-dark">' . $row2["username"] . '</div></td>
																	<td id="ful' . $row2["username"] . '" class="text-dark">' . $row2["full_name"] . '</div></td>

																	<td id="nID' . $row2["username"] . '" class="text-dark">' . $row2["job_position"] . '</td>
																	<td id="nID' . $row2["username"] . '" class="text-dark"></td>
																	<td id="nID' . $row2["username"] . '" class="text-dark"></td>
																	<td id="nID' . $row2["username"] . '" class="text-dark"></td>
																	<td id="vProf' . $row2["username"] . '" class="text-primary"><a href="../ViewProfile.php?viewuser=' . $row2["username"] . '" name=view"' . $row2["username"] . '">View</a></td>
																	<td id="Mname' . $row2["username"] . '" class="text-dark">' . $row2["nat_id"] . '</td>
																	<td id="timecreated' . $row2["username"] . '">' . $row2["datecreated"] . '</td>
																	
																</tr>'
																);
																//															<td id="Edituser' . $row2[ "username" ] . '" class="text-center">
																//																	<button type="button" class="btn btn-outline-secondary btn-square-md" id=""EdituserBut' . $row2[ "username" ] . '" onclick="document.getElementById(\''.$row2[ "username" ].'\').click()">
																//																		<i class="fa-solid fa-pen-to-square"></i>
																//																	</button></td>
																//																	<form action="'.htmlspecialchars($_SERVER["PHP_SELF"]) .'" method="post" class="align-items-center" enctype="multipart/form-data" style="displaly:none;">
																//                                                                        <input type="submit" name="'.$row2[ "username" ].'"  id="'.$row2[ "username" ].'">
																//																	</form>
																//																	
																//															if(isset($row2[ "username" ])){
																//																$sql = "UPDATE accounts SET role = 'Job Applicant' WHERE username = '".$row2[ 'username' ]."'";
																//																if ( $conn->query( $sql ) === TRUE ) {
																//																	echo "<script>
																//																			alert('Account Activated successfully');
																//																			 window.location.href='".$_SERVER['PHP_SELF']."';
																//																		</script>";
																//																} else {
																//																	echo "Error updating record: " . $conn->error;
																//																}
																//															}
															}
														}
													}
												}
											}
										}
										?>
									</tbody>
								</table>
							</div>
						</div>
					</div>

				</div>
				<!-- /.container-fluid -->

			</div>
			<!-- End of Main Content -->

			<!-- Footer -->
			<footer class="sticky-footer bg-white">
				<div class="container my-auto">
					<div class="copyright text-center my-auto"> <span>© Copyright E-Recruit Team FCAI-HU - 2024</span> </div>
				</div>
			</footer>
			<!-- End of Footer -->

		</div>
		<!-- End of Content Wrapper -->

	</div>
	<!-- End of Page Wrapper -->



	<!----------Bar Chart------------>
	<script type="text/javascript">
		$(window).resize(function() {
			drawDeps();
			//  drawPos();
		});
		// Load the Visualization API and the corechart package.
		google.charts.load('current', {
			'packages': ['corechart']
		});

		// Set a callback to run when the Google Visualization API is loaded.
		google.charts.setOnLoadCallback(drawDeps);
		//      google.charts.setOnLoadCallback(drawPos);

		// Callback that creates and populates a data table,
		// instantiates the pie chart, passes in the data and
		// draws it.
		function drawDeps() {

			// Create the data table.
			var data = new google.visualization.arrayToDataTable([
				['Department', 'Number of jobs'], <?php echo ($DepBarData) ?>
			]);
			// Set chart options
			var options = {
				'title': '',
				'width': 400,
				legend: 'none',
				animation: {
					duration: 1000,
					easing: 'out',
					startup: true
				},
				chartArea: {
					width: '94%'
				},
				width: '100%',
			};

			// Instantiate and draw our chart, passing in some options.
			var chart = new google.visualization.ColumnChart(document.getElementById('DepChart'));
			chart.draw(data, options);
		}
	</script>
	<!----------Bar Chart End------------>



	<!-- Scroll to Top Button-->
	<a class="scroll-to-top rounded" href="#page-top"> <i class="fas fa-angle-up"></i> </a>

	<!-- Edit Company Modal-->
	<div class="modal fade" id="EditCompanyModal" tabindex="-1" role="dialog" aria-labelledby="EditCompanyl" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="EditCompanyl">Edit Company Data</h5>
					<button class="close" type="button" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">×</span> </button>
				</div>
				<div class="modal-body">
					<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" class="align-items-center" enctype="multipart/form-data">
						<div class="row d-flex align-items-center justify-content-center">
							<label class="float-left col-md-5 m-0">Company Name: </label>
							<input type="text" class="form-control float-right col-md-6 ml-md-auto align-middle h-100 mr-3 ml-3" oninput="validate('nambox');" id="nambox" name="nambox">
						</div>

						<hr>

						<div class="row d-flex align-items-center justify-content-center mt-2">
							<label class="float-left col-7 m-0 imagename">New profile picture : <span id="FileName" style="text-overflow: ellipsis; "></span></label>
							<button type="button" class="btn btn-secondary float-right col-3 ml-auto align-middle h-100 mr-3" style="color: white;" onclick="document.getElementById('getFile').click();">Upload</button>
							<input type="file" accept="image/*" class="form-control-file" id="getFile" style="display:none;" name="image" onChange="Text1ToValue2('getFile', 'FileName')" title="upload new image">
						</div>

				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-dark mr-auto" data-dismiss="modal">Close</button>
					<input type="submit" name="SubmitEditCompany" class="form-control btn btn-primary btn-md col-2" value="Save"></input>
					</form>
				</div>
			</div>
		</div>
	</div>


	<!-- Enable All Modal-->
	<div class="modal fade" id="EnableAllModal" tabindex="-1" role="dialog" aria-labelledby="Logoutt" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="Logoutt">Enable All?</h5>
					<button class="close" type="button" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">×</span> </button>
				</div>
				<div class="modal-body text-dark">Are you sure you want to Enable <strong>ALL</strong> Jobs?</div>
				<div class="modal-footer">
					<button class="btn btn-secondary mr-auto" type="button" data-dismiss="modal">Cancel</button>
					<form class="form-inline my-2 my-md-0" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
						<input type="submit" name="EnableAll" value="Enable" class="btn btn-success"></input>
					</form>
				</div>
			</div>
		</div>
	</div>

	<!-- Disable All Modal-->
	<div class="modal fade" id="DisableAllModal" tabindex="-1" role="dialog" aria-labelledby="Logoutt" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="Logoutt">Disable All?</h5>
					<button class="close" type="button" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">×</span> </button>
				</div>
				<div class="modal-body text-dark">Are you sure you want to Disable <strong>ALL</strong> Jobs?</div>
				<div class="modal-footer">
					<button class="btn btn-secondary mr-auto" type="button" data-dismiss="modal">Cancel</button>
					<form class="form-inline my-2 my-md-0" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
						<input type="submit" name="DisableAll" value="Disable" class="btn btn-danger"></input>
					</form>
				</div>
			</div>
		</div>
	</div>

	<!-- Add Job Modal-->
	<div class="modal fade" id="AddJobModal" tabindex="-1" role="dialog" aria-labelledby="AddJobb" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="AddJobb">Add Job</h5>
					<button class="close" type="button" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">×</span> </button>
				</div>
				<div class="modal-body">
					<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" class="align-items-center" enctype="multipart/form-data">
						<div class="row d-flex align-items-center justify-content-center">
							<label class="float-left col-md-5 m-0">Job title: </label>
							<input type="text" class="form-control float-right col-md-6 ml-md-auto align-middle h-100 mr-3 ml-3" oninput="validate('titlebox');" id="titlebox" name="titlebox">
						</div>
						<hr>
						<div class="row d-flex align-items-center justify-content-center mt-2">
							<label class="float-left col-md-5 m-0">Job description: </label>
							<!--							<input type="text" class="form-control float-right col-md-6 ml-md-auto align-middle h-100 mr-3 ml-3" id="descbox" >-->
							<textarea rows="4" class="form-control float-left col-md-6 ml-md-auto align-middle h-100 mr-3 ml-3" style="resize: none;" oninput="validate('descbox');" id="descbox" name="descbox"></textarea>
						</div>
						<hr>
						<div class="row d-flex align-items-center justify-content-center mt-2">
							<label class="float-left col-md-5 m-0">capacity: </label>
							<input type="number" class="form-control float-right col-md-6 ml-md-auto align-middle h-100 mr-3 ml-3" id="capbox" name="capbox">
						</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-dark mr-auto" data-dismiss="modal">Close</button>
					<input type="submit" name="SubmitAddJob" onClick="" class="form-control btn btn-primary btn-sm col-3" value="Save">
					</form>
					<!--					setTimeout(function() {location.reload();}, 1000);-->
				</div>
			</div>
		</div>
	</div>

	<!-- Edit Job Modal-->
	<div class="modal fade" id="EditJobModal" tabindex="-1" role="dialog" aria-labelledby="EditJobb" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="EditJobb">Edit Job</h5>
					<button class="close" type="button" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">×</span> </button>
				</div>
				<div class="modal-body">
					<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" class="align-items-center" enctype="multipart/form-data">
						<div class="row d-flex align-items-center justify-content-center">
							<label class="float-left col-md-5 m-0">Job title: </label>
							<input type="text" class="form-control float-right col-md-6 ml-md-auto align-middle h-100 mr-3 ml-3" oninput="validate('titlbox');" id="titlbox" name="titlbox">
						</div>
						<hr>
						<div class="row d-flex align-items-center justify-content-center mt-2">
							<label class="float-left col-md-5 m-0">Job description: </label>
							<textarea rows="4" class="form-control float-left col-md-6 ml-md-auto align-middle h-100 mr-3 ml-3" oninput="validate('descrbox');" style="resize: none;" id="descrbox" name="descrbox"></textarea>
						</div>
						<hr>
						<div class="row d-flex align-items-center justify-content-center mt-2">
							<label class="float-left col-md-5 m-0">capacity: </label>
							<input type="number" class="form-control float-right col-md-6 ml-md-auto align-middle h-100 mr-3 ml-3" id="capacbox" name="capacbox">
						</div>
				</div>
				<div class="modal-footer">
					<input type="text" id="jobID" name="jobID" style="display: none;">
					<button type="button" class="btn btn-dark mr-auto" data-dismiss="modal">Close</button>
					<button type="button" class="btn btn-danger btn-square-sm" data-toggle="modal" data-target="#DeleteJobModal"><i class="bi bi-trash"></i></button>
					<button type="button" onClick="document.getElementById('EnableSub').click();" class="form-control btn btn-success btn-md col-3 col-md-2" id="EnableBut">Enable</button>
					<button type="button" onClick="document.getElementById('DisableSub').click();" class="form-control btn btn-danger btn-md col-3 col-md-2" id="DisableBut">Disable</button>
					<input type="submit" name="SubmitEditJob" class="form-control btn btn-primary btn-md col-2" value="Save">
					</input>
					<input type="submit" name="EnableJob" class="form-control btn btn-success btn-md col-2" style="display: none;" id="EnableSub" value="Enable">
					</input>
					<input type="submit" name="DisableJob" class="form-control btn btn-danger btn-md col-2" style="display: none;" id="DisableSub" value="Disable">
					</input>
					</form>
				</div>
			</div>
		</div>
	</div>

	<!-- Delete Job Modal-->
	<div class="modal fade" id="DeleteJobModal" tabindex="0" role="dialog" aria-labelledby="DelJobs" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="DelJobs">Delete Job</h5>
					<button class="close" type="button" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">×</span> </button>
				</div>
				<div class="modal-body">Are you sure you want to Delete?</div>
				<div class="modal-footer">
					<button class="btn btn-dark mr-auto" type="button" data-dismiss="modal">Cancel</button>
					<form class="form-inline my-2 my-md-0" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
						<input type="text" id="jobID2" name="jobID2" style="display: none;">
						<input type="submit" name="DeleteEditJob" class="form-control btn btn-danger" id="DelJob" value="Delete">
					</form>
				</div>
			</div>
		</div>
	</div>

	<!-- Logout Modal-->
	<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="Logoutt" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="Logoutt">Ready to Leave?</h5>
					<button class="close" type="button" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">×</span> </button>
				</div>
				<div class="modal-body">Are you sure you want to logout?</div>
				<div class="modal-footer">
					<button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
					<form class="form-inline my-2 my-md-0" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
						<input type="submit" name="Logout" value="Logout" class="btn btn-primary">
						</input>
					</form>
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