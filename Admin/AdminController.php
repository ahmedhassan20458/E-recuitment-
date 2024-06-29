<?php

$isAuth = true;
require_once(__DIR__ . '/../config/config.php');
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true || (isset($_SESSION['loggedin']) && $_SESSION[ "role" ] !== 'MOTAAdmin')){
	logout();
}

// Get image data from database 
$sql = "SELECT image FROM accounts_images WHERE username = '" . $_SESSION[ 'username' ] . "'";
if ( $stmt = mysqli_prepare( $conn, $sql ) ) {
    // Attempt to execute the prepared statement
    if ( mysqli_stmt_execute( $stmt ) ) {
        // Store result
        $result = mysqli_stmt_store_result( $stmt );

        if ( mysqli_stmt_num_rows( $stmt ) == 1 ) {
            mysqli_stmt_bind_result( $stmt, $image );
			if(empty($image)) {
                $img = BASE_URL . 'assets/images/Images/PP.png';
			}
			else{
				$img = 'data:image/jpeg;base64,'.base64_encode($image);
			}
			if ( mysqli_stmt_fetch( $stmt ) ) {

            }
        } else {
            echo "Oops! Something went wrong. Please try again later.";
        }
    } else {
        echo "Oops! Something went wrong. Please try again later.";
    }

    // Close statement
    mysqli_stmt_close( $stmt );
}
else {
        echo "Oops! Something went wrong. Please try again later.";
    }


//------------------------Get Companies DATA-------------------------

//Get Number of applicants on the system
$i = 0;
$getinfo = "SELECT COUNT(ID) AS ID from `accounts` WHERE role = 'Job Applicant'";
$res = mysqli_query( $conn, $getinfo );
while ( $data = mysqli_fetch_assoc( $res ) ) {
    $_SESSION['NOfApplicants'] = $data[ 'ID' ];
}

//Get Number of Employers on the system
$i = 0;
$getinfo = "SELECT COUNT(ID) AS ID from `accounts` WHERE role = 'Employer'";
$res = mysqli_query( $conn, $getinfo );
while ( $data = mysqli_fetch_assoc( $res ) ) {
    $_SESSION['NOfEmployer'] = $data[ 'ID' ];
}


//------------------------End Get Companies DATA-------------------------


//Change Company Info

