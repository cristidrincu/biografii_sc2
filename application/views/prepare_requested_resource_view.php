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
                <div id="collapseOne" class="accordion-body">
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
                <div id="collapseThree" class="accordion-body collapse">
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
            <div class="accordion-group">
                <div class="accordion-heading">
                    <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseFive">
                        CRUD operations for REQUESTED PLAYER entity
                    </a>
                </div>
                <div id="collapseFive" class="accordion-body collapse in">
                    <div class="accordion-inner">
                        <?php echo anchor("index.php/requested_player/prepare_requested_player", "CREATE Request", array("class"=>"btn")); ?>
                        <?php echo anchor("index.php/requested_player/read_requested_player", "READ Request", array("class"=>"btn")); ?>
                    </div>
                </div>
            </div><!--ends requested_player entity options-->
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
                <div id="collapseOneRo" class="accordion-body collapse in">
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
                <div id="collapseThreeRo" class="accordion-body collapse">
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
        <h4 style='padding-bottom:15px;'>INDICATII PENTRU INTRODUCEREA UNUI NOU JUCATOR CARE ARE NEVOIE DE O TRADUCERE</h4>
        <ul class='instructiuniCreateEntityList'>
            <li>1. <strong>Nume</strong> - in campul nume se va introduce atat numele de familie cat si numele mic - <strong>ex: Benjamin Baker</strong></li>
            <li>2. <strong>Nickname</strong> - in campul nickname se va introduce porecla jucatorului - <strong>ex: DeMuslim</strong></li>
            <li>3. <strong>Data nasterii</strong> - modelul pentru introducerea datei de nastere este urmatorul: an-luna-zi - <strong>ex: 1990-01-24</strong></li>
            <li>4. <strong>Echipa</strong> - inainte de a introduce un nou jucator, fi sigur ca echipa din care face parte <strong>exista!</strong></li>
            <li>5. <strong>Castiguri</strong> - castigurile se introduc FARA punct si FARA virgula intre cifre - <strong>ex: 120000</strong></li>
        </ul>
    </div><!--ends indicatii insert player-->
    <div class='span7 offset1'>
        <h3 style='text-align:center;padding-bottom:15px;'>CREAZA O NOUA <?php echo $page_title; ?></h3>
        <?php
        $form_attributes = array('class'=>'form-horizontal');
        $input_field_name=array('name'=>'resource_name','id'=>'requestedResourceName','class'=>'input-large');
        $input_field_link=array('name'=>'resource_link','id'=>'requestedResourceLink','class'=>'input-large');

        $drop_down_player_nickname=array();
        foreach($requested_players as $player){
            $drop_down_player_nickname[$player->requested_player_nickname]=$player->requested_player_nickname;
        }
        $drop_down_id = 'id="selectPlayerName"';

        $submit_btn_attributes=array('name'=>'submitBtn','class' => 'btn', 'type'=>'submit','content'=>'Creaza Request');

        //display form
        echo form_open_multipart('index.php/resources_requested_player/create_requested_resource', $form_attributes);
        ?>

        <div class="control-group">
            <label class="control-label" for="resourceName">Nume Resursa</label>
            <div class="controls">
                <?php echo form_input($input_field_name); ?>
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" for="resourceLink">Link</label>
            <div class="controls">
                <?php echo form_input($input_field_link); ?>
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" for="selectRace">Jucator</label>
            <div class="controls">
                <?php echo form_dropdown('resource_player_nickname',$drop_down_player_nickname,'',$drop_down_id); //name = player_team?>
            </div>
        </div>
        <div class="control-group">
            <div class="controls">
                <?php echo form_button($submit_btn_attributes);  ?>
            </div>
        </div>

        <?php echo form_close(); ?>
    </div><!--ends form insert new player-->
</div><!--ends section data-->
</div><!--ends main container-->