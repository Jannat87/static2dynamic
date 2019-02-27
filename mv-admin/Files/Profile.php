<?php 
	$user_id = $_SESSION['user_id'];
	$profile_qry = "SELECT * FROM tb_user WHERE id='$user_id'";
	$profile_result = $DB->select($profile_qry);
	if($profile_result){
		$profile_data = $profile_result->fetch_assoc();
	}
?>
<div class="row">
	<div class="col-md-4">
		<img src="../images/profile/<?php echo $profile_data['user_image']; ?>" class="img-responsive img-bordered" style="width: 100%; height: 300px; ">
		<br/>
		<button class="btn btn-primary">Change Images</button>
	</div>
	<div class="col-md-8">
		<h2><?php echo strtoupper($profile_data['firstname'].''.$profile_data['lastname']); ?>
			<small style="color: teal; font-weight: bold; "><br/><?php echo 
			$profile_data['type']; ?></small>
		</h2>
		<p>
			<strong>Email: </strong><?php echo $profile_data['email']; ?><br/>
			<strong>Phone: </strong><?php echo $profile_data['phone']; ?><br/>
			<strong>Address: </strong><?php echo $profile_data['address']; ?><br/>
		</p>
		<button class="btn btn-primary">Update Profile</button>
	</div>
</div>