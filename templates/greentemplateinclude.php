<?php
// =================================================================
// @Author: Hielke Annema
// @Description: This is the green template
// @Date: 5-10-2017
// =================================================================
 ob_start(); ?>
  <div class="container">
    <div class="page-header">
  <h1 style="color: <?php echo $template; ?> "><?php echo $name;?></h1>
</div>
 <div class="thumbnail">
<img src="<?php echo $url;?>"> </div>
  </div><center>
   <?php echo $content; ?></center>
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
    <div class="page-header"> <h1 style="color:green">');
fwrite($myfile, $name);
fwrite($myfile, '</h1>
</div> </div> </div>');
fwrite($myfile, ' <div class="thumbnail">
<img src="');
fwrite($myfile, $url);
fwrite($myfile, '"> </div>
<p><?php echo $template;?></p>');
fwrite($myfile, $content);
fclose($myfile);

  ?>


<form method="get" action="<?php echo $linksite ?>">
   <button class="class btn-primary" type="submit"> Preview </button>
</form>

 <a href="<?php echo $linksite ?>" download> Download </a>