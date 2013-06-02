
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
 <body>
   <br/>
   <h2>Welcome <?php echo $username; ?>!</h2>
   <!--<?php echo $error;?>-->
   <div class="homeavatars" id="myavatars">
    <?php foreach ($myavatars as $user_item): ?>
        <a href="<?php echo base_url().'index.php/avatar/view/'.$user_item['id']; ?>">
            <div class="svg"><?php echo $user_item['svg']; ?></div>
            <div class="name"><?php echo $user_item['name']; ?></div>
        </a>
    <?php endforeach ?>
   </div>
   <div class="homeavatars" id="lastitems">
   </div>
   <div class="homeavatars" id="lastavatars">
   </div>

    <table>
    <tr><td><h3>My Avatars</h3></td></tr>
    <tr><?php foreach ($myavatars as $user_item): ?><?php echo '<td >'.$user_item['svg'].'</td>' ?><?php endforeach ?></tr>
    <tr><?php foreach ($myavatars as $user_item): ?><?php echo '<td align="center"><a href='.base_url().'index.php/avatar/view/'.$user_item['id'].'>'.$user_item['name'].'</a></td>'?>
    <?php endforeach ?></tr>
    </table>

    <table>
    <tr><td><h3>Latest Items</h3></td></tr>
    <tr><?php foreach ($items as $user_item): ?><?php echo '<td id="showbackgroundimage">'.$user_item['svg'].'</td>' ?><?php endforeach ?></tr>
    <tr><?php foreach ($items as $user_item): ?><?php echo '<td align="center"><a href='.base_url().'index.php/item/view/'.$user_item['id'].'>'.$user_item['name'].'</a></td>'?><?php endforeach ?></tr>
    </table>

    <table>
    <tr><td><h3>Latest Avatars</h3></td></tr>
    <tr><?php foreach ($avatars as $user_item): ?><?php echo '<td >'.$user_item['svg'].'</td>' ?><?php endforeach ?></tr>
    <tr><?php foreach ($avatars as $user_item): ?><?php echo '<td align="center"><a href='.base_url().'index.php/avatar/view/'.$user_item['id'].'>'.$user_item['name'].'</a></td>'?>
    <?php endforeach ?></tr>
    </table>

    <br/>
    <br/>
    <br/>

 </body>
</html>

