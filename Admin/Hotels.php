<?php
session_start();
require_once('AdminFunctions.php');

$m = 0;
$Printed = "";
$in = 0;
$col = 0;
$per = 0;
$details = "";
$colu = "";
$piedata = "";
$DepBarData = "";
$echo = "";



//Count Departments
$Deps = array();
$i = 0;
foreach ($Departments as $key => $value) : $sql = "SELECT COUNT(department) AS Dep from jobs WHERE department = '" . $value . "'";
	if ($depstmt = mysqli_query($conn, $sql)) {

		if (mysqli_num_rows($depstmt) > 0) {

			while ($data = mysqli_fetch_assoc($depstmt)) {
				$Deps[$i] = $data['Dep'];

				$i += 1;
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
	<title>Admin - Companies</title>

	<!-- Custom fonts for this template-->
	<script src="https://kit.fontawesome.com/475cbef551.js" crossorigin="anonymous"></script>
	<link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">

	<!-- Custom styles for this template-->
	<link href="<?php echo BASE_URL; ?>assets/css/CSS/sb-admin-2.min.css" rel="stylesheet">
	<script src="<?php echo BASE_URL; ?>assets/js/JS/jquery-3.6.0.min.js"></script>
	<script src="<?php echo BASE_URL; ?>assets/js/JS/CompaniesJS.js"></script>

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

<body id="page-top" onLoad="table('CompaniesTable');table('JobsTable')">

	<!-- Page Wrapper -->
	<div id="wrapper">
		<!-- Content Wrapper -->
		<div id="content-wrapper" class="d-flex flex-column">

			<!-- Main Content -->
			<div id="content">

				<!-- Topbar -->
				<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow-sm">

					<div class="navbar-brand-icon"> <img src="../Images/logoMOT.png" height="50" alt=""> </div>
					<div class="navbar-brand-text mx-1">E-Recruit Admin</div>

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
								<a class="dropdown-item" href="<?php echo ($Path . "Admin/MOTAAdmin" . $End); ?>">
									<i class="fa-solid fa-chart-line fa-sm fa-fw mr-2 text-gray-400"></i> Dashboard
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
						<h1 class="h3 mb-0 text-gray-800">Companies &amp; Jobs</h1>
						<!--
					<a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
						<i class="fas fa-download fa-sm text-white-50"></i> Generate Report
					</a> 
-->
					</div>


					<!-- Companies -->
					<div class="card shadow-sm mb-4">
						<div class="card-header py-3">
							<div class="row d-flex align-items-center">
								<h5 class="m-0 ml-2 font-weight-bold text-primary">Companies</h5>
								<button type="button" class="btn btn-danger btn-square-sm float-right ml-auto align-middle mr-1" data-toggle="modal" data-target="#DisableAllModal">
									<i class="fa-solid fa-x"></i>
								</button>
								<button type="button" class="btn btn-success btn-square-sm float-right ml-1 align-middle mr-1" data-toggle="modal" data-target="#EnableAllModal">
									<i class="fa-solid fa-check"></i>
								</button>
								<button type="button" class="btn btn-primary btn-square-sm float-right ml-1 align-middle mr-1" data-toggle="modal" data-target="#AddJobModal">
									<i class="fa-solid fa-plus"></i>
								</button>
								<!--							data-toggle="modal" data-target="#CertsModal"     -->
							</div>
						</div>
						<div class="card-body">
							<div class="table-responsive">
								<table class="table table-bordered table-striped table-hover display" id="CompaniesTable" width="100%" cellspacing="0">
									<thead>
										<tr>
											<th class="sorting">Company Name</th>
											<th>No. of jobs</th>
											<th>Capacity</th>
											<th>Applied</th>
											<th>Accepted</th>
											<th>Rejected</th>
											<th>Status</th>
											<th>Time Added</th>
											<th class="text-center">Edit</th>
										</tr>
									</thead>
									<tbody>
										<?php
										//Get Jobs from DB
										$id = 0;
										$sql1 = "SELECT company, status, time_created FROM companies";
										if ($stmt1 = mysqli_query($conn, $sql1)) {
											if ($stmt1) {
												while ($row1 = mysqli_fetch_assoc($stmt1)) {
													$sql2 = "SELECT id, company, capacity, applied, accepted, rejected, time_added FROM jobs WHERE company = '" . $row1['company'] . "'";
													if ($stmt2 = mysqli_query($conn, $sql2)) {
														$count = 0;
														$Accsum = 0;
														$Appsum = 0;
														$Rejsum = 0;
														$Capsum = 0;
														$Occupied = 0;
														$Status = 'text-dark';
														if ($stmt2) {
															while ($row2 = mysqli_fetch_assoc($stmt2)) {
																if ($row1["status"] == 'Enabled') {
																	$Status = 'text-success';
																} elseif ($row1["status"] == 'Disabled') {
																	$Status = 'text-danger';
																}
																$Accsum += $row2["accepted"];
																$Appsum += $row2["applied"];
																$Rejsum += $row2["rejected"];
																$Capsum += $row2["capacity"];
																$count++;
																$id--;
															}
															echo (
																'<tr>
																	<td id="CompanyName' . $id . '" class="text-dark">' . $row1["company"] . '</td>
																	<td id="Compval' . $id . '" class="text-dark">' . $count . '</td>
																	<td id="capval' . $id . '" class="text-dark">' . $Capsum . '</td>
																	<td id="appval' . $id . '" class="text-primary">' . $Appsum . '</td>
																	<td id="accval' . $id . '" class="text-success">' . $Accsum . '</td>
																	<td id="rejval' . $id . '" class="text-danger">' . $Rejsum . '</td>
																	<td id="Statext' . $id . '" class="' . $Status . '">' . $row1["status"] . '</td>
																	<td id="timeval' . $id . '">' . $row1["time_created"] . '</td>
																	<td id="Edit' . $id . '" class="text-center"><button type="button" class="btn btn-outline-secondary btn-square-md" id=""EditBut' . $id . '"  data-toggle="modal" title="Edit" data-target="#EditCompanyModal" onclick="EditCompany(\'' . $id . '\');"><i class="fa-solid fa-pen-to-square"></i></button></td>
																</tr>'
															);
														}
													}
												}
												if (mysqli_num_rows($stmt1)) {
													$Occupied += round((($Accsum / $Capsum) * 100), 1);
												}
											}
										}
										?>
									</tbody>
								</table>
							</div>
						</div>
					</div>


					<!-- Jobs -->
					<div class="card shadow-sm mb-4">
						<div class="card-header py-3">
							<div class="row d-flex align-items-center">
								<h5 class="m-0 ml-2 font-weight-bold text-primary">Current Jobs</h5>
								<button type="button" class="btn btn-danger btn-square-sm float-right ml-auto align-middle mr-1" data-toggle="modal" data-target="#DisableAllModal">
									<i class="fa-solid fa-x"></i>
								</button>
								<button type="button" class="btn btn-success btn-square-sm float-right ml-1 align-middle mr-1" data-toggle="modal" data-target="#EnableAllModal">
									<i class="fa-solid fa-check"></i>
								</button>
								<button type="button" class="btn btn-primary btn-square-sm float-right ml-1 align-middle mr-1" data-toggle="modal" data-target="#AddJobModal">
									<i class="fa-solid fa-plus"></i>
								</button>
								<!--							data-toggle="modal" data-target="#CertsModal"     -->
							</div>
						</div>
						<div class="card-body">
							<div class="table-responsive">
								<table class="table table-bordered table-striped table-hover display" id="JobsTable" width="100%" cellspacing="0">
									<thead>
										<tr>
											<th class="sorting">Job Title</th>
											<th>Company</th>
											<th>Capacity</th>
											<th>Applied</th>
											<th>Accepted</th>
											<th>Rejected</th>
											<th class="mw-25">Description</th>
											<th>Status</th>
											<th>Time Added</th>
											<th class="text-center">Edit</th>
										</tr>
									</thead>
									<tbody>
										<?php
										//Get Jobs from DB
										$sql = "SELECT id, job_title, company, job_description, capacity, applied, accepted, rejected, Status, time_added FROM jobs";
										if ($stmt = mysqli_query($conn, $sql)) {
											$Pending = 0;
											$Accsum = 0;
											$Capsum = 0;
											$Occupied = 0;
											$Status = 'text-dark';
											if ($stmt) {
												while ($row = mysqli_fetch_assoc($stmt)) {
													if ($row["Status"] == 'Enabled') {
														$Status = 'text-success';
													} elseif ($row["Status"] == 'Disabled') {
														$Status = 'text-danger';
													}
													echo (
														'<tr>
                                                        <td id="titltxt' . $row["id"] . '" class="text-dark">' . $row["job_title"] . '</div></td>
                                                        <td id="Compval' . $row["id"] . '" class="text-dark">' . $row["company"] . '</td>
                                                        <td id="capval' . $row["id"] . '" class="text-dark">' . $row["capacity"] . '</td>
                                                        <td id="appval' . $row["id"] . '" class="text-primary">' . $row["applied"] . '</td>
                                                        <td id="accval' . $row["id"] . '" class="text-success">' . $row["accepted"] . '</td>
                                                        <td id="rejval' . $row["id"] . '" class="text-danger">' . $row["rejected"] . '</td>
                                                        <td id="desctext' . $row["id"] . '" class="text-dark ellipsis mw-25">' . $row["job_description"] . '</td>
                                                        <td id="StatextJ' . $row["id"] . '" class="' . $Status . '">' . $row["Status"] . '</td>
                                                        <td id="timeval' . $row["id"] . '">' . $row["time_added"] . '</td>
                                                        <td id="Edit' . $row["id"] . '" class="text-center"><button type="button" class="btn btn-outline-secondary btn-square-md" id=""EditBut' . $row["id"] . '"  data-toggle="modal" title="Edit" data-target="#EditJobModal" onclick="EditJob(\'' . $row["id"] . '\');"><i class="fa-solid fa-pen-to-square"></i></button></td>
                                                    </tr>'
													);
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
	<!--
<script type="text/javascript">
$(window).resize(function(){
  drawDeps();
//  drawPos();
});
      // Load the Visualization API and the corechart package.
      google.charts.load('current', {'packages':['corechart']});

      // Set a callback to run when the Google Visualization API is loaded.
      google.charts.setOnLoadCallback(drawDeps);
//      google.charts.setOnLoadCallback(drawPos);

      // Callback that creates and populates a data table,
      // instantiates the pie chart, passes in the data and
      // draws it.
      function drawDeps() {

        // Create the data table.
        var data = new google.visualization.arrayToDataTable([['Department', 'Number of jobs'],<?php echo ($DepBarData) ?>]);
        // Set chart options
        var options = {'title':'',
                       'width':400,
					   legend:'none',
					   animation: {duration: 1000,easing: 'out',startup: true},
					   chartArea: {width: '94%' },
					   width: '100%',   
					  };

        // Instantiate and draw our chart, passing in some options.
        var chart = new google.visualization.ColumnChart(document.getElementById('DepChart'));
        chart.draw(data, options);
      }
	
    </script> 
-->
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
							<input type="text" class="form-control float-right col-md-6 ml-md-auto align-middle h-100 mr-3 ml-3" oninput="validate('nambox');" id="Companynambox" name="Companynambox">
						</div>

						<hr>

						<div class="row d-flex align-items-center justify-content-center mt-2">
							<label class="float-left col-7 m-0 imagename">New Logo : <span id="FileName" style="text-overflow: ellipsis; "></span></label>
							<button type="button" class="btn btn-secondary float-right col-3 ml-auto align-middle h-100 mr-3" style="color: white;" onclick="document.getElementById('getFile').click();">Upload</button>
							<input type="file" accept="image/*" class="form-control-file" id="getFile" style="display:none;" name="CompanyLogo" onChange="Text1ToValue2('getFile', 'FileName')" title="upload new image">
						</div>

				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-dark mr-auto" data-dismiss="modal">Close</button>
					<button type="button" onClick="document.getElementById('EnableHot').click();" class="form-control btn btn-success btn-md col-3 col-md-2" id="EnableBut">Enable</button>
					<button type="button" onClick="document.getElementById('DisableHot').click();" class="form-control btn btn-danger btn-md col-3 col-md-2" id="DisableBut">Disable</button>
					<input type="submit" name="SubmitEditCompany" class="form-control btn btn-primary btn-md col-2" value="Save"></input>
					<input type="submit" name="EnableHot" class="form-control btn btn-success btn-md col-2" style="display: none;" id="EnableHot" value="Enable">
					</input>
					<input type="submit" name="DisableHot" class="form-control btn btn-danger btn-md col-2" style="display: none;" id="DisableHot" value="Disable">
					</input>
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
					<button type="button" onClick="document.getElementById('EnableSub').click();" class="form-control btn btn-success btn-md col-3 col-md-2" id="EnableButJ">Enable</button>
					<button type="button" onClick="document.getElementById('DisableSub').click();" class="form-control btn btn-danger btn-md col-3 col-md-2" id="DisableButJ">Disable</button>
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