<?php
$isAuth = false;
require_once(__DIR__ . '/../../controllers/SignUp Employer Controller.php');




?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Employer - Step two</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  <link rel="stylesheet" href="CSS/SignupStyle.css">
  <link rel="icon" href="<?php echo BASE_URL; ?>assets/images/Logo Shape.svg">

  <link rel="stylesheet" href="CSS/LoaderStyle.css">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="JS/SignupJS.js"></script>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;700;1000&display=swap" rel="stylesheet">



  <!--
<script>
function setmaxdate(){
    var maxBirthdayDate = new Date();
    maxBirthdayDate.setFullYear( maxBirthdayDate.getFullYear() - 18,11,31);
    console.log("Max = "+maxBirthdayDate.getFullYear());
    $('.datepicker').pickadate({
    format: 'dd/mm/yyyy',
    selectMonths: true,
    selectYears: 18,
    max: true
    });
}
</script>
-->


</head>

<body style="height: 100vh; width: 100vw;" class="row align-items-center justify-content-center m-0">


  <div class="container d-flex align-self-center justify-content-center align-items-center" style="max-width: 100vw;">
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" id="SignupForm" method="post" class="mt-4" enctype="multipart/form-data">

      <div class="row align-items-center justify-content-center mb-md-4">
        <div class="col-12 mb-md-0 mb-4 text-center">
          <img src="<?php echo BASE_URL; ?>assets/images/Logo.svg" alt="" style="max-height: 20vh; max-width: 90vw;">
        </div>
      </div>

      <div class="row col-md-8 col-12 mx-auto">


        <!-- Title Name input -->
        <div class="form-outline mb-md-2 mb-1 col-12 col-md-6 mx-auto" id="TitleSection">
          <label class="form-label" for="Title">Your title</label>
          <input type="text" id="Title" name="Title" placeholder="eg. General Manager, HR Manager" oninput="validate('Title');" class="form-control text-dark" value="<?php echo isset($_POST["Title"]) ? $_POST["Title"] : ''; ?>" />
          <div class="text-danger">
            <?php echo ($_SESSION['Title_err']); ?>
          </div>
        </div>

        <!-- Company Name input -->
        <div class="form-outline mb-md-2 mb-1 col-12 col-md-6 mx-auto" id="CompanySection">
          <label class="form-label" for="CompanyName">Company Name</label>
          <input type="text" id="CompanyName" name="CompanyName" placeholder="Company Name" oninput="validate('CompanyName');" class="form-control text-dark" value="<?php echo isset($_POST["CompanyName"]) ? $_POST["CompanyName"] : ''; ?>" />
          <div class="text-danger">
            <?php echo ($_SESSION['CompanyName_err']); ?>
          </div>
        </div>

        <!-- Field input -->
        <div class="form-outline mb-md-2 mb-1 col-12 col-md-6 mx-auto" id="CompanySection">
          <label class="form-label" for="Field">Company field</label>
          <select type="text" id="Field" name="Field" oninput="validate('Field');" class="form-control text-dark" value="<?php echo isset($_POST["Field"]) ? $_POST["Field"] : ''; ?>">
            <option value="">Select a company field</option>
            <option value="Company">Company</option>
            <option value="Bazzar">Bazzar</option>

          </select>
          <div class="text-danger">
            <?php echo ($_SESSION['Field_err']); ?>
          </div>
        </div>

        <!-- Size input -->
        <div class="form-outline mb-md-2 mb-1 col-12 col-md-6 mx-auto" id="CompanySection">
          <label class="form-label" for="Size">Company size</label>
          <select type="text" id="Size" name="Size" oninput="validate('Size');" class="form-control text-dark" value="<?php echo isset($_POST["Size"]) ? $_POST["Size"] : ''; ?>">
            <option value="">Select your company Size</option>
            <option value="11-50">11-50</option>
            <option value="51-100">51-100</option>
            <option value="101-500">101-500</option>
            <option value="501-1000">501-1000</option>
            <option value="More than 1000">More than 1000</option>

          </select>
          <div class="text-danger">
            <?php echo ($_SESSION['Size_err']); ?>
          </div>
        </div>

        <!-- Disclaimer -->
        <div class="form-outline row mb-md-2 mb-1 mt-2 col-12 mx-0 align-items-center text-center">
          <div class="row m-0 mx-auto align-items-center justify-content-center text-center">
            <div class="form-check">
              <input class="form-check-input" type="checkbox" value="Agreed" name="Disclaimer" id="DisclaimerCheck" required>
              <label class="form-check-label text-left" for="DisclaimerCheck">
                I have read and agreed with the <a href="#" data-toggle="modal" data-target="#Disclaimer">E-Recruit Disclaimer</a>.
              </label>
            </div>
          </div>
        </div>

        <!-- Disclaimer -->
        <div class="form-outline row mb-md-2 mb-1 mt-2 col-12 mx-0 align-items-center text-center">
          <div class="row m-0 mx-auto align-items-center justify-content-center text-center">
            <div class="form-check">
              <input class="form-check-input" type="checkbox" value="Agreed" name="Disclaimer" id="DisclaimerCheck" required>
              <label class="form-check-label text-left" for="DisclaimerCheck">
                I confirm that I am an employee of the company and I am authorized to use E-Recruit services on its behalf.
              </label>
            </div>
          </div>
        </div>

        <!-- Submit button -->
        <div class="form-outline mb-2 mt-3 col-12 d-flex justify-content-center align-content-center">
          <button type="button" id="Check" class="btn btn-primary btn-block mb-2 col-4" onClick="">Register</button>
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