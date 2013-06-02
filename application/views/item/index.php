<br/>
<?php
    $this->load->helper('form');
    echo "<div class='type'>Type: ".form_dropdown('name', $types, 'All', 'id="catList"')."</div>";
    foreach ($items as $cat => $itemlist) {
        $i=0;
        echo "<div class='cat marginslider_container' id='".$cat."'>";
        echo "<ul class='marginslider'>";
        foreach ($itemlist as $item) {
            if($i == 0){
                echo "<li><div class='grid-item'>";
            }
            echo "<div class='slider-item' id='".$item['id']."' layer='" . $item['layer'] . "'>";
            ?>

            <a href="<?php echo base_url()."/index.php/item/view/".$item['id']; ?>">
                <div class="svg"><?php echo $item['svg']; ?></div>
                <div class="itemName">
                    <?php echo $item['name']; ?>
                </div>
            </a>
            
            <?php
            echo "</div>";
            $i = $i + 1;
            if($i == 15){
                echo "</div></li>";
                $i = 0;
            }
        }
        if($i != 0){
            echo "</div></li>";
        }
        echo '</ul>
            <div class="arrows">
                <button class="left-arrow btn btn-large"><i class="icon-chevron-left"> </i></button>
                <button class="right-arrow btn btn-large"><i class="icon-chevron-right"> </i></button>
            </div>
        </div>';
    }
 ?>
<p/>
<br/>

<p><a href="create">Create</a> if you have Formatted SVGs</p>
<p><a href="create_manual">Manual Create</a> if you want to insert any svg</p>


<script src="<?php echo base_url();?>application/views/templates/margin-slider/js/marginslider.js"></script>
<script src="<?php echo base_url();?>application/javascript/jquery-1.9.1.min.js"></script>
<link rel="stylesheet" type="text/css"
    href="<?php echo base_url();?>application/views/templates/margin-slider/css/marginslider.css">
<script type="text/javascript">
    $("div.cat").css('height', 0);
    $("div.cat ul").removeClass('marginslider');
    $("div#All").css('height', 'auto');
    $("div#All ul").addClass('marginslider');
    $(window).load(function(){
        MarginSlider.init({slider: $('.marginslider'), 
           no_visible: 1,
           step: 1
          });
        $("#catList").change(function(){
          $("div.cat").css('height', 0);
          $("#"+$(this).val()).css('height', 'auto');
        });
    });
    base_url = "<?php echo base_url(); ?>";
</script>
<script src="<?php echo base_url();?>application/views/js/avatarscript.js"></script>
