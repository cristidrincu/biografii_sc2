<div class='row-fluid mainContentContainer'>
    <div class="navbar">
        <div class="navbar-inner">
            <a class="brand" href="<?php echo base_url(); ?>index.php/home/index">ADMINISTRATION AREA - CREATE <?php echo $page_title; ?></a>
                <ul class="nav pull-right">
                  <li class='username'>Bine ai venit, <?php echo $username; ?> </li>  
                  <li><?php echo anchor("index.php/home/logout","Logout", "");?></li>
                </ul>
  </div>
</div>
    <div class="span3"><!--container for crud operations for players-->
        <!--section for international players - CRUD ops-->
        <div class='CRUDMainMenu'>
            <h4 class='indicatorOperatiiCRUDJucatori'>JUCATORI STRAINI</h4>
            <div class="accordion" id="accordion2">
                <div class="accordion-group">
                    <div class="accordion-heading">
                        <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseOne">
                            CRUD operations for PLAYER entity
                        </a>
                    </div>
                    <div id="collapseOne" class="accordion-body collapse">
                        <div class="accordion-inner">
                            <?php echo anchor("index.php/player/prepare_player", "CREATE Player", array("class"=>"btn")); ?>
                            <?php echo anchor("index.php/player/read_player", "READ Player", array("class"=>"btn")); ?>
                        </div>
                    </div>
                </div><!--ends player entity options-->

                <div class="accordion-group">
                    <div class='accordion-heading'>
                        <a class='accordion-toggle' data-toggle="collapse" data-parent="#accordion2" href="#collapseThree">
                            CRUD operations for TITLE entity
                        </a>
                    </div>
                    <div id="collapseThree" class="accordion-body collapse in">
                        <div class="accordion-inner">
                            <?php echo anchor("index.php/title/prepare_title", "CREATE Title", array("class"=>"btn")); ?>
                            <?php echo anchor("index.php/title/read_title", "READ Title", array("class"=>"btn")); ?>
                        </div>
                    </div>
                </div><!--ends title entity options-->
                <div class="accordion-group">
                    <div class="accordion-heading">
                        <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseFour">
                            CRUD operations for VIDEO entity
                        </a>
                    </div>
                    <div id="collapseFour" class="accordion-body collapse">
                        <div class="accordion-inner">
                            <?php echo anchor("index.php/video/prepare_video", "CREATE Video", array("class"=>"btn")); ?>
                            <?php echo anchor("index.php/video/read_video", "READ Video", array("class"=>"btn")); ?>
                        </div>
                    </div>
                </div><!--ends player_videos entity options-->
            </div>
        </div><!--ends CRUD main menu-->
        <!--section for romanian players - CRUD ops-->
        <div class='CRUDMainMenu'>
            <h4 class='indicatorOperatiiCRUDJucatori'>JUCATORI ROMANI</h4>
            <div class="accordion" id="accordion3">
                <div class="accordion-group">
                    <div class="accordion-heading">
                        <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion3" href="#collapseOneRo">
                            CRUD operations for PLAYER ROMAN entity
                        </a>
                    </div>
                    <div id="collapseOneRo" class="accordion-body collapse">
                        <div class="accordion-inner">
                            <?php echo anchor("index.php/player_ro/prepare_player_ro", "CREATE Player", array("class"=>"btn")); ?>
                            <?php echo anchor("index.php/player_ro/read_player_ro", "READ Player", array("class"=>"btn")); ?>
                        </div>
                    </div>
                </div><!--ends player roman entity options-->
                <div class="accordion-group">
                    <div class='accordion-heading'>
                        <a class='accordion-toggle' data-toggle="collapse" data-parent="#accordion3" href="#collapseThreeRo">
                            CRUD operations for TITLE entity
                        </a>
                    </div>
                    <div id="collapseThreeRo" class="accordion-body collapse in">
                        <div class="accordion-inner">
                            <?php echo anchor("index.php/title_ro/prepare_title_ro", "CREATE Title", array("class"=>"btn")); ?>
                            <?php echo anchor("index.php/title_ro/read_title_ro", "READ Title", array("class"=>"btn")); ?>
                        </div>
                    </div>
                </div><!--ends title entity options-->
                <div class="accordion-group">
                    <div class="accordion-heading">
                        <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion3" href="#collapseFourRo">
                            CRUD operations for VIDEO entity
                        </a>
                    </div>
                    <div id="collapseFourRo" class="accordion-body collapse">
                        <div class="accordion-inner">
                            <?php echo anchor("index.php/video_ro/prepare_video_ro", "CREATE Video", array("class"=>"btn")); ?>
                            <?php echo anchor("index.php/video_ro/read_video_ro", "READ Video", array("class"=>"btn")); ?>
                        </div>
                    </div>
                </div><!--ends player_videos entity options-->
            </div>
        </div><!--ends CRUD main menu-->

        <!--operations for TEAM entity-->
        <div class='CRUDMainMenu'>
            <h4 class='indicatorOperatiiCRUDJucatori'>ECHIPE</h4>
            <div class="accordion" id="accordion4">
                <div class="accordion-group">
                    <div class="accordion-heading">
                        <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion4" href="#collapseTeam">
                            CRUD operations for TEAM entity
                        </a>
                    </div>
                    <div id="collapseTeam" class="accordion-body collapse in">
                        <div class="accordion-inner">
                            <?php echo anchor("index.php/team/prepare_team", "CREATE Team", array("class"=>"btn")); ?>
                            <?php echo anchor("index.php/team/read_team", "READ Team", array("class"=>"btn")); ?>
                        </div>
                    </div>
                </div>
            </div><!--ends team entity options-->

        </div><!--ends CRUD main menu for team operations-->
    </div><!--ends container for CRUD menus-->
    <div class='span9 reportsOperationsArea'>
        <div class='span4 alert alert-error'>
            <h4 style='padding-bottom:15px;'>INDICATII PENTRU INTRODUCEREA UNUI NOU TITLU</h4>
            <ul class='instructiuniCreateEntityList'>
                <li>1. <strong>Data obtinerii</strong> - la data obtinerii se introduce doar anul in care jucatorul a obtinut titlul <strong>ex: 2011</strong></li>
            </ul>
        </div><!--ends informatii introducere titlu nou-->
        <div class='span7 offset1'>
            <h3 style='padding-bottom:15px; text-align:center'>CREEAZA UN NOU <?php echo $page_title; ?></h3>
            <?php
              $form_attributes = array('class'=>'form-horizontal');

              $drop_down_title=array();
              foreach($players as $player){
                $drop_down_title[$player->nickname]=$player->nickname;
              }

              $drop_down_id='id="selectPlayer"';

              $input_field_name=array('name'=>'title_name','id'=>'titleName','class'=>'input-large');
              $input_field_date=array('name'=>'title_date','id'=>'titleDate','class'=>'input-large');
              
              

              $submit_btn_attributes=array('name'=>'submitBtn','class' => 'btn', 'type'=>'submit','content'=>'Creeaza Titlu');
            ?>

        <?php 
            echo form_open('index.php/title/create_title', $form_attributes);
        ?>
            <div class="control-group">
                <label class="control-label" for="teamName">Nume titlu</label>
                <div class="controls">
                    <?php echo form_input($input_field_name); ?>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="teamCountry">Data obtinerii</label>
                <div class="controls">
                    <?php echo form_input($input_field_date); ?>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="selectPlayer">Jucator</label>
                <div class="controls">
                    <?php echo form_dropdown('player_nickname',$drop_down_title,'', $drop_down_id); ?>
                </div>
            </div>
            <div class="control-group">
                <div class="controls">
                    <?php echo form_button($submit_btn_attributes);  ?>
                </div>
            </div>
            <?php echo form_close(); ?>
        </div><!--ends form insert new title-->
    </div><!--ends section data-->
</div><!--ends main container-->