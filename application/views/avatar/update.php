<?php $this->load->helper('form'); ?>
  <br/>
<?php echo form_open('avatar/edit/'.$id); ?>
 
     <label for="name">Name:</label>
     <input value=<?php echo $avatar->name; ?> required=true type="text" size="20" id="name" name="name"/>
     <br/>
     <label for="svg">SVG:</label>
     <input value=<?php echo $avatar->svg; ?> type="text" id="svg" name="svg"/>
     <br/>
 
    <p>
        <?php echo form_submit('submit', 'Submit'); ?>
    </p>
 
<?php echo form_close(); ?>