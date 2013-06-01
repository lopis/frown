<?php $this->load->helper('form'); ?>
  <br/>
<?php echo form_open('avatar/edit/'.$id, array('class' => 'svg')); ?>
 
     <label for="name">Name:</label>
     <input value=<?php echo $avatar->name; ?> required=true type="text" size="20" id="name" name="name"/>
     <br/>
     <label for="svg">SVG</label>
      <br>
      <?php echo $avatar->svg; ?>
     <textarea class="code" value="" type="text" id="svg" name="svg">
        <?php echo $avatar->svg; ?>
     </textarea>
     <br/>
 
    <p>
        <?php echo form_submit('submit', 'Submit'); ?>
    </p>
 
<?php echo form_close(); ?>