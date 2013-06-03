<?php
	$this->load->helper('url');
	$session_data = $this->session->userdata('logged_in');
	$header_menu = array(
		//"Utilizador" => base_url()."index.php/utilizador/index",
		"Avatars" => base_url()."index.php/avatar/index",
		"Items" => base_url()."index.php/item/index",
		"Users" => base_url()."index.php/user/index",
		"Profile" => base_url()."index.php/user/view/".$session_data['id'],
		"Logout ( ".$session_data['username']." )" => base_url()."index.php/home/logout",
	);
	if ($session_data['admin']==1)
	{
		$header_menu = array(
		//"Utilizador" => base_url()."index.php/utilizador/index",
		"Avatars" => base_url()."index.php/avatar/index",
		"Items" => base_url()."index.php/item/index",
		"Types" => base_url()."index.php/type/index",
		"Users" => base_url()."index.php/user/index",
		"Profile" => base_url()."index.php/user/view/".$session_data['id'],
		"Logout ( ".$session_data['username']." )" => base_url()."index.php/home/logout",
	);
	}

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
	<div id="logo">
		<a href="<?php echo base_url();?>index.php/home/index">
			<img class="logo" src="<?php echo base_url();?>application/views/img/logo.png"/>
		</a>
	</div>


    <div class="navbar navbar-inverse">
      <div class="navbar-inner">
	      <ul class="nav">
	        <?php 
				foreach ($header_menu as $key => $value) {
					echo "<li>".anchor($value, $key)."</li>";
				}
		 	?>
	      </ul>
      </div><!-- /.navbar-inner -->
    </div><!-- /.navbar -->

	<div id="main">
