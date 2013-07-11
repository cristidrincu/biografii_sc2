<div class='row-fluid mainContentContainer'>
    <div class="navbar">
        <div class="navbar-inner">
            <a class="brand" href="<?php echo base_url(); ?>index.php/home/index">ADMINISTRATION AREA</a>
                <ul class="nav pull-right">
                  <li class='username'>Bine ai venit, <?php echo $username; ?> </li>  
                  <li><?php echo anchor("index.php/home/logout","Logout", "");?></li>
                </ul>
  </div>
</div>
    <div class="span4"><!--container for crud operations for players-->
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
                        <?php echo anchor("index.php/player/prepare_player", "CREATE Player", array("class"=>"btn")); ?>
                        <?php echo anchor("index.php/player/read_player", "READ Player", array("class"=>"btn")); ?>
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
                        <?php echo anchor("index.php/title/prepare_title", "CREATE Title", array("class"=>"btn")); ?>
                        <?php echo anchor("index.php/title/read_title", "READ Title", array("class"=>"btn")); ?>
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
                        <?php echo anchor("index.php/video/prepare_video", "CREATE Video", array("class"=>"btn")); ?>
                        <?php echo anchor("index.php/video/read_video", "READ Video", array("class"=>"btn")); ?>
                    </div>
                </div>
            </div><!--ends player_videos entity options-->
        </div>
    </div><!--ends CRUD main menu-->
    <!--section for romanian players - CRUD ops-->
    <div class='CRUDMainMenu'>
        <h4 class='indicatorOperatiiCRUDJucatori'>JUCATORI ROMANI</h4>
        <div class="accordion" id="accordion3">
            <div class="accordion-group">
                <div class="accordion-heading">
                    <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion3" href="#collapseOneRo">
                        CRUD operations for PLAYER ROMAN entity
                    </a>
                </div>
                <div id="collapseOneRo" class="accordion-body collapse in">
                    <div class="accordion-inner">
                        <?php echo anchor("index.php/player_ro/prepare_player_ro", "CREATE Player", array("class"=>"btn")); ?>
                        <?php echo anchor("index.php/player_ro/read_player_ro", "READ Player", array("class"=>"btn")); ?>
                    </div>
                </div>
            </div><!--ends player roman entity options-->
            <div class="accordion-group">
                <div class='accordion-heading'>
                    <a class='accordion-toggle' data-toggle="collapse" data-parent="#accordion3" href="#collapseThreeRo">
                        CRUD operations for TITLE entity
                    </a>
                </div>
                <div id="collapseThreeRo" class="accordion-body collapse">
                    <div class="accordion-inner">
                        <?php echo anchor("index.php/title_ro/prepare_title_ro", "CREATE Title", array("class"=>"btn")); ?>
                        <?php echo anchor("index.php/title_ro/read_title_ro", "READ Title", array("class"=>"btn")); ?>
                    </div>
                </div>
            </div><!--ends title entity options-->
            <div class="accordion-group">
                <div class="accordion-heading">
                    <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion3" href="#collapseFourRo">
                        CRUD operations for VIDEO entity
                    </a>
                </div>
                <div id="collapseFourRo" class="accordion-body collapse">
                    <div class="accordion-inner">
                        <?php echo anchor("index.php/video_ro/prepare_video_ro", "CREATE Video", array("class"=>"btn")); ?>
                        <?php echo anchor("index.php/video_ro/read_video_ro", "READ Video", array("class"=>"btn")); ?>
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
                    <?php echo anchor("index.php/team/prepare_team", "CREATE Team", array("class"=>"btn")); ?>
                    <?php echo anchor("index.php/team/read_team", "READ Team", array("class"=>"btn")); ?>
                </div>
            </div>
            </div>
        </div><!--ends team entity options-->

    </div><!--ends CRUD main menu for team operations-->
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
