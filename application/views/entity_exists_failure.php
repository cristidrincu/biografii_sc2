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
    <div class="span12 containerTableReport">
        <?php switch($entity_type):
            case 1:
                ?>
                <h1 class="successTitle">Jucatorul pe care doresti sa-l introduci exista deja in baza de date!</h1>
                <?php echo anchor('index.php/player/prepare_player', 'Introdu un alt jucator', 'title="Introdu un nou jucator"'); ?>
                <?php echo anchor('index.php/player/read_player', 'Inapoi la meniul principal', 'title="Inapoi la meniul principal"'); ?>
                <?php break; ?>
            <?php
            case 2:
                ?>
                <h1>Echipa pe care doresti sa o introduci exista deja in baza de date!</h1>
                <?php echo anchor('index.php/team/prepare_team', 'Introdu o alta echipa', 'title="Introdu o noua echipa"'); ?>
                <?php echo anchor('index.php/team/read_team', 'Inapoi la meniul principal', 'title="Inapoi la meniul principal"'); ?>
                <?php break; ?>
            <?php
            case 3:
                ?>
                <h1>Titlul pe care doresti sa-l introduci exista deja in baza de date!</h1>
                <?php echo anchor('index.php/title/prepare_title', 'Introdu un alt titlu', 'title="Introdu un alt titlu"'); ?>
                <?php echo anchor('index.php/title/read_title', 'Inapoi la meniul principal', 'title="Inapoi la meniul principal"'); ?>
                <?php break; ?>
            <?php
            case 4:
                ?>
                <h1>Video-ul pe care dorsti sa-l introduci exista deja in baza de date!</h1>
                <?php echo anchor('index.php/video/prepare_video', 'Introdu un alt video', 'title="Introdu un alt video"'); ?>
                <?php echo anchor('index.php/video/read_video', 'Inapoi la meniul principal', 'title="Inapoi la meniul principal"'); ?>
                <?php break; ?>
            <?php endswitch;?>
    </div><!--ends span12-->
</div>