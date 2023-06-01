<?php
session_start();

$nokey = false;
$con = mysqli_connect("localhost", "root", "");
if (!$con)
    echo ('Could not connect: ' . mysqli_error($con));
else {
    mysqli_select_db($con, "dataleakage");


    $k1 = $_POST['s1'];
    $k2 = $_POST['s2'];
    $fname = $_POST['s3'];

    $id = $_GET['id'];
    $sql1 = "Select * FROM askkey WHERE filename = '$fname' and user = '$_SESSION[name]'";
    $retval1 = mysqli_query($con, $sql1);

    $row = mysqli_fetch_assoc($retval1);
    $val = $row['status'];

    if ($val == "no") {
        $nokey = true;
    }



    if ($k1 == $k2) {


        if ($nokey == true) {
            echo "call the admin";
            $date = date('Y-m-d H:i:s');
            $sql = "insert into leaker ( name,time, fname, blockStatus) values ('$_SESSION[name]',' $date ', '$fname', 'block')";
            $result = mysqli_query($con, $sql) or die("Could not insert data into DB: " . mysqli_error($con));
            header("Location: askadmin.php");
        } else {
            echo 'enter success'
                . $file = './download/' . $_GET['id'];
            $title = $_GET['id'];

            header("Pragma: public");
            header('Content-disposition: attachment; filename=' . $title);


            header('Content-Transfer-Encoding: binary');
            ob_clean();
            flush();

            $chunksize = 1 * (1024 * 1024); // how many bytes per chunk
            if (filesize($file) > $chunksize) {
                $handle = fopen($file, 'rb');
                $buffer = '';

                while (!feof($handle)) {
                    $buffer = fread($handle, $chunksize);
                    echo $buffer;
                    ob_flush();
                    flush();
                }

                fclose($handle);
            } else {
                readfile($file);
            }
            '                                     
    ';
        }


    } else {

        echo "call the admin";
        $date = date('Y-m-d H:i:s');
        $sql = "insert into leaker ( name,time, fname, blockStatus) values ('$_SESSION[name]',' $date ', '$fname', 'block')";
        $result = mysqli_query($con, $sql) or die("Could not insert data into DB: " . mysqli_error($con));
        header("Location: askadmin.php");

    }

}

?>