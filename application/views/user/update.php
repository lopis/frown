<?php $this->load->helper('form'); ?>
 
<?php echo form_open('item/edit/'.$id); ?>
 
     <label for="username">Username:</label>
     <input value=<?php echo $user->username; ?> required=true type="text" size="20" id="username" name="username"/>
     <br/>
     <label for="email">Email:</label>
     <input value=<?php echo $user->email; ?> required=true type="text" size="20" id="email" name="email"/>
     <br/>
     <label for="password">Password:</label>
     <input type="password" required=true size="20" id="password" name="password"/>
     <br/>
    <input type="hidden" id="admin" name="admin" value=<?php echo $user->admin; ?>/>
    <p>
        <?php echo form_submit('submit', 'Submit'); ?>
    </p>
 
<?php echo form_close(); ?>