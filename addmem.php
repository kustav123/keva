<!DOCTYPE html>
<html lang="en">

<head>
    <?php
require_once("navbar.php");
require_once("config.php");

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

    <!-- <div id="layoutSidenav_content"> -->
    <main id="main" class="main">

    <div class="pagetitle">
      <h1>Add New Member</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item">User Manegment</li>
          <li class="breadcrumb-item active">Add New Member</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

        <section class="section">

                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-8">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Registration Form</h5>

                                    <!-- Registration Form -->
                                    <form class="row g-3" form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                                    <input type="hidden" name="sname" class="form-control" id="sname" >
                                    <input type="hidden" name="skevaid" class="form-control" id="skevaid" >


                                        <div class="row mb-3">
                                            <div class="col-md-6">
                                                <div class="form-floating">
                                                    <input type="text" class="form-control" id="kevaID" name="kevaID"
                                                        placeholder="Keva ID" maxlength="10" onchange="checkKevaID()">
                                                    <label for="kevaID">Keva ID</label>
                                                </div>
                                                <div id="kevaID-error" class="text-danger"></div> 

                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-floating">
                                                    <input type="text" class="form-control" id="fullName" name="fullName"
                                                        placeholder="Full Name" maxlength="30" >
                                                    <label for="fullName">Full Name</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col-md-6">
                                                <div class="form-floating">
                                                    <input type="text" class="form-control" id="username" name="username"
                                                        placeholder="Username" maxlength="20" onchange="checkUsername()">
                                                    <label for="username">Username</label> 
                                                </div>
                                                <div id="username-error" class="text-danger"></div> 
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-floating">
                                                    <input type="tel" class="form-control" id="mobileNumber" name="mobileNumber"
                                                        placeholder="Mobile Number" maxlength="10">
                                                    <label for="mobileNumber">Mobile Number</label>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <div class="col-md-6">
                                                <div class="form-floating">
                                                <select class="form-select" id="sponsorDropdown" name="sponsorDropdown" aria-label="Sponsor" onchange="updatePlacementDropdown()">
                                                    <option selected disabled>Select Sponsor</option>
                                                    <?php
                                                    // Make the database query
                                                    $query = "SELECT cid, kevaid, name FROM usermain WHERE left_member_id = '' OR right_member_id = ''";
                                                    $result = mysqli_query($link, $query);

                                                    // Loop through the query result and generate option tags for each sponsor
                                                    while ($row = mysqli_fetch_assoc($result)) {
                                                        $cid = $row['cid'];
                                                        $name = $row['name'];
                                                        echo "<option value=\"$cid\">$name</option>";
                                                    }
                                                    ?>
                                                </select>
                                                <label for="sponsorDropdown">Sponsor</label>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-floating">
                                                <select class="form-select" id="placement" name ="placement"aria-label="Placement">
                                                    <option selected disabled>Hand Side</option>
                                                </select>
                                                <label for="placement">Placement</label>
                                                </div>
                                            </div>
                                            </div>

                                        <div class="row mb-3">
                                            <div class="col-md-6">
                                                <div class="form-floating">
                                                    <input type="password" class="form-control" id="password" name="password"
                                                        placeholder="Password">
                                                    <label for="password">Password</label>
                                                </div>
                                            </div>
                                            <div class="col-md-6">

                                        <div class="form-floating">
                                                <input type="file" class="form-control" id="photo" name="photo" accept="image/*">
                                                <label for="photo">Upload Photo</label>
                                            </div>
                                        </div>
                                        </div>

                                        <div class="text-center">
                                            <button type="submit" class="btn btn-primary">Submit</button>
                                            <button type="reset" class="btn btn-secondary">Reset</button>
                                        </div>
                                        <div class="col-md-6">
          
                                    </form><!-- End Registration Form -->

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

        </section>
    </main>

    <!-- End #main -->


    <div style="position:fixed;bottom:0;width:100%;">
      <?php 
require_once ("footer.php");
?>
</div>
<script>
  function updatePlacementDropdown() {
    // Get the selected sponsor CID
    var sponsorSelect = document.getElementById("sponsorDropdown");
    var sponsorCID = sponsorSelect.options[sponsorSelect.selectedIndex].value;

    // Make the database query
    var query = "SELECT kevaid,name,left_member_id, right_member_id FROM usermain WHERE cid = " + sponsorCID;
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function() {
      if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
        // Parse the query result and update the placement dropdown options
        var result = JSON.parse(xhr.responseText);
        var leftMemberID = result.left_member_id;
        var rightMemberID = result.right_member_id;
        var placementSelect = document.getElementById("placement");
        placementSelect.options.length = 0; // Clear existing options
        if (leftMemberID === "") {
          placementSelect.options.add(new Option("Left", "left"));
        }
        if (rightMemberID === "") {
          placementSelect.options.add(new Option("Right", "right"));
        }
      document.getElementById("sname").value = result.name;
      document.getElementById("skevaid").value = result.kevaid;
      }
    };
    xhr.open("GET", "ajax/query.php?q=" + encodeURIComponent(query));
    xhr.send();
  }
  </script>
  
  <script>
  function checkUsername() {
    // Get the username input value
    var username = document.getElementById("username").value;

    // Make the database query
    var query = "SELECT COUNT(*) AS count FROM usermain WHERE username = '" + username + "'";
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function() {
      if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
        // Parse the query result and show an error message if the username already exists
        var result = JSON.parse(xhr.responseText);
        var count = result.count;
        if (count > 0) {
          document.getElementById("username-error").innerHTML = "This username is already taken.";
        } else {
          document.getElementById("username-error").innerHTML = "";
        }
      }
    };
    xhr.open("GET", "ajax/query.php?q=" + encodeURIComponent(query));
    xhr.send();
  }
</script>
<script>
  function checkKevaID() {
    // Get the kevaID input value
    var kevaID = document.getElementById("kevaID").value;

    // Make the database query
    var query = "SELECT COUNT(*) AS count FROM usermain WHERE kevaid = '" + kevaID + "'";
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function() {
      if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
        // Parse the query result and show an error message if the kevaID already exists
        var result = JSON.parse(xhr.responseText);
        var count = result.count;
        if (count > 0) {
          document.getElementById("kevaID-error").innerHTML = "This Keva ID is already Added.";
        } else {
          document.getElementById("kevaID-error").innerHTML = "";
        }
      }
    };
    xhr.open("GET", "ajax/query.php?q=" + encodeURIComponent(query));
    xhr.send();
  }
</script>


</body>

</html>