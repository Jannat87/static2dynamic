<?php /*INSERT NEW DATA */
	if(isset($_POST['update_product_save'])){
		$id = $_POST['update_id']; 
		$old_image = $_POST['old_image'];
		$product_name = $_POST['product_name']; 
		$product_category = $_POST['product_category']; 
		$product_details = $_POST['product_details']; 
		$product_price = $_POST['product_price']; 

		$product_image = $_FILES['product_image'] ['name'];
		$product_tmp_name = $_FILES['product_image'] ['tmp_name'];

		$location = '../images/products/';
		if(empty($product_image)){

		if(empty($product_name) OR empty($product_category) OR empty($product_details) OR empty($product_price) OR empty($old_image)){
			$msg = '<span style="color:red;"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span> Field Must Not Empty !</span>';
			header('Location:index.php?page=Product&msg='.$msg);
		
	}else{

			$laptop_query = "UPDATE tb_product
				SET 
				product_name = '$product_name',
				product_category   = '$product_category',
				product_details = '$product_details',
				product_price   = '$product_price'
				WHERE id='$id'
			"; 

			$result = $DB->insert($laptop_query);
			if($result){
				$product_category=null; 
				$product_category=null; 
				$product_details='';
				$product_price='';

				$msg = '<span style="color:teal;"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span> Successfully Updated !</span>';
				header('Location:index.php?page=Product&msg='.$msg);
			}

		}
	}else{
				move_uploaded_file($product_tmp_name, $location.$product_image); 
				unlink('../images/products/'.$old_image); 

				$mobile_query = "UPDATE tb_product
				SET 
				product_name = '$product_name',
				product_category   = '$product_category',
				product_details = '$product_details',
				product_price   = '$product_price',
				product_image = '$product_image'			
				WHERE id='$id'
			"; 
			
			$result = $DB->insert($mobile_query);
				if($result){					
					$company=null;  
					$model=null;  
					$details=''; 
					$price='';
					$msg = '<span style="color:teal;"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span> Successfully Updated !</span>';
					header('Location:index.php?page=Product&msg='.$msg);
				}
		}		
}
	//END OF DATA INSERTING..
?>
<!--data upload-->
	
<?php
	if(isset($_GET['upid'])){
		$upid = $_GET['upid']; 
		$qry_update = "SELECT * FROM tb_product WHERE id='$upid'";
		$update_result = $DB->insert($qry_update); 
		if($update_result){
			$update_product = $update_result->fetch_assoc(); 
		}
	}
?>
<!--data upload-->

<?php /*delete data from database*/
	if(isset($_GET['delid'])){
		$delid = $_GET['delid'];
		$delimg = $_GET['del_img'];  

		$qry_delete_mobile = "DELETE FROM tb_product WHERE id=$delid";
		$result = $DB->delete($qry_delete_mobile); 
		if($result){
			unlink('../images/products/'.$delimg); 
			$msg = '<span style="color:red;"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span> Deleted Done !</span>';
			header('Location:index.php?page=Product&msg='.$msg);
		}
	}
?>

<?php 
	if(isset($_POST['prouct_save'])){
		$product_name = $_POST['product_name']; 
		$product_category = $_POST['product_category']; 
		$product_details= $_POST['product_details']; 
		$product_price = $_POST['product_price'];

		$product_image = $_FILES['product_image']['name'];
		$product_tmp_name = $_FILES['product_image']['tmp_name'];

		$location = '../images/products/';

		if(empty($product_name) OR empty($product_category) OR empty($product_details) OR empty($product_price) OR empty($product_image)){
			$msg = '<span style="color:red;"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span> Field Must Not Empty !</span>';
			header('Location:index.php?page=Product&msg='.$msg);
		}else{
			move_uploaded_file($product_tmp_name, $location.$product_image);

			$mobile_query = "INSERT INTO tb_product (product_name,product_category,product_details,product_price,product_image) VALUES ('$product_name','$product_category','$product_details','$product_price','$product_image')";

			$result = $DB->insert($mobile_query);
			if($result){
				$product_name=null; 
				$product_category=null; 
				$product_details=''; 
				$product_price='';

				$msg = '<span style="color:green;"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span> Successfully Saved !</span>';
			header('Location:index.php?page=Product&msg='.$msg);
			}

		}
	}
?>

<!--delete data--> 
<!----------------------------------------------->	
<div class="" style="min-height:400px;  ">	
	<div class="col-md-4">
