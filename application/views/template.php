<!-- by João Lopes & Ricardo Pinho -->
<!-- FEUP 2013 - LAPD -->
<!-- http://paginas.fe.up.pt/~ei10009 -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
 
<?php 
foreach($css_files as $file): ?>
    <link type="text/css" rel="stylesheet" href="<?php echo $file; ?>" />
 
<?php endforeach; ?>
<?php foreach($js_files as $file): ?>
 
    <script src="<?php echo $file; ?>"></script>
<?php endforeach; ?>
 
<style type='text/css'>
body
{
    font-family: Arial;
    font-size: 14px;
}
a {
    color: blue;
    text-decoration: none;
    font-size: 14px;
}
a:hover
{
    text-decoration: underline;
}
</style>
</head>
<body>
<!-- Beginning header -->
    <div>
        <?php
            if($this->uri->segment(1)=='User' || $this->uri->segment(1)=='user')
            {
        ?>
        <a href='<?php echo site_url('avatar/avatars')?>'>Avatars</a> | 
        <a href='<?php echo site_url('item/items')?>'>Items</a>
        <?php
            }
            elseif($this->uri->segment(1)=='Avatar'|| $this->uri->segment(1)=='avatar')
            {
        ?>
        <a href='<?php echo site_url('user/users')?>?>'>Users</a> | 
        <a href='<?php echo site_url('item/items')?>'>Items</a>
        <?php
            }
            else
            {
        ?>
        <a href='<?php echo site_url('avatar/avatars')?>?>'>Avatars</a> | 
        <a href='<?php echo site_url('user/users')?>'>Users</a>
        <?php } ?>
    </div>
<!-- End of header-->
    <div style='height:20px;'></div>  
    <div>
        <?php echo $output; ?>
 
    </div>


<!-- Beginning footer -->
<div>Footer</div>
<!-- End of Footer -->
</body>
</html>