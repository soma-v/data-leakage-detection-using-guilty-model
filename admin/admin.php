<!DOCTYPE html>
<html lang="en">

<head>
	<title>Data Lekage Detaction</title>
	<meta charset="utf-8" />

	<link rel="stylesheet" href="style.css" type="text/css" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

</head>
<?php
session_start(); //Start the session

if (!isset($_SESSION['name'])) {
	echo "Please Login";
	//$_SESSION['error'] = "Please Login First";
	echo "<script type=\"text/javascript\">" . " alert('Please Login'); " . "</script>";
	echo header("Location: http://localhost/data_leakage_detection/adminlogin.php");
}
// if (!$_SESSION['name']){
// }
else {

	define('ADMIN', $_SESSION['name']); //Get the user name from the previously registered super global variable
	//if(!session_is_registered("admin")){ //If session not registered
//header("location:login.php"); // Redirect to login.php page
//}
//else //Continue to current page
	header('Content-Type: text/html; charset=utf-8');
	//include'includes/conn.php';
}

?>

<body class="body">

	<header class="mainHeader">
		<img src="img/logo.gif">
		<nav>
			<ul>
				<li class="active"><a href="admin.php">Home</a></li>
				<li><a href="upload.php">Upload New File</a></li>
				<li><a href="view_file.php">View Files</a></li>
				<li><a href="leakfile.php">Guilty Agents</a></li>
				<li><a href="sendkey.php">Send Key to Agent</a></li>
				<li><a href="m_user.php">Manage Agents</a></li>
				<li><a href="sendmsg.php">Send Message</a></li>



			</ul>
		</nav>
	</header>

	<div class="mainContent1">
		<div class="content">
			<article class="topcontent1">
				<header>
					<h2><a href="#" rel="bookmark" title="Permalink to this POST TITLE">Admin Menu</a></h2>
				</header>
			</article>

		</div>


		<aside class="top-sidebar">
			<article>
				<h2>Welcome:
					<?php echo $_SESSION['name'] /*Echo the username */?>
					<li><a href="logout.php">Logout</a></li>

				</h2>
				<p>
					<?php {
						$row = "";
						$con = mysqli_connect("localhost", "root", "");
						if (!$con)
							echo ('Could not connect: ' . mysqli_error($con));
						else {
							mysqli_select_db($con, "dataleakage");
							$sql = 'SELECT * FROM register';
							$retval = mysqli_query($con, $sql);
							if (!$retval) {
								die('Could not get data: ' . mysqli_error($con));
							}
							while ($row = mysqli_fetch_assoc($retval)) {
								echo " UserName: {$row['username']} " .

									"<hr><br>";
							}
						}
						mysqli_close($con);
					}
					?>
				</p>
			</article>
		</aside>

	</div>


	</div>



</body>

</html>