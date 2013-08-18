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
        <h4 style='padding-bottom:20px;'>Informatiile prezente in baza de date pentru jucatorul <?php echo $requested_players[0]->requested_player_nickname ?></h4>
        <div class="alert alert-error">
            <p>ATENTIE! In cazul modificarii echipei, fi sigur ca acea echipa exista in baza de date. Daca nu, atunci te rugam sa folosesti optiunea de CREATE TEAM pentru a introduce noua echipa</p>
        </div>
        <div class='span3'>
            <h4 style="padding-bottom:15px;">Alte informatii</h4>
            <ul>
                <?php foreach($requested_players as $player): ?>
                <li>Nume: <?php echo $player->requested_player_name; ?></li>
                <li>Nickname: <?php echo $player->requested_player_nickname; ?></li>
                <li>Rasa: <?php echo $player->requested_player_race; ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>
    <div class='span4 offset1 formUpdateValuesEntity'>
        <!--form populated with current entity information goes here-->

        <h4 style='padding-bottom:35px; text-align:center'>Formular modificare informatii jucator</h4>
        <?php
        $form_attributes=array('class'=>'form-horizontal');
        $input_field_name=array('name'=>'requested_player_name','id'=>'playerName','class'=>'input-large', 'value'=>$requested_players[0]->requested_player_name);
        $input_field_nickname=array('name'=>"requested_player_nickname",'id'=>'playerNickname','class'=>'input-large', 'value'=>$requested_players[0]->requested_player_nickname);
        //$input_field_current_race=array("name"=>"requested_player_current_race", "class"=>"input-large", "value"=>$requested_players[0]->req);
        $input_field_race=array('name'=>'current_player_race','id'=>'playerRace','class'=>'input-large','readonly'=>'readonly', 'value'=>$requested_players[0]->requested_player_race);



        $input_field_current_player_image=array('name'=>'current_requested_player_image', 'id'=>'playerImageCurrent', 'class'=>'input-large','readonly'=>'readonly', 'value'=>$requested_players[0]->requested_player_image);
        $upload_field_image=array('name'=>'requested_player_image', 'id'=>'playerImage', 'class'=>'input-large', 'type'=>'file', 'enctype'=>'multipart/form-data');

        $drop_down_race=array();
        $drop_down_race["please_select"]="";
        $drop_down_race["Terran"]="Terran";
        $drop_down_race["Zerg"]="Zerg";
        $drop_down_race["Protoss"]="Protoss";

        $drop_down_id = 'id="selectRace"';

        $submit_btn_attributes=array('name'=>'submitBtn','class' => 'btn', 'type'=>'submit','content'=>'Update requested player');
        ?>

        <?php
        echo form_open_multipart('index.php/requested_player/update_requested_player/'. $requested_players[0]->requested_player_id, $form_attributes);
        ?>
        <div class="control-group">
            <label class="control-label" for="playerName">Name</label>
            <div class="controls">
                <?php echo form_input($input_field_name); ?>
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" for="playerNickname">Nickname</label>
            <div class="controls">
                <?php echo form_input($input_field_nickname); ?>
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" for="playerCurrentRace">Current race</label>
            <div class="controls">
                <?php echo form_input($input_field_race); ?>
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" for="playerTeam">Rasa</label>
            <div class="controls">
                <?php echo form_dropdown('requested_player_race',$drop_down_race,'please select',$drop_down_id);?>
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" for="playerCurrentImage">Current Image:</label>
            <div class="controls">
                <?php echo form_input($input_field_current_player_image); ?>
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" for="playerImage">Image</label>
            <div class="controls">
                <?php echo form_upload($upload_field_image); ?>
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