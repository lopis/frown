<?php $this->load->helper('form'); ?>
 
<?php echo form_open('item/edit/'.$id); ?>
 
     <label for="name">Name:</label>
     <input type="text" value=<?php echo $item->name; ?> required=true size="20" id="name" name="name"/>
     <br/>
     <label for="layer">Layer:</label>
     <input type="number" value=<?php echo $item->layer; ?> required=true size="20" id="layer" name="layer"/>
     <br/>
     <label for="color">Color:</label>
     <input type="text" value=<?php echo $item->color; ?> required=true size="20" id="color" name="color"/>
     <br/>
     <label for="svg">Svg:</label>
     <input type="text" value=<?php echo $item->svg; ?> required=true size="20" id="svg" name="svg"/>
     <br/>
     <label for="type">Type:</label>
     <input type="number" value=<?php echo $item->type; ?> required=true size="20" id="type" name="type"/>
     <br/>
 
    <p>
        <?php echo form_submit('submit', 'Submit'); ?>
    </p>
 
<?php echo form_close(); ?>