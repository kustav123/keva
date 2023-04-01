<!DOCTYPE html>
<html lang="en">

<head>
    <?php
require_once("navbar.php");
require_once("config.php");
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
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
<?php
require_once("config.php");
if ($_SERVER["REQUEST_METHOD"] == "POST") {

// Validate kevaID
if (empty($_POST["kevaID"])) {
    $kevaIDError = "Please enter your Keva ID.";
} else {
    $kevaID = test_input($_POST["kevaID"]);
    // Check that kevaID is a valid format (e.g. only letters and numbers)
    if (!preg_match("/^[a-zA-Z0-9]*$/",$kevaID)) {
        $kevaIDError = "Keva ID can only contain letters and numbers.";
    }
}

// Validate fullName
if (empty($_POST["fullName"])) {
    $fullNameError = "Please enter your full name.";
} else {
    $fullName = test_input($_POST["fullName"]);
    // Check that fullName only contains letters and spaces
    if (!preg_match("/^[a-zA-Z ]*$/",$fullName)) {
        $fullNameError = "Name can only contain letters and spaces.";
    }
}

// Validate username
if (empty($_POST["username"])) {
    $usernameError = "Please enter a username.";
} else {
    $username = test_input($_POST["username"]);
    // Check that username is a valid format (e.g. only letters and numbers)
    if (!preg_match("/^[a-zA-Z0-9]*$/",$username)) {
        $usernameError = "Username can only contain letters and numbers.";
    }
}

// Validate mobileNumber
if (empty($_POST["mobileNumber"])) {
    $mobileNumberError = "Please enter your mobile number.";
} else {
    $mobileNumber = test_input($_POST["mobileNumber"]);
    // Check that mobileNumber is a valid format (e.g. 10 digits)
    if (!preg_match("/^[0-9]{10}$/",$mobileNumber)) {
        $mobileNumberError = "Mobile number must be 10 digits.";
    }
}

// Validate sponsorDropdown
if (empty($_POST["sponsorDropdown"])) {
    $sponsorDropdownError = "Please select a sponsor.";
} else {
    $sponsorDropdown = test_input($_POST["sponsorDropdown"]);
    $placement = test_input($_POST["placement"]);
}



// Validate password
if (empty($_POST["password"])) {
    $passwordError = "Please enter a password.";
} else {
    $password = test_input($_POST["password"]);
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    $sname  = test_input($_POST["sname"]);
    $skevaid = test_input($_POST["skevaid"]);
    

}

if ($_FILES["photo"]) {
    $photo = $_FILES["photo"];
    $photo_name = $photo['name'];
    $photo_ext = pathinfo($photo_name, PATHINFO_EXTENSION);
    $new_photo_name = $kevaID . '.' . $photo_ext;
    $photo_path = "/keva/photo/" . $new_photo_name;
    move_uploaded_file($photo["tmp_name"], $_SERVER['DOCUMENT_ROOT'] . $photo_path);
    $photo = $new_photo_name; // Set $photo to the new filename
}


}

// Helper function to sanitize input data
function test_input($data) {
$data = trim($data);
$data = stripslashes($data);
$data = htmlspecialchars($data);
return $data;
}

if (empty($kevaIDError) && empty($fullNameError) && empty($usernameError) && empty($mobileNumberError) && empty($sponsorDropdownError) && empty($passwordError)) {
  
    // Insert new record into usermain table
    $sql = "INSERT INTO usermain (kevaid, pic, name, username, mob, spn_id,spn_id_kevaid,spn_id_name, password) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = mysqli_prepare($link, $sql);
    mysqli_stmt_bind_param($stmt, "sssssssss", $kevaID, $photo, $fullName, $username, $mobileNumber, $sponsorDropdown, $skevaid, $sname, $hashed_password);
    mysqli_stmt_execute($stmt);
    
    // Check if the record was successfully inserted
    if (mysqli_affected_rows($link) == 1) {
        $ncid = mysqli_insert_id($link);
        if ($placement == "left") {
            $sql2 = "update usermain set left_member_keva_id = ? , left_member_id = ? where cid = ? ";
        }else {
            $sql2 = "update usermain set right_member_keva_id = ? , right_member_id = ? where cid = ? ";
        }
        $stmt2 = mysqli_prepare($link, $sql2);
        mysqli_stmt_bind_param($stmt2, "sss" , $kevaID , $ncid , $sponsorDropdown);
        mysqli_stmt_execute($stmt2);
    } else {
      echo "Error inserting record: " . mysqli_error($link);
    }
    
  }
  

?>
<body>

    <!-- <div id="layoutSidenav_content"> -->
    <main id="main" class="main">

    <div class="pagetitle">
      <h1>Add New Member</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php">Home</a></li>
          <li class="breadcrumb-item">User Manegment</li>
          <li class="breadcrumb-item active">Add New Member</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

        <section class="section">

                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-8">
                            <div class="card mb-5">
                                <div class="card-body">
                                    <h5 class="card-title">Registration Form</h5>

                                    <!-- Registration Form -->
                                    <form class="row g-3" form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post"  enctype="multipart/form-data">
                                    <input type="hidden" name="sname" class="form-control" id="sname" >
                                    <input type="hidden" name="skevaid" class="form-control" id="skevaid" >


                                        <div class="row mb-3">
                                            <div class="col-md-6">
                                                <div class="form-floating">
                                                    <input type="text" class="form-control" id="kevaID" name="kevaID"
                                                        placeholder="Keva ID" maxlength="10" onchange="checkKevaID()">
                                                    <label for="kevaID">Keva ID</label>
                                                </div>
                                                <div id="kevaID-error" class="text-danger"><?php echo isset($kevaIDError) ? $kevaIDError : ""; ?></div> 

                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-floating">
                                                    <input type="text" class="form-control" id="fullName" name="fullName"
                                                        placeholder="Full Name" maxlength="30" >
                                                    <label for="fullName">Full Name</label>
                                                </div>
                                                <div id="fullName-error" class="text-danger"><?php echo isset($fullNameError) ? $fullNameError : ""; ?></div> 
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col-md-6">
                                                <div class="form-floating">
                                                    <input type="text" class="form-control" id="username" name="username"
                                                        placeholder="Username" maxlength="20" onchange="checkUsername()">
                                                    <label for="username">Username</label> 
                                                </div>
                                                <div id="username-error" class="text-danger"> <?php echo isset($usernameError) ? $usernameError : ""; ?> </div> 
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-floating">
                                                    <input type="tel" class="form-control" id="mobileNumber" name="mobileNumber"
                                                        placeholder="Mobile Number" maxlength="10">
                                                    <label for="mobileNumber">Mobile Number</label>
                                                </div>
                                                <div id="mobileNumber-error" class="text-danger"> <?php echo isset($mobileNumberError) ? $mobileNumberError : ""; ?> </div> 

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
                                                <div id="sponsorDropdown-error" class="text-danger"> <?php echo isset($sponsorDropdownError) ? $sponsorDropdownError : ""; ?> </div> 

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
                                                <div id="password-error" class="text-danger"> <?php echo isset($passwordError) ? $passwordError : ""; ?> </div> 

                                            </div>
                                            <div class="col-md-6">

                                        <div class="form-floating">
                                                <input type="file" class="form-control" id="photo" name="photo" accept="image/jpeg">
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