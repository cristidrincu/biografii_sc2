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
    <h3>Ai introdus cu succes urmatorul user</h3>
    <ul>
        <li><?php echo $user_name ?></li>
        <li><?php echo $user_email ?></li>
        <li><?php echo $user_role ?></li>
    </ul>
</div>