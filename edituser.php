<?php session_start(); ?>

<?php
if(!isset($_SESSION['valid'])) {
	header('Location: login.php');
}
?>
<head>
	<title>Wijzig</title>
	<link rel="stylesheet" type="text/css" href="css/modal.css">
	<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</head>

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
        <li><a id="myBtn">Wijzig <span class="sr-only"></span></a></li>
        <li><a href="logout.php">Loguit <span class="sr-only"></span></a></li> 
        <li><a href="administrator.php"> Administrator <span class="srs-only"></span></a></li> 
      </ul>
        </li>
      </ul>
    </div>
  </div>
</nav>
<?php
// including the database connection file
include_once("connection.php");

if(isset($_POST['update']))
{	
	$id = $_POST['id'];
	
	$name = $_POST['name'];
	$username = $_POST['username'];
	$email = $_POST['email'];	
	$password = $_POST['password'];	
	// checking empty fields
	if(empty($name) || empty($username) || empty($email) || empty($username)) {
				
		if(empty($name)) {
			echo "<font color='red'>Naam veld is leeg</font><br/>";
		}
		
		if(empty($username)) {
			echo "<font color='red'>Gebruikersnaam veld is leeg</font><br/>";
		}
		
		if(empty($email)) {
			echo "<font color='red'>Email veld is leeg</font><br/>";
		}		
	} else {	
		//updating the table
		$result = mysqli_query($mysqli, "UPDATE login SET name='$name', email='$email', password='$password', username='$username' WHERE id=$id");
		
		//redirectig to the display page. In our case, it is view.php
		header("Location: edituser.php?id=$id");
	}
}
?>
<?php
//getting id from url
$id = $_GET['id'];

//selecting data associated with this particular id
$result = mysqli_query($mysqli, "SELECT * FROM login WHERE id=$id");

while($res = mysqli_fetch_array($result))
{
	$name = $res['name'];
	$email = $res['email'];
	$password = $res['password'];
	$username = $res['username'];
}
?>
<html>
<head>	
	<title>Edit Data</title>
</head>

<body>

	
	


</head>
<body>


<!-- The Modal -->
<div id="myModal" class="modal">

  <!-- Modal content -->
  <div class="modal-content">
    <span class="close">&times;</span>
 <form name="form1" method="post" action="edituser.php">
		<table border="0">
			<tr> 
				<td>Naam</td>
				<td><input type="text" name="name" value="<?php echo $name;?>" class="form-control"></td>
			</tr>
			<tr> 
				<td>Email</td>
				<td><input type="text" name="email" value="<?php echo $email;?>" class="form-control"></td>
			</tr>
			<tr> 
				<td>Gebruikersnaam</td>
				<td><input type="text" name="username" value="<?php echo $username;?>" class="form-control"></td>
			</tr>
			<tr> 
				<td>Wachtwoord</td>
				<td><input type="text" name="password" value="" class="form-control"></td>
			</tr>
			<tr>
				<td><input type="hidden" name="id" value=<?php echo $_GET['id'];?>></td>
				<td><input type="submit" name="update" value="Update" class="btn btn-primary"></td>
			</tr>
		</table>
	</form>
  </div>

</div>

<script type="text/javascript" src="js/modal.js"></script>



<div class="panel panel-default">
  <div class="panel-body">
   <?php ob_start(); ?>
<p>Naam : <?php echo $name;?></p>
<p>Email : <?php echo $email;?></p>
<p>Gebruikersnaam :<?php echo $username;?></p>
  </div>
</div>



</body>
</html>




