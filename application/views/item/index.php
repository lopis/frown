<br/>
<?php echo 	"<p><font size='5'>Type: ".form_dropdown('name', $types, 'All', 'id="mydropdown"')."</font></p>";?>
<?php foreach ($items as $key=>$cat): ?>

<div <?php echo 'id="'.$key.'" style="display: none"'; ?>>
    <table>
    <tr><?php foreach ($cat as $user_item): ?><?php echo '<td align="center"><h3><a href='.base_url().'index.php/item/view/'.$user_item['id'].'>'.$user_item['name'].'</a></h3></td>' ?><?php endforeach ?></tr>
    <tr><?php foreach ($cat as $user_item): ?><?php echo '<td id="showbackgroundimage">'.$user_item['svg'].'</td>'?><?php endforeach ?></tr>
    <tr><?php foreach ($cat as $user_item): ?><?php echo '<td align="center">Layer: '.$user_item['layer'].'</td>'?><?php endforeach ?></tr>
    <?php 
		$session_data = $this->session->userdata('logged_in');
    	if($session_data['admin']==1){ ?>
    <tr><?php foreach ($cat as $user_item): ?><?php echo '<td align="center"><a href="update/'.$user_item['id'].'">edit 	</a>|<a href="delete/'.$user_item['id'].'"> 	delete</a></td>'?><?php endforeach ?></tr>
    <?php } 
    else{ ?>
    <tr><?php foreach ($cat as $user_item): ?><?php echo '<td align="center"><a href="update/'.$user_item['id'].'">edit 	</a></td>'?><?php endforeach ?></tr>
    <?php } ?>
    </table>
</div>
<?php endforeach ?>
<p/>
<br/>

<p><a href="create">Create</a> if you have Formatted SVGs</p>
<p><a href="create_manual">Manual Create</a> if you want to insert any svg</p>


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