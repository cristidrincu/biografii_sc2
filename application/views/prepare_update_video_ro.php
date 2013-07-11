<div class='row-fluid mainContentContainer'>
    <div class="navbar">
        <div class="navbar-inner">
            <a class="brand" href="<?php echo base_url(); ?>index.php/home/index">ADMINISTRATION AREA</a>
            <ul class="nav pull-right">
                <li class='username'>Bine ai venit, <?php echo $username; ?> </li>
                <li><?php echo anchor("index.php/home/logout","Logout", "");?></li>
            </ul>
        </div>
    </div>
    <div class='span7 currentValuesEntity'>
        <h4><?php echo $video_details[0]->video_title ?></h4>
        <div class='span3'>
            <ul>
                <?php foreach($video_details as $video): ?>
                    <li>Titlu: <?php echo $video->video_title; ?></li>
                    <li>Link: <?php echo $video->video_link; ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>
    <div class='span5 formUpdateValuesEntity'>
        <!--form populated with current entity information goes here-->

        <h4>Formular modificare informatii titlu</h4>
        <?php
        $form_attributes=array('class'=>'form-horizontal');
        $input_field_name=array('name'=>'video_name','id'=>'videoName','class'=>'input-large', 'value'=>$video_details[0]->video_title);
        $input_field_link=array('name'=>'video_link','id'=>'videoLink','class'=>'input-large', 'value'=>$video_details[0]->video_link);

        $submit_btn_attributes=array('name'=>'submitBtn','class' => 'btn', 'type'=>'submit','content'=>'Update video');
        ?>

        <?php
        echo form_open('index.php/video_ro/update_video_ro/'. $video_details[0]->video_id, $form_attributes);
        ?>
        <div class="control-group">
            <label class="control-label" for="videoTitle">Title</label>
            <div class="controls">
                <?php echo form_input($input_field_name); ?>
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" for="teamCountry">Link</label>
            <div class="controls">
                <?php echo form_input($input_field_link); ?>
            </div>
        </div>
        <div class="control-group">
            <div class="controls">
                <?php echo form_button($submit_btn_attributes);  ?>
            </div>
        </div>

        <?php
        echo form_close();
        ?>
    </div>
</div>