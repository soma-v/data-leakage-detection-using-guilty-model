<?php
// Start a session for error reporting
session_start();





$con = mysqli_connect("localhost", "root", "");
mysqli_select_db($con, "dataleakage");
if (!$con)
    echo ('Could not connect: ' . mysqli_error($con));
else {
    $fname = $_GET['fn'];
    $status = $_GET['status'];
    $user = $_GET['name'];


    if (strcmp($status, "block")) {
        $temp = "blocked";
    }


    $sql = "UPDATE leaker SET blockStatus='$temp' WHERE name = '$user' and fname = '$fname'";
    $sql2 = "UPDATE register SET block='yes' WHERE userid = '$user'";

    // if (strcmp($status, "unblock"))
    //     $sql = "UPDATE leaker SET blockStatus='block' WHERE name = '$user' and fname = '$fname'";

    if (mysqli_query($con, $sql)) {
        echo "Record was updated successfully.";
    } else {
        echo "ERROR: Could not able to execute $sql. "
            . mysqli_error($con);
    }


    if (mysqli_query($con, $sql2)) {
        echo "Record was updated successfully.";
    } else {
        echo "ERROR: Could not able to execute $sql. "
            . mysqli_error($con);
    }

    mysqli_close($con);
    header("Location: admin.php?msg=$status");

    exit;
}
?>