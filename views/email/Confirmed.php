<?php
require_once('/config/config.php');
error_reporting(E_ALL);
ini_set('display_errors', 'On');
$_SESSION['ConfirmUser'] = $_GET['user'];
$_SESSION['ConfirmRole'] = $_GET['role'];
if ($_SESSION['ConfirmRole'] == "REmployer" || $_SESSION['ConfirmRole'] == "RApplicant") {
    $sql = "UPDATE accounts SET status = 'Confirmed' WHERE username = '" . $_SESSION['ConfirmUser'] . "'";
    if ($conn->query($sql) === TRUE) {
        echo "<script>
                alert('Thank you for confirming your email..');
                 window.location.href='" . $Path . "Home" . $End . "';
            </script>";
    } else {
        echo "Error updating record: " . $conn->error;
    }
} else {
    echo "Error with the role";
}

?>


<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <link rel="icon" href="<?php echo BASE_URL; ?>assets/images/Logo Shape.svg">
    <title>Redirecting...</title>
</head>

<body>
</body>

</html>