<?php
// =================================================================
// @Author: Hielke Annema
// @Description: The login page
// @Date: 29-9-2017
// =================================================================
include_once("header.php");
?>
<html>
<body>
	<?php
	include("connection.php");

	if(isset($_POST['submit'])) {
		$user = mysqli_real_escape_string($mysqli, $_POST['username']);
		$pass = mysqli_real_escape_string($mysqli, $_POST['password']);
		// Check if fields are empty
		if($user == "" || $pass == "") {
			echo "Gebruikersnaam of wachtwoord is ongeldig.";
			echo "<br/>";
			echo "<a href='login.php'>Ga terug</a>";
		} else {
			// Check if filled in credentials match up with a user in the database
			$result = mysqli_query($mysqli, "SELECT * FROM login WHERE username='$user' AND password=md5('$pass')")
			or die("Could not execute the select query.");
			
			$row = mysqli_fetch_assoc($result);
			
			if(is_array($row) && !empty($row)) {
				$validuser = $row['username'];
				$_SESSION['valid'] = $validuser;
				$_SESSION['name'] = $row['name'];
				$_SESSION['id'] = $row['id'];
			} else {
				echo "Ongeldig wachtwoord of gebruikersnaam.";
				echo "<br/>";
				echo "<a href='login.php'>Ga terug</a>";
			}
			// If above is all correct user gets redirected to /index
			if(isset($_SESSION['valid'])) {
				header('Location: index.php');			
			}
		}
	} else {
		?>
		<br><br>
		<center>
<div id="header" class="panel panel-default" style="width:40%;">
		<form name="form1" method="post" class="form-group" action="">
				<p><font size="+2">Login</font></p>
					<input class="form-control" type="text" name="username" placeholder="Klantnummer">
					<br>
					<input class="form-control" type="password" name="password" placeholder="Wachtwoord"><br>
					<button type="submit" name="submit" value="Submit" class="btn btn-primary">Login</button> 
			</form></center>
	</div>
		<?php
	}
	?>
</body>
</html>
