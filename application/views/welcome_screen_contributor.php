<div class='row-fluid mainContentContainer'>
    <div class="navbar">
        <div class="navbar-inner">
            <a class="brand" href="<?php echo base_url(); ?>home/index">ADMINISTRATION AREA</a>
            <ul class="nav pull-right">
                <li class='username'>Bine ai venit, <?php echo $username; ?> </li>
                <li><?php echo anchor("home/logout","Logout", "");?></li>
            </ul>
        </div>
    </div>
    <div class="span3"><!--container for crud operations for players-->
        <!--section for international players - CRUD ops-->
        <div class='CRUDMainMenu'>
            <h4 class='indicatorOperatiiCRUDJucatori'>JUCATORI STRAINI</h4>
            <div class="accordion" id="accordion2">
                <div class="accordion-group">
                    <div class="accordion-heading">
                        <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseOne">
                            CRUD operations for PLAYER entity
                        </a>
                    </div>
                    <div id="collapseOne" class="accordion-body collapse in">
                        <div class="accordion-inner">
                            <?php echo anchor("player/prepare_player", "CREATE Player", array("class"=>"btn")); ?>
                            <?php echo anchor("player/read_player", "READ Player", array("class"=>"btn")); ?>
                        </div>
                    </div>
                </div><!--ends player entity options-->

                <div class="accordion-group">
                    <div class='accordion-heading'>
                        <a class='accordion-toggle' data-toggle="collapse" data-parent="#accordion2" href="#collapseThree">
                            CRUD operations for TITLE entity
                        </a>
                    </div>
                    <div id="collapseThree" class="accordion-body collapse">
                        <div class="accordion-inner">
                            <?php echo anchor("title/prepare_title", "CREATE Title", array("class"=>"btn")); ?>
                            <?php echo anchor("title/read_title", "READ Title", array("class"=>"btn")); ?>
                        </div>
                    </div>
                </div><!--ends title entity options-->
                <div class="accordion-group">
                    <div class="accordion-heading">
                        <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseFour">
                            CRUD operations for VIDEO entity
                        </a>
                    </div>
                    <div id="collapseFour" class="accordion-body collapse">
                        <div class="accordion-inner">
                            <?php echo anchor("video/prepare_video", "CREATE Video", array("class"=>"btn")); ?>
                            <?php echo anchor("video/read_video", "READ Video", array("class"=>"btn")); ?>
                        </div>
                    </div>
                </div><!--ends player_videos entity options-->
            </div>
        </div><!--ends CRUD main menu-->


        <!--operations for TEAM entity-->
        <div class='CRUDMainMenu'>
            <h4 class='indicatorOperatiiCRUDJucatori'>ECHIPE</h4>
            <div class="accordion" id="accordion4">
                <div class="accordion-group">
                    <div class="accordion-heading">
                        <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion4" href="#collapseTeam">
                            CRUD operations for TEAM entity
                        </a>
                    </div>
                    <div id="collapseTeam" class="accordion-body collapse in">
                        <div class="accordion-inner">
                            <?php echo anchor("team/prepare_team", "CREATE Team", array("class"=>"btn")); ?>
                            <?php echo anchor("team/read_team", "READ Team", array("class"=>"btn")); ?>
                        </div>
                    </div>
                </div>
            </div><!--ends team entity options-->
        </div><!--ends CRUD main menu for team operations-->
        <div class='CRUDMainMenu'>
            <h4 class='indicatorOperatiiCRUDJucatori'>USER</h4>
            <div class="accordion" id="accordion4">
                <div class="accordion-group">
                    <div class="accordion-heading">
                        <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion4" href="#collapseTeam">
                            UPDATE ACCOUNT
                        </a>
                    </div>
                    <div id="collapseTeam" class="accordion-body collapse in">
                        <div class="accordion-inner">
                            <?php echo anchor("user/prepare_update_user/".$user_id, "Update User Information", array("class"=>"btn")); ?>
                        </div>
                    </div>
                </div>
            </div><!--ends users entity options-->
        </div><!--ends CRUD main menu for users operations-->
    </div><!--ends container for CRUD menus-->
    <div class='span8 reportsOperationsArea'>
        <h3>GENERAL OVERVIEW AREA</h3>
        <p>Bine ai venit in cadrul sectiunii de administrare!</p>
        <p class='lastParagraphInformatiiAdmin'>In coloana din dreapta ai toate operatiile disponibile pentru crearea, vizualizare, actualizarea si stergerea informatiilor existente in baza de date - CREATE, READ, UPDATE, DELETE - CRUD pe scurt.</p>

        <h4>INFORMATII UTILE</h4>
        <p class='lastParagraphInformatiiAdmin'>Pentru introducerea unui jucator, fi sigur ca ai introdus inainte de asta echipa de care apartine. Acest lucru se poate face din cadrul sectiunii de CRUD operations pentru entitatea ECHIPA.</p>

        <h4>OPERATIILE PERMISE PE BAZA DE DATE PENTRU FIECARE ENTITATE</h4>
        <ul>
            <li>1. <strong>CREATE</strong> - creaza sau introdu in baza de date o noua entitate - JUCATOR, ECHIPA ETC;</li>
            <li>2. <strong>READ</strong> - citeste sau afiseaza toate entitatile din baza de date - jucatori, echipe etc;</li>
            <li>3. <strong>UPDATE</strong> - actualizeaza sau modifica o entitate din baza de date;</li>
            <li>4. <strong>DELETE</strong> - sterge o entitate din baza de date - aceasta operatiune este ireversibila - te rugam sa verifici de doua ori daca doresti sa stergi acea entitate</li>
        </ul>
    </div><!--ends section data-->
</div><!--ends main container-->
