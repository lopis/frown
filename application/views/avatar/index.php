<br/>
<?php echo 	"<p><font size='5'>User: ".form_dropdown('username', $users, 'All', 'id="mydropdown"')."</font></p>";?>
<?php foreach ($avatars as $key=>$cat): ?>

<div <?php echo 'id="'.$key.'" style="display: none"'; ?>>
    <table>
    <tr><?php foreach ($cat as $user_item): ?><?php echo '<td align="center"><h3><a href='.base_url().'index.php/avatar/view/'.$user_item['id'].'>'.$user_item['name'].'</a></h3></td>' ?><?php endforeach ?></tr>
    <tr><?php foreach ($cat as $user_item): ?><?php echo '<td >'.$user_item['svg'].'</td>'?><?php endforeach ?></tr>
    <?php 
		$session_data = $this->session->userdata('logged_in');
    	if($session_data['admin']==1 || $session_data['username']==$key){ ?>
    <tr><?php foreach ($cat as $user_item): ?><?php echo '<td align="center"><a href="update/'.$user_item['id'].'">edit 	</a>|<a href="delete/'.$user_item['id'].'"> 	delete</a></td>'?><?php endforeach ?></tr>
    <?php }?>
    </table>
</div>
<?php endforeach ?>
<p/>
<br/>


<!--<?php foreach ($avatars as $user_item): ?>

    <h2><a href="view/<?php echo $user_item['id'] ?>"><?php echo $user_item['name'] ?></a></h2>
    <div id="main">
        <?php echo $user_item['svg'] ?>
    </div>
    <a href="update/<?php echo $user_item['id'] ?>">edit</a> |

    <a href="delete/<?php echo $user_item['id'] ?>">delete</a>

<?php endforeach ?>-->
<br/>
<p><a href="create">create</a></p>


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