<?php
require_once("../config.php");
// Make sure the request is an AJAX request


// Get the query from the AJAX request
if (!isset($_GET['q'])) {
    exit();
}
$query = urldecode($_GET['q']);

// Make the database query
$result = mysqli_query($link, $query);
$row = mysqli_fetch_assoc($result);

// Return the query result in JSON format
echo json_encode($row);
mysqli_close($link);
?>
