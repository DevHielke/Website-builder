<?php session_start(); ?>

<?php
if(!isset($_SESSION['valid'])) {
	header('Location: login.php');
}
?>

<?php
// including the database connection file
include_once("connection.php");



if(isset($_POST['Submit'])) {	
	$name = $_POST['name'];
	$url = $_POST['url'];
	$template = $_POST['template'];
	$loginId = $_SESSION['id'];
		
	// checking empty fields
	if(empty($name) || empty($url) || empty($template)) {
				
		if(empty($name)) {
			echo "<font color='red'>Naam veld is leeg.</font><br/>";
		}
		if(empty($url)) {
			echo "<font color='red'>Url veld is leeg.</font><br/>";
		}
		if(empty($template)) {
			echo "<font color='red'>Template veld is leeg.</font><br/>";
		}
		//link to the previous page
		echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";
	} else { 
		// if all the fields are filled (not empty) 
		
		//insert data to database	
		$result = mysqli_query($mysqli, "INSERT INTO websites(name, url, template, login_id) VALUES('$name','$url','$template', '$loginId')");
		
		//display success message
		echo "<font color='green'>Website toegevoegd.";
	}
}
?>

<html>
<head>	
	<title>Edit Data</title>
	<link rel="stylesheet" type="text/css" href="css/modal.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</head>

<body>
<nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="index.php">Home</a>
    </div>
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li><a href="new.php">Nieuw <span class="sr-only"></span></a></li>
        <li><a href="logout.php">Logout <span class="sr-only"></span></a></li> 
        <li> 	<button id="myBtn" >Open Modal</button></li>
      </ul>
        </li>
      </ul>
    </div>
  </div>
</nav>
<body>

<!-- The Modal -->
<div id="myModal" class="modal">
  <!-- Modal content -->
  <div class="modal-content">
    <span class="close">&times;</span>
 <form action="add.php" method="post" name="form1">
		<table width="25%" border="0">
			<tr> 
				<td>Titel</td>
				<td><input type="text" name="name"></td>
			</tr>
			<tr> 
				<td>Website</td>
				<td><input type="text" name="url"></td>
			</tr>
			<tr> 
				<td>Template</td>
				<td><input type="text" name="template"></td>
			</tr>
			<tr> 
				<td></td>
				<td><input type="submit" name="Submit" value="Add"></td>
			</tr>
		</table>
	</form>
  </div>
</div>
<script type="text/javascript" src="js/modal.js"></script>
</body>
</html>

