<?php
// =================================================================
// @Author: Hielke Annema
// @Description: This is the blue template
// @Date: 5-10-2017
// =================================================================
ob_start(); ?>
  <div class="container">
  	<div class="page-header">
<div class="row">
  <div class="col-xs-6 col-md-6">
  	 <h1 style="color: <?php echo $template; ?> "><?php echo $name;?></h1>
    <a href="#" class="thumbnail">
      <img src="<?php echo $url;?>">
    </a>
  </div>
</div>
</div>
 <?php echo $content; ?>
</div>

<?php 
// The file path where it is getting saved. They are all unique due their ID
$linksite = ("sites/$id.html");

$myfile = fopen("sites/$id.html", "w") or die("Unable to open file!");
fwrite($myfile, '<head>
	<title>Wijzig</title>
	<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</head>');
fwrite($myfile, '
  <div class="container">
  	<div class="page-header"> <div class="row">
  <div class="col-xs-6 col-md-6">
  	 <h1 style="color:');
fwrite($myfile, $template);
fwrite($myfile, '">');
fwrite($myfile, $name);
fwrite($myfile, '</h1>
    <a href="#" class="thumbnail">
      <img src="');
fwrite($myfile, $content);
fwrite($myfile, ' <div class="thumbnail">
<img src="');
fwrite($myfile, $url);
fwrite($myfile, '"> </a>
  </div>
</div>
</div>');
fwrite($myfile, $content);
fwrite($myfile, ' </div>');
fclose($myfile);
?>


<form method="get" action="<?php echo $linksite ?>">
   <button class="class btn-primary" type="submit"> Preview </button>
</form>

 <a href="<?php echo $linksite ?>" download> Download </a>

