<!-- by João Lopes & Ricardo Pinho -->
<!-- FEUP 2013 - LAPD -->
<!-- http://paginas.fe.up.pt/~ei10009 -->

<?php echo form_open_multipart('item/add_manual');?>
<br/>
<label for="userfile">SVG:</label>
<input type="file" name="userfile" id="userfile" />
<br/>
<label for="name">Name:</label>
<input required=true type="text" size="20" id="name" name="name"/>
<br/>
<label for="type">Type:</label>
<input type="text" required=true id="type" name="type"/>
<br/>
<label for="layer">Layer:</label>
<input type="number" required=true id="layer" name="layer"/>
<br/>
<!--<label for="color">Color:</label>
<input type="text" id="color" name="color"/>
<br/>-->

<br /><br />

<input type="submit" value="upload" />

</form>

<p><a href="create">Automatic Create</a> if you have Formatted SVGs</p>