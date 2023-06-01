<?php
// Start a session for error reporting
session_start();

// Call our connection file
require("includes/conn.php");


//}


// Get our POSTed variables
$fname = $_POST['a1'];
$lname = $_POST['a2'];
$image = $_POST['a3'];
$password = $_POST['a5'];

$con = mysqli_connect("localhost", "root", "");
mysqli_select_db($con, "dataleakage");

$fname = mysqli_real_escape_string($con, $fname);
$lname = mysqli_real_escape_string($con, $lname);


// NOTE: This is where a lot of people make mistakes.
// We are *not* putting the image into the database; we are putting a reference to the file's location on the server
$sql = "insert into register ( username, userid, password, emailid, block) values ('$fname', '$lname','$image', '$password', 'no')";
$result = mysqli_query($con, $sql) or die("Could not insert data into DB: " . mysqli_error($con));
header("Location:userlogin.php?msg");
exit;

?>