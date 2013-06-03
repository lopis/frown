<br/>
<div class="views">
	<div class="view" id="avatar">
		<?php echo $avatar->svg; ?>
		<div class="btn-group" id="rate">
			<a href="" class="btn btn-inverse"><i class="icon-thumbs-up icon-white"></i></a>
			<a href="" class="btn btn-inverse"><i class="icon-thumbs-down icon-white"></i></a>
			<a href="<?php echo base_url()."index.php/api/downloadavatar/".$avatar->id ?>"
				class="btn btn-inverse"><i class="icon-download-alt icon-white"></i></a>
		</div>
		<div id="delete"></div>
	</div>
	<div class="view" id="details">
		<div class="name"><?php echo $avatar->name; ?></div class="name">
		<div class="user">
			User:
			<a href="<?php echo $avatar->id_user; ?>"><?php echo $avatar->username; ?></a>
		</div class="name">
	</div>
    <div style="clear: both"></div>
</div>