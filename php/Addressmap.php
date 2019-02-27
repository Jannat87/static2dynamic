<!--------------------------------------------------------------------------->
<!--------------------------------------------------------------------------->
<!--------------------------------------------------------------------------->
<section class="row">

	<div class="col-md-7" style="padding-top:30px; ">
<!---->
<div class="jumbotron">
  <h1><?php if(isset($data_site)){ echo $data_site['site_name']; } ?></h1>
  <p><?php if(isset($data_site)){ echo $data_site['address']; } ?></p>
  <p><a class="btn btn-primary btn-lg" target="_blank" href="<?php if(isset($data_site)){ echo $data_site['link_address']; } ?>" role="button">Get Direction</a></p>
</div>
<div class="row" style="margin-top:100px; ">
<?php if(isset($data_site)){ echo $data_site['map']; } ?>
</div>
<!---->	
	</div>