//Change Company Info
if ( isset( $_POST[ "EnableHot" ] ) ) {

    $error = false;
    $status = "";

	// 1) Profile Pic 
    //check if file is not empty
    if ( !empty( $_FILES[ "CompanyLogo" ][ "name" ] ) ) {

        //file info 
        $file_name = basename( $_FILES[ "CompanyLogo" ][ "name" ] );
        $file_type = pathinfo( $file_name, PATHINFO_EXTENSION );

        //make an array of allowed file extension
        $allowed_file_types = array( 'jpg', 'jpeg', 'png', 'gif' );


        //check if upload file is an image
        if ( in_array( $file_type, $allowed_file_types ) ) {

            $tmp_image = $_FILES[ 'CompanyLogo' ][ 'tmp_name' ];
            $img_content = addslashes( file_get_contents( $tmp_image ) );

            //Now run insert query
            $query = $conn->query( "UPDATE companies SET logo = '" . $img_content . "' WHERE company = '" . $_SESSION[ 'company' ] . "'" );


            //check if successfully inserted
            if ( $query ) {
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
	$CompanyName = $_POST[ 'Companynambox' ];

	if(!empty($CompanyName) && $CompanyName != $_SESSION['company']){
				$sql = "SELECT * FROM companies WHERE company = ?";
				if ( $stmt = mysqli_prepare( $conn, $sql ) ) {
					// Bind variables to the prepared statement as parameters
					mysqli_stmt_bind_param( $stmt, "s", $CompanyName );

					// Attempt to execute the prepared statement
					if ( mysqli_stmt_execute( $stmt ) ) {
						/* store result */
						mysqli_stmt_store_result( $stmt );
						if ( mysqli_stmt_num_rows( $stmt ) == 1 ) {
							echo('<script>alert("This Company already Exists.")</script>');
						} 
						else {
							// Update applicants info table
							$sql = "UPDATE companies SET company  = '" . $CompanyName . "' WHERE company = '" . $_SESSION[ 'company' ] . "'";
							if ( !empty( $CompanyName )) {
								if ( $conn->query( $sql ) === TRUE ) {

									// Update applicants images table
									$sql2 = "UPDATE jobs SET company  = '" . $CompanyName . "' WHERE company = '" . $_SESSION[ 'company' ] . "'";
									if ( $conn->query( $sql2 ) === TRUE ) {
										$_SESSION[ "loggedin" ] = true;
										$_SESSION[ "company" ] = $CompanyName;
                                        $status = 'Data updated succesfully';
										echo "<script>
												alert('$status');
												window.location.href='".$_SERVER['PHP_SELF']."';
											</script>";
									}
								} else {
									echo ('<script>alert("Error updating record: '.$conn->error.'")</script>') ;
								}
							} else {
								$status = "Can\'t save an empty input";
								echo "<script>
									alert('$status');
									window.location.href='".$_SERVER['PHP_SELF']."';
								</script>";
							}
						}
					} 
					else {
						echo ('<script>alert("Oops! Something went wrong. Please try again later.")</script>');
					}

			}
	}
	elseif(!empty($CompanyName) && $CompanyName == $_SESSION['company']){
		$sql = "SELECT * FROM companies WHERE company = ?";
        if ( $stmt = mysqli_prepare( $conn, $sql ) ) {
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param( $stmt, "s", $CompanyName );

            // Attempt to execute the prepared statement
            if ( mysqli_stmt_execute( $stmt ) ) {
                /* store result */
                mysqli_stmt_store_result( $stmt );
                // Update applicants info table
                $sql = "UPDATE companies SET company  = '" . $CompanyName . "' WHERE company = '" . $_SESSION[ 'company' ] . "'";
                if ( !empty( $CompanyName )) {
                    if ( $conn->query( $sql )) {
                        // Update applicants images table
                        $sql2 = "UPDATE jobs SET company  = '" . $CompanyName . "' WHERE company = '" . $_SESSION[ 'company' ] . "'";
                        if ( $conn->query( $sql2 )) {
                            $_SESSION[ "loggedin" ] = true;
                            $_SESSION[ "company" ] = $CompanyName;
                            $status = 'Data updated succesfully';
							echo "<script>
									alert('$status');
									window.location.href='".$_SERVER['PHP_SELF']."';
								</script>";
							
                        }
                    } else {
                        echo ('<script>alert("Error updating record: '.$conn->error.'")</script>') ;
                    }
                } else {
					
                }
                
            } 
            else {
                echo ('<script>alert("Oops! Something went wrong. Please try again later.")</script>');
            }
    }
		
    }
	elseif(empty($CompanyName) && !empty( $_FILES[ "image" ][ "name" ] )){
		$status = "Image updated successfully";
		echo "<script>
				alert('$status');
				window.location.href='".$_SERVER['PHP_SELF']."';
			</script>";
	}
	else{
		$status = "Can\'t save an empty input";
		echo "<script>
				alert('$status');
				window.location.href='".$_SERVER['PHP_SELF']."';
			</script>";
	}
	
}
    



//Enable All Jobs
if ( isset( $_POST[ 'EnableAll' ] ) ) {
	$sql = "UPDATE jobs SET Status = 'Enabled' WHERE company = '".$_SESSION['company']."'";
        if ( $conn->query( $sql ) === TRUE ) {
            echo "<script>
                    alert('All Jobs Enabled succesfully');
                    window.location.href='".$_SERVER['PHP_SELF']."';
                </script>";
        } else {
            echo "Error updating record: " . $conn->error;
        }
}

//Disable All Jobs
if ( isset( $_POST[ 'DisableAll' ] ) ) {
	$sql = "UPDATE jobs SET Status = 'Disabled' WHERE company = '".$_SESSION['company']."'";
        if ( $conn->query( $sql ) === TRUE ) {
            echo "<script>
                    alert('All Jobs Disabled succesfully');
                    window.location.href='".$_SERVER['PHP_SELF']."';
                </script>";
        } else {
            echo "Error updating record: " . $conn->error;
        }
}

//Add Job
if ( isset( $_POST[ 'SubmitAddJob' ] ) ) {
    $titlebox = $_POST[ 'titlebox' ];
    $descbox = $_POST[ 'descbox' ];
    $capbox = $_POST[ 'capbox' ];
	$date = new DateTime("now", new DateTimeZone('Africa/Cairo') );
    
    $sql = "INSERT INTO jobs(company, job_title, job_description, capacity, applied, accepted, rejected, Status,  time_added) VALUES ('".$_SESSION['company']."','".$titlebox."','".$descbox."',".$capbox.",0,0,0,'Enabled','".$date->format('Y-m-d H:i:s')."')";
    if ( !empty( $titlebox ) && !empty( $descbox ) && !empty( $capbox )) {
        if ( $conn->query( $sql ) === TRUE ) {
            echo "<script>
                    alert('Job added succesfully');
                     window.location.href='".$_SERVER['PHP_SELF']."';
                </script>";
        } else {
            echo "Error updating record: " . $conn->error;
        }
    } else {
        echo "<script>alert('Can't save an empty input);</script>";
    }

}

//Edit Job
if ( isset( $_POST[ 'SubmitEditJob' ] ) ) {
    $titlbox = $_POST[ 'titlbox' ];
    $descrbox = $_POST[ 'descrbox' ];
    $capacbox = $_POST[ 'capacbox' ];
    $id = $_POST[ 'jobID' ];
    if ( !empty( $titlbox ) && !empty( $descrbox ) && !empty( $capacbox )) {
		$sql = "UPDATE jobs SET job_title = '" . $titlbox . "', job_description = '" . $descrbox . "', capacity = " . $capacbox . " WHERE id=" . $id . " AND company = '".$_SESSION['company']."'";
        if ( $conn->query( $sql ) === TRUE ) {
            echo "<script>
                    alert('Job updated succesfully');
                     window.location.href='".$_SERVER['PHP_SELF']."';
                </script>";
        } else {
            echo "Error updating record: " . $conn->error;
        }
    } else {
        echo "<script>alert('Can't save an empty input);</script>";
    }

}
    
//Enable Job
if ( isset( $_POST[ 'EnableJob' ] ) ) {
    $titlbox = $_POST[ 'titlbox' ];
    $descrbox = $_POST[ 'descrbox' ];
    $capacbox = $_POST[ 'capacbox' ];
    $id = $_POST[ 'jobID' ];
    if ( !empty( $titlbox ) && !empty( $descrbox ) && !empty( $capacbox )) {
		$sql = "UPDATE jobs SET job_title = '" . $titlbox . "', job_description = '" . $descrbox . "', capacity = " . $capacbox . ", Status = 'Enabled' WHERE id=" . $id . " AND company = '".$_SESSION['company']."'";
        if ( $conn->query( $sql ) === TRUE ) {
            echo "<script>
                    alert('Job Enabled');
                     window.location.href='".$_SERVER['PHP_SELF']."';
                </script>";
        } else {
            echo "Error updating record: " . $conn->error;
        }
    } else {
        echo "<script>alert('Can't save an empty input);</script>";
    }

}
    
//Disable Job
if ( isset( $_POST[ 'DisableJob' ] ) ) {
    $titlbox = $_POST[ 'titlbox' ];
    $descrbox = $_POST[ 'descrbox' ];
    $capacbox = $_POST[ 'capacbox' ];
    $id = $_POST[ 'jobID' ];
    if ( !empty( $titlbox ) && !empty( $descrbox ) && !empty( $capacbox )) {
		$sql = "UPDATE jobs SET job_title = '" . $titlbox . "', job_description = '" . $descrbox . "', capacity = " . $capacbox . ", Status = 'Disabled' WHERE id=" . $id . " AND company = '".$_SESSION['company']."'";
        if ( $conn->query( $sql ) === TRUE ) {
            echo "<script>
                    alert('Job Disabled');
                     window.location.href='".$_SERVER['PHP_SELF']."';
                </script>";
        } else {
            echo "Error updating record: " . $conn->error;
        }
    } else {
        echo "<script>alert('Can't save an empty input);</script>";
    }

}

    
//Delete Job
if ( isset( $_POST[ 'DeleteEditJob' ] ) ) {
    $id = $_POST[ 'jobID2' ];
    $sql = "DELETE FROM jobs WHERE id=" . $id . " AND company = '".$_SESSION['company']."'";
    if ( $conn->query( $sql ) === TRUE ) {
        echo "<script>
                alert('Job deleted succesfully');
                 window.location.href='".$_SERVER['PHP_SELF']."';
            </script>";
    } else {
        echo "Error deleting record: " . $conn->error;
    }

}


{
{$Departments = array(
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
);}

{$AG = array("General Manager",
"Company Manager",
"Deputy General Manager",
"Resident Manager",
"Director of Operations",
"Assistant Manager",
"Exec. Secretary",
"Secretary / Department Admin Assistant");
}

{$FrontOffice = array(
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
"Bell Man");}

{$Housekeeping = array(
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
"Marble Worker");}

{$Laundry = array(
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
"Laundry Worker/ Runner");}

{$Recreation = array(
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
"Recreation Attendant");}

{$AdminRelated = array(
"Director of Food & Beverage",
"Assistant Director F & B",
"Food & Beverage Manager",
"F&B Cost Controller",
"Assistant F&B Cost Controller",
"Cost Control Supervisor",
"F&B Store Keeper",
"F&B Cost Control Clerk",
"F&B Cashier / Restaurant cashier");}

{$FBService = array(
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
"Bus Boy");}

{$Kitchen = array(
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
"Kitchen Helper");}

{$FBSteward = array(
"Chief Steward",
"Asst. Chief Steward",
"Senior  Supervisor Steward",
"Stewarding Supervisor",
"Steward Shift Leader",
"Steward Porter");}

{$Finance = array(
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
"Store Porter ");}

{$ITMan = array(
"I.T. Manager",
"Asst. I.T. Manager",
"I.T Supervisor",
"IT Coordinator");}

{$HR = array(
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
"Staff Housing Attendant / Cafeteria Attendant.");}

{$Security = array(
"Security Manager",
"Asst. Security Manager",
"Security Supervisor",
"Security Shift Leader",
"Security Guard");}

{$Maintenance = array(
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
"Engineering Helper");}

{$Agriculture = array(
"Chief Gardener",
"Agriculture Engineer",
"Gardener Senior Supervisor",
"Gardener Supervisor",
"Gardener");}

{$Marketing = array(
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
"Office Boy");
}
}
?>