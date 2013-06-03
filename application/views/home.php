
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
 <body>
   <br/>
   <h4>Welcome <?php echo $username; ?>!</h4>
   <!--<?php echo $error;?>-->
   <div class="label">My Avatars</div>
   <div class="home_avatars" id="myavatars">
      <?php foreach ($myavatars as $user_item): ?>
        <div class="home_avatar">
          <a href="<?php echo base_url().'index.php/avatar/view/'.$user_item['id']; ?>">
            <div id="my_svg"><?php echo $user_item['svg']; ?></div>
            <div id="my_name"><?php echo $user_item['name']; ?></div>
          </a>
        </div>
      <?php endforeach ?>
      <div style="clear: both"></div>
   </div>
   <div class="label">Newest Items</div>
   <div class="home_avatars" id="lastitems">
      <?php foreach ($items as $user_item): ?>
      <div class="home_avatar">
        <a href="<?php echo base_url().'index.php/item/view/'.$user_item['id']; ?>">
          <div id="my_svg"><?php echo $user_item['svg']; ?></div>
          <div id="my_name"><?php echo $user_item['name']; ?></div>
        </a>
      </div>
    <?php endforeach ?>
    <div style="clear: both"></div>
   </div>
   <div class="label">Recent Creations</div>
   <div class="home_avatars" id="lastavatars">
      <?php foreach ($avatars as $user_item): ?>
      <div class="home_avatar">
        <a href="<?php echo base_url().'index.php/item/view/'.$user_item['id']; ?>">
          <div id="my_svg"><?php echo $user_item['svg']; ?></div>
          <div id="my_name"><?php echo $user_item['name']; ?></div>
        </a>
      </div>
    <?php endforeach ?>
    <div style="clear: both">.</div>
   </div>
    <br/>
    <br/>
    <br/>

 </body>
</html>

