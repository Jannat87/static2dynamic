<!------------------------------------------------------------------------->
<!----START Slider ------------------------------------------------------->
<!------------------------------------------------------------------------->
<section class="row" style="border-top:10px solid transparent;">
	<div class="col-md-7 row">
<!-------->
<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
  <!-- Indicators -->
  <ol class="carousel-indicators">
<?php 
  $qry_slider_icon = "SELECT * FROM tb_slider";
  $result_slider_icon = $DB->select($qry_slider_icon);
  if($result_slider_icon){
    $i = 0; 
    while($data_slider_icon = $result_slider_icon->fetch_array()){
?>
    <li data-target="#carousel-example-generic" data-slide-to="<?php if($data_slider_icon['status']==1){ echo $i; }else{ echo $i+1; } ?>" class="active"></li>
<?php  
  $i++;      
    }
  } 
?>
  </ol>

  <!-- Wrapper for slides -->
  <div class="carousel-inner" role="listbox">

<?php 
  $qry_slider_img = "SELECT * FROM tb_slider";
  $result_slider_img = $DB->select($qry_slider_img);
  if($result_slider_img){
    $i = 0; 
    while($data_slider_img = $result_slider_img->fetch_array()){
?>
    <div class="item <?php if($data_slider_img['status']==1){ echo 'active'; } ?>">
      <img src="img/<?php echo $data_slider_img['image_url']; ?>" style="width:100%; height:250px;" alt="<?php echo $data_slider_img['image_url']; ?>">
    </div>
<?php  
  $i++;      
    }
  } 
?>   

	
  </div>

  <!-- Controls -->
  <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
<!-------->
	</div>
	
	
	<div class="col-md-5 row" style="">
<!------->
<div class="jumbotron">
  <h3><?php if(isset($data_site)){ echo $data_site['welcome_head']; } ?></h3>
  <p style="font-size:12px; "><?php if(isset($data_site)){ echo $data_site['welcome_body']; } ?></p>
  <p><a class="btn btn-primary" href="#" role="button">Learn more</a></p>
</div>
<!------->
	</div>
</section>
<!------------------------------------------------------------------------->
<!-----end Slider---------------------------------------------------------->
<!------------------------------------------------------------------------->
