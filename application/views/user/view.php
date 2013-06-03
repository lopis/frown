    <br/>
    <h2><?php echo $user->username; ?></h2>
    <div id="main">
                <p><?php echo "Email: ".$user->email; ?></p>
        <p><?php 
        if($user->admin==1)
       	 echo "Status: Admin";
		else
		 echo "Status: User";?></p>

        <div class="label">User Avatars</div>
        <div class="home_avatars" id="myavatars">
          <?php foreach ($avatars as $avatar): ?>
            <div class="home_avatar">
              <a href="<?php echo base_url().'index.php/avatar/view/'.$avatar['id']; ?>">
                <div id="my_svg"><?php echo $avatar['svg']; ?></div>
                <div id="my_name"><?php echo $avatar['name']; ?></div>
              </a>
            </div>
          <?php endforeach ?>
          <div style="clear: both"></div>
        </div>

<!-- 	<table>
    <tr><td><h3>Avatars</h3></td></tr>
    <tr><?php foreach ($avatarusers as $avatar_user): ?>
    	<?php if($avatar_user['id_user']==$user->id){ ?>
    	   <?php foreach ($avatars as $avatar): ?>
    	   	<?php if($avatar['id']==$avatar_user['id_avatar']){
    			echo '<td >'.$avatar['svg'].'</td>';
    		 } ?>
    		 <?php endforeach ?> 
    		<?php } ?>
	<?php endforeach ?></tr>
    


    <tr><?php foreach ($avatarusers as $avatar_user): ?>
    	<?php if($avatar_user['id_user']==$user->id){ 
    	   foreach ($avatars as $avatar):
    	   	if($avatar['id']==$avatar_user['id_avatar']){
    			echo '<td align="center"><a href='.base_url().'index.php/avatar/view/'.$avatar['id'].'>'.$avatar['name'].'</a></td>'; 
    		 } ?>
    		<?php endforeach ?> 
    		<?php } ?>
	<?php endforeach ?></tr>
    </table>
    <br/> -->

		<?php 
		$session_data = $this->session->userdata('logged_in');
    	if($session_data['admin']==1 || $session_data['id']==$user->id){ ?>
    <a href="../update/<?php echo $user->id ?>">edit</a>

    <?php } ?>

    </div>