<div class='row-fluid mainContentContainer'>
    <div class="navbar">
        <div class="navbar-inner">
            <a class="brand" href="<?php echo base_url(); ?>home/index">ADMINISTRATION AREA</a>
                <ul class="nav pull-right">
                  <li class='username'>Bine ai venit, <?php echo $username; ?> </li>  
                  <li><?php echo anchor("home/logout","Logout", "");?></li>
                </ul>
  		</div>
  	</div>
  	<div class='span7 currentValuesEntity'>
  		<h4>Informatiile prezente in baza de date pentru echipa <?php echo $team_details[0]->team_name ?></h4>
  		<div class='span3'>
  			<ul>
  			<?php foreach($team_details as $team): ?>
  				<li>Nume: <?php echo $team->team_name; ?></li>
  				<li>Tara: <?php echo $team->team_country; ?></li>
  				<li>Numar jucatori: <?php echo $team->number_of_players; ?></li>
          <li>Fondata in: <?php echo $team->team_found_date; ?></li>
          <li>Manager echipa: <?php echo $team->team_manager; ?></li>
          <li>Team Sponsors: <?php echo $team->team_sponsors; ?></li>
  			<?php endforeach; ?>
  		</ul>
  		</div>
	</div>
	<div class='span5 formUpdateValuesEntity'>
		<!--form populated with current entity information goes here-->
		
		<h4>Formular modificare informatii echipa</h4>
		<?php
			$form_attributes=array('class'=>'form-horizontal');
			$input_field_name=array('name'=>'team_name','id'=>'teamName','class'=>'input-large', 'value'=>$team_details[0]->team_name);
          	$input_field_country=array('name'=>'team_country','id'=>'teamCountry','class'=>'input-large', 'value'=>$team_details[0]->team_country);
          	$input_field_number_players=array('name'=>'team_number_of_players', 'id'=>'teamNumberPlayers', 'class'=>'input-large', 'value'=>$team_details[0]->number_of_players);
            $text_area_description=array('name'=>'team_description', 'id'=>'teamDescription', 'class'=>'input-large', 'value'=>$team_details[0]->team_description);
            $input_field_team_founed=array('name'=>'team_founded', 'id'=>'teamFounded', 'class'=>'input-large', 'value'=>$team_details[0]->team_found_date);
            $input_field_team_manager=array('name'=>'team_manager', 'id'=>'teamManager', 'class'=>'input-large', 'value'=>$team_details[0]->team_manager);
            $input_field_team_sponsors=array('name'=>'team_sponsors', 'id'=>'teamSponsors', 'class'=>'input-large', 'value'=>$team_details[0]->team_sponsors);
            $input_field_current_team_logo=array('name'=>'team_logo_current', 'id'=>'teamCurrentLogo', 'class'=>'input-large', 'readonly'=>'readonly', 'value'=>$team_details[0]->team_logo);
            $upload_team_logo=array('name'=>'teamLogoUpload', 'id'=>'teamUpload', 'class'=>'input-large', 'type'=>'file', 'size'=>'20', 'enctype'=>'multipart/form-data');

          	$submit_btn_attributes=array('name'=>'submitBtn','class' => 'btn', 'type'=>'submit','content'=>'Update team');
		 ?>

		 <?php 
            echo form_open_multipart('team/update_team/'. $team_details[0]->ID, $form_attributes);
        ?>
            <div class="control-group">
                <label class="control-label" for="teamName">Name</label>
                <div class="controls">
                    <?php echo form_input($input_field_name); ?>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="teamCountry">Tara</label>
                <div class="controls">
                    <?php echo form_input($input_field_country); ?>
                </div>
            </div>
             <div class="control-group">
                <label class="control-label" for="teamNumberOfPlayers">Number of Players</label>
                <div class="controls">
                    <?php echo form_input($input_field_number_players); ?>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="teamDescription">Description</label>
                <div class="controls">
                    <?php echo form_textarea($text_area_description); ?>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="teamFounded">Founded:</label>
                <div class="controls">
                    <?php echo form_input($input_field_team_founed); ?>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="teamManager">Team Manager:</label>
                <div class="controls">
                    <?php echo form_input($input_field_team_manager); ?>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="teamSponsors">Team Sponsors:</label>
                <div class="controls">
                    <?php echo form_textarea($input_field_team_sponsors); ?>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="teamCurrentLogo">Team Current Logo:</label>
                <div class="controls">
                    <?php echo form_input($input_field_current_team_logo); ?>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="teamUploadLogo">Team Logo</label>
                <div class="controls">
                    <?php echo form_upload($upload_team_logo); ?>
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