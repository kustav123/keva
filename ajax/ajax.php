<?php
  include_once("../config.php");

  if (isset($_GET["checkUsername"])) {
    $username = $_GET["checkUsername"];
    $query = "SELECT COUNT(*) AS count FROM usermain WHERE username = '$username'";
    $result = mysqli_query($link, $query);
    $row = mysqli_fetch_assoc($result);
    if ($row["count"] > 0) {
      echo "exists";
    } else {
      echo "not_exists";
    }
  }

  if (isset($_GET["checkKevaID"])) {
    $kevaID = $_GET["checkKevaID"];
    $query = "SELECT COUNT(*) AS count FROM usermain WHERE kevaid = '$kevaID'";
    $result = mysqli_query($link, $query);
    $row = mysqli_fetch_assoc($result);
    if ($row["count"] > 0) {
      echo "exists";
    } else {
      echo "not_exists";
    }
  }
?>
