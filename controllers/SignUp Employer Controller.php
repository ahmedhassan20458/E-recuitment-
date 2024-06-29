<?php
$isAuth = false;
require_once(__DIR__ . '/../config/config.php');

ob_start();
session_start();


require 'PHPMailer-master/src/Exception.php';
require 'PHPMailer-master/src/PHPMailer.php';
require 'PHPMailer-master/src/SMTP.php';


$mail = new PHPMailer\PHPMailer\PHPMailer(true);
$mail->IsSMTP();
$mail->SMTPDebug = 0;
$mail->Mailer = "SMTP";
$mail->SMTPAuth = TRUE;
$mail->SMTPSecure = 'ssl';
$mail->Port = 465;
$mail->Host = "mail.e_rec_system.com";
$mail->Username = "admin@e_rec_system.com";
$mail->Password = "";

$mail->IsHTML(true);
$mail->Subject = "E-Recruit  Confirm Email";



// Check if the user is already logged in, if yes then redirect him to welcome page
if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
    if ($_SESSION['role'] == "Applicant" || $_SESSION['role'] == "RApplicant") {
        $_SESSION["loggedin"] = true;
        header("location: " . $Path . "Profile" . $End);
    } elseif ($_SESSION['role'] == "Employer" || $_SESSION['role'] == "REmployer") {
        $_SESSION["loggedin"] = true;
        header("location: " . $Path . "Company" . $End);
    } elseif ($_SESSION['role'] == "MOTAAdmin") {
        $_SESSION["loggedin"] = true;
        header("location: " . $Path . "Admin/MOTAAdmin" . $End);
    }
    exit;
} else {
    if ($_SESSION['role'] == "RApplicant") {
        header("location: " . $Path . "Signup-Applicant" . $End);
    }
}

// Define variables and initialize with empty values
$_SESSION['Title'] = $_SESSION['CompanyName'] = $_SESSION['Field'] = $_SESSION['Size'] = $_SESSION['ConfirmEmployee'] = $_SESSION['Disclaimer'] = "";
$_SESSION['Title_err'] = $_SESSION['CompanyName_err'] = $_SESSION['Field_err'] = $_SESSION['Size_err'] = $_SESSION['Disclaimer_err'] = $_SESSION['ConfirmEmployee_err'] = "";

