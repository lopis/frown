<!-- by João Lopes & Ricardo Pinho -->
<!-- FEUP 2013 - LAPD -->
<!-- http://paginas.fe.up.pt/~ei10009 -->

<?php $this->load->helper('form'); ?>
 <br/>
<?php echo form_open('item/edit/'.$id); ?>
 
 	 <p id="showbackgroundimage"><?php echo $item->svg; ?></p>
     <label for="name">Name:</label>
     <input value=<?php echo $item->name; ?> required=true type="text" size="20" id="name" name="name"/>
     <br/>
     <label for="layer">Layer:</label>
     <input value=<?php echo $item->layer; ?> required=true type="number" size="20" id="layer" name="layer"/>
     <br/>
     <label for="type">Type:</label>
     <input type="text" value=<?php if($type!=null) echo $type->name; 
     else echo 'NoType'; ?> required=true size="20" id="type" name="type"/>
     <br/>
    <p>
        <?php echo form_submit('submit', 'Submit'); ?>
    </p>
 
<?php echo form_close(); ?>