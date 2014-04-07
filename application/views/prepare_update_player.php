<div class='row-fluid mainContentContainer'>
    <div class="navbar">
        <div class="navbar-inner breakerMainForm">
            <a class="brand" href="<?php echo base_url(); ?>home/index">ADMINISTRATION AREA</a>
                <ul class="nav pull-right">
                  <li class='username'>Bine ai venit, <?php echo $username; ?> </li>  
                  <li><?php echo anchor("home/logout","Logout", "");?></li>
                </ul>
  		</div>
  	</div>
	<div class='span7 formUpdateValuesEntity'>
		<?php
			$form_attributes=array('class'=>'form-horizontal');
			$input_field_name=array('name'=>'player_name','id'=>'playerName','class'=>'input-large', 'value'=>$player_details[0]->name);
          	$input_field_nickname=array('name'=>'player_nickname','id'=>'playerNickname','class'=>'input-large', 'value'=>$player_details[0]->nickname);
          	$input_field_dob=array('name'=>'player_dob', 'id'=>'playerDOB', 'class'=>'input-large', 'value'=>$player_details[0]->DOB);
          	$input_field_country=array('name'=>'player_country','id'=>'playerCountry','class'=>'input-large', 'value'=>$player_details[0]->country);
          	$input_field_race=array('name'=>'player_race','id'=>'playerRace','class'=>'input-large', 'value'=>$player_details[0]->race);
          	$input_field_winnings=array('name'=>'player_winnings','id'=>'playerWinnings','class'=>'input-large', 'value'=>$player_details[0]->winnings);
          	$input_field_team=array('name'=>'player_team', 'id'=>'playerTeam', 'class'=>'input-large','readonly'=>'readonly','value'=>$player_details[0]->team_name);
          	$text_area_description=array('name'=>'player_description', 'id'=>'playerDescription', 'class'=>'input-large player-description','value'=>$player_details[0]->description);
            $input_field_current_player_image=array('name'=>'player_image_current', 'id'=>'playerImageCurrent', 'class'=>'input-large','readonly'=>'readonly', 'value'=>$player_details[0]->player_image);
            $upload_field_image=array('name'=>'player_image', 'id'=>'playerImage', 'class'=>'input-large', 'type'=>'file', 'enctype'=>'multipart/form-data');
            $keywords_field_actual=array('name'=>'player_keywords_actual', 'id'=>'playerKeywords', 'class'=>'input-large keywords-actual', 'readonly'=>'readonly', 'value'=>$player_details[0]->player_keywords);
            $keywords_field=array('name'=>'player_keywords', 'id'=>'playerKeywords', 'class'=>'input-large add-new-keywords');

          	$drop_down_team=array();
          	$drop_down_team['please_select']='';
          	foreach($teams as $team){
             $drop_down_team[$team->team_name]=$team->team_name;
          	}

          	$drop_down_id = 'id="selectTeam"';

          	$submit_btn_attributes = array('name' => 'submitBtn','class' => 'btn btn-success', 'type' => 'submit', 'value' => "Update Player");
		 ?>

		 <?php
            echo form_open_multipart('player/update_player/'. $player_details[0]->player_ID, $form_attributes);
        ?>
        <div class="formBreaker span5">
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
                <label class="control-label" for="playerDOB">Date of Birth</label>
                <div class="controls">
                    <?php echo form_input($input_field_dob); ?>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="playerCountry">Country</label>
                <div class="controls">
                    <?php echo form_input($input_field_country); ?>
                </div>
            </div>
        </div>

        <div class="formBreaker span5">
            <div class="control-group">
                <label class="control-label" for="playerRace">Race</label>
                <div class="controls">
                    <?php echo form_input($input_field_race); ?>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="playerTeam">Echipa</label>
                <div class="controls">
                    <?php echo form_input($input_field_team); ?>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="playerTeam">Alta echipa</label>
                <div class="controls">
                    <?php echo form_dropdown('update_player_team',$drop_down_team,'please select',$drop_down_id);?>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="playerWinnings">Winnings</label>
                <div class="controls">
                    <?php echo form_input($input_field_winnings); ?>
                </div>
            </div>
        </div>


        <div class="formBreaker span2">
            <div class="control-group">
                <label class="control-label" for="playerDescription">Description</label>
                <div class="controls">
                    <?php echo form_textarea($text_area_description); ?>
                </div>
            </div>
        </div>

        <div class="formBreaker span10">
            <div class="control-group">
                <label class="control-label" for="playerKeywordsActual">Cuvinte cheie actuale</label>
                <div class="controls">
                    <?php echo form_input($keywords_field_actual); ?>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="playerKeywords">Adauga cuvinte cheie</label>
                <div class="controls">
                    <?php echo form_input($keywords_field); ?>
                </div>
            </div>
        </div>

        <div class="formBreaker span5">
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
        </div>
        <div class="formBreakerSubmit span12">
            <div class="control-group">
                <div class="controls">
                    <?php echo form_submit($submit_btn_attributes); ?>
                </div>
            </div>
        </div>
        <?php
            echo form_close();
        ?>
	</div>
</div>