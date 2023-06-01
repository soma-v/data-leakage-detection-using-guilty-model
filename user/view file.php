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
				<li><a href="./user.php">Home</a></li>
				<li><a href="viewmsg.php">View Messages</a></li>
				<li class="active"><a href="view file.php">View Files</a></li>
				<li><a href="viewkey.php">View Keys</a></li>


			</ul>
		</nav>
	</header>

	<div class="mainContent1">
		<div class="content">
			<article class="topcontent1">


				<content>
					<p>
					<table align="center" cellpadding="15" cellspacing="2" style="width:100%">
						<tr bgcolor=" green">
							<td>ARTICLE NAME</td>
							<td>DATE</td>
							<td>FILE NAME</td>
							<td>DOWNLOAD</td>
							<td>ASK FOR KEY</td>
						</tr>
						<?php {
							$row = "";
							$con = mysqli_connect("localhost", "root", "");
							if (!$con)
								echo ('Could not connect: ' . mysqli_error($con));
							else {
								mysqli_select_db($con, "dataleakage");
								$sql = 'SELECT * FROM presentation';
								$sql1 = 'SELECT * FROM askkey';

								$retval = mysqli_query($con, $sql);
								$retval1 = mysqli_query($con, $sql1);
								if (!$retval) {
									die('Could not get data: ' . mysqli_error($con));
								}
								while ($row = mysqli_fetch_assoc($retval)) {

									echo "<tr bgcolor='white'>
									<td> {$row['subject']} </td> " .

										"<td> {$row['time']} </td> " .
										"<td> {$row['fname']} </td> " .

										"<td><a href='detail.php?id=" . "{$row['subject']}'>Download {$row['subject']}</a>" .
										// if()
										// {
										// 	"<td>pending</a> " .
										// }
						


										// else{
										"<td><a href='key.php?id=" . "{$row['subject']}'?f=" . "{$row['fname']}'>Click to ask</a> " .
										// }
										"</td>";
								}
							}
							mysqli_close($con);
						}
						?>





						</tr>

					</table>

					</p>
				</content>

			</article>

		</div>
		<aside class=" top-sidebar" style="margin-top:15px">
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