if (isset($_POST['catcha'])) {
    echo "<script>
                alert('no');
			</script>";
} else {

    // Processing form data when form is submitted

    if (isset($_POST['Submit'])) {
        if (!empty($_POST['Disclaimer'])) {

                    // Validate Company Name
                    if (empty(($_POST["CompanyName"]))) {
                        $CompanyName_err = "Please enter your company name..";
                        echo "<script>
                            alert('" . $CompanyName_err . "');
                        </script>";
                    } else {
                        // Prepare a select statement
                        $sql = "SELECT company FROM companies WHERE company = '" . $_POST["CompanyName"] . "'";

                        if ($stmt = mysqli_prepare($conn, $sql)) {

                            // Attempt to execute the prepared statement
                            if (mysqli_stmt_execute($stmt)) {
                                /* store result */
                                mysqli_stmt_store_result($stmt);

                                if (mysqli_stmt_num_rows($stmt) > 0) {
                                    $CompanyName_err = "This Company already has an account.";
                                } else {
                                    $CompanyName = ($_POST["CompanyName"]);
                                }
                            } else {
                                echo "<script>
                                alert('Error checking username, please try again later..');
                            </script>";
                            }

                            // Close statement
                            mysqli_stmt_close($stmt);
                        }
                    }
                    array_push($inputs, $CompanyName_err);



                    $valid = true;
                    for ($in = 0; $in < count($inputs); $in++) {
                        if (!empty($inputs[$in])) {
                            //    			var_dump($inputs[$in]);
                            $valid = false;
                        }
                    }

                    // Check input errors before inserting in database
                    if ($valid) {
                        // Prepare an insert statement
                        $sql = "INSERT INTO accounts (username, password, role, status) VALUES (?, ?, ?, ?)";
                        $sql2 = "INSERT INTO applicants (username, full_name, adress, mobile, email, nat_id, id_front, id_back, birth_date, datecreated) VALUES ('" . $Username . "', '" . $FullName . "', '" . $Adress . "', '" . $Mobile . "', '" . $email . "', '" . $IDNum . "', '" . $img_ID_Front . "', '" . $img_ID_Back . "', '" . $Date . "', NOW())";
                        $sql3 = "INSERT INTO accounts_images (username) VALUES (?)";
                        $sql4 = "INSERT INTO companies (company, employees, status) VALUES ('" . $CompanyName . "', '" . $Username . "', 'Disabled')";
                        if ($stmt = mysqli_prepare($conn, $sql)) {
                            //            echo($sql);
                            if ($stmt2 = mysqli_prepare($conn, $sql2)) {
                                //			echo($sql2);
                                if ($stmt3 = mysqli_prepare($conn, $sql3)) {
                                    //            echo('3');
                                    // Bind variables to the prepared statement as parameters
                                    mysqli_stmt_bind_param($stmt, "ssss", $param_Username, $param_password, $param_role, $param_UserStatus);
                                    mysqli_stmt_bind_param($stmt3, "s", $param_Username);

                                    // Set parameters
                                    $param_Username = $Username;
                                    $param_password = password_hash($password, PASSWORD_DEFAULT); // Creates a password hash
                                    $param_role = $role;
                                    $param_UserStatus = $UserStatus;

                                    // Attempt to execute the prepared statement
                                    if (mysqli_stmt_execute($stmt)) {
                                        if (mysqli_stmt_execute($stmt2)) {
                                            if (mysqli_stmt_execute($stmt3)) {
                                                if ($role == "REmployer") {
                                                    if ($stmt4 = mysqli_prepare($conn, $sql4)) {
                                                        if (mysqli_stmt_execute($stmt4)) {
                                                            $ConfirmAlert = "Request sent, Check your mail and we\'ll contact you soon..";
                                                        }
                                                    }
                                                } else if ($role == "RApplicant") {
                                                    $ConfirmAlert = "Account Created, Check your mail..";
                                                } else {
                                                    $ConfirmAlert = "Error, please try again later..";
                                                } {
                                                    $MailPageApplicant =
                                                        '<!DOCTYPE html>
                        <html>

                        <head>
                            <title></title>
                            <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
                            <meta name="viewport" content="width=device-width, initial-scale=1">
                            <meta http-equiv="X-UA-Compatible" content="IE=edge" />
                            <style type="text/css">
                                @media screen {
                                    @font-face {
                                        font-family: \'Lato\';
                                        font-style: normal;
                                        font-weight: 400;
                                        src: local(\'Lato Regular\'), local(\'Lato-Regular\'), url(https://fonts.gstatic.com/s/lato/v11/qIIYRU-oROkIk8vfvxw6QvesZW2xOQ-xsNqO47m55DA.woff) format(\'woff\');
                                    }

                                    @font-face {
                                        font-family: \'Lato\';
                                        font-style: normal;
                                        font-weight: 700;
                                        src: local(\'Lato Bold\'), local(\'Lato-Bold\'), url(https://fonts.gstatic.com/s/lato/v11/qdgUG4U09HnJwhYI-uK18wLUuEpTyoUstqEm5AMlJo4.woff) format(\'woff\');
                                    }

                                    @font-face {
                                        font-family: \'Lato\';
                                        font-style: italic;
                                        font-weight: 400;
                                        src: local(\'Lato Italic\'), local(\'Lato-Italic\'), url(https://fonts.gstatic.com/s/lato/v11/RYyZNoeFgb0l7W3Vu1aSWOvvDin1pK8aKteLpeZ5c0A.woff) format(\'woff\');
                                    }

                                    @font-face {
                                        font-family: \'Lato\';
                                        font-style: italic;
                                        font-weight: 700;
                                        src: local(\'Lato Bold Italic\'), local(\'Lato-BoldItalic\'), url(https://fonts.gstatic.com/s/lato/v11/HkF_qI1x_noxlxhrhMQYELO3LdcAZYWl9Si6vvxL-qU.woff) format(\'woff\');
                                    }
                                }

                                /* CLIENT-SPECIFIC STYLES */
                                body,
                                table,
                                td,
                                a {
                                    -webkit-text-size-adjust: 100%;
                                    -ms-text-size-adjust: 100%;
                                }

                                table,
                                td {
                                    mso-table-lspace: 0pt;
                                    mso-table-rspace: 0pt;
                                }

                                img {
                                    -ms-interpolation-mode: bicubic;
                                }

                                /* RESET STYLES */
                                img {
                                    border: 0;
                                    height: auto;
                                    line-height: 100%;
                                    outline: none;
                                    text-decoration: none;
                                }

                                table {
                                    border-collapse: collapse !important;
                                }

                                body {
                                    height: 100% !important;
                                    margin: 0 !important;
                                    padding: 0 !important;
                                    width: 100% !important;
                                }

                                /* iOS BLUE LINKS */
                                a[x-apple-data-detectors] {
                                    color: inherit !important;
                                    text-decoration: none !important;
                                    font-size: inherit !important;
                                    font-family: inherit !important;
                                    font-weight: inherit !important;
                                    line-height: inherit !important;
                                }

                                /* MOBILE STYLES */
                                @media screen and (max-width:600px) {
                                    h1 {
                                        font-size: 32px !important;
                                        line-height: 32px !important;
                                    }
                                }

                                /* ANDROID CENTER FIX */
                                div[style*="margin: 16px 0;"] {
                                    margin: 0 !important;
                                }
                            </style>
                        </head>

                        <body style="background-color: #f4f4f4; margin: 0 !important; padding: 0 !important;">
                            <table border="0" cellpadding="0" cellspacing="0" width="100%">
                                <!-- LOGO -->
                                <tr>
                                    <td bgcolor="#00031B" align="center">
                                        <table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 600px;">
                                            <tr>
                                                <td align="center" valign="top" style="padding: 40px 10px 40px 10px;"> </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                                <tr>
                                    <td bgcolor="#00031B" align="center" style="padding: 0px 10px 0px 10px;">
                                        <table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 600px;">
                                            <tr>
                                                <td bgcolor="#ffffff" align="center" valign="top" style="padding: 40px 20px 20px 20px; border-radius: 4px 4px 0px 0px; color: #111111; font-family: \'Lato\', Helvetica, Arial, sans-serif; font-size: 48px; font-weight: 400; letter-spacing: 4px; line-height: 48px;">
                                                    <h1 style="font-size: 48px; font-weight: 400; margin: 2;">Welcome!</h1> <img src=" https://img.icons8.com/clouds/100/000000/handshake.png" width="125" height="120" style="display: block; border: 0px;" />
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                                <tr>
                                    <td bgcolor="#f4f4f4" align="center" style="padding: 0px 10px 0px 10px;">
                                        <table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 600px;">
                                            <tr>
                                                <td bgcolor="#ffffff" align="left" style="padding: 20px 30px 40px 30px; color: #666666; font-family: \'Lato\', Helvetica, Arial, sans-serif; font-size: 18px; font-weight: 400; line-height: 25px;">
                                                    <p style="margin: 0;">We\'re excited to have you get started. First, you need to confirm your account. Just press the button below.</p>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td bgcolor="#ffffff" align="left">
                                                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                        <tr>
                                                            <td bgcolor="#ffffff" align="center" style="padding: 20px 30px 60px 30px;">
                                                                <table border="0" cellspacing="0" cellpadding="0">
                                                                    <tr>
                                                                        <td align="center" style="border-radius: 3px;" bgcolor="#00031B">
                                                                            <a href="' . $Path . 'Confirmed' . $End . '?user=' . $Username . '&role=' . $role . '" target="_blank" style="font-size: 20px; font-family: Helvetica, Arial, sans-serif; color: #ffffff; text-decoration: none; color: #ffffff; text-decoration: none; padding: 15px 25px; border-radius: 2px; border: 1px solid #00031B; display: inline-block;">
                                                                            Confirm Account
                                                                            </a>
                                                                        </td>
                                                                    </tr>
                                                                </table>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </td>
                                            </tr> <!-- COPY -->
                                            <tr>
                                                <td bgcolor="#ffffff" align="left" style="padding: 0px 30px 40px 30px; border-radius: 0px 0px 4px 4px; color: #666666; font-family: \'Lato\', Helvetica, Arial, sans-serif; font-size: 18px; font-weight: 400; line-height: 25px;">
                                                    <p style="margin: 0;">Regards,<br>E-Recruit  Team</p>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                                <tr>
                                    <td bgcolor="#f4f4f4" align="center" style="padding: 30px 10px 0px 10px;">
                                        <table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 600px;">
                                            <tr>
                                                <td bgcolor="#D0E4FF" align="center" style="padding: 30px 30px 30px 30px; border-radius: 4px 4px 4px 4px; color: #666666; font-family: \'Lato\', Helvetica, Arial, sans-serif; font-size: 18px; font-weight: 400; line-height: 25px;">
                                                    <h2 style="font-size: 20px; font-weight: 400; color: #111111; margin: 0;">Need more help?</h2>
                                                    <p style="margin: 0;">Contact us at: <br> (Email)</p>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </table>



                            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
                            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.bundle.min.js"></script>
                            <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
                        </body>

                        </html>';
                                                }



                                                $mail->SetFrom("Admin@e_rec_system.com", "E-Recruit ");
                                                $mail->AddAddress($email, $FullName);
                                                $mail->MsgHTML($MailPageApplicant);
                                                $mail->Send();

                                                // Redirect to login page
                                                echo "<script>
                            alert('" . $ConfirmAlert . "');
                            window.location.href='" . $Path . "Home" . $End . "';
                        </script>";
                                            } else {
                                                echo "<script>
                                alert('Error in the third Statement, please try again later');
                            </script>";
                                            }
                                        } else {
                                            echo "<script>
                                alert('Error in the second Statement, please try again later');
                            </script>";
                                        }
                                    } else {
                                        echo "<script>
                            alert('Error in the first Statement, please try again later');
                        </script>";
                                    }

                                    // Close statement
                                    mysqli_stmt_close($stmt);
                                }
                            }
                        }
                    } else {
                        //        echo('false');
                    }

                    // Close connection
                    mysqli_close($conn);
                
        } else {
            $Disclaimer_err = 'please check this box';
        }
    }
}
