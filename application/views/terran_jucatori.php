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
                            <li><a class="activeLink" href="<?php echo base_url();?>main/players" target="_self">Jucători</a></li>
                            <li><a href="<?php echo base_url();?>main/teams" target="_self">Echipe</a></li>
<!--                            <li><a href="--><?php //echo base_url();?><!--contribute/ajuta" target="_self">Contribuie</a></li>-->
                            <li><a href="<?php echo base_url();?>contact" target="_self">Contact</a></li>
                        </ul>
                    </div><!--ends mainMenuContainer-->
                    <!--ELEMENTS FOR DROPDOWNS-->
                </div><!--ends span8-->
            </div><!--ends row-fluid-->
            </div><!--ends backgroundMainMenu-->
            
            <div class="row-fluid">
                <div class="span3 sidebarMenu">
                    <div class="sidebarContainer">
                        <div class="terranContainerImage">

                            <div class="containerScurtaDescriereTerran">
                                <div class="containerLogoRasa">
                                    <ul>
                                        <li><img src="<?php echo base_url(); ?>imgs/logo_terran_thumb.png" alt="Terran"/></li>
                                        <li><h3>Terran</h3></li>
                                    </ul>
                                </div>
                                <div class="containerTextDescriereRasa">
                                    <p>Am introdus în cadrul secţiunii Terrane jucători cu renume mondial, gen Kas, MVP, Marine King Prime şi alţii. Vei putea citi biografiile celor mai puternici terrani Coreeni, însă şi a celor care vin încet din urmă, aşa cum este spaniolul Lucifron!</p>
                                </div>
                                <br class="clearFloats"/>
                                <a href='<?php echo base_url();  ?>main/terran_players' class='btn btn-primary'>Afişează</a>
                            </div>

                            <!--<hr class="divider races"/>-->
                        </div><!--ends terranContainerImage-->
                        <div class="terranContainerImage">
                            <div class="containerScurtaDescriereTerran">
                                <div class="containerLogoRasa">
                                    <ul>
                                        <li><img src="<?php echo base_url(); ?>imgs/zerg_logo_png_thumb.png" alt="Zerg"/></li>
                                        <li><h3>Zerg</h3></li>
                                    </ul>
                                </div>
                                <div class="containerTextDescriereRasa">
                                    <p>Nume precum Nestea, Zenio, Life şi mulţi alţii îşi au biografiile în cadrul acestei secţiuni. Află totul despre ei, de la începutul carierei de PRO GAMER şi până în acest moment, cât şi motivul pentru care au ales să joace acesta rasă.</p>
                                </div>
                                <br class="clearFloats"/>
                                <a href='<?php echo base_url(); ?>main/zerg_players' class='btn btn-primary'>Afişează</a>
                            </div>

                            <!--hr class="divider"/>-->
                        </div><!--ends terranContainerImage-->
                        <div class="terranContainerImage">
                            <div class="containerScurtaDescriereTerran">
                                <div class="containerLogoRasa">
                                    <ul>
                                        <li><img src="<?php echo base_url(); ?>imgs/protoss_logo_thumb.png" alt="Protoss"/></li>
                                        <li><h3>Protoss</h3></li>
                                    </ul>
                                </div>
                                <div class="containerTextDescriereRasa">
                                    <p>Huk, Parting, Socke - nume sonore în cadrul adunării protosiene, cu rezultate remarcabile, te aşteaptă să le citeşti biografiile şi să le afli rezultatele obţinute în cadrul concursurilor internaţionale la care au participat. O secţiune în care DigitalWaves a muncit la greu. Prietenii ştiu de ce!</p>
                                </div>
                                <br class="clearFloats"/>
                                <a href='<?php echo base_url(); ?>main/protoss_players' class='btn btn-primary'>Afişează</a>
                            </div>
                        </div><!--ends terranContainerImage-->
                    </div>
                </div>
                <div class="span9">
                    <div class="sectionDescription containerEntities">
                        <h1>TERRAN</h1>
                        <?php
                          $form_attributes = array('class'=>'form-search formSimpleJucator');
                          $input_field_attributes=array('name'=>'search_field','class'=>'span12 search-query');
                          $submit_btn_attributes=array('name'=>'submitBtn','class' => 'btn', 'type'=>'submit','content'=>'Cauta jucator');
                        ?>
                            <div class="input-append">
                                <?php 
                                    echo form_open('search/results', $form_attributes);
                                    echo form_input($input_field_attributes);
                                    echo form_button($submit_btn_attributes);
                                    echo form_close();
                                ?>
                            </div>
                        <br class="clearFloats"/>
                        <div class="btn-toolbar containerLetters">
                            <div class="btn-group">
                                <?php echo anchor('main/find_player/A/Terran', 'A', array('class' => 'btn', 'data-toggle'=>'tooltip', 'rel'=>'tooltipA')); ?>
                                <?php echo anchor('main/find_player/B/Terran', 'B', array('class' => 'btn', 'data-toggle'=>'tooltip', 'rel'=>'tooltipB')); ?>
                                <?php echo anchor('main/find_player/C/Terran', 'C', array('class' => 'btn', 'data-toggle'=>'tooltip', 'rel'=>'tooltipC')); ?>
                                <?php echo anchor('main/find_player/D/Terran', 'D', array('class' => 'btn', 'data-toggle'=>'tooltip', 'rel'=>'tooltipD')); ?>
                                <?php echo anchor('main/find_player/E/Terran', 'E', array('class' => 'btn', 'data-toggle'=>'tooltip', 'rel'=>'tooltipE')); ?>
                                <?php echo anchor('main/find_player/F/Terran', 'F', array('class' => 'btn', 'data-toggle'=>'tooltip', 'rel'=>'tooltipF')); ?>
                                <?php echo anchor('main/find_player/G/Terran', 'G', array('class' => 'btn', 'data-toggle'=>'tooltip', 'rel'=>'tooltipG')); ?>
                                <?php echo anchor('main/find_player/H/Terran', 'H', array('class' => 'btn', 'data-toggle'=>'tooltip', 'rel'=>'tooltipH')); ?>
                                <?php echo anchor('main/find_player/I/Terran', 'I', array('class' => 'btn', 'data-toggle'=>'tooltip', 'rel'=>'tooltipI')); ?>
                                <?php echo anchor('main/find_player/J/Terran', 'J', array('class' => 'btn', 'data-toggle'=>'tooltip', 'rel'=>'tooltipJ')); ?>
                                <?php echo anchor('main/find_player/K/Terran', 'K', array('class' => 'btn', 'data-toggle'=>'tooltip', 'rel'=>'tooltipK')); ?>
                                <?php echo anchor('main/find_player/L/Terran', 'L', array('class' => 'btn', 'data-toggle'=>'tooltip', 'rel'=>'tooltipL')); ?>
                                <?php echo anchor('main/find_player/M/Terran', 'M', array('class' => 'btn', 'data-toggle'=>'tooltip', 'rel'=>'tooltipM')); ?>
                                <?php echo anchor('main/find_player/N/Terran', 'N', array('class' => 'btn', 'data-toggle'=>'tooltip', 'rel'=>'tooltipN')); ?>
                                <?php echo anchor('main/find_player/O/Terran', 'O', array('class' => 'btn', 'data-toggle'=>'tooltip', 'rel'=>'tooltipO')); ?>
                                <?php echo anchor('main/find_player/P/Terran', 'P', array('class' => 'btn', 'data-toggle'=>'tooltip', 'rel'=>'tooltipP')); ?>
                                <?php echo anchor('main/find_player/Q/Terran', 'Q', array('class' => 'btn', 'data-toggle'=>'tooltip', 'rel'=>'tooltipQ')); ?>
                                <?php echo anchor('main/find_player/R/Terran', 'R', array('class' => 'btn', 'data-toggle'=>'tooltip', 'rel'=>'tooltipR')); ?>
                                <?php echo anchor('main/find_player/S/Terran', 'S', array('class' => 'btn', 'data-toggle'=>'tooltip', 'rel'=>'tooltipS')); ?>
                                <?php echo anchor('main/find_player/T/Terran', 'T', array('class' => 'btn', 'data-toggle'=>'tooltip', 'rel'=>'tooltipT')); ?>
                                <?php echo anchor('main/find_player/U/Terran', 'U', array('class' => 'btn', 'data-toggle'=>'tooltip', 'rel'=>'tooltipU')); ?>
                                <?php echo anchor('main/find_player/V/Terran', 'V', array('class' => 'btn', 'data-toggle'=>'tooltip', 'rel'=>'tooltipV')); ?>
                                <?php echo anchor('main/find_player/W/Terran', 'W', array('class' => 'btn', 'data-toggle'=>'tooltip', 'rel'=>'tooltipW')); ?>
                                <?php echo anchor('main/find_player/X/Terran', 'X', array('class' => 'btn', 'data-toggle'=>'tooltip', 'rel'=>'tooltipX')); ?>
                                <?php echo anchor('main/find_player/Y/Terran', 'Y', array('class' => 'btn', 'data-toggle'=>'tooltip', 'rel'=>'tooltipY')); ?>
                                <?php echo anchor('main/find_player/Z/Terran', 'Z', array('class' => 'btn', 'data-toggle'=>'tooltip', 'rel'=>'tooltipZ')); ?>
                            </div>
                        </div>
                    </div><!--ends sectionDescription--> 
                    <div class="latestPlayersAddedContainer">
                        <?php switch($display_results):
                            case 1:
                        ?>
                          <?php foreach($results_all_terrans as $terran): ?>
                               <div class="span3 playerContainerSmall">
                                <h4><?php echo $terran->nickname; ?></h4>
                                <ul>
                                  <li><p>Nickname: <?php echo $terran->name; ?></p></li>
                                  <li><p>Data nașterii: <?php echo $terran->DOB; ?></p></li>
                                  <li><p>Țara de origine: <?php echo $terran->country; ?></p></li>
                                  <li><p>Rasa: <?php echo $terran->race; ?></p></li>
                                  <li><p>Echipa: <?php echo $terran->team;?></p></li>
                                </ul>
                                <?php echo anchor("main/getPlayerDetails/$terran->player_ID","Citeste intreaga biografie",array('class'=>'btn btn-success')); ?>
                            </div>
                          <?php endforeach; ?>
                          <?php break; ?>
                          <?php case 2: ?>
                                <?php foreach($player_details_letter as $terran): ?>
                                    <div class="span3 playerContainerSmall">
                                        <h4><?php echo $terran->nickname; ?></h4>
                                        <ul>
                                            <li><p>Nickname: <?php echo $terran->name; ?></p></li>
                                            <li><p>Data nașterii: <?php echo $terran->DOB; ?></p></li>
                                            <li><p>Țara de origine: <?php echo $terran->country; ?></p></li>
                                            <li><p>Rasa: <?php echo $terran->race; ?></p></li>
                                            <li><p>Echipa: <?php echo $terran->team;?></p></li>
                                        </ul>
                                        <?php echo anchor("main/getPlayerDetails/$terran->player_ID","Citeste intreaga biografie",array('class'=>'btn btn-success')); ?>
                                    </div>
                                <?php endforeach; ?>
                          <?php break; ?>
                        <?php endswitch; ?>
                    </div><!--ends latestPlayersAddedContainer-->
                </div><!--ends span8-->
            </div>     
        </div><!--ends mainContentContainer-->
        
