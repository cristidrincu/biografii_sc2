<div class='row-fluid mainContentContainer'>
    <div class="navbar">
        <div class="navbar-inner">
            <a class="brand" href="<?php echo base_url(); ?>home/index">ADMINISTRATION AREA - <?php echo $page_title; ?></a>
                <ul class="nav pull-right">
                  <li class='username'>Bine ai venit, <?php echo $username; ?> </li>  
                  <li><?php echo anchor("home/do_logout","Logout", "");?></li>
                </ul>
  </div>
</div>
<div class='alert alert-error'>Esti sigur ca doresti sa stergi acest jucator?</div>
<div class='span12'>
	<h4 style='margin-left:20px; margin-bottom:10px;'>Detalii jucator</h4>
	<ul style='margin-left:20px; margin-bottom:10px;'>
	<?php
		foreach($player_details as $player):	
	?>
		<li>Nume: <?php echo $player->name; ?></li>
		<li>Nickname: <?php echo $player->nickname; ?></li>
		<li>Data nasterii: <?php echo $player->DOB; ?></li>
		<li>Tara: <?php echo $player->country; ?></li>
		<li>Rasa: <?php echo $player->race; ?></li>
		<li>Echipa: <?php echo $player->team_name; ?></li>

	<?php endforeach; ?>
	</ul>

	<?php echo anchor('player/delete_player/'.$player->player_ID, 'Sterge', array('class'=>'btn', 'style'=>'margin-left:20px;')); ?>
	<?php echo anchor('player/read_player', 'Inapoi', array('class'=>'btn')); ?>
</div><!--ends span 12-->

</div>