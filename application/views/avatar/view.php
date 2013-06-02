    <br/>
    <h2><?php echo $avatar->name; ?></h2>
    <div id="main">
        <?php echo $avatar->svg; ?>
        <h3><a href=<?php echo base_url()."index.php/api/downloadavatar/".$avatar->id ?> ><?php echo "Download" ?></a></h3>
    </div>