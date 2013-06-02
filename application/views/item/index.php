<?php
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
        echo '</ul>
            <div class="left-arrow btn btn-large"><i class="icon-chevron-left"> </i></div>
            <div class="right-arrow btn btn-large"><i class="icon-chevron-right"> </i></div>
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
    $("div#All").css('height', 'auto');
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
