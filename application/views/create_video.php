<div class='row-fluid mainContentContainer'>
    <div class="navbar">
        <div class="navbar-inner">
            <a class="brand" href="<?php echo base_url(); ?>home/index">ADMINISTRATION AREA - CREATE <?php echo $page_title; ?></a>
                <ul class="nav pull-right">
                  <li class='username'>Bine ai venit, <?php echo $username; ?> </li>  
                  <li><?php echo anchor("home/logout","Logout", "");?></li>
                </ul>
  </div>
</div>
    <div class='span12 reportsOperationsArea'>
        <div class='span11 alert alert-error'>
            <h4 style='padding-bottom:15px;'>INDICATII PENTRU INTRODUCEREA UNUI NOU CLIP VIDEO</h4>
            <ul class='instructiuniCreateEntityList'>
                <li>1. <strong>Link video</strong> - se introduce link-ul complet pentru clipul prezent pe Starcraft2-Vidcasts.ro - <strong>ex: http://www.starcraft2-vidcasts.ro/2013/06/terran-vs-blink-stalker-all-in-red-city/</strong></li>
            </ul>
        </div><!--ends instructiuni create new video-->
        <div class='span12'>
            <?php
              $form_attributes = array('class'=>'form-horizontal');

              $drop_down_title=array();
              foreach($players as $player){
                $drop_down_title[$player->nickname]=$player->nickname;
              }

              $drop_down_id='id="selectPlayer"';

              $input_field_name=array('name'=>'video_name','id'=>'videoName','class'=>'input-large', 'required' => 'required');
              $input_field_link=array('name'=>'video_link','id'=>'videoLink','class'=>'input-large add-video-link', 'required' => 'required');
              
              

              $submit_btn_attributes = array('name' => 'submitBtn','class' => 'btn btn-success', 'type' => 'submit','value' => 'Creeaza Clip Video');
            ?>

            <?php 
                echo form_open('video/create_video', $form_attributes);
            ?>
            <div class="formBreaker span5">
                <div class="control-group">
                    <label class="control-label" for="videoName">Titlu</label>
                    <div class="controls">
                        <?php echo form_input($input_field_name); ?>
                    </div>
                </div>
            </div>
            <div class="formBreaker span5">
                <div class="control-group">
                    <label class="control-label" for="videoLink">Link video</label>
                    <div class="controls">
                        <?php echo form_input($input_field_link); ?>
                    </div>
                </div>
            </div>
            <div class="formBreaker span5">
                <div class="control-group">
                    <label class="control-label" for="selectPlayer">Jucator</label>
                    <div class="controls">
                        <?php echo form_dropdown('player_nickname',$drop_down_title,'', $drop_down_id); ?>
                    </div>
                </div>
            </div>
            <div class="formBreaker span12">
                <div class="control-group">
                    <div class="controls">
                        <?php echo form_submit($submit_btn_attributes);  ?>
                    </div>
                </div>
            </div>
                <?php echo form_close(); ?>
        </div><!--ends create new video form-->
    </div><!--ends section data-->
</div><!--ends main container-->