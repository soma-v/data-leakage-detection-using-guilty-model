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
//header("	:login.php"); // Redirect to login.php page
//}
//else //Continue to current page
	header('Content-Type: text/html; charset=utf-8');
	include 'config.php';
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
	<title>Data Lekage Detaction</title>
	<meta charset="utf-8" />

	<link rel="stylesheet" href="style.css" type="text/css" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

</head>

<body class="body">
	<?php
	if (!empty($_POST)) {
		$con = mysqli_connect("localhost", "root", "");
		if (!$con)
			echo ('Could not connect: ' . mysqli_error($con));
		else {

			if (file_exists("download/" . $_FILES["file"]["name"])) {
				echo '<script language="javascript">alert(" Sorry!! Filename Already Exists...")</script>';
			} else {
				move_uploaded_file(
					$_FILES["file"]["tmp_name"],
					"download/" . $_FILES["file"]["name"]
				);

				$date = date('Y-m-d H:i:s');
				mysqli_select_db($con, "dataleakage");
				$sql = "INSERT INTO presentation(subject,topic,fname,time) VALUES ('" . $_POST["sub"] . "','" . $_POST["pre"] . "','" .
					$_FILES["file"]["name"] . "','$date');";
				if (!mysqli_query($con, $sql))
					echo ('Error : ' . mysqli_error($con));
				else
					echo '<script language="javascript">alert("Thank You!! File Uploded")</script>';
			}
		}
		mysqli_close($con);
	}
	?>

	</head>

	<body>
		<header class="mainHeader">
			<img src="img/logo.gif">
			<nav>
				<ul>
					<li><a href="admin.php">Home</a></li>
					<li class="active"><a href="upload.php">Upload New File</a></li>
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
						<h2><a href="#" rel="bookmark" title="Permalink to this POST TITLE">Upload a New File</a></h2>
						<br>
					</header>



					<content>
						<p>



						<form id="form3" enctype="multipart/form-data" method="post" action="upload.php">
							<table width="552" height="200" style="border-radius: 10px; box-shadow: 0 0 2px 2px #888;
				font-family:'Comic Sans MS';font-size: 14px;">



								<tr>
									<td> <label for="sub">File Name: </label> </td>
									<td> <input type="text" name="sub" id="sub" /> </td>
								</tr>
								<tr>
									<td valign="top" align="left">Key:</td>
									<td valign="top" align="left"><input type="text" name="pre" cols="50" rows="10"
											id="pre"></textarea></td>
								</tr>
								<tr>
									<td><label for="file">File:</label></td>
									<td><input type="file" name="file" id="file" /></td>
								</tr>
								<tr>
									<td colspan="2" align="center"><input type="submit" name="upload" id="upload"
											value="Upload File" /></td>
								</tr>
							</table>
						</form>

			</div>
			<aside class="top-sidebar" style="margin-top:90px">
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