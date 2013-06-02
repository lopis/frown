<?php
  $this->load->helper('form');
  echo form_open('avatar/add');
?>
<input id="svg" type="hidden" name="svg" value="..." />
<input id="items" type="hidden" name="items" value="" />
  <br/>
     <label for="name">Name:</label>
     <input required=true type="text" size="20" id="name" name="name" value="<?php echo $avatar->name; ?>"/>
     <br/>
 
    <p>
        <?php echo form_submit('submit', 'Submit'); ?>
    </p>
    <div id="avatar-creator">
        <div id="layer-float">
            <div id="layer-stack">
            </div>
        </div>

        <div id="avatar">
          <svg/>
        </div>
        <div class="marginslider_container">
          <ul class="marginslider">
            <!-- <li>
              <div class='grid-item'>
                <div class='slider-item'>
                  <svg ... />
                </div>
              </div>
            </li> -->
            <?php 
              $i=0;
              foreach ($items as $item) {
                if($i == 0){
                  echo "<li><div class='grid-item'>";
                }
                echo "<div class='slider-item' id='" . $item['id']
                         . "' layer='" . $item['layer'] . "'>";
                echo $item['svg'];
                echo "</div>";
                $i = $i + 1;
                if($i == 9){
                  echo "</div></li>";
                  $i = 0;
                }
              }
                    if($i != 0){
                        echo "</div></li>";
                    }
             ?>
          </ul>
            <div class="left-arrow btn btn-large"><i class="icon-chevron-left"> </i></div>
            <div class="right-arrow btn btn-large"><i class="icon-chevron-right"> </i></div>
        </div>
    </div>

 
<?php echo form_close(); ?>

<script src="<?php echo base_url();?>application/views/templates/margin-slider/js/marginslider.js"></script>
<script src="<?php echo base_url();?>application/javascript/jquery-1.9.1.min.js"></script>
<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />
<link rel="stylesheet" type="text/css"
  href="<?php echo base_url();?>application/views/templates/margin-slider/css/marginslider.css">
<script src="<?php echo base_url();?>application/views/js/avatarscript.js"></script>
<script type="text/javascript">
  $(window).load(function(){
    MarginSlider.init({slider: $('.marginslider'), 
           no_visible: 1,
           step: 1
          });
  });
  base_url = "<?php echo base_url(); ?>";
  addListToAvatar(<?php echo json_encode($avatar_items); ?>);
</script>
