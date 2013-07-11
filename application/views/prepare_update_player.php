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
  		<h4 style='padding-bottom:20px;'>Informatiile prezente in baza de date pentru jucatorul <?php echo $player_details[0]->name ?></h4>
  		<div class="alert alert-error">
  			<p>ATENTIE! In cazul modificarii echipei, fi sigur ca acea echipa exista in baza de date. Daca nu, atunci te rugam sa folosesti optiunea de CREATE TEAM pentru a introduce noua echipa</p>
  		</div>
  		<div class='span3'>
        <h4 style="padding-bottom:15px;">Alte informatii</h4>
  			<ul>
  			<?php foreach($player_details as $player): ?>
  				<li>Nume: <?php echo $player->nickname; ?></li>
  				<li>Nickname: <?php echo $player->nickname; ?></li>
  				<li>Data nasterii: <?php echo $player->DOB; ?></li>
  				<li>Tara: <?php echo $player->country; ?></li>
  				<li>Rasa: <?php echo $player->race; ?></li>
  				<li>Echipa: <?php echo $player->team_name; ?></li>
  			<?php endforeach; ?>
  		</ul>
  		</div>
  		<div class='span9'>
  			<h4 style="padding-bottom:15px;">Descrierea jucatorului</h4>
  			<p style='line-height:25px;'><?php echo $player->description; ?></p>
  		</div>
	</div>
	<div class='span4 offset1 formUpdateValuesEntity'>
		<!--form populated with current entity information goes here-->
		
		<h4 style='padding-bottom:35px; text-align:center'>Formular modificare informatii jucator</h4>
		<?php
			$form_attributes=array('class'=>'form-horizontal');
			$input_field_name=array('name'=>'player_name','id'=>'playerName','class'=>'input-large', 'value'=>$player_details[0]->name);
          	$input_field_nickname=array('name'=>'player_nickname','id'=>'playerNickname','class'=>'input-large', 'value'=>$player_details[0]->nickname);
          	$input_field_dob=array('name'=>'player_dob', 'id'=>'playerDOB', 'class'=>'input-large', 'value'=>$player_details[0]->DOB);
          	$input_field_country=array('name'=>'player_country','id'=>'playerCountry','class'=>'input-large', 'value'=>$player_details[0]->country);
          	$input_field_race=array('name'=>'player_race','id'=>'playerRace','class'=>'input-large', 'value'=>$player_details[0]->race);
          	$input_field_winnings=array('name'=>'player_winnings','id'=>'playerWinnings','class'=>'input-large', 'value'=>$player_details[0]->winnings);
          	$input_field_team=array('name'=>'player_team', 'id'=>'playerTeam', 'class'=>'input-large','readonly'=>'readonly','value'=>$player_details[0]->team_name);
          	$text_area_description=array('name'=>'player_description', 'id'=>'playerDescription', 'class'=>'input-large','value'=>$player_details[0]->description);
            $input_field_current_player_image=array('name'=>'player_image_current', 'id'=>'playerImageCurrent', 'class'=>'input-large','readonly'=>'readonly', 'value'=>$player_details[0]->player_image);
            $upload_field_image=array('name'=>'player_image', 'id'=>'playerImage', 'class'=>'input-large', 'type'=>'file', 'enctype'=>'multipart/form-data');
            $keywords_field_actual=array('name'=>'player_keywords_actual', 'id'=>'playerKeywords', 'class'=>'input-large', 'readonly'=>'readonly', 'value'=>$player_details[0]->player_keywords);
            $keywords_field=array('name'=>'player_keywords', 'id'=>'playerKeywords', 'class'=>'input-large');

          	$drop_down_team=array();
          	$drop_down_team['please_select']='';
          	foreach($teams as $team){
             $drop_down_team[$team->team_name]=$team->team_name;
          	}



          	$drop_down_id = 'id="selectTeam"';

          	$submit_btn_attributes=array('name'=>'submitBtn','class' => 'btn', 'type'=>'submit','content'=>'Update player');
		 ?>

		 <?php 
            echo form_open_multipart('index.php/player/update_player/'. $player_details[0]->player_ID, $form_attributes);
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
            <div class="control-group">
                <label class="control-label" for="playerRace">Race</label>
                <div class="controls">
                    <?php echo form_input($input_field_race); ?>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="playerTeam">Echipa actuala</label>
                <div class="controls">
                    <?php echo form_input($input_field_team); ?>
                </div>
            </div>
            <div class="control-group">
            	<label class="control-label" for="playerTeam">Alege echipa</label>
            	<div class="controls">
                    <?php echo form_dropdown('update_player',$drop_down_team,'please select',$drop_down_id);?> 
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="playerWinnings">Winnings</label>
                <div class="controls">
                    <?php echo form_input($input_field_winnings); ?>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="playerDescription">Description</label>
                <div class="controls">
                    <?php echo form_textarea($text_area_description); ?>
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
                <label class="control-label" for="playerKeywordsActual">Cuvinte cheie actuale</label>
                <div class="controls">
                    <?php echo form_input($keywords_field_actual); ?>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="playerKeywords">Cuvinte cheie</label>
                    <div class="controls">
                        <?php echo form_input($keywords_field); ?>
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