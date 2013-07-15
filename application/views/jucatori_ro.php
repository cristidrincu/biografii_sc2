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
                            <p>În cadrul acestei secţiuni vei găsi cei mai buni jucători de Starcraft2 din România, jucând cu rasa <strong>TERRAN</strong>, pentru ligile Masters şi Grand Masters.</p>
                        </div>
                        <br class="clearFloats"/>
                        <a href='<?php echo base_url();  ?>index.php/main/terran_players_ro' class='btn btn-primary'>Afiseaza</a>
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
                        <a href='<?php echo base_url(); ?>index.php/main/zerg_players_ro' class='btn btn-primary'>Afiseaza</a>
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
                        <a href='<?php echo base_url(); ?>index.php/main/protoss_players_ro' class='btn btn-primary'>Afiseaza</a>
                    </div>
                </div><!--ends terranContainerImage-->
            </div>
        </div>
        <div class="span9">
            <div class="sectionDescription containerEntities">
                <h1>Biografii jucători</h1>
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
                    In momentul in care doresti sa cauti un jucator, te rugam sa introduci nickname-ul sau - DeathAngel sau Daze de exemplu. Cautarea se face dupa nickname si NU dupa numele de familie etc!
                </div>
            </div><!--ends sectionDescription-->
            <div class="latestPlayersAddedContainer">
                <h3>Ultimii jucatori adaugati</h3>
                <?php foreach($data_latest_players as $player): ?>
                    <div class="span3 playerContainerSmall">
                        <h4><?php echo $player->nickname;?></h4>
                        <ul>
                            <li><p>Nickname: <?php echo $player->name; ?></p></li>
                            <li><p>Data nașterii: <?php echo $player->DOB; ?></p></li>
                            <li><p>Țara de origine: <?php echo $player->country; ?></p></li>
                            <li><p>Rasa: <?php echo $player->race; ?></p></li>
                            <li><p>Echipa: <?php echo $player->team; ?></p></li>
                        </ul>
                        <?php echo anchor("index.php/main/getPlayerDetailsRO/$player->player_ID/$player->race/$player->nickname","Citeste intreaga biografie",array('class'=>'btn btn-success')); ?>
                    </div>
                <?php endforeach; ?>
            </div><!--ends latestPlayersAddedContainer-->
        </div><!--ends span8-->
    </div>



</div><!--ends mainContentContainer-->

