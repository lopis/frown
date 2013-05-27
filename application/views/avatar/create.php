<?php $this->load->helper('form'); ?>

<?php echo form_open('avatar/add'); ?>
 
     <label for="name">Name:</label>
     <input required=true type="text" size="20" id="name" name="name"/>
     <br/>
     <label for="svg">SVG:</label>
     <input type="text" id="svg" name="svg"/>
     <br/>
 
 
    <p>
        <?php echo form_submit('submit', 'Submit'); ?>
    </p>
 
<?php echo form_close(); ?>