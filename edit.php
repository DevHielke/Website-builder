<?php
// =================================================================
// @Author: Hielke Annema
// @Description: Page to edit & preview the website
// @Date: 29-9-2017
// =================================================================

include_once("header.php");

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
        <li><a id="myBtn">Wijzig <span class="sr-only"></span></a></li>
        <li><a href="logout.php">Loguit <span class="sr-only"></span></a></li> 
            <li><a>Download <span class="sr-only"></span></a></li> 
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
	$url = $_POST['url'];
	$content = $_POST['content'];
	$template = $_POST['template'];	
  $loginid = $_POST['login_id'];
	
	// checking empty fields
	if(empty($name) || empty($url) || empty($template)) {
				
		if(empty($name)) {
			echo "<font color='red'> Veld is leeg.</font><br/>";
		}
		if(empty($url)) {
			echo "<font color='red'> Veld is leeg.</font><br/>";
		}
		if(empty($content)) {
			echo "<font color='red'> Veld is leeg.</font><br/>";
		}
		if(empty($template)) {
			echo "<font color='red'> Veld is leeg.</font><br/>";
		}		
	} else {	
		//updating the table
		$result = mysqli_query($mysqli, "UPDATE websites SET name='$name', url='$url',  content='$content', template='$template' WHERE id=$id");
	   // Redirect to the same page, so the page refreshes and the edit is shown.
		header("Location: edit.php?id=$id");
	}
}
?>
<?php
//getting id from url
$id = $_GET['id'];

//selecting data associated with this particular id
$templateresult = mysqli_query($mysqli, "SELECT * FROM templates");
$result = mysqli_query($mysqli, "SELECT * FROM websites WHERE id=$id");

while($res = mysqli_fetch_array($result))
{
	$name = $res['name'];
	$url = $res['url'];
	$template = $res['template'];
	$content = $res['content'];
  $loginid = $res['login_id'];
}
?>
<html>
<head>	
	<title>Edit Data</title>
</head>
<body>


<!-- The Modal -->
<div id="myModal" class="modal">

  <!-- Modal content -->
  <div class="modal-content">
    <span class="close">&times;</span>
<form name="form1" method="post" action="edit.php">
   <div class="form-group">
        <label>Titel</label>
<input class="form-control" type="text" name="name" value="<?php echo $name;?>">
        <label>URL</label>
       <input class="form-control" type="text" name="url" value="<?php echo $url;?>">
      </tr>
<label> Template </label><select class="form-control" name="template" >     
  <?php while($restemplate = mysqli_fetch_array($templateresult)) {  ?>     
  <option value="<?php echo $restemplate['name']; ?>"><?php echo $restemplate['name']; ?></option>
 <?php } ?>
    </select>
        <textarea class="form-control" name="content" cols="40" rows="5" value="<?php echo $content;?>"> <?php echo $content;?></textarea>
<input type="hidden" name="id" value=<?php echo $_GET['id'];?>>
<input type="submit" name="update" value="update" class="btn btn-primary">
</div>
  </form>
  </div>
</div>
<script type="text/javascript" src="js/modal.js"></script>

<?php // template blue
 if ($template == "blue") { 
include_once("templates/bluetemplateinclude.php");
 } 

 // template Green
 if ($template == "green") { 
include_once("templates/greentemplateinclude.php");
 } 

if ($template == "red") {
  include_once("templates/redtemplateinclude.php");
}

 ?>

</body>
</html>

