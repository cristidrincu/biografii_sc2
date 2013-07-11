<div class='row-fluid mainContentContainer'>
    <div class="navbar">
        <div class="navbar-inner">
            <a class="brand" href="<?php echo base_url(); ?>index.php/home/index">ADMINISTRATION AREA - <?php echo $page_title; ?></a>
                <ul class="nav pull-right">
                  <li class='username'>Bine ai venit, <?php echo $username; ?> </li>  
                  <li><?php echo anchor("index.php/home/do_logout","Logout", "");?></li>
                </ul>
  		</div>
	</div>
	<div class='alert alert-error'>Esti sigur ca doresti sa stergi aceasta echipa?</div>
	<div class='span12'>
		<h4 style='margin-left:20px; margin-bottom:10px;'>Detalii echipa</h4>
		<ul style='margin-left:20px; margin-bottom:10px;'>
			<?php
				foreach($team_details as $team):	
			?>
			<li>Nume: <?php echo $team->team_name; ?></li>
			<li>Tara: <?php echo $team->team_country; ?></li>
			<li>Numar jucatori: <?php echo $team->number_of_players; ?></li>

			<?php endforeach; ?>
		</ul>

		<?php echo anchor('index.php/team/delete_team/'.$team->ID, 'Sterge', array('class'=>'btn', 'style'=>'margin-left:20px;')); ?>
		<?php echo anchor('index.php/team/read_team', 'Inapoi', array('class'=>'btn')); ?>
</div>
</div><!--ends row-fluid mainContentContainer-->