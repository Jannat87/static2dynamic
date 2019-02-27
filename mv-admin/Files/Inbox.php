<?php 
	if(isset($_GET['read'])){
		$read_id = $_GET ['read'];
		$inbox_update_read_qry = "
		UPDATE tb_contact SET status=1 WHERE id='$read_id'";
		$inbox_update_read_result =$DB->update($inbox_update_read_qry);
		if($inbox_update_read_result){
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
<div class="" style="min-height:400px;  ">	
	<div class="col-md-3">
<!------------------------------------>
	<button class="btn btn-primary btn-block">All Message()</button>

	<button class="btn btn-info btn-block">Send Sms()</button>

	<button class="btn btn-default btn-block">Trash Box()</button>

	</div>	
	<div class="col-md-9">
<!-------------------------------->
<table class="table table-bordered table-striped">
	<tr>
		<th>SL</th>
		<th>Send mail </th>
		<th>Subject</th>
		<th style="width:28%;">Action</th>
	</tr>
<?php 
	$msg_query = "SELECT * FROM tb_contact WHERE deleted_at=0";
	$msg_res = $DB->select($msg_query); 
	$i = 0; 
	while($msg_data = $msg_res->fetch_array()){
		$i++; 
		if($msg_data['status']==0){ $cls = "btn-primary"; }else{ $cls = "btn-default"; }
?>
	<tr>
		<td><?php echo $i;?></td>
		<td><?php echo $msg_data['sender_email'];?></td>
		<td><?php echo $msg_data['subject'];?></td>
		<td>
			<a href="" class="btn btn-info btn-sm <?php echo $cls;?>" data-toggle="modal" data-target="#index<?php echo $msg_data['id']; ?>">View</a>
			<a href="?page=Cosmatics&upid=<?php echo $cosmatics['id'];?>" class="btn btn-danger btn-sm">Send to trash</a>
			<a href="?page=Cosmatics&delid=<?php echo $cosmatics['id'];?>" class="btn btn-warning btn-sm">Replay</a>
		</td>
	</tr>
	<!------------------------------------------------------------------------------------------------>
		<!-- Modal -->
<div class="modal fade" id="index<?php echo $msg_data['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel"> Emailed By &mdash;<?php echo $msg_data ['sender_email'];?></h4>
      </div>
      <div class="modal-body">
      	<?php 
      		echo '<h2>Subject ##'.$msg_data['subject'].' </h2>';
      		echo '<h2> Message ##'.$msg_data['message'].' </h2>';
      	?>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
        <a href="?page=Inbox&read=<?php echo $msg_data['id'];?>" type="button" class="btn btn-info">Mark As Read</a>
        <a href="?page=Inbox&trash=<?php echo $msg_data['id']; ?>" type="button" class="btn btn-danger">Send To Trash</a>
      </div>
    </div>
  </div>
</div>
	<!------------------------------------------------------------------------------------------------>
	<?php
	}

?>	 

</table>
<!-------------------------------->
	</div>
	
</div>
<!----------------------------------------------->
