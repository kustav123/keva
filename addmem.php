<!DOCTYPE html>
<html lang="en">

<head>
<?php
require_once("navbar.php");
?>
  <title>Add Member</title>

  <!-- =======================================================
  * Template Name: NiceAdmin
  * Updated: Mar 09 2023 with Bootstrap v5.2.3
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  

  <main id="main" class="main">
  <div class="card">
  <div class="card-body">
    <h5 class="card-title">Registration Form</h5>

    <!-- Registration Form -->
    <form class="row g-3">
      <div class="col-md-12">
        <div class="form-floating">
          <input type="text" class="form-control" id="kevaID" placeholder="Keva ID" maxlength="10">
          <label for="kevaID">Keva ID</label>
        </div>
      </div>
      <div class="col-md-12">
        <div class="form-floating">
          <input type="text" class="form-control" id="fullName" placeholder="Full Name" maxlength="30">
          <label for="fullName">Full Name</label>
        </div>
      </div>
      <div class="col-md-12">
        <div class="form-floating">
          <input type="text" class="form-control" id="username" placeholder="Username" maxlength="20">
          <label for="username">Username</label>
        </div>
      </div>
      <div class="col-md-12">
        <div class="form-floating">
          <input type="tel" class="form-control" id="mobileNumber" placeholder="Mobile Number" maxlength="10">
          <label for="mobileNumber">Mobile Number</label>
        </div>
      </div>
      <div class="col-md-12">
        <div class="form-floating mb-3">
          <select class="form-select" id="sponsorDropdown" aria-label="Sponsor">
            <option selected disabled>Select Sponsor</option>
            <option value="1">Sponsor 1</option>
            <option value="2">Sponsor 2</option>
            <option value="3">Sponsor 3</option>
          </select>
          <label for="sponsorDropdown">Sponsor</label>
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-check form-switch">
          <input class="form-check-input" type="radio" name="placement" id="leftPlacement" value="left">
          <label class="form-check-label" for="leftPlacement">Left</label>
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-check form-switch">
          <input class="form-check-input" type="radio" name="placement" id="rightPlacement" value="right">
          <label class="form-check-label" for="rightPlacement">Right</label>
        </div>
      </div>
      <div class="col-md-12">
        <div class="form-floating">
          <input type="password" class="form-control" id="password" placeholder="Password">
          <label for="password">Password</label>
        </div>
      </div>
      <div class="text-center">
        <button type="submit" class="btn btn-primary">Submit</button>
        <button type="reset" class="btn btn-secondary">Reset</button>
      </div>
    </form><!-- End Registration Form -->

  </div>
</div>




  </main><!-- End #main -->
<?php 
require_once ("footer.php");
?>

</body>

</html>