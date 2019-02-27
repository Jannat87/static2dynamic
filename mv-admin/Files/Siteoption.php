<?php /*UPDATE site*/
	if(isset($_POST['site'])){
		$site_name = $_POST['site_name']; 
		if(empty($site_name)){
			header('Location:?page=Siteoption'); 
		}else{
			$site_update_qry = "UPDATE tb_site SET site_name='$site_name' WHERE id=1";
			$site_update_result = $DB->update($site_update_qry); 
			if($site_update_result){
				header('Location:?page=Siteoption'); 
			}
		}
	}
?>

<?php /*UPDATE welcome*/
	if(isset($_POST['welcome'])){
		$welcome_head = $_POST['welcome_head']; 
		$welcome_body = $_POST['welcome_body'];
		if(empty($welcome_head) OR empty($welcome_body)){
			header('Location:?page=Siteoption'); 
		}else{
			$welcome_head_update_qry = "UPDATE tb_site SET 
				welcome_head = '$welcome_head', 
				welcome_body = '$welcome_body'
				WHERE id=1";

			$welcome_head_update_result = $DB->update($welcome_head_update_qry); 
			if($welcome_head_update_result){ 
				header('Location:?page=Siteoption'); 
			}
		}
	}
?>

<?php /*UPDATE Copyright*/
	if(isset($_POST['update_copyright'])){
		$copyright = $_POST['copyright']; 
		if(empty($copyright)){
			header('Location:?page=Siteoption'); 
		}else{
			$copyright_update_qry = "UPDATE tb_site SET copyright='$copyright' WHERE id=1";
			$copyright_update_result = $DB->update($copyright_update_qry); 
			if($copyright_update_result){ 
				header('Location:?page=Siteoption'); 
			}
		}
	}
?>

<?php /*UPDATE ADDRESS AND LINK ADDRES WITH MAP*/
	if(isset($_POST['update_address'])){
		$link_address = $_POST['link_address']; 
		$address = $_POST['address'];
		$map = $_POST['map'];

		if(empty($link_address) OR empty($address) OR empty($map)){
			header('Location:?page=Siteoption'); 
		}else{
			$welcome_head_update_qry = "UPDATE tb_site SET 
				link_address = '$link_address', 
				address = '$address',
				map = '$map'
				WHERE id=1";

			$welcome_head_update_result = $DB->update($welcome_head_update_qry); 
			if($welcome_head_update_result){ 
				header('Location:?page=Siteoption'); 
			}
		}
	}
?>

<?php /*site option data fetch module*/
	$siteoption_qry = "SELECT * FROM tb_site WHERE id=1";
	$siteoption_result = $DB->select($siteoption_qry); 
	if($siteoption_result){
		$siteoption_data = $siteoption_result->fetch_assoc(); 
	}
?>
<!----------------------------------------------->	
<div class="" style="min-height:400px;  ">	
	<div class="col-md-4">

<form action="" method="post">
  <div class="form-group">
    <label for="exampleInputEmail1">Site Name</label>
    <input name="site_name" type="text" class="form-control" id="exampleInputEmail1"
    value="<?php echo $siteoption_data['site_name']; ?>">
  </div>
  <button name="site" type="submit" class="btn btn-warning">update</button> 
</form>  

<form action="" method="post">
	 <div class="form-group clearfix">
	   <label for="exampleInputEmail1">Welcome Head</label>
	   <input name="welcome_head" type="text" class="form-control" id="exampleInputEmail1"  value="<?php echo $siteoption_data['welcome_head']; ?>">
	  </div>
	  <div class="form-group clearfix">
	    <label for="exampleInputEmail1">Welcome Body</label>
	    <textarea name="welcome_body" class="form-control" rows="2"><?php echo $siteoption_data['welcome_body']; ?></textarea>
	  </div>
	  <button name="welcome" type="submit" class="btn btn-info">Update</button>
</form>


	<form action="" method="post">
	  <div class="form-group clearfix">
	    <label for="exampleInputEmail1">Copyright</label>
	    <input name="copyright" type="text" class="form-control" id="exampleInputEmail1" value="<?php echo $siteoption_data['copyright']; ?>">
	  </div>
	  <button name="update_copyright" type="submit" class="btn btn-info">Update</button>

	</form>
<!------------------------------------>
	</div>	
	<div class="col-md-8">
<!-------------------------------->

	<form action="" method="post">
	  <div class="form-group clearfix">
	    <label for="exampleInputEmail1">Link Address</label>
	    <input name="link_address" type="text" class="form-control" value="<?php echo $siteoption_data['link_address']; ?>">
	  </div>
	  <div class="form-group clearfix">
	    <label for="exampleInputEmail1">Map Link</label>
	    <textarea name="map" class="form-control" rows="6"><?php echo $siteoption_data['map']; ?></textarea>
	  </div>
	  <div class="form-group clearfix">
	    <label for="exampleInputEmail1">Company Address</label>
	    <textarea name="address" class="form-control" rows="3"><?php echo $siteoption_data['address']; ?></textarea>
	  </div>
	  <button name="update_address" type="submit" class="btn btn-warning">Update</button>
	</form>

<!-------------------------------->
	</div>
	
</div>
<!----------------------------------------------->
