<?php 
	if(!isset($_GET['page'])){
		header('Location:index.php?page=Home');
	}else{
		$pg = $_GET['page'];
	}
?>

<?php

	if($pg=='Home'){

		include 'php/Header.php';
		include 'php/Slider.php';
		include 'php/Circleline.php';
		include 'php/Leftmenu.php';
		include 'php/Products.php';
		include 'php/Footer.php';

	}elseif($pg=='Product'){

		include 'php/Header.php';
		include 'php/Leftmenu.php';
		include 'php/Products.php';
		include 'php/Footer.php';

	}elseif($pg=='Contact'){
		include 'php/Header.php';
		include 'php/Topadd.php';
		include 'php/Addressmap.php';
		include 'php/Form.php';
		include 'php/Footer.php';
	}

?>