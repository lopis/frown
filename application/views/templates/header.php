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
<html>
<head>
	<meta charset="UTF-8">
	<title>Frown - <?php echo $title ?></title>
    <link rel="stylesheet" href="<?php echo base_url();?>application/views/css/style.css">
</head>
<body>
<div id="body">
<div id="headermenu">
	<?php 
		foreach ($header_menu as $key => $value) {
			echo "[".anchor($value, $key)."] ";
		}
	 ?>
</div>
