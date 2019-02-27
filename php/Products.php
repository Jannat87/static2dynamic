
<div class="col-md-9" style=" padding-top:30px; ">
<!---->

<?php 

  if(isset($_GET['cat'])){ 
  
    $catid = $_GET['cat']; 
    $qry_product = "SELECT * FROM tb_product WHERE product_category='$catid'"; 

  }else{
    $qry_product = "SELECT * FROM tb_product LIMIT 10"; 
  }

  
  $result_product = $DB->select($qry_product); 
  if($result_product){
    while($data_product = $result_product->fetch_array()){
?>
  <div class="col-sm-6 col-md-3">
    <div class="thumbnail" style="border:0px; box-shadow:0PX; ">
      <img src="images/products/<?php echo $data_product['product_image']; ?>" alt="<?php echo $data_product['product_name']; ?>" style="width:100%; height:150px; ">
      <div class="caption" style="background:#002060; color:white; "><?php echo $data_product['product_name']; ?> <Br/><span style="font-size:12px; color:red; " ><?php echo $data_product['product_price']; ?></span></div>
    </div>
  </div>
<?php 
    }
  }else{
    echo '<hr/><h1 class="text-info text-center">No Product Available</h1></hr/>';
  }
?>

  <div class="col-sm-6 col-md-6">
    <img src="adds/<?php if(isset($data_adds)){ echo $data_adds['post']; } ?>" style="width:100%; height:170px;" alt="">
  </div>


<!---->	
	</div>
</section>
<!--------------------------------------------------------------------------->
<!--------------------------------------------------------------------------->
<!--------------------------------------------------------------------------->