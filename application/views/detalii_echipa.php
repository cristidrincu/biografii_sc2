<div id="mainContentContainer">
            <div id="backgroundMainMenu">
                <div class="row-fluid">
                <div class="span4">
                    <div id="containerLogo">
                       <!--<a href="index.php" target="_self"><img src="imgs/logo_smaller.png" alt="Starcraft2 Vidcasts"/></a>-->
                       <div id="logoTitles">
                           <a href='<?php echo base_url(); ?>' target='_self'><h4 class="miniTitleStarcraft2">Arhiva Starcraft2</h4></a>
                           <a href='http://www.starcraft2-vidcasts.ro' target='self'><h5 class="miniSubtitleVGN">Un proiect Starcraft2-Vidcasts România</h5></a>
                       </div><!--ends logoTitles-->                       
                    </div><!--ends containerLogo-->
                </div><!--ends span4-->
                <div class="span8">
                    <div id="mainMenuContainer">
                        <ul class="mainMenu">
                            <li><a href="<?php echo base_url();?>main/index" target="_self">Acasă</a></li>
                            <li><a href="<?php echo base_url();?>main/players" target="_self">Jucători</a></li>
                            <li><a class="activeLink" href="<?php echo base_url();?>main/teams" target="_self">Echipe</a></li>
<!--                            <li><a href="--><?php //echo base_url();?><!--contribute/ajuta" target="_self">Contribuie</a></li>-->
                            <li><a href="<?php echo base_url();?>contact" target="_self">Contact</a></li>
                        </ul>
                    </div><!--ends mainMenuContainer-->
                    <!--ELEMENTS FOR DROPDOWNS-->
                </div><!--ends span8-->
            </div><!--ends row-fluid-->
            </div><!--ends backgroundMainMenu-->
            
            <div class="row-fluid">
                <div class="span9">
                    <div class="sectionDescription containerEntities">
                        <h1>ECHIPE</h1>
                        <?php
                          $form_attributes = array('class'=>'form-search formSimpleJucator');
                          $input_field_attributes=array('name'=>'search_field_team','class'=>'span12 search-query');
                          $submit_btn_attributes=array('name'=>'submitBtn','class' => 'btn', 'type'=>'submit','content'=>'Caută echipa');
                        ?>
                            <div class="input-append formSearchEntities">
                                <?php 
                                    echo form_open('search/team_results', $form_attributes);
                                    echo form_input($input_field_attributes);
                                    echo form_button($submit_btn_attributes);
                                    echo form_close();
                                ?>
                            </div>
                        <br class="clearFloats"/>
                    </div><!--ends sectionDescription--> 
                    <div class="latestPlayersAddedContainer teamContainer">
                      <!--<?php $team_logo_url; ?>-->
                      <?php foreach($data_certain_team as $team): ?>
                      <div class='span4 teamLogo'>
                        <img src="<?=IMG_URL.$team->team_logo;?>" />
                      </div>
                      <div class='span8'>
                          <h3 class='teamName'><?php echo $team->team_name; ?></h3>
                          <h4 class='teamCountry'>Tara de origine: <?php echo $team->team_country; ?></h4>
                          <h4 class='teamCountry'>Echipa fondata in: <?php echo $team->team_found_date; ?></h4>
                          <h4 class='teamCountry'>Manager echipa: <?php echo $team->team_manager; ?></h4>
                          <h4 class='teamCountry'>Sponsori echipa: <?php echo $team->team_sponsors; ?></h4>
                          <h4 class='teamDescriptionTitle'>Descriere echipa: </h4>
                          <p class='teamDescription'><?php echo $team->team_description; ?></p>
                      </div>
                    <?php endforeach; ?>
                    <div class='span12 containerComponentiEchipa'>
                        <h4 class="titleComponentiEchipa">COMPONENTI ECHIPA</h4>
                          <?php foreach($data_team as $player): ?>
                               <div class="span3 playerContainerSmall">
                                  <h4><?php echo $player->nickname; ?></h4>
                                  <ul>
                                    <li><p>Nume: <?php echo $player->name; ?></p></li>
                                    <li><p>Rasa: <?php echo $player->race; ?></p></li>
                                </ul>
                                <?php echo anchor("main/getPlayerDetails/$player->player_ID", "Citeşte mai mult!", array("class"=>"btn btn-success")); ?>
                              </div>
                          <?php endforeach; ?>   
                    </div>
                    </div><!--ends latestPlayersAddedContainer-->
                </div><!--ends span8-->
            </div>     
        </div><!--ends mainContentContainer-->
        
