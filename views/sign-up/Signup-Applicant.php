<?php
$isAuth = false;
require_once(__DIR__ . '/../../controllers/SignUp Applicant Controller.php');


?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Applicant - Step two</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  <link rel="stylesheet" href="CSS/SignupStyle.css">
  <link rel="icon" href="<?php echo BASE_URL; ?>assets/images/Logo Shape.svg">

  <link rel="stylesheet" href="CSS/LoaderStyle.css">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="JS/SignupJS.js"></script>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;700;1000&display=swap" rel="stylesheet">
</head>

<body style="height: 100vh; width: 100vw;" class="row align-items-center justify-content-center m-0">


  <div class="container d-flex align-self-center justify-content-center align-items-center" style="max-width: 100vw;">
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" id="SignupForm" method="post" class="mt-4" enctype="multipart/form-data">

      <div class="row align-items-center justify-content-center mb-md-4">
        <div class="col-12 mb-md-0 mb-4 text-center">
          <img src="<?php echo BASE_URL; ?>assets/images/Logo.svg" alt="" style="max-height: 20vh; max-width: 90vw;">
        </div>
      </div>

      <div class="row col-md-6 col-12 mx-auto">


        <!-- Address input -->
        <div class="form-outline mb-md-2 mb-1 col-12 col-md-6 mx-0" id="AdressDiv">
          <label class="form-label" for="Address">Address</label>
          <input type="" id="Adress" name="Adress" placeholder="Address" oninput="validate('Adress');" class="form-control text-dark" required value="<?php echo isset($_POST["Adress"]) ? $_POST["Adress"] : ''; ?>" />
          <div class="text-danger">
            <?php echo ($_SESSION['Adress_err']); ?>
          </div>
        </div>

        <!-- National ID Number -->
        <div class="form-outline mb-md-2 mb-1 col-12 col-md-6 mx-0" id="NatIDDiv">
          <label class="form-label" for="ID">National ID Number</label>
          <input type="tel" id="ID" name="IDNum" placeholder="National ID" oninput="validate('ID');this.setCustomValidity('')" pattern="[0-9]{14}" class="form-control text-dark" required oninvalid="this.setCustomValidity('National ID is exactly 14 numbers')" value="<?php echo isset($_POST["IDNum"]) ? $_POST["IDNum"] : ''; ?>" />
          <div class="text-danger">
            <?php echo ($_SESSION['ID_err']); ?>
          </div>
        </div>

        <!-- Date input -->
        <div class="form-outline mb-md-2 mb-1 col-12 col-md-6 mx-0" id="BirthDiv">
          <label class="form-label" for="Date">Birth Date</label>
          <input type="date" id="Date" name="Date" class="form-control text-dark" oninvalid="this.setCustomValidity('Please select your birth date')" onChange="this.setCustomValidity('')" required value="<?php echo isset($_POST["Date"]) ? $_POST["Date"] : ''; ?>" />
        </div>

        <!-- National ID Front -->
        <div class="form-outline row mb-md-2 mb-1 mt-2 col-12 col-md-6 mx-0 align-items-center text-left" id="IDFrontDiv">
          <label class="form-label float-left col-9 m-0 p-0 ">National ID <small class="form-label">(Front)</small> : <br>
            <span id="IDFr" class="ellipsis"></span>
            <label class="text-danger" style="display: none;" id="FLBL"></label>
          </label>
          <button type="button" class="btn btn-secondary float-right col-2 ml-auto align-middle h-100" style="color: white;" onclick="document.getElementById('FrontID').click();">+</button>
          <input type="file" accept="image/*" class="form-control text-dark-file" id="FrontID" style="display:none;" name="IDFront" onChange="Text1ToValue2('FrontID', 'IDFr');checkFile('FrontID', 'FLBL', 'IDFr');" title="upload new image">
        </div>

        <!-- National ID Back -->
        <div class="form-outline row mb-md-2 mb-1 mt-2 col-12 col-md-6 mx-0 align-items-center text-left" id="IDBackDiv">
          <label class="form-label float-left col-9 m-0 p-0">National ID <small class="form-label">(Back)</small> : <br>
            <span id="IDBa" class="ellipsis"></span>
            <label class="text-danger" style="display: none;" id="BLBL"></label>
          </label>
          <button type="button" class="btn btn-secondary float-right col-2 ml-auto align-middle h-100" style="color: white;" onclick="document.getElementById('BackID').click();">+</button>
          <input type="file" accept="image/*" class="form-control text-dark-file" id="BackID" style="display:none;" name="IDBack" onChange="Text1ToValue2('BackID', 'IDBa');checkFile('BackID', 'BLBL', 'IDBa')" title="upload new image">
        </div>

        <!-- Disclaimer -->
        <div class="form-outline row mb-md-2 mb-1 mt-2 col-12 mx-0 align-items-center text-center">
          <div class="row m-0 mx-auto align-items-center justify-content-center text-center">
            <div class="form-check">
              <input class="form-check-input" type="checkbox" value="Agreed" name="Disclaimer" id="DisclaimerCheck" required>
              <label class="form-check-label" for="DisclaimerCheck">
                I have read and agreed with the <a href="#" data-toggle="modal" data-target="#Disclaimer">E-Recruit Disclaimer</a>.
              </label>
            </div>
          </div>
        </div>

        <!-- Submit button -->
        <div class="form-outline mb-2 mt-3 col-12 d-flex justify-content-center align-content-center">
          <button type="button" id="Check" class="btn btn-primary btn-block mb-2 col-4" onClick="checkFiles('Submit', 'FrontID', 'BackID', 'FLBL', 'BLBL')">Register</button>
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
      <small> © Copyright E-Rectuit Team FCAI-HU - 2024</small>
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

  <script src="JS/core.min.js"></script>

</body>

</html>