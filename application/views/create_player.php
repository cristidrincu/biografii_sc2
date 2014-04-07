<div class='row-fluid mainContentContainer'>
    <div class="navbar">
        <div class="navbar-inner breakerMainForm">
            <a class="brand" href="<?php echo base_url(); ?>home/index">ADMINISTRATION AREA - CREATE <?php echo $page_title; ?></a>
                <ul class="nav pull-right">
                  <li class='username'>Bine ai venit, <?php echo $username; ?> </li>  
                  <li><?php echo anchor("home/logout","Logout", "");?></li>
                </ul>
  </div>
</div>
    <div class='span12 reportsOperationsArea'>
        <div class='span12'>
        <?php
          $form_attributes = array('class'=>'form-horizontal');
          $input_field_name=array('name'=>'player_name','id'=>'playerName','class'=>'input-large', 'required' => 'required');
          $input_field_nickname=array('name'=>'player_nickname','id'=>'playerNickname','class'=>'input-large', 'required' => 'required');
          $input_field_dob=array('name'=>'player_dob', 'id'=>'playerDOB', 'class'=>'input-large', 'required' => 'required');
          $input_field_country=array('name'=>'player_country','id'=>'playerCountry','class'=>'input-large', 'required' => 'required');
          $input_field_race=array('name'=>'player_race','id'=>'playerRace','class'=>'input-large', 'required' => 'required');
          $upload_field_image=array('name'=>'player_image', 'id'=>'playerImage', 'class'=>'input-large', 'type'=>'file', 'enctype'=>'multipart/form-data');
          $keywords_field=array('name'=>'player_keywords', 'id'=>'playerKeywords', 'class'=>'input-large', 'required' => 'required');

          $drop_down_team=array();
          foreach($teams as $team){
             $drop_down_team[$team->team_name]=$team->team_name;
          }
          $drop_down_id = 'id="selectTeam"';

          $input_field_winnings = array('name'=>'player_winnings','id'=>'playerWinnings','class'=>'input-large', 'required' => 'required');
          $text_area_description = array('name'=>'player_description', 'id'=>'playerDescription', 'class'=>'input-large player-description', 'required' => 'required');

          $submit_btn_attributes = array('name'=>'submitBtn','class' => 'btn btn-success', 'type' => 'submit','value' => 'Creeaza Jucator');
        ?>

        <?php 
            echo form_open_multipart('player/create_player', $form_attributes);
        ?>
            <div class="formBreaker span3">
                <div class="control-group">
                    <label class="control-label" for="playerName">Nume</label>
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
                    <label class="control-label" for="playerDOB">Data nasterii</label>
                    <div class="controls">
                        <?php echo form_input($input_field_dob); ?>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="playerCountry">Tara</label>
                    <div class="controls">
                        <?php echo form_input($input_field_country); ?>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="playerRace">Rasa</label>
                    <div class="controls">
                        <?php echo form_input($input_field_race); ?>
                    </div>
                </div>
            </div>

            <div class="formBreaker span3">
                <div class="control-group">
                    <label class="control-label" for="selectTeam">Echipa</label>
                    <div class="controls">
                        <?php echo form_dropdown('player_team',$drop_down_team,'',$drop_down_id); //name = player_team?>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="playerWinnings">Castiguri</label>
                    <div class="controls">
                        <?php echo form_input($input_field_winnings); ?>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="playerImage">Imagine jucator</label>
                    <div class="controls">
                        <?php echo form_upload($upload_field_image); ?>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="playerKeywords">Cuvinte cheie</label>
                    <div class="controls">
                        <?php echo form_input($keywords_field); ?>
                    </div>
                </div>
            </div>

            <div class="formBreaker span2">
                <div class="control-group">
                    <label class="control-label" for="playerDescription">Descriere</label>
                    <div class="controls">
                        <?php echo form_textarea($text_area_description); ?>
                    </div>
                </div>
            </div>

            <div class="formBreakerSubmit span12">
                <div class="control-group">
                    <div class="controls">
                        <?php echo form_submit($submit_btn_attributes);  ?>
                    </div>
                </div>
            </div>

            
            <?php echo form_close(); ?>
        </div><!--ends form insert new player-->
    </div><!--ends section data-->
</div><!--ends main container-->