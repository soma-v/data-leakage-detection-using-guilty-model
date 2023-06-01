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
				<li><a href="admin.php">Home</a></li>
				<li><a href="upload.php">Upload New File</a></li>
				<li><a href="view_file.php">View Files</a></li>
				<li class="active"><a href="leakfile.php">Guilty Agents</a></li>
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
					<h2><a href="#" rel="bookmark" title="Permalink to this POST TITLE">Guilty Agents</a></h2>
				</header>

				<br>
				<content>
					<p>

					<table align="center" cellpadding="9" cellspacing="2" width="10" style="width:100%">
						<tr bgcolor="green">
							<td>Guilty Agent</td>
							<td>Date</td>
							<td>File Leaked</td>
							<td>Block/Unbloxk</td>
						</tr>

						<?PHP

						$con = mysqli_connect("localhost", "root", "");
						if (!$con)
							echo ('Could not connect: ' . mysqli_error($con));
						else {
							mysqli_select_db($con, "dataleakage");



							$qry = "Select * FROM leaker";
							$result = mysqli_query($con, $qry);
							while ($w1 = mysqli_fetch_array($result)) {
								echo '<tr bgcolor="white">
	
	
	<td>' . $w1["name"] . '</td>
	<td>' . $w1["time"] . '</td>
	<td>' . $w1["fname"] . ' </td>	
	<td> <a href="block.php?status=' . $w1["blockStatus"] . ' &fn=' . $w1["fname"] . ' &name=' . $w1["name"] . ' ">' . $w1["blockStatus"] . ' </a></td>
	</tr>
	';

							}
						}

						?>





						</p>
				</content>

				</table>
			</article>



		</div>
		<aside class="top-sidebar" style="margin-top:95px">
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