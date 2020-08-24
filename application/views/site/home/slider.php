<div class="slider-wrapper theme-default">
    <div id="slider" class="nivoSlider">
        <?php foreach ($slide_list as $row): ?>
        <img src="<?php echo base_url('upload/slider/'.$row->image_slide)?>" data-thumb="<?php echo base_url('upload/slider/'.$row->image_slide)?>" />
        <?php endforeach; ?>
    </div>
    
</div>