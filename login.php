<?php session_start(); ?>
<html>
<head>
	<title>Login</title>
<!--<link rel="stylesheet" type="text/css" href="style.css"> -->

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</head>

<body>
	
	<?php
	include("connection.php");


	if(isset($_POST['submit'])) {
		$user = mysqli_real_escape_string($mysqli, $_POST['username']);
		$pass = mysqli_real_escape_string($mysqli, $_POST['password']);

		if($user == "" || $pass == "") {
			echo "Gebruikersnaam of wachtwoord is ongeldig.";
			echo "<br/>";
			echo "<a href='login.php'>Ga terug</a>";
		} else {
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
					<!--<button type="submit" class="btn btn-primary" value="Submit">Login</button>-->
				
			
		</form></center>
</div>

		<?php
	}
	?>



</body>
</html>
