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
}
if (!$_SESSION['name']) {
	echo header("Location: http://localhost/data_leakage_detection/adminlogin.php");
} else {

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
				<li class="active"><a href="./user.php">Home</a></li>
				<li><a href="viewmsg.php">View Messages</a></li>
				<li><a href="view file.php">View Files</a></li>
				<li><a href="viewkey.php">View Keys</a></li>


			</ul>
		</nav>
	</header>

	<div class="mainContent1">
		<div class="content">
			<article class="topcontent1">
				<header>
					<h2><a href="#" rel="bookmark" title="Permalink to this POST TITLE">User Menu</a></h2>
				</header>

				<!-- <footer>
					<p class="post-info">This user manu was one time password. </p>
				</footer>

				<content>
					<p>

					<h1>User Menu</h1>


					</p>
				</content> -->

			</article>

		</div>
		<aside class="top-sidebar">
			<article>
				<h2>Welcome:
					<?php echo $_SESSION['name'] /*Echo the username */?>
				</h2>
				<li><a href="logout.php">Logout</a></li>
				<p></p>
			</article>
		</aside>
	</div>


	</div>


</body>

</html>