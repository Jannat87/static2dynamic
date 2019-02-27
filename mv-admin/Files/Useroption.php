<?php /*NEW USER INSERT MODULE*/
	if(isset($_POST['user'])){
		$firstname = $_POST['firstname'];
		$lastname = $_POST['lastname'];
		$username = $_POST['username']; 
		$email = $_POST['email'];
		$phone = $_POST['phone'];
		$address = $_POST['address']; 
		$password = $_POST['password'];
		$confirm_password = $_POST['confirm_password'];
		$type = $_POST['type'];

		if($password=$confirm_password){
			if(empty($email) OR empty($password) OR empty($type)){
				$msg = '<span style="color:red;">Email Or Password Invalid !</span>';
				header('Location:?page=Useroption&msg='.$msg); 
			}else{
				$password = md5($password); 
				$user_save_qry = "INSERT INTO tb_user (firstname,lastname,phone,address,username,email,password,type)VALUES('$firstname','$lastname','$phone','$address','$username','$email','$password','$type')"; 
				$user_save_result = $DB->insert($user_save_qry); 
				if($user_save_result){
					$msg = '<span style="color:green;">User Created !</span>';
					header('Location:?page=Useroption&msg='.$msg); 					
				}
			}
		}else{
			$msg = '<span style="color:red;">Password Not Matched !</span>';
			header('Location:?page=Useroption&msg='.$msg); 
		}
	}
?>

<?php /*TYPE UPDATE MODULE*/
	if(isset($_GET['type'])){
		$admin_id = $_GET['id']; 
		$admin_type = $_GET['type']; 
		$user_qry = "UPDATE tb_user SET type='$admin_type' WHERE id='$admin_id'";
		$user_result = $DB->update($user_qry); 
		if($user_result){
			header('Location:?page=Useroption'); 
		}
	}
?>
<?php /*DELETE MODULE FOR MENU OPTION CUSTOMIZATION*/
	if(isset($_GET['delid'])){
		$delid = $_GET['delid']; 
		if(isset($delid)){
			$del_qry = "DELETE FROM tb_user WHERE id='$delid'"; 
			$res_del = $DB->delete($del_qry); 
			if($res_del){
				header('Location:?page=Useroption'); 
			}
		}
	}
?>
<!----------------------------------------------->	
<div class="" style="min-height:400px;  ">	
	<div class="col-md-4">
<!------------------------------------>
<?php 
	if(isset($update_fetch_data)){
?>
<form action="" method="post">
	<input name="update_id" type="hidden" value="<?php echo $update_fetch_data['id']; ?>">
  <div class="form-group">
    <label for="exampleInputEmail1">Menu Title</label>
    <input name="menu_title" type="text" class="form-control" id="exampleInputEmail1" value="<?php echo $update_fetch_data['menu_title']; ?>">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Menu Name</label>
    <input name="menu_name" type="text" class="form-control" id="exampleInputEmail1" value="<?php echo $update_fetch_data['menu_name']; ?>">
  </div>
  <button name="update_menu" type="submit" class="btn btn-warning">Update Menu</button>
  <?php if(isset($_GET['msg'])){ echo $_GET['msg']; } ?>
</form>
<?php 
	}else{
?>
<form action="?page=Useroption" method="post">
  <div class="form-group">
    <label for="exampleInputEmail1">First Name</label>
    <input name="firstname" type="text" class="form-control" id="exampleInputEmail1" placeholder="First Name !">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Last Name</label>
    <input name="lastname" type="text" class="form-control" id="exampleInputEmail1" placeholder="Last Name !">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Username</label>
    <input name="username" type="text" class="form-control" id="exampleInputEmail1" placeholder="Username !">
  </div> 
  <div class="form-group">
    <label for="exampleInputEmail1">Email</label>
    <input name="email" type="email" class="form-control" id="exampleInputEmail1" placeholder="Email !">
  </div> 
  <div class="form-group">
    <label for="exampleInputEmail1">Phone</label>
    <input name="phone" type="text" class="form-control" id="exampleInputEmail1" placeholder="Phone !">
  </div> 
  <div class="form-group">
    <label for="exampleInputEmail1">Address</label>
    <textarea name="address" class="form-control" rows="3" placeholder="Address "></textarea>
  </div> 
  <div class="form-group">
    <label for="exampleInputEmail1">Password</label>
    <input name="password" type="password" class="form-control" id="exampleInputEmail1" placeholder="Password !">
  </div> 
  <div class="form-group">
    <label for="exampleInputEmail1">Confirm Password</label>
    <input name="confirm_password" type="password" class="form-control" id="exampleInputEmail1" placeholder="Confirm Password !">
  </div> 
  <div class="form-group">
    <label for="exampleInputEmail1">Type</label>
    <select class="form-control" name="type">
    	<option value="">Select Type !</option>
    	<option value="manager">Manager</option>
    	<option value="editor">Editor</option>
    	<option value="production">Production</option>
    </select>
  </div> 

  <button name="user" type="submit" class="btn btn-primary">Add User</button>
  <?php if(isset($_GET['msg'])){ echo $_GET['msg']; } ?>
</form>


<?php 
	}
