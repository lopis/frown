<!-- by João Lopes & Ricardo Pinho -->
<!-- FEUP 2013 - LAPD -->
<!-- http://paginas.fe.up.pt/~ei10009 -->

<?php echo form_open_multipart('type/edit/'.$id);?>

<br/>
<label for="name">Name:</label>
<input type="text" value=<?php echo $type->name ?> name="name" id="name" size="20" />

<br /><br />

<input type="submit" value="upload" />

</form>