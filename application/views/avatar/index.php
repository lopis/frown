<!-- by João Lopes & Ricardo Pinho -->
<!-- FEUP 2013 - LAPD -->
<!-- http://paginas.fe.up.pt/~ei10009 -->

<p><a href="create">Create New</a></p>

<div class="label">User Avatars</div>
<div class="home_avatars" id="myavatars">
  <?php foreach ($avatars['All'] as $avatar): ?>
    <div class="home_avatar">
      <a href="<?php echo base_url().'index.php/avatar/view/'.$avatar['id']; ?>">
        <div id="my_svg"><?php echo $avatar['svg']; ?></div>
        <div id="my_name"><?php echo $avatar['name']; ?></div>
      </a>
    </div>
  <?php endforeach ?>
  <div style="clear: both"></div>
</div>

<script src="<?php echo base_url();?>application/javascript/jquery-1.9.1.min.js"></script>
<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />
<script type="text/javascript">
 $(document).ready(function () {
            document.getElementById('All').style.display='block';
            $("#mydropdown").bind("change",function(){
			    var crit = document.getElementById("mydropdown");
			    for (var i = 0; i < crit.options.length; i++) { 
		             var criteriaprev = crit.options[i].value;
		             document.getElementById(criteriaprev).style.display='none'; 
		        } 
 				var criteria = crit.options[crit.selectedIndex].value;
			    document.getElementById(criteria).style.display='block'; 
			});
        });
</script>