?>


<!------------------------------------>
	</div>	
	<div class="col-md-8">
<!-------------------------------->
<table class="table table-bordered table-striped">

<?php 
	$user_load_qry = "SELECT * FROM tb_user";
	$user_result = $DB->select($user_load_qry); 
	if($user_result){
?>

	<tr>
		<th>SL</th>
		<th>Username</th>
		<th>Email</th>
		<th style="width:35%;">Type</th>		
		<th style="width:18%;">Action</th>
	</tr>
<?PHP 
	
		$i=0; 
		while($user = $user_result->fetch_array()){	
			$i++; 
		if($user['type'] != 'admin'){

?>
	<tr>
		<td><?php echo $i; ?></td>
		<td><?php echo $user['username']; ?></td>
		<td><?php echo $user['email']; ?></td>
		<td>
<?php 
	$type = $user['type']; 
	if($type=='admin'){
?>

			<a href="?page=Useroption&id=<?php echo $user['id']; ?>&type=manager" class="btn btn-default btn-xs">Manager</a>
			<a href="?page=Useroption&id=<?php echo $user['id']; ?>&type=editor" class="btn btn-default btn-xs">Editor</a>
			<a href="?page=Useroption&id=<?php echo $user['id']; ?>&type=production" class="btn btn-default btn-xs">Production</a>
<?php 
	}elseif($type=='manager'){
?>
			<a href="?page=Useroption&id=<?php echo $user['id']; ?>&type=manager" class="btn btn-primary btn-xs">Manager</a>
			<a href="?page=Useroption&id=<?php echo $user['id']; ?>&type=editor" class="btn btn-default btn-xs">Editor</a>
			<a href="?page=Useroption&id=<?php echo $user['id']; ?>&type=production" class="btn btn-default btn-xs">Production</a>
<?php 
	}elseif($type=='editor'){
?>
			<a href="?page=Useroption&id=<?php echo $user['id']; ?>&type=manager" class="btn btn-default btn-xs">Manager</a>
			<a href="?page=Useroption&id=<?php echo $user['id']; ?>&type=editor" class="btn btn-primary btn-xs">Editor</a>
			<a href="?page=Useroption&id=<?php echo $user['id']; ?>&type=production" class="btn btn-default btn-xs">Production</a>
<?php 
	}elseif($type=='production'){
?>
			<a href="?page=Useroption&id=<?php echo $user['id']; ?>&type=manager" class="btn btn-default btn-xs">Manager</a>
			<a href="?page=Useroption&id=<?php echo $user['id']; ?>&type=editor" class="btn btn-default btn-xs">Editor</a>
			<a href="?page=Useroption&id=<?php echo $user['id']; ?>&type=production" class="btn btn-primary btn-xs">Production</a>
<?php 
	}
?>

		</td>
		<td>
			<a href="?page=Useroption&delid=<?php echo $user['id'];?>" class="btn btn-danger btn-xs">Remove</a>
		</td>
	</tr>
<!-------------------------------------------------------------->

<?php 
			}
		}
	}ELSE{
		
		ECHO '<H1>No Data Found !</h1>';
	}
?>


	
	
</table>
<!-------------------------------->
	</div>
	
</div>
<!----------------------------------------------->
