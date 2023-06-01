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
	echo header("Location: http://localhost/data lekage detaction/adminlogin.php");
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
				<li><a href="leakfile.php">Guilty Agents</a></li>
				<li class="active"><a href="sendkey.php">Send Key to Agent</a></li>
				<li><a href="m_user.php">Manage Agents</a></li>
				<li><a href="sendmsg.php">Send Message</a></li>


			</ul>
		</nav>
	</header>

	<div class="mainContent1">
		<div class="content">
			<article class="topcontent1">



				<content>
					<p>

					<h2><a href="#" rel="bookmark" title="Permalink to this POST TITLE">UserRequest:</a></h2>

					<table align="center" cellpadding="9" cellspacing="2" width="10" style="width:100%">
						<tr bgcolor="green">
							<td>id</td>
							<td>UserName</td>
							<td>Filename</td>
						</tr>

						<?PHP

						$con = mysqli_connect("localhost", "root", "");
						if (!$con)
							echo ('Could not connect: ' . mysql_error());
						else {
							mysqli_select_db($con, "dataleakage");



							$qry = "Select * FROM askkey where reciver='admin' and status='no'";
							$result = mysqli_query($con, $qry);
							while ($w1 = mysqli_fetch_array($result)) {
								echo '			<tr bgcolor="white">
	
	<td>' . $w1["id"] . '    </td><td>     ' . $w1["user"] . '	
					</td><td>' . $w1["filename"] . '

	</td>
</tr>


	
	';

							}
						}

						?>



						</p>

					</table>

					<article class="topcontent2">



						<p>
							<br><br>
						<h2><a href="#" rel="bookmark" title="Permalink to this POST TITLE">View File And Key:</a></h2>

						<table align="center" cellpadding="9" cellspacing="1" width="10" style="width:100%">
							<tr bgcolor="green">
								<td>FileName</td>
								<td>key</td>
							</tr>

							<?PHP

							$con = mysqli_connect("localhost", "root", "");
							if (!$con)
								echo ('Could not connect: ' . mysqli_error());
							else {
								mysqli_select_db($con, "dataleakage");



								$qry = "Select * FROM presentation";
								$result = mysqli_query($con, $qry);
								while ($w1 = mysqli_fetch_array($result)) {
									echo '			<tr bgcolor="white">
	
	<td>' . $w1["subject"] . '    </td><td>     ' . $w1["Topic"] . '	
					</td>
</tr>


	
	';

								}
							}

							?>


							</p>

						</table>

				</content>

			</article>

		</div>
		<aside class="top-sidebar" style="margin-top:60px">
			<article>
				<h2>Welcome:
					<?php echo $_SESSION['name'] /*Echo the username */?>
				</h2>
				<li><a href="logout.php">Logout</a></li>

				<p>
				<h5>Send Key:</h5></br>
				<form name="s" action="sendkeytouser.php" method="POST" onsubmit="return valid()">
					<table bgcolor="brown" align="center" cellpadding="" cellspacing="" width="">
						<tr>
							<td colspan="2" align="center">
								<font size="2"><b>
									</b></font>
							</td>
						</tr>
						<tr>
							<td><strong>Send to:</strong></td>
							<td>&nbsp;&nbsp;&nbsp;&nbsp; <input type="text" name="a1" id="a1" class="b"></td>
						</tr>
						<tr>
							<td><strong>
									FileName:</strong></td>
							<td>&nbsp;&nbsp;&nbsp;&nbsp; <input type="text" name="a3" id="a3" class="b"></td>
						</tr>
						<tr>
							<td><strong>Key:</strong></td>
							<td>&nbsp;&nbsp;&nbsp;&nbsp; <input type="text" name="a2" id="a2" class="b">
							</td>
						</tr>
						<td></td>
						<td><input type="submit" name="s" value="Send" class="b1">
							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							<input type="reset" name="r" value="clear" class="b1">
						</td>
						</tr>
					</table>
				</form>




				</p>
			</article>
		</aside>
	</div>





	</div>


	</div>
</body>

</html>