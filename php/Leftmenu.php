<!--------------------------------------------------------------------------->
<!--------------------------------------------------------------------------->
<!--------------------------------------------------------------------------->
<section class="row clearfix">
	<div class="row col-md-3" style="padding-top:40px; padding-bottom:40px;">
<?php 
	$qry_leftmenu = "SELECT * FROM tb_menu";
	$result_menu = $DB->select($qry_leftmenu); 
	if($result_menu){
		while($data_menu = $result_menu->fetch_array()){
?>
	<a href="?page=Product&cat=<?php echo $data_menu['id']; ?>" class="btn btn-block btn-primary"><?php echo $data_menu['menu_title']; ?></a>
<?php 
		}
	}
?>		
		<div class="" style=" margin-top:20px; height:230px; background:red; ">
			<img src="adds/<?php if(isset($data_adds)){ echo $data_adds['left_at']; } ?>" alt="" style="width:100%; height: 230px; ">
		</div>
	</div>