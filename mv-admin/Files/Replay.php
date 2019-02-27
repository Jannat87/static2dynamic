<?php 
	if(isset($_POST['replay_send'])){
		$to = $_POST['receiver']; 
		$from = $_POST['sender']; 
		$subject = $_POST['subject']; 
		$txt = $_POST['body']; 
		$header = $from;

		mail($to,$subject,$txt,$header);
		header('Location:?page=Inbox');
	}
?>
<?php 
	if(isset($_GET['read'])){
		$read_id = $_GET['read']; 
		$inbox_update_read_qry = "UPDATE tb_contact SET status=1 WHERE id='$read_id'";
		$inbox_update_read_res=$DB->update($inbox_update_read_qry); 
		if($inbox_update_read_res){
			header('Location:?page=Inbox'); 
		} 
	}
?>
<?php 
	if(isset($_GET['trash'])){
		$trash_id = $_GET['trash']; 
		$inbox_update_trash_qry = "UPDATE tb_contact SET deleted_at=1 WHERE id='$trash_id'";
		$inbox_update_trash_res=$DB->update($inbox_update_trash_qry); 
		if($inbox_update_trash_res){
			header('Location:?page=Inbox'); 
		} 
	}
?>

<?php /*all message*/
	$all_msg_qry = "SELECT * FROM tb_contact WHERE deleted_at=0"; 
	$all_msg_res = $DB->select($all_msg_qry); 
	if($all_msg_res){
		$all = mysqli_num_rows($all_msg_res); 
		
		if($all == ''){	
			$all = 0; 
		}		
	}
?>

<?php /*all trash*/
	$trs_msg_qry = "SELECT * FROM tb_contact WHERE deleted_at=1"; 
	$trs_msg_res = $DB->select($trs_msg_qry); 
	if($trs_msg_res){
		$trs = mysqli_num_rows($trs_msg_res); 
		if($trs == ''){	
			$trs = 0; 
		}
	}
?>
<div class="row">
	<div class="col-md-3">
		<button class="btn btn-primary btn-block">All Message (<?php echo $all; ?>)</button>
		<button class="btn btn-default btn-block">Sent Items (2)</button>
		<button class="btn btn-default btn-block">Spam (3)</button>
		<button class="btn btn-default btn-block">Trash (<?php echo $trs; ?>)</button>
	</div> 
	<div class="col-md-9">
		<h2>Replay</h2><hr/>
<?php 
	if(isset($_GET['rid'])){
		$rid = $_GET['rid']; 
		$replay_user = "SELECT * FROM tb_contact WHERE id='$rid'";
		$replay_user_res = $DB->select($replay_user); 
		if($replay_user_res){
			$replay_user_data = $replay_user_res->fetch_assoc(); 
		}
	}
	 
?> 

<form action="" method="post">
  <div class="form-group">
    <label for="exampleInputEmail1">Send To</label>
    <input name="receiver" type="email" class="form-control" id="exampleInputEmail1" value="<?php echo $replay_user_data['sender_email']; ?>" >
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Send By</label>
    <input name="sender" type="email" class="form-control" id="exampleInputEmail1" value="<?php echo $_SESSION['email']; ?>" >
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Subject</label>
    <input name="subject" type="text" class="form-control" id="exampleInputPassword1" value="<?php echo $replay_user_data['subject']; ?>">
  </div>

  <div class="form-group">
  	<p style="color:green;"><?php echo $replay_user_data['message']; ?></p>
    <label for="exampleInputPassword1">Replay Message</label>
    <textarea name="body" class="form-control" rows="4"></textarea>	
  </div>

  <button name="replay_send" type="submit" class="btn btn-primary">Replay</button>
</form>




	</div>
</div>