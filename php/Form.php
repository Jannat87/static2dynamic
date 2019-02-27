<?php 
  if(isset($_POST['send_sms'])){
    $sender_email = $_POST['sender_email']; 
    $subject = $_POST['subject']; 
    $message = $_POST['message']; 

    if(empty($sender_email) OR empty($subject) OR empty($message)){
      $msg = "<span style='color:red;'> Field Must Not Empty !</span>";
    }else{
      $sms_qry = "INSERT INTO tb_contact(sender_email,subject,message)VALUES('$sender_email','$subject','$message')";
      $result_sms = $DB->insert($sms_qry); 
      if($result_sms){
        $msg = "<span style='color:green;'> Message Send Successfully !</span>";
      }
    }
  }
?>
<div class="col-md-5" style="padding-top:30px; ">
<!---->
<form action="?page=Contact" method="post">
  <div class="form-group">
    <input name="sender_email" type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter Your Email !">
  </div>
  <div class="form-group">
    <input name="subject" type="text" class="form-control" id="exampleInputEmail1" placeholder="Message Subject!">
  </div>
  <div class="form-group">
    <textarea name="message" class="form-control" rows="8"></textarea>
  </div>
  
  <button name="send_sms" type="submit" class="btn btn-info">Send</button>
  <?php if(isset($msg)){ echo $msg; } ?>
</form>
<!---->	
<div class="col-md-12" style="margin-top:50px; margin-bottom: 20px; ">
	<img src="adds/<?php if(isset($data_adds)){ echo $data_adds['right_at']; } ?>" class="img-responsive" style="width:100%; height:400px; ">
</div>
	</div>
</section>
<!--------------------------------------------------------------------------->
<!--------------------------------------------------------------------------->
<!--------------------------------------------------------------------------->