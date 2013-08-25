<!-- by João Lopes & Ricardo Pinho -->
<!-- FEUP 2013 - LAPD -->
<!-- http://paginas.fe.up.pt/~ei10009 -->

    <br/>
    <h2><?php echo $item->name; ?></h2>
    <div id="main">
    	<?php echo "<p>".$item->svg."</p>";?>
        <?php echo "<p>Layer: ".$item->layer."</p>"; ?>
        <?php if($notype!="")
        	echo "<p>Type: ".$notype."</p>"; 
        	else
        	echo "<p>Type: ".$type->name."</p>";?>
        <p><a href="../update/<?php echo $item->id ?>">edit</a> | <a href="../delete/<?php echo $item->id ?>">delete</a></p>
        <h3><a href=<?php echo base_url()."index.php/api/downloaditem/".$item->id ?> ><?php echo "Download" ?></a></h3>
        <!--<?php echo $item->type;?>-->
    </div>