<!-------------------form start----------------->
<?php 
	if(isset($update_product)){
?>
<form action="index.php?page=Product" method="post" enctype="multipart/form-data">

	<input type="" value="<?php echo $upid; ?>" name="update_id">
	<input type="" value="<?php echo $update_product['product_image'];?>" name="old_image" >

  <div class="form-group">
    <label for="exampleInputEmail1">Product Name</label>
    <input name="product_name" type="text" class="form-control" id="exampleInputEmail1" value="<?php if(isset($update_product)){ echo $update_product['product_name']; } ?>">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1"> Product Category </label>
  	<select class="form-control" name="product_category"> 
  		<option value="">Select Category ! </option>
  		<?php 
  			$catid = $update_product['product_category'];
  			$cat_qry= "SELECT * FROM tb_menu";
  			$result_cat = $DB->select($cat_qry);
  			if($result_cat){
  				while($product_menu = $result_cat->fetch_array()){

  				?>
  				<option value="<?php echo $product_menu['id'];?>" <?php 
  				if($catid==$product_menu['id']){echo 'selected';}
  				?>><?php echo $product_menu['menu_title'];?></option>
  			<?php 		
  				}
  			}
  		?>
  	</select>
  </div>

  <div class="form-group">
    <label for="exampleInputEmail1">Product Details</label>
    <textarea name="product_details" class="form-control">
    	 <?php if(isset($update_product)){ echo $update_product['product_details']; } ?>
    </textarea>
  </div>

  <div class="form-group">
    <label for="exampleInputEmail1">Price</label>
    <input name="product_price" type="text" class="form-control" id="exampleInputEmail1" value="<?php if(isset($update_product)){ echo $update_product['product_price']; } ?>">
  </div>

  <div class="form-group">
    <label for="exampleInputFile">Product Image</label>
    <img src="../images/products/<?php echo $update_product['product_image'];?>"alt="" style="width:100%;height:100px;">
    <input name="product_image" type="file" id="exampleInputFile">
    <p class="help-block">Example block-level help text here.</p>
  </div>

  <button name="update_product_save" type="submit" class="btn btn-warning">Update</button> 
  &nbsp; &nbsp; <?php if(isset($_GET['msg'])){ echo $_GET['msg'];} ?>
</form>
<?php 
	}else{
?>
<form action="?page=Product" method="post" enctype="multipart/form-data">
  <div class="form-group">
    <label for="exampleInputEmail1">product name</label>
    <input name="product_name" type="text" class="form-control" id="exampleInputEmail1" placeholder="product name">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">product category</label>
    <select class="form-control" name="product_category" > 
    	<option value=""> Select category</option>
    	<?php 
	$cat_qry = "SELECT * FROM tb_menu"; 
	$res_cat = $DB->select($cat_qry); 
	if($res_cat){
		while($data_menu = $res_cat->fetch_array()){
?>
<option value="<?php echo $data_menu['id'];?>"><?php echo $data_menu['menu_title']; ?></option>
<?php 			
		}
	}

?>
    </select>
  </div>

  <div class="form-group">
    <label for="exampleInputEmail1">product details</label>
    <textarea name="product_details" class="form-control"></textarea>
  </div>

  <div class="form-group">
    <label for="exampleInputEmail1">Price</label>
    <input name="product_price" type="text" class="form-control" id="exampleInputEmail1" placeholder="Price">
  </div>

  <div class="form-group">
    <label for="exampleInputFile">Product Image</label>
    <input name="product_image" type="file" id="exampleInputFile">
    <p class="help-block">Example block-level help text here.</p>
  </div>

  <button name="prouct_save" type="submit" class="btn btn-primary">Save</button> 
  &nbsp; &nbsp;
  <?php if(isset($_GET['msg'])){echo $_GET['msg'];} ?>
</form>
<?php 
	}
?>
<!------------------------------------>
	</div>	
	<div class="col-md-8">
<!-------------------------------->
<table class="table table-bordered table-striped">
	<tr>
		<th>SL</th>
		<th>Product Name</th>
		<th>Product catgorey</th>
		<th>price</th>
		<th style="width:28%;">Action</th>
	</tr>
<?php 
	$laptop_query = "SELECT * FROM tb_product";
	$result = $DB->select($laptop_query);
	if($result){
		$i = 0;
		while ($laptop = $result->fetch_array()){
			$i++;
			?>
			<tr>
				<td><?php echo $i;?></td>
				<td><?php echo $laptop['product_name'];?></td>
				<td><?php echo $laptop['product_category'];?></td>
				<td><?php echo $laptop['product_price'];?></td>
				<td>
			<a href="" class="btn btn-info btn-sm" data-toggle="modal" data-target="#product_view<?php echo $laptop['id']; ?>">View</a>
			<a href="?page=Product&upid=<?php echo $laptop['id']; ?>" class="btn btn-warning btn-sm">Update</a>
			<a href="?page=Product&delid=<?php echo $laptop['id'];?>&del_img=<?php echo $laptop['product_image']; ?>" class="btn btn-danger btn-sm">Remove</a>
				</td>
	</tr>
<!-------------------------------------------------------------->
<!-- Modal -->
<div class="modal fade" id="product_view<?php echo $laptop['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel"><?php echo $laptop['product_name'];?></h4>
      </div>
      <div class="modal-body">
        <?php 
        	echo '<h2>Brand Name # '.$laptop['product_name'].'</h2>';
        	echo '<h2>Model # '.$laptop['product_category'].'</h2>';
        	echo '<h4>Price # '.$laptop['product_price'].'.tk</h4>';
        	echo 'Specification # '.$laptop['product_details']; 
        ?>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
		<?php	
			}
	}
?>
<!-------------------------------------------------------------->
<!-- Modal -->

<!-------------------------------------------------------------------------->
	
</table>
<!-------------------------------->
	</div>
	
</div>
<!----------------------------------------------->
