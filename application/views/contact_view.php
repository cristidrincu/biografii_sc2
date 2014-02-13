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
                        <li><a href="<?php echo base_url();?>index.php/jucatori_romani/players" target="_self">Jucători români</a></li>
                        <li><a href="<?php echo base_url();?>index.php/main/teams" target="_self">Echipe</a></li>
                        <li><a href="<?php echo base_url();?>index.php/contribute/ajuta" target="_self">Contribuie</a></li>
                        <li><a class="activeLink" href="<?php echo base_url();?>index.php/main/contact" target="_self">Contact</a></li>
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
                </div><!--ends terranContainerImage-->
            </div>

        </div>
        <div class="span9">
            <div class="sectionDescription containerEntities">
                <?php
                $form_attributes = array('class'=>'form-horizontal');
                $subject_field_attributes=array('name'=>'subject', 'class'=>'span6', 'required'=>'required');
                $email_field_attributes=array('name'=>'email','class'=>'span6','required'=>'required');
                $name_field_attributes=array('name'=>'name_sender', 'class'=>'span6','required'=>'required');
                $message_field_attributes=array('name'=>'message_sender', 'class'=>'span6', 'required'=>'required');
                $honey_trap_field_attributes=array('name'=>'honey_trap_bots', 'class'=>'span6','type'=>'hidden');
                $submit_btn_attributes=array('name'=>'submitBtn','class' => 'btn', 'type'=>'submit','content'=>'Trimite mesaj');

                echo form_open('index.php/contact/send_email', $form_attributes);
                ?>
            </div><!--ends sectionDescription-->
            <div class="latestPlayersAddedContainer span7">
                <h1 class="teaserFormularContact">Ai întrebări? Sau vrei să ne laşi o sugestie?</h1>
                <p class="textInfoFormularContact">Deşi am încercat să testăm, citim, corectăm informaţiile introduse în acest site, se poate să fi avut şi scăpări. Drept urmare, dacă găseşti vreo greşeală sau pur şi simplu doreşti să ne feliciţi pentru muncă depusă, te rugăm să foloseşti formularul de mai jos. Îţi mulţumim!</p>
                <div class="control-group">
                    <label class="control-label" for="emailSubject">Subiect</label>
                    <div class="controls">
                        <?php echo form_input($subject_field_attributes); ?>
                    </div>
                </div><!--ends subject control group-->
                <div class="control-group">
                    <label class="control-label" for="senderName">Nume</label>
                    <div class="controls">
                        <?php echo form_input($name_field_attributes); ?>
                    </div>
                </div><!--ends nume control group-->
                <div class="control-group">
                    <label class="control-label" for="senderEmail">Adresa email</label>
                    <div class="controls">
                        <?php echo form_input($email_field_attributes); ?>
                    </div>
                </div><!--ends email control group-->
                <div class="control-group">
                    <label class="control-label" for="senderMessage">Mesaj:</label>
                    <div class="controls">
                        <?php echo form_textarea($message_field_attributes); ?>
                    </div>
                </div><!--ends email control group-->
                <div class="control-group">

                    <div class="controls">
                        <?php echo form_input($honey_trap_field_attributes); ?>
                    </div>
                </div><!--ends email control group-->
                <div class="control-group">
                    <div class="controls">
                        <?php echo form_button($submit_btn_attributes); ?>
                    </div>
                </div><!--ends email control group-->
            </div><!--ends latestPlayersAddedContainer-->
            <div class="containerContactMembrii span4 offset1">
                <h1 class="teaserFormularContact">Membrii echipei</h1>
                <p class="textInfoFormularContact">Daca doresti sa intri in contact direct cu unul din membrii acestui proiect, o poti face citind informatiile de mai jos!</p>
            </div>
        </div><!--ends span10-->
    </div>
</div><!--ends mainContentContainer-->