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
                        <li><a href="<?php echo base_url();?>index.php/main/players" target="_self">Jucători internaţionali</a></li>
                        <li><a class="activeLink" href="<?php echo base_url();?>index.php/jucatori_romani/players" target="_self">Jucători români</a></li>
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
                            <p>În cadrul acestei secţiuni vei găsi cei mai buni jucători de Starcraft2 din România, jucând cu rasa <strong>TERRAN</strong>, pentru ligile Masters şi Grand Masters.</p>
                        </div>
                        <br class="clearFloats"/>
                        <a href='<?php echo base_url(); ?>index.php/main/terran_players_ro' class='btn btn-primary'>Afişează</a>
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
                            <p>În cadrul acestei secţiuni vei găsi cei mai buni jucători de Starcraft2 din România, jucând cu rasa <strong>ZERG</strong>, pentru ligile Masters şi Grand Masters.</p>
                        </div>
                        <br class="clearFloats"/>
                        <a href='<?php echo base_url(); ?>index.php/main/zerg_players_ro' class='btn btn-primary'>Afişează</a>
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
                            <p>În cadrul acestei secţiuni vei găsi cei mai buni jucători de Starcraft2 din România, jucând cu rasa <strong>PROTOSS</strong>, pentru ligile Masters şi Grand Masters.</p>
                        </div>
                        <br class="clearFloats"/>
                        <a href='<?php echo base_url(); ?>index.php/main/protoss_players_ro' class='btn btn-primary'>Afişează</a>
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
                    În momentul în care doreşti să cauţi un jucător, te rugăm să introduci nickname-ul sau - Nightend sau DeathAngel de exemplu. Căutarea se face după nickname şi NU după numele de familie etc!
                </div>
                <!--<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed blandit pulvinar risus, in vestibulum ligula pulvinar a. Praesent felis mi, ultrices at pellentesque eu, aliquet id neque. Nulla nec turpis nunc, a dignissim sapien. Nullam nec ligula in nisl cursus posuere quis sit amet dui. Nulla sapien libero, ultricies vel commodo nec, condimentum a turpis. Duis felis sapien, euismod et aliquet eget, luctus id neque.</p>-->
            </div><!--ends sectionDescription-->
            <div class="latestPlayersAddedContainer">
                <?php foreach($data_player as $player): ?>
                <div class="span4">
                    <img style='margin-bottom:10px;' src="<?=IMG_URL_PLAYER_ROMAN.$player->player_image;?>" />
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
        
