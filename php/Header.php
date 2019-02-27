<?php
  include 'mvc-FRAMEWORK/Configuration/config.php';
  include 'mvc-FRAMEWORK/Library/Database.php';
  $DB = new Database();
?>
<?php /*Theme front end module */
  $qry_theme = "SELECT * FROM tb_theme WHERE id=1"; 
  $result_theme = $DB->select($qry_theme); 
  if($result_theme){
    $data_theme = $result_theme->fetch_assoc(); 
  }
?>

<?php /*site info module */
  $qry_site = "SELECT * FROM tb_site WHERE id=1"; 
  $result_site = $DB->select($qry_site); 
  if($result_site){
    $data_site = $result_site->fetch_assoc(); 
  }
?>
<?php /*ADDS module */
  $qry_adds = "SELECT * FROM tb_add WHERE id=1"; 
  $result_adds = $DB->select($qry_adds); 
  if($result_adds){
    $data_adds = $result_adds->fetch_assoc(); 
  }
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title><?php if(isset($data_site)){ echo $data_site['site_name']; } ?> &mdash; <?php echo $pg; ?></title>

    <!-- Bootstrap & css -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
  </head>
  <body>
	<div class="container">
<!------------------------------------------------------------------------->
<!----START HEADER ---------------------------------------------------->
<!------------------------------------------------------------------------->
<div class="row">
<nav class="navbar navbar-default" style="background: <?php if(isset($data_theme)){ echo $data_theme['color']; } ?>; ">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="" style="color:white; "><?php if(isset($data_site)){ echo $data_site['site_name']; } ?></a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
	
    <ul class="nav navbar-nav navbar-right">
      <li class="<?php if($pg=='Home'){ echo 'active'; } ?>">
  			<a href="?page=Home">
  				<span class="glyphicon glyphicon-home" aria-hidden="true"></span> Home
  			</a>
		  </li>
      <li class="<?php if($pg=='Product'){ echo 'active'; } ?>">
    			<a href="?page=Product">
    				<span class="glyphicon glyphicon-th" aria-hidden="true"></span> Products
    			</a>
  		</li>
      <li class="<?php if($pg=='Contact'){ echo 'active'; } ?>">
  			<a href="?page=Contact">
  				<span class="glyphicon glyphicon-phone" aria-hidden="true"></span> Contact Us
  			</a>
		  </li>
    </ul>
	  
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
</div>
<!------------------------------------------------------------------------->
<!-----end HEADER------------------------------------------------------>
<!------------------------------------------------------------------------->