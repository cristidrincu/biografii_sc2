        <div id="mainContentContainer">
            <div id="backgroundMainMenu">
                <div class="row-fluid">
                <div class="span4">
                    <div id="containerLogo">
                       <!--<a href="index.php" target="_self"><img src="imgs/logo_smaller.png" alt="Starcraft2 Vidcasts"/></a>-->
                       <div id="logoTitles">
                           <a href='<?php echo base_url(); ?>' target='_self'><h4 class="miniTitleStarcraft2">Arhiva Starcraft2</h4></a>
                           <a href='http://www.starcraft2-vidcasts.ro' target='self'><h5 class="miniSubtitleVGN">Un proiect VGN &amp; Starcraft2-Vidcasts România</h5></a>
                       </div><!--ends logoTitles-->                       
                    </div><!--ends containerLogo-->
                </div><!--ends span4-->
                <div class="span8">
                    <div id="mainMenuContainer">
                        <ul class="mainMenu">
                            <li><a href="<?php echo base_url();?>index.php/main/index" target="_self">Acasă</a></li>
                            <!--<li>
                                <div class="droppDownMainContainer">
                                    <a id="dropDownTriggerProiect" href="#" target="_self">Despre acest proiect</a>
                                    
                                         <div class="menuContainer">
                                             
                                             <ul class="dropDownList">
                                                 <h1 class="dropDownTitle">Afla cine contribuie la acest proiect si motivatiile lor!</h1>
                                                 <i class="icon-question-sign icon-white"></i>
                                                 <li><a href="#" target="_self">Cine?</a></li>
                                                 <i class="icon-wrench icon-white"></i>
                                                 <li><a href="#" target="_self">Cum?</a></li>
                                                 <i class="icon-heart icon-white"></i>
                                                 <li><a href="#" target="_self">De ce?</a></li>
                                             </ul>
                                         </div>
                                    
                                </div>
                            </li><!--ends menuContainer-->
                            <li><a class="activeLink" href="<?php echo base_url();?>index.php/main/players" target="_self">Jucători internaţionali</a></li>
                            <li><a href="<?php echo base_url();?>index.php/jucatori_romani/players" target="_self">Jucători români</a></li>
                            <li><a href="<?php echo base_url();?>index.php/main/teams" target="_self">Echipe</a></li>
                            <li><a href="<?php echo base_url();?>index.php/contribute/ajuta" target="_self">Contribuie</a></li>
                            <li><a href="<?php echo base_url();?>index.php/contact" target="_self">Contact</a></li>
                            <!--<li><a href="#" target="_self">Contact</a></li>-->
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
                                    <p>Am introdus in cadrul sectiunii Terrane jucatori cu renume mondial, gen Kas, MVP, Marine King Prime si altii. Vei putea citi biografiile celor mai puternici terrani Koreeni, insa si a celor care vin incet din urma, asa cum este spaniolul Lucifron!</p>
                                   </div>
                                   <br class="clearFloats"/>
                                   <a href='<?php echo base_url(); ?>index.php/main/terran_players' class='btn btn-primary'>Afiseaza</a>
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
                                    <p>Nume precum Nestea, Zenio, Life si multi altii isi au biografiile in cadrul acestei sectiuni. Afla totul despre ei, de la inceputul carierie de PRO GAMER si pana in acest moment, cat si motivul pentru care au ales sa joace acesta rasa.</p>
                                   </div>
                                   <br class="clearFloats"/>
                                   <a href='<?php echo base_url(); ?>index.php/main/zerg_players' class='btn btn-primary'>Afiseaza</a>
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
                                    <p>Huk, Parting, Socke - nume sonore in cadrul adunarii protosiene, cu rezultate remarcabile, te asteapta sa le citesti biografiile si sa le afli rezultatele obtinute in cadrul concursurilor internationale la care au participat. O sectiune in care DigitalWaves a muncit la greu. Prietenii stiu de ce!</p>
                                   </div>
                                   <br class="clearFloats"/>
                                   <a href='<?php echo base_url(); ?>index.php/main/protoss_players' class='btn btn-primary'>Afiseaza</a>
                               </div>

                               <!--<hr class="divider"/>-->
                    </div><!--ends terranContainerImage-->
                    </div>

                </div>
                <div class="span9">
                    <div class="sectionDescription containerEntities">
                        <h1>ZERG</h1>
                        <?php
                          $form_attributes = array('class'=>'form-search formSimpleJucator');
                          $input_field_attributes=array('name'=>'search_field','class'=>'span12 search-query');
                          $submit_btn_attributes=array('name'=>'submitBtn','class' => 'btn', 'type'=>'submit','content'=>'Cauta jucator');
                        ?>
                            <div class="input-append">
                                <?php
                                    echo form_open('index.php/search/results', $form_attributes);
                                    echo form_input($input_field_attributes);
                                    echo form_button($submit_btn_attributes);
                                    echo form_close();
                                ?>
                            </div>
                        <br class="clearFloats"/>
                        <div class='alert alert-info'>
                            In momentul in care doresti sa cauti un jucator, te rugam sa introduci nickname-ul sau - MVP sau tlo de exemplu. Cautarea se face dupa nickname si NU dupa numele de familie etc. Ne indoim ca veti cauta dupa Jung Jong Hyun!
                        </div>
                        <div class="btn-toolbar">
                            <div class="btn-group">
                                <?php echo anchor('index.php/main/find_player/A/Zerg', 'A', array('class' => 'btn', 'data-toggle'=>'tooltip', 'rel'=>'tooltipA')); ?>
                                <?php echo anchor('index.php/main/find_player/B/Zerg', 'B', array('class' => 'btn', 'data-toggle'=>'tooltip', 'rel'=>'tooltipB')); ?>
                                <?php echo anchor('index.php/main/find_player/C/Zerg', 'C', array('class' => 'btn', 'data-toggle'=>'tooltip', 'rel'=>'tooltipC')); ?>
                                <?php echo anchor('index.php/main/find_player/D/Zerg', 'D', array('class' => 'btn', 'data-toggle'=>'tooltip', 'rel'=>'tooltipD')); ?>
                                <?php echo anchor('index.php/main/find_player/E/Zerg', 'E', array('class' => 'btn', 'data-toggle'=>'tooltip', 'rel'=>'tooltipE')); ?>
                                <?php echo anchor('index.php/main/find_player/F/Zerg', 'F', array('class' => 'btn', 'data-toggle'=>'tooltip', 'rel'=>'tooltipF')); ?>
                                <?php echo anchor('index.php/main/find_player/G/Zerg', 'G', array('class' => 'btn', 'data-toggle'=>'tooltip', 'rel'=>'tooltipG')); ?>
                                <?php echo anchor('index.php/main/find_player/H/Zerg', 'H', array('class' => 'btn', 'data-toggle'=>'tooltip', 'rel'=>'tooltipH')); ?>
                                <?php echo anchor('index.php/main/find_player/I/Zerg', 'I', array('class' => 'btn', 'data-toggle'=>'tooltip', 'rel'=>'tooltipI')); ?>
                                <?php echo anchor('index.php/main/find_player/J/Zerg', 'J', array('class' => 'btn', 'data-toggle'=>'tooltip', 'rel'=>'tooltipJ')); ?>
                                <?php echo anchor('index.php/main/find_player/K/Zerg', 'K', array('class' => 'btn', 'data-toggle'=>'tooltip', 'rel'=>'tooltipK')); ?>
                                <?php echo anchor('index.php/main/find_player/L/Zerg', 'L', array('class' => 'btn', 'data-toggle'=>'tooltip', 'rel'=>'tooltipL')); ?>
                                <?php echo anchor('index.php/main/find_player/M/Zerg', 'M', array('class' => 'btn', 'data-toggle'=>'tooltip', 'rel'=>'tooltipM')); ?>
                                <?php echo anchor('index.php/main/find_player/N/Zerg', 'N', array('class' => 'btn', 'data-toggle'=>'tooltip', 'rel'=>'tooltipN')); ?>
                                <?php echo anchor('index.php/main/find_player/O/Zerg', 'O', array('class' => 'btn', 'data-toggle'=>'tooltip', 'rel'=>'tooltipO')); ?>
                                <?php echo anchor('index.php/main/find_player/P/Zerg', 'P', array('class' => 'btn', 'data-toggle'=>'tooltip', 'rel'=>'tooltipP')); ?>
                                <?php echo anchor('index.php/main/find_player/Q/Zerg', 'Q', array('class' => 'btn', 'data-toggle'=>'tooltip', 'rel'=>'tooltipQ')); ?>
                                <?php echo anchor('index.php/main/find_player/R/Zerg', 'R', array('class' => 'btn', 'data-toggle'=>'tooltip', 'rel'=>'tooltipR')); ?>
                                <?php echo anchor('index.php/main/find_player/S/Zerg', 'S', array('class' => 'btn', 'data-toggle'=>'tooltip', 'rel'=>'tooltipS')); ?>
                                <?php echo anchor('index.php/main/find_player/T/Zerg', 'T', array('class' => 'btn', 'data-toggle'=>'tooltip', 'rel'=>'tooltipT')); ?>
                                <?php echo anchor('index.php/main/find_player/U/Zerg', 'U', array('class' => 'btn', 'data-toggle'=>'tooltip', 'rel'=>'tooltipU')); ?>
                                <?php echo anchor('index.php/main/find_player/V/Zerg', 'V', array('class' => 'btn', 'data-toggle'=>'tooltip', 'rel'=>'tooltipV')); ?>
                                <?php echo anchor('index.php/main/find_player/W/Zerg', 'W', array('class' => 'btn', 'data-toggle'=>'tooltip', 'rel'=>'tooltipW')); ?>
                                <?php echo anchor('index.php/main/find_player/X/Zerg', 'X', array('class' => 'btn', 'data-toggle'=>'tooltip', 'rel'=>'tooltipX')); ?>
                                <?php echo anchor('index.php/main/find_player/Y/Zerg', 'Y', array('class' => 'btn', 'data-toggle'=>'tooltip', 'rel'=>'tooltipY')); ?>
                                <?php echo anchor('index.php/main/find_player/Z/Zerg', 'Z', array('class' => 'btn', 'data-toggle'=>'tooltip', 'rel'=>'tooltipZ')); ?>
                            </div>
                        </div>
                    </div><!--ends sectionDescription--> 
                    <div class="latestPlayersAddedContainer">
                        <?php switch($display_results):
                            case 1:
                        ?>
                        <?php foreach($results_all_zergs as $zerg): ?>
                            <div class="span3 playerContainerSmall">
                                <h4><?php echo $zerg->nickname; ?></h4>
                                <ul>
                                    <li><p>Nickname: <?php echo $zerg->name; ?></p></li>
                                    <li><p>Data nașterii: <?php echo $zerg->DOB; ?></p></li>
                                    <li><p>Țara de origine: <?php echo $zerg->country; ?></p></li>
                                    <li><p>Rasa: <?php echo $zerg->race; ?></p></li>
                                    <li><p>Echipa: <?php echo $zerg->team; ?> </p></li>
                                </ul>
                                <?php echo anchor("index.php/main/getPlayerDetails/$zerg->player_ID/$zerg->race/$zerg->nickname", "Citeste intreaga biografie",array('class'=>'btn btn-success'));?>
                            </div>
                          <?php endforeach; ?>
                          <?php break; ?>
                          <?php case 2: ?>
                                <?php foreach($player_details_letter as $zerg): ?>
                                    <div class="span3 playerContainerSmall">
                                        <h4><?php echo $zerg->nickname; ?></h4>
                                        <ul>
                                            <li><p>Nickname: <?php echo $zerg->name; ?></p></li>
                                            <li><p>Data nașterii: <?php echo $zerg->DOB; ?></p></li>
                                            <li><p>Țara de origine: <?php echo $zerg->country; ?></p></li>
                                            <li><p>Rasa: <?php echo $zerg->race; ?></p></li>
                                            <li><p>Echipa: <?php echo $zerg->team; ?> </p></li>
                                        </ul>
                                        <?php echo anchor("index.php/main/getPlayerDetails/$zerg->player_ID/$zerg->race/$zerg->nickname", "Citeste intreaga biografie",array('class'=>'btn btn-success'));?>
                                    </div>
                                <?php endforeach; ?>
                            <?php break; ?>
                        <?php endswitch; ?>
                        </div>
                    </div><!--ends latestPlayersAddedContainer-->
                </div><!--ends span8-->
            </div>
            
           
            
        </div><!--ends mainContentContainer-->
        
