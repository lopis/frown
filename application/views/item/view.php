    <br/>
    <h2><?php echo $item->name; ?></h2>
    <div id="main">
    	<?php echo "<p id='showbackgroundimagemax'>".$item->svg."</p>";?>
        <?php echo "<p>Layer: ".$item->layer."</p>"; ?>
        <?php if($notype!="")
        	echo "<p>Type: ".$notype."</p>"; 
        	else
        	echo "<p>Type: ".$type->name."</p>";?>
        <!--<?php echo $item->type;?>-->
    </div>