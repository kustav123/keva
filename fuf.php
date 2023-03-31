<?php
// initialize the database connection
require_once('config.php');

$id = 10;

function fetchMembers($link, $id, &$left, &$right) {
    // select the left and right member IDs where sponsor_id = $id
    $sql = "SELECT left_member_id, right_member_id FROM user WHERE id = $id"; 
    $result = mysqli_query($link, $sql);

    // store the left and right member IDs in arrays and variables
    $left = array();
    $right = array();
    $cl = array();

    $row = mysqli_fetch_assoc($result);
    $left[]  = $row['left_member_id'];
    $right[] = $row['right_member_id'];

    // loop through the left members
    $a = $left; 
    while (!empty($a)) {
        $id_list = implode(',', $a);

        $sql = "SELECT left_member_id FROM user WHERE id IN ($id_list)";  
        $sqlr = "SELECT right_member_id FROM user WHERE id IN ($id_list)"; 
        $result = mysqli_query($link, $sql);
        $resultr = mysqli_query($link, $sqlr);

        $cl = array_merge($a, $cl); 
        $a = array(); 

        while ($row = mysqli_fetch_assoc($result)) {
            if ($row['left_member_id'] != 0) {
                $left[] = $row['left_member_id'];
            }
        }

        while ($row = mysqli_fetch_assoc($resultr)) {
            if ($row['right_member_id'] != 0) {
                $left[] = $row['right_member_id'];
            }
        }

        foreach ($left as $value) {   
            if (!in_array($value, $cl)) {   
                $a[] = $value; 
            }
        }
    }

    // loop through the right members
    $a = $right;
    while (!empty($a)) {
        $id_list = implode(',', $a);

        $sql = "SELECT left_member_id FROM user WHERE id IN ($id_list)";
        $sqlr = "SELECT right_member_id FROM user WHERE id IN ($id_list)";
        $result = mysqli_query($link, $sql);
        $resultr = mysqli_query($link, $sqlr);

        $cl = array_merge($a, $cl);
        $a = array();

        while ($row = mysqli_fetch_assoc($result)) {
            if ($row['left_member_id'] != 0) {
                $right[] = $row['left_member_id'];
            }
        }

        while ($row = mysqli_fetch_assoc($resultr)) {
            if ($row['right_member_id'] != 0) {
                $right[] = $row['right_member_id'];
            }
        }

        foreach ($right as $value) {
            if (!in_array($value, $cl)) {
                $a[] = $value;
            }
        }
    }
}

// call the function to fetch the members
$left = array();
$right = array();
fetchMembers($link, $id, $left, $right);

// display the left and right arrays
echo "Left array: ";
echo implode(", ", $left);

echo "Right array: ";
echo implode(", ", $right);
?>
