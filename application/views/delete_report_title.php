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
	<div class='alert alert-error'>Esti sigur ca doresti sa stergi acest titlu?</div>
	<h4>Detalii titlu</h4>
	<ul>
	<?php
		foreach($title_details as $title):	
	?>
	<li>Nume: <?php echo $title->title_name ?></li>
	<li>Data: <?php echo $title->title_date ?></li>

	<?php endforeach; ?>
	</ul>

	<?php echo anchor('title/delete_title/'.$title->ID, 'Sterge', array('class'=>'btn')); ?>
	<?php echo anchor('title/read_title', 'Inapoi', array('class'=>'btn')); ?>
</div><!--ends row-fluid mainContentContainer-->