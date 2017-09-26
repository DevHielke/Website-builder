<?php
// =================================================================
// @Author: Hielke Annema
// @Description: This is the main page, lists user's sites
// @Date: 22-9-2017
// =================================================================
session_start();
?>
 
<?php
// including the database connection file
include_once("connection.php");
include_once("header.php");

if(isset($_POST['Submit'])) {	
	$name = $_POST['name'];
	$url = $_POST['url'];
	$content = $_POST['content'];
	$template = $_POST['template'];
	$loginId = $_SESSION['id'];
		
	// checking empty fields
	if(empty($name) || empty($url) || empty($template) || empty($content)) {
				
		if(empty($name)) {
			echo "<font color='red'>Naam veld is leeg.</font><br/>";
		}
		if(empty($url)) {
			echo "<font color='red'>URL veld is leeg</font><br/>";
		}
		if(empty($template)) {
			echo "<font color='red'>Template veld is leeg</font><br/>";
		}
		if(empty($content)) {
			echo "<font color='red'>Content veld is leeg</font><br/>";
		}
		//link to the previous page
		echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";
	} else { 
		// if all the fields are filled (not empty) 
		
		//insert data to database	
		$result = mysqli_query($mysqli, "INSERT INTO websites(name, url, template, content, login_id) VALUES('$name','$url','$template', '$content', '$loginId')");
		
		//display success message
		echo "<font color='green'>Toegevoegd";
	}
}
?>
<html>
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
        <li><a id="myBtn">Nieuw <span class="sr-only"></span></a></li>
        <li><a href="logout.php">Loguit <span class="sr-only"></span></a></li> 
        <li>
 <?php
  if($_SESSION["name"] == "admin") {  ?>
     <a href="administrator.php"> Administrator <span class="srs-only"> <?php
  }
else {
	echo "";
}
  ?>  
    </span> </a> </li>
</li>
      </ul>
        </li>
      </ul>
    </div>
  </div>
</nav>
	<div id="header">
	</div>
	<?php
	if(isset($_SESSION['valid'])) {			
		include("connection.php");					
		$result = mysqli_query($mysqli, "SELECT * FROM login");
		$templateresult = mysqli_query($mysqli, "SELECT * FROM templates");
		$result1 = mysqli_query($mysqli, "SELECT * FROM websites WHERE login_id=".$_SESSION['id']." ORDER BY id DESC");
		?>Welkom <?php echo $_SESSION['name'] ?>
	
	<?php	
	} else {
		header("Location:login.php");
		echo "You must be logged in to view this page.<br/><br/>";
	}
	?>

	<table class="table table-hover">
		<tr>
			<td>Titel</td>
			<td>Tekst</td>
			<td>Template</td>
			<td>Acties</td>
		</tr>
		<?php
		while($res = mysqli_fetch_array($result1)) {		
			echo "<tr>";
			echo "<td>".$res['name']."</td>";
			echo "<td>".$res['content']."</td>";
			echo "<td>".$res['template']."</td>";	
			echo "<td><a href=\"edit.php?id=$res[id]\">Wijzig</a> | <a href=\"delete.php?id=$res[id]\" onClick=\"return confirm('Are you sure you want to delete?')\">Verwijder</a></td>";		
		}
		?>
	</table>	

<!-- The Modal -->
<div id="myModal" class="modal">
  <!-- Modal content -->
  <div class="modal-content">
    <span class="close">&times;</span>
 <form action="index.php" method="post" name="form1">	
 	   <div class="form-group">
 	   	<label>Titel</label>
<input type="text" name="name" placeholder="Titel" class="form-control">
<label>URL</label>
<input type="text" name="url" placeholder="URL van de afbeelding" class="form-control">
<label>Template</label>
<select name="template" class="form-control">
<?php while($restemplate = mysqli_fetch_array($templateresult)) {	 ?>			
  <option value="<?php echo $restemplate['name']; ?>"><?php echo $restemplate['name']; ?></option>
 <?php } ?>
</select>
<label>Content</label>
<textarea name="content" cols="40" rows="5" class="form-control"></textarea>
<input type="submit" name="Submit" value="Toevoegen" class="btn btn-primary"></td>
</div>
	</form>
  </div>
</div>
<script type="text/javascript" src="js/modal.js"></script>
</body>
</html>
