<?php $this->load->helper('form'); ?>

<?php echo form_open('avatar/add'); ?>
 	<br/>
     <label for="name">Name:</label>
     <input required=true type="text" size="20" id="name" name="name"/>
     <br/>
 
    <p>
        <?php echo form_submit('submit', 'Submit'); ?>
    </p>

 
<?php echo form_close(); ?>