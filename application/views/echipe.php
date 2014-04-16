
        
        <div id="mainContentContainer">
            <div id="backgroundMainMenu">
                <div class="row-fluid">
                <div class="span4">
                    <div id="containerLogo">
                       <!--<a href="" target="_self"><img src="imgs/logo_smaller.png" alt="Starcraft2 Vidcasts"/></a>-->
                       <div id="logoTitles">
                           <a href='<?php echo base_url(); ?>' target='_self'><h4 class="miniTitleStarcraft2">Arhiva Starcraft2</h4></a>
                           <a href='http://www.starcraft2-vidcasts.ro' target='self'><h5 class="miniSubtitleVGN">Un proiect Starcraft2-Vidcasts România</h5></a>
                       </div><!--ends logoTitles-->                       
                    </div><!--ends containerLogo-->
                </div><!--ends span4-->
                <div class="span8">
                    <div id="mainMenuContainer">
                        <ul class="mainMenu">
                            <li><a href="<?php echo base_url();?>main/" target="_self">Acasă</a></li>
                            <li><a href="<?php echo base_url();?>main/players" target="_self">Jucători</a></li>
                            <li><a class="activeLink" href="<?php echo base_url();?>main/teams" target="_self">Echipe</a></li>
<!--                            <li><a href="--><?php //echo base_url();?><!--/contribute/ajuta" target="_self">Contribuie</a></li>-->
                            <li><a href="<?php echo base_url();?>contact" target="_self">Contact</a></li>
                        </ul>
                    </div><!--ends mainMenuContainer-->
                    <!--ELEMENTS FOR DROPDOWNS-->
                </div><!--ends span8-->
            </div><!--ends row-fluid-->
            </div><!--ends backgroundMainMenu-->
            
            <div class="row-fluid containerEntities">
                <div class="span12">
                    <div class="sectionDescription">
                        <h1>ECHIPE</h1>
                        <?php
                          $form_attributes = array('class'=>'form-search formSimpleJucator');
                          $input_field_attributes=array('name'=>'search_field_team','class'=>'span12 search-query');
                          $submit_btn_attributes=array('name'=>'submitBtn','class' => 'btn', 'type'=>'submit','content'=>'Caută echipa');
                        ?>
                            <div class="input-append">
                                <?php 
                                    echo form_open('/search/team_results/', $form_attributes);
                                    echo form_input($input_field_attributes);
                                    echo form_button($submit_btn_attributes);
                                    echo form_close();
                                ?>
                            </div>
                        <br class="clearFloats"/>
                        <div class="btn-toolbar containerLetters">
                            <div class="btn-group">
                                <?php echo anchor('/main/find_team/A', 'A', array('class' => 'btn', 'data-toggle'=>'tooltip', 'rel'=>'tooltipAEchipa')); ?>
                                <?php echo anchor('/main/find_team/B', 'B', array('class' => 'btn', 'data-toggle'=>'tooltip', 'rel'=>'tooltipBEchipa')); ?>
                                <?php echo anchor('/main/find_team/C', 'C', array('class' => 'btn', 'data-toggle'=>'tooltip', 'rel'=>'tooltipCEchipa')); ?>
                                <?php echo anchor('/main/find_team/D', 'D', array('class' => 'btn', 'data-toggle'=>'tooltip', 'rel'=>'tooltipDEchipa')); ?>
                                <?php echo anchor('/main/find_team/E', 'E', array('class' => 'btn', 'data-toggle'=>'tooltip', 'rel'=>'tooltipEEchipa')); ?>
                                <?php echo anchor('/main/find_team/F', 'F', array('class' => 'btn', 'data-toggle'=>'tooltip', 'rel'=>'tooltipFEchipa')); ?>
                                <?php echo anchor('/main/find_team/G', 'G', array('class' => 'btn', 'data-toggle'=>'tooltip', 'rel'=>'tooltipGEchipa')); ?>
                                <?php echo anchor('/main/find_team/H', 'H', array('class' => 'btn', 'data-toggle'=>'tooltip', 'rel'=>'tooltipHEchipa')); ?>
                                <?php echo anchor('/main/find_team/I', 'I', array('class' => 'btn', 'data-toggle'=>'tooltip', 'rel'=>'tooltipIEchipa')); ?>
                                <?php echo anchor('/main/find_team/J', 'J', array('class' => 'btn', 'data-toggle'=>'tooltip', 'rel'=>'tooltipJEchipa')); ?>
                                <?php echo anchor('/main/find_team/K', 'K', array('class' => 'btn', 'data-toggle'=>'tooltip', 'rel'=>'tooltipKEchipa')); ?>
                                <?php echo anchor('/main/find_team/L', 'L', array('class' => 'btn', 'data-toggle'=>'tooltip', 'rel'=>'tooltipLEchipa')); ?>
                                <?php echo anchor('/main/find_team/M', 'M', array('class' => 'btn', 'data-toggle'=>'tooltip', 'rel'=>'tooltipMEchipa')); ?>
                                <?php echo anchor('/main/find_team/N', 'N', array('class' => 'btn', 'data-toggle'=>'tooltip', 'rel'=>'tooltipNEchipa')); ?>
                                <?php echo anchor('/main/find_team/O', 'O', array('class' => 'btn', 'data-toggle'=>'tooltip', 'rel'=>'tooltipOEchipa')); ?>
                                <?php echo anchor('/main/find_team/P', 'P', array('class' => 'btn', 'data-toggle'=>'tooltip', 'rel'=>'tooltipPEchipa')); ?>
                                <?php echo anchor('/main/find_team/Q', 'Q', array('class' => 'btn', 'data-toggle'=>'tooltip', 'rel'=>'tooltipQEchipa')); ?>
                                <?php echo anchor('/main/find_team/R', 'R', array('class' => 'btn', 'data-toggle'=>'tooltip', 'rel'=>'tooltipREchipa')); ?>
                                <?php echo anchor('/main/find_team/S', 'S', array('class' => 'btn', 'data-toggle'=>'tooltip', 'rel'=>'tooltipSEchipa')); ?>
                                <?php echo anchor('/main/find_team/T', 'T', array('class' => 'btn', 'data-toggle'=>'tooltip', 'rel'=>'tooltipTEchipa')); ?>
                                <?php echo anchor('/main/find_team/U', 'U', array('class' => 'btn', 'data-toggle'=>'tooltip', 'rel'=>'tooltipUEchipa')); ?>
                                <?php echo anchor('/main/find_team/V', 'V', array('class' => 'btn', 'data-toggle'=>'tooltip', 'rel'=>'tooltipVEchipa')); ?>
                                <?php echo anchor('/main/find_team/W', 'W', array('class' => 'btn', 'data-toggle'=>'tooltip', 'rel'=>'tooltipWEchipa')); ?>
                                <?php echo anchor('/main/find_team/X', 'X', array('class' => 'btn', 'data-toggle'=>'tooltip', 'rel'=>'tooltipXEchipa')); ?>
                                <?php echo anchor('/main/find_team/Y', 'Y', array('class' => 'btn', 'data-toggle'=>'tooltip', 'rel'=>'tooltipYEchipa')); ?>
                                <?php echo anchor('/main/find_team/Z', 'Z', array('class' => 'btn', 'data-toggle'=>'tooltip', 'rel'=>'tooltipZEchipa')); ?>
                            </div>
                        </div>
                    </div><!--ends sectionDescription-->
                </div><!--ends span12--> 
              </div><!--ends row fluid top-->
              <div class='row-fluid containerEntities'>
                  <?php foreach($data_teams as $team): ?>
                    <div class="span3 playerContainerSmall">
                        <h4><?php echo $team->team_name; ?></h4>
                        <ul>
                          <li><p>Număr jucători: <?php echo $team->number_of_players; ?></p></li>
                          <li><p>Țara: <?php echo $team->team_country; ?></p></li>
                        </ul>
                        <?php echo anchor("/main/getTeamDetails/".$team->ID,"Află mai multe despre echipa",array('class'=>'btn btn-success')); ?>
                    </div>
                  <?php endforeach; ?>     
              </div>  
                 
        </div><!--ends mainContentContainer-->
        
