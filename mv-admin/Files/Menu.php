<?php /*INSERT NEW DATA */
	if(isset($_POST['update_Menu_save'])){
		$id = $_POST['update_id']; 
		$menu_name = $_POST['menu_name']; 
		$menu_title = $_POST['menu_title']; 

		if(empty($menu_name) OR empty($menu_title)){
			$msg = '<span style="color:red;"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span> Field Must Not Empty !</span>';
			header('Location:index.php?page=Menu&msg='.$msg);
		}else{

			$laptop_query = "UPDATE tb_menu
				SET 
				menu_name = '$menu_name',
				menu_title   = '$menu_title'
				WHERE id='$id'
			"; 

			$result = $DB->insert($laptop_query);
			if($result){
				$menu_name=null; 
				$menu_title=null; 

				$msg = '<span style="color:teal;"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span> Successfully Updated !</span>';
				header('Location:index.php?page=Menu&msg='.$msg);
			}

		}
	}//END OF DATA INSERTING..
?>
<!--data upload-->
	
<?php
	if(isset($_GET['upid'])){
		$upid = $_GET['upid']; 
		$qry_update = "SELECT * FROM tb_menu WHERE id='$upid'";
		$update_result = $DB->insert($qry_update); 
		if($update_result){
			$update_menu = $update_result->fetch_assoc(); 
		}
	}
?>
<!--data upload-->

<!--delete data-->
	<?php 
	if(isset($_GET['delid'])){
		$delid = $_GET['delid'];

		$query_delete = "DELETE FROM tb_menu WHERE id=$delid";
		$result = $DB->delete($query_delete);
		if($result){
			$msg ='<span style="color:red;"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span> Deleted Done !</span>';
			header('Location:index.php?page=Menu&msg='.$msg);
		}
	}
	?>

<?php 
	if(isset($_POST['menu_insert'])){
		$menu_name = $_POST['menu_name']; 
		$menu_title = $_POST['menu_title']; 

		if(empty($menu_name) OR empty($menu_title)){
			$msg = '<span style="color:red;"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span> Field Must Not Empty !</span>';
			header('Location:index.php?page=Menu&msg='.$msg);
		}else{

			$mobile_query = "INSERT INTO tb_menu (menu_name,menu_title) VALUES ('$menu_name','$menu_title')";

			$result = $DB->insert($mobile_query);
			if($result){
				$menu_name=null; 
				$menu_title=null; 
				$msg = '<span style="color:green;"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span> Successfully Saved !</span>';
			header('Location:index.php?page=Menu&msg='.$msg);
			}

		}
	}
?>

<!--delete data--> 
<!----------------------------------------------->	
<div class="" style="min-height:400px;  ">	
	<div class="col-md-4">
<!------------------------------------>
<?php 
	if(isset($update_menu)){
?>
<form action="index.php?page=Menu" method="post">
	<input type="" value="<?php echo $upid; ?>" name="update_id">
  <div class="form-group">
    <label for="exampleInputEmail1">Menu Name</label>
    <input name="menu_name" type="text" class="form-control" id="exampleInputEmail1" value="<?php if(isset($update_menu)){ echo $update_menu['menu_name']; } ?>">
  </div>
    <div class="form-group">
    <label for="exampleInputEmail1">Menu title</label>
    <input name="menu_title" type="text" class="form-control" id="exampleInputEmail1" value="<?php if(isset($update_menu)){ echo $update_menu['menu_title']; } ?>">
  </div>

  <button name="update_Menu_save" type="submit" class="btn btn-warning">Update</button> 
  &nbsp; &nbsp; <?php if(isset($_GET['msg'])){ echo $_GET['msg'];} ?>
</form>
<?php 
	}else{
?>
<form action="?page=Menu" method="post">
  <div class="form-group">
    <label for="exampleInputEmail1">Menu Name</label>
    <input name="menu_name"type="text" class="form-control" id="exampleInputEmail1" placeholder="Company Name">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Menu Title</label>
    <input name="menu_title" type="text" class="form-control" id="exampleInputEmail1" placeholder="Model Name">
  </div>
  <button name="menu_insert" type="submit" class="btn btn-primary">Menu Add</button> 
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
		<th>Menu Name</th>
		<th>Menu Title</th>
		<th style="width:28%;">Action</th>
	</tr>
<?php 
	$laptop_query = "SELECT * FROM tb_menu";
	$result = $DB->select($laptop_query);
	if($result){
		$i = 0;
		while ($laptop = $result->fetch_array()){
			$i++;
			?>
			<tr>
				<td><?php echo $i;?></td>
				<td><?php echo $laptop['menu_name'];?></td>
				<td><?php echo $laptop['menu_title'];?></td>
				<td>
					<a href="" class="btn btn-info btn-sm" data-toggle="modal" data-target="#Menu_view<?php echo $laptop['id']; ?>">View</a>
					<a href="?page=Menu&upid=<?php echo $laptop['id']; ?>" class="btn btn-warning btn-sm">Update</a>
					<a href="?page=Menu&delid=<?php echo $laptop['id']; ?>" class="btn btn-danger btn-sm">Remove</a>
				</td>
	</tr>
<!-------------------------------------------------------------->
<!-- Modal -->
<div class="modal fade" id="Menu_view<?php echo $laptop['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel"></h4>
      </div>
      <div class="modal-body">
        <?php 
        	echo '<h2>Menu Name # '.$laptop['menu_name'].'</h2>';
        	echo '<h2>Menu Title # '.$laptop['menu_title'].'</h2>';
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
