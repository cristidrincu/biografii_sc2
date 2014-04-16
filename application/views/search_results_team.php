
        
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
                <div class="span12">
                    <div class="sectionDescription containerEntities">
                        <h1>REZULTATE CĂUTARE</h1>
                        <?php
                          $form_attributes = array('class'=>'form-search formSimpleJucator');
                          $input_field_attributes=array('name'=>'search_field_team','class'=>'span12 search-query');
                          $submit_btn_attributes=array('name'=>'submitBtn','class' => 'btn', 'type'=>'submit','content'=>'Caută echipa');
                        ?>
                            <div class="input-append">
                                <?php 
                                    echo form_open('search/team_results/', $form_attributes);
                                    echo form_input($input_field_attributes);
                                    echo form_button($submit_btn_attributes);
                                    echo form_close();
                                ?>
                            </div>
                        <br class="clearFloats"/>
                        <p class="mesajRezultateCautare">Fiecare din echipele existente au asociaţi şi jucătorii din cadrul lor. Pentru unele echipe veţi găsi toţi jucătorii, pentru altele doar cei mai importanţi, însă vor exista echipe cărora nu am apucat să le asociem nici un jucător. Va mulţumim pentru înţelegere!</p>
                    </div><!--ends sectionDescription--> 
                    <div class="latestPlayersAddedContainer">
                          <?php foreach($search_results_team_name as $result): ?>
                               <div class="span3 playerContainerSmall">
                                <h4><?php echo $result->team_name; ?></h4>
                                <ul>
                                  <li><p>Țara: <?php echo $result->team_country; ?></p></li>
                                  <li><p>Numar jucatori: <?php echo $result->number_of_players; ?></p></li>
                                </ul>
                                <?php echo anchor("main/getTeamDetails/$result->ID","Află mai multe despre echipa",array('class'=>'btn btn-success')); ?>
                            </div>
                          <?php endforeach; ?>      
                    </div><!--ends latestPlayersAddedContainer-->
                </div><!--ends span8-->
            </div>     
        </div><!--ends mainContentContainer-->
        
