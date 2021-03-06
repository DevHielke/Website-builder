<?php
// =================================================================
// @Author: Hielke Annema
// @Description: Administrator page, only admins have acces. 
// @Date: 29-9-2017
// =================================================================


// including the database connection file
include_once("connection.php");
include_once("header.php");
$result = mysqli_query($mysqli, "SELECT * FROM login");

?>

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
        <li><a id="myBtn">Nieuw <span class="sr-only"></span></a></li>
        <li><a href="logout.php">Loguit <span class="sr-only"></span></a></li> 
       <li><a href="administrator.php"> Administrator <span class="srs-only"></span></a></li> 
       
</nav>
<table class="table table-hover">
		<tr>
			<td>Naam</td>
			<td>Email</td>
			<td>Gebruikersnaam</td>
			<td>Acties</td>
		</tr>
		<?php
    // Generate the user table filled with all users
while ($res = mysqli_fetch_array($result)) {
    echo "<tr>";
    echo "<td>" . $res['name'] . "</td>";
    echo "<td>" . $res['email'] . "</td>";
    echo "<td>" . $res['username'] . "</td>";
    echo "<td><a href=\"edituser.php?id=$res[id]\">Wijzig</a> | <a href=\"deleteuser.php?id=$res[id]\" onClick=\"return confirm('Are you sure you want to delete?')\">Verwijder</a></td>";
}
?>
	</table>	
	

<?php
// Make sure no one can get on this page through the link
  if(isset($_SESSION['valid'])) {     
    include("connection.php");          
  }
   else {
    header("Location:login.php");
    echo "You must be logged in to view this page.<br/><br/>";
  }
  ?>


<?php
// Create a user

if (isset($_POST['submit'])) {
    $name  = $_POST['name'];
    $email = $_POST['email'];
    $user  = $_POST['username'];
    $pass  = $_POST['password'];
    // Check if all fields are filled in
    if ($user == "" || $pass == "" || $name == "" || $email == "") {
        echo "Vul alle velden in.";
    } else {
      // If all fields are filled in, insert the data into the database
        mysqli_query($mysqli, "INSERT INTO login(name, email, username, password) VALUES('$name', '$email', '$user', md5('$pass'))") or die("Could not execute the insert query.");
        // Then redirect to the same page to refresh it and thus see the new added user
        header('Location: administrator.php');
    }
} else {
?>

<div id="myModal" class="modal">
  <!-- Modal content -->
  <div class="modal-content">
    <span class="close">&times;</span>
 <form action="administrator.php" method="post" name="form1">
				<p><input type="text" name="name" placeholder="Naam" class="form-control"></p> 
				<p><input type="text" name="email" placeholder="Email" class="form-control"></p> 
				<p><input type="text" name="username" placeholder="Gebruikersnaam" class="form-control"></p>
				<p><input type="password" name="password" placeholder="Wachtwoord" class="form-control"></p>
				<p><input type="submit" name="submit" value="Verstuur" class="btn btn-primary"></p>
	</form>
	  </div>
</div>
<script type="text/javascript" src="js/modal.js"></script>
<?php
}
?>










