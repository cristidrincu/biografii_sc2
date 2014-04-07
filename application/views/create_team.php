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
    <div class='span12 reportsOperationsArea'>
        <div class='span11 alert alert-error'>
            <h4 style='padding-bottom:15px;'>INDICATII PENTRU INTRODUCEREA UNEI NOI ECHIPE</h4>
            <ul class='instructiuniCreateEntityList'>
                <li>1. <strong>Data infiintarii</strong> - spre diferenta de data nasterii pentru un jucator, data infiintarii unei echipe poate fi introdusa mai simplu  <strong>ex: 19 Iulie 2011</strong></li>
                <li>2. <strong>Sponsori</strong> - sponsorii se introduc unii dupa altii, cu virgula dupa fiecare - <strong>ex: Twitch, Red Bull, Intel</strong></li>
            </ul>
        </div>
        <div class='span12'>
        <?php
          $form_attributes = array('class'=>'form-horizontal');
          $input_field_name=array('name'=>'team_name','id'=>'teamName','class'=>'input-large', 'required' => 'required');
          $input_field_country=array('name'=>'team_country','id'=>'teamCountry','class'=>'input-large', 'required' => 'required');
          $input_field_players=array('name'=>'team_number_of_players', 'id'=>'teamNumbPlayers', 'class'=>'input-large', 'required' => 'required');
          $text_area_description=array('name'=>'team_description', 'id'=>'teamDescription', 'class'=>'input-large', 'required' => 'required');
          $input_field_team_founed=array('name'=>'team_founded', 'id'=>'teamFounded', 'class'=>'input-large', 'required' => 'required');
          $input_field_team_manager=array('name'=>'team_manager', 'id'=>'teamManager', 'class'=>'input-large', 'required' => 'required');
          $text_area_team_sponsors=array('name'=>'team_sponsors', 'id'=>'teamSponsors', 'class'=>'input-large', 'required' => 'required');
          $upload_team_logo=array('name'=>'teamLogoUpload', 'id'=>'teamUpload', 'class'=>'input-large', 'type'=>'file', 'size'=>'20', 'enctype'=>'multipart/form-data');
          

          $submit_btn_attributes=array('name'=>'submitBtn','class' => 'btn btn-success', 'type'=>'submit','content'=>'Creeaza echipa');
        ?>

        <?php 
            echo form_open_multipart('index.php/team/create_team', $form_attributes);
        ?>
        <div class="formBreaker span3">
            <div class="control-group">
                <label class="control-label" for="teamName">Nume</label>
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
                <label class="control-label" for="teamNumbPlayers">Numar jucatori</label>
                <div class="controls">
                    <?php echo form_input($input_field_players); ?>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="teamFoundDate">Data infiintarii</label>
                <div class="controls">
                    <?php echo form_input($input_field_team_founed); ?>
                </div>
            </div>

        </div>
        <div class="formBreaker span3">
            <div class="control-group">
                <label class="control-label" for="teamManager">Manager echipa</label>
                <div class="controls">
                    <?php echo form_input($input_field_team_manager); ?>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="teamUploadLogo">Logo echipa</label>
                <div class="controls">
                    <?php echo form_upload($upload_team_logo); ?>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="teamSponsors">Sponsori</label>
                <div class="controls">
                    <?php echo form_textarea($text_area_team_sponsors); ?>
                </div>
            </div>
        </div>
        <div class="formBreaker span4">
            <div class="control-group">
                <label class="control-label" for="teamDescription">Descriere</label>
                <div class="controls">
                    <?php echo form_textarea($text_area_description); ?>
                </div>
            </div>
        </div>

        <div class="formBreakerSubmit span12">
            <div class="control-group">
                <div class="controls">
                    <?php echo form_button($submit_btn_attributes);  ?>
                </div>
            </div>
        </div>
        <?php echo form_close(); ?>
        </div><!--ends form container create new team-->
        
        

    </div><!--ends section data-->
</div><!--ends main container-->