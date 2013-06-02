<?php
	$this->load->helper('url');
	$session_data = $this->session->userdata('logged_in');
	$header_menu = array(
		//"Utilizador" => base_url()."index.php/utilizador/index",
		"Avatars" => base_url()."index.php/avatar/index",
		"Items" => base_url()."index.php/item/index",
		"Users" => base_url()."index.php/user/index",
		"Profile" => base_url()."index.php/user/view/".$session_data['id'],
		"Logout" => base_url()."index.php/home/logout",
	);

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Frown - <?php echo $title ?></title>
    <link rel="stylesheet" href="<?php echo base_url();?>application/views/css/bootstrap-responsive.css">
    <link rel="stylesheet" href="<?php echo base_url();?>application/views/css/bootstrap.css">
</head>
<body>
<div class="container">
<a href="<?php echo base_url();?>index.php/home/index">
 <img src="<?php echo base_url();?>application/views/img/logo.png" width="200" height="150" />
</a>
<div class="navbar">
	<ul class="nav">
		<?php 
			foreach ($header_menu as $key => $value) {
				echo "<li>".anchor($value, $key)."</li>";
			}
	 	?>
	</ul>
</div>
