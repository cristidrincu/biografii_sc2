<?php
  //define("VIDCAST_LINK", "http://www.starcraft2-vidcasts.ro/");
 ?>
        
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
                                   <a href='<?php echo base_url(); ?>index.php/main/terran_players' class='btn btn-primary'>Afişează</a>
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
                                    <p>Nume precum Nestea, Zenio, Life şi mulţi alţii îşi au biografiile în cadrul acestei secţiuni. Află totul despre ei, de la începutul carierie de PRO GAMER şi până în acest moment, cât şi motivul pentru care au ales să joace acesta rasă.</p>
                                   </div>
                                   <br class="clearFloats"/>
                                   <a href='<?php echo base_url(); ?>index.php/main/zerg_players' class='btn btn-primary'>Afişează</a>
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
                                   <a href='<?php echo base_url(); ?>index.php/main/protoss_players' class='btn btn-primary'>Afişează</a>
                               </div>
                               
                               <!--<hr class="divider"/>-->
                    </div><!--ends terranContainerImage-->   
                    </div>
                    
                </div>
                <div class="span9">
                    <div class="sectionDescription containerEntities">
                        <h1><?php echo (strtoupper($data_player[0]->race)); ?></h1>
                        <?php
                          $form_attributes = array('class'=>'form-search formSimpleJucator');
                          $input_field_attributes=array('name'=>'search_field','class'=>'span12 search-query');
                          $submit_btn_attributes=array('name'=>'submitBtn','class' => 'btn', 'type'=>'submit','content'=>'Caută jucător');
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
                        <!--<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed blandit pulvinar risus, in vestibulum ligula pulvinar a. Praesent felis mi, ultrices at pellentesque eu, aliquet id neque. Nulla nec turpis nunc, a dignissim sapien. Nullam nec ligula in nisl cursus posuere quis sit amet dui. Nulla sapien libero, ultricies vel commodo nec, condimentum a turpis. Duis felis sapien, euismod et aliquet eget, luctus id neque.</p>-->
                    </div><!--ends sectionDescription--> 
                    <div class="latestPlayersAddedContainer">
                      <?php foreach($data_player as $player): ?>
                          <div class="span4">
                                <img style='margin-bottom:10px;' src="<?=IMG_URL_PLAYER.$player->player_image;?>" />
                                <h3>Titluri obtinute: </h3>
                              <ul>
                              <?php foreach($data_titles as $title): ?>                              
                                    <li><?php echo ($title->title_name ." || ".$title->title_date); ?></li>                                
                                <?php endforeach; ?>
                              </ul>
                              <h3 class="vidcastsJucatorTitle">Vidcasts jucator</h3>
                              <ul>
                                <?php if(count($data_videos)==0): ?>
                                  <p>Nu exista clipuri pentru acest jucator!</p>
                                <?php else:?>  
                                <?php foreach($data_videos as $video): ?>
                                    <li>
                                      <a href="<?php echo $video->video_link?>" target="_blank"><?php echo $video->video_title; ?></a>
                                    </li>
                                  
                                <?php endforeach; ?> 
                              <?php endif; ?>
                            </div><!--ends player image container-->
                            <div class="span7 offset1">
                                <h3 class='playerNameTitle'><?php echo $player->name; ?> - <?php echo $player->nickname; ?></h3>
                                <ul>
                                  <li><p>Nickname: <?php echo $player->nickname; ?></p></li>
                                  <li><p>Data nașterii: <?php echo $player->DOB; ?></p></li>
                                  <li><p>Țara de origine: <?php echo $player->country; ?></p></li>
                                  <li><p>Rasa: <?php echo $player->race; ?></p></li>
                                  <li><p>Echipa: <?php echo $player->team;?></p></li>
                                  <li><p>Castiguri: <?php echo $player->winnings; ?> $</p></li>
                                </ul>
                                <p class='playerDescriptionText'><?php echo nl2br($player->description, true); ?></p>
                              <?php endforeach; ?>
                              
                              </ul>
                            </div>
                    </div><!--ends latestPlayersAddedContainer-->
                </div><!--ends span8-->
            </div>     
        </div><!--ends mainContentContainer-